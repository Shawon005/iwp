@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Expert</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >All Expert</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Expert</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('expert')}}">ADD NEW EXPERT</a></li>
                </div>
              </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: center; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Expert  Name</th>
                            <th>Services done</th>
                            <th>Type</th>
                            <th>Review</th>
                            <th>Action</th>
                            <th>Details</th>
                          </tr>
                        </thead>
                       <tbody>
                       
                        @foreach($expert as $user)
                        <tr>
                        @php $T_R=sub('vv_expert_reviews','expert_id',$user->expert_id); $T=count($T_R); $review=0; @endphp
                          @foreach($T_R as $R)
                          <input type="hidden" value="{{$review=$review+$R->expert_rating}}">
                          @endforeach
                           <td>{{$user->expert_id}}</td>
                           <td>{{user($user->user_id)}}</td>
                           <td></td>
                           <td>{{Nam('vv_plan_type','plan_type_id', $user->user_plan,'plan_type_name')}}</td>

                           <td>{{($review!=0)?$review/$T:"N/A"}}</td>
                          <td>
                             <a class="btn-sm btn-info" href="{{route('expert_edit',['id'=>$user->expert_id])}}">Edit </a> |
                          
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('expert_delete',['id'=>$user->expert_id])}}">Delete </a> 
                          </td>
                          <td><a class="btn-sm " data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->expert_id}}" >Details</a></td>
                        </tr>


                        @endforeach
                       </tbody>
                      </table>
                      @foreach($expert as $user)
                                                <!-- start -->
                          <div class="modal fade" id="exampleModal{{$user->expert_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <table class="table table-bordered " style="width: 100%;  font-size:12px;white-space: nowrap; ">
                                <tbody>
                                <tr>
                                    <td>User</td>
                                    <td>
                                    <a href="{{route('profile',['id'=>$user->user_id])}}" target="_blank">
                                      {{user($user->user_id)}}</a>
                                </tr>
                                <tr>
                                    <td>Profile image</td>
                                    <td>
                                        <a href="{{route('expert/details',['id'=>$user->expert_id])}}"
                                           target="_blank"><img
                                                src="{{asset('/storage/file/'.$user->profile_image)}}" weight=50px height=60px></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>User type</td>
                                    <td>{{Nam('vv_users','user_id', $user->user_id,'user_type')}}</td>
                                </tr>
                                <tr>
                                    <td>Last payment</td>
                                    <td><span class="db-list-rat">FREE</span></td>
                                </tr>
                                <tr>
                                    <td>Plan start date</td>
                                    <td>{{Nam('vv_users','user_id', $user->user_id,'user_cdt')}}</td>
                                </tr>
                                <tr>
                                    <td>Plan end date</td>
                                    <td>{{dateSum(Nam('vv_users','user_id', $user->user_id,'user_cdt'),Nam('vv_plan_type','plan_type_id',Nam('vv_users','user_id', $user->user_id,'user_plan'),'plan_type_duration'))}}</td>
                                </tr>
                                <tr>
                                    <td>Work profession</td>
                                    <td>{{name('vv_expert_categories',$user->category_id)}}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{Nam('vv_expert_cities','country_id',$user->city_id,'country_name')}}</td>
                                </tr>
                                <tr>
                                    <td>Year of experience</td>
                                    <td>{{$user->years_of_experience}}</td>
                                </tr>
                                <tr>
                                    <td>Service start time</td>
                                    <td>{{$user->available_time_start}}</td>
                                </tr>
                                <tr>
                                    <td>Service close time</td>
                                    <td>{{$user->available_time_end}}</td>
                                </tr>
                                <tr>
                                    <td>Base fare</td>
                                    <td>{{$user->base_fare}}</td>
                                </tr>
                                <tr>
                                    <td>Services can do</td>
                                    @php $sub_arr=arr($user->sub_category_id); @endphp
                                    <td>
                                      @foreach($sub_arr as $sub)
                                      {{Nam('vv_expert_sub_categories','sub_category_id',$sub,'sub_category_name')}}
                                      @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Service Areas</td>
                                    @php $sub_arr=arr($user->area_id); @endphp
                                    <td>
                                      @foreach($sub_arr as $sub)
                                      {{Nam('vv_expert_areas','city_id',$sub,'city_name')}}
                                      @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Experience details</td>
                                    <td>
                                        <ul>
                                          <li>{{$user->experience_1}}</li>
                                          <li>{{$user->experience_2}}</li>
                                          <li>{{$user->experience_3}}</li>
                                          <li>{{$user->experience_4}}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Education and Qualifications</td>
                                    <td>
                                        <ul>
                                        <li>{{$user->education_1}}</li>
                                          <li>{{$user->education_2}}</li>
                                          <li>{{$user->education_3}}</li>
                                          <li>{{$user->education_4}}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Additional information</td>
                                    <td>
                                        <ul>
                                        <li>{{$user->additional_info_1}}</li>
                                          <li>{{$user->additional_info_2}}</li>
                                          <li>{{$user->additional_info_3}}</li>
                                          <li>{{$user->additional_info_4}}</li>
                                      </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ID proof</td>
                                    <td>
                                        <a href="{{route('expert/details',['id'=>$user->expert_id])}}"
                                           target="_blank"><img
                                                src="{{asset('/storage/file/'.$user->id_proof)}}"weight=50px height=60px></a>
                                    </td>
                                </tr>
                            
                                </tbody>
                            </table>
                                 
                                </div>
                                <div class="modal-footer">
                                
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                        @endforeach
                        </div>
    
            </div>
          
          </div>
                   
@endsection