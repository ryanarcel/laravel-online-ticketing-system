@extends('layouts.master2')
@section('styles')
<style>
    .cred-card{
        padding: 20px 50px 20px 50px;
    }
    .card-title{
        padding-left:15px;
    }
    .uname-text{
        font-family:'Times New Roman', Times, serif;
        font-size:1.5em;
    }
    
    
</style>    
@stop
@section('content')
<div class="container">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow cred-card">
            <div class="card-title">
                <h5 class="text-center fw-bold mb-2">Enter Old Password</h5><br>
                <h6>Username: <span class="fw-bold text-primary uname-text">{{$user->username}}</span></h6>
            </div>
            <form action="{{route('submitOldPW')}}" method="post">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="oldpw" id="oldpw" required class="form-control">
                    <input type="checkbox" onClick="showPassword()" class="mt-2"> <span class="text-info">Show</span>
                </div>    
            </div>
            <div class="card-bottom text-center">
                <a href="{{route('registrants')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Next" class="btn btn-info" style="width:80px;">
            </div>
            </form>
        </div>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show mt-3 col-md-6 offset-md-3" role="alert">
                    {{$errors->first()}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif

    </div>
</div>
@stop
@section('scripts')
<script>    
    function showPassword() {
        var x = document.getElementById("oldpw");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@stop
