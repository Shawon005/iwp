@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Coupon Category</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Coupon Category</li>
                    <li class="breadcrumb-item active">Add Brand</li>
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
                    <form class="row needs-validation" action="{{route('brand_update',['id'=>$brand->brand_id])}}" method="Post">
                     @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="brand_name">Brand Name</label>
                          <input class="form-control" id="brand_name" type="text" name="brand_name" placeholder="Brand Name*" value="{{$brand->brand_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('brand_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Update</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </form>
                    <div class="btn-showcase text-end">
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
 @endsection