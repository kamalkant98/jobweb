
@extends('web.layouts.app')
@section('content')  
    <div class="content container-fluid" style="padding-top: 15px;padding-bottom: 15px">
        <div  class="login-box ">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class=" card">
                        <div class="card-body">
                            <div class="image-box">
                                <img class="logo-image" src="{{asset('assest/web/assest/images/logo.png')}}" alt='dadas'>
                                <h5>Login</h5>    
                            </div>
                        
                            <form class=" login-form" action="{{route('loginuser')}}" method="post">
                            @csrf
                                    <div class="from-group">
                                        <label for="validationCustom01">Email</label>
                                        <input type="text" class="form-control @error('login') is-invalid @enderror " id="validationCustom01" placeholder="@email" name="login" value="{{ old('login','') }}" >
                                        @error('login')
                                            <span class="help-block small" style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="from-group">
                                        <label for="validationCustom02">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="validationCustom02" placeholder="Password" name="password" value="" >
                                        @error('password')
                                            <span class="help-block small" style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                    <p class="forgot-pass mb-0">
                                        <a href="#" class="text-dark font-weight-bold">Forgot password ?</a>
                                    </p>
                                </div>
                                <button class="mb-2 mr-2 btn btn-primary btn-block" type="submit">login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        

@endsection