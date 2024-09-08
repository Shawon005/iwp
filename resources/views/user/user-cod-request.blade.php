@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>COD</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >User COD Payment </h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All COD Users {{sprintf("%02d",count($users))}}</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('user')}}">ADD NEW USER</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>                           
                            <th>NO</th>
                            <th>Users Name</th>
                            <th>Plan Type</th>
                            <th>Phone</th>
                            <th>Payment type</th>
                            <th>Bill info</th>
                            <th>More info</th>
                            <th>Approve</th>
                            <th>Reject</th>
                            <th>Create Invoice</th>
                            <th>Send Invoic</th>
                            <th>Action</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                        @php $No=1;@endphp
                        @foreach($users as $user)
                        <tr>
                            
                           <td>{{$No++}}</td> 

                           <td>
                          
                                {{$user->first_name}}<br><small>{{$user->email_id}}</small><br><small>join:{{dateFormatConverter($user->user_cdt)}}<small>
                           </td>
                           <td>{{Nam('vv_plan_type','plan_type_id',$user->user_plan,'plan_type_name')}}</td>
                           <td>{{$user->mobile_number}}</td>
                           <td>{{$user->payment_status}}</td>
                           <td>${{Plan_amount($user->user_plan)}}</td>
                           <td></td>
                           <td>{{$user->user_status}}</td>
                           <td></td>
                           <td><a class="btn-sm btn-info" href="{{route('invoice')}}">Create </a> </td>
                            <td><a class="btn-sm btn-info" href="{{route('send_invoice')}}">Send </a> </td>
                          <td>
                           <a class="btn-sm btn-info" href="{{route('user_edit',['id'=>$user->user_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('user_delete',['id'=>$user->user_id])}}">Delete </a> 
                          </td>
                          <td><a class="btn-sm btn-warning" href="{{route('profile',['id'=>$user->user_id])}}" target="_blank">Preview</a></td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
          </div>
    
</div>
          
          </div>
                   
@endsection