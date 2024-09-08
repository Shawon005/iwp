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
                    <li class="breadcrumb-item active">Add Category</li>
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
                    <h5>Add New Listing Category</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('listing_category_store')}}" method="post"enctype="multipart/form-data">
                     @csrf
                    <div class="mb-3">
                          <label for="category_name">Category Name</label>
                          <input class="form-control" id="category_name" type="text" name="category_name" placeholder=" Category name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      <div class="col-sm-12"> 
                        <div class="mb-3">
                          <label for="choose_category_image">Choose Category Image</label>
                          <input class="form-control" id="choose_category_image" type="file" name="category_image" placeholder="" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">submit</button>
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
       @endsection