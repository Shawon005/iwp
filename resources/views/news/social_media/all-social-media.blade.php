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
          <div class="card p-1 container-fluid">
            <div class="page-title">
              <h3 class="text-center" >Social Media</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>AllSocial Media</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <!-- <li class="breadcrumb-item"><a href="{{route('news')}}"> </a></li> -->
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Social Media</th>
                            <th>Count</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($news as $user)
                        <tr>
                            <td>{{$user->social_media_id}}</td>
                           <td>{{$user->social_media_name}}</td>
                           <td>{{$user->social_media_count}}</td>
                           <td>{{($user->social_media_status)==1?"Active":'Inactive'}}</td>
                          <td>
                          <a class="btn-sm btn-info" href="{{route('social_edit',['id'=>$user->social_media_id])}}">Edit </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection