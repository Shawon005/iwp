@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Expert</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >All Expert</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Expert</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('expert')}}">ADD NEW EXPERT</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Lead details</th>
                            <th>Service</th>
                            <th>Details</th>
                            <th>Message</th>
                            <th>Assign to</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($expert as $user)
                        <tr>
                           <td>{{$user->enquiry_id}}</td>
                           <td>{{Nam('vv_experts','expert_id',$user->expert_id,'profile_name')}}<br>{{dateFormatConverter(Nam('vv_experts','expert_id',$user->expert_id,'expert_cdt'))}}</td>
                           <td>Phone:{{$user->enquiry_mobile}}<br>
                               Email:{{$user->enquiry_email}}<br>
                               Address:{{$user->enquiry_location}}<br>
                               Preferred date:{{dateFormatConverter($user->appointment_date)}}<br>
                               Preferred time:{{$user->appointment_time}}
                           </td>
                           <td>{{$user->enquiry_source}}</td>
                           <td>{{$user->enquiry_message}}</td>
                           <td>{{$user->enquiry_name}}</td>
                          <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('General_expert_delete',['id'=>$user->enquiry_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection