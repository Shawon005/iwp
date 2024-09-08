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
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Listing Promotions</li>
                    <li class="breadcrumb-item active">Points Setting</li>
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
                    <h5>Points Settings</h5>
                  </div>
                  <div class="card-body add-post">
                    <form action="{{route('listing_point_store')}}" method="post" novalidate="">
                      @csrf
                      <div class="col-sm-12">
                        <div class="p-3">
                          <label for="category_name">Cost Per Point</label>
                          <input class="form-control" id="" type="text" name="cost" placeholder=""value="{{$listing->cost_per_point}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="btn-showcase text-end">
                          <button class="btn btn-primary" type="submit">Submit</button>
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
        <!-- footer start-->
@endsection 