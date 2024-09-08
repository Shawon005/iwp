@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Expert</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >All Expert Area </h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Expert Area</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('expert_area')}}">ADD NEW AREA</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered"  id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Expert Area Name</th>
                            <th>Expert City Name</th>
                            <th>Create Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($area as $user)
                        <tr>
                            
                           <td>{{$user->city_id}}</td>
                           <td><span class="p-1" style="background: #f7ed94">{{$user->city_name}}</spen></td>
                           <td><span class="p-1" style="background: #f7ed94">{{Nam('vv_expert_cities','country_id',$user->state_id,'country_name')}}</span></td>
                           <td>{{dateFormatConverter($user->city_cdt)}}</td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('expert_area_edit',['id'=>$user->city_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('expert_area_delete',['id'=>$user->city_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection