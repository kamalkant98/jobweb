<div class="wrapper">
@include('admin.layouts.navbars.nav.navebar')
  @include('admin.layouts.navbars.sidebar')
 
   
    @yield('content')
    @include('admin.layouts.footer.footer')
 
</div>