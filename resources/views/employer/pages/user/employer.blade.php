@extends('admin.layouts.app')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->



<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                <i class="fas fa-layer-group "></i>
                                    </div>
                                    <div>Employer
                                   
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="{{url('admin/add_employer')}}"><button class="mb-2 mr-2 btn btn-primary "> <i class="fas fa-plus"></i> Add </button></a>
                                    <a href="{{url()->previous()}}"><button class="mb-2 mr-2 btn btn-danger "> <i class="fas fa-arrow-left"></i> Back </button></a>
                                   
                                </div>
                            </div>
                        </div>           
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> 
                                <div class="card" style="padding:10px;">
                                  
                                        <table class="table table-striped" id="employertable" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Profile</th>
                                                <th>cover</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>status</th>
                                                <th>action</th>
                                                
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
                            </div>
                         </div>   
                     </div>
                
                    
                     <script>
   $(document).ready(function(){
      var table = $('#employertable').DataTable({
        "pagingType": "simple_numbers",
         processing: true,
         "language": {processing: '<i class="fas fa-circle-notch fa-spin fa-3x fa-fw"></i>'},
         serverSide: true,
         ajax: "{{route('employerlist')}}",
         columns:[
            {'data':'profile'},
            {'data':'cover'},
            {'data':'name'},
            {'data':'email'},
            {'data':'mobile'},
            {'data':'status'},
            {'data':'action'}
        
        ]
      }); 
     
   });

</script>
@endsection