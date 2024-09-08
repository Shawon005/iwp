@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Homepage Top Section</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Homepage Top Section</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Homepage Top Section</h4>
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
                            <th>Title</th>
                            <th> Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($top as $user)
                        <tr>
                            
                           <td>{{$user->top_section_id}}</td>
                           <td>{{$user->top_section_title}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->top_section_image)}}"width="50" height="60" alt=""></td>
                          <td>
                            <a class="btn-sm btn-info" href="{{route('top_section_edit',['id'=>$user->top_section_id])}}">Edit </a> 
                          
                       
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection