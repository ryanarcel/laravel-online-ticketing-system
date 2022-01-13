@extends('layouts.master2')

@section('styles')  
<style>
    .no-btn{
        margin-right: 5px;
    }
</style>
@stop
@section('content')
<div class="container">
      
    <div class="col-md-8 offset-md-2">
        <div class="alert alert-danger" role="alert">
            <form action="{{route('generateTicket2', $id)}}" method="post">
                @csrf
                <center>
                The system detected a confirmed registration that has the same referrence number of <b>{{$refNumber}}</b>.</br>Do you wish to continue verification?
                </br>
                <input type="hidden" name="refNumber" value="{{$refNumber}}">
                <a href="/registrants" class="btn btn-secondary no-btn">No</a>
                <input type="submit" value="Yes" class="btn btn-primary">
                </center>
            </form>
        </div>
    </div>
       
</div>
@stop
@section('scripts')
<script>    
     
</script>
@stop
