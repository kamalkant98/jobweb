<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('assest/web/assest/images/logo.png')}}">
        
        <title>JOBWEB</title>

        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/gijgo.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/slicknav.css')}}">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/style.css')}}">
        <link href="{{asset('assest/admin/assest/fontawesome/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('assest/admin/assest/css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assest/web/assest/front-web/css/jquery-ui.css')}}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <script src="{{asset('assest/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('assest/admin/assest/scripts/jquery-3.6.0.min.js')}}"></script> 

        <style>
            ::selection {
                color:red;
                background:black;
            }
        </style>
    </head>
  
    <body>
        @auth
         @include('web.layouts.page_template.auth')
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

        @endauth

        @guest
            @include('web.layouts.page_template.guest')
        @endguest
       
    
<!-- 	<script src="{{asset('assest/web/assest/front-web/js/jquery.min.js')}}"></script> -->

    <script src="{{asset('assest/web/assest/front-web/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/popper.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/ajax-form.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/scrollIt.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/wow.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/nice-select.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/plugins.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/gijgo.min.js')}}"></script>
    <script src="{{asset('assest/admin/assest/fontawesome/js/all.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/range.js')}}"></script>
    <!--contact js-->
    <script src="{{asset('assest/web/assest/front-web/js/contact.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/jquery.form.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assest/web/assest/front-web/js/mail-script.js')}}"></script>

    <script src="{{asset('assest/web/assest/front-web/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('assest/web/assest/bootstrap/js/bootstrap.js')}}"></script>


  


    



    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });

      
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min:1,
                max:50,
                values: [0, 0 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "₹" + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] +" L/ Year" );
                }
            });
            $( "#amount" ).val( "₹" + $( "#slider-range" ).slider( "values", 0 ) +
                " - ₹" + $( "#slider-range" ).slider( "values", 1 ) + "/ Year");
        } );
        
       
        $(document).on('click','.delete',function(){
            var href = $(this).attr('data-href');  
                $('#exampleModal').find('.hrefset').attr('href',href);
        });
          
    </script>
      @include('web.layouts.flash_message')
    </body>
</html>
