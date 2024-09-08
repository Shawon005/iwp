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
                    <li class="breadcrumb-item">Listing Filter</li>
                    <li class="breadcrumb-item active">Features</li>
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
                    <h5>All Feature Filters</h5>
                  </div>
                  <div class="card-body add-post">
                    <form action="{{route('category_filter_store')}}" method="post">
                        @csrf
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-sm-2">
                            <div>
                              <h5>No</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div>
                              <h5>Feature Name</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            
                          </div>
                          <div class="col-sm-4">
                            <div>
                              <h5>Status</h5>
                            </div>
                          </div>
                        </div>
                        <hr>
                        @php $no=1 @endphp
                        @foreach($category as $cat)
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>{{$no++}}</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>{{$cat->category_name}}</h5>
                            </div>
                          </div>
                          
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="{{$cat->category_id}}">
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3"> 
                          <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="{{$cat->category_code}}">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                </select>
                              </div>
                            </div>                          
                          </div>
                        </div>
                        <hr>
                        @endforeach
                        <div class="btn-showcase text-end">
                          <button class="btn btn-primary" type="submit">Save Changes</button>
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
@endsection