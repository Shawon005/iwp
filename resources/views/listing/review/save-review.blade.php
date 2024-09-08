@extends('layout.master')
@section('css')
href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@endsection
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Listing Enquiry</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Listing Enquiry</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Enquiry Details</h4>
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
                              <th>Name</th>
									            <th>Email</th>
									            <th>Phone</th>
                              <th>City</th>
								            	<th>Message</th>
                              <th>Ratings</th>
                              <th>Listing name</th>
                              <th>URL</th>
									            <th>Delete</th>
                              
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($listing as $user)
                        <tr>
                           <td>{{$user->review_id}}</td>
                           <td>{{$user->review_name}}</td>
                           <td>{{$user->review_email}}</td>
                           <td>{{$user->review_mobile}}</td>
                           <td>{{$user->review_city}}</td>
                           <td>{{$user->review_message}}</td>
                           <td align="center">
                                <?php for($i=$user->price_rating; $i>0; $i--){?>
                                  <i class='fa fa-star' style="color:orange"></i>
                                <?php } ?>
                           </td>
                           <td>{{Nam('vv_listings','listing_id',$user->listing_id,'listing_name')}}</td>
                           <td><a class="btn-sm btn-warning" href="{{(($user->listing_id!=null)?"/all-listings/$user->listing_id":(($user->event_id!=null)?"/event/details/$user->event_id":"products/$user->product_id"))}}"><span class="db-list-rat">Viwe Page</span></a></td>
                          <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('reviwe_listing_delete',['id'=>$user->review_id])}}">Delete</a> 
                          </td>
                         
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection
