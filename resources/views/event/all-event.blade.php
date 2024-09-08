@extends('layout.master')
@section('content')

<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Event</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Event</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Event Details</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('event')}}">ADD NEW EVENT</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                          
                            <th>NO</th>
                            <th>Event Name</th>
                            <th>Event Date</th>
                            <th>Created By</th>
                            <th>viwes</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($event as $user)
                        <tr>
                            
                           <td>{{$user->event_id}}</td>
                           <td>{{$user->event_name}}</td>
                           <td>{{dateFormatconverter($user->event_start_date)}}</td>
                           <td>{{$user->user_id}}</td>
                           <td>{{CountCol('vv_page_views','event_id',$user->event_id)}}</td>
                           
                           <td><a class="btn-sm btn-primary" href="#">Show </a>
                            | <a class="btn-sm btn-info" href="{{route('event_edit',['id'=>$user->event_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('event_delete',['id'=>$user->event_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
             
    
            </div>
          
          </div>
                   

</div>

@endsection 