@extends('web.layouts.app')
@section('content')

<div class="content container" style="padding-top:15px ;padding-bottom: 15px">
    <div class="register-box ">
        <div class="card" style="">
                <div class="card-header "  style=" background-image: url(https://mintfares.com/wp-content/uploads/2018/02/payment-banner.jpg); background-position-y: center;background-size: cover; background-position-x: center;     filter: inherit;">
                    <img class="logo-image" src="{{asset('assest/web/assest/images/logo.png')}}" alt='dadas'>
                    <h3>Payment</h3>    
                </div>

            <div class="card-body">
            <table class="table  table-striped">
  <thead>
  
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td>{{$data['user']->name}}</td>
     
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td>{{$data['user']->email}}</td>
      
    </tr>
    <tr>
      <th scope="row">Mobile</th>
      <td>{{$data['user']->mobile}}</td>
      
    </tr>
    <tr>
      <th scope="row">Plan Name </th>
      <td>{{$data['plan']->subscription_title}}</td>
    </tr>
    <tr>
      <th scope="row">Vaid Days</th>
      <td>{{$data['plan']->subscription_days}} days</td>
    </tr>
    <tr>
      <th scope="row">About Plan</th>
      <td>{!!$data['plan']->subscription_features!!}</td>
    </tr>
    
    <tr>
      <th scope="row">Total Amount *</th>
      <th  scope="row">{{$data['plan']->subscription_price}} ₹</th>
   
    </tr>
  </tbody>
</table>
 <button id="rzp-button1" class="btn btn-primary btn-lg btn-block">Pay</button> 
<style>
    .razorpay-payment-button{
        border-radius: 6px;
    padding: 10px;
    width: 100%;
    border: solid 1px #2871bf;
    color: white;
    background: #28a745;
    }
</style>
@php

    $dataprice= $data['plan']->subscription_price * 100;
@endphp


            </div>
        </div>
    </div>
</div>

<!-- <form action="{{ route('pay') }}" method="POST" >
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ env('RAZOR_KEY') }}"
                data-amount="{{$dataprice}}"
                currency= "INR"
                data-buttontext="Pay now {{$data['plan']->subscription_price}} ₹"
                data-name="ItSolutionStuff.com"
                data-description="Rozerpay"
                order_id="gtdetr"
                data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                data-prefill.name="name"
                data-prefill.email="email"
                data-theme.color="#3f765ae3">
        </script>
    </form>  -->
  
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

    var options = {
    "key": "{{env('RAZOR_KEY')}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$data['plan']->subscription_price}}" *100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "{{$data['user']->name}}",
    "image": "{{asset('assest/web/assest/images/logo.png')}}",
    "order_id":"{{$data['payment']->payment_id}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
 /*  "callback_url": "{{url('pay')}}", */
  //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        document.getElementById('razorpay_signature').value=response.razorpay_signature;
        document.getElementById('razorpay_payment_id').value=response.razorpay_payment_id;
        document.getElementById('razorpay_order_id').value=response.razorpay_order_id;

        document.getElementById('rezorpay_submit').click();

        
    },
    "prefill": {
        "name": "{{$data['user']->name}}",
        "email": "{{$data['user']->email}}",
        "contact": "{{$data['user']->mobile}}"
    },
    "theme": {
        "color": "#3f765ae3"
    }
};


var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<form action="{{url('pay')}}" method="post">
@csrf
    <input type="hidden" id="razorpay_signature" name="razorpay_signature">
    <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id">
    <input type="hidden" id="razorpay_order_id" name="razorpay_order_id">



    <button type="submit" id="rezorpay_submit" style="display: none;"></button>
</form>

@endsection