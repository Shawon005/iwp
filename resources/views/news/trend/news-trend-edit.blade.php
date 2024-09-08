@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>News & Magaines</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Trend</li>
                   
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
                    <h5> Trend Post</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action ="{{route('news_trend_update',['id'=>$trend->trending_news_id])}}"method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                        <select class="js-example-placeholder-multiple col-sm-12"name="news_id">
                          @foreach($news as $user):
                               @if($user->news_id==$trend->news_id)
                                <option value="{{$user->news_id}}" selected>{{$user->news_title}}</option>
                                @else
                                <option value="{{$user->news_id}}">{{$user->news_title}}</option>
                                @endif
                                 @endforeach
                            </select>
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
 
@endsection
  