<!--  @if ($message = Session::get('success'))
<div class="alert alert-success fade show" role="alert">{{$message}}</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger fade show" role="alert">{{$message}}</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning fade show" role="alert">{{$message}}</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info fade show" role="alert">{{$message}}</div>
@endif -->


 @if(Session::has('success'))
 <script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.progressBar = true;
    toastr.success("{!!Session::get('success')!!}");
               
 </script>
 @endif 
  @if(Session::has('info'))
 <script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.progressBar = true;
    toastr.info("{!!Session::get('info')!!}");
               
 </script>
 @endif 
 @if(Session::has('warning'))
 <script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.progressBar = true;
    toastr.warning("{!!Session::get('warning')!!}");
               
 </script>
 @endif 
 @if(Session::has('error'))
 <script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.progressBar = true;
    toastr.error("{!!Session::get('error')!!}");
               
 </script>
 @endif 