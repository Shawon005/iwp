@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2 class=" p-3" >Sub Admin Type</h2>
        <div class="card p-1 "> 
          <div class="container-fluid">
            <div class="page-title">
              <h3 class="text-center" >Sub Admin Type</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Sub Admin Type</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('sub_admin')}}">ADD NEW SUB ADMIN</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
            <table class="table table-bordered" id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Sub Admin Type</th>
                  <th>Amount User</th>
                  <th>T.C Amount<br> ({{Nam('vv_plan_type','plan_type_id',1,'plan_type_name')}})</th>
                  <th>T.C Amount<br> ({{Nam('vv_plan_type','plan_type_id',2,'plan_type_name')}})</th>
                  <th>T.C Amount <br>({{Nam('vv_plan_type','plan_type_id',3,'plan_type_name')}})</th>
                  <th>T.C Amount <br>({{Nam('vv_plan_type','plan_type_id',4,'plan_type_name')}})</th>
                  <th>Minimum <br>Withdrawal Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
            
                @foreach($type as $user)
                <tr>
                  
                  <td>{{$user->sub_admin_type_id}}</td>
                  <td>{{$user->sub_admin_type}}</td>
                  <td>{{$user->amount_user}}</td>
                  <td>{{$user->p1_amount}}</td>
                  <td>{{$user->p2_amount}}</td>
                  <td>{{$user->p3_amount}}</td>
                  <td>{{$user->p4_amount}}</td>
                  <td>{{$user->minimum_withdrawal_amount}}</td>
                  <td>
                    <a class="btn-sm btn-info" href="{{route('sub_admin_type_edit',['id'=>$user->sub_admin_type_id])}}">Edit </a> 
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>      
          </div>
        </div>
      </div>
          
          </div>

@endsection