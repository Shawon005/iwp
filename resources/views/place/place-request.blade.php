@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Place</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Place Request</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New place</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('place')}}">ADD NEW PLACE</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>place Name</th>
                            <th>Address</th>
                            <th>Descriptions</th>
                            <th>Image</th>
                            <th>User_detatls</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($place as $user)
                        <tr>
                            
                           <td>{{$user->place_request_id }}</td>
                           <td>{{$user->place_name}}</td>
                           <td>{{$user->place_address}}</td>
                           <td>{{$user->place_description}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->place_image)}}" width="50" height="60"alt=""></td>
                           <td>{{user($user->place_request_sender_id)}}</td>
                          <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('place_request_delete',['id'=>$user->place_request_id ])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection