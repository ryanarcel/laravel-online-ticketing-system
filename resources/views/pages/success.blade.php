@extends('layouts.master')
@section('title')
    ACD Alumni Homecoming
@stop
@section('styles')
<style>
    body{
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
    .panel-1, .panel-2{
        border:2px solid #000;
        padding: 20px 50px 20px 50px;
    }
    .ticketQuantity{
        height: 40px;
        width: 70px;
        border-radius: 5px;
        margin-left: 10%; 
    }
    .success-div{
        background-color: #fff;
        border-radius: 15px;
        padding: 30px 30px 30px 30px;
    }
    a{
        text-decoration:none;   
    }

</style>    
@stop
@section('content')
    <div class="container">
        <center>
            <div class="success-div col-md-8 mt-5">
            Your registration is successful. <br>
            The verification of your payment will be processed within 24 hours. <br>
            Always be in contact with your solicitor and wait until you recieve a notification via email.
            <br><a href="/">Home Page</a>
            </div>
        </center>
    </div>
@stop
