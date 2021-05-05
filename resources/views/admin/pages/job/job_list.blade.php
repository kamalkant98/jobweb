@extends('admin.layouts.app')
@section('content')

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                        <div class="page-title-icon">
                                        <i class="fas fa-briefcase"></i>
                                            </div>Job</div>
                                <div class="page-title-actions">
                                    <a href="{{url('/admin/add_job')}}"><button class="mb-2 mr-2 btn btn-primary "> <i class="fas fa-plus"></i> Add </button></a>
                                    <a href="{{url('/admin')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                                </div>
                            </div>
                        </div>  
                       
                          
                        
                                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> 
                                <div class="card" style="padding:10px;">
                                   
                                        <table class="table table-striped" id="jobtable" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Employer</th>
                                                <th>Category</th>
                                                <th>Experience</th>
                                                <th>Salary</th>
                                                <th>Location</th>
                                                <th>Status</th>
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
      var table = $('#jobtable').DataTable({
        "pagingType": "simple_numbers",
         processing: true,
         "language": {processing: '<i class="fas fa-circle-notch fa-spin fa-3x fa-fw"></i>'},
         serverSide: true,
         ajax: "{{route('job_list')}}",
         columns:[
            {'data':'job_title'},
            {'data':'employer'},
            {'data':'category'},
            {'data':'experience'},
            {'data':'salary'},
            {'data':'location'},
            {'data':'status'},
            {'data':'action'}
           
        ]
      }); 
     
   }); 

</script>             
@endsection