@extends('layout.master')
@section('css')
@endsection
@section('content')
        <div class="page-body">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Blogs</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Blogs</li>
                    <li class="breadcrumb-item active">Add Blogs</li>
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
                    <h5>Create Post</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" novalidate=""action="{{route('blog_update',['id'=>$blog->blog_id])}}" method="Post"enctype="multipart/form-data">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="user_id">
                              <option value="">Choose a user</option>
                              @foreach($users as $user):
                                @if($user->user_id==$blog->user_id)
                                <option value="{{$user->user_id}}" selected>{{$user->first_name}}</option>
                                @else
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="post_name">Post Name</label>
                          <input class="form-control" id="post_name" type="text" name="blog_name" placeholder="Post name*" required=""value="{{$blog->blog_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label>Post Details</label>
                          <textarea id="editor1" cols="10" rows="2"name="blog_description">{{$blog->blog_description}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="banner_image">Choose Banner Image</label>
                          <input class="form-control" id="banner_image" type="file" name="blog_image[]" multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="d-inline">
                            @if($blog->isenquiry)
                            <input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1" checked>
                            @else
                            <input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1">
                            @endif
                            <label class="form-check-label" for="exampleCheck1">Enquiry or Get quote form enable</label>
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
        <!-- footer start-->
@endsection
@section('js')
<script src="../assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="../assets/js/editor/ckeditor/adapters/jquery.js"></script>
@endsection           