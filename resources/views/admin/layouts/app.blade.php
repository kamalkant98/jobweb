<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="{{asset('assest/web/assest/images/logo.png')}}">
    
    <title>WEBJOB ADMIN</title>

    <link href="{{asset('assest/admin/assest/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assest/admin/assest/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assest/admin/assest/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
   <!--  <link href="{{asset('assest/web/assest/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <script src="{{asset('assest/admin/assest/scripts/jquery-3.6.0.min.js')}}"></script> 
    <script src="{{asset('assest/ckeditor/ckeditor.js')}}"></script>
    <script>
          $(window).on('load',function(){
                $('.loder').hide();
            }); 
    </script>
    <style>
    .loder{
        display: flex;
        position: fixed;
        z-index: 1000;
        right: 0;
        background: white;
        top: 0;
        bottom: 0;
        left: 0;
    } 
    
   </style>
  </head>
    <body>
    
    
        <div class="loder">
         <i class="fas fa-spinner fa-pulse  fa-fw" style="margin: auto; font-size:40px; color:#3f6ad8;"></i>
         </div>
 
         @include('admin.layouts.page_templates.auth_templates')
        
         <!-- delete model  -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">System Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">Are you sure</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="hrefset"><button type="button" class="btn btn-danger">Yes i'am sure</button></a>
                    </div>
                </div>
            </div>
        </div>

         <script src="{{ asset('js/app.js') }}" defer></script>
         <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
         <script src="{{asset('assest/admin/assest/fontawesome/js/all.min.js')}}"></script>
          <script src="{{asset('assest/admin/assest/scripts/main.js')}}"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!--       <script src="{{asset('assest/web/assest/bootstrap/js/bootstrap.min.js')}}"></script> -->
         

          <script>
          /*  $(window).on('load',function(){
                $('.loder').hide();
            });  */
            $(document).ready(function(){
                $(document).on('click','.delete',function(){
                    var href = $(this).attr('data-href');  
                     $('#exampleModal').find('.hrefset').attr('href',href);
                });
            });

           
          </script> 
            @include('web.layouts.flash_message')
		  
    </body>
</html>