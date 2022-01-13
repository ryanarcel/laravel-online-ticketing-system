@extends('layouts.master3')

@section('styles')
<style>
    .table-div{
        background-color: #DCF4FE; 
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
    .btn-platinum{
        background-color:#e5e4e2;
        width:100px;
        font-weight: bold;
    }
    .btn-gold{
        background-color: #FFD700;
        width:100px;
        font-weight: bold;
    }
    .btn-silver{
        background-color: #C0C0C0;
        width:100px;
        font-weight: bold;
    }
    .btn-bronze{
        background-color: #CD7F32;
        width:100px;
        font-weight: bold;
    }

   

</style>    
@stop
@section('content')
    <div class="container">
   
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-6 fs-3">List of Sponsors</h1>
      
    </div>
        
        <div class="table-div shadow">
            <div class="float-end mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#regModal"><i class="bi bi-person-plus-fill" style="font-size: 1.5rem" ></i></a>
            </div>
            <center><h4 class="header"></h4></center>
            <table id="table" class="table table-hover ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sponsorhip Category</th>
                        <th class="text-center">Details</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sponsors as $sponsor)
                    <tr>
                 
                        <td class="text-left fw-bold">
                            {{$sponsor->lname}}, {{$sponsor->fname}}
                        </td>
                        <td>{{$sponsor->category}}</td>
                        <td class="text-center">
                            
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailsmodal-{{$sponsor->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="View details" >
                                <i class="bi bi-eye-fill fs-5"></i>
                            </a>

                            <!-- modal -->
                            <div class="modal fade" id="detailsmodal-{{$sponsor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="fw-bold">{{$sponsor->category}} Sponsorship</p>
                                    <p>Ticket Numbers</p>
                                    <ul style="list-style:none">
                                        @foreach($sponsor->entries as $entry)
                                            <li>{{$entry->ticket_no}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                </div>
                            </div>
                            </div>
                            <!-- end modal -->

                        </td>
                        <td class="text-center"><a href="#"><i class="bi bi-pencil-fill"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table
            
        </div>


<!-- Modal -->
<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Sponsorship Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-row justify-content-center">
        <a href="{{route('sponsorPlatinum', 'Platinum')}}" class="btn btn-platinum m-1">Platinum</a>
        <a href="{{route('sponsorPlatinum', 'Gold')}}" class="btn btn-gold m-1">Gold</a>
        <a href="{{route('sponsorPlatinum', 'Silver')}}" class="btn btn-silver m-1">Silver</a>
        <a href="{{route('sponsorPlatinum', 'Bronze')}}" class="btn btn-bronze m-1">Bronze</a>
      </div>

    </div>
  </div>
</div>

        
    </div>
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
