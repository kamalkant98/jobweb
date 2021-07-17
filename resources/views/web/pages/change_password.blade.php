@extends('web.layouts.app')
@section('content')



    <style>
        
        label strong{
            color:black;
        }
        .card{
            margin-bottom:15px;
        }
        .not_found{
            text-align: center;
            margin: auto;
            color: #1284ff;
            padding: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .toggleText{
        position: absolute;
        right: 15px;
        color: #1284ff;
    }
</style>
        <div class="job_details_area">
            <div class="container" >
                <div class="row">
                    <!-- this is profile nevbar list -->
                    @include('.web.pages.authprofile.profile_list_nevbar')
                    <div class="col-md-8  col-xl-9 col-lg-8 profiledata">
                        <div class="card" style="">
                            <div class="card-header">
                                    Change Password
                            </div>
                            <div class="card-body">
                            <form action="{{url('/changepassword')}}" method="post" >
                            @csrf
                                <div class="row">
                                    

                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="oldpassword" class=""><strong>Old password</strong></label><span class="password-show"><label for="toggle1"><span class='toggleText'><i class="far fa-eye"></i></span></label><input type='checkbox' class="toggle" id='toggle1' value='0' style="display: none;"></span>
                                            <input name="oldpassword" id="oldpassword" placeholder="old password" type="password" class="form-control @error('oldpassword') is-invalid @enderror" value="{{old('oldpassword')}}">
                                            @error('oldpassword')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="password" class=""><strong>New password</strong></label> <span class="password-show"><label for="toggle2"><span class='toggleText'><i class="far fa-eye"></i></span></label><input type='checkbox' class="toggle" id='toggle2' value='0' style="display: none;"></span>
                                            <input name="password" id="password" placeholder="New password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                                            @error('password')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="password_confirmation" class=""><strong>New Re-password</strong></label><span class="password-show"><label for="toggle3"><span class='toggleText'><i class="far fa-eye"></i></span></label><input type='checkbox' class="toggle" id='toggle3' value='0' style="display: none;"></span>
                                            <input name="password_confirmation" id="password_confirmation" placeholder="Re-password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}">
                                            @error('password_confirmation')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>     
                                <button type="submit" class="mt-2 btn btn-primary">submit</button>    
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
            $(this).parents('.form-group').find('input[type="password"]').attr('type','text') 
            $(this).parents('.form-group').find(".toggleText").html('<i class="far fa-eye-slash"></i>');
        }else{
            $(this).parents('.form-group').find('input[type="text"]').attr('type','password');
            $(this).parents('.form-group').find(".toggleText").html('<i class="far fa-eye"></i>');
        }
        
        });
    });
</script>   
@endsection