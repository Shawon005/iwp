@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Listing</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >ALL POINTS</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>ALL POINTS</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('listing_point')}}">ADD NEW POINT</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered" id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Purchase date</th>
                            <th>Points</th>
                            <th>Total Cost</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($listing as $user)
                        <tr>
                            
                           <td>{{$user->all_points_enquiry_id }}</td>
                           <td>{{user($user->user_id)}}</td>
                           <td>{{dateFormatConverter($user->all_points_cdt)}}</td>
                           <td>{{$user->new_points}}</td>
                           <td>{{$user->total_cost}}</td>
                           <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('listing_point_delete',['id'=>$user->all_points_enquiry_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection