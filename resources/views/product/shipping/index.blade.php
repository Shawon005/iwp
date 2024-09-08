@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Product</h2>
          <div class="card p-1 container-fluid">
            <div class="page-title">
              <h3 class="text-center" >Product Shipping</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Product Shipping</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('shipping.create')}}">ADD NEW PRODUCT SHIPPING</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Shipping Price</th>
                            <th>Create Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($shipping as $user)
                        <tr>
                           <td>{{$user->shipping_id}}</td>
                           <td>{{Nam('vv_states','state_id',$user->state_id,'state_name')}}</td>
                           <td>{{Nam('vv_cities','city_id',$user->city_id,'city_name')}}</td>
                           <td>{{$user->shipping_price}}</td>
                           <td>{{dateFormatConverter($user->shipping_cdt)}}</td>         
                          <td><a class="btn-sm btn-info" href="{{route('shipping.edit',$user->shipping_id)}}">Edit </a> |
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('shipping.delete',$user->shipping_id)}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection