@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>News & Magaines</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Category</li>
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
                    <h5>Add New Category</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action ="{{route('news_category_store')}}"method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="category_name">Category Name</label>
                          <input class="form-control" id="category_name" type="text" name="category_name" placeholder="Category Name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('category_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3"> 
                          <h5>SEO Details</h5>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
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
  