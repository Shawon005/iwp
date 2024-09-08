@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Payment</h2>
          <div class="card p-1 container-fluid" style="background-color:white">
            <div class="page-title">
              <h3 class="text-center" >ALL PAYMENT</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Payment</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered table-light " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>								
                            <th>NO</th>
                            <th>User</th>
                            <th>Plan</th>
                            <th>Payment Amount</th>
                            <th>Payment Mode</th>
                            <th>Payment Date</th>
                            <th>Invoice</th>
                            <th>Create Invoice</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($payment as $user)
                        <tr>
                           <td>{{$user->transaction_id }}</td>
                           <td><span class="bg-info p-1">{{user($user->user_id)}}</span></td>
                           <td>{{Nam('vv_plan_type','plan_type_id',$user->plan_type_id,'plan_type_name')}}</td>
                           <td>{{$user->transaction_amount}} {{$user->transaction_currency}}</td>
                           <td>{{$user->transaction_mode}}</td>
                           <td>{{dateFormatConverter($user->transaction_cdt)}}</td>
                           <td>{{($user->transaction_invoice==null)?'N/A':$user->transaction_invoice}}</td>
                           <td><a  class="btn-sm btn-warning" href="{{route('invoice')}}">Send</a> </td>
                          <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('payment_delete',['id'=>$user->transaction_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection