@extends('admin.layouts.app')
@section('content')

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                   
                                  
                                        @if(isset($editdata) && $editdata->parent_id =='0' )
                                            <div class="page-title-icon">
                                                <i class="far fa-list-alt"></i>
                                            </div>
                                            <div>  Edit Category </div>
                                        @elseif(isset($editdata) && $editdata->parent_id !=='0' )
                                            <div class="page-title-icon">
                                            <i class="fas fa-sitemap"></i>
                                            </div>
                                            <div>  Edit Subcategory </div>
                                           
                                        @else
                                            <div class="page-title-icon">
                                                <i class="far fa-list-alt"></i>
                                            </div>
                                            Add Category
                                        @endif


                                   
                                </div>
                                <div class="page-title-actions">
                                         @if(($editdata->parent_id ?? '') =='0')
                                         <a href="{{url('/admin/main_category')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>

                                        @elseif(isset($editdata) && $editdata->parent_id !=='0' )
                                        <a href="{{url()->previous()}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>

                                        @else
                                        <a href="{{url('/admin')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>

                                        @endif


                                </div>
                            </div>
                        </div>  
                            
                        <div class="card" style="padding:10px;">
                            <div class="card-body">
                                        @if(isset($editdata) && $editdata->parent_id =='0' )
                                        <form class="" action="{{url('admin/update_category') }}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="categoryid" value="{{$editdata->id ?? ''}}" >
                                        @elseif(isset($editdata) && $editdata->parent_id !=='0' )
                                        <form class="" action="{{url('admin/update_subcategory') }}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="categoryid" value="{{$editdata->id ?? ''}}" >
                                        @else
                                        <form class="" action="{{url('admin/create_category') }}" method="post" enctype="multipart/form-data">
                                           
                                        @endif
                                    
                                    @csrf
                                                <div class="">
                                                    <div class="position-relative form-group">
                                                        <label for="" class="">Parent category</label>
                                                            <select class=" form-control" name="parent_category">
                                                                <option value="0">Parent category</option>
                                                                    @foreach(maincategory() as $category)
                                                                       
                                                                        <option value="{{$category->id}}" @if(($editdata->parent_id ?? '')== $category->id ){{'selected'}} @endif>{{ucfirst($category->name)}}</option>
                                                                    @endforeach
                                                              
                                                            </select>
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                
                                                        <label for="categoryname" class="">Category name</label><!-- {{ old('category_name')}} -->
                                                        <input name="category_name" id="categoryname" placeholder="Category name" type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{old('category_name') ?? $editdata->name ?? ''}}">
                                                        @error('category_name')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="" class="">Status</label>
                                                            <select class=" form-control @error('status') is-invalid @enderror" name="status">
                                                                <option value="">Select</option>
                                                                <option value="1" @if(($editdata->status ?? '') == '1'){{'selected'}} @endif >Active</option>
                                                                <option value="0"  @if(($editdata->status ??'') == '0'){{'selected'}}@endif >Deactive</option>
                                                            </select>
                                                            @error('status')
                                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                           

                                                <div class="position-relative form-group col-md-6">
                                                    <label for="exampleFormControlTextarea1">Meta title</label>
                                                    <textarea class="form-control  @error('Meta_title') is-invalid @enderror " name="Meta_title" id="exampleFormControlTextarea1" rows="3" placeholder="Meta title">{{ old('Meta_title') ?? $editdata->meta_title ?? ''}}</textarea>
                                                    @error('Meta_title')
                                                    <span class="help-block " style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="position-relative form-group col-md-6">
                                                    <label for="exampleFormControlTextarea1">Meta description</label>
                                                    <textarea class="form-control   @error('Meta_description') is-invalid @enderror " name="Meta_description" id="exampleFormControlTextarea1" rows="3" placeholder="Meta description">{{ old('Meta_description') ?? $editdata->meta_description ?? '' }}</textarea>
                                                    @error('Meta_description')
                                                    <span class="help-block " style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group ">
                                                        <label for="exampleCity" class="">Description</label>
                                                        <textarea id="main_description" name="description" class="form-control " id="exampleFormControlTextarea1" rows="2" placeholder="Meta description">{{ old('description') ?? $editdata->description ?? '' }}</textarea>
                                                        @error('description')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleState" class="">Image</label>
                                                        <input  id="exampleState" name="Category_image" type="file" class="form-control @error('Category_image') is-invalid @enderror" value="{{$editdata->image ?? ''}}">
                                                        @error('Category_image')
                                                        <span class="help-block " style="color:red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                               
                                                </div>
                                                @if(isset($editdata) )
                                                <div class="col-md-2" >

                                                    <img  class="categoryimageedit" src="{{asset('assest/web/assest/images/categoryimages')}}/{{$editdata->image ?? ''}}" alt="dont have image" title="category image">
                                                </div>   
                                                @endif
                                               
                                            </div>
                                            <button type="submit" class="mt-2 btn btn-primary">submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>   
       
<script>
CKEDITOR.replace('main_description');
CKEDITOR.replace('sub_description');
</script>             
@endsection