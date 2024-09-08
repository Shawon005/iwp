@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Feature events</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Feature events</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Feature events</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                   
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="" style="width: 100%; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Event Name</th>
                            <th>Create By</th>
                            <th>Click</th>
                            <th>Viwes</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($top_event as $user)
                        <tr>
                            
                           <td>{{$user->event_id}}</td>
                           <td>{{Nam('vv_events','event_id',$user->event_name,'event_name')}}</td>
                          <td>{{user(Nam('vv_events','event_id',$user->event_name,'user_id'))}}</td>
                          <td>{{rand(1,600)}}</td>
                          <td>{{CountCol('vv_page_views','event_id',$user->event_name,'event_id')}}</td>
                          <td>
                            <a class="btn-sm btn-info" href="{{route('top_event_edit',['id'=>$user->event_id])}}">Change Event</a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection