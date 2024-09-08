@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Coupon</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Coupon</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New Coupon </h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('coupon')}}">ADD NEW COUPON</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Coupon Name</th>
                            <th>Coupon Code</th>
                            <th>Create By</th>
                            <th>Expire Date</th>
                            <th>Views</th>
                            <th>Viewers</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($coupon as $user)
                        <tr>
                            
                           <td>{{$user->coupon_id}}</td>
                           <td>{{$user->coupon_name}}</td>
                           <td>{{$user->coupon_code}}</td>
                           <td><span class="bg-success p-1">@foreach($users as $cat)
                            @if($user->coupon_user_id==$cat->user_id)
                              {{$cat->first_name}}
                            @endif
                            @endforeach</span></td>
                           <td>{{dateFormatConverter($user->coupon_end_date)}}</td>
                           <td>{{CountCol('vv_page_views','coupon_id',$user->coupon_id)}}</td>
                           <td> <a class="btn-sm btn-warning" href="{{route('coupon_user_table',['id'=>$user->coupon_id])}}">View</a> </td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('coupon_edit',['id'=>$user->coupon_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('coupon_delete',['id'=>$user->coupon_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection