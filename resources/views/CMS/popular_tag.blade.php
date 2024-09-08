
@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Popular Tag</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Popular Tag</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Popular Tag Details</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('popular_tag')}}">ADD NEW POPULAR TAG</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Page</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($popular as $user)
                        <tr>
                            
                           <td>{{$user->popular_tags_id }}</td>
                           <td>{{$user->popular_tags_name}}</td>
                          <td> <a class="btn-sm btn-info" href="{{route('popular_tag_edit',['id'=>$user->popular_tags_id])}}">Edit </a> |                       
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('popular_tag_delete',['id'=>$user->popular_tags_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection