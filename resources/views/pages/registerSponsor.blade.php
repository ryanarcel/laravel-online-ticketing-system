@extends('layouts.master3')

@section('styles')
<style>

</style>    
@stop
@section('content')
    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-6 fs-3">List of Sponsors</h1>
        </div>
            
        <div class="table-div shadow">
            <center><h4 class="header"></h4></center>
            
                
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
