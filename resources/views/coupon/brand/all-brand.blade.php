@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Brand</h2>
          <div class="card p-1 container-fluid">
            <div class="page-title">
              <h3 class="text-center" >Brand</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New Brand</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('brand')}}">ADD NEW BRAND</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Brand Name</th>
                            <th>Create Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($brand as $user)
                        <tr>
                            
                           <td>{{$user->brand_id}}</td>
                           <td>{{$user->brand_name}}</td>
                           <td>{{dateFormatConverter($user->brand_cdt)}}</td>
                           
                          <td><a class="btn-sm btn-primary" href="#">Show </a>
                            | <a class="btn-sm btn-info" href="{{route('brand_edit',['id'=>$user->brand_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('brand_delete',['id'=>$user->brand_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection