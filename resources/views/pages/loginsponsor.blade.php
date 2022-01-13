@extends('layouts.master')
@section('title')
    ACD Alumni Homecoming
@stop
@section('styles')
<style>
    body{
        background-image: url("{{asset('image/background-layout2.png')}}");
        background-size: auto;
    }
   .login-div{
       width:100%;
       padding: 50px 100px 50px 100px;
       border-radius:5px;
       margin-top:20px;
       background-color: #fff;
   }
   .cancel{
       margin-right: 5px;
   }
   
</style>    
@stop
@section('content')
    <div class="container">
        <div class="col-md-6 col-lg-6 offset-md-3 offset-lg-3">
            
            <div class="login-div shadow-lg">
                <h5 class="text-center fw-bolder mb-4">Sponsor Management Login</h5>
                <form action="{{route('loginSponsor')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control shadow-sm">
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" name="password" id="pw" placeholder="Password" class="form-control shadow-sm">
                        <input type="checkbox" onClick="showPassword()" > <span style="font-size:14px">Show</span>
                    </div>
                    <div class="mt-4">
                        <a href="{{route('front')}}" class="btn btn-secondary cancel">Back</a><button class="btn btn-success">Login</button>
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
        var x = document.getElementById("pw");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

</script>
@stop