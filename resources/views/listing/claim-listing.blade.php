@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Listing</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Listing</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Listing</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('listing')}}">ADD NEW LISTING</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered  " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Listing Name</th>
                            <th>Enquirer Name</th>
                            <th>Enquirer Mobile</th>
                            <th>Enquirer Email Id</th>
                            <th>Verification Image</th>
                            <th>Enquirer Message</th>
                            <th>Enquiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($listing as $user)
                        <tr>
                           <td>{{$user->claim_listing_id}}</td>
                           <td>{{Nam('vv_listings','listing_id',$user->listing_id,'listing_name')}}</td>
                           <td>{{$user->enquiry_name}}</td>
                           <td>{{$user->enquiry_mobile}}</td>
                           <td>{{$user->enquiry_email}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->enquiry_image)}}" width="50" height="60"alt=""></td>
                           <td>{{$user->enquiry_message}}</td>
                           <td>{{dateFormatConverter($user->claim_cdt)}}</td>
                           <td>{{($user->claim_status==1)?"Active":"Pending"}}</td>
                          <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('claim_listing_delete',['id'=>$user->claim_listing_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection