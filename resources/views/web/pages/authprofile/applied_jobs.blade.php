@extends('web.layouts.app')
@section('content')

<style>
 .jb_cover{
    background: #f1f1f1;
    border-radius: 10px;
    margin-top: -150px;
}
.active{
    padding:0px;
    border-bottom:none;
}
.page-link {
    margin:5px;
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #ababab;
    background-color: transparent;
    border: 1px solid #dee2e6;
    border-radius:50%;
    width:36px;
    height:36px;
}
.page-item:last-child .page-link {
    width:37px;
    height:36px;
    border-radius:50%;
  
}
.page-item:first-child .page-link {
   
    width:36px;
    height:36px;
    border-radius:50%;
   
}
.page-item.active .page-link {
    z-index: 1;
    border-radius:50%;
    color: #00d363;
    background-color: transparent;
    border-color: #00d363;
}
.page-link:hover {
    color: #00d363;
    text-decoration: none;
    background-color: #00d36321;
    border-color: #00d363;
}
 .single_jobs .jobs_left .thumb{
    float: left;
    object-fit: cover;
    width: 82px;
    height: 82px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    padding: 15px;
    background: #F5F7FA;
    margin-right: 25px;
    border: 1px solid #F0F0F0;
} 
.single_jobs{
    border: 1px solid #EAEAEA;
    margin-bottom: 15px;
}
.single_jobs:hover {
    border-color: #B2F2D0;
}
.timeago{
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    top: 2px;
    left: 27px;
    background: #beddff;
    padding: 2px 10px;
    font-size: 12px;
}

.not_found{
    text-align: center;
    margin: auto;
    color: #1284ff;
    padding: 150px;
    display: flex;
   
    align-items: center;
}
</style>
<div class="job_details_area">
        <div class="container" >
                <div class="row">
                    <!-- this is profile nevbar list -->
                    @include('.web.pages.authprofile.profile_list_nevbar')
                    <div class="col-md-8  col-xl-9 col-lg-8 profiledata">
                     
                     
                            <div class="row">
                            @forelse($applied_jobs as $job)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                <a href="{{url('/jobs/job_details')}}/{{$job->id}}">
                                    <div class="jobs_left d-flex align-items-center">
                                       
                                            <img class="thumb"   src="{{asset('assest/web/assest/images/categoryimages')}}/{{getcategory($job->category)->image}}" alt="">
                                      
                                        <div class="jobs_conetent">
                                            <h4>{{ucfirst($job->job_title)}}</h4>
                                            <small style="color:#1181e5;">{{getuser($job->employer)->name}}</small>
                                          <!--   <small style="color:#1181e5;">{{getcategory($job->category)->image}}</small> -->
                                          
                                            <div class="links_locat d-flex align-items-center">
                                               
                                                <div class="location">
                                                   <p> <i class="fas fa-map-marker-alt fa-sm"></i> {{getcity($job->city)->name}}, {{getstate($job->state)->name}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="far fa-clock fa-sm"></i> {{$job->job_type}}</p>
                                                </div>
                                                
                                             
                                            </div>
                                            <div class="links_locat d-flex align-items-center">
                                               <div class="location">
                                                    <p><!--  <i class="fa fa-rupee-sign fa-sm"></i> -->  ₹ {{$job->salary_minimum}} Lac - {{$job->salary_maximum}} Lac  Per/Year </p>
                                                </div>
                                                <div class="location">
                                                <p> <i class="fas fa-toolbox"></i> {{$job->experience_minimum}} - {{$job->experience_maximum}} Year </p>

                                                </div>
                                            </div>
                                            
                                         
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                    
                                    <!----> <div class="timeago">{{Applied_job($job->id,auth()->user()->id)->created_at->diffForHumans()}}</div> 
                                 <!-- -->      
                                        <div class="apply_now">
                                               
                                                @if(Auth::check())
                                          
                                                    @if(!empty(Applied_job($job->id,auth()->user()->id)))
                                                    <a href="{{url('apply_for_job')}}/{{$job->id}}" type="submit" class="boxed-btn2 applyjobbtn">Applied</a> 
                                                    @else
                                                    <a href="{{url('apply_for_job')}}/{{$job->id}}" type="submit" class="boxed-btn3 applyjobbtn">Apply Now</a>
                                                    @endif
                                                @else
                                                    <a href="{{url('apply_for_job')}}/{{$job->id}}" type="submit" class="boxed-btn3 applyjobbtn">Apply Now</a>

                                                @endif    
                                        </div>
                                      
                                        <div class="date">
                                                @if($job->actively_progress == '1')
                                               
                                               <div class=""> 
                                                   <i class="far fa-clock" style="color:#f7b924;"></i> &nbsp;<strong> In Progress</strong>
                                               </div>
                                      
                                               @elseif($job->actively_progress == '2') 
                                               <div class=""> 
                                                   <i class="fas fa-clipboard-check" style="color:#3f6ad8;"></i>&nbsp;<strong> Resume Selected </strong>
                                               </div>
   
                                               @elseif($job->actively_progress == '3')
                                               <div class=""> 
                                                   <i class="far fa-calendar-check" style="color:#3f6ad8;"></i>&nbsp;<strong>Interview Schedule </strong></br>
                                                   <a href="{{url('profile/interview_schedules')}}"><span class="badge badge-primary">show</span> </a>
                                               </div>
   
                                                @elseif($job->actively_progress == '4')
                                               <div class="">
                                                   <i class="fas fa-check-double"  style="color:#2eb72e;"></i>&nbsp;<strong>Hired</strong>
                                               </div>
                                               @elseif($job->actively_progress == '0')
                                                   <div class="">
                                                       <i class="far fa-times-circle" style="color:#d21945;"></i>&nbsp;<strong> Not Selected </strong>
                                                   </div>
   
                                               @endif
                                          <!--   <p>Date line: 31 Jan 2020</p> -->
                                           <!--  <p>Date line: {{date('d M  Y', strtotime($job->created_at))}}</p> -->
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>

                            @empty
                            <div class="not_found"> <i class="fas fa-briefcase fa-2x" ></i> &nbsp;Not found</div>

                            @endforelse
                            </div>


                           




                    
                        
                    </div>
                </div>
        </div>
    </div>


@endsection
