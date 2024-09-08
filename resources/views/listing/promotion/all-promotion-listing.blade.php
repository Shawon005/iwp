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
              <h3 class="text-center" >ALL PROMOTIONS</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>ALL PROMOTIONS</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('listing_promotion')}}">ADD NEW PROMOTION</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered" id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>listing Name</th>
                            <th>Type</th>
                            <th>State Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                     
                        @foreach($listing as $user)
                        <tr>
                            
                           <td>{{$user->listing_id}}</td>
                           <td>{{$user->listing_name}}</td>
                           <td>Listing</td>
                           @php 
                             $current_date=time();
                             $start_date=strtotime($user->start_date);
                             $end_date=strtotime($user->end_date);
                             $val=0;
                             $du=$end_date-$start_date;
                             if($current_date>=$end_date){
                              $val=1;
                             }
                             else{
                              $val=0;
                             }

                             @endphp
                           <td>{{dateFormatConverter($user->start_date)}}</td>
                           <td>{{dateFormatConverter($user->end_date)}}</td>
                           <td>{{$du/24/60/60}}</td>
                          <td>

                             @if($val==0)
                             <a class="btn-sm btn-info" href="">Active</a>
                             @else
                             <a class="btn-sm btn-danger"href="">Expire</a>
                             @endif
                            
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('listing_promotion_delete',['id'=>$user->listing_id])}}">Delete </a> 
                          </td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection