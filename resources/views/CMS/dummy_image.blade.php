@extends('layout.master')
@section('content')
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
                  <h3>Dummy Image</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dummy Image</li>
                    <li class="breadcrumb-item active">Dummy Image</li>
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
                    <h5>Dummy Image</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('dummy_update')}}" method="Post"enctype="multipart/form-data">
                      @csrf
                      <div class="col-sm-3">
                       <h4>User Position</h4>
                       </div>
                      <div class="col-sm-3">
                         <img src="{{asset('/storage/file/'.Nam('vv_footer','footer_id',1,'user_default_image'))}}" width="80" height="60"  alt="">
                      </div>
                      <div class="col-sm-4">
                        <div class="mb-3">
                          
                          <input class="form-control" id="" type="file" name="user_default_image" placeholder="*" >
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>
                      <div class="btn-showcase mt-3">
                      <button class="btn btn-primary" type="submit">Submit</button>
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