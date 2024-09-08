@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Invoice</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Shared Invoice</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Shared Listing</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>User Name</th>
                            <th>Plan type</th>
                            <th>Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($invoice as $user)
                        <tr>
                           <td>{{$user->transaction_id }}</td>
                           <td>
                           <div class="row">
                              <div class="col-3">
                                <img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$user->user_id,'profile_image'))}}"width="50" height="60" style="border-radius:50%" alt="">
                              </div>
                              <div class="col-4">
                              {{user($user->user_id)}}<br><small>{{Nam('vv_users','user_id',$user->user_id,'email_id')}}</small><br><small>join:{{dateFormatConverter(Nam('vv_users','user_id',$user->user_id,'user_cdt'))}}<small>
                              </div>
                            </div>
                          </td>
                          <td><span class=" p-1"style="background: #f7ed94;">{{Nam('vv_plan_type','plan_type_id',$user->plan_type_id,'plan_type_name')}}</span></td>
                          <td><span class="p-1"style="background: #f7ed94;">Rs:{{$user->transaction_amount}}</span></td>
                          <td>
                             <a class="btn-sm btn-info" href="">Download</a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('invoice_delete',['id'=>$user->transaction_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection