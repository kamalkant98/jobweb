
@extends('web.layouts.app')
@section('content')  
<style>
    .toggleText{
        position: absolute;
        right: 23px;
        color: #1284ff;
    }
</style>
    <div class="content container-fluid" style="padding-top: 15px;padding-bottom: 15px">
        <div  class="login-box ">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class=" card">
                        <div class="card-body">
                            <div class="image-box">
                                <img class="logo-image" src="{{asset('assest/web/assest/images/logo.png')}}" alt='dadas'>
                                <h5> Forgot Password</h5> 
                                
                                Enter the email associated with your Jobweb account and we'll send you instructions to reset your password.   
                            </div>
                        
                            <form class=" login-form" action="{{route('forgot_password_set_link')}}" method="post">
                            @csrf
                                    <div class="from-group">
                                        <label for="validationCustom01">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror " id="validationCustom01" placeholder="@email" name="email" value="{{ old('email','') }}" >
                                        @error('email')
                                            <span class="help-block small" style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   <!--  <div class="form-group">
                                        <label for="validationCustom02">Password</label> <span class="password-show"><label for="toggle"><span class='toggleText'><i class="far fa-eye"></i></span></label><input type='checkbox' class="toggle" id='toggle' value='0' style="display: none;"></span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="validationCustom02" placeholder="Password" name="password" value="" >
                                        @error('password')
                                            <span class="help-block small" style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div> -->
                                    <!-- <div class="d-flex justify-content-between">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                    <p class="forgot-pass mb-0">
                                        <a href="#" class="text-dark font-weight-bold">Forgot password ?</a>
                                    </p> 
                                </div>-->
                                <button class="mb-2 mr-2 btn btn-primary btn-block" type="submit">login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
<script>
    $(document).ready(function(){
        $(".toggle").change(function(){
        
        if($(this).is(':checked')){
            var kam=  $(this).parents('.form-group').find('input[type="password"]').attr('type','text') 
            $(".toggleText").html('<i class="far fa-eye-slash"></i>');
        }else{
            $(this).parents('.form-group').find('input[type="text"]').attr('type','password');
            $(".toggleText").html('<i class="far fa-eye"></i>');
        }
        
        });
    });
</script>
@endsection