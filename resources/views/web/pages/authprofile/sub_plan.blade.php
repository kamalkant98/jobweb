@extends('web.layouts.app')
@section('content')



    <style>
        
        label strong{
            color:black;
        }
        .card{
            margin-bottom:15px;
        }
        .subscription_box{
            background: #efefef;
            border: solid 1px #cecece;
            border-radius: 4px;
            padding-bottom:15px;
        }
        .subscription_title_box{
            background-image:linear-gradient( -203deg,#1284ffed, #00d36385);
            font-size: 20px;
            font-weight: 500;
            color: white;
            padding: 40px 2px 40px 2px;
        }
              
        .features_box ul{
            list-style-type: none;
            margin: 0;
            padding: 5px;
           
        }
        .features_box ul li {
            border-bottom: 1px solid #2125291f;
          
            border-bottom-left-radius: 13px;
    border-bottom-right-radius: 13px;
            padding: 6px;
        }
        .features_box ul li:nth-of-type(odd) {
            background-color: #dee2e6 ;
            border-bottom-left-radius: 13px;
    border-bottom-right-radius: 13px;
        }
        .features_box ul li:last-child {
            border-bottom: none;
        }
        .paid_type{
            position: absolute;
            right: 19px;
            background: #1869a2;
            color: white;
            top: 5px;
            padding: 2px 10px;
            border-radius: 14px;
            font-size: 11px;
        }
    .Purchased_subscription{
       /*  background-image: linear-gradient( -203deg,#1284ffed, #00d36385); */
        padding:10px;
        width: 100%;
     /*    height: 210px; */
        background: #f5f7fa;
        margin-bottom:15px;
    }

    .timerOuterDiv{
        width: 275px;
        margin: auto; 
        margin-right: 0px; 
    }
    .timerDiv1{
        text-align:center; 
        margin-bottom: 10px; 
        font-size: 22px; 
        font-weight: bold;
    }
    .timerDiv{
        float: left; 
        width: 85px; 
        text-align: center; 
        font-weight: bold; 
        /*  background-image: linear-gradient( -203deg,#1284ffed, #00d36385);  */ 
        background:#1284ff61; 
        color: black; 
        border-radius: 4px; 
        margin-left: 5px; 
        padding-bottom: 13px;
    }
    .timerDiv h4{
        font-size: 20px; 
        margin: 6px 0px;
    }
    #timerDays{
        font-size: 25px; 
        margin-bottom: 0px; 
        margin-top: 0px; 
        font-weight: bold;
    }
</style>
    <div class="job_details_area">
        <div class="container" >
                <div class="row">
                    <!-- this is profile nevbar list -->
                    @include('.web.pages.authprofile.profile_list_nevbar')
                    <div class="col-md-8  col-xl-9 col-lg-8 profiledata">
                    @if(!empty($have_subscription))
                        <div class="card">
                            <div class="card-header"><h4> <i class="fas fa-check" style="color:green"></i> Actived subscription</h4></div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-7">
                                    <h5>  {{$have_subscription->subscription_title}}</h5>
                                    <small> <strong> {{$have_subscription->subscription_price}} ₹ </strong></small>
                                    {!! $have_subscription->subscription_features!!}
                                    </div>

                                    <div class="col-md-5">
                                        <div class="timerOuterDiv">
                                            <div class="timerDiv1"><h4 id="timerDays"></h4> Days</div>
                                            <div class="timerDiv"><h4 id="timerHours"></h4> Hours</div>
                                            <div class="timerDiv"><h4 id="timerMinutes"></h4> Minutes</div>
                                            <div class="timerDiv"><h4 id="timerSeconds"></h4> Seconds</div>
                                        </div>
                                    </div>

                                </div>
                                        
                            </div>

                        </div>  
                                            
                                        
                                           
                                           

                            @endif
                        @if(!empty($subscriptions))
                        <div class="row">
                           
                            @foreach($subscriptions as $subscription )
                        
                            <div class="col-md-4">
                            <span class="paid_type"> {{ucfirst($subscription->paid_type)}} </span>
                                <div class="subscription_box text-center">
                                    <div class="subscription_title_box">
                                    <h4>{{ strtoupper($subscription->subscription_title)}}</h4>

                                        @if($subscription->payment_type == 'percentage')
                                            {{ $subscription->subscription_price}} %/ {{ $subscription->subscription_days /30}} <small>months</small>
                                        @else
                                            {{ $subscription->subscription_price}} ₹/ {{round( $subscription->subscription_days / 30)}} <small>months</small>
                                        @endif
                                      
                                       
                                        
                                    </div>
                                    <div class="features_box">
                                    
                                    {!!$subscription->subscription_features!!}
                                    </div>
                                    <a href="{{url('/select_plan')}}/{{$subscription->id}}"><button type="button" sty class="btn btn-secondary ">Select Plan</button></a>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        
                    </div>
                </div>
        </div>
    </div>

    <script type="text/javascript">
var timer;
function settimer()
{
 currentTime = new Date();
 clearInterval(timer);
 var timer_month={{date('m', strtotime($have_subscription->end_time ?? '')) }};
 var timer_day={{date('d', strtotime($have_subscription->end_time ?? ''))  }};
 var timer_year={{date('Y', strtotime($have_subscription->end_time ?? ''))  }}
 var timer_hour={{date('H', strtotime($have_subscription->end_time ?? ''))  }};
 if(timer_hour=="")timer_hour=0;
 var timer_min={{date('i', strtotime($have_subscription->end_time ?? ''))  }}
 if(timer_min=="")timer_min=0;
 
 var timer_date=timer_month+"/"+timer_day+"/"+timer_year+" "+timer_hour+":"+timer_min;
 var end = new Date(timer_date); // Arrange values in Date Time Format
 var now = new Date(); // Get Current date time
 var second = 1000; // Total Millisecond In One Sec
 var minute = second * 60; // Total Sec In One Min
 var hour = minute * 60; // Total Min In One Hour
 var day = hour * 24; // Total Hour In One Day
 
 function showtimer() {
 var now = new Date();
 var remain = end - now; // Get The Difference Between Current and entered date time
 if(remain < 0)
 {
 clearInterval(timer);
 //document.getElementById("timer_value").innerHTML = 'Reached!';
 return;
 }
 var days = Math.floor(remain / day); // Get Remaining Days
 var hours = Math.floor((remain % day) / hour); // Get Remaining Hours
 var minutes = Math.floor((remain % hour) / minute); // Get Remaining Min
 var seconds = Math.floor((remain % minute) / second); // Get Remaining Sec
 document.getElementById("timerDays").innerHTML = days;
 document.getElementById("timerHours").innerHTML = hours;
 document.getElementById("timerMinutes").innerHTML = minutes;
 document.getElementById("timerSeconds").innerHTML = seconds;
 }
 timer = setInterval(showtimer, 1000); // Display Timer In Every 1 Sec
}
settimer();
</script>
@endsection