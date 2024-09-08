@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Feedback</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >All Feedback </h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Feedback</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('notification')}}">ADD NEW NOTIFICATION </a></li>
                   
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered" id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Title</th>
                            <th>Send To</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($notifi as $user)
                        <tr>   
                           <td>{{$user->notification_id}}</td>
                           <td>{{$user->notification_title}}</td>
                           <td>
                            {{($user->notification_user==100)?("All User"):(($user->notification_user==101)?("All Service Provider User"):(($user->notification_user==102)?
                            "All General User":'All '.Nam('vv_plan_type','plan_type_id',$user->notification_user,'plan_type_name').' User'))}}</td>
                              
                          <td>
                          <a class="btn-sm btn-info" href="{{route('notification_edit',['id'=>$user->notification_id])}}">Edit </a> |
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('notification_delete',['id'=>$user->notification_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection