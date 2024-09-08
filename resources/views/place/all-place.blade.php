@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Place</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >place</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New place</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('place')}}">ADD NEW PLACE</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>place Name</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th>Views</th>
                            <th>Action</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($place as $user)
                        <tr>
                            
                           <td>{{$user->place_id}}</td>
                           <td>{{$user->place_name}}</td>
                           <td><span class="bg-success p-1">@foreach($category as $cat)
                            @if($user->category_id==$cat->category_id)
                              {{$cat->category_name}}
                            @endif
                            @endforeach</span></td>
                           <td>{{dateFormatConverter($user->place_cdt)}}</td>
                           <td>{{CountCol('vv_page_views','place_id',$user->place_id)}}</td>
                           
                          <td>
                             <a class="btn-sm btn-info" href="{{route('place_edit',['id'=>$user->place_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('place_delete',['id'=>$user->place_id])}}">Delete </a> 
                          </td>
                          <td><a href="{{route('places_details',['id'=>$user->place_id])}}" class="btn-sm btn-info" target="_blank">Preview</a></td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection