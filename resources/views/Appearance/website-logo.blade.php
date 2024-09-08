@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Appearance</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Appearance</li>
                    <li class="breadcrumb-item active">Website Logo</li>
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
                    <h5>Website Logo</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('website_logo_store')}}"method="post"enctype="multipart/form-data" novalidate="">
                      @csrf
                     <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="choose_image">Choose Image</label>
                          <input class="form-control" id="choose_image" type="file" name="header_logo" placeholder="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="width">Width</label>
                          <input class="form-control" id="width" type="text" name="header_logo_width"value="{{$setting->header_logo_width}}" placeholder="width" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="height">Height</label>
                          <input class="form-control" id="height" type="text" name="header_logo_height" value="{{$setting->header_logo_height}}"placeholder="height" required="">
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
@endsection 