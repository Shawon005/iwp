@extends('layout.master')
@section('content')
<div class="page-body">  
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="card p-1 container-fluid">
            <div class="page-title">
              <h3 class="text-center" >Listing Category</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                
                  <h4>Listing Category Details</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('seo_terget')}}">ADD NEW</a></li>
              </div>
            </div>
          </div>
          @php $listing_category=sub('vv_pages','page_type',1); $no=1; @endphp   
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Page Name</th>
                            <th>Last edit</th>
                            <th>views</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                       @foreach($listing_category as $user)
                        <tr>   
                           <td>{{$no++}}</td>
                           <td>{{$user->page_name}}</td>
                           <td>{{dateFormatConverter($user->page_last_edit)}}</td>
                           <td>{{countCol('vv_page_views','page_id',$user->page_id,'page_id')}}</td>
                           <td> <a class="btn-sm btn-info" href="{{route('seo_target_edit',['id'=>$user->page_id])}}">Edit </a></td>
                           <td>
                           @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('seo_target_delete',['id'=>$user->page_id])}}">Delete </a> 
                          </td>
                          <td>
                            @php $id=arr($user->page_listings); @endphp
                            <a  class="btn-sm btn-primary" target="_blank" href="{{route('all-listinged',['id'=>$id[0]])}}">Preview</a>
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
            </div>
          </div>
                   
@endsection