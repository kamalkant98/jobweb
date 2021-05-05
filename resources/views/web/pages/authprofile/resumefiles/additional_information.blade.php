<div class="card" style="">
    <div class="card-header">
    Additional Information
        
    </div>

    <div class="card-body">

            @if(!empty($data['additional_info']))
                @foreach($data['additional_info'] as $additional_info)
                    <div class="row " style="padding:10px 0px 10px 0px;">
                        <div class="col-md-10">
                            <p>{!!$additional_info->informations!!}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#info{{$additional_info->id}}">
                                <i class="fas fa-edit"></i> 
                            </a>
                                <a  class=" mr-2 mb-2  delete" data-href="{{url('informations/delete')}}/{{$additional_info->id}}" data-toggle="modal" data-target="#exampleModal" style="color:#1284ff;">
                                <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                            </a>
                        </div>
                    </div>

                    <div class="modal fade" id="info{{$additional_info->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Additional Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('profile/additional_information/update')}}/{{$additional_info->id}}" method="post">
                                    @csrf
                                    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="additional_information" class="">Additional Information </label>
                                                <textarea id="additional_information" name="additional_information" class="form-control "  rows="2" placeholder="" required>{{$additional_info->informations}}</textarea>
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

            <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#exampleModalLong3">
            <i class="fas fa-plus-circle"></i> Add Additional Information
            </a>

            
            <div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Additional Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('profile/additional_information')}}" method="post">
                            @csrf
                                <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="additional_information" class="">Additional Information </label>
                                        <textarea id="additional_information" name="additional_information" class="form-control "  rows="2" placeholder="" required></textarea>
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
    CKEDITOR.replace('additional_information',{
     toolbarGroups: [
        {
        "name": "paragraph",
        "groups": ["list"]
        }]
    });
</script>