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
            <form action="{{route('seo_listing_Update',['id'=>$category->category_id])}}"method="POST">
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
                                <h6 class="">Edit category SEO options</h6>
                                </div>
                                <div class="mb-3">
                                  <input class="form-control" id="page_name" type="text" readonly name="category_name" value="{{$category->category_name}}"placeholder="Page name" required="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="panel panel-default border">
                                  <div class="panel-heading pb-2 alert alert-primary dark">About this category
                                  </div>
                                  <div class="panel-body">
                                    <div class="mb-3">
                                      <div class="col-form-label p-3"> 
                                    
                                      <textarea class="form-control" name="category_description" id="" cols="3" rows="2">{{$category->category_description}}</textarea>
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
                                        <input class="form-control" id="page_title" type="text" name="category_seo_title"value="{{$category->category_seo_title}}" placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                      <div class=" p-3">
                                        <label for="page_keywords">Page keywords</label>
                                        <input class="form-control" id="page_keywords" type="text" name="category_seo_keywords" value="{{$category->category_seo_keywords}}"placeholder="" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                      <div class="mb-3 p-3">
                                        <label for="page_descriptions">Page descriptions</label>
                                        <input class="form-control" id="page_descriptions" type="text" name="category_seo_description" value="{{$category->category_seo_description}}" placeholder="Contact no" required="">
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                    </div>
                                  </div>
                                </div> 
                                <div>
                                <div class="panel-heading pb-2 mt-3 alert alert-primary dark">FAQ
                                    </div>
                                <div class="inn">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#faq1" type="button" role="tab" aria-controls="home" aria-selected="true">Faq1</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#faq2" type="button" role="tab" aria-controls="profile" aria-selected="false">Faq2</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#faq3" type="button" role="tab" aria-controls="contact" aria-selected="false">Faq3</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#faq4" type="button" role="tab" aria-controls="home" aria-selected="true">Faq4</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#faq5" type="button" role="tab" aria-controls="profile" aria-selected="false">Faq5</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#faq6" type="button" role="tab" aria-controls="contact" aria-selected="false">Faq6</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#faq7" type="button" role="tab" aria-controls="contact" aria-selected="false">Faq7</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#faq8" type="button" role="tab" aria-controls="contact" aria-selected="false">Faq8</button>
                                        </li>
                                    </ul>
                                 <div class="tab-content">
                                    <!--- FAQ START --->
                                    <div id="faq1" class="tab-pane fade in active show">
                                        <div class="form-group">
                                            <label>Faq 1</label>
                                            <input type="text" name="category_faq_1_ques" value="{{$category->category_faq_1_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_1_ans" placeholder="answer">{{$category->category_faq_1_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
                                    <!--- FAQ START --->
                                    <div id="faq2" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>Faq 2</label>
                                            <input type="text" name="category_faq_2_ques" value="{{$category->category_faq_2_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_2_ans" placeholder="answer">{{$category->category_faq_2_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
                                    <!--- FAQ START --->
                                    <div id="faq3" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>Faq 3</label>
                                            <input type="text" name="category_faq_3_ques" value="{{$category->category_faq_3_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_3_ans" placeholder="answer">{{$category->category_faq_3_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
                                    <!--- FAQ START --->
                                    <div id="faq4" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>Faq 4</label>
                                            <input type="text" name="category_faq_4_ques" value="{{$category->category_faq_4_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_4_ans" placeholder="answer">{{$category->category_faq_4_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
                                    <!--- FAQ START --->
                                    <div id="faq5" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>Faq 5</label>
                                            <input type="text" name="category_faq_5_ques" value="{{$category->category_faq_5_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_5_ans" placeholder="answer">{{$category->category_faq_5_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
                                    <!--- FAQ START --->
                                    <div id="faq6" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>Faq 6</label>
                                            <input type="text" name="category_faq_6_ques" value="{{$category->category_faq_6_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_6_ans" placeholder="answer">{{$category->category_faq_6_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
                                    <!--- FAQ START --->
                                    <div id="faq7" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>Faq 7</label>
                                            <input type="text" name="category_faq_7_ques" value="{{$category->category_faq_7_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_7_ans" placeholder="answer">{{$category->category_faq_7_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
                                    <!--- FAQ START --->
                                    <div id="faq8" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>Faq 8</label>
                                            <input type="text" name="category_faq_8_ques" value="{{$category->category_faq_8_ques}}" class="form-control" placeholder="Question"><br>
                                            <textarea class="form-control" name="category_faq_8_ans" placeholder="answer">{{$category->category_faq_8_ans}}</textarea>
                                        </div>
                                    </div>
                                    <!--- FAQ END --->
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
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="category_google_schema" rows="3">{{$category->category_google_schema}}</textarea>
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