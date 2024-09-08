@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Coupon</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Coupon</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New Coupon Category</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('category')}}">ADD NEW CATEGORY</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Create Date</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($category as $user)
                        <tr>
                            
                           <td>{{$user->category_id}}</td>
                           <td>{{$user->category_name}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->category_image)}}"width="50" height="60" alt=""></td>
                           <td>{{dateFormatConverter($user->category_cdt)}}</td>
                           <td>{{CountCol('vv_coupon_sub_categories','category_id',$user->category_id)}}</td>
                          <td><a class="btn-sm btn-primary" href="{{route('category_show',['id'=>$user->category_id])}}">Sub Category </a>
                            | <a class="btn-sm btn-info" href="{{route('category_edit',['id'=>$user->category_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('category_delete',['id'=>$user->category_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection