<style>
 .active{
    color: #00D363 !important;
 }
      .active2{
        background: transparent;
    color: #00D363 !important;
    border: solid 1px;
    
      }
    </style>
<header>
        <div class="header-area " style="background-color:#1284ff;">
            <div id="sticky-header" class="main-header-area">
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
                            <div class="col-xl-5 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li ><a class="{{ Request::is(['/','home']) ? 'active' : null }}" href="{{'/'}}">HOME</a></li>
                                            <li><a class="{{ Request::is(['jobs','jobs/job_details/*']) ? 'active' : null }}" href="{{'/jobs'}}">JOBS</a></li>
                                            <li><a class=" {{ Request::is(['category/*']) ? 'active' : null }}" href="#">CATEGORIES <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                @foreach(maincategory() as $maincategory)
                                                        <li><a href="{{url('/category')}}/{{$maincategory['name']}}"> {{$maincategory['name']}}</a>
                                                           @if (!empty(subcategory($maincategory['id'])))
                                                                <ul class="submenu subcategory"> 
                                                                @foreach(subcategory($maincategory['id']) as $subcategory)
                                                                    <li><a href="#">{{$subcategory->name}}</a></li>
                                                                @endforeach
                                                                </ul>
                                                           @endif
                                                    
                                                    
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="#">BLOG <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="#">blog</a></li>
                                                    <li><a href="#">single-blog</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">CAREER</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                       <a class="boxed-btn3 {{ Request::is(['login']) ? 'active2' : null }}" href="{{route('login')}}">Login</a>
                                    </div>
                                    <div class="phone_num d-none d-xl-block " > 
                                        <a class="boxed-btn3 {{ Request::is(['register']) ? 'active2' : null }}" href="{{route('register')}}">Brouse a Job</a>
                                        
                                    </div>
                                    <div class="phone_num d-none d-xl-block " > 
                                        <a class="boxed-btn3 {{ Request::is(['register_company']) ? 'active2' : null }}" href="{{route('register_company')}}">Post a Job</a>
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
    