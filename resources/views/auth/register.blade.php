@extends('web.layouts.app')
@section('content') 
<div class="content container" style="padding-top:15px ;padding-bottom: 15px">
    <div class="register-box ">
        <div class="card" style="">
                <div class="card-header text-center">
                    <img class="logo-image" src="{{asset('assest/web/assest/images/logo.png')}}" alt='dadas'>
                    <h5>Register</h5>    
                </div>

            <div class="card-body">
                <form method="POST" action="{{ route('user_register') }}" id="loginForm">
                    @csrf
                    <input type="hidden" name="usertype" value="2">
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
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('change','#state',function(){
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
                            $('.form-group').find('#city').html(city)
                            $('#city').removeAttr('disabled');
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