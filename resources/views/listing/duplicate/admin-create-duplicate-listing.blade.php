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
                    <li class="breadcrumb-item">Listings</li>
                    <li class="breadcrumb-item active">Create Duplicate Listings</li>
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
                    <h5>Create New Duplicate Listings</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('listing_duplicate_store')}}" method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Listing Name</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="listing_id">
                              <option value="AL">Listing Name</option>
                              @foreach($listing as $user):
                              <option value="{{$user->listing_id}}" >{{$user->listing_name}}</option>
                               @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="user_id">
                              <option value="AL">Choose user</option>
                              @foreach($users as $user):
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="listing_name">Listing Name</label>
                          <input class="form-control" id="listing_name" type="text" name="listing_name" placeholder="Listing Name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Create Now</button>
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
