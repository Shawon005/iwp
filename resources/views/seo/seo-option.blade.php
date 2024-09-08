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
                    <li class="breadcrumb-item"><a href="{{route('listing_category')}}">ADD NEW LISTING CATEGORY</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>SEO score</th>
                            <th>Last edit</th>
                            <th>views</th>
                            <th>Edit</th>
                            <th>Preview</th>
                          </tr>
                        </thead>
                       <tbody>
                     @php $listing_category=table('vv_categories'); @endphp
                        @foreach($listing_category as $user)
                        <tr>  
                                               
                           <td>{{$user->category_id}}</td>
                           <td>{{$user->category_name}}</td>
                           <td>
                           <div class="progress">
                              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:{{percents($user->category_id)}}%">
                                <span class="sr-only">20% Complete</span>
                              </div>
                            </div>
                            </td>
                           <td>{{dateFormatConverter($user->category_edit_cdt)}}</td>
                           <td>{{$user->category_views}}</td>
                           <td> <a class="btn-sm btn-info" href="{{route('seo_listing_edit',['id'=>$user->category_id])}}">Edit </a></td>
                          <td>
                            <a  class="btn-sm btn-primary" target="_blank" href="{{route('all-listings',['id'=>$user->category_id])}}">Preview</a>
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