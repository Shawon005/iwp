@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>News & Magazines</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">News & Magazines</li>
                    <li class="breadcrumb-item active">Add News</li>
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
                    <h5>Create News</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action ="{{route('news_update',['id'=>$news->news_id])}}"method="post"enctype="multipart/form-data">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="news_title">News Title</label>
                          <input class="form-control" id="news_title" type="text" name="news_title" placeholder="News title*" value="{{$news->news_title}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label>News Details<label>
                          <textarea id="editor1" name="news_description" cols="10" rows="2">{{$news->news_description}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="choose_banner_image">Choose banner image</label>
                          <input class="form-control" id="choose_banner_image" type="file" name="news_image[]" placeholder="" multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="category_id">
                              <option value="">Select Ctegory</option>
                              @foreach($category as $user):
                                @if($news->category_id==$user->category_id)
                                <option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
                                @else
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                        <div class="alert-light">
                          <div class="">
                            <h5 class="accordion-button"  data-bs-toggle="collapse" data-bs-target="#collapsethree"  aria-expanded="false" aria-controls="collapseExample">SEO Details</h5>
                          </div>
                          <div class="p-1 collapse"id="collapsethree">
                            <label for="choose_banner_image">SEO Title</label>
                              <input class="form-control" id="evtra_coursestraining_details" type="text" name="seo_title"id="additional_info"value="{{$news->seo_title}}"  >
                              <div class="valid-feedback">Looks good!</div>
                              <hr> </hr>
                            
                          </div>
                          
                          <div class=" collapse"id="collapsethree">
                            <label for="choose_banner_image">SEO Description</label>
                              <input class="form-control" id="training_details" type="text" name="seo_description"id="additional_info"value="{{$news->seo_description}}" >
                              <div class="valid-feedback">Looks good!</div>
                              <hr class=""> </hr>
                          </div>
                          
                          <div class=" collapse"id="collapsethree">
                            <label for="choose_banner_image">SEO Keyword</label>
                              <input class="form-control" id="others_1" type="text" name="seo_keywords" id="additional_info"value="{{$news->seo_keywords}}" >
                              <div class="valid-feedback">Looks good!</div>
                              <hr> </hr>
                          </div>
                        </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Update</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </form>
                    <div class="btn-showcase text-end">
           
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection
