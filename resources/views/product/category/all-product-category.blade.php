@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Product</h2>
          <div class="card p-1 container-fluid">
            <div class="page-title">
              <h3 class="text-center" >Product Category</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Product Category</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('product_category')}}">ADD NEW PRODUCT CATEGORY</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>category Name</th>
                            <th>category Image</th>
                            <th>Create Date</th>
                            <th>Product</th>
                            <th>Sub Cate</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($product_category as $user)
                        <tr>
                            
                           <td>{{$user->category_id}}</td>
                           <td><span class="bg-success p-1">{{$user->category_name}}</span></td>
                           <td><img src="{{asset('/storage/file/'.$user->category_image)}}" width="50" height="60"alt=""></td>
                           <td>{{dateFormatConverter($user->category_cdt)}}</td>
                           <td>{{CountCol('vv_products','category_id',$user->category_id)}}</td>    
                           <td>{{CountCol('vv_product_sub_categories','category_id',$user->category_id)}}</td>                    
                          <td><a class="btn-sm btn-primary" href="#">Show </a>
                            | <a class="btn-sm btn-info" href="{{route('product_category_edit',['id'=>$user->category_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('product_category_delete',['id'=>$user->category_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection