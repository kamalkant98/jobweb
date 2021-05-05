
@extends('web.layouts.app')
@section('content')
<style>
    .frontcategoryimage{
    width: 82px !important;
    height: 82px !important;
  
    border-radius: 5px;
    padding: 3px;
    background: #F5F7FA;
   
    border: 1px solid #F0F0F0;
    object-fit: cover;
    
}
.companiesimage{
    width: 100% !important;
    height: 100px !important;
    object-fit: contain;
}

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
.job_listing_area .job_lists .single_jobs .jobs_left .thumb{
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
/* .a2a_dd span{
    display:none;
}
.a2a_default_style .a2a_dd, .a2a_default_style .a2a_svg {
    float: right;
} */

.a2a_dd{
    position: absolute;
    bottom: 13px;
    right: 22px;
}

.job_listing_area .job_lists .single_jobs .jobs_right .apply_now a.boxed-btn3 {
    padding: 5px 15px 5px 15px;
    font-size: 11px;
}

.boxed-btn2 {
    border: none;
    background: #F91842;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    display: inline-block;
    padding: 5px 15px 6px 16px;
    font-family: "Roboto", sans-serif;
    cursor: pointer;
}


.not_found{
    text-align: center;
    width: 100%;
    font-size: 60px;
    color: #1284ff;
}
    </style>
<div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">4536+ Jobs listed</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                          
                                <a href="{{route('register')}}" class="boxed-btn3">Browse Job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="{{asset('assest/web/assest/front-web/img/banner/illustration.png')}}" alt="">
        </div>
    </div>


        <div class="catagory_area" style="padding-bottom:25px;">
            <div class="container">
                <form action="{{url('search')}}" method="post">
                @csrf
                <div class="row cat_search">
                    <div class="col-lg-5 col-md-5">
                       
                            <input type="text" class="form-control" name="job_title" style="height: 51px;" placeholder="Search keyword" value="{{old('job_title') ?? ''}}">
                        
                    </div>
                    <div class="col-lg-5 col-md-5">
                       
                            <input type="text" class="form-control" name="location" style="height: 51px;" placeholder="City" value="{{old('location') ?? ''}}">
                        
                    </div>
                  
                    <!-- <div class="col-lg-3 col-md-4">
                      
                            <select class="form-control" style="height: 51px;">
                                <option data-display="Location">Location</option>
                                <option value="1">Dhaka</option>
                                @foreach (states() as $state)
                                <option value="{{$state['id']}}">{{$state['name']}}</option>
                                @endforeach
                            
                              </select>
                        
                    </div> -->
                    <!-- <div class="col-lg-3 col-md-4">
                   
                            <select class="form-control" style="height: 51px;">
                                <option data-display="Category">Category</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="4">Category 3</option>
                              </select>
                      
                    </div> -->
                    <div class="col-lg-2 col-md-12">
                        <div class="job_btn">
                       
                            <button type="submit" class="boxed-btn4">Find Job</a>
                        </div>
                    </div>

                </div>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="popular_search d-flex align-items-center">
                            <span>Popular Search:</span>
                            <ul> 
                            @if(!empty(Cookie::get('name')) )
                                @php $datasearch=json_decode(Cookie::get('name'));
                                    $datacount=count($datasearch)-1;
                                @endphp 
                               <!--  @foreach ($datasearch as $topsearch)
                                    @if($topsearch !== null)
                                    <li><a >{{$topsearch}}</a></li>
                                    @endif

                                @endforeach
 -->
                          
                                @for ($i =$datacount; $i >= 5; $i--)
                                <li><a >{{$datasearch[$i]}}</a></li>
                                @endfor         
                            @endif
                           
                                
                             
                            </ul>
                        </div>
                    </div>
                </div>
              </div>


        </div>  

        @if ($jobsfiltered= Session::get('jobsfiltered'))
            <div class="job_listing_area plus_padding" style="padding-top:25px; padding-bottom:25px; margin-bottom:25px; background-color:transparent;">
                <div class="container">
            
                 
                        <div class="section_title  mb-40">
                            <h3>Job Search Result</h3>
                        </div>
                   
              
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="job_lists m-0">
                                <div class="row">
                                    @forelse($jobsfiltered as $job)
                                        <div class="col-lg-12 col-md-12">
                                            <div class="single_jobs  d-flex justify-content-between" style="background-color:#f5f7fa;">
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
                                                                <p> <i class="fa fa-rupee-sign fa-sm"></i> {{$job->salary_minimum}} Lac - {{$job->salary_maximum}} Lac  Per/Year </p>
                                                            </div>
                                                            <div class="location">
                                                            <p> <i class="fas fa-toolbox"></i> {{$job->experience_minimum}} - {{$job->experience_maximum}} Year </p>

                                                            </div>
                                                        </div>
                                                        
                                                    
                                                    </div>
                                                </div>
                                                <div class="jobs_right">
                                                    <div class="date">
                                                        <p>Date line: {{$job->created_at->diffForHumans()}}</p>
                                                    </div>
                                                    <div class="apply_now">
                                                    <a href="{{url('apply_for_job')}}/{{$job->id}}" type="submit" class="boxed-btn3 applyjobbtn"><i class="ti-heart"></i> </a>
                                                    <!--   <a class="heart_mark" href="{{url('saved_job')}}/{{$job->id}}"> <i class="ti-heart"></i> </a> -->
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
                                                    <a class="a2a_dd" href="https://www.addtoany.com/share"><img src="https://static.addtoany.com/buttons/share_save_171_16.png" width="171" height="16" border="0" alt="Share"></a>
                                                        <script>
                                                            var a2a_config = a2a_config || {};
                                                            a2a_config.onclick = 1;
                                                            a2a_config.num_services = 6;
                                                        </script>
                                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    
                                    @empty
                                        <div class="not_found"><span><i class="fas fa-exclamation-triangle"></i>Not Found</span></div>
                                    @endforelse
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif


                
         


        <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popolar Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(!empty($data['popularcategories']))
                    @foreach($data['popularcategories'] as $category)

                    <div class="col-lg-4 col-xl-3 col-md-6">
                    <a href="{{'/category'}}/{{$category->name}}">
                    <div class="single_catagory">

                       
                  
                        <img class="frontcategoryimage" src="{{asset('assest/web/assest/images/categoryimages')}}/{{$category->image}}" alt="">
                        
                        
                        <h4>{{$category->name}}</h4>
                        <p> <span>{{totalpostbymaincategory($category->id)}}</span> Available position</p>
                    </div>
                    </a>
                </div>
                    @endforeach



                @endif
               <!--  <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">

                        <a href="jobs.html">
                        <img style="width:100px;" src="{{asset('assest/web/assest/front-web/img/banner/illustration.png')}}" alt="">
                        
                        
                        <h4>Design & Creative</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Marketing</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Telemarketing</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Software & Web</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div> -->
               <!--  <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Administration</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div> -->
               <!--  <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Teaching & Education</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div> -->
               <!--  <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Engineering</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>Garments / Textile</h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- popular_catagory_area_end  -->



    <!-- job_listing_area_start  -->
    <!-- <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">

                    
                        @foreach($data['alljobs'] as $job)
                        
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{asset('assest/web/assest/front-web/img/svg_icon/1.svg')}}" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>{{$job->job_title}}</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fas fa-map-marker-alt fa-sm"></i> {{getcity($job->city)->name}}, {{getstate($job->state)->name}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="far fa-clock fa-sm"></i> {{$job->job_type}}</p>
                                                </div>
                                                
                                                <div class="location">
                                                    <p> <i class="fa fa-rupee-sign fa-sm"></i> {{$job->salary_minimum}} Lac - {{$job->salary_maximum}} Lac  Per/Year </p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i> {{$job->job_type}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                            <a href="job_details.html" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: 31 Jan 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                </div>
            </div>
        </div>
    </div> -->
    <!-- job_listing_area_end  -->



    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Featured Candidates</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/1.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/2.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/3.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/4.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/5.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/6.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/7.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/8.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/9.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/9.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/10.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/3.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{asset('assest/web/assest/front-web/img/candiateds/4.png')}}" alt="">
                            </div>
                            <a href="#"><h4>Markary Jondon</h4></a>
                            <p>Software Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title  mb-40">
                        <h3>Top Companies & Employers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">

                    @foreach($data['topemployers'] as $topemployer)
                        <div class="single_candidates text-center">
                            <img class="companiesimage" src="{{asset('assest/web/assest/images/profile_image')}}/{{$topemployer->profile_image }}" alt="">
                            <a href="jobs.html"><h4>{{$topemployer->name}}</h4></a>
                                <span>{{totalpostbyemployer($topemployer->id)}}</span>
                                <p>Available position</p>
                       
                        </div>
                    @endforeach  

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->


    <!-- Top Companies -->
    <!-- <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies & Employers</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job text-right">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="{{asset('assest/web/assest/front-web/img/svg_icon/5.svg')}}" alt="">
                        </div>
                        <a href="jobs.html"><h3>Snack Studio</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
           </div>
        </div>
    </div> -->
    <!-- Top Companies end -->


    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="{{route('register')}}" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Expert?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="{{route('register_company')}}" class="boxed-btn3">Post a Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->




    <!-- testimonial_area  -->
    <div class="testimonial_area  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Testimonial</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{asset('assest/web/assest/front-web/img/testmonial/author.png')}}" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.</p>
                                            <span>- Micky Mouse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{asset('assest/web/assest/front-web/img/testmonial/author.png')}}" alt="">
                                            <div class="quote_icon">
                                                <i class=" Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.</p>
                                            <span>- jamal Mouse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="{{asset('assest/web/assest/front-web/img/testmonial/author.png')}}" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.</p>
                                            <span>- kamal Mouse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->
@endsection