@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Slider Image</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Slider Image</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New Slider Image</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('product_sub_category')}}">ADD NEW SLIDER IMAGE</a></li>
              </div>
            </div>
          </div>
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Slider Image</th>
                            <th>Link</th>                       
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                        @foreach($slider as $user)
                        <tr>
                           <td>{{$user->slider_id}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->slider_photo)}}"width="50" height="60" alt=""></td>
                           <td>{{$user->slider_link}}</td>
                          <td>
                            <a class="btn-sm btn-info" href="{{route('slider_edit',['id'=>$user->slider_id])}}">Edit </a> |
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('slider_delete',['id'=>$user->slider_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                    </div>
    
            </div>
          
          </div>
                   
@endsection