@extends('web.layouts.app')
@section('content') 
<div class="content container" style="padding-top:15px ;padding-bottom: 15px">
    <div class="register-box ">
        <div class="card" style="">
                <div class="card-header text-center">
                    <img class="logo-image" src="{{asset('assest/web/assest/images/logo.png')}}" alt='dadas'>
                    <h5>Compnay Register</h5>    
                </div>
                <div class="card-body">
                                     
                                        <form class="" action="{{url('employer_create')}}" method="post" enctype="multipart/form-data">
                                         @csrf
                                            <input type="hidden" name="userid" value="{{$edit_employer->id ?? '' }}">
                                            <div class="form-row">
                                            <div class="col-md-6 text-center">
                                                    @if(isset($edit_employer))
                                                        @if(!empty($edit_employer->profile_image))
                                                            <img class="profile" src="{{asset('assest/web/assest/images/profile_image')}}/{{$edit_employer->profile_image}}" alt="dont have image" title="cover image">
                                                       

                                                        @endif
                                                        @endif
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    @if(isset($edit_employer))
                                                        @if(!empty($edit_employer->cover_image))
                                                            <img class="cover" src="{{asset('assest/web/assest/images/cover_image')}}/{{$edit_employer->cover_image}}" alt="dont have image" title="cover image">
                                                       

                                                        @endif
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <!-- <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="profile_image" class="">profile image</label>
                                                        <input  id="profile_image" name="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" value="{{$edit_employer->profile_image ?? '' }}">
                                                        @error('profile_image')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> -->
                                              <!--   <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="cover_image" class="">cover image</label>
                                                        <input  id="cover_image" name="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" value="{{$edit_employer->cover_image ?? '' }}">
                                                        @error('cover_image')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            -->
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                
                                                        <label for="employer_name" class="">Employer Name</label>
                                                        <input name="employer_name" id="employer_name" placeholder="Employer name" type="text" class="form-control @error('employer_name') is-invalid @enderror" value="{{old('employer_name')}}">
                                                        @error('employer_name')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="email" class=""> Employer Email</label>
                                                        <input name="email" id="email" placeholder=" Employer email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" >
                                                        @error('email')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="empolyer_password" class="">Employer password *</label>
                                                        <input name="empolyer_password" id="empolyer_password" placeholder=" Employer password" type="password" class="form-control @error('empolyer_password') is-invalid @enderror" value="{{old('empolyer_password')}}" >
                                                        @error('empolyer_password')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                
                                                        <label for="employer_mobile" class="">Employer Mobile</label>
                                                        <input name="employer_mobile" id="employer_mobile" placeholder="+91" type="text" class="form-control @error('employer_mobile') is-invalid @enderror" value="{{old('employer_mobile') }}">
                                                        @error('user_mobile')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="employer_website" class=""> Repeat Password *</label>
                                                        <input type="password" class="form-control" id="employer_website"  placeholder="Employer website" name="password_confirmation" >
                                                        @error('password_confirmation')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="employer_website" class=""> Employer website</label>
                                                        <input name="employer_website" id="employer_website" placeholder="Employer website" type="text" class="form-control @error('employer_website') is-invalid @enderror" value="{{old('employer_website')}}" >
                                                        @error('employer_website')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="employee_working" class="">No. Of Employee Working</label>
                                                        <input name="employee_working" id="employee_working" placeholder="No. Of Employee Working" type="text" class="form-control @error('employee_working') is-invalid @enderror" value="{{old('employee_working')}}" >
                                                        @error('employee_working')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                               <!--  <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="salary_day" class="">Salary Day</label>
                                                        <input name="salary_day" id="salary_day" placeholder="Salary day" type="text" class="form-control @error('salary_day') is-invalid @enderror" value="{{old('salary_day')}}" >
                                                        @error('salary_day')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> -->
                                                
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                
                                                        <label for="salary_day" class="">Salary Day</label>
                                                            <select class=" form-control @error('salary_day') is-invalid @enderror" id="salary_day" name="salary_day">
                                                                <option value="">Choose Salary Day</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3 </option>
                                                                <option value="4">4 </option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                


                                                            </select>
                                                            @error('employer_level')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                
                                                        <label for="employer_level" class="">Employer Level</label>
                                                            <select class=" form-control @error('employer_level') is-invalid @enderror" id="employer_level" name="employer_level">
                                                                <option value="">Choose Level</option>
                                                                <option value="1" >Level 1</option>
                                                                <option value="2" >Level 2</option>
                                                                <option value="3" >Level 3 </option>
                                                                <option value="4" >Level 4 </option>
                                                                <option value="5" >Level 5</option>

                                                            </select>
                                                            @error('employer_level')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="contact_person_name" class="">Contact Person Name</label>
                                                        <input name="contact_person_name" id="contact_person_name" placeholder="Contact Person Name" type="text" class="form-control @error('contact_person_name') is-invalid @enderror" value="{{old('contact_person_name')}}" >
                                                        @error('contact_person_name')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                
                                                        <label for="State" class="">State</label>
                                                            <select class="form-control @error('State') is-invalid @enderror" id="State" name="State">
                                                                <option value="">Choose State</option>
                                                                @foreach (states() as $state)
                                                                <option value="{{$state['id']}}">{{$state['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('State')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="contact_person_designation" class="">Contact Person Designation</label>
                                                        <input name="contact_person_designation" id="contact_person_designation" placeholder="Contact Pesron Designation" type="text" class="form-control @error('contact_person_designation') is-invalid @enderror" value="{{old('contact_person_designation')}}" >
                                                        @error('contact_pesron_designation')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                
                                                        <label for="City" class="">City</label>
                                                            <select class=" form-control @error('City') is-invalid @enderror" id="City" name="City" disabled>
                                                            <option value="">Choose City</option>
                                                                
                                                            </select>
                                                            @error('City')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="contact_person_email" class="">Contact Person Email</label>
                                                        <input name="contact_person_email" id="contact_person_email" placeholder="Contact Person Email" type="email" class="form-control @error('contact_person_email') is-invalid @enderror" value="{{old('contact_person_email')}}" >
                                                        @error('contact_person_email')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <label for="" class="">Status</label>
                                                            <select  class=" form-control @error('status') is-invalid @enderror" name="status">
                                                                <option value="">Select</option>
                                                                <option value="1" >Active</option>
                                                                <option value="0" >Deactive</option>
                                                            </select>
                                                            @error('status')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div> -->

                                                <!-- <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <label for="" class="">Premium Status</label>
                                                            <select  class=" form-control @error('premium_status') is-invalid @enderror" name="premium_status">
                                                                <option value="">Premium Status</option>
                                                                <option value="1" >Active</option>
                                                                <option value="0" >Deactive</option>
                                                            </select>
                                                            @error('premium_status')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div> -->

                                                <!-- <div class="col-md-2">
                                                    <div class="position-relative form-group">
                                                        <label for="" class="">Profile Status</label>
                                                            <select  class=" form-control @error('profile_status') is-invalid @enderror" name="profile_status">
                                                                <option value="">Profile Status</option>
                                                                <option value="1" >Active</option>
                                                                <option value="0" >Deactive</option>
                                                            </select>
                                                            @error('profile_status')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="contact_person_mobile" class="">Contact Person Mobile</label>
                                                        <input name="contact_person_mobile" id="contact_person_mobile" placeholder="+91" type="text" class="form-control @error('contact_person_mobile') is-invalid @enderror" value="{{old('contact_person_mobile') }}">
                                                        @error('contact_person_mobile')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="position-relative form-group col-md-6">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control   @error('address') is-invalid @enderror " name="address" id="address" rows="3" placeholder="Address">{{ old('address')}}</textarea>
                                                    @error('address')
                                                    <span class="help-block " style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group ">
                                                        <label for="exampleCity" class="">Employer Description</label>
                                                        <textarea id="description" name="description" class="form-control " id="exampleFormControlTextarea1" rows="2" placeholder="">{{old('description')}}</textarea>
                                                        @error('description')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
            <!-- <div class="card-body">
                <form method="POST" action="{{ route('user_register') }}" id="loginForm">
                    @csrf
                    <input type="hidden" name="usertype" value="1">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Name *</strong></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                                        
                             <div class="form-group">             
                                <label> <Strong>Email *</Strong> </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"> 
                                @error('email')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">             
                                <label> <Strong>Mobile *</Strong> </label>
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="+91" name="mobile" value="{{ old('mobile') }}"> 
                                @error('mobile')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                                        
                            <div class="form-group">                  
                                <label> <strong>Password *</strong> </label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">                  
                                <label> <strong>Repeat Password *</strong> </label>
                                <input type="password" class="form-control" name="password_confirmation" >
                            </div>

                            <div class="form-group">   
                                <label> <strong>Current Drawn Salary (Annual)</strong> </label>        
                                <select class="form-control @error('current_salary') is-invalid @enderror" aria-label="Default select example" name="current_salary">
                                    <option selected value="">Select current salary</option>
                                    @for ($i = 1; $i < 100; $i++)
                                    <option  value="{{$i}}"> {{$i}} Lakhs</option>
                                    @endfor
                                </select>
                                @error('current_salary')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">   
                                <label> <strong>State *</strong> </label>        
                                <select class="form-control @error('state') is-invalid @enderror" aria-label="Default select example" id="state" name="state">
                                    <option selected value="">Select State</option>
                                    @foreach (states() as $state)
                                        <option value="{{$state['id']}}" >{{$state['name']}}</option>
                                    @endforeach
                                </select>
                                @error('state')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">   
                                <label> <strong>city *</strong> </label>        
                                <select class="form-control @error('city') is-invalid @enderror" aria-label="Default select example" id="city" name='city' disabled>
                                    <option selected value="">Open this select menu</option>
                                   
                                </select>
                                @error('city')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">   
                                <label> <strong>Industry *</strong> </label>        
                                <select class="form-control @error('industry') is-invalid @enderror" aria-label="Default select example" id="industry" name="industry">
                                    <option  value="">Select industry</option>
                                    @foreach (maincategory() as $maincategory)
                                        <option value="{{$maincategory['id']}}" >{{$maincategory['name']}}</option>
                                    @endforeach
                                </select>
                                @error('industry')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">   
                                <label> <strong>Job Category *</strong> </label>        
                                <select class="form-control @error('job_category') is-invalid @enderror" aria-label="Default select example" id="job_category" name="job_category" disabled>
                                    <option  value="">Select job category</option>
                                   
                                </select>
                                @error('job_category')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">   
                                <label> <strong>Expected Salary (Annual)</strong> </label>        
                                <select class="form-control @error('expected_salary') is-invalid @enderror" aria-label="Default select example" name="expected_salary">
                                    <option value="">Select expected salary</option>
                                    @for ($i = 1; $i < 100; $i++)
                                    <option  value="{{$i}}"> {{$i}} Lakhs</option>
                                    @endfor
                                    
                                </select>
                                @error('expected_salary')
                                <span class="help-block small" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class=" form-group text-center">
                    <button class="mb-2 mr-2 btn btn-primary btn-block" type="submit">Register</button>
                    </div>
                </form>
            </div> -->
        </div>
    </div>
</div>


<script>

       

    CKEDITOR.replace('description');
    
 /*    $(document).ready(function(){
        
        $(document).on('change','#State',function(){
           var state_id= (this.value);
           $.ajax({
                headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('admin/city')}}/"+state_id+"",
                type: "POST",
                success: function (data) {
                      if(data.city !== ''){
                            city=[];
                            for(var i=0;i<data.city.length;i++){
                                city.push('<option value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                            }
                            $('.form-group').find('#City').html(city)
                            $('#City').removeAttr('disabled');
                        } 
                }
            });
        });
    }); */

  
    $(document).on('change','#State',function(){
           var state_id= (this.value);
           $.ajax({
                headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('/city')}}/"+state_id+"",
                type: "POST",
                success: function (data) {
                      if(data.city !== ''){
                            city=[];
                            for(var i=0;i<data.city.length;i++){
                                city.push('<option value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                            }
                            $('.form-group').find('#City').html(city)
                            $('#City').removeAttr('disabled');
                        } 
                }
            });
        }); 


        $(document).on('change','#industry',function(){
           var industry_id= (this.value);
           $.ajax({
                headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('/job_category')}}/"+industry_id+"",
                type: "POST",
                success: function (data) {
                      if(data.category !== ''){
                        categotys=[];
                            for(var i=0;i<data.category.length;i++){
                                categotys.push('<option value="'+ data.category[i].id+'">'+data.category[i].name+'</option>');
                            }
                            $('.form-group').find('#job_category').html(categotys)
                            $('#job_category').removeAttr('disabled');
                        } 
                }
            });
        });

</script>
    
   


@endsection