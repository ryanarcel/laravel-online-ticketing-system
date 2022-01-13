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
    <center>
        <h5 class="fw-bold text-success">Edit Solicitor</h5>
    </center>
    <div class="col-md-6 offset-md-3 shadow bg-light">
    
        <form action="{{route('updateSolicitor', $solicitor->id)}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group mt-3">
                    <label class="text-success">First name</label>
                    <input type="text" name="fname" class="form-control" value="{{$solicitor->fname}}">
                </div>
                <div class="form-group mt-3 mb-3">
                    <label class="text-success">Last name</label>
                    <input type="text" name="lname" class="form-control" value="{{$solicitor->lname}}">
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{route('showSolicitors')}}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-success">Update</button>
            </div>
        </form>
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
