<div class="card" style="">
    <div class="card-header">
    Certifications / Licenses
        
    </div>

    <div class="card-body">
            @if(!empty($data['certifications']))
                @foreach($data['certifications'] as  $certification)
                    <div class="row" style="padding:10px 0px 10px 0px;">
                        <div class="col-md-10">
                            <strong>{{$certification->certification_title}}</strong></br>
                            <small>{{date('F, Y',strtotime($certification->certification_time_period_from))}}  To  @if (!empty($certification->certification_time_period_to )){{date('F, Y',strtotime($certification->certification_time_period_to)) }} @else {{$certification->certification_time_period }} @endif</small>
                            <div style="font-size:12px;">{!!$certification->certification_description!!}</div>
                        </div>
                        <div class="col-md-2 text-center">
                                <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#certificationmodel{{$certification->id}}">
                                    <i class="fas fa-edit"></i> 
                                </a>

                                <a  class=" mr-2 mb-2  delete" data-href="{{url('certifications/delete')}}/{{$certification->id}}" data-toggle="modal" data-target="#exampleModal" style="color:#1284ff;">
                                    <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                                </a>

                        </div>

                    </div>

                    <div class="modal fade" id="certificationmodel{{$certification->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit your certifications</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('profile/certifications/update')}}/{{$certification->id}}" method="post">
                                    @csrf
                                        
                                        <div class="row">
                                            

                                            <div class="col-md-12 form-group">
                                                <label for="" class=""><strong>certification/license Title - required </strong></label></br>
                                                <input type="text" class="form-control @error('certification_title') is-invalid @enderror" placeholder="certification/license Title" name="certification_title" required value="{{$certification->certification_title ?? ''}}">
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label for="" class=""><strong>Time period</strong></label></br>
                                                <input type="checkbox" id="certification_expire" class="certification_expire" value="Present"  name="certification_expire" @if($certification->certification_time_period == 'Present') {{'checked'}} @endif> 
                                                <label for="certification_expire" class="">This certification or license does not expire</label>
                                            </div>

                                            <div class="col-md-4 form-group ">
                                                <label for="" class=""><strong>From</strong></label>
                                                <input type="month" class="form-control" name="certification_time_period_from"  value="{{$certification->certification_time_period_from ?? ''}}">
                                            </div>

                                            @if(!empty($certification->certification_time_period))

                                            <div class="col-md-4 form-group license_time_period_to" style="display:none">
                                                <label for="" class=""><strong>To</strong></label>
                                                <input type="month" class="form-control"  name="certification_time_period_to">
                                            </div>
                                            @else
                                                <div class="col-md-4 form-group license_time_period_to">
                                                    <label for="" class=""><strong>To</strong></label>
                                                    <input type="month" class="form-control"  name="certification_time_period_to" value="{{$certification->certification_time_period_to ?? ''}}">
                                                </div>

                                            @endif
                                            <div class="col-md-12">
                                                <label for="certification_description" class="">Description</label>
                                                <textarea id="certification_description" name="certification_description" class="form-control "  rows="2" placeholder="">{{$certification->certification_description ?? ''}}</textarea>
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
            <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#exampleModalLong2">
            <i class="fas fa-plus-circle"></i> Add your certifications
            </a>

            
            <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add your certifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('profile/certifications')}}" method="post">
                            @csrf
                                <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                                <div class="row">
                                    

                                    <div class="col-md-12 form-group">
                                        <label for="" class=""><strong>certification/license Title - required </strong></label></br>
                                        <input type="text" class="form-control @error('certification_title') is-invalid @enderror" placeholder="certification/license Title" name="certification_title" required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="" class=""><strong>Time period</strong></label></br>
                                        <input type="checkbox" id="certification_expire" class="certification_expire" value="Present"  name="certification_expire"> 
                                        <label for="certification_expire" class="">This certification or license does not expire</label>
                                    </div>

                                    <div class="col-md-4 form-group ">
                                        <label for="" class=""><strong>From</strong></label>
                                        <input type="month" class="form-control" name="certification_time_period_from">
                                    </div>

                                    <div class="col-md-4 form-group license_time_period_to">
                                        <label for="" class=""><strong>To</strong></label>
                                        <input type="month" class="form-control"  name="certification_time_period_to">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="certification_description" class="">Description</label>
                                        <textarea id="certification_description" name="certification_description" class="form-control "  rows="2" placeholder=""></textarea>
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
    
    CKEDITOR.replace('certification_description',{
        toolbarGroups: [
            {
            "name": "paragraph",
            "groups": ["list"]
            }]
    });

    $(document).on('change','.certification_expire',function(){
           
        if($(this).prop( "checked")){
        $(this).parents('.modal').find('.license_time_period_to').hide();
        }else{
        $(this).parents('.modal').find('.license_time_period_to').show();

        }  

    });
</script>