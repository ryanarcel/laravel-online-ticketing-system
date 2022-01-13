@extends('layouts.master2')

@section('styles')
<style>
    .modal-body ul{
      padding-left:50px;
      padding-right:50px;
    }
    .message-body{
      margin: 10px 50px 10px 50px;
      padding: 20px 20px 20px 20px;
      border: 2px solid rgb(119, 32, 104);
      border-radius: 10px;

    }
    .email-link{
      margin-left:50px;
    }
    .sender{
      text-align:right;
      margin-bottom:20px;
    }
    main{
      height:1000px;
    }
</style>    
@stop
@section('content')
<div class="modal" tabindex="-1" role="dialog" id="successTicket">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">

        <p>Email Address: <b>{{$attendee->email}}</b></p>
        <p>Phone Number: <b>{{$attendee->phone}}</b></p>

        <div class="message-body shadow-lg ">
        <h5>Congratulations!</h5>
          <h6>Good day, Mr./Ms. {{$attendee->fname}} {{$attendee->lname}}:</h6>
          <p>This message is to inform you that your registration payment for the <b>Assumption College of Davao Alumni Homecoming 2021</b> has been verified.</p>
          <p>With this, you are now officially among the potential winners of our prizes.</p>
          @if($attendee->verified == true)
          <p>Your ticket numbers are:</p>
            <ul >
                @foreach($attendee->entries as $entry)
                    <li><b>{{$entry->ticket_no}}</b></li>
                @endforeach
            </ul>
          @else
            <p class="fw-bold text-danger">No tickets. Payment not yet verified.</p>
          @endif

            <p>Please keep a copy of these ticket numbers. Such are to be used for the event's raffle draw. See you!</p>
            <p>Good luck and God bless.</p>
            <p class="sender">Alumni Representative batch 1996</p>
        </div>

        <button type="button" class="btn btn-success email-link" data-bs-toggle="modal" data-bs-target="#confirmEmailModal">Click if confirmation message was <br>  sent to {{$attendee->email}} or to {{$attendee->phone}}</button>

      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col">
               
            </div>
            <div class="col">
                <a href="{{route('registrants')}}" class="btn btn-primary">Okay</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade shadow-lg" id="confirmEmailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog shadow-lg">
    <div class="modal-content">
      <div class="modal-body">
          Confirm again if email was sent
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{route('confirmSent', $attendee->id)}}" class="btn btn-primary">Confirm</a>
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script>
    $(document).ready(function(){
        $('#successTicket').modal('show');

          // Modal hidden event fired
        $('#successTicket').on('hidden.bs.modal', function () {
            $(location).attr("href", "{{route('registrants')}}");
        });
    })
</script>
@stop