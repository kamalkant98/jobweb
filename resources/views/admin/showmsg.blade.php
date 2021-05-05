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
                    <a href="{{url('admin/all_job')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                </div>
            </div>
        </div>  
            
        <div class="card" style="padding:10px;">
            <div class="card-body">
                        
                @include('admin.toster')
                @yield('content')   
                <h1>show msg</h1>
            </div>
        </div>
    </div>
</div>   
                           
@endsection