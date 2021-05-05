@extends('employer.layouts.app')
@section('content')
    <style>
        .modal-content{
            margin-top:65px;
            margin-left:40px;
        }
        .modal-backdrop {
            z-index: -2;
        }
    </style>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                        <div class="page-title-icon">
                        <i class="fas fa-briefcase"></i>
                            </div>Applicant</div>
                <div class="page-title-actions">
                 <a href="#"><button class="mb-2 mr-2 btn btn-primary ">  Interview Schedule </button></a>
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
                            <th>applyed for</th>
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
                                    <a href="{{ url('/download/resume')}}/{{get_user_meta($applicant->id,'resume')}}"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i> </button></a>
                                
                                @else
                                <a href="{{ url('/download/resume_cepture_image')}}/{{get_user_meta($applicant->id,'resume_cepture_image')}}"><button type="button" class="btn btn-primary"><i class="fas fa-download"></i></button></a>
                                @endif
                                </td>
                                <td><a href="{{url('employer/job/edit')}}/{{$applicant->job_id}}">{{$applicant->jobname}}</a></td>
                                <td>
                                   <!---->  @if($applicant->actively_progress == '1')
                                               
                                            <div class=""> 
                                                <i class="far fa-clock" style="color:#f7b924;"></i> &nbsp;<strong> In Progress</strong>
                                            </div>
                                   
                                            @elseif($applicant->actively_progress == '2') 
                                            <div class=""> 
                                                <i class="fas fa-clipboard-check" style="color:#3f6ad8;"></i>&nbsp;<strong> Resume Selected </strong>
                                            </div>

                                            @elseif($applicant->actively_progress == '3')
                                            <div class=""> 
                                                <i class="far fa-calendar-check" style="color:#3f6ad8;"></i>&nbsp;<strong>Interview Schedule </strong>
                                            </div>
                                            @elseif($applicant->actively_progress == '4')
                                            <div class="">
                                                <i class="fas fa-check-double"  style="color:#2eb72e;"></i>&nbsp;<strong>Hired</strong>
                                            </div>
                                            @elseif($applicant->actively_progress == '0')
                                                <div class="">
                                                    <i class="far fa-times-circle" style="color:#d21945;"></i>&nbsp;<strong> Not Selected </strong>
                                                </div>

                                            @endif
                                </td>
                             
                                <td>
                                   
                                    <div class="dropdown d-inline-block">
                                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-outline-light">Actively update</button>
                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                            @if($applicant->actively_progress !== '0')
                                                <a href="{{url('employer/actively_update')}}/{{$applicant->job_id ?? ''}}/{{$applicant->id}}/0">
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="far fa-times-circle" style="color:#d21945;"></i>&nbsp;
                                                        <strong> Not Selected </strong>
                                                    </button>
                                                </a>

                                            @endif
                                            @if($applicant->actively_progress !== '1') 
                                                <a href="{{url('employer/actively_update')}}/{{$applicant->job_id ?? ''}}/{{$applicant->id}}/1">
                                                <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="far fa-clock" style="color:#f7b924;"></i> &nbsp;
                                                        <strong> In Progress</strong>
                                                
                                                </button>
                                                </a>
                                            @endif
                                            @if($applicant->actively_progress !== '2')
                                                <a href="{{url('employer/actively_update')}}/{{$applicant->job_id ?? ''}}/{{$applicant->id}}/2">
                                                <button type="button" tabindex="0" class="dropdown-item">
                                                    <i class="fas fa-clipboard-check" style="color:#3f6ad8;"></i>&nbsp;
                                                    <strong> Resume Selected </strong>
                                                
                                                </button>
                                                </a>
                                            @endif
                                            @if($applicant->actively_progress !== '3')
                                               <!--  <a href="{{url('employer/actively_update')}}/{{$applicant->job_id ?? ''}}/{{$applicant->id}}/3"> -->
                                                <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target="#form{{$applicant->id}}">
                                                    <i class="far fa-calendar-check" style="color:#3f6ad8;"></i>&nbsp;
                                                    <strong>Interview Schedule </strong>
                                                
                                                </button>
                                            @else
                                                <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target="#form{{$applicant->id}}">
                                                    <i class="far fa-calendar-check" style="color:#3f6ad8;"></i>&nbsp;
                                                    <strong>Interview Re-Schedule </strong>
                                                
                                                </button>

                                            @endif
                                            <!--</a> -->
                                            @if($applicant->actively_progress !== '4')
                                                <a href="{{url('employer/actively_update')}}/{{$applicant->job_id ?? ''}}/{{$applicant->id}}/4">
                                                <button type="button" tabindex="0" class="dropdown-item">
                                                    <i class="fas fa-check-double"  style="color:#2eb72e;"></i>&nbsp;
                                                    <strong>Hired</strong>
                                                
                                                </button>
                                                </a>
                                            @endif  
                                            </div>
                                        </div>
                                        <a href="{{url('employer/applicant/details')}}/{{$applicant->id}}" title="Applicant Details"><i class="fas fa-info-circle" style="font-size:20px;"></i></a>
                                        <a  class=" mr-2 mb-2  delete" data-href="hgjghjgh" data-toggle="modal" data-target="#exampleModal">
                                            <i class="far fa-trash-alt" data="delete"  title="Delete category" style="font-size:20px;"></i>
                                        </a>
                                </td>


                                
                            </tr>
                               
                            <div class="modal fade " tabindex="-1" id="form{{$applicant->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Interview Schedule</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{url('employer/actively_update')}}/{{$applicant->job_id ?? ''}}/{{$applicant->id}}/3" method="post">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label >Date</label>
                                                        <input type="date" name="date" class="form-control" required value="{{$applicant->date ?? '' }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label >Time</label>
                                                        <input type="time" name="time" class="form-control" required value="{{$applicant->time ?? '' }}">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label >Address</label>
                                                        <textarea class="form-control" name="address" rows="3" id="comment" required>{{$applicant->address ?? '' }}</textarea>
                                                    </div>
                                                   @if( $applicant->actively_progress == '3')
                                                        <div class="form-group col-md-12">
                                                            <label>Interview Re-Schedule Reason</label>
                                                            <textarea class="form-control" name="reason" rows="3" id="comment" required></textarea>
                                                        </div>
                                                    @endif




                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Interview Schedule </button>
                                        </div>
                                 </form>
                                    </div>
                                </div>
                            </div>  
                        @endforeach
                   </tbody>
               </table>
                {!! $applicants->links() !!}
            </div>
           
            

        </div>
           
@endsection