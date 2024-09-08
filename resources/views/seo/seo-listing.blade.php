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
              </div>
            </div>
          </div>
          @php $listing_category=table('vv_listings'); $no=1; @endphp   
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Page Name</th>
                            <th>SEO score</th>
                            <th>Edit</th>
                            <th>preview</th>
                          </tr>
                        </thead>
                       <tbody>
                       @foreach($listing_category as $user)
                        <tr>   
                           <td>{{$no++}}</td>
                           <td>{{$user->listing_name}}</td>
                           <td><div class="progress">
                              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:{{seo_sceor('vv_listings' ,'listing_id',$user->listing_id)}}%">
                                <span class="sr-only">20% Complete</span>
                              </div>
                            </div></td>
                           
                           <td> <a class="btn-sm btn-info" href="{{route('all_listing_edit',['id'=>$user->listing_id])}}">Edit </a></td>
                           <td><a href="{{route('all-listinged',['id'=>$user->listing_id])}}" class="btn-sm btn-info" target="_blank">Preview</a></td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
            </div>
          </div>
                   
@endsection