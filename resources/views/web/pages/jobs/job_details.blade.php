@extends('web.layouts.app')
@section('content')
<style>
    .active{
        color: #00D363 !important;
        border: none;
    }
</style>
      <!-- bradcam_area  -->
      <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{ucfirst($data['jobdetails']->job_title)}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                              
                                <img class="thumb"   src="{{asset('assest/web/assest/images/categoryimages')}}/{{getcategory($data['jobdetails']->category)->image}}" alt="">
                              
                                <div class="jobs_conetent">
                                    <a href="#"><h4>{{ucfirst($data['jobdetails']->job_title)}}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fas fa-map-marker-alt"></i> {{getcity($data['jobdetails']->city)->name}}, {{getstate($data['jobdetails']->state)->name}} </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            {!! $data['jobdetails']->job_description!!}
                        </div>
                        <div class="single_wrap">
                            <h4>Process Information</h4>
                            {{$data['jobdetails']->selection_process}}</br></br>
                            {{$data['jobdetails']->process_address}}</br>
                            {{getcity($data['jobdetails']->process_city)->name}}, {{getstate($data['jobdetails']->process_state)->name}}
                            
                        </div>
                       
                        <div class="single_wrap">
                            <h4>Important Instruction</h4>
                            {!! $data['jobdetails']->document_requirement!!}
                        </div>
                    </div>
                    <div class="apply_job_form white-bg">
                       <!--  <h4>Apply for the job</h4> -->
                        <form action="#">
                            <div class="row">
                              
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                    @if(Auth::check())
                                          
                                          @if(!empty(Applied_job($data['jobdetails']->id,auth()->user()->id)))
                                          <a href="{{url('apply_for_job')}}/{{$data['jobdetails']->id}}" type="submit" class="boxed-btn2   applyjobbtn">Applied</a> 
                                          @else
                                          <a href="{{url('apply_for_job')}}/{{$data['jobdetails']->id}}" type="submit" class="boxed-btn3 applyjobbtn">Apply Now</a>
                                          @endif
                                      @else
                                          <a href="{{url('apply_for_job')}}/{$data['jobdetails']->id}}" type="submit" class="boxed-btn3   applyjobbtn">Apply Now</a>

                                      @endif   
                                      <!--   <button class="boxed-btn3 w-100" type="submit">Apply Now</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Published on: <span>{{date('d M  Y', strtotime( $data['jobdetails']->created_at))}}</span></li>
                                <li>Vacancy: <span>{{$data['jobdetails']->no_of_requirement}} Position</span></li>
                                <li>Salary: <span>  {{$data['jobdetails']->salary_minimum}} - {{$data['jobdetails']->salary_maximum}} Lac/Year </span></li>
                                <li>Location: <span>{{getcity($data['jobdetails']->city)->name}}, {{getstate($data['jobdetails']->state)->name}}</span></li>
                                <li>Job Nature: <span>  {{$data['jobdetails']->job_type}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <a class="a2a_dd" href="https://www.addtoany.com/share"><img src="https://static.addtoany.com/buttons/share_save_171_16.png" width="171" height="16" border="0" alt="Share"></a>
                                            <script>
                                                var a2a_config = a2a_config || {};
                                                a2a_config.onclick = 1;
                                                a2a_config.num_services = 6;
                                            </script>
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                     <!--    <ul>
                            <li><a href="#"> <i class="fab fa-facebook-f"></i></a> </li>
                            <li><a href="#"> <i class="fab fa-google-plus-g"></i></a> </li>
                            <li><a href="#"> <i class="fab fa-twitter"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul> -->
                    </div>
                    <!-- <div class="job_location_wrap">
                        <div class="job_lok_inner">
                            <div id="map" style="height: 200px;"></div>
                            <script>
                              function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var grayStyles = [
                                  {
                                    featureType: "all",
                                    stylers: [
                                      { saturation: -90 },
                                      { lightness: 50 }
                                    ]
                                  },
                                  {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: {lat: -31.197, lng: 150.744},
                                  zoom: 9,
                                  styles: grayStyles,
                                  scrollwheel:  false
                                });
                              }
                              
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
                            
                          </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection