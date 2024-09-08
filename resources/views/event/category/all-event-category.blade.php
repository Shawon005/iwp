@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >All Event Category</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Event Category</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('event_cetagory')}}">ADD NEW CATEGORY</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered" id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Event Category Name</th>
                            <th>Create Date</th>
                            <th>Event</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($category as $user)
                        <tr>
                            
                           <td>{{$user->category_id}}</td>
                           <td>{{$user->category_name}}</td>
                           <td>{{dateFormatconverter($user->category_cdt)}}</td>
                           <td>{{CountCol('vv_events','category_id',$user->category_id)}}</td>
                          <td><a class="btn-sm btn-primary" href="#">Show </a>
                            | <a class="btn-sm btn-info" href="{{route('event_cetagories_edit',['id'=>$user->category_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('cetagories_delete',['catagories_id'=>$user->category_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection