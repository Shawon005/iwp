@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>AD</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Ad Details</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Ad Pricing and other details </h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                   
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Ads Name</th>
                            <th>Ads Preview</th>
                            <th>Ads Size</th>
                            <th>Cost P/Day</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                        @php $NO=1;@endphp
                        @foreach($ads as $user)
                        <tr>
                            <td>{{$NO++}}</td>
                           <td>{{$user->ad_price_name}}</td>
                           <td><img src="{{asset('/storage/file/'.$user->ad_price_photo)}}" width="50" height="60"alt=""></td>
                           <td>{{$user->ad_price_size}}</td>
                           <td>{{$user->ad_price_cost}}</td>
                           <td>{{$user->ad_price_status}}</td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('ads_pricing_edit',['id'=>$user->all_ads_price_id])}}">Edit </a> 
                         
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection