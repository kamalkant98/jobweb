<header>
        <div class="header-area "  style="background-color:#1284ff;position: fixed;" >
            <div  class="main-header-area" ><!-- id="sticky-header" -->
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img style="width:100px;" src="{{asset('assest/web/assest/images/logo2.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{'/'}}">HOME</a></li>
                                            <li><a href="{{url('/notification')}}">Notifaction <span class="badge badge-danger">{{Auth::user()->unreadNotifications->count()}}</span> </a></li>
                                            <li><a href="{{'/jobs'}}"> JOBS</a></li>
                                            <li><a href="#">CATEGORIES <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    @foreach(maincategory() as $maincategory)
                                                        <li><a href="{{url('/category')}}/{{$maincategory['name']}}"> {{$maincategory['name']}}</a>
                                                           @if (!empty(subcategory($maincategory['id'])))
                                                                <ul class="submenu subcategory"> 
                                                                @foreach(subcategory($maincategory['id']) as $subcategory)
                                                                    <li><a href="candidate.html">{{$subcategory->name}}</a></li>
                                                                @endforeach
                                                                </ul>
                                                           @endif
                                                    
                                                    
                                                        </li>
                                                    @endforeach
                                                   <!--  <li><a href="candidate.html">Candidates </a>
                                                        <ul class="submenu subcategory">
                                                            <li><a href="candidate.html">Candidates </a></li>
                                                            <li><a href="job_details.html">job details </a></li>
                                                            <li><a href="elements.html">elements</a></li>
                                                        </ul>
                                                    </li> -->
                                                   <!--  <li><a href="job_details.html">job details </a></li>
                                                    <li><a href="elements.html">elements</a></li> -->
                                                </ul>
                                            </li>
                                            <li><a href="#">BLOG <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">CAREER</a></li>
                                            <li><a href="#"><img class="profile_image" src="{{asset('assest/web/assest/images/profile_image')}}/{{auth()->user()->profile_image ?? 'profile.jpg'}}"/></a>
                                                <ul class="submenu">
                                                    @if(auth()->user()->usertype == '1')
                                                        <li><a href="{{url('/employer')}}">Deshboard </a></li>
                                                    @elseif (auth()->user()->usertype == '0')
                                                        <li><a href="{{url('/admin')}}">Deshboard </a></li>
                                                    @else
                                                    <li><a href="{{url('/profile')}}">Profile </a></li>
                                                    
                                                    <li><a href="{{url('/profile/resume')}}/{{auth()->user()->id}}">Resume</a></li>
                                                    <li><a href="{{url('profile/Subscription_plan')}}/{{auth()->user()->id}}">Subscription Packages</a></li>
                                                    <li><a href="job_details.html"> Saved Jobs</a></li>
                                                    <li><a href="{{url('profile/applied_jobs')}}"> Applied Jobs</a></li>
                                                    <li><a href="job_details.html"> Interview Schedules</a></li>
                                                    <li><a href="candidate.html"> Job-History </a></li>
                                                    <li><a href="{{url('profile/changepasword')}}"> Change Password</a></li>
                                                    <li><a href="candidate.html"> Support Ticket lists</a></li>
                                                    @endif
                                                    <li>  <a href="{{route('logout')}}">Logout</a></li>


                                                    
                                                </ul> 
                                            </li>
                                        </ul>



                                     
                                       
                                   
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">

                               <!--  <div class="main-menu  ">
                                    <nav>
                                        <ul id="navigation">
                                           
                                            <li><a href="#"><img class="profile_image" src="{{asset('assest/web/assest/images/profile_image')}}/{{auth()->user()->profile_image ?? ''}}"/></a>
                                               <ul class="submenu">
                                                    <li><a href="candidate.html">Candidates </a></li>
                                                    <li><a href="job_details.html">job details </a></li>
                                                    <li>  <a href="{{route('logout')}}">Logout</a></li>
                                                </ul>
                                            </li>
                                           
                                        </ul>
                                    </nav>
                                </div> -->
                                  <!--   <div class="phone_num d-none d-xl-block">
                                       <a class="boxed-btn3" href="{{route('logout')}}">Logout</a>
                                    </div> -->
                                    
                                    <div class="phone_num d-none d-xl-block " > 
                                        <a class="boxed-btn3" href="#">Post a Job</a>
                                    </div>
                                    
                                    
                                </div>

                                    
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>