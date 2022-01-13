
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ACD Alumni Homecoming</title>


    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
    <!-- Favicons -->
<link rel="icon" href="{{asset('image/acdseal.png')}}" sizes="32x32" type="image/png">
<meta name="theme-color" content="#7952b3">


<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    body {
        background-color: #EBF7FC;
        font-family: 'Roboto', sans-serif;
    }

    .container {
        max-width: 960px;
    }

    .pricing-header {
        max-width: 700px;
    }
    #seals{
        height:80px;
        margin-right: 20px;
    }
    .alumni-header{
        color:rgb(41, 99, 167);
    }
</style>

@yield('styles')


  </head>
  <body>
    


<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/sponsorsHome" class="d-flex align-items-center text-dark text-decoration-none">
        
        <img src="{{asset('image/seals.png')}}" id="seals">
        <span class="fs-4 fw-bold alumni-header">ACD Alumni Association</span>
      </a>

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('sponsorsHome')}}">Home</a>
        <a class="py-2 text-dark text-decoration-none" href="{{route('logout')}}">Logout</a>
      </nav>
    </div>

   
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">

      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="http://www.assumptiondavao.edu.ph">www.assumptiondavao.edu.ph</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="http://www.assumptiondavao.edu.ph/acd2/?page_id=901">Privacy</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="http://www.linkedin.com/in/ryanarcel">Ryan Arcel Galendez (Developer)</a></li>
          
        </ul>
      </div>

    </div>
  </footer>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
@yield('scripts')
    
  </body>
</html>
