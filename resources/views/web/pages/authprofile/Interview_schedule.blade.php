@extends('web.layouts.app')
@section('content')



    <style>
        
        label strong{
            color:black;
        }
        .card{
            margin-bottom:15px;
        }
        .not_found{
            text-align: center;
            margin: auto;
            color: #1284ff;
            padding: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
</style>
        <div class="job_details_area">
            <div class="container" >
                <div class="row">
                    <!-- this is profile nevbar list -->
                    @include('.web.pages.authprofile.profile_list_nevbar')
                    <div class="col-md-8  col-xl-9 col-lg-8 profiledata">
                        @forelse($data as $interview)
                            <div class="card">
                                <div class="card-body" style="font-size: small;color: #474e67;">
                                    <div>
                                        <a href="{{url('jobs/job_details')}}/{{$interview->id}}"><h4>{{$interview->job_title}}</h4></a>
                                        <span style="color:#1181e5;">{{getuser($interview->employer)->name}}</span>

                                        <div> <span style="color:#1181e5;"><i class="far fa-calendar-alt"></i> :</span> {{ date('d-m-Y', strtotime($interview->date))}} <span style="color:#1181e5;"><i class="far fa-clock"></i> :</span> {{ date('h:i A', strtotime($interview->time))}} </div>
                                        
                                        <div><span style="color:#1181e5;"><i class="fas fa-map-marker-alt"></i> :</span> {{$interview->address}} </div>
                                        <div><span style="color:#1181e5;"><i class="fas fa-phone-volume"></i> :</span> {{getuser($interview->employer)->mobile}} ,{{getuser($interview->employer)->person_mobile}}</div>
                                        <div><span style="color:#1181e5;"><i class="far fa-user"></i>:</span> {{getuser($interview->employer)->person_name}} </div>

                                    </div>
                                    
                                    
                                    <button type="button" data-toggle="collapse" data-target="#{{$interview->job_id}}" aria-expanded="true" aria-controls="collapseOne" class=" btn btn-outline-dark btn-sm" style="margin-bottom:10px;margin-top:10px;">
                                    Interview Re-Schedule 
                                    </button>
                                    
                                    <div data-parent="#accordion" id="{{$interview->job_id}}" aria-labelledby="headingOne" class="collapse ">
                                        <div class="card">
                                            <div class="card-header">
                                            Interview Re-Schedule Form
                                            </div>
                                            <div class="card-body" >
                                            <form action="{{url('employer/actively_update')}}/{{$interview->job_id ?? ''}}/{{auth()->user()->id}}/3" method="post">
                                                        @csrf
                                                    
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label >Date</label>
                                                                    <input type="date" name="date" class="form-control" required value="{{$interview->date ?? '' }}">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label >Time</label>
                                                                    <input type="time" name="time" class="form-control" required value="{{$interview->time ?? '' }}">
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label >Address</label>
                                                                    <textarea class="form-control" name="address" rows="3" id="comment" required disabled>{{$interview->address ?? '' }}</textarea>
                                                                </div>
                                                                 @if( $interview->actively_progress == '3')
                                                                    <div class="form-group col-md-12">
                                                                        <label>Interview Re-Schedule Reason</label>
                                                                        <textarea class="form-control" name="reason" rows="3" id="comment" required></textarea>
                                                                    </div>
                                                                @endif
                                                        </div>
                                                   
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>

                            @empty
                            <div class="not_found"><i class="fas fa-business-time fa-2x"></i> &nbsp;Not found</div>
                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>

    
@endsection