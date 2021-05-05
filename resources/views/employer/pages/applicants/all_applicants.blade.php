@extends('employer.layouts.app')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                        <div class="page-title-icon">
                        <i class="fas fa-briefcase"></i>
                            </div>All Applicant</div>
                <div class="page-title-actions">
                    <a href="{{url('employer/add_job')}}"><button class="mb-2 mr-2 btn btn-primary "> <i class="fas fa-plus"></i> Add </button></a>
                    <a href="{{url('employer/all_job')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                </div>
            </div>
        </div>  
        
        <div class="card" style="padding:10px;">
                <table class="table table-striped" id="jobtable" width="100%">
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Resume</th>
                            <th></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applicants as $applicant )
                            <tr>
                                <td><a href="{{url('employer/applicant/details')}}/{{$applicant->id}}" title="Applicant Details"> <img class="profile_image" src="{{asset('assest/web/assest/images/profile_image/')}}/{{ $applicant->profile_image ?? 'profile.jpg'}}"> </a></td>
                                <td><a href="{{url('employer/applicant/details')}}/{{$applicant->id}}" title="Applicant Details"> {{$applicant->name}} </a></td>
                                <td><a href="{{url('employer/applicant/details')}}/{{$applicant->id}}" title="Applicant Details"> {{$applicant->email}} </a></td>
                                <td> 
                                    @if(!empty(get_user_meta($applicant->id,'resume')))
                                        <a href="{{ url('/download/resume')}}/{{get_user_meta($applicant->id,'resume')}}"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                    
                                    @else
                                    <a href="{{ url('/download/resume_cepture_image')}}/{{get_user_meta($applicant->id,'resume_cepture_image')}}"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                    @endif
                                </td>
                                <td>
                                    @if($applicant->actively_update == null)
                                    <div class="badge badge-warning"><i class="far fa-clock"  style="color:black;"></i> In Progress</div>
                                   
                                    @endif
                                
                                </td>
                             

                                <td>
                                    <button class='btn btn-outline-primary'>Actively update </button>
                                    <a href="{{url('employer/applicant/details')}}/{{$applicant->id}}" title="Applicant Details"><i class="fas fa-info-circle"></i></a> 
                                    <a href="#" title="Applicant Delete"><i class="far fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                   </tbody>
               </table>
                {!! $applicants->links() !!}
            </div>
        </div>
           
@endsection