@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Coupon & Deals</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Coupon & Deals</li>
                    <li class="breadcrumb-item active">Add Coupon</li>
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
                    <h5>Add New Coupon</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('coupon_update',['id'=>$coupon->coupon_id])}}" method="Post"enctype="multipart/form-data">
                     @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="coupon_user_id">
                              <option value="">Choose a user</option>
                              @foreach($users as $user):
                                @if($user->user_id==$coupon->coupon_user_id)
                                <option value="{{$user->user_id}}" selected>{{$user->first_name}}</option>
                                @else
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="coupon_name">Coupon Name</label>
                          <input class="form-control" id="coupon_name" type="text" name="coupon_name" placeholder="Coupon Name*" value="{{$coupon->coupon_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('coupon_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="offer_code">Offer Code</label>
                          <input class="form-control" id="offer_code" type="text" name="coupon_code" placeholder="Offer Code" value="{{$coupon->coupon_code}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category:</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="category_id"required="">
                            <option value="">Select Category</option>
                              @foreach($category as $user):
                                @if($user->category_id==$coupon->category_id)
                                <option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
                                @else
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Sub Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="sub_category_id[]"required="">
                              <option value="">Select Sub Category</option>
                              @foreach($sub_category as $user):
                                @foreach($sub as $S)                            
                              @if($user->sub_category_id==$S)
                              <option value="{{$user->sub_category_id}}" selected >{{$user->sub_category_name}}</option>
                                @endif
                                @endforeach
                                <option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Child Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="child_category_id[]"required="">
                              <option value="">Select Child Category</option>
                              @foreach($child_category as $user):
                                @foreach($child as $C)                            
                              @if($user->child_category_id==$C)
                              <option value="{{$user->child_category_id}}" selected >{{$user->child_category_name}}</option>
                                @endif
                                @endforeach
                                <option value="{{$user->child_category_id}}" >{{$user->child_category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Brand</label>
                          <select class="js-example-basic-single col-sm-12"name="brand_id"required="">
                            <optgroup label="">
                              <option value="">Select Brand</option>
                              @foreach($brand as $user):
                                @if($user->brand_id==$coupon->brand_id)
                                <option value="{{$user->brand_id}}" selected>{{$user->brand_name}}</option>
                                @else
                                <option value="{{$user->brand_id}}" >{{$user->brand_name}}</option>
                                @endif
                                 @endforeach
                            </optgroup>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="website_link">Website Link</label>
                          <input class="form-control" id="website_link" type="text" name="coupon_link" placeholder="Website Link(if online offer)" value="{{$coupon->coupon_link}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="brand_logo">Brand logo or Offer image(Recommended size 65 X 65)</label>
                          <input class="form-control" id="brand_logo" type="file" name="coupon_photo[]" placeholder="Coupon photo*" multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Start Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class="form-control digits" type="date" data-language="en"name="coupon_start_date"value="{{$coupon->coupon_start_date}}">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">End Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class="form-control digits" type="date" data-language="en"name="coupon_end_date"value="{{$coupon->coupon_end_date}}">
                            </div>
                          <!-- </div> -->
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
        <!-- footer start-->
@endsection
@section('js')

@endsection