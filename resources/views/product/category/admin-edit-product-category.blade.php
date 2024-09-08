
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
                    <li class="breadcrumb-item active">Add Product Category</li>
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
                    <h5>Add New Product Category</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('product_category_update',['id'=>$category->category_id])}}"method="post"enctype="multipart/form-data">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="category_name">Category Name</label>
                          <input class="form-control" id="category_name" type="text" name="category_name" placeholder="Category Name" value="{{$category->category_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="choose_category_image">Choose Category Image</label>
                          <input class="form-control" id="choose_category_image" type="file" name="category_image[]" placeholder="" >
                          
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
        @endsection
        <!-- footer start-->
 