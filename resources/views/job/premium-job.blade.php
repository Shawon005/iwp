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
              <h3 class="text-center" >PREMIUM JOB</h3>
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
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                        
                        @foreach($job as $user)
                        @if(Nam('vv_jobs','job_id',$user->job_name,'job_title')!=null)
                        <tr>
                           <td>{{$user->job_popular_id}}</td>
                           <td>{{Nam('vv_jobs','job_id',$user->job_name,'job_title')}}</td>
                           <td>
                             <a class="btn-sm btn-info" href="{{route('job_edit',['id'=>$user->job_name])}}">Edit </a> 
                        </tr>
                        @endif
                        @endforeach
                       </tbody>
                      </table>
            </div>
          
          </div>
                   

</div>

@endsection 