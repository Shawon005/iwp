@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Trend Category</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Trend Category</li>
                    <li class="breadcrumb-item active">Trend Category</li>
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
                    <h5>Trend Category</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('trend_category_update',['id'=>$trend->category_id])}}" method="Post"enctype="multipart/form-data">
                      @csrf
                     <div class="col-sm-12">
                        <div class="mb-3">
                          
                        <select class="js-example-placeholder-multiple col-sm-12"name="category_name">
                            @foreach($category as $user):
                              @if($user->category_id==$trend->category_id)
                                <option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
                                @else
                                <option value="{{$user->category_id}}">{{$user->category_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          <div class="valid-feedback">Looks good!</div>
                         
                        </div>
                        <div class="mb-3">
                          
                          <input class="form-control" id="choose_category_image" type="file" name="category_image" placeholder="popular Tags Link" multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
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