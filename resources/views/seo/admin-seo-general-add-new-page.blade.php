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
                    <li class="breadcrumb-item">SEO Options</li>
                    <li class="breadcrumb-item active">General Promotion Pages</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
               @endif
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="email-wrap bookmark-wrap">
            <form action="{{route('seo_general_Store')}}"method="POST">
              @csrf
              <div class="row">
                <div class="col-xl-9 col-md-12 box-col-9 xl-70">
                  <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                      <div class="ps-0">
                        <div class="tab-content">
                          <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                            <div class="card mb-0">
                              <div class="card-body pb-0">
                                <div class="mb-3">
                                  <h5 class="text-start">Add New Page</h5>
                                  <input class="form-control" id="page_name" type="text" name="page_name" placeholder="Page name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="mb-3">
                                  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="page_description" placeholder="Details about your listing"></textarea>
                                </div>
                                <div class="panel panel-default border">
                                  <div class="panel-heading pb-2 alert alert-primary dark">Custom CSS styles
                                  </div>
                                  <div class="panel-body">
                                    <div class="p-3">
                                      <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="page_css" placeholder="Write your CSS styles here"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="mt-3">
                                  <div class="panel panel-default border">
                                    <div class="panel-heading pb-2 alert alert-primary dark">Custom Js Script
                                    </div>
                                    <div class="panel-body">
                                      <div class=" p-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="page_js"placeholder="Write your script codes here"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div> 
                                <div class="mt-3">
                                  <div class="panel panel-default border">
                                    <div class="panel-heading pb-2 alert alert-primary dark">SEO Settings
                                    </div>
                                    <div class="panel-body">
                                      <div class=" p-3">
                                        <label for="page_title">Page title</label>
                                        <input class="form-control" id="page_title" type="text" name="page_seo_title" placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                      <div class=" p-3">
                                        <label for="page_keywords">Page keywords</label>
                                        <input class="form-control" id="page_keywords" type="text" name="page_seo_keyword" placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                      <div class="mb-3 p-3">
                                        <label for="page_descriptions">Page descriptions</label>
                                        <input class="form-control" id="page_descriptions" type="text" name="page_seo_description" placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                    </div>
                                  </div>
                                </div> 
                                <div class="mb-3 mt-3">
                                  <div class="panel panel-default border">
                                    <div class="panel-heading pb-2 alert alert-primary dark">Advance SEO settings
                                    </div>
                                    <div class="panel-body">
                                      <div class=" p-3">
                                        <label>Google schema</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="page_seo_schema"rows="3"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 box-col-3 xl-30">
                  <div class="email-sidebar"><a class="btn btn-primary email-aside-toggle" href="javascript:void(0)">bookmark filter</a>
                    <div class="email-left-aside">
                      <!-- <div class="card"> -->
                        <div class="">
                          <div class="email-app-sidebar left-bookmark custom-scrollbar">
                            <div class="card">
                              <div class="panel panel-default border">
                                <div class="panel-heading pb-2 alert alert-primary dark">Publish
                                </div>
                                
                                <div class="panel-body">
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-center">Status</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple" name="page_status">
                                        <option value="Publish">Publish</option>
                                        <option value="Draft">Draft</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-center">Visibility</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple" name="page_visibilty">
                                        <option value="Public">Public</option>
                                        <option value="Private">Private</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <div class="btn-showcase text-center">
                                      <button class="btn btn-success " type="submit">Save Changes</button>
                                    </div>
                                  </div> 
                                </div>  
                              </div>
                            </div>
                            <div class="card">
                              <div class="panel panel-default border">
                                <div class="panel-heading pb-2 alert alert-primary dark">Template Setting
                                </div>
                                <div class="panel-body">
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-center ">Template</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_template">
                                        <option value="Default">Default</option>
                                        <option value="Default with RHS">Default with RHS</option>
                                        <option value="Default with LHS">Default with LHS</option>
                                        <option value="Custom">Custom</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="border col-sm-9 ms-4 mb-3">
                                    <h5 class="p-1">Preview</h5>
                                    <div class=" inline text-start pb-2 ps-1">
                                      <img src="Image/default.png" alt="default.png">
                                      <img src="Image/default.png" alt="default.png">
                                      <img src="Image/default.png" alt="default.png">
                                    </div>
                                  </div>                                      
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="panel panel-default border">
                                <div class="panel-heading pb-2 alert alert-primary dark">Page Setting
                                </div>
                                <div class="panel-body">
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Show Listing</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple" name="page_show_listings">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Show Products</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_products">
                                      <option value="1">Yes</option>
                                        <option value="0">No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Show Events</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_events">
                                      <option value="1">Yes</option>
                                        <option value="0">No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Show Blogs</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_blogs">
                                      <option value="1">Yes</option>
                                        <option value="0">No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Enquiry form</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_enquiry">
                                      <option value="1">Yes</option>
                                        <option value="0">No</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="panel panel-default border">
                                <div class="panel-heading pb-2 alert alert-primary dark">Listings
                                </div>
                                <div class="panel-body">
                                  <div class="p-3 text-center">
                                    <select class="js-example-placeholder-multiple" multiple="multiple"name="page_listings[]">
                                    @foreach($listing as $user):
                                          <option value="{{$user->listing_id}}" >{{$user->listing_name}}</option>
                                          @endforeach
                                    </select>
                                  </div>
                                </div>                             
                              </div>
                            </div>
                            <div class="card">
                              <div class="panel panel-default border">
                                <div class="panel-heading pb-2 alert alert-primary dark">Products
                                </div>
                                <div class="panel-body">
                                  <div class="p-3 text-center">
                                    <select class="js-example-placeholder-multiple" multiple="multiple"name="page_products[]">
                                    @foreach($products as $user):
                                          <option value="{{$user->product_id}}" >{{$user->product_name}}</option>
                                          @endforeach
                                    </select>
                                  </div>
                                </div>                             
                              </div>
                            </div>
                            <div class="card">
                              <div class="panel panel-default border">
                                <div class="panel-heading pb-2 alert alert-primary dark">Events
                                </div>
                                <div class="panel-body">
                                  <div class="p-3 text-center">
                                    <select class="js-example-placeholder-multiple" multiple="multiple"name="page_events[]">
                                    @foreach($events as $user):
                                          <option value="{{$user->event_id}}" >{{$user->event_name}}</option>
                                          @endforeach
                                    </select>
                                  </div>
                                </div>                             
                              </div>
                            </div>
                            <div class="card">
                              <div class="panel panel-default border">
                                <div class="panel-heading pb-2 alert alert-primary dark">Blog Posts
                                </div>
                                <div class="panel-body">
                                  <div class="p-3 text-center">
                                    <select class="js-example-placeholder-multiple" multiple="multiple"name="page_blogs[]">
                                    @foreach($blogs as $user):
                                          <option value="{{$user->blog_id}}" >{{$user->blog_name}}</option>
                                          @endforeach
                                    </select>
                                  </div>
                                </div>                             
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      <!-- </div>-->                    
                    </div>
                  </div>
                </div>
                
              </div>
              </form>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
  @endsection