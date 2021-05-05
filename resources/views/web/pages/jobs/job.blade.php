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
</style>
<div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>4536+ Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
                
            <div class="row">
            <div class="col-lg-12  col-md-12 col-sm-12">
				
				<!-- <div class="filter-area jb_cover mb-5 p-4" style="background:#f1f1f1;">
                    <div class="search">
                        <div class="row cat_search">
                            <div class="col-lg-5 col-md-5">
                            
                                    <input type="text" class="form-control" style="height: 51px;" placeholder="Search keyword">
                                
                            </div>
                            <div class="col-lg-5 col-md-5">
                            
                                    <input type="text" class="form-control" style="height: 51px;" placeholder="Location">
                                
                            </div>
                        
                            <div class="col-lg-2 col-md-12">
                                <div class="job_btn">
                                    <a href="#" class="boxed-btn4">Find job</a>
                                </div>
                            </div>
                        </div>
                    </div> 							
				</div> -->
			</div>
                   
              
                <div class="col-lg-3">
                    <div class="job_filter white-bg">

                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="{{url('/jobs')}}" method="get">
                           
                            <input type="hidden" name="job_filter" value="job_filter">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="job_title" placeholder="Job Title">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" id="state" name='state'>
                                                <option data-display="State">State</option>
                                               
                                                @foreach(states() as $state )
                                                    <option value="{{$state['id']}}" >{{$state['name']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" id="city" disabled name="city">
                                                <option data-display="City">City</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option data-display="Category">Category</option>
                                                <option value="1">Category 1</option>
                                                <option value="2">Category 2 </option>
                                            </select>
                                        </div>
                                    </div> -->
                                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" name="compony">
                                                <option data-display="Qualification">Compony</option>
                                               
                                                @foreach(getemployer() as $employer )
                                                    <option value="{{$employer->id}}" >{{$employer->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" name="job_type">
                                                <option data-display="Job type">Job type</option>
                                                <option value="full time">Full Time</option>
                                                <option value="part time">Part Time </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" name="qualification">
                                                <option data-display="Qualification">Qualification</option>
                                               
                                                @foreach(allqualification() as $qualification )
                                                    <option value="{{$qualification->id}}" >{{$qualification->qualification_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="range_wrap col-md-12" >
                                        <label for="amount">Price range: <small style="color:blue;">(in lakh rupees per year)</small></label>
                                            
                                            <div id="slider-range"></div>
                                            <p>
                                                <input type="text" class="form-control" id="amount"  name="price_range" readonly style="border:0; color:#7A838B; font-size: 14px; font-weight:400;">
                                            </p>
                                            
                                    </div>
                                    <div class="reset_btn col-md-12">
                                        <button  class="boxed-btn3 w-100" type="submit">Reset</button>
                                    </div>
                                
                                </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="job_lists m-0">
                        <div class="row">
                        @foreach($data as $job)
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
                        @endforeach

                               
                        </div>    
                            
                           
                        <div class="row">
                            <div class="col-lg-12  text-center">
                           
                            {!! $data->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    $(document).ready(function (){

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


    });
    






    </script>
@endsection