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
          <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active"   href="{{route('lead_expert_table')}}">All LEADS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link "   href="{{route('today_expert_table')}}">TODAY LEADS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('finish_expert_table')}}">FINISHD SERVICE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{{route('pending_expert_table')}}">PENDING SERVICE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"data-bs-toggle="{{route('cencle_expert_table')}}" href="">CENCLE SERVICE</a>
            </li>
          </ul>
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Lead details</th>
                            <th>Details</th>
                            <th>Message</th>
                            <th>Delete</th>
                            <th>Details</th>          
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
                           <td>{{$user->enquiry_message}}</td>
                           <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('General_expert_delete',['id'=>$user->enquiry_id])}}">Delete </a> 
                          </td>
                          <td><a class="btn-sm " data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->enquiry_id}}" >Details</a></td>
                        </tr>
                      
                        @endforeach
                       </tbody>
                      </table>
                      @foreach($expert as $user)
                        <div class="modal fade" id="exampleModal{{$user->enquiry_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 <table class="responsive-table bordered table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>User</td>
                                        <td>
                                            <a href="{{route('profile',['id'=>$user->expert_user_id])}}" target="_blank">{{user($user->expert_user_id)}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Enquiry details</td>
                                        <td>
                                            Phone:{{$user->enquiry_mobile}}<br>
                                            Email:{{$user->enquiry_email}}<br>
                                            Address:{{$user->enquiry_location}}<br>
                                            Preferred date:{{dateFormatConverter($user->appointment_date)}}<br>
                                            Preferred time:{{$user->appointment_time}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td>{{$user->enquiry_message}}</td>
                                    </tr>
                                    <tr>
                                        <td>Requested date</td>
                                        <td>{{dateFormatConverter($user->enquiry_cdt)}}</td>
                                    </tr>
                                       <tr>
                                        <td>Service category</td>
                                        <td>{{name('vv_expert_categories',$user->enquiry_category)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Service status</td>
                                        <td>{{$user->enquiry_status}}</td>
                                    </tr>
                                    <tr>
                                        <td>Expert approximate arrive time &amp; date</td>
                                        <td>
                                        {{$user->appointment_time}} && {{dateFormatConverter($user->appointment_date)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Who done this</td>
                                        <td>
                                            <a href="{{route('profile',['id'=>$user->enquiry_sender_id])}}" target="_blank">{{user($user->enquiry_sender_id)}}</a>
                                        </td>
                                    </tr>
                                            <tr>
                                            <td>Rating</td>
                                            <td>5.0 - Best
                                                customer service ever
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="modal-footer">
                                
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
    
            </div>
          
          </div>
                   
@endsection