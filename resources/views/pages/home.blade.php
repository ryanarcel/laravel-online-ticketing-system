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
    #main-ticket{
        width:1000px;
        height: 323px;
    }
    .header{
        width:100%;
        align-content: center;
    }
    .panel-1, .panel-2{
        border:0px;
        border-radius: 15px;
        padding: 20px 50px 20px 50px;
        background-color: #fff;
    }
    .ticketQuantity{
        height: 40px;
        width: 70px;
        border-radius: 5px;
        margin-left: 10%; 
    }
    #login-link{
        text-decoration: none;
        font-size: 14px;
        display:none;
    }
    .seals{
        height: 100px;
    }
    .mechanics, .mechanics-header {
        font-family: 'Roboto', sans-serif;
        padding: 10px 60px 10px 60px;
    }
    .mechanics p, ul li, h5 {
        margin-top: 0px;
        margin-bottom: 5px;
        font-size: 15px;
        color: #fff;
    }

</style>    
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 offset-md-2 offset-lg-2 ">
                
                <form action="{{route('submitDisclaimer')}}" method="post" id="theForm">
                    @method('POST')
                    @csrf
                <div class="panel-1 mt-2">
                        <i class="bi bi-three-dots-vertical fs-4 text-secondary" onClick="$('#login-link').fadeToggle(500)"></i>
                        <div id="login-link">
                            <a href="{{route('login-page')}}" >Login as section representative</a><br/>
                            <a href="{{route('login-for-sponsor')}}" >Login to manage sponsors</a>
                        </div>
                        <center><img src="{{asset('image/seals.png')}}" class="seals"></center>
                    <div class="header mb-5 mt-5">
                        <center>
                            
                            <h3 class="text-primary fw-bold">Assumption College of Davao</h3>
                            <h4 class="text-primary fw-bold">Grand Alumni Homecoming 2021</h4>
                            <p class="text-primary">By ACD batch 1996</p>
                        </center>
                    </div>
                        <div class="form-group">
                            <p >
                            By signing up to this form, I give consent to Assumption College of Davao and its agents to collect, process, and protect my personal information. This is in accordance with the Privacy Policy of the institution and the Data Privacy Act of 2012.
                            </p>
                            <input type="checkbox" name="data_privacy_1" id="data_privacy_1"> Agree
                        </div>
                        <div class="form-group mt-5 ">
                            <p>
                                The following page contains personal information of alumni and other stakeholders of Assumption College of Davao. Such information are to be used exclusively for the purpose of this event. Any unauthorized use of such information (such as identity theft, etc.) is punishable by law.
                            </p>
                            <input type="checkbox" name="data_privacy_2" id="data_privacy_2"> I affirm
                        </div>
                        <center>
                            <button type="button" class="btn btn-primary text-white" id="nextButtonPanel1" disabled ata-bs-toggle="modal" data-bs-target="#sliderModal">
                                Next
                            </button>
                        </center>

                        <!-- Modal -->
                        <div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-body">

                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        
                                        <div class="card bg-primary">
                                          
                                            <div class="card-body mechanics ">
                                            <center><img src="{{asset('image/seals.png')}}" style="height: 80px" class="seals mb-3" alt=""></center>
                                            <h5 class="fw-bold mb-3 fs-5">MECHANICS AND GUIDELINES FOR THE RAFFLE DRAW</h5>

                                                <p>1. Raffle duration is from July 31, 2021 to November 15, 2021.</p>
                                                <p>2. The deadline for the filling-in of ticket links is on November 15, 2021.</p>
                                                <p>3. The online raffle links submitted after the deadline shall be disqualified from the raffle draw.</p>
                                                <p>4. The raffle draw shall be on December 4, 2021, during the ACD Global Grand Alumni Virtual Homecoming via TAMBIOLO.</p>
                                                <p>5. Only the holder or the authorized representative indicated of the winning ticket shall claim the prize.</p>
                                                <p>6. Participants cannot win two 2 (two) major prizes. If the name is drawn more than once, the participant may choose between 2 prizes drawn. However, minor prize winners are still eligible to win the major prize.</p>
                                                <p>7. Winners shall be notified through her or his indicated email account and phone number. Winners/ representatives must show two (2) valid IDs for verification.</p>
                                                <p>8. All winners of the major prizes can be convertible to cash.</p>
                                                    <ul>
                                                        <li>1st prize: P70,000</li>
                                                        <li>2nd prize:P50,000</li>
                                                        <li>3rd prize: P30,000</li>
                                                    </ul>
                                                <p>9. All prizes shall be tax inclusive.</p>
                                                <p>10. Unclaimed prizes for 60 days shall be forfeited in favor of the Alumni Association of the ACD. </p>

                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset('image/newLayout.png')}}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Proceed">
                            </div>
                            </div>
                        </div>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>

<div class="modal" tabindex="-1" id="successPWModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <p>Password changed successfully. Please log in again.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
      </div>
    </div>
  </div>
</div>


@stop
@section('scripts')
<script>
$(document).ready(function(){
    let totalChecks = 0;
    for(let i = 1; i<=2; i++){
        
        $('#data_privacy_'+i).click(function(){

            if($(this).prop('checked') == true){
                totalChecks += 1;
                console.log(totalChecks);
                if(totalChecks == 2){
                   $("#nextButtonPanel1").removeAttr('disabled');
                }
            }
            else{
                totalChecks -= 1;
                $("#nextButtonPanel1").attr('disabled', true);
            }
        });
    }

    $("#nextButtonPanel1").click(function(){
        $("#sliderModal").modal('show');
    })
   
    let url = window.location.href;
    let myArr = url.split("?");

    if(myArr[1] === "changed"){
        $("#successPWModal").modal('show');
    }

});


</script>
@stop