@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Product Category</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Product Category</li>
                    <li class="breadcrumb-item active">Add New Brand</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Add New Brand</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('product_brand_update',['id'=>$brand->brand_id])}}" method="post">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category </label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="category_id" id="category_id">
                              <option value="">Select Category</option>
                                @foreach($category as $user):
                                @if($user->category_id==$brand->category_id)
                                <option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
                                @else
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="brand_name">Brand Name</label>
                          <input class="form-control" id="brand_name" type="text" name="brand_name" placeholder="Brand Name*" value="{{$brand->brand_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                      <button class="btn btn-primary" type="submit">Update</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </div>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
 @endsection       
