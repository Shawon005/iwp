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
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Product</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Product</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('product')}}">ADD NEW PRODUCT</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>product Name</th>
                            <th>Created By</th>
                            <th>Viwes</th>
                            <th>Action</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($product as $user)
                        <tr>
                            
                           <td>{{$user->product_id}}</td> 

                           <td>
                           <div class="row">
                              <div class="col-2">
                                <img src="{{asset('/storage/file/'.$user->gallery_image)}}"width="50" height="60" alt="">
                              </div>
                              <div class="col-4">
                                {{$user->product_name}}<br><small>{{dateFormatConverter($user->product_cdt)}}<small>
                              </div>
                            </div>
                           </td>
                           <td><span class="bg-success p-1">@foreach($users as $cat)
                            @if($user->user_id==$cat->user_id)
                              {{$cat->first_name}}
                            @endif
                            @endforeach</span></td>
                            <td>{{CountCol('vv_page_views','product_id',$user->product_id)}}</td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('product_edit',['id'=>$user->product_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('product_delete',['id'=>$user->product_id])}}">Delete </a> 
                          </td>
                          <td><a href="{{route('product/details',['id'=>$user->product_id])}}" class="btn-sm btn-info" target="_blank">Preview</a>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
          </div>
    
</div>
          
          </div>
                   
@endsection