@extends('layouts.master')
@section('title')
    ACD Alumni Homecoming
@stop
@section('styles')
<style>
 body{
        background-color: #215fa8;
        background-image: url("{{asset('image/background-layout2.png')}}");
        background-size: auto;
        background-repeat: no-repeat;
    }
    #main-ticket{
        width:1000px;
        height: 323px;
    }
    .header{
        width:100%;
        align-content: center;
    }
    .panel-1{
        border:0px solid #000;
        padding: 20px 30px 20px 30px;
        background-color: #fff;
        border-radius: 10px;
    }
    .ticketQuantity{
        height: 40px;
        width: 70px;
        border-radius: 5px;
        margin-left: 10%; 
    }
    .table-container{
        padding-left: 50px;
        padding-right: 50px;
    }
    .dataName{
        font-weight: bold;
    }
    .inner-panel-1{
        border-bottom: 1px solid #000;
        padding: 20px 20px 20px 20px;
    }
    .paymentDiv{
        background-color: rgb(255, 253, 218);
        padding: 10px 20px 10px 20px;
        border-radius: 10px;
        display: none;
    }
    #solicitorField:readonly, #sectionField:disabled, #total_cost:disabled{
        background-color: rgb(255, 253, 218);
    }
    #searchTable{
        background-color: rgb(250, 250, 158);
        border-radius: 10px;
        padding: 10px 20px 10px 20px;
        
    }
    .confirm-modal{
        padding:10px 50px 10px 50px;
    }
</style>    
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 offset-md-2 offset-lg-2 ">

                <form action="{{route('insertData')}}" method="post" enctype="multipart/form-data">
                <div class="panel-1 mb-5 mt-3 shadow-lg">

                    <div class="inner-panel-1 mb-5">
                        <center><h4 class="mb-5">Registration</h4></center>
                        @csrf
                        <div class="form-group mt-2">
                            <div class="row">
                                <div class="col">
                                    <label >How many tickets do you want to purchase?</label>
                                    <p style="color:blue; font-size:12px">Each ticket costs P200.00</p>
                                </div>
                                <div class="col">
                                    <select name="ticketQuantity"  class="form-control" id="ticketQuantity" style="width:90%">
                                    @for($i=1; $i<=15; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                    </select>
                                </div>
                             </div>
                            
                        </div>
                        <div class="form-group mt-4">
                            <label>Total Cost</label>
                            <input type="text" value="P200" readonly name="total_cost" class="form-control" id="total_cost" class="form-control">
                        </div>

                        <div class="form-group mt-5">
                            <div class="row">
                                <div class="col">
                                    <label >Alumni Solicitor</label>
                                    <div class="input-group mb-3">
                                        <input type="text" readonly required class="form-control" name="solicitor" id="solicitorField" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-primary" type="button" id="searchSolicitorBtn">Search</button>
                                        <input type="hidden" name="solicitor_id" id="solicitor_id">
                                    </div>
                                </div>
                                <div class="col">
                                <label >Section</label>
                                    <input type="text" readonly required name="section" id="sectionField" value="" class="form-control">
                                    <input type="hidden" name="section_id" id="section_id">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">

                            <div id="matthewPayment" class="paymentDiv mt-2 shadow">
                                <center>
                                    <h1 class="fs-5 fw-bold">Payment Methods</h1>
                                    <p class="fw-bold text-primary">St. Matthew</p>
                                </center>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold">GCash Account :</p>
                                        <ul>
                                            <li>Dionnie Reyna May Asentista</li>
                                            <li>09212077348</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    <p class="fw-bold">Bank Transfer/Deposit :</p>
                                        <ul>
                                            <li>Dionnie Reyna May Asentista</li>
                                            <li>Bank of the Philippine Islands (BPI) - 8096103074</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="johnPayment" class="paymentDiv mt-2 shadow">
                                <center>
                                    <h1 class="fs-5 fw-bold">Payment Methods</h1>
                                    <p class="fw-bold text-primary">St. John</p>
                                </center>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold">GCash Account :</p>
                                        <ul>
                                            <li>Anna Lisa Sarenas </li>
                                            <li>09228092935</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    <p class="fw-bold">Bank Transfer/Deposit :</p>
                                        <ul>
                                            <li>Anna Lisa Sarenas, Afrim Timogtimog, & Janice Laburada</li>
                                            <li>Chinabank - 137602027630</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="lukePayment" class="paymentDiv mt-2 shadow">
                                <center>
                                    <h1 class="fs-5 fw-bold">Payment Methods</h1>
                                    <p class="fw-bold text-primary">St. Luke</p>
                                </center>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold">GCash Account :</p>
                                        <ul>
                                            <li>Joan Marie Pacatang</li>
                                            <li>09951364727</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    <p class="fw-bold">Bank Transfer/Deposit :</p>
                                        <ul>
                                            <li>Odessa Torre</li>
                                            <li>Security Bank - 0000025150630</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="paulPayment" class="paymentDiv mt-2 shadow">
                                <center>
                                    <h1 class="fs-5 fw-bold">Payment Methods</h1>
                                    <p class="fw-bold text-primary">St. Paul</p>
                                </center>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold">GCash Account :</p>
                                        <ul>
                                            <li>Joel Marie Micabalo</li>
                                            <li>09171763548</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    <p class="fw-bold">Bank Transfer/Deposit :</p>
                                        <ul>
                                            <li>Ryan Locsin</li>
                                            <li>Chinabank - 137602027703</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="jamesPayment" class="paymentDiv mt-2 shadow">
                                <center>
                                    <h1 class="fs-5 fw-bold">Payment Methods</h1>
                                    <p class="fw-bold text-primary">St. James</p>
                                </center>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold">GCash Account :</p>
                                        <ul>
                                            <li>Arneil Chua</li>
                                            <li>09913618251</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    <p class="fw-bold">Bank Transfer/Deposit :</p>
                                        <ul>
                                            <li>Arneil Chua, Ethel Caceres, and Fernan Roy Punay</li>
                                            <li>Rizal Commercial Banking Corporation (RCBC) - 0000009035199077</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="markPayment" class="paymentDiv mt-2 shadow">
                                <center>
                                    <h1 class="fs-5 fw-bold">Payment Methods</h1>
                                    <p class="fw-bold text-primary">St. Mark</p>
                                </center>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold">GCash Account :</p>
                                        <ul>
                                            <li>Germaine Tan</li>
                                            <li>09177140106</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    <p class="fw-bold">Bank Transfer/Deposit :</p>
                                        <ul>
                                            <li>Germaine Tan</li>
                                            <li>Bank of the Philippine Islands (BPI) - 8099257356</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="otherAlumniPayment" class="paymentDiv mt-2 shadow">
                                <center>
                                    <h1 class="fs-5 fw-bold">Payment Methods</h1>
                                    <p class="fw-bold text-primary">ACD Alumni Association</p>
                                </center>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold">GCash Account :</p>
                                        <ul>
                                            <li>Jopriz Bueno</li>
                                            <li>09770575445</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                    <p class="fw-bold">Bank Transfer/Deposit :</p>
                                        <ul>
                                            <li>Alumni Association of Assumption College of Davao</li>
                                            <li>Metrobank - 2216175-76</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                        <div class="form-group mt-5">
                            <label>Name</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="fname" class="form-control" placeholder="First name" id="fnameField" required>
                                </div>
                                <div class="col">
                                    <input type="text" name="lname" class="form-control" placeholder="Last name" id="lnameField" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <div class="row">
                                <div class="col">
                                    <label >Email Address</label>
                                    <input type="email" name="email" class="form-control" id="emailField" required >
                                </div>
                                <div class="col">
                                    <label >Phone number</label>
                                    <input type="number" name="phoneNo" class="form-control" id="phoneField" required>
                                </div>
                            </div>
                        </div>  
                        <div class="form-group mt-5">
                            <div class="row">
                                <div class="col">
                                    <label >Authorized Representative
                                        </label>
                                    <input type="text" name="authorizedRep" id="repField" class="form-control">
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>                       
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger mt-5">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group mt-5">
                            <p>Please upload an image of your proof of payment indicating <b>a clear transaction/referrence number</b>.</p>
                            <p id="warning"></p>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <center><a href="/" class="btn btn-secondary mt-5" id="backBtn">Back</a> &nbsp;&nbsp;&nbsp;<button type="button" id="confirmBtn" class="mt-5 ml-3 btn btn-success" >Register</button></center>
                    </div>

                    <!-- confirm modal -->
                    <div class="modal fade" tabindex="-1" id="confirmModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <center>
                                    <h5 class="modal-title" style="margin-left:50px">Please review your registration details.</h5>
                                </center>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body confirm-modal">
                                <p id="reviewName"></p>
                                <p id="reviewEmail"></p>
                                <p id="reviewPhone"></p>
                                <p id="reviewRep"></p>
                                <h5 id="reviewTicket"></h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" value="Register" value="Register">
                            </div>
                            </div>
                        </div>
                    </div> 

                </form>
            </div>
        </div>
    </div>

<div class="modal" tabindex="-1" id="searchModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Search Solicitor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-container">
        <table class="table" id="searchTable">
            <thead>
                <th>Name</th>
                <th>Section</th>
                <th style="display:none"></th>
                <th style="display:none"></th>
            </thead>
            <tbody>
                @foreach($solicitors as $solicitor)
                <tr class="tableData" >
                        <td class="dataName">{{$solicitor->lname}}, {{$solicitor->fname}}</td>
                        <td class="dataSection">{{$solicitor->section->section}}</td>
                        <td class="sectionID" style="display:none">{{$solicitor->section->id}}</td>
                        <td style="display:none">{{$solicitor->id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('scripts')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>

$(document).ready(function(){

    $("#searchModal").modal('show');

    $('#searchSolicitorBtn').click(function(){
        $("#searchModal").modal('show');
    })

    let table = $("#searchTable").DataTable();  
    
    $('#searchTable tbody').on('click', 'tr', function () {

        let data = table.row(this).data();

        let name = data[0];
        let section = data[1];
        let sectionId = data[2];
        let solicitorId = data[3];
        
        $('#searchModal').modal('hide');

        $("#solicitorField").val(name);
        $("#sectionField").val(section);
        $("#section_id").val(sectionId);
        $("#solicitor_id").val(solicitorId);

        let secID = $("#section_id").val();

        console.log("Section ID: "+ sectionId);

        if(secID == 1){
            $(".paymentDiv").hide();
            $("#matthewPayment").show(200);
        }
        else if (secID == 2){
            $(".paymentDiv").hide();
            $("#johnPayment").show(200);
        }
        else if (sectionId == 3){
            $(".paymentDiv").hide();
            $("#lukePayment").show(200);
        }
        else if (secID == 4){
            $(".paymentDiv").hide();
            $("#paulPayment").show(200);
        }
        else if (secID == 5){
            $(".paymentDiv").hide();
            $("#jamesPayment").show(200);
        }
        else if (secID == 6){
            $(".paymentDiv").hide();
            $("#markPayment").show(200);
        }
        else if (secID == 7){
            $(".paymentDiv").hide();
            $("#otherAlumniPayment").show(200);
        }
        else{
            $(".paymentDiv").hide();
        }

    });
    
                
    $('#ticketQuantity').on('change', function(){
        let quantity = $(this).val();
        quantity = "P"+quantity * 200;
        $("#total_cost").val(quantity);
        $('#warning').html("Make sure you have paid the exact amount of "+quantity+".");
    })


    $("#confirmBtn").click(function(){
        //console.log("test");
        let name = $("#fnameField").val() + " " + $("#lnameField").val();
        let email = $("#emailField").val();
        let phone = $("#phoneField").val();
        let rep = $("#repField").val();
        let solicitorField = $("#solicitorField").val();
        let sectionField = $("#sectionField").val();
        let quantity = $("#ticketQuantity").val();
        let totalCost = $("#total_cost").val();
        let imageField = $("#imageField").val();

        if(name == "" || email == "" || phone == "" || quantity == ""
        || totalCost == "" || imageField == "" || solicitorField == "" || sectionField == ""){
            alert("Please do not leave required fields empty.");
            $("#confirmModal").hide();
        }
        else{

            if(rep == ""){
                rep = "None";
            }

            $("#reviewName").html("Name: "+name);
            $("#reviewEmail").html("Email Address: "+email);
            $("#reviewRep").html("Authorized Representative: "+rep);
            $("#reviewTicket").html(
                "Your purchase: "+
                    "<ul>"+
                        "<li>"+ quantity +" tickets</li>"+
                        "<li>Total Cost: "+ totalCost +"</li>"+
                    "</ul>"
            )

            $("#confirmModal").modal('show');
        }
    })

});


</script>
@stop
