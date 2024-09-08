@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>News</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >News Posts</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All News Posts</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('news')}}">ADD NEW NEWS </a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>News Name</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th>Views</th>
                            <th>Action</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($news as $user)
                        <tr>
                      
              
                           <td>{{$user->news_id}}</td>
                           <td>{{$user->news_title}}</td>
                           <td>@foreach($category as $cat)
                            @if($user->category_id==$cat->category_id)
                              {{$cat->category_name}}
                            @endif
                            @endforeach</td>
                           <td>{{dateFormatconverter($user->news_cdt)}}</td>
                           <td>{{CountCol('vv_page_views','news_id',$user->news_id)}}</td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('news_edit',['id'=>$user->news_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('news_delete',['id'=>$user->news_id])}}">Delete </a> 
                          </td>
                          <td><a href="{{route('news-details',['id'=>$user->news_id])}}" class="btn-sm btn-info" target="_blank">Preview</a>
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection