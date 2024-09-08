@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Ads Request</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Ads Request</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>New Ads Request </h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('ads')}}">ADD NEW ADS</a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>User Name</th>
                            <th>Ad Position</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Image</th>
                            <th>Ad Days</th>
                            <th>Ad Cost</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                        @php $NO=1;@endphp
                        @foreach($ads as $user)
                        <tr>
                            <td>{{$NO++}}</td>
                           <td>{{user($user->user_id)}}</td>
                           <td>{{Nam('vv_all_ads_price','all_ads_price_id',$user->all_ads_price_id,'ad_price_name')}}</td>
                           <td>{{dateFormatConverter($user->ad_start_date)}}</td>
                           <td>{{dateFormatConverter($user->ad_end_date)}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->ad_enquiry_photo)}}" width="50" height="60"alt=""></td>
                           <td>{{$user->ad_total_days}}</td>
                           <td>{{$user->ad_total_cost}}</td>
                           <td>{{$user->ad_enquiry_status}}</td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('ads_edit',['id'=>$user->all_ads_enquiry_id])}}">Edit </a> |
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('ads_delete',['id'=>$user->all_ads_enquiry_id])}}">Delete </a> 
                           |<a class="btn-sm btn-info" href="{{route('ads_approve',['id'=>$user->all_ads_enquiry_id])}}">Approved</a></td>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection