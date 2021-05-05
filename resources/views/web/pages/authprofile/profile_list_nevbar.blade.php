<style>
    .nav-sec{
            width:100%;
            list-style:none;

        }
        .nav2 ul.nav-sec a{
            margin-bottom: 10px;
            display: block;
            color: #001d38;
            padding: 10px;
            border-radius: 5px;
            border: solid 1px #f5f4f4;

        }
        .nav2 ul.nav-sec a:hover{
            color: #00d363;
            background-color: #f8f9fc00;
            border: solid 1px;
        }
        .active{
            color: #00d363 !important;
            background-color: #f8f9fc00;
            border: solid 1px !important;
        }
        .nav2 {
            background-color:white;
            padding:15px;
        }
        .profiledata{
            background-color:white;
           padding:15px;
           
        
        }
        .imageprofile2  {
            width:70px;
            height:70px;
            border-radius: 50%;
            object-fit: cover;
            margin:auto;

        }
</style>

<div class="col-xl-3 col-lg-3 col-md-3 ">
    <div class="nav2 ">
            <img class="imageprofile2" src ="{{asset('assest/web/assest/images/profile_image')}}/{{auth()->user()->profile_image ?? 'profile.jpg'}}" alt=''> <h3>{{auth()->user()->name}}</h3>
        <label>Profile Updated</label>
           <div class="progress" style="margin-bottom:15px;">
                <div class="progress-bar" role="progressbar" style="width: {{round(calculate_profile(auth()->user()->id))}}%; background-color:#1284ff;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> {{round(calculate_profile(auth()->user()->id))}}%</div>
            </div> 
            

            <!-- <div class="progress"  style="margin-bottom:15px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div> -->
    
        <ul class="nav-sec" >
            <li><a class="nav-sec-link {{ Request::is(['profile']) ? 'active' : null }}" href="{{url('/profile')}}"><i class="fas fa-user-alt"></i> Profile </a></li>
            <li><a class="nav-sec {{ Request::is(['profile/resume/*']) ? 'active' : null }}"href="{{url('/profile/resume')}}/{{auth()->user()->id}}"> <i class="far fa-file-alt"></i> Resume</a></li>
            <li><a class="nav-sec {{ Request::is(['profile/Subscription_plan/*']) ? 'active' : null }} "href="{{url('profile/Subscription_plan')}}/{{auth()->user()->id}}"> <i class="fas fa-pen"></i> Subscription Packages</a></li>
            <li><a class="nav-sec"href="job_details.html"><i class="fas fa-business-time"></i> Saved Jobs</a></li>
            <li><a class="nav-sec {{ Request::is(['profile/applied_jobs']) ? 'active' : null }}  "href="{{url('profile/applied_jobs')}}" ><i class="fas fa-briefcase"></i> Applied Jobs</a></li>
            <li><a class="nav-sec {{ Request::is(['profile/interview_schedules']) ? 'active' : null }} " href="{{url('profile/interview_schedules')}}"><i class="fas fa-business-time"></i> Interview Schedules</a></li>
            <li><a class="nav-sec"href="candidate.html"> <i class="fas fa-history"></i> Job-History </a></li>
            <li><a class="nav-sec"href="job_details.html"> <i class="fas fa-lock"></i> Change Password</a></li>
            <li><a class="nav-sec"href="candidate.html"> <i class="fas fa-clipboard-list"></i> Support Ticket lists</a></li>
            <li><a class="nav-sec"href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

</div>
