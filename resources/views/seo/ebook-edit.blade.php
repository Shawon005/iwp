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
            <form action="{{route('seo_ebook_Update',['id'=>$page->page_id])}}"method="POST">
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
                                  <input class="form-control" id="page_name" type="text" name="page_name" value="{{$page->page_name}}" placeholder="Page name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="mb-3">
                                  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="page_description" placeholder="Details about your listing">{{$page->page_description}}</textarea>
                                </div>
                                <div class="panel panel-default border">
                                  <div class="panel-heading pb-2 alert alert-primary dark">Custom CSS styles
                                  </div>
                                  <div class="panel-body">
                                    <div class="p-3">
                                      <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="page_css" placeholder="Write your CSS styles here">{{$page->page_css}}</textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="mt-3">
                                  <div class="panel panel-default border">
                                    <div class="panel-heading pb-2 alert alert-primary dark">Custom Js Script
                                    </div>
                                    <div class="panel-body">
                                      <div class=" p-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="page_js"placeholder="Write your script codes here">{{$page->page_js}}</textarea>
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
                                        <input class="form-control" id="page_title" type="text" name="page_seo_title" value="{{$page->page_seo_title}}" placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                      <div class=" p-3">
                                        <label for="page_keywords">Page keywords</label>
                                        <input class="form-control" id="page_keywords" type="text" name="page_seo_keyword" value="{{$page->page_seo_keyword}}"placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                      <div class="mb-3 p-3">
                                        <label for="page_descriptions">Page descriptions</label>
                                        <input class="form-control" id="page_descriptions" type="text" name="page_seo_description" value="{{$page->page_seo_description}}"placeholder="" required="">
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
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="page_seo_schema"rows="3">{{$page->page_seo_schema}}</textarea>
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
                                        <option value="Publish"{{($page->page_status=='Publish')?'selected':''}}>Publish</option>
                                        <option value="Draft"{{($page->page_status=='Draft')?'selected':''}}>Draft</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-center">Visibility</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple" name="page_visibilty">
                                        <option value="Public"{{($page->page_visibilty=='Public')?'selected':''}}>Public</option>
                                        <option value="Private"{{($page->page_visibilty=='Private')?'selected':''}}>Private</option>
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
                                        <option value="Default"{{($page->page_template=='Default')?'selected':''}}>Default</option>
                                        <option value="RHS"{{($page->page_template=='RHS')?'selected':''}}>Default with RHS</option>
                                        <option value="LHS"{{($page->page_template=='LHS')?'selected':''}}>Default with LHS</option>
                                        <option value="Custom"{{($page->page_template=='Custom')?'selected':''}}>Custom</option>
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
                                        <option value="1"{{($page->page_show_listings==1)?'selected':''}}>Yes</option>
                                        <option value="0"{{($page->page_show_listings==0)?'selected':''}}>No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Show Products</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_products">
                                      <option value="1"{{($page->page_show_products==1)?'selected':''}}>Yes</option>
                                        <option value="0"{{($page->page_show_products==0)?'selected':''}}>No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Show Events</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_events">
                                      <option value="1"{{($page->page_show_events==1)?'selected':''}}>Yes</option>
                                        <option value="0"{{($page->page_show_events==0)?'selected':''}}>No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Show Blogs</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_blogs">
                                      <option value="1"{{($page->page_show_blogs==1)?'selected':''}}>Yes</option>
                                        <option value="0"{{($page->page_show_blogs==0)?'selected':''}}>No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label class="col-sm-5 col-form-label text-end">Enquiry form</label>
                                    <div class="col-sm-5 text-end">
                                      <select class="js-example-placeholder-multiple"name="page_show_enquiry">
                                      <option value="1"{{($page->page_show_enquiry==1)?'selected':''}}>Yes</option>
                                        <option value="0"{{($page->page_show_enquiry==0)?'selected':''}}>No</option>
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
                                    @php $sub=arr($page->page_listings); @endphp
                                          @foreach($listing as $user):
                                            @foreach($sub as $S)                            
                                           @if($user->listing_id==$S)
                                           <option value="{{$user->listing_id}}" selected>{{$user->listing_name}}</option>
                                            @endif
                                            @endforeach
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
                                        @php $sub=arr($page->page_products); @endphp
                                          @foreach($products as $user):
                                            @foreach($sub as $S)                            
                                           @if($user->product_id==$S)
                                           <option value="{{$user->product_id}}" selected>{{$user->product_name}}</option>
                                            @endif
                                            @endforeach
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
                                        @php $sub=arr($page->page_events); @endphp
                                          @foreach($events as $user):
                                            @foreach($sub as $S)                            
                                           @if($user->event_id==$S)
                                           <option value="{{$user->event_id}}" selected>{{$user->event_name}}</option>
                                            @endif
                                            @endforeach
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
                                        @php $sub=arr($page->page_blogs); @endphp
                                          @foreach($blogs as $user):
                                            @foreach($sub as $S)                            
                                           @if($user->blog_id==$S)
                                           <option value="{{$user->blog_id}}" selected >{{$user->blog_name}}</option>
                                            @endif
                                            @endforeach
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