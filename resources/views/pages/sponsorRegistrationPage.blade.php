@extends('layouts.master3')

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
    #solicitorField:readonly, #sectionField:disabled, #total_cost:disabled{
        background-color: rgb(255, 253, 218);
    }
    /* #searchTable tr th,td{
        border: 1px solid #000;
        width:500px;
    } */
    h5{
        margin-top: 20px;
        margin-bottom: 50px;
    }
   
    .header{
        margin-bottom: 10px;
    }
    .btn-platinum{
        background-color:rgb(229, 228, 226);
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
      <h1 class="display-6 fs-3">Register {{$ticketCat}} Sponsor</h1>
    </div>
    <div class="shadow p-5 col-md-6 offset-md-3">
        <form action="{{route('saveSponsor', $ticketCat)}}" method="post" id="regForm">
            @csrf
            <div>
                <div class="mb-3 pt-3 ">
                    <label class="form-label">Sponsor's First Name</label>
                    <input type="text" class="form-control" name="fname" required id="fname">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sponsor's Last Name</label>
                    <input type="text" class="form-control" name="lname" required id="lname">
                </div>
            </div>
            <div class="border-top border-3 mb-3 pt-2">
                <label class="form-label">Solicitor</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="solicitor" readonly id="solicitorField" required>
                        <a class="btn btn-info" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">Search</a>
                    </div>
                <input type="hidden" name="solicitor_id" id="solicitor_id">
            </div>
            <a class="btn btn-secondary" href="{{route('sponsorsHome')}}">Cancel</a>
            <a class="btn btn-primary" href="#" id="saveBtn">Save</a>
        </form>
    </div>

<!-- modals -->
<div class="modal" tabindex="-1" id="searchModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Search Sponsor Solicitor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-container p-5">
        <table class="table table-hover" id="searchTable" style="width:100%">
            <thead>
                <th >Name</th>
                <th >Section</th>
                <th style="display:none; "></th>
            </thead>
            <tbody>
                @foreach($solicitors as $solicitor)
                <tr class="tableData" >
                        <td class="dataName fw-bold">{{$solicitor->lname}}, {{$solicitor->fname}}</td>
                        <td class="dataSection" >{{$solicitor->section->section}}</td>
                        <td style="display:none;">{{$solicitor->id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="confirmModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="table-container p-5">
        <h5>Ticket entries will be generated after this registration. <br>
            Do you confirm this <b>{{$ticketCat}}</b> sponsor registration?</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>


<!-- end modals -->
    </div>
@stop
@section('scripts')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>

<script>

    $(document).ready(function() {

        let table = $("#searchTable").DataTable();  

        $('#searchTable tbody').on('click', 'tr', function () {

            let data = table.row(this).data();

            let name = data[0];
            let section = data[1];
            let solicitorId = data[2];
            
            $('#searchModal').modal('hide');

            $('#solicitorField').val( name + " from " + section);
            $("#solicitor_id").val(solicitorId);
        });

        $('#saveBtn').click(function(){
            let fname = $("#fname").val();
            let lname = $("#lname").val();
            let solicitorField =  $('#solicitorField').val();

            if(fname == "" || lname =="" || solicitorField==""){
                $('#confirmModal').modal('hide');
                alert("Do not leave fields empty");
            }
            else{
                $("#confirmModal").modal('show');

            }    
        })

        $('#confirmBtn').click(function(){
            $('#confirmModal').modal('hide');
            $("#regForm").submit();
        })
   });
</script>
@stop
