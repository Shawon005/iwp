
@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Popular Business</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Popular Business</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Popular Business Details</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Listing</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($popular as $user)

                        <tr>
                            
                           <td>{{$user->featured_listing_id}}</td>
                           <td>{{Nam('vv_listings','listing_id',$user->listing_id,'listing_name')}}</td>
                          <td> <a class="btn-sm btn-info" href="{{route('popular_business_edit',['id'=>$user->featured_listing_id])}}">Edit </a>                        
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection