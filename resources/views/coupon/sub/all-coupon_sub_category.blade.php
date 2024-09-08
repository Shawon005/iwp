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
                  <h4>New Coupon Sub Category</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('sub_category')}}">ADD NEW SUB CATEGORY</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Sub Category Name</th>
                            <th>Main Category Name</th>
                            <th>Create Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($sub_category as $user)
                        <tr>
                            
                           <td>{{$user->sub_category_id}}</td>
                           <td><span class="bg-success p-1">{{$user->sub_category_name}}</span></td>
                           <td><span class="bg-success p-1">@foreach($category as $cat)
                            @if($user->category_id==$cat->category_id)
                              {{$cat->category_name}}
                            @endif
                            @endforeach</span></td>
                           <td>{{dateFormatConverter($user->sub_category_cdt)}}</td>
                          <td><a class="btn-sm btn-primary" href="#">Show </a>
                            | <a class="btn-sm btn-info" href="{{route('sub_category_edit',['id'=>$user->sub_category_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('sub_category_delete',['id'=>$user->sub_category_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection