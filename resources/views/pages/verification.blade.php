@extends('layouts.master2')

@section('styles')
<style>

    #reciept_img{
        height:80%;
        width:80%;
    }
    .main-panel{
        background-color: rgb(160, 252, 217);
        padding: 30px 30px 30px 30px;
    }
    .table-div, .receipt-div{
        margin-left:50px;
        margin-right:50px;
        border-radius: 10px;
        padding-left:50px;
        padding-right:50px;
        padding-top:30px;
        padding-bottom:30px;
    }
  
    
</style>    
@stop
@section('content')
    <div class="container">
      
        <div class="col-md-12 main-panel card shadow">
            <div class="row">
                <div class="col bg-white receipt-div">
                    <center>
                    <h5>Transaction Receipt</h5>
                    <img src="{{asset('verification')}}/{{$attendee->image_link}}" class="img-fluid img-thumbnail shadow" alt="..." id="reciept_img">
                    </center>
                </div>
            </div>
            <div class="row pt-5 pl-5">
                <div class="col table-div bg-white">
                <h5><center>Details</center></h5>
                <table class="table mt-4">
                    <tr>
                        <td class="text-right">Name</td>
                        <td class="fw-bold">{{$attendee->lname}}, {{$attendee->fname}}</td>
                    </tr>
                    <tr>
                        <td >Ticket Quantity</td>
                        <td class="fw-bold">{{$attendee->ticketQuantity}} tickets</td>
                    </tr>
                    <tr>
                        <td >Total cost</td>
                        <td class="fw-bold">P{{$attendee->ticketQuantity * 200}}</td>
                    </tr>
                    <tr>
                        <td>Solicitor</td>
                        <td class="fw-bold">{{$attendee->solicitor->lname}}, {{$attendee->solicitor->fname}}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td class="">
                            <ul>
                                <li>{{$attendee->email}}</li>
                                <li>{{$attendee->phone}}</li>
                            </ul>
    
                        </td>
                    </tr>
            <form action="{{route('generateTicket', $attendee->id)}}" method="post" id="refNoForm">
                    <tr>
                        <td>Please retype referrence number here</td>        
                        <td>
                            <input type="text" name="refNumber" class="form-control shadow" id="refNumber"><br>
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first()}}
                                </div>
                            @endif
                        </td>
                    </tr>
                </table>

                <a href="/registrants" class="btn btn-secondary">Cancel</a>

                @if($attendee->verified == true)
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ticketModal">
                    View Tickets
                </button>
                @else
                <button type="button" class="btn btn-primary" id="confirmRegistration" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    Confirm Registration
                </button>
                @endif

                <!-- 1st Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you are confirming this registration?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" style="width:70px" class="btn btn-primary" id="generateTicket" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loadingModal">Yes</a>
                </div>
                </div>
            </div>
            </div>

            <!-- 2nd Modal -->
            <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                <div class="d-flex justify-content-center mb-3">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    </div>
                        <p class="text-center">Generating ticket numbers...</p>
                    </div>
                </div>
            </div>
            </div>
            @csrf
        </form>
            <!-- 2nd Modal -->
            <div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                    <h6>Ticket numbers under {{$attendee->fname}} {{$attendee->lname}}</h6>
                    <ul>
                        @foreach($attendee->entries as $entry)
                            <li>{{$entry->ticket_no}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('scripts')
<script>    
$(document).ready(function(){

    if($("#refNumber").val() == ""){
        $("#confirmRegistration").attr('disabled', true);
    }

    $("#refNumber").on('change', function(){
        if($("#refNumber").val() == ""){
            $("#confirmRegistration").attr('disabled', true);
        }
        $("#confirmRegistration").attr('disabled', false).attr("class","btn btn-primary");
    })

    $("#generateTicket").click(function(){
        $("#loading").modal('show');
        setTimeout(function() {
            //window.location.href = "{{route('generateTicket', $attendee->id)}}";
            $("#refNoForm").submit();
        }, 800);
    })





})

     
</script>
@stop
