<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendee;
use App\Models\Section;
use App\Models\Solicitor;
use App\Models\User;
use App\Models\Entry;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Hash;

class ProcessController extends Controller
{
    public function submitDisclaimer(Request $request){
        $dataPrivacy_1 = $request->data_privacy_1;
        $dataPrivacy_2 = $request->data_privacy_2;
        $token = $request->_token;

        if($dataPrivacy_1 == "on" && $dataPrivacy_2 == "on"){
            $digits = 7;
            $key = rand(pow(10, $digits-1), pow(10, $digits)-1);
            return redirect()->route('register-form', ["token" => $token]);
        }
        else{
            echo "failed";
        }
    }

    public function registerForm(){
        $sections = Section::all(); 
        $solicitors = Solicitor::all();
        return view('pages.register', compact(["sections", "solicitors"]));

    }

    public function showPage($id){
        $sections = Section::all();
        $solicitor = Solicitor::find($id);
        return view('pages.home', compact(["sections", "solicitor"]));
    }

    public function insert(Request $request){

        $limit = $request->ticketQuantity;

       $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('verification'), $imageName);

        $attendee = new Attendee();
        $attendee->ticketQuantity = $request->ticketQuantity;
        $attendee->fname = $request->fname;
        $attendee->lname = $request->lname;
        $attendee->email = $request->email;
        $attendee->phone = $request->phoneNo;
        $attendee->payment_refNo = "";
        
        if($request->authorizedRep){
            $attendee->authorizedRep = $request->authorizedRep;
        }else{
            $attendee->authorizedRep = "";
        }

        $attendee->solicitor_id = $request->solicitor_id;
        $attendee->section_id = $request->section_id;
        $attendee->image_link = $imageName;
        $attendee->save();

 
        return redirect()->route('success')->with('success','You have successfully registered');
    }

    public function login(Request $request){
        $user = User::where('username', $request->username)->first();

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
           $request->session()->put('user-section', $user->section->section);
           $request->session()->put('section-id', $user->section->id);
           return redirect()->route('registrants');
        }
        else{
            return redirect()->back()->withErrors(["Invalid login"]);
        }

    }

    public function registrants(Request $request){
        
        $section_id = session('section-id');
        $attendees = Attendee::where("section_id", $section_id)->orderBy('created_at', 'asc')->get();
        return view("pages.registrants", compact(["attendees"]));
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('front');
    }

    public function showSolicitors(){
        $section_id = session('section-id');
        $solicitors = Solicitor::where("section_id", $section_id)->get();
        return view("pages.solicitor", compact(["solicitors"]));

    }

    public function insertSolicitor(Request $request){
        $solicitor = new Solicitor();

        $solicitor->fname = $request->fname;
        $solicitor->lname = $request->lname;
        $solicitor->section_id = session('section-id');

        $solicitor->save();
        return redirect()->back();

    }

    public function verification($id){
        $attendee = Attendee::find($id);
        return view("pages.verification", compact(["attendee"]));
    }

    public function generateTicket(Request $request, $id){

        if(Attendee::where("payment_refNo", $request->refNumber)->exists()){
            $refNumber = $request->refNumber;
            return view('pages.confirmRedundant', compact(["refNumber", "id"]));
        }
        else{

            $attendee = Attendee::find($id);
            $attendee->verified = 1;
            $attendee->payment_refNo = $request->refNumber;
            $attendee->save();

            $limit = $attendee->ticketQuantity;

            for($i = 1; $i<=$limit; $i++ ){ 

                $digits = 4;
                //$ticketno = 0;
                $ticketno = rand(pow(10, $digits-1), pow(10, $digits)-1);

                while(Entry::where('ticket_no', $ticketno )->exists()){
                    $ticketno = rand(pow(10, $digits-1), pow(10, $digits)-1);
                }
                
                $entries = Entry::create([
                    "attendee_id" => $id,
                    "sponsor_id" => 0,
                    "cost" => 200,
                    "ticket_no" => $ticketno,
                    "payment_refNo" => $request->refNumber   
                ]);
            }

            return redirect()->route('ticketGenerate', $id);
        }
    }

    public function generateTicket2(Request $request, $id){

            $attendee = Attendee::find($id);
            $attendee->verified = 1;
            $attendee->payment_refNo = $request->refNumber;
            $attendee->save();

            $limit = $attendee->ticketQuantity;

            for($i = 1; $i<=$limit; $i++ ){ 

                $digits = 4;
                //$ticketno = 0;
                $ticketno = rand(pow(10, $digits-1), pow(10, $digits)-1);

                while(Entry::where('ticket_no', $ticketno )->exists()){
                    $ticketno = rand(pow(10, $digits-1), pow(10, $digits)-1);
                }
                
                $entries = Entry::create([
                    "attendee_id" => $id,
                    "sponsor_id" => 0,
                    "cost" => 200,
                    "ticket_no" => $ticketno,
                    "payment_refNo" => $request->refNumber   
                ]);
            }

            return redirect()->route('ticketGenerate', $id);
    }

    public function successTicket($id){
        $attendee = Attendee::find($id);
        return view("pages.successticket", compact(["attendee"]));
    }

    public function confirmSent($id){
        $attendee = Attendee::find($id);
        $attendee->email_sent = 1;
        $attendee->save();

        return redirect()->route('registrants');
    }

    public function dashboard(){
        $entries = Entry::all();
        $sections = Section::all();
        return view("pages.dashboard", compact(["entries", "sections"]));
    }

    public function editSolicitor(Request $request, $id){
        $solicitor = Solicitor::find($id);
        return view('pages.editSolicitor', compact(["solicitor"]));
    }

    public function updateSolicitor(Request $request, $id){
        $solicitor = Solicitor::find($id);
        $solicitor->fname = $request->fname;
        $solicitor->lname = $request->lname;
        $solicitor->save();
        return redirect()->route('showSolicitors');
    }

    public function deleteSolicitor($id){
        $solicitor = Solicitor::find($id);

        $attendees = $solicitor->attendees;

        foreach($attendees as $attendee){
            //echo "entry: ".$attendee->entries;
            $attendee->delete();
            foreach($attendee->entries as $entry){
                //echo "ticket number: ".$entry->ticket_No."<br>";
                $entry->delete();
            }
        }

        $solicitor->delete();

        return redirect()->route('showSolicitors');
    }

    public function changePassword1(){
        $section_id = session('section-id');
        $user = User::find($section_id);
        return view("pages.passwordChangePage1", compact(["user"]));
    }

    public function submitOldPW(Request $request){
        $section_id = session('section-id');
        $user = User::find($section_id);

        $pwDB = $user->password;
        $inputPW = $request->oldpw;

        if(Hash::check($inputPW, $pwDB)){
            return redirect()->route("changePassword2");
        }
        else{
            return back()->withErrors("Wrong Password");
        }
        
    }

    public function changePassword2(){
        $section_id = session('section-id');
        $user = User::find($section_id);
        return view("pages.passwordChangePage2", compact(["section_id", "user"]));
    }


    public function submitNewPW(Request $request){
        
        $section_id = session('section-id');

        $newpw1 = $request->newpw1;
        $newpw2 = $request->newpw2;

        if($newpw1 != $newpw2){
            return back()->withErrors("Passwords do not match");
        }
        else{
            $hashed = Hash::make($newpw1);
            $user = User::find($section_id);
            $user->password = $hashed;
            $user->save();

            $request->session()->flush();
            Auth::logout();
            return redirect()->route('front', "changed");
        }
    }

    public function loginSponsor(Request $request){
        $user = User::where('username', $request->username)->first();

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('user-section', 0);
           $request->session()->put('section-id', 0);
           return redirect()->route('sponsorsHome');
        }
        else{
            return redirect()->back()->withErrors(["Invalid login"]);
        }

        return "Test tae";
    }

    public function sponsorsHome(){
        $sponsors = Sponsor::all();
        return view("pages.sponsorsHome", compact(["sponsors"]));
    }

    public function regSponsor(){
        return view("pages.registerSponsor");
    }

    public function showRegPage($ticketCat){
        $solicitors = Solicitor::all();
        return view("pages.sponsorRegistrationPage", compact(["solicitors", "ticketCat"]));
    }

    public function saveSponsor($ticketCat, Request $request){
        
        $entryQuant;

        if($ticketCat == "Platinum"){
            $entryQuant = 10;
        }
        elseif($ticketCat == "Gold"){
            $entryQuant = 3;
        }
        elseif($ticketCat == "Silver"){
            $entryQuant = 2;
        }
        elseif($ticketCat == "Bronze"){
            $entryQuant = 1;
        }

        $sponsor = new Sponsor;
        $sponsor->fname = $request->fname;
        $sponsor->lname = $request->lname;
        $sponsor->category = $ticketCat;
        $sponsor->solicitor_id = $request->solicitor_id;

        $sponsor->save();

        $id = $sponsor->id;

        for($i = 1; $i<=$entryQuant; $i++ ){ 

            $digits = 4;
            //$ticketno = 0;
            $ticketno = rand(pow(10, $digits-1), pow(10, $digits)-1);

            while(Entry::where('ticket_no', $ticketno )->exists()){
                $ticketno = rand(pow(10, $digits-1), pow(10, $digits)-1);
            }
            
            $entries = Entry::create([
                "attendee_id" => 0,
                "sponsor_id" => $id,
                "cost" => 200,
                "ticket_no" => $ticketno,
                "payment_refNo" => $ticketCat." Sponsorship"  
            ]);
        }

        return redirect()->route('sponsorsHome');
        
    }

    
    

}


