@extends('layouts.master2')
@section('styles')
<style>
    .2ndrow{
        border-top: 1px solid #ccc;
    }


    
</style>    
@stop
@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6 offset-md-4">
                <div class="card text-dark bg-info shadow-lg" style="width: 18rem;">
                    <div class="card-body px-5">
                        <h5 class="card-title text-white">Total Sales</h5>
                        <h3 class="text-center text-white fw-bolder totalSales"></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center 2ndrow">
                <h1 class="display-6 fs-3">Sales Per Section</h1>
            </div>
            @foreach($sections as $section)
                <div class="col">
                    <div class="card text-dark bg-light shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$section->section}}</h5>
                            <?php $countSales = 0;?>
                            @foreach($section->attendees as $attendee)
                                @foreach($attendee->entries as $entry)
                                    <?php $countSales++?>
                                @endforeach
                            @endforeach
                            <h3 class="text-center text-info fw-bolder" id="sales{{$section->id}}"></h3>
                            <input type="hidden" id="hiddenValue{{$section->id}}" value="{{$countSales * 200}}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop
@section('scripts')
<script>    

    $(document).ready(function(){
        let totalSales = {{count($entries) * 200}};
        $('.totalSales').html(numberWithCommas("P"+totalSales));

        for(let i = 1; i<={{count($sections)}}; i++){
            let value = $("#hiddenValue"+i).val();
            $("#sales"+i).html(numberWithCommas("P"+value));
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    })


    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

     
</script>
@stop
