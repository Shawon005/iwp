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
                  <h4>Job Application {{CountC('vv_job_profile','job_profile_id')}}</h4>
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
                            <th>No</th>
                            <th>Applicant name</th>
                            <th>Phone</th>
                            <th>Applied</th>
                            <th>Resume</th>
                            <th>Delete</th>	
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($job as $user)
                        <tr>
                           <td>{{$user->job_profile_id}}</td>
                           <td>{{$user->profile_name}}</td>
                           <td>{{Nam('vv_jobs','job_id',Nam('vv_job_applied','job_profile_id',$user->job_profile_id,'job_id'),'contact_number')}}</td>
                           <td>{{CountCol('vv_job_applied','job_profile_id',$user->job_profile_id,'job_applied_id')}}</td> 
                           <td></td>
                           <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('job_seeker_delete',['id'=>$user->job_profile_id])}}">Delete </a> 
                          </td>
                          <td><a href="{{route('user-job-profile',['id'=>$user->user_id])}}" class="btn-sm btn-info" target="_blank">Preview</a>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
             
    
            </div>
          
          </div>
                   

</div>

@endsection 