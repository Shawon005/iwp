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
          @php $listing_category=table('vv_seo'); $no=1; @endphp   
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Page Name</th>
                            <th>Last edit</th>
                            <th>view</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                       <tbody>
                       @foreach($listing_category as $user)
                        <tr>   
                           <td>{{$no++}}</td>
                           <td>{{$user->seo_page_name}}</td>
                           <td>{{dateFormatConverter($user->seo_page_edit_cdt)}}</td>
                           <td>0</td>
                           <td> <a class="btn-sm btn-info" href="{{route('all_page_edit',['id'=>$user->seo_page_id])}}">Edit </a></td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
            </div>
          </div>
                   
@endsection