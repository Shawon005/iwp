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
                    <form action="{{route('filter_store')}}" method="post">
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
                        @foreach($listings as $listing)
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>1</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>{{$listing->all_featured_filter_name}}</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">                           
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="{{$listing->all_featured_filter_id}}">
                                  <option {{($listing->all_featured_filter_status==1)? 'selected':''}} value="1">Active</option>
                                  <option {{($listing->all_featured_filter_status==0)? 'selected':''}} value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        @endforeach
                        <!-- <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>2</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>Premium services</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">                           
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                              <select class="js-example-placeholder-multiple col-sm-12"name="2">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>3</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>Verified services</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">                           
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                              <select class="js-example-placeholder-multiple col-sm-12"name="3">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>4</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>Trending services</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">                           
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                              <select class="js-example-placeholder-multiple col-sm-12"name="4">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>5</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>  Offers and discounts</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">                           
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="5">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>6</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>  Latest updated</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">                           
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="6">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>7</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5> Most likes</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">                           
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="7">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr> -->
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