@extends('layouts.master2')

@section('styles')
<style>
    .table-div{
         background-color: #fcfcfc; 
        padding: 20px 50px 20px 50px;
        margin-top: 30px;
        border-radius:10px;
        margin-left:20px;
        margin-right:20px;
    }
    h5{
        margin-top: 20px;
        margin-bottom: 50px;
    }
   
    .header{
        margin-bottom: 10px;
    }

    a{
        text-decoration:none;
    }
    .regis-details{
        list-style:none;
        margin: 0; padding: 0;
        text-align: left;
    }
    .regis-details li{
        margin: 0; padding: 0;
    }
    .modal-body{
        padding-left:50px;
        padding-right:50px;
    }
    .ticket_numbers{
        list-style:none;
        text-align: left;
    }
</style>    
@stop
@section('content')
    <!-- <div class="container"> -->

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-6 fs-3">{{session('user-section')}} Registrants</h1>
    </div>
        
        <div class="table-div shadow">
            <center><h4 class="header"></h4></center>
            <table id="table" class="table table-hover ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-center">Details</th>
                        <th class="text-center">Payment Confirmation</th>
                        <th class="text-center">Message Response</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendees as $attendee)
                    <tr>
                 
                        <td class="text-left">
                            {{$attendee->lname}}, {{$attendee->fname}}
                        </td>
                        <td class="text-center">
                            
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailsmodal-{{$attendee->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="View details">
                                <i class="bi bi-eye-fill fs-5"></i>
                            </a>
                       
                            <!-- Modal -->
                            <div class="modal fade" id="detailsmodal-{{$attendee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body">
                                @if(!$attendee->verified)
                                <h6>Details</h6>
                                    <ul class="regis-details">
                                        <li>Email: <b>{{$attendee->email}}</b></li>
                                        <li>Phone: <b>{{$attendee->phone}}</b></li>
                                        <li>Solicitor: <b>{{$attendee->solicitor->fname}} {{$attendee->solicitor->lname}}</b></li>
                                        <li>Ticket quantity: <b>{{$attendee->ticketQuantity}}</b></li>
                                    </ul>
                                @else
                                <h6 >Details</h6>
                                    <ul class="regis-details">
                                        <li>Email: <b>{{$attendee->email}}</b></li>
                                        <li>Phone: <b>{{$attendee->phone}}</b></li>
                                        <li>Solicitor: <b>{{$attendee->solicitor->fname}} {{$attendee->solicitor->lname}}</b></li>
                                        <li>Ticket quantity: <b>{{$attendee->ticketQuantity}}</b></li>
                                    </ul>
                                <h6 class="text-danger mt-3">Ticket Numbers for {{$attendee->fname}} {{$attendee->lname}}</h6>
                                    <ul class="ticket_numbers">
                                        @foreach($attendee->entries as $entry)
                                            <li class="text-danger"><b>{{$entry->ticket_no}}</b></li>
                                        @endforeach
                                    </ul>
                                @endif

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                    
                                </div>
                                </div>
                            </div>
                            </div>

                        </td>
                     
                        <td class="text-center">
                            @if(!$attendee->verified)
                                <a href="{{route('verification', $attendee->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Not yet verified" class="text-warning"><i class="bi bi-exclamation-lg text-warning fs-5"></i></a>
                            @else
                                <i class="bi bi-check-lg text-success fs-5"></i>
                            @endif
                            
                        </td>
                        <td class="text-center">
                            @if(!$attendee->email_sent)
                                <a href="{{route('ticketGenerate',$attendee->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Not yet sent"><i class="bi bi-exclamation-lg text-warning fs-5 "></i></a>
                            @else
                            <a href="{{route('ticketGenerate', $attendee->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Sent"><i class="bbi bi-check-lg text-success fs-5"></i></a>
                            @endif
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

        
    <!-- </div> -->
@stop
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
     

        $(document).ready(function() {
            $('#table').DataTable();

            var popover = new bootstrap.Popover(document.querySelector('.example-popover'), {
                container: 'body'
            })

        } );
    </script>
@stop
