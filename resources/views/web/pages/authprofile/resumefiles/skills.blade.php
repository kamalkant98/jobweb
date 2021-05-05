<div class="card" style="">
                            <div class="card-header">
                            Skills
                                
                            </div>
                        
                            <div class="card-body">
                                @if(!empty($data['skills']))
                                    @foreach($data['skills'] as $skill)
                                        <div class="row" style="padding:10px 0px 10px 0px;">
                                            <div class="col-md-10">
                                                <strong>{{$skill->skill}}</strong> - <small>{{$skill->proficiency_skill}}</small>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#skill{{$skill->id}}">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                                    <a  class=" mr-2 mb-2  delete" data-href="{{url('skill/delete')}}/{{$skill->id}}" data-toggle="modal" data-target="#exampleModal" style="color:#1284ff;">
                                                    <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="modal fade" id="skill{{$skill->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit skills</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="{{url('profile/skill/update')}}/{{$skill->id}}" method="post">
                                                        @csrf
                                                            
                                                            <div class="row">
                                                                <div class="col-md-12 form-group">
                                                                    <label for="" class=""><strong>Skill - required</strong></label></br>
                                                                    <small>e.g. Microsoft Office, Java, Tally, Python etc.</small>
                                                                    <input type="text" class="form-control @error('skill') is-invalid @enderror" placeholder="skill" name="skill" required value="{{$skill->skill ?? ''}}">
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                        <label for="experience_skill" class=""><strong>Years of experience</strong></label>
                                                                            <select class=" form-control @error('experience_skill') is-invalid @enderror" id="experience_skill" name="experience_skill" required>
                                                                                <option value="">Select</option>
                                                                                <option value="Less than 1 year" @if($skill->proficiency_skill == 'Less than 1 year') {{'selected'}} @endif >Less than 1 year</option>
                                                                                <option value="1 year"  @if($skill->proficiency_skill == 'Less than 1 year') {{'selected'}} @endif >1 year</option>
                                                                                <option value="2 years"  @if($skill->proficiency_skill == '2 years') {{'selected'}} @endif>2 years</option>
                                                                                <option value="3 years"  @if($skill->proficiency_skill == '3 years') {{'selected'}} @endif>3 years</option>
                                                                                <option value="4 years" @if($skill->proficiency_skill == '4 years') {{'selected'}} @endif>4 years</option>
                                                                                <option value="5 years" @if($skill->proficiency_skill == '5 years') {{'selected'}} @endif>5 years</option>
                                                                                <option value="6 years"  @if($skill->proficiency_skill == '6 years') {{'selected'}} @endif>6 years</option>
                                                                                <option value="7 years"  @if($skill->proficiency_skill == '7 years') {{'selected'}} @endif>7 years</option>
                                                                                <option value="8 years"  @if($skill->proficiency_skill == '8 years') {{'selected'}} @endif>8 years</option>
                                                                                <option value="9 years"  @if($skill->proficiency_skill == '9 years') {{'selected'}} @endif>9 years</option>
                                                                                <option value="10+ years"  @if($skill->proficiency_skill == '10+ years') {{'selected'}} @endif>10+ years</option>
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

                                    <a href="javascript:void(0)" style="color:#1284ff;" data-toggle="modal" data-target="#exampleModalLong7">
                                    <i class="fas fa-plus-circle"></i> Add skills
                                    </a>

                                  
                                    <div class="modal fade" id="exampleModalLong7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add skills</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   <form action="{{url('profile/skill')}}" method="post">
                                                    @csrf
                                                        <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label for="" class=""><strong>Skill - required</strong></label></br>
                                                                <small>e.g. Microsoft Office, Java, Tally, Python etc.</small>
                                                                <input type="text" class="form-control @error('skill') is-invalid @enderror" placeholder="skill" name="skill" required>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                    <label for="experience_skill" class=""><strong>Years of experience</strong></label>
                                                                        <select class=" form-control @error('experience_skill') is-invalid @enderror" id="experience_skill" name="experience_skill" required>
                                                                            <option value="">Select</option>
                                                                            <option value="Less than 1 year">Less than 1 year</option>
                                                                            <option value="1 year">1 year</option>
                                                                            <option value="2 years">2 years</option>
                                                                            <option value="3 years">3 years</option>
                                                                            <option value="4 years">4 years</option>
                                                                            <option value="5 years">5 years</option>
                                                                            <option value="6 years">6 years</option>
                                                                            <option value="7 years">7 years</option>
                                                                            <option value="8 years">8 years</option>
                                                                            <option value="9 years">9 years</option>
                                                                            <option value="10+ years">10+ years</option>
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