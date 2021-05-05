@extends('admin.layouts.app')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>Subscription Package
                    </div>
                    <div class="page-title-actions">
                        <a href="{{url('/admin/add_subscription')}}"><button class="mb-2 mr-2 btn btn-primary "> <i class="fas fa-plus"></i> Add </button></a>
                        <a href="{{url('/admin/subscription')}}"><button class="mb-2 mr-2 btn btn-danger"> <i class="fas fa-arrow-left"></i> Back </button></a>
                    </div>
                </div>
            </div>  
            <div class="card" style="">
                <div class="card-body">
                        <form action="{{url('admin/create_subscription')}}" method="post">
                        @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="subscription_title" class="">Subscription Title</label>
                                            <input  id="subscription_title" name="subscription_title" type="text" placeholder="Subscription Title" class="form-control @error('subscription_title') is-invalid @enderror" value="{{old('subscription_title') }}">
                                            @error('subscription_title')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       
                                        <div class="position-relative form-group">
                                            <label for="payment_type" class="">Payment type</label>
                                            <select class=" form-control @error('payment_type') is-invalid @enderror" id="payment_type" name="payment_type">
                                                <option value="">Choose status</option>
                                                <option value="price">Price</option>
                                                <option value="percentage">Percentage %</option>
                                            </select>
                                            @error('payment_type')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="subscription_price" class="">Subscription Price / Percentage</label>
                                            <input  id="subscription_price" name="subscription_price" type="text" placeholder="Subscription Price" class="form-control @error('subscription_price') is-invalid @enderror" value="{{old('subscription_price') }}">
                                            @error('subscription_price')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="subscription_days" class="">Subscription plan for days</label>
                                            <input  id="subscription_days" name="subscription_days" type="number" placeholder="Subscription plan for days " class="form-control @error('subscription_days') is-invalid @enderror" value="{{old('subscription_days') }}">
                                            @error('subscription_days')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="category" class="">For Category</label>
                                            <select class=" form-control @error('category') is-invalid @enderror" id="category" name="category">
                                                <option value="">Choose category</option>
                                                <option value="all">All</option>
                                                @foreach(allcategory() as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>  
                                            @error('category')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="status" class="">Status</label>
                                            <select class=" form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                <option value="">Choose status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                                

                                            </select>                                            
                                            @error('status')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="paid_type" class="">Paid Type</label>
                                            <select class=" form-control @error('paid_type') is-invalid @enderror" id="paid_type" name="paid_type">
                                                <option value="">Choose status</option>
                                                <option value="postpaid">Postpaid</option>
                                                <option value="prepaid">Prepaid</option>
                                                

                                            </select>                                            
                                            @error('paid_type')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                       
                                        <div class="position-relative form-group">
                                            <label for="subscription_features" class="">Subscription Features</label>
                                            <textarea id="subscription_features" name="subscription_features" class="form-control "  rows="2" placeholder="">{{old('subscription_features')}}</textarea>
                                            @error('subscription_features')
                                            <span class="help-block " style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                </div>
                            
                            <button type="submit" class="mt-2 btn btn-primary">submit</button>
                        </form>
                </div>
            </div>
                
            
                    
        </div>
<script>
  /*   CKEDITOR.replace('subscription_features'); */
    CKEDITOR.replace('subscription_features',{
     toolbar: [
      { name: 'paragraph', items: ['BulletedList'] },
	]
    });

   
</script>
@endsection