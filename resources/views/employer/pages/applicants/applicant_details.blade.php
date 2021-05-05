@extends('employer.layouts.app')
@section('content')
<style>
    .profile_iamge_details{
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: solid 3px #4a73da;

    }
    .card-header{
        color: #3f6ad8;
    }

</style>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                        <div class="page-title-icon">
                        <i class="fas fa-user-edit"></i>
                            </div>Applicant Details</div>
                <div class="page-title-actions">
                    
                    <a href="{{ url()->previous() }}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                </div>
            </div>
        </div>  
        
        <div class="card" style="padding:10px;">
          
                 

             
              <div class="row">
                        <div class="col-md-4"  >
                            
                           <!--  @if(!empty($data['profile']))
                                <div class="card-header">Address</div> 
                                <div style="padding:20px;">
                                <span><i class="fas fa-map-marker-alt"></i> {{$data['profile']->address}} <br> {{getcity($data['profile']->city)->name}} ,{{getstate($data['profile']->state)->name}}</span></br>
                                </div>
                            @endif -->

                            @if(!empty($data['profile']))
                                <div class="card-header">Profile</div> 
                                <div style="padding:20px;">
                                    <img class="profile_iamge_details"src="{{asset('assest/web/assest/images/profile_image/')}}/{{ $data['profile']->profile_image ?? 'profile.jpg'}}"/>
                                    <h2>{{$data['profile']->name}}</h2>
                                
                                <span style="color: #3f6ad8;"><i class="far fa-envelope"></i> {{$data['profile']->email}}</span></br>
                                <span style="color: #3f6ad8;"><i class="fas fa-phone-alt"></i> {{$data['profile']->mobile}}</span></br></br>
                                    
                                    <span><i class="fas fa-map-marker-alt"></i> {{$data['profile']->address}} <br> {{getcity($data['profile']->city)->name}} ,{{getstate($data['profile']->state)->name}}</span></br>
                                </div>
                            @endif

                            @if(!empty($data['skills']))
                                <div class="card-header">Skills</div> 
                                @foreach ($data['skills'] as $skill)
                                <div style="padding:20px;"><strong>{{strtoupper($skill->skill)}} </strong>  - {{$skill->proficiency_skill}} </div>
                                @endforeach
                            @endif

                            @if(!empty($data['languages']))
                                <div class="card-header">Languages</div> 
                                @foreach ($data['languages'] as $language)
                                <div style="padding:20px;"><strong>{{strtoupper($language->language)}} </strong>  - {{$language->proficiency_language}} </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="col-md-8" >
                        
                        @if(!empty($data['education'] )) 
                            <div class="card-header">Education</div>
                            @foreach ($data['education'] as $education)
                                    <div style="padding:20px;">
                                        <div style=""> <strong>{{$education->level_of_education}} & {{$education->field_of_study}}</strong> </div>
                                        <div>{{$education->college_or_university}} & {{$education->location}} </div>
                                        <span>{{date('F, Y',strtotime($education->time_period_from))}}  To  @if (!empty($education->time_period_to)){{date('F, Y',strtotime($education->time_period_to)) }} @else {{$education->currently_enrolled	}} @endif</span>
                                    </div>
                            @endforeach 
                        @endif    

                        @if(!empty($data['work_experience'])) 
                            <div class="card-header">Experience</div>
                            @foreach ($data['work_experience'] as $experience)
                                    <div style="padding:20px;">
                                        <div style=""> <strong>{{$experience->job_title}}</strong> </div>
                                        <span>{{$experience->company_name}} - {{$experience->location}}</span></br>
                                        <span>{{date('F, Y',strtotime($experience->work_time_period_from))}}  To  @if (!empty($experience->work_time_period_to)){{date('F, Y',strtotime($experience->work_time_period_to)) }} @else {{$experience->time_period	}} @endif</span>
                                        <div class="job_description" style="font-size:15px;">{!!$experience->job_description!!}</div>
                                    </div> 
                            @endforeach 
                        @endif    

                        @if(!empty($data['certifications_Licenses'])) 
                            
                            <div class="card-header">Certifications / Licenses</div>
                            @foreach ($data['certifications_Licenses'] as $certification)
                                    <div style="padding:20px;">
                                    <strong>{{$certification->certification_title}}</strong></br>
                                    <span>{{date('F, Y',strtotime($certification->certification_time_period_from))}}  To  @if (!empty($certification->certification_time_period_to )){{date('F, Y',strtotime($certification->certification_time_period_to)) }} @else {{$certification->certification_time_period }} @endif</span>
                                    <div style="font-size:15px;">{!!$certification->certification_description!!}</div>
                                    </div> 
                            @endforeach 
                        @endif   

                         @if(!empty($data['additional_information'])) 
                            
                            <div class="card-header">Additional Information</div>
                            @foreach ($data['additional_information'] as $information)
                                    <div style="padding:20px;">
                                    <p>{!!$information->informations!!}</p>
                                    </div> 
                            @endforeach 
                        @endif            
                        </div>
                    
              </div>   
        </div>

        
    </div>
           
@endsection