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
                  <h4>Coupon : {{$coupon->coupon_name}} </h4>
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
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Coupon name</th>
                            <th>Profile</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                       <tbody>
                          
                            @php $no=1; @endphp
                            @php $users=arr($coupon->coupon_use_members); @endphp
                            @foreach($users as $user)
                            @if($user!='')
                        <tr>
                            <td>{{$no++}}</td>
                            <td> {{user($user)}}<br><span>{{dateFormatConverter(Nam('vv_users','user_id',$user,'user_cdt'))}}</span>
                            </td>
                            <td>{{Nam('vv_users','user_id',$user,'email_id')}}</td>
                            <td>{{Nam('vv_users','user_id',$user,'mobile_number')}}</td>
                            <td>{{$coupon->coupon_name}}</td>
                            @if(user($user)!='')
                            <td><a href="{{route('profile',['id'=>$user])}}" target="_blank" class="db-list-edit">View</a>
                            </td>
                            @else
                            <td><a href=""  class="db-list-edit">View</a>
                            @endif
                            <td><a href="{{route('coupon_delete',['id'=>$coupon->coupon_id])}}" class="db-list-edit">Delete</a>
                            </td>
                        </tr>
                             @endif
                             @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection