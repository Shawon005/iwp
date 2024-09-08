@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Popular Tag</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Popular Tag</li>
                    <li class="breadcrumb-item active">Popular Tag</li>
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
                    <h5>Popular Tag</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('popular_tag_store')}}" method="Post"enctype="multipart/form-data">
                      @csrf
                     <div class="col-sm-12">
                        <div class="mb-3">
                          
                          <input class="form-control" id="category_name" type="text" name="popular_tags_name" placeholder="populer Tags Name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                         
                        </div>
                        <div class="mb-3">
                          
                          <input class="form-control" id="choose_category_image" type="text" name="popular_tags_link" placeholder="popular Tags Link" required=""multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
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
        <!-- footer start-->
@endsection