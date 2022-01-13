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
                <h5 class="text-center fw-bold mb-2">Enter New Password</h5><br>
                <h6>Username: <span class="fw-bold text-primary uname-text">{{$user->username}}</span></h6>
            </div>
            <form action="{{route('submitNewPW')}}" method="post">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="newpw1" id="newpw1" required class="form-control">
                    <input type="checkbox" onClick="showPassword()" class="mt-2"> <span class="text-info">Show</span>
                </div>    
            <div class="form-group mt-2">
                    <label>Retype New Password</label>
                    <input type="password" name="newpw2" id="newpw2" required class="form-control">
                </div>    
            </div>
            <div class="card-bottom text-center">
                <a href="{{route('changePassword1')}}" class="btn btn-secondary">Back</a>
                <input type="button" value="Next" class="btn btn-info" style="width:80px;" data-bs-toggle="modal" data-bs-target="#confirmModal">
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                    Confirm change password.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-info" value="Save" style="width:80px;">
                </div>
                </div>
            </div>
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
        var x = document.getElementById("newpw1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

</script>
@stop
