@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Social Media</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Social Media</li>
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
                    <form class="row needs-validation" action ="{{route('social_update',['id'=>$news->social_media_id])}}"method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <input class="form-control" id="news_title" type="text" name="news_title" readonly="readonly" value="{{$news->social_media_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="news_title" type="text" name="count"value="{{$news->social_media_count}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea4" name="link" cols="10" rows="3">{{$news->social_media_link}}</textarea>
                        </div>
                      
                        <div class="mb-3">
                          <div class="col-form-label"> 
                           
                            <select class="js-example-placeholder-multiple col-sm-12"name="category_id">                                                 
                                <option value="1"{{($news->social_media_status)==1?"selected":''}} >Active</option>              
                                <option value="0" {{($news->social_media_status)==0?"selected":''}} >Inactive</option> 
                            </select>
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
