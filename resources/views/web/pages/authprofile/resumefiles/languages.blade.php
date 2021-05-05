<div class="card" style="">
    <div class="card-header">
    Languages
        
    </div>

    <div class="card-body">
            @if(!empty($data['languages']))
                @foreach($data['languages'] as $language)
                    <div class="row" style="padding:10px 0px 10px 0px;">
                        <div class="col-md-10">
                            <strong>{{$language->language}}</strong> - <small>{{$language->proficiency_language}}</small>
                        </div>

                        <div class="col-md-2 text-center">
                            <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#language{{$language->id}}">
                                <i class="fas fa-edit"></i> 
                            </a>
                                <a  class=" mr-2 mb-2  delete" data-href="{{url('language/delete')}}/{{$language->id}}" data-toggle="modal" data-target="#exampleModal" style="color:#1284ff;">
                                <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                            </a>
                        </div>
                    </div>


            <div class="modal fade" id="language{{$language->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Language</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('profile/language/update')}}/{{$language->id}}" method="post">
                            @csrf
                              
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="" class=""><strong>Language- required </strong></label></br>
                                        <input type="text" class="form-control @error('language') is-invalid @enderror" placeholder="language" name="language" required value="{{$language->language ?? ''}}">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="proficiency_language" class=""><strong>Proficiency - required</strong></label>
                                        <select class=" form-control @error('proficiency_language') is-invalid @enderror" id="proficiency_language" name="proficiency_language" required>
                                            <option value="">Select</option>
                                            <option value="Expert" @if($language->proficiency_language == 'Expert') {{'selected'}} @endif>Expert</option>
                                            <option value="Fluent" @if($language->proficiency_language == 'Fluent') {{'selected'}} @endif>Fluent</option>
                                            <option value="Intermediate" @if($language->proficiency_language == 'Intermediate') {{'selected'}} @endif>Intermediate</option>
                                            <option value="Beginner" @if($language->proficiency_language == 'Beginner') {{'selected'}} @endif>Beginner</option>
                                            </select>
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

            <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#exampleModalLong4">
            <i class="fas fa-plus-circle"></i> Add Languages
            </a>

            
            <div class="modal fade" id="exampleModalLong4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Language</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('profile/language')}}" method="post">
                            @csrf
                                <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="" class=""><strong>Language- required </strong></label></br>
                                        <input type="text" class="form-control @error('language') is-invalid @enderror" placeholder="language" name="language" required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="proficiency_language" class=""><strong>Proficiency - required</strong></label>
                                        <select class=" form-control @error('proficiency_language') is-invalid @enderror" id="proficiency_language" name="proficiency_language" required>
                                            <option value="">Select</option>
                                            <option value="Expert">Expert</option>
                                            <option value="Fluent">Fluent</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Beginner">Beginner</option>
                                            </select>
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