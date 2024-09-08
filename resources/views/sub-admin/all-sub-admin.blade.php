@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <h1>Sub Admin</h1>
          <div class="card p-1 container-fluid" style="">
            <div class="page-title">
              <h3 class="text-center" >Sub Admin</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New  Sub Admin</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('sub_admin')}}">ADD NEW SUB ADMIN</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>User</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($admin as $user)
                        <tr>
                            
                           <td>{{$user->admin_id}}</td>
                           <td>{{$user->admin_name}}</td>
                           <td>{{$user->admin_email}}</td>
                           <td>{{$user->admin_password}}</td>
                          <td>
                            <a class="btn-sm btn-info" href="{{route('sub_admin_edit',['id'=>$user->admin_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('sub_admin_delete',['id'=>$user->admin_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>

@endsection