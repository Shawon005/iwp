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
                    <form action="{{route('filter_feature_store')}}" method="post">
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
                          <!-- <div class="col-sm-3">
                            
                          </div> -->
                          <div class="col-sm-4">
                            <div>
                              <h5>Status</h5>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>1</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>Search the service</h5>
                            </div>
                          </div>
                          <!--<div class="col-sm-3">                           
                          </div>-->
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="row1">
                                  <option value="Active"{{($listing->service_filter=="Active")?'selected':''}}>Active</option>
                                  <option value="Inactive"{{($listing->service_filter=="Inactive")?'selected':''}}>Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-4">
                              <h5>2</h5>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-4">
                              <h5>Categories filter</h5>
                            </div>
                          </div>
                          <!--<div class="col-sm-3">                           
                          </div>-->
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                              <select class="js-example-placeholder-multiple col-sm-12"name="row2">
                                  <option value="Active"{{($listing->category_filter=="Active")?'selected':''}}>Active</option>
                                  <option value="Inactive"{{($listing->category_filter=="Inactive")?'selected':''}}>Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3"> 
                             <a href="{{route('category_filter_listing')}}">go to filter</a>                       
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
                              <h5>Features filter</h5>
                            </div>
                          </div>
                          <!--<div class="col-sm-3">                           
                          </div>-->
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                              <select class="js-example-placeholder-multiple col-sm-12"name="row3">
                                  <option value="Active"{{($listing->feature_filter=="Active")?'selected':''}}>Active</option>
                                  <option value="Inactive"{{($listing->feature_filter=="Inactive")?'selected':''}}>Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                           <div class="col-sm-3"> 
                             <a href="{{route('filter_feature_listing')}}">go to filter</a>                       
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
                              <h5>Rating filter</h5>
                            </div>
                          </div>
                          <!--<div class="col-sm-3">                           
                          </div>-->
                          <div class="col-sm-4">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                              <select class="js-example-placeholder-multiple col-sm-12"name="row4">
                                  <option value="Active"{{($listing->rating_filter=="Active")?'selected':''}}>Active</option>
                                  <option value="Inactive"{{($listing->rating_filter=="Inactive")?'selected':''}}>Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
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