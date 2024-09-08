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
                    <li class="breadcrumb-item active">Target Listings Promotion</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="email-wrap bookmark-wrap">
            <form action="{{route('seo_target_Update',['id'=>$page->page_id])}}"method="POST">
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
                                <div class="mb-3 ">
                                <h6 class="">Add New Page</h6>
                                </div>
                                <div class="mb-3">
                                  <input class="form-control" id="page_name" type="text" name="page_name" value="{{$page->page_name}}" placeholder="Page name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="panel panel-default border">
                                  <div class="panel-heading pb-2 alert alert-primary dark">Select listing to show this page below:
                                  </div>
                                  <div class="panel-body">
                                    <div class="mb-3">
                                      <div class="col-form-label p-3"> 
                                        <select class="js-example-placeholder-multiple col-sm-12" name="page_listings[]" multiple="multiple" require="require" >
                                          <option value="AL">Select some options</option>
                                          @php $sub=arr($page->page_listings); @endphp
                                          @foreach($listing as $user):
                                            @foreach($sub as $S)                            
                                           @if($user->listing_id==$S)
                                           <option value="{{$user->listing_id}}" selected >{{$user->listing_name}}</option>
                                            @endif
                                            @endforeach
                                          <option value="{{$user->listing_id}}" >{{$user->listing_name}}</option>
                                          @endforeach
                                        </select>
                                        @error('page_listings')
                                        <span class="small text-danger">{{$message}}</span>
                                        @enderror
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
                                        <input class="form-control" id="page_keywords" type="text" name="page_seo_keyword" value="{{$page->page_seo_keyword}}" placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                      <div class="mb-3 p-3">
                                        <label for="page_descriptions">Page descriptions</label>
                                        <input class="form-control" id="page_descriptions" type="text" name="page_seo_description" value="{{$page->page_seo_description}}" placeholder="Contact no" required="">
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
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="page_seo_schema" rows="3"> {{$page->page_seo_schema}}</textarea>
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
                      <div class="card">
                        <div class="">
                          <div class="email-app-sidebar left-bookmark custom-scrollbar">
                            <div class="panel panel-default border">
                              <div class="panel-heading pb-2 alert alert-primary dark">Publish
                              </div>
                                <div class="panel-body">
                                  <div class="mb-3">
                                    <div class="btn-showcase text-center">
                                      <button class="btn btn-success " type="submit">Save Changes</button>
                                    </div>
                                  </div> 
                                </div>
                            </div>
                            
                            <!-- <div class="media">
                              <div class="media-size-email"><img class="me-3 rounded-circle" src="../assets/images/user/user.png" alt=""></div>
                              <div class="media-body">
                                <h6 class="f-w-600">Publish</h6>
                                <p>Markjecno@gmail.com</p>
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
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