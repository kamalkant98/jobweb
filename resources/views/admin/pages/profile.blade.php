@extends('admin.layouts.app')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->

<style>
       .imageprofile{
            width:120px;
            height:120px;
            border-radius: 50%;
            object-fit: cover;

        }
        label {
            color:black;
        }

        .attch{
            width:75px;
            height:75px;
            border-radius: 50%;
            object-fit: cover;
        }
        .attch:hover{
            border:solid 1px #00d363;
        }
        .labelprofile{
            border-radius: 50%;
            /* margin:auto; */
        }
      /**/   .imageprofile:hover{
            border:solid 1px #00d363;
        } 
        .attchbox{
            background: #f5f7fa;
            padding: 2px;
            border: solid 1px #007bff57;
            border-radius: 4px;
        }
        .attchbox:hover{
            border:solid 1px #00d363;
        }
        
        .editcover{
            position: absolute;
            right: 27px;
            bottom:2px;
        }
        .coverimageproflie{
            padding: 130px 0px 10px 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .editprofile{
            position: absolute;
            overflow: hidden;
            color: white;
            background: #1284ff9e;
            /* width: 100%; */
            padding: 46px;
            width: 120px;
           
            overflow: hidden;
            height: 120px;
            border-radius: 50%;
        }
        .editbox{
            display: none;
        }
        .profileimagebox{
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
        .profileimagebox:hover .editbox {
            display: block;

        }
</style>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="far fa-user-circle"></i>
                    </div>
                        <div>Profile</div>
                    
                    
                </div>
                <div class="page-title-actions">
                    
                    <a href="{{url('/admin')}}"> <button class="mb-2 mr-2 btn btn-info "> <i class="fas fa-arrow-left"></i> Back </button> </a>
                </div>
            </div>
        </div>           

        <div class="card" style="padding:10px;">
            <form action="{{url('admin/update_profile')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="coverimageproflie" style="background-image:url({{asset('assest/web/assest/images/cover_image/')}}/{{$profile->cover_image ?? 'cover.png'}});">
                            <div class="input-group " >  
                                    
                                    <div class="profileimagebox">    
                                        <div class="editbox"><label   class="editprofile" for="inputGroupFile03" style="color:white;"><i class="fas fa-edit fa-2x"></i></label> </div>                                                           <!--  https://jmcp.edu.pk/wp-content/uploads/2020/10/blank-profile-picture-973460_1280-300x300-1.jpg  -->
                                            <input type="file" id="inputGroupFile03" name="profile_image" style="display:none;">
                                    <img class="imageprofile" src=" {{asset('assest/web/assest/images/profile_image/')}}/{{$profile->profile_image ?? 'profile.jpg'}} ">
                                    </div>
                                
                            
                            </div> 
                            <button type="button" class="btn btn-primary editcover"><label for="cover_image" style="color:white;"><i class="fas fa-edit"></i></label></button>
                            <input type="file" id="cover_image" name="cover_image" style="display:none;">
                            @error('cover_image')
                            <span class="help-block " style="color:red;">{{ $message }}</span>
                            @enderror
                            @error('profile_image')
                            <span class="help-block " style="color:red;">{{ $message }}</span>
                            @enderror
                        </div> 
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name" class=""><strong>Name</strong></label>
                            <input name="name" id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{$profile->name}}">
                            @error('name')
                            <span class="help-block " style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email" class=""><strong>Email</strong></label>
                            <input name="email" id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{$profile->email}}">
                            @error('email')
                            <span class="help-block " style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>     
                <button type="submit" class="mt-2 btn btn-primary">submit</button>    
            </form>
                
            
        </div>
                
    </div>   
</div>
                     
                
                    
                     
@endsection