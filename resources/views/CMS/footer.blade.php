@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>CMS</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Footer</li>
                    <li class="breadcrumb-item active">Footer CMS</li>
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
                    <h5>Footer CMS</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" class="row needs-validation" novalidate=""action="{{route('footer_store')}}" method="Post"enctype="multipart/form-data">
                     @csrf
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mb-3 ms-3">
                            <h5>Section</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <h5>Text</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <h5>Change</h5>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12">Support</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Phone Num:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="phone_no" type="text" name="footer_mobile" value="{{$footer->footer_mobile}}"placeholder="Phone num" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12">Top category</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 1:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                              <select class="js-example-placeholder-multiple col-sm-12"name=top_category_1 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_1==$product->category_id)
                                  <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 2:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=top_category_2 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_2==$product->category_id)
                                 <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                 <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 3:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=top_category_3 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_3==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 4:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=top_category_4>
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_4==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 5:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=top_category_5 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_5==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 6:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=top_category_6 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_6==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 7:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=top_category_7 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_7==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 8:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=top_category_8 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->top_category_8==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12">Trending category</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 1:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_1 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->trend_category_1==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 2:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_2 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->trend_category_2==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 3:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_3 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->trend_category_3==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 4:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_4 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                < @if($footer->trend_category_4==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 5:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_5 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->trend_category_5==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 6:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_6>
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->trend_category_6==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3 ">
                            <h5>Category 7:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_7>
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->trend_category_7==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-3  ms-4 ">
                            <h5>Category 8:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name=trend_category_8 >
                                <option value="">category</option>
                                @foreach($products as $product)
                                @if($footer->trend_category_8==$product->category_id)
                                <option value="{{$product->category_id}}"selected>{{$product->category_name}}</option>
                                @else
                                <option value="{{$product->category_id}}">{{$product->category_name}}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12">Get in touch</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Address:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="address" type="text" name="footer_address" value="{{$footer->footer_address}}"placeholder="address" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12">Mobile app</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Android:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="android" type="text" name="mobile_app_andriod"  value="{{$footer->mobile_app_andriod}}"placeholder="play store download link" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Apple:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="apple" type="text" name="mobile_app_ios" value="{{$footer->mobile_app_ios}}" placeholder="app store download link" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12">Social media</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5> Facebook:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="facebook" type="text" name="footer_fb" value="{{$footer->footer_fb}}"placeholder="profile link" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Twitter:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="facebook" type="text" name="footer_twitter"  value="{{$footer->footer_twitter}}"placeholder="profile link" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Linkedin:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="linkedin" type="text" name="footer_linked_in"value="{{$footer->footer_linked_in}}" placeholder="profile link" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Youtube:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="youtube" type="text" name="footer_youtube"value="{{$footer->footer_youtube}}" placeholder="profile link" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>WhatsApp:</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="whatsapp_mobile_number" type="text" name="footer_whatsapp"value="{{$footer->footer_whatsapp}}" placeholder="whatsapp mobile number" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12">Help & Support</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5> Page name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_name" type="text" name="footer_page_name_1" value="{{$footer->footer_page_name_1}}"placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Page URL:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_url" type="text" name="footer_page_url_1"value="{{$footer->footer_page_url_1}}" placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5> Page name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_name" type="text" name="footer_page_name_2" value="{{$footer->footer_page_name_2}}"placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Page URL:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_url" type="text" name="footer_page_url_2"value="{{$footer->footer_page_url_2}}" placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5> Page name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_name" type="text" name="footer_page_name_3" value="{{$footer->footer_page_name_3}}"placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Page URL:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_url" type="text" name="footer_page_url_3" value="{{$footer->footer_page_url_3}}"placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5> Page name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_name" type="text" name="footer_page_name_4"value="{{$footer->footer_page_name_4}}" placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Page URL:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="page_url" type="text" name="footer_page_url_4"value="{{$footer->footer_page_url_4}}" placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12">Other countries</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5>Country name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_name" type="text" name="footer_country_name_1"value="{{$footer->footer_page_url_4}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Country url:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_url" type="text" name="footer_country_url_1" value="{{$footer->footer_country_url_1}}" placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5>Country name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_name" type="text" name="footer_country_name_2"value="{{$footer->footer_country_name_2}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Country url:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_url" type="text" name="footer_country_url_2"value="{{$footer->footer_country_url_2}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5>Country name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_name" type="text" name="footer_country_name_3"value="{{$footer->footer_country_name_3}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Country url:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_url" type="text" name="footer_country_url_3"value="{{$footer->footer_country_url_3}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5>Country name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_name" type="text" name="footer_country_name_4"value="{{$footer->footer_country_name_4}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Country url:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_url" type="text" name="footer_country_url_4"value="{{$footer->footer_country_url_4}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5>Country name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_name" type="text" name="footer_country_name_5"value="{{$footer->footer_country_name_5}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Country url:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_url" type="text" name="footer_country_url_5"value="{{$footer->footer_country_url_5}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5>Country name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_name" type="text" name="footer_country_name_6"value="{{$footer->footer_country_name_6}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Country url:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_url" type="text" name="footer_country_url_6"value="{{$footer->footer_country_url_6}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-3 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2 ">
                            <h5>Country name:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_name" type="text" name="footer_country_name_7"value="{{$footer->footer_country_name_7}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2  ms-4 ">
                            <h5>Country url:</h5>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <input class="form-control" id="country_url" type="text" name="footer_country_url_7"value="{{$footer->footer_country_url_7}}"  placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12">Copyright</h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Copyright year</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="copyright_year" type="text" name="copyright_year" value="{{$footer->copyright_year}}" placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>Copyright Website</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="copyright_website" type="text" name="copyright_website" value="{{$footer->copyright_website}}" placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mt-2 ms-3">
                            <h5 class="f-12"></h5>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mt-2">
                            <h5>  Copyright Website Link</h5>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <input class="form-control" id="copyright_website_link" type="text" name="copyright_website_link" value="{{$footer->copyright_website_link}}"placeholder="" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Submit Changes</button>
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