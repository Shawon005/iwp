@extends('layout.master')
@section('content')

<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Job</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >JOB</h3>
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
                            <th>Job Name</th>
                            <th>Job Post By</th>
                            <th>No of Applicant</th>
                            <th>viwes</th>
                            <th>Action</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($job as $user)
                        <tr>
                            
                           <td>{{$user->job_id}}</td>
                           <td>{{$user->job_title}}</td>
                           <td><span class="p-1" style="background: #f7ed94">{{user($user->user_id)}}</span></td>
                           <td>{{$user->no_of_openings}}</td>
                           <td>{{CountCol('vv_page_views','job_id',$user->job_id)}}</td>
                           
                           <td><a class="btn-sm btn-primary" href="#">Show </a>
                            | <a class="btn-sm btn-info" href="{{route('job_edit',['id'=>$user->job_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('job_delete',['id'=>$user->job_id])}}">Delete </a> 
                          </td>
                          <td><a href="{{route('job_details',['id'=>$user->job_id])}}" class="btn-sm btn-info" target="_blank">Preview</a>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
             
    
            </div>
          
          </div>
                   

</div>

@endsection 