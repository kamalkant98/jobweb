@extends('web.layouts.app')
@section('content')
    
    <style>
        
        .imageprofile{
            width:120px;
            height:120px;
            border-radius: 50%;
            object-fit: cover;

        }
        label {
            color:black;
        }

        .attch{
            width:75px;
            height:75px;
            border-radius: 50%;
            object-fit: cover;
        }
        .attch:hover{
            border:solid 1px #00d363;
        }
        .labelprofile{
            border-radius: 50%;
            /* margin:auto; */
        }
      /**/   .imageprofile:hover{
            border:solid 1px #00d363;
        } 
        .attchbox{
            background: #f5f7fa;
            padding: 2px;
            border: solid 1px #007bff57;
            border-radius: 4px;
        }
        .attchbox:hover{
            border:solid 1px #00d363;
        }
        
        .editcover{
            position: absolute;
            right: 27px;
            bottom:2px;
        }
        .coverimageproflie{
            padding: 130px 0px 10px 10px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .editprofile{
            position: absolute;
            overflow: hidden;
            color: white;
            background: #1284ff9e;
            /* width: 100%; */
            padding: 46px;
            width: 120px;
           
            overflow: hidden;
            height: 120px;
            border-radius: 50%;
        }
        .editbox{
            display: none;
        }
        .profileimagebox{
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
        .profileimagebox:hover .editbox {
            display: block;

        }

        
    </style>
    <div class="job_details_area">
        <div class="container" >
                <div class="row">
                    <!-- this is profile nevbar list -->
                    @include('.web.pages.authprofile.profile_list_nevbar')
                    <div class="col-md-8  col-xl-9 col-lg-8 profiledata">
                    
                        <div class="summery_header">
                            <h3>Edit profile</h3>
                        </div>
                        <form class="profile-form" action="{{url('profile/edit')}}/{{$profile->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="oldstate" id="oldstate" value="{{$profile->state}}"/>
                            <input type="hidden" class="oldcity" id="oldcity" value="{{$profile->city}}"/>
                            
 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="coverimageproflie" style="background-image:url({{asset('assest/web/assest/images/cover_image/')}}/{{$profile->cover_image ?? 'profile.jpg'}});">
                                        <div class="input-group " >  
                                                
                                                <div class="profileimagebox">    
                                                    <div class="editbox"><label   class="editprofile" for="inputGroupFile03" style="color:white;"><i class="fas fa-edit fa-2x"></i></label> </div>                                                           <!--  https://jmcp.edu.pk/wp-content/uploads/2020/10/blank-profile-picture-973460_1280-300x300-1.jpg  -->
                                                        <input type="file" id="inputGroupFile03" name="profile_image" style="display:none;">
                                                <img class="imageprofile" src=" {{asset('assest/web/assest/images/profile_image/')}}/{{$profile->profile_image ?? 'profile.jpg'}} ">
                                                </div>
                                            
                                           
                                        </div> 
                                        <button type="button" class="btn btn-primary editcover"><label for="cover_image" style="color:white;"><i class="fas fa-edit"></i></label></button>
                                        <input type="file" id="cover_image" name="cover_image" style="display:none;">
                                        @error('cover_image')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                        @error('profile_image')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div> 
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label for="name" class="">Your Name</label>
                                        <input  id="name" name="name" type="text" placeholder="Name"  class="form-control " value="{{$profile->name}}">
                                        @error('name')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                     <div class=" form-group">
                                        <label for="mobile_no" class="">Mobile No</label>
                                        <input  id="mobile_no" name="mobile_no" type="text" placeholder="+91"  class="form-control " value="{{$profile->mobile}}" disabled>
                                        @error('mobile_no')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                     <div class=" form-group">
                                        <label for="date_of_birth" class="">Date of Birth</label></br>
                                       
                                        <input  id="date_of_birth" name="date_of_birth" type="date"  class="form-control " value="{{get_user_meta($profile->id,'date_of_birth')}}"> 
                                        @error('date_of_birth')
                                        <span class="help-block " style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>


                                
                                    <div class=" form-group">
                                        <label for="home_city" class="">Home City</label>
                                        <select class=" form-control @error('home_city') is-invalid @enderror" id="home_city" name="home_city" disabled>
                                            <option value="">Home City</option>
                                            
                                        </select>
                                        @error('home_city')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label for="email" class="">Email Id</label>
                                        <input  id="email" name="email" type="email" placeholder="Email"  class="form-control " value="{{$profile->email}}" disabled>
                                        @error('email')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                     <div class=" form-group">
                                        <label for="alternate_contact" class="">Alternate Contact</label>
                                        <input  id="alternate_contact" name="alternate_contact" type="text" placeholder="+91"  class="form-control @error('alternate_contact') is-invalid @enderror" value="{{get_user_meta($profile->id,'alternate_contact')}}">
                                        @error('alternate_contact')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" form-group">
                                        <label for="home_state" class="">Home State</label>
                                        <select class=" form-control @error('home_state') is-invalid @enderror" id="home_state" name="home_state">
                                            <option value="">State</option>
                                                @foreach(states() as $state)
                                                <option value="{{$state['id']}}" @if(($profile->state ?? '' ) ==$state['id']) {{'selected'}} @endif )>{{$state['name']}}</option>
                                                @endforeach
                                        </select>
                                        @error('home_state')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div> 

                                    <div class=" form-group">
                                        <label for="demo_link" class="">Demo Lecture Link</label>
                                        <input  id="demo_link" name="demo_link" type="text" placeholder="https://"  class="form-control " value="{{get_user_meta($profile->id,'demo_link')}}">
                                        @error('demo_link')
                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                              
                                <div class="col-md-4 text-center">
                                        <div class="input-group " >
                                            <div class="attchbox">
                                                <label class="labelprofile"  for="resume"><i class="fas fa-paperclip"></i><!-- <img class="attch" src="https://www.plasmatech.ir/images/GlobeSoft-CV-Icon.png"> --><strong>Attach Resume</strong></label>
                                                    @if(!empty(get_user_meta($profile->id,'resume')))
                                                       
                                                            <a href="{{ url('/download/resume')}}/{{get_user_meta($profile->id,'resume')}}"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                                        
                                                    @endif
                                            </div>
                                            <input type="file" id="resume" name="resume" style="display:none;" value="{{get_user_meta($profile->id,'resume')}}">
                                            @error('resume')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                         
                                        </div>  

                                </div>

                                <div class="col-md-4">
                                        <div class="input-group " >
                                            <div class="attchbox">
                                                <label class="labelprofile"  for="resume_cepture_image"><i class="fas fa-paperclip"></i><!-- <img class="attch" src="https://www.nicepng.com/png/detail/204-2042454_create-digital-resume-icon-circle.png"> --><strong> Resume Image</strong></label>
                                                    @if(!empty(get_user_meta($profile->id,'resume_cepture_image')))
                                                      
                                                            <a href="{{ url('/download/resume_cepture_image')}}/{{get_user_meta($profile->id,'resume_cepture_image')}}"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                                        
                                                    @endif
                                            </div>
                                            <input type="file" id="resume_cepture_image" name="resume_cepture_image" style="display:none;" value="{{get_user_meta($profile->id,'resume_cepture_image')}}">
                                            @error('resume_cepture_image')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                            
                                        </div>  
                                           

                                </div>
                                <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="attchbox">
                                            <label class="labelprofile"  for="salary_slip"><i class="fas fa-paperclip"></i><!-- <img class="attch" src="https://mpng.subpng.com/20180509/eaw/kisspng-invoice-computer-icons-medical-billing-payment-tmall-discount-volume-5af2df49e0e4d0.6946365915258663139212.jpg"> --><strong>Upload Your Last Salary Slip</strong></label>
                                                @if(!empty(get_user_meta($profile->id,'salary_slip')))
                                                   <a href="{{ url('/download/salary_slip')}}/{{get_user_meta($profile->id,'salary_slip')}}"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                                  
                                                @endif  
                                             </div>   
                                            <input type="file" id="salary_slip" name ="salary_slip" style="display:none;" value="{{get_user_meta($profile->id,'salary_slip')}}">
                                            @error('salary_slip')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                         
                                        </div>  

                                </div> 
                                <!-- <div class="col-md-4 text-center">
                                     @if(!empty(get_user_meta($profile->id,'resume')))
                                        <div>
                                            <a href=""><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4  text-center">
                                     @if(!empty(get_user_meta($profile->id,'resume_cepture_image')))
                                        <div>
                                            <a href=""><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4  text-center">
                                     @if(!empty(get_user_meta($profile->id,'salary_slip')))
                                        <div>
                                            <a href=""><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                        </div>
                                    @endif
                                </div> -->

                                <div class="col-md-12">
                                    <div class="submit_btn " style="margin-top:20px;">
                                        <button class="boxed-btn3 w-100" type="submit">Update Profile</button>
                                    </div>
                                </div>    
                            </div>
                            
                        </form>
                            

                    </div>
                </div>
        </div>
    </div> 

<script>
   
    
    $(document).ready(function(){
        
        var oldstate = $('.profile-form').find('#oldstate').val();
        var oldcity = $('.profile-form').find('#oldcity').val(); 
        $.ajax({
            headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('/city')}}/"+oldstate+"",
            type: "POST",
            success: function (data) {
                if(data.city !== ''){
                    citys=[];
                    for(var i=0;i<data.city.length;i++){
                        if(data.city[i].id == oldcity ){
                            citys.push('<option selected  value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                        }else{
                            citys.push('<option value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                        }
                        
                    }
                    $('.form-group').find('#home_city').html(citys)
                    $('#home_city').removeAttr('disabled');
                } 
            }
        });  




        $(document).on('change','#home_state',function(){
           var state_id= (this.value);
           $.ajax({
                headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('/city')}}/"+state_id+"",
                type: "POST",
                success: function (data) {
                      if(data.city !== ''){
                            citys=[];
                            for(var i=0;i<data.city.length;i++){
                                citys.push('<option value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                            }
                            $('.form-group').find('#home_city').html(citys)
                            $('#home_city').removeAttr('disabled');
                        } 
                }
            });
        });
  
    }); 

</script>     
@endsection