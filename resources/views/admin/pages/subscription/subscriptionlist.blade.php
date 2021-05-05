@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                    <div class="page-title-icon">
                    <i class="fas fa-shopping-bag"></i>
                        </div>Subscription Packages</div>
            <div class="page-title-actions">
                <a href="{{url('/admin/add_subscription')}}"><button class="mb-2 mr-2 btn btn-primary "> <i class="fas fa-plus"></i> Add </button></a>
                <a href="{{url('/admin')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
            </div>
        </div>
    </div>  
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> 
    <div class="card" style="padding:10px;">
        
            <table class="table table-striped" id="subscriptiontable" width="100%">
                <thead>
                <tr>
                    <th>Subscription Title</th>
                    <th>Price</th>
                    <th>For Days</th>
                    <th>For Category</th>
                    <th>Features</th>
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
     var table = $('#subscriptiontable').DataTable({
       "pagingType": "simple_numbers",
        processing: true,
        "language": {processing: '<i class="fas fa-circle-notch fa-spin fa-3x fa-fw"></i>'},
        serverSide: true,
        ajax: "{{route('subscription_list')}}",
        columns:[
           {'data':'subscription_title'},
           {'data':'subscription_price'},
           {'data':'subscription_days'},
           {'data':'subscription_category'},
           {'data':'subscription_features'},
           {'data':'status'},
           {'data':'action'}
          
       ]
     }); 
    
  }); 

</script> 

@endsection