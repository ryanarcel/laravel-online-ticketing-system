@extends('layouts.master2')
@section('styles')
<style>

    .table-div{
        margin-top:30px;
        padding: 20px 30px 20px 30px;
        background-color: rgb(238, 238, 201);
        border-radius:10px;
    }
    .add-link{
        text-decoration: none;
        padding: 5px 5px 5px 5px;
    }
    .header-div{
        margin-bottom: 20px;
    }
    #solicitorTable{
        border-radius: 8px;
        padding: 20px 30px 20px 30px;
    }
    .modal-body{
        padding: 10px 30px 10px 30px;
    }
    .entry-list{

    }
</style>    
@stop
@section('content')
    <div class="container">

            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-6 fs-3">Solicitors under {{ session('user-section')}}</h1>
            </div>

        <div class="col-md-12 table-div shadow">
            <div class="header-div">
               
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-person-plus-fill"></i> Add Solicitor
                </button>
            
            </div>
            <table class="table table-hover bg-white" id="solicitorTable">
                <thead>
                    <tr>
                        <th class="text-primary">Name</th>
                        <th class="text-primary text-center">View Sales</th>
                        <th class="text-primary text-center">Edit</th>
                        <th class="text-primary text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitors as $solicitor)
                    <tr>
                        <td>{{$solicitor->lname}}, {{$solicitor->fname}}</td>
                        <td class="text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#salesModal{{$solicitor->id}}"><i class="bi bi-eye-fill text-center text-success"></i></a>
                        
                            <div class="modal fade" id="salesModal{{$solicitor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$solicitor->fname}} {{$solicitor->lname}}'s ticket sales.</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Registrant</th>
                                                    <th>Ticket Entries</th>
                                                </tr>
                                                <?php $countTicket = 0; ?>
                                                @foreach($solicitor->attendees as $attendee)
                                                <tr>
                                                    <td style="text-align:left">{{$attendee->fname}} {{$attendee->lname}}</td>
                                                    <td>
                                                        <ul class="entry-list">
                                                        @foreach($attendee->entries as $entry)
                                                            <li style="text-align:left">{{$entry->ticket_no}}</li>
                                                            <?php $countTicket++; ?>
                                                        @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            Ticket Sales: <b>P{{$countTicket * 200}}.00</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                            
                                        </div>
                              
                                    </div>
                                </div>
                                </div>

                        </td>
                        <td class="text-center"><a href="{{route('editSolicitor', $solicitor->id)}}"><i class="bi bi-pencil-fill text-center text-warning"></i></a></td>
                        <td class="text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$solicitor->id}}"><i class="bi bi-trash-fill text-center text-danger"></i></a>
                        
                            <!-- delete modal -->

                            <div class="modal fade" id="deleteModal{{$solicitor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body pt-4 pb-4">
                                    <span class="text-danger fs-5">Confirm deletion of <b>{{$solicitor->fname}} {{$solicitor->lname}}</b> and all ticket entries under him/her.</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="{{route('deleteSolicitor', $solicitor->id)}}" class="btn btn-success">Confirm</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Solicitor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('insertSolicitor')}}" method="post">
          @csrf
        <div class="modal-body">
            <div class="form-group mt-3">
                <label>First name</label>
                <input type="text" name="fname" class="form-control">
            </div>
            <div class="form-group mt-3 mb-3">
                <label>Last name</label>
                <input type="text" name="lname" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>



@stop
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#solicitorTable').dataTable();
        })

    </script>
@stop
