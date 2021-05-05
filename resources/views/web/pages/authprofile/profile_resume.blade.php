@extends('web.layouts.app')
@section('content')



    <style>
        .modal-backdrop{
            z-index: 0 !important;
        }
        .modal {
            z-index:1000000 !important; 
        }
        .modal-dialog{
           max-width:700px;
        }
        label strong{
            color:black;
        }
        .card{
            margin-bottom:15px;
        }
    </style>
<div class="job_details_area">
        <div class="container" >
                <div class="row">
                    <!-- this is profile nevbar list -->
                    @include('.web.pages.authprofile.profile_list_nevbar')
                    <div class="col-md-8  col-xl-9 col-lg-8 profiledata">
                  
                        <div class="card" style="">
                            <div class="card-header">
                            Education
                                
                            </div>
                        
                            <div class="card-body">
                                    @if(!empty($data['education']))
                                      
                                            @foreach($data['education'] as $education)
                                            <div class="row" style="padding:10px 0px 10px 0px;">
                                                <div class="col-md-10">
                                                   <strong>{{$education->level_of_education}} in {{$education->field_of_study}}</strong></br>
                                                   <span>{{$education->college_or_university}} - {{$education->location}}</span></br>
                                                   <small>{{date('F, Y',strtotime($education->time_period_from))}}  To  @if (!empty($education->time_period_to)){{date('F, Y',strtotime($education->time_period_to)) }} @else {{$education->currently_enrolled	}} @endif</small>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                        <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#educationmodel{{$education->id}}">
                                                            <i class="fas fa-edit"></i> 
                                                        </a>
                                                         <a  class=" mr-2 mb-2  delete" data-href="{{url('education/delete')}}/{{$education->id}}" data-toggle="modal" data-target="#exampleModal" style="color:#1284ff;">
                                                            <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                                                        </a>
                                                   <!--  <a href="{{url('education/delete')}}/{{$education->id}}" style="color:#1284ff;">
                                                         <i class="far fa-trash-alt"></i>
                                                    </a> -->
                                           
                                                </div> 
                                            </div>  
                                            <div class="modal fade" id="educationmodel{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit your education</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{url('profile/education/update')}}/{{$education->id}}" method="post">
                                                        
                                                            @csrf
                                                            
                                                                <div class="row">
                                                                    <div class="col-md-12 form-group">
                                                                    <label for="level_of_education" class=""><strong>Level of Education </strong></label>
                                                                        <select class=" form-control @error('level_of_education') is-invalid @enderror" id="level_of_education" name="level_of_education" required>
                                                                            <option value="">Select an Option</option>
                                                                            <option value="None" @if ($education->level_of_education == 'None'){{'selected'}}  @endif>None</option>
                                                                            <option value="Secondary(10th Pass)" @if($education->level_of_education == 'Secondary(10th Pass)'){{'selected'}}  @endif >Secondary(10th Pass)</option>
                                                                            <option value="Higher Secondary(12th Pass)" @if($education->level_of_education == 'Higher Secondary(12th Pass)'){{'selected'}}  @endif>Higher Secondary(12th Pass)</option>
                                                                            <option value="Diploma" @if($education->level_of_education == 'Diploma') {{'selected'}}  @endif>Diploma</option>
                                                                            <option value="Bachelor's" @if($education->level_of_education == "Bachelor's"){{'selected'}}  @endif>Bachelor's</option>
                                                                            <option value="Master's" @if($education->level_of_education == "Master's"){{'selected'}}  @endif>Master's</option>
                                                                            <option value="Doctorate" @if($education->level_of_education == 'Doctorate'){{'selected'}}  @endif>Doctorate</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>Field of study </strong></label></br>
                                                                        <small>e.g. Biology, Computer Science, Intellectual Property, Nursing, Psychology.</small>
                                                                        <input type="text" class="form-control @error('field_of_study') is-invalid @enderror" placeholder="Field of study" name="field_of_study" value="{{ $education->field_of_study ?? ''}}">
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>College or University</strong></label>
                                                                        <input type="text" class="form-control @error('college_or_university') is-invalid @enderror" placeholder="College or University" name="college_or_university" value="{{ $education->college_or_university ?? ''}}">
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>School/Collage/University-location</strong></label></br>
                                                                        <small>e.g. city,state</small>
                                                                        <input type="text" class="form-control @error('education_location') is-invalid @enderror" placeholder="City,State" name="education_location" value="{{ $education->location ?? ''}}">
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>Time period</strong></label></br>
                                                                        <input type="checkbox" id="currently_enrolled{{$education->id}}" value="Present"  class="currently_enrolled" name="currently_enrolled" @if($education->currently_enrolled == 'Present') {{'checked'}} @endif> 
                                                                        <label for="currently_enrolled{{$education->id}}" class="">Currently enrolled</label>
                                                                    </div>

                                                                    <div class="col-md-4 form-group ">
                                                                        <label for="" class=""><strong>From</strong></label>
                                                                        <input type="month" class="form-control" placeholder="College or University" name="time_period_from" value="{{$education->time_period_from ?? ''}}">
                                                                    </div>
                                                                    @if(!empty($education->currently_enrolled))

                                                                    <div class="col-md-4 form-group education-time-period " style="display:none">
                                                                        <label for="" class=""><strong>To</strong></label>
                                                                        <input type="month" class="form-control" placeholder="College or University" name="time_period_to" value="{{$education->time_period_to ?? ''}}">
                                                                    </div>
                                                                    @else
                                                                    <div class="col-md-4 form-group education-time-period">
                                                                        <label for="" class=""><strong>To</strong></label>
                                                                        <input type="month" class="form-control" placeholder="College or University" name="time_period_to" value="{{$education->time_period_to ?? ''}}">
                                                                    </div>
                                                                    @endif
                                                                    

                                                                </div>
                                                                <div class="modal-footer ">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>                                             
                                @endforeach
                                        


                                    @endif
                                    <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#exampleModalLong">
                                    <i class="fas fa-plus-circle"></i> Add your education
                                    </a>

                                  
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add your education</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   <form action="{{url('profile/education')}}" method="post">
                                                   
                                                    @csrf
                                                        <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                            <label for="level_of_education" class=""><strong>Level of Education </strong></label>
                                                                <select class=" form-control @error('level_of_education') is-invalid @enderror" id="level_of_education" name="level_of_education" required>
                                                                    <option value="">Select an Option</option>
                                                                    <option value="None">None</option>
                                                                    <option value="Secondary(10th Pass)">Secondary(10th Pass)</option>
                                                                    <option value="Higher Secondary(12th Pass)">Higher Secondary(12th Pass)</option>
                                                                    <option value="Diploma">Diploma</option>
                                                                    <option value="Bachelor's">Bachelor's</option>
                                                                    <option value="Master's">Master's</option>
                                                                    <option value="Doctorate">Doctorate</option>
                                                                 </select>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>Field of study </strong></label></br>
                                                                <small>e.g. Biology, Computer Science, Intellectual Property, Nursing, Psychology.</small>
                                                                <input type="text" class="form-control @error('field_of_study') is-invalid @enderror" placeholder="Field of study" name="field_of_study">
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>School/College/University</strong></label>
                                                                <input type="text" class="form-control @error('college_or_university') is-invalid @enderror" placeholder="College or University" name="college_or_university">
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>School/Collage/University-location</strong></label></br>
                                                                <small>e.g. city,state</small>
                                                                <input type="text" class="form-control @error('education_location') is-invalid @enderror" placeholder="City,State" name="education_location">
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>Time period</strong></label></br>
                                                                <input type="checkbox" id="currently_enrolled" class="currently_enrolled" value="Present"   name="currently_enrolled"> 
                                                                <label for="currently_enrolled" class="">Currently enrolled</label>
                                                            </div>

                                                            <div class="col-md-4 form-group ">
                                                                <label for="" class=""><strong>From</strong></label>
                                                                <input type="month" class="form-control" placeholder="College or University" name="time_period_from">
                                                            </div>
                                                            <div class="col-md-4 form-group education-time-period">
                                                                <label for="" class=""><strong>To</strong></label>
                                                                <input type="month" class="form-control" placeholder="College or University" name="time_period_to">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer ">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        @include('.web.pages.authprofile.resumefiles.workexperience')
                        @include('.web.pages.authprofile.resumefiles.skills')
                        @include('.web.pages.authprofile.resumefiles.certifications')
                        @include('.web.pages.authprofile.resumefiles.additional_information')
                        @include('.web.pages.authprofile.resumefiles.languages')
                        


                        





                        <!-- <div class="card" style="">
                            <div class="card-header">
                            Online Profile
                                
                            </div>
                        
                            <div class="card-body">

                                    <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#exampleModalLong5">
                                    <i class="fas fa-plus-circle"></i> Add Online Profile
                                    </a>

                                  
                                    <div class="modal fade" id="exampleModalLong5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Online Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   <form action="{{url('profile/certifications&license')}}" method="post">
                                                    @csrf
                                                        <input type="hidden" name="userid" value="">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>URL- required </strong></label></br>
                                                                <small>e.g. Address of your blog, personal homepage, Facebook or Twitter profile.</small>
                                                                <input type="text" class="form-control @error('online_profile_url') is-invalid @enderror" placeholder="http://" name="online_profile_url">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer ">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div> -->



                        







                    </div>

                </div>
        </div>
</div>

<script>


    

    $(document).ready(function(){

    

        $(document).on('change','.currently_enrolled',function(){
            /* console.log($(this).attr('id')); */
            if($(this).prop("checked")){
                $(this).parents('.modal').find('.education-time-period').hide();
            }else{
                $(this).parents('.modal').find('.education-time-period').show();
            }

        });

       /*  $(document).on('change','#i_work_currently_here',function(){
            if($(this).prop( "checked")){
                $('#exampleModalLong1').find('.work-time-period').hide();
            }else{
                $('#exampleModalLong1').find('.work-time-period').show();
            }

        }); */

    });

</script>
@endsection