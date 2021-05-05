 <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
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
                        </div>    <div class="scrollbar-sidebar">
                            <div class="app-sidebar__inner">
                                <ul class="vertical-nav-menu">
                                  <!--   <li class="app-sidebar__heading">Dashboards</li> -->
                                    <li>
                                        <a href="{{url('employer')}}" class="{{ Request::is(['employer','']) ? 'mm-active' : null }}">
                                     <!--    <i class="fas fa-rocket sidebar-icon"></i> -->
                                        <i class="metismenu-icon "><i class="fas fa-rocket sidebar-icon"></i></i>
                                         Dashboard
                                        </a>
                                </li>
                                <li  >
                                    <a href="{{url('employer/notification')}}" class="{{ Request::is(['employer/notification']) ? 'mm-active' : null }}">
                                        <i class="metismenu-icon "><i class="far fa-bell" ></i> </i>
                                        Notification
                                        <span class="badge bg-primary" style="color:white;    color: white;border-radius: 50%; height: 18px;padding: 3px;position: absolute;top: 10px; right: 5px">{{Auth::user()->unreadNotifications->count()}}</span>
                                    </a>
                                </li>
                                    <li>
                                        <a href="{{url('employer/all_job')}}"  class="{{ Request::is(['employer/all_job','','employer/add_job','employer/job/edit/*','employer/applicants/*','employer/applicant/details/*']) ? 'mm-active' : null }}">
                                            <i class="metismenu-icon"><i class="fas fa-briefcase"></i></i>
                                            Jobs
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="{{url('employer/all_applicants')}}"  class="{{ Request::is(['employer/all_applicants','employer/job/edit/*']) ? 'mm-active' : null }}">
                                            <i class="metismenu-icon"><i class="fas fa-briefcase"></i></i>
                                            All Applicants
                                        </a>
                                    </li> 
                                    
                                 <!--    <li class="app-sidebar__heading">Users</li> -->
                                        
                                       <!--  <li  >
                                            <a href="{{url('admin/employer')}}" class="{{ Request::is(['admin/employer','admin/add_employer','admin/employer/edit/*','admin/employer_permissions/*']) ? 'mm-active' : null }}">
                                                <i class="metismenu-icon "><i class="fas fa-layer-group"></i></i>
                                                Employer
                                            </a>
                                        </li> -->
                                       <!--  <li  >
                                            <a href="{{url('admin/employe')}}"  class="{{ Request::is(['admin/employe','admin/add_employee','admin/employe/edit/*' ,'admin/employee_permissions/*']) ? 'mm-active' : null }}">
                                                <i class="metismenu-icon "><i class="fas fa-users"></i></i> 
                                                Employee
                                            </a>
                                        </li> -->
                                       <!-- <li>
                                            <a href="#" class="{{ Request::is(['admin/main_category','admin/subcategory','admin/add_category','admin/category/edit/*','admin/main_category/subcategory/*']) ? 'mm-active' : null }} ">
                                            <i class="metismenu-icon"><i class="far fa-list-alt"></i></i>
                                            Category</a>

                                            <ul class="{{ Request::is(['admin/main_category','admin/subcategory','admin/add_category','admin/category/edit/*' ,'admin/main_category/subcategory/*']) ? 'mm-show' : null }}">
                                                <li>
                                                    <a href="{{url('admin/add_category')}}"  class="{{ Request::is(['admin/add_category']) ? 'mm-active' : null }}">
                                                        <i class="metismenu-icon"></i>
                                                        Add Category
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/main_category')}}"  class="{{ Request::is(['admin/main_category','admin/category/edit/*','admin/main_category/subcategory/*']) ? 'mm-active' : null }}">
                                                        <i class="metismenu-icon"></i>
                                                        Category List
                                                    </a>
                                                </li>
                                            
                                            </ul>
                                        </li>  -->
                                       <!--  <li>
                                            <a href="{{url('admin/qualification')}}"  class="{{ Request::is(['admin/qualification','admin/qualification/edit/*']) ? 'mm-active' : null }}">
                                                <i class="metismenu-icon "><i class="fas fa-graduation-cap"></i></i> 
                                                Qualification
                                            </a>
                                        </li> -->
                                        
                                      

                                        <!-- <li>
                                            <a href="{{url('admin/subscription')}}"  class="{{ Request::is(['admin/subscription','admin/add_subscription','admin/subscription/edit/*']) ? 'mm-active' : null }}">
                                                <i class="metismenu-icon"><i class="fas fa-shopping-bag"></i></i>
                                                Subscription Packages
                                            </a>
                                        </li> --> 
                                    <!--     <li>
                                            <a href="{{url('admin/all_job')}}"  class="{{ Request::segment(1) === 'admin/all_job' ? 'mm-active' : null }}">
                                                <i class="metismenu-icon"><i class="fas fa-briefcase"></i></i>
                                                Jobs
                                            </a>
                                        </li>  -->
                                     <!--    <li class="app-sidebar__heading">Settings</li> -->
                                        <!-- <li>
                                        <a href="#">
                                            <i class="metismenu-icon"><i class="fas fa-cog"></i></i>
                                           Settings
                                          
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="elements-buttons-standard.html">
                                                    <i class="metismenu-icon"></i>
                                                    Buttons
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-dropdowns.html">
                                                    <i class="metismenu-icon">
                                                    </i>Dropdowns
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-icons.html">
                                                    <i class="metismenu-icon">
                                                    </i>Icons
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-badges-labels.html">
                                                    <i class="metismenu-icon">
                                                    </i>Badges
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-cards.html">
                                                    <i class="metismenu-icon">
                                                    </i>Cards
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-list-group.html">
                                                    <i class="metismenu-icon">
                                                    </i>List Groups
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-navigation.html">
                                                    <i class="metismenu-icon">
                                                    </i>Navigation Menus
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-utilities.html">
                                                    <i class="metismenu-icon">
                                                    </i>Utilities
                                                </a>
                                            </li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>