@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Listings</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Listing Category</li>
                    <li class="breadcrumb-item active">Add Sub Category</li>
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
                    <h5>Add New Listing Sub Category</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" novalidate=""action="{{route('listing_sub_category_update',['id'=>$sub_category->sub_category_id])}}" method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="category_id">
                              <option value="AL">Choose Category</option>
                              @foreach($category as $user):
                                @if($user->category_id==$sub_category->category_id)
                                <option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
                                @else
                                <option value="{{$user->category_id}}">{{$user->category_name}}</option>
                                @endif
                                 @endforeach>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="sub_category_name">Sub Category Name</label>
                          <input class="form-control" id="sub_category_name" type="text" name="sub_category_name" placeholder="Sub Category Name*" value="{{$sub_category->sub_category_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('sub_category_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="btn-showcase text-end">
                          <button class="btn btn-primary" type="submit">Update</button>
                          <input class="btn btn-light" type="reset" value="Discard">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection     <!-- footer start-->
  