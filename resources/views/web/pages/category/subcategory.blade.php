@extends('web.layouts.app')
@section('content')
<style>
.subcategorybox{
    background-color: #fbfbfb;
    padding: 5px;
    margin: auto;
    border-top-right-radius: 10px;
    border: solid 1px #f3f3f3;
    border-top-left-radius: 10px;
}
.container .row .subcategorybox:hover{
    border-color: #B2F2D0;
  color: #00D363;
  background-color: #f3f3f3c6;
  text-decoration: none;
  transform: scale(1.05);
  transition: all 0.5s ease;
  
}
.container .row .subcategorybox :hover h5{
    color: #00D363;
  
}
.jb_cover{
    background: #f1f1f1;
    border-radius: 10px;
    margin-top: -50px;
}
.search{
    margin-top:20px;
    margin-bottom:20px;
}
.active{
        color: #00D363 !important;
        border: none;
    }
</style>
    <div class="bradcam_area bradcam_bg_1" style="margin-bottom:5px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                  <div class="bradcam_text">
                        <h3>{{$data['maincategory']->name}}</h3>
                    </div> 
                    

                </div>
            </div>
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
                            <a href="#" class="boxed-btn4">Find</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!--/ bradcam_area  -->
    
    <!-- featured_candidates_area_start  -->

    <div class="container">
            
               
                
		<div class="row">
			@foreach($data['subcategory'] as $subcate)
            <div class="col-md-2 col-lg-2 col-sm-6 text-center subcategorybox" >
                <a href="#"> 
                    
                    <img style="width:100%; height:125px; object-fit: cover;    border-radius: 10px;margin-bottom: 10px;" src="{{asset('assest/web/assest/images/categoryimages')}}/{{$subcate->image}}"/>
                    <h5>{{$subcate->name}}</h5>
                </a>
            </div>
            @endforeach  
		</div>
	</div>


@endsection