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
              <h3 class="text-center" >Trash Listing</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Trash listing</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('listing_table')}}">ALL LISTING</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>listing Name</th>
                            <th>Create Date</th>
                            <th>Delete Date</th>
                            <th>Create By</th>
                            <th>Action</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($listing as $user):
                        <tr>
                            
                           <td>{{$user->listing_id}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->profile_image)}}" width="50" height="60" style="border-radius:50%"class="me-2">{{$user->listing_name}}</td>
                           <td>{{dateFormatConverter($user->listing_cdt)}}</td>
                           <td>{{dateFormatConverter($user->listing_delete_cdt)}}</td>
                           <td><span class="bg-info p-1">{{user($user->user_id)}}</span></td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('listing_edit',['id'=>$user->listing_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a   class="btn-sm btn-primary" href="{{route('listing_restore',['id'=>$user->listing_id])}}">Restore</a>|
                          <a onclick="return confirm('Are you want to Permantly Delete')"class="btn-sm btn-danger" href="{{route('listing_pdelete',['id'=>$user->listing_id])}}">Permanent Delete</a>
                          </td>
                          <td><a href="{{route('all-listinged',['id'=>$user->listing_id])}}" class="btn-sm btn-info" target="_blank">Preview</a>
                        </tr>
                        @endforeach;
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection