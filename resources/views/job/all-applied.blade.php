@extends('layout.master')
@section('content')

<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Job Applied</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >JOB APPLIED</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Job Details</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('job')}}">ADD NEW JOB</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Job Title</th>
                            <th>Applied By</th>
                            <th>Applied Date</th>
                            <th>Action</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($job as $user)
                        <tr>
                           <td>{{$user->job_applied_id}}</td>
                           <td>{{Nam('vv_jobs','job_id',$user->job_id,'job_title')}}</td>
                           <td>{{user('vv_users',$user->job_user_id)}}</td>
                           <td>{{dateFormatConverter($user->job_applied_cdt)}}</td>
                           <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('job_applied_delete',['id'=>$user->job_applied_id])}}">Delete </a> 
                          <td><a href="{{route('job_details',['id'=>$user->job_id])}}" class="btn-sm btn-info" target="_blank">Preview</a>
                        </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
             
    
            </div>
          
          </div>
                   

</div>

@endsection 