@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>SEO Settings</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">SEO Settings</li>
                    <li class="breadcrumb-item active">Google Analytics</li>
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
                    <h5>Google Analytics</h5>
                  </div>
                  <div class="card-body add-post">
                  <form class="row needs-validation"action="{{route('google_ad_update')}}" method="Post" novalidate="">
                        @csrf
                      <div class="col-sm-12">
                        <div class="card border alert-light">
                          @php $google=footer(); @endphp
                          <div class="m-3">
                            <label></label>
                            <textarea class="form-control" id="exampleFormControlTextarea4" name="google_ad" rows="3">
                            {{$google->admin_google_ad_sense}}
                            </textarea>
                          </div>
                        </div>                        
                      </div>
                      <div class="btn-showcase text-end">
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
        <!-- footer start-->
@endsection