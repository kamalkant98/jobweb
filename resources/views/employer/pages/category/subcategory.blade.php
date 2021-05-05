@extends('admin.layouts.app')
@section('content')



<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                    <i class="fas fa-sitemap"></i>
                           
                                    </div>
                                    <div>Subcategorys
                                    
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                 <a href="{{url('admin/main_category')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                                   
                                </div>
                            </div>
                        </div>           
                                <div class="card" style="padding:10px;">
                                  
                                        <table class="table table-striped" id="employertable" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Meta Title</th>
                                                <th>Meta Description</th>
                                                <th>Description</th>
                                              
                                                <th>status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($subcategory as $category)
                                                    <tr>
                                                        <td><img class="categoryimage" src="{{asset('assest/web/assest/images/categoryimages')}}/{{ $category->image}}" alt="nothing" title="category-image"></td>
                                                        <td>{{ $category->name}}</td>
                                                        <td>{{ $category->meta_title}}</td>
                                                        <td>{{ $category->meta_description}}</td>
                                                        <td>{!!$category->description!!}</td>
                                                        <td>
                                                            @if($category->status == '0')
                                                                <div class="mb-2 mr-2 badge badge-danger">Deactive</div>
                                                            @elseif($category->status == '1')
                                                            <div class="mb-2 mr-2 badge badge-success">Active</div>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <a href="{{url('admin/category/edit')}}/{{$category->id}}"> <i class="far fa-edit" data="edit"></i></a>
                                                            <a  class=" mr-2 mb-2  delete" data-href="{{url('admin/category/delete')}}/{{$category->id}}" data-toggle="modal" data-target="#exampleModal">
                                                            <i class="far fa-trash-alt" data="delete"  title="Delete category"></i>
                                                            </a>
                                                            
                                                            </td>

                                                    </tr>
                                                @endforeach
                                            
                                            </tbody>
                                        </table> 
                                     
                                    </div>
                                </div>
                            </div>
                         </div>   
                     </div>
                
                  
@endsection