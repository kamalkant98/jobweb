@extends('admin.layouts.app')
@section('content')
            <style>
                       /* . page-link{
                            color: red ;
                            background: aqua ;
                            border: solid 2px green ;
                            border-radius: 50% ;
                            margin: 2px ;
                        }
                        .pagination.active{
                            background-color:black  !important;
                        } */
            </style>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                        <div class="page-title-icon">
                                        <i class="fas fa-graduation-cap"></i>
                                            </div>Qualification</div>
                                <div class="page-title-actions">
                                    <a href="{{url('/admin')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                                </div>
                            </div>
                        </div>  
                       
                            <div class="card" style="padding:10px; margin-bottom:10px;" >
                                <div class="card-body">
                                    <form class="" action="{{url('admin/create_qualification')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="qualificationid" value="{{$qualification_edit->id  ?? ''}}">
                                        <div class="position-relative form-group">
                                            <label for="qualification_name" class="">Qualification Name</label>
                                            <input name="qualification_name" id="qualification_name" placeholder="Qualification Name" type="text" class="form-control @error('qualification_name') is-invalid @enderror" value="{{old('qualification_name')?? $qualification_edit->qualification_name ?? '' }}" >
                                            @error('qualification_name')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="" class="">Status</label>
                                                <select  class=" form-control @error('status') is-invalid @enderror" name="status">
                                                    <option value="">Select</option>
                                                    <option value="1" @if(($qualification_edit->status  ?? '') == '1' ) {{'selected'}} @endif>Active</option>
                                                    <option value="0" @if(($qualification_edit->status ?? '')  == '0' ) {{'selected'}} @endif>Deactive</option>
                                                </select>
                                                @error('status')
                                                <span class="help-block " style="color:red;">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <button type="submit" class="mt-2 btn btn-primary">submit</button>
                                    </form>
                                </div>
                            </div>   
                        
                                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> 
                                <div class="card" style="padding:10px;">
                                  
                                        <table class="table table-striped" id="table123" width="100%">
                                            <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>Cover</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            </tbody>
                                        </table> 
                                       <!--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
                                        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
                                        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
                                    </div>
                                </div>
                         
       
<script>
    
    
    $(document).ready(function(){
      var table = $('#table123').DataTable({
        "pagingType": "simple_numbers",
         processing: true,
         "language": {processing: '<i class="fas fa-circle-notch fa-spin fa-3x fa-fw"></i>'},
         serverSide: true,
         ajax: "{{route('qualification_list')}}",
         columns:[
            {'data':'name'},
            {'data':'status'},
            {'data':'action'}
            
            
        ]
      }); 
     
   });

</script>             
@endsection