@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Pricing</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Pricing Datails</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Pricing Datails</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>                   
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered" id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Plan Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($plan as $user)
                        <tr>   
                           <td>{{$user->plan_type_id}}</td>
                           <td>{{$user->plan_type_name}}</td>
                            <td>{{$user->plan_type_price}}</td>
                            <td>{{$user->plan_type_status}}</td>
                            <td>
                             <a class="btn-sm btn-info" href="{{route('plan_edit',['id'=>$user->plan_type_id])}}">Edit </a> |
                        
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
              </div>
    
            </div>
          
 </div>
                   
@endsection