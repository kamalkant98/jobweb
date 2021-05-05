                        
                        
                        <div class="card" style="">
                            <div class="card-header">
                            Work Experience
                                
                            </div>
                        
                            <div class="card-body">

                                @if(!empty($data['workexperience']))

                                        @foreach($data['workexperience'] as $workexperience)
                                            <div class="row" style="padding:10px 0px 10px 0px;">
                                                <div class="col-md-10">
                                                    <strong>{{$workexperience->job_title}}</strong></br>
                                                    <span>{{$workexperience->company_name}} - {{$workexperience->location}}</span></br>
                                                    <small>{{date('F, Y',strtotime($workexperience->work_time_period_from))}}  To  @if (!empty($workexperience->work_time_period_to)){{date('F, Y',strtotime($workexperience->work_time_period_to)) }} @else {{$workexperience->time_period	}} @endif</small>
                                                    <div class="job_description" style="font-size:12px;">{!!$workexperience->job_description!!}</div>
                                                </div>

                                                <div class="col-md-2 text-center">
                                                    <a href="javascript:void(0)" style="color:#1284ff;" class="editbtn" data-toggle="modal" data-target="#workexp{{$workexperience->id}}">
                                                        <i class="fas fa-edit"></i> 
                                                    </a>
                                                        <a  class=" mr-2 mb-2  delete" data-href="{{url('experience/delete')}}/{{$workexperience->id}}" data-toggle="modal" data-target="#exampleModal" style="color:#1284ff;">
                                                        <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                                                    </a>
                                                </div>
                                              
                                            </div>
                                            <div class="modal fade" id="workexp{{$workexperience->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit work experience</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{url('profile/experience/update')}}/{{$workexperience->id}}" method="post">
                                                            @csrf
                                                               
                                                                <div class="row">
                                                                    <!-- -->

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>Job title - required</strong></label></br>
                                                                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" placeholder="Job title" name="job_title" required value="{{$workexperience->job_title ?? ''}}">
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>Company</strong></label>
                                                                        <input type="text" class="form-control @error('company') is-invalid @enderror" placeholder="Company" name="company" value="{{$workexperience->company_name ?? ''}}">
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>Work location</strong></label></br>
                                                                        <small>e.g. city,state</small>
                                                                        <input type="text" class="form-control @error('work_location') is-invalid @enderror" placeholder="City,State" name="work_location" required value="{{$workexperience->location ?? ''}}">
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="" class=""><strong>Time period</strong></label></br>
                                                                        <input type="checkbox" id="work_time_period{{$workexperience->id ?? ''}}" value="Present"  class="work_time_period" placeholder="" name="work_time_period" @if($workexperience->time_period == 'Present') {{'checked'}} @endif> 
                                                                        <label for="work_time_period{{$workexperience->id ?? ''}}" class="">I currently work here</label>
                                                                    </div>

                                                                    <div class="col-md-4 form-group ">
                                                                        <label for="" class=""><strong>From</strong></label>
                                                                        <input type="month" class="form-control"  name="work_time_period_from" value="{{$workexperience->work_time_period_from ?? ''}}">
                                                                    </div>
                                                                      @if(!empty($workexperience->time_period))

                                                                        <div class="col-md-4 form-group work-time-period_to " style="display:none">
                                                                            <label for="" class=""><strong>To</strong></label>
                                                                            <input type="month" class="form-control"  name="work_time_period_to" >
                                                                        </div>
                                                                    @else
                                                                        <div class="col-md-4 form-group work-time-period_to">
                                                                            <label for="" class=""><strong>To</strong></label>
                                                                            <input type="month" class="form-control "  name="work_time_period_to" value="{{$workexperience->work_time_period_to ?? ''}}">
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-md-12">
                                                                        <label for="experience_description" class="">Job Description</label>
                                                                        <textarea id=""   name="experience_description" class="form-control experience_description"  rows="2" placeholder="">{{$workexperience->job_description ?? ''}}</textarea>
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

                                        @endforeach


                                @endif

                                    <!----> <a href="javascript:void(0)" style="color:#1284ff;" class="addbtn" data-toggle="modal" data-target="#exampleModalLong1">
                                    <i class="fas fa-plus-circle"></i> Add your work experience
                                    </a> 

                                  
                                    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add your work experience</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   <form action="{{url('profile/experience')}}" method="post">
                                                    @csrf
                                                        <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                                                        <div class="row">
                                                            <!-- -->

                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>Job title - required</strong></label></br>
                                                               <input type="text" class="form-control @error('job_title') is-invalid @enderror" placeholder="Job title" name="job_title" required>
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>Company</strong></label>
                                                                <input type="text" class="form-control @error('company') is-invalid @enderror" placeholder="Company" name="company" >
                                                            </div>

                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>Work location</strong></label></br>
                                                                <small>e.g. city,state</small>
                                                                <input type="text" class="form-control @error('work_location') is-invalid @enderror" placeholder="City,State" name="work_location" required>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>Time period</strong></label></br>
                                                                <input type="checkbox" id="work_time_period" class="work_time_period" value="Present"  placeholder="" name="work_time_period"> 
                                                                <label for="work_time_period" class="">I currently work here</label>
                                                            </div>

                                                            <div class="col-md-4 form-group ">
                                                                <label for="" class=""><strong>From</strong></label>
                                                                <input type="month" class="form-control"  name="work_time_period_from">
                                                            </div>
                                                            <div class="col-md-4 form-group work-time-period_to">
                                                                <label for="" class=""><strong>To</strong></label>
                                                                <input type="month" class="form-control "  name="work_time_period_to" >
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="experience_description" class="">Job Description</label>
                                                                <textarea id=""  name="experience_description" class="form-control experience_description1"  rows="2" placeholder=""></textarea>
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
<script>


$(document).ready(function(){
   
    $(document).on('click','.addbtn', function(){
       
        CKEDITOR.replace('experience_description1',{
            toolbarGroups: [
                {
                "name": "paragraph",
                "groups": ["list"]
                }]
        }); 
    })     
  
    
   $(document).on('click','.editbtn', function(){
        CKEDITOR.replace('experience_description',{
            toolbarGroups: [
                {
                "name": "paragraph",
                "groups": ["list"]
                }]
        });
    }) 
   
    $(document).on('change','.work_time_period',function(){

             if($(this).prop( "checked")){
                $(this).parents('.modal').find('.work-time-period_to').hide();
            }else{
                $(this).parents('.modal').find('.work-time-period_to').show();
           
            } 

    });
});
</script>