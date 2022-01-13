<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckAuth2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function () {
    $pword = "acdalumni";
    $hashed = Hash::make($pword);
    echo $hashed;

})->name("test");

Route::get("logout", [ProcessController::class, 'logout'])->name('logout');

Route::middleware([CheckAuth2::class])->group(function () {
    Route::get("/", function(){
        return view('pages.home');
    })->name("front");
    Route::get('/login-page', function () {
        return view('pages.login');
    })->name("login-page");
    Route::get('/login-for-sponsor', function () {
        return view('pages.loginsponsor');
    })->name("login-for-sponsor");
    Route::post("login", [ProcessController::class, 'login'])->name('login');
    Route::get("register-form/{token}", [ProcessController::class, 'registerForm'] )->name('register-form');
    Route::post('submitDisclaimer', [ProcessController::class, 'submitDisclaimer'])->name('submitDisclaimer');
    Route::post("register", [ProcessController::class, 'insert'])->name('insertData');
    Route::get('/success', function () {
        return view('pages.success');
    })->name("success");

    Route::post("loginSponsor", [ProcessController::class, 'loginSponsor'])->name('loginSponsor');


});

Route::middleware([CheckAuth::class])->group(function () {
    Route::get("registrants", [ProcessController::class, 'registrants'])->name('registrants');
    Route::get("solicitors-page", [ProcessController::class, 'showSolicitors'] )->name('showSolicitors');
    Route::post("insertSolicitor", [ProcessController::class, 'insertSolicitor'])->name('insertSolicitor');
    Route::get("verification/{id}", [ProcessController::class, 'verification'])->name('verification');
    Route::post("generate-ticket/{id}", [ProcessController::class, 'generateTicket'])->name('generateTicket');
    Route::post("generate-ticket2/{id}", [ProcessController::class, 'generateTicket2'])->name('generateTicket2');
    Route::get("ticket-success/{id}",  [ProcessController::class, 'successTicket'])->name('ticketGenerate');
    Route::get("confirm-sent/{id}",  [ProcessController::class, 'confirmSent'])->name('confirmSent');
    Route::get("dashboard",  [ProcessController::class, 'dashboard'])->name('dashboard');
    Route::get("edit-solicitor/{id}",  [ProcessController::class, 'editSolicitor'])->name('editSolicitor');
    Route::post("update-solicitor/{id}",  [ProcessController::class, 'updateSolicitor'])->name('updateSolicitor');
    Route::get("delete-solicitor/{id}",  [ProcessController::class, 'deleteSolicitor'])->name('deleteSolicitor');
    Route::get("change-password-1",  [ProcessController::class, 'changePassword1'])->name('changePassword1');
    Route::post("submit-oldPw",  [ProcessController::class, 'submitOldPW'])->name('submitOldPW');
    Route::get("change-password-2",  [ProcessController::class, 'changePassword2'])->name('changePassword2');
    Route::post("submit-newPw",  [ProcessController::class, 'submitNewPW'])->name('submitNewPW');

    Route::get("sponsorsHome", [ProcessController::class, 'sponsorsHome'])->name('sponsorsHome');
    Route::get("regSponsor", [ProcessController::class, 'regSponsor'])->name('regSponsor');
    Route::get("registration-page/{ticketCat}",  [ProcessController::class, 'showRegPage'])->name('sponsorPlatinum');
   
    Route::post("registerSponsor/{ticketCat}", [ProcessController::class, 'saveSponsor'])->name('saveSponsor');
    
});

