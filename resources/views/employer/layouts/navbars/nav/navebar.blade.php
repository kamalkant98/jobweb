
<style>
    .rounded-circle {
        width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50% !important;
    border: solid 1px #e3e6ea;
    }
    .notifaction_box{
    display: none;
    overflow: hidden;
    left: -345px;
    position: absolute;
    width: 402px;
    top: 63px;
    height: 251px;
    overflow-y: scroll;
    /* padding: 10px; */
    border: solid 1px #80808033;
    background: #fafbfc;
    /* border-radius: 10px; */
    box-shadow: aliceblue;
    box-shadow: 5px 10px 10px #88888870;
    box-shadow: -2px 10px 10px# 9b947;
    }
    
</style>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
<div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src" style="background-image:url({{asset('assest/web/assest/images/logo2.png')}})"></div>
              <!--   style="background-image:url({{asset('assest/web/assest/images/logo2.png')}})" -->
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                   <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <!-- <i class="nav-link-icon fa fa-database"> </i> -->
                                <i class="far fa-bell" style=""></i>
                                <!-- Statistics -->
                            </a>
                        </li>
                        <!-- <li class="btn-group nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Projects
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li> -->
                    </ul>        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                    
                                        <!-- <a  class="nav-link notifaction_icon">
                                        <span class="badge bg-primary" style="color:white;    color: white;border-radius: 50%; height: 18px;padding: 3px;position: absolute;top: 4px; right: 74px">14</span>
                                            <i class="far fa-bell" style="font-size:20px;"></i>
                                        </a>
                                       <div class="notifaction_box">

                                        <div class="card"> 
                                        <div class="card-header sticky-top"> Notifications</div>
                                       
                                
                            

                                                <div class="card-body">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                                                </div>

                                        </div>
                                        </div> -->
                                        
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{asset('assest/web/assest/images/profile_image')}}/{{Auth()->user()->profile_image ?? 'profile.jpg'}}" alt=""> 
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <a href="{{url('employer/profile')}}" class=""><button type="button" tabindex="0" class="dropdown-item {{ Request::is(['employer/profile',]) ? 'active' : null }}">Profile</button></a>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="{{route('logout')}}"> <button type="button" tabindex="0" class="dropdown-item">logout</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                       {{ucfirst(Auth()->user()->name)}}
                                    </div>
                                    <div class="widget-subheading">
                                      @if(auth()->user()->usertype == '1')
                                            {{'Employer'}}
                                      @else if(auth()->user()->usertype == '0')
                                            {{'Admin'}}
                                      @endif
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <!-- <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>  

<script>
    
        
     
        $(document).on('click','.notifaction_icon',function(){
            $(".notifaction_box").toggle();
        })
    
</script>


   