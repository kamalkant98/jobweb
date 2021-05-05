@extends('admin.layouts.app')
@section('content')

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                        <div class="page-title-icon">
                                        <i class="fas fa-briefcase"></i>
                                            </div>Job</div>
                                <div class="page-title-actions">
                                    <a href="{{url('admin/all_job')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                                </div>
                            </div>
                        </div>  
                            
                        <div class="card" style="padding:10px;">
                            <div class="card-body">
                                     
                                        <form class="" action="{{url('admin/create_job')}}" method="post" enctype="multipart/form-data">
                                         @csrf
                                         <input type="hidden" name="jobid" id="jobid" value="{{$jobedit->id ?? ''}}">
                                         <input type="hidden" name="" id="oldstate" value="{{$jobedit->state?? ''}}">
                                         <input type="hidden" name="" id="oldcity" value="{{$jobedit->city ?? ''}}">
                                         <input type="hidden" name="" id="oldstateprosess" value="{{$jobedit->process_state ?? ''}}">
                                         <input type="hidden" name="" id="oldcityprosess" value="{{$jobedit->process_city ?? ''}}">
                                         
                                           <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="job_title" class="">Job Title</label>
                                                        <input  id="job_title" name="job_title" type="text" placeholder="Job title" class="form-control @error('job_title') is-invalid @enderror" value="{{old('job_title') ?? $jobedit->job_title ?? ''}}">
                                                        @error('job_title')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="employer" class="">Employer</label>
                                                            <select class=" form-control @error('employer') is-invalid @enderror" id="employer" name="employer">
                                                                <option value="">Choose employer</option>
                                                                    @foreach(getemployer() as $employer)
                                                                   
                                                                    <option value="{{$employer->id}}"  @if(($jobedit->employer ?? '' ) == $employer->id) {{'selected'}} @endif>{{$employer->name}}</option>
                                                                    @endforeach

                                                            </select>
                                                            @error('employer')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="category" class="">Category</label>
                                                            <select class=" form-control @error('category') is-invalid @enderror" id="category" name="category">
                                                                <option value="">Choose category</option>
                                                               @foreach(allcategory() as $category)
                                                               <option value="{{$category->id}}" @if(($jobedit->category ?? '' ) == $category->id) {{'selected'}} @endif>{{$category->name}}</option>

                                                               @endforeach

                                                            </select>
                                                            @error('category')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="subject" class="">Subject</label>
                                                            <select class=" form-control @error('subject') is-invalid @enderror" id="subject" name="subject">
                                                                <option value="">Choose subject</option>
                                                                @foreach(allqualification() as $qualification )
                                                                    <option value="{{$qualification->id}}" @if(($jobedit->subject ?? '' ) == $qualification->id) {{'selected'}} @endif>{{$qualification->qualification_name}}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('subject')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="minimum_qualifaction" class="">Minimum Qualification</label>
                                                            <select class=" form-control @error('minimum_qualifaction') is-invalid @enderror" id="minimum_qualifaction" name="minimum_qualifaction">
                                                                <option value="">Choose qualification</option>
                                                                @foreach(allqualification() as $qualification )
                                                                    <option value="{{$qualification->id}}" @if(($jobedit->minimum_qualifaction ?? '' ) == $qualification->id) {{'selected'}} @endif>{{$qualification->qualification_name}}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('minimum_qualifaction')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="job_type" class="">Job Type</label>
                                                            <select class=" form-control @error('job_type') is-invalid @enderror" id="job_type" name="job_type">
                                                                <option value="">Choose job type</option>
                                                                <option value="full time" @if(($jobedit->job_type ?? '' ) == 'full time') {{'selected'}} @endif>Full Time</option>
                                                                <option value="part time" @if(($jobedit->job_type ?? '' ) == 'part time') {{'selected'}} @endif>Part Time</option>
                                                                

                                                            </select>
                                                            @error('job_type')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                    
                                                    <div class="position-relative form-group">
                                                        <label for="no_of_requirement" class="">No of Requirement</label>
                                                        <input  id="no_of_requirement" name="no_of_requirement" type="text" class="form-control @error('no_of_requirement') is-invalid @enderror" value="{{old('no_of_requirement') ?? $jobedit->no_of_requirement ?? ''}}">
                                                        @error('no_of_requirement')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    
                                                    <label class="">Experience in year</label>
                                                        <div class="form-row">
                                                            <div class="position-relative form-group col-md-6">
                                                            <input  id="experience_minimum" name="experience_minimum"  placeholder="Minimum" type="number" class="form-control @error('experience_minimum') is-invalid @enderror" value="{{old('experience_minimum') ?? $jobedit->experience_minimum ?? ''}}">
                                                                @error('experience_minimum')
                                                                <span class="help-block " style="color:red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="position-relative form-group col-md-6">
                                                            <input  id="experience_maximum" name="experience_maximum" placeholder="Maximum" type="number" class="form-control @error('experience_maximum') is-invalid @enderror" value="{{old('experience_maximum') ?? $jobedit->experience_maximum ?? ''}}">
                                                                @error('experience_maximum')
                                                                <span class="help-block " style="color:red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                    
                                                         <label for="" class="">Select Salary Type</label>
                                                        <div class="position-relative form-group">
                                                        
                                                        &nbsp;&nbsp; <input   name="salary_type" type="radio" id="hourly"  value="hourly" @if(($jobedit->salary_type ?? '' ) == 'hourly') {{'checked'}} @endif><label for="hourly" >Hourly </label> &nbsp;
                                                                    <input   name="salary_type" type="radio" id="weekly"  value="Weekly"  @if(($jobedit->salary_type ?? '' ) == 'weekly') {{'checked'}} @endif><label for="weekly">Weekly </label>  &nbsp;
                                                                    <input   name="salary_type" type="radio" id="monthly" value="Monthly"  @if(($jobedit->salary_type ?? '' ) == 'Monthly') {{'checked'}} @endif><label for="monthly">Monthly </label>  &nbsp;
                                                                    <input   name="salary_type" type="radio" id="annually"  value="Annually"  @if(($jobedit->salary_type ?? '' ) == 'Annually') {{'checked'}} @endif><label for="annually">Annually </label>  &nbsp;
                                                            </br>
                                                            @error('salary_type')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>


                                                    <label class="">Salary L/A</label>
                                                        <div class="form-row">
                                                            <div class="position-relative form-group col-md-6">
                                                            <input  id="salary_minimum" name="salary_minimum"  placeholder="Minimum" type="number" class="form-control @error('salary_minimum') is-invalid @enderror" value="{{old('salary_minimum')  ?? $jobedit->salary_minimum ?? ''}}">
                                                                @error('salary_minimum')
                                                                <span class="help-block " style="color:red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="position-relative form-group col-md-6">
                                                            <input  id="salary_maximum" name="salary_maximum" placeholder="Maximum" type="number" class="form-control @error('salary_maximum') is-invalid @enderror" value="{{old('salary_maximum') ?? $jobedit->salary_maximum ?? ''}}">
                                                                @error('salary_maximum')
                                                                <span class="help-block " style="color:red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    <div class="position-relative form-group">
                                                
                                                        <label for="state" class="">State</label>
                                                            <select class=" form-control @error('state') is-invalid @enderror" id="state" name="state">
                                                                <option value="">Choose State</option>
                                                                @foreach (states() as $state)
                                                                <option value="{{$state['id']}}" @if(($jobedit->state ?? '' ) == $state['id']) {{'selected'}} @endif>{{$state['name']}}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('state')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                
                                                        <label for="city" class="">City</label>
                                                            <select class=" form-control @error('city') is-invalid @enderror" id="city" name="city" disabled>
                                                                <option value="">Choose City</option>
                                                             </select>
                                                            @error('city')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>


                                                    <div class="position-relative form-group">
                                                        <label for="meta_title" class="">Meta Title</label>
                                                        <input  id="meta_title" name="meta_title" type="text" placeholder="Meta Title"  class="form-control @error('meta_title') is-invalid @enderror" value="{{old('meta_title') ?? $jobedit->meta_title ?? ''}}">
                                                        @error('meta_title')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>   

                                                    <div class="position-relative form-group">
                                                        <label for="meta_description" class="">Meta Description</label>
                                                        <input  id="meta_description" name="meta_description" type="text"  placeholder="Meta Description" class="form-control @error('meta_description') is-invalid @enderror" value="{{old('meta_description') ?? $jobedit->meta_description ?? ''}}">
                                                        @error('meta_description')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div> 

                                                    <div class="position-relative form-group">
                                                        <label for="meta_keywords" class="">Meta Keywords</label> 
                                                        <input  id="meta_keywords" name="meta_keywords" type="text" placeholder="Meta Keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{old('meta_keywords') ?? $jobedit->meta_keywords ?? ''}}">
                                                        @error('meta_keywords')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div> 
                                                    <div class="position-relative form-group">
                                                        <label for="og_title" class="">Og Title</label>
                                                        <input  id="og_title" name="og_title" type="text" placeholder="Og Title" class="form-control @error('og_title') is-invalid @enderror" value="{{old('og_title') ?? $jobedit->og_title ?? ''}}">
                                                        @error('og_title')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div> 

                                                    <div class="position-relative form-group">
                                                        <label for="og_description" class="">Og Description</label>
                                                        <input  id="og_description" name="og_description" type="text" placeholder="Og Description" class="form-control @error('og_description') is-invalid @enderror" value="{{old('og_description') ?? $jobedit->og_description ?? ''}}">
                                                        @error('og_description')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div> 

                                                    <div class="position-relative form-group">
                                                        <label for="og_keywords" class="">Og Keywords</label>
                                                        <input  id="og_keywords" name="og_keywords" type="text" placeholder="Og Keywords" class="form-control @error('og_keywords') is-invalid @enderror" value="{{old('og_keywords') ?? $jobedit->og_keywords ?? ''}}">
                                                        @error('og_keywords')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div> 

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="selection_process" class="">Selection Process</label>
                                                        <input  id="selection_process" name="selection_process" type="text" placeholder="Selection Process" class="form-control @error('selection_process') is-invalid @enderror" value="{{old('selection_process') ?? $jobedit->selection_process ?? ''}}">
                                                        @error('selection_process')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="process_address" class="">Process Address</label>
                                                        <input  id="process_address" name="process_address" type="text" placeholder="Process Address" class="form-control @error('process_address') is-invalid @enderror" value="{{old('process_address') ?? $jobedit->process_address ?? ''}}">
                                                        @error('process_address')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="process_state" class="">Process State</label>
                                                            <select class=" form-control @error('process_state') is-invalid @enderror" id="process_state" name="process_state">
                                                                <option value="">Choose Process State</option>
                                                                @foreach (states() as $state)
                                                                <option value="{{$state['id']}}" @if(($jobedit->process_state ?? '' ) == $state['id']) {{'selected'}} @endif>{{$state['name']}}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('process_state')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="process_city" class="">Process City</label>
                                                            <select class=" form-control @error('process_city') is-invalid @enderror" id="process_city" name="process_city" disabled> 
                                                                <option value="">Choose Process City</option>
                                                              

                                                            </select>
                                                            @error('process_city')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="position-relative form-group ">
                                                        <label for="job_description" class="">Job Description</label>
                                                        <textarea id="job_description" name="job_description" class="form-control "  rows="2" placeholder="">{{old('job_description') ?? $jobedit->job_description ?? ''}}</textarea>
                                                        @error('job_description')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="position-relative form-group ">
                                                        <label for="document_requirement" class="">Document Requirement</label>
                                                        <textarea id="document_requirement" name="document_requirement" class="form-control "  rows="2" placeholder="">{{old('document_requirement') ?? $jobedit->document_requirement ?? ''}}</textarea>
                                                        @error('document_requirement')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="position-relative form-group">
                                                        <label for="status" class="">Status</label>
                                                            <select class=" form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                                <option value="">Choose Status</option>
                                                                <option value="1" @if(($jobedit->status ?? '' ) == '1') {{'selected'}} @endif>Active</option>
                                                                <option value="0" @if(($jobedit->status ?? '' ) == '0') {{'selected'}} @endif>Deactive</option>
                                                                

                                                            </select>
                                                            @error('status')
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

                        
       
<script>
    CKEDITOR.replace('job_description');
    CKEDITOR.replace('document_requirement');
    
    $(document).ready(function(){
        
       var oldstate = $('.card-body').find('#oldstate').val();
        var oldcity = $('.card-body').find('#oldcity').val();
        $.ajax({
            headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: "{{url('city')}}/"+oldstate+"",
            type: "POST",
            success: function (data) {
                 if(data.city !== ''){
                    city=[];
                    for(var i=0;i<data.city.length;i++){
                        if(data.city[i].id == oldcity ){
                            city.push('<option selected  value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                        }else{
                            city.push('<option value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                        }
                        
                    }
                    $('.form-group').find('#city').html(city)
                    $('#city').removeAttr('disabled');
                }  
            }
        }); 




        $(document).on('change','#state',function(){
           var state_id= (this.value);
           $.ajax({
                headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('/city')}}/"+state_id+"",
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



        var oldstate = $('.card-body').find('#oldstateprosess').val();
        var oldcity = $('.card-body').find('#oldcityprosess').val();
        $.ajax({
            headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('/city')}}/"+oldstate+"",
            type: "POST",
            success: function (data) {
                if(data.city !== ''){
                    city=[];
                    for(var i=0;i<data.city.length;i++){
                        if(data.city[i].id == oldcity ){
                            city.push('<option selected  value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                        }else{
                            city.push('<option value="'+ data.city[i].id+'">'+data.city[i].name+'</option>');
                        }
                        
                    }
                    $('.form-group').find('#process_city').html(city)
                    $('#process_city').removeAttr('disabled');
                } 
            }
        }); 

        $(document).on('change','#process_state',function(){
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
                            $('.form-group').find('#process_city').html(city)
                            $('#process_city').removeAttr('disabled');
                        } 
                }
            });
        });
    }); 

</script>             
@endsection