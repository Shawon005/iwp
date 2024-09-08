@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">User Profile</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Profile Details</h2>
					<a href="{{route('edit-profile')}}" class="db-tit-btn">Edit profile page</a>
					<a href="db-payment" class="db-tit-btn db-tit-btn-1">Upgrade</a>
					<table class="responsive-table bordered">
						<tbody>
							<tr>
								@php $m=Nam('vv_plan_type','plan_type_id',$user->user_plan,'plan_type_duration'); @endphp
								<td>Profile Expiry(Listing exp)</td>
								<td>{{dateFormatConverter($user->user_cdt.'6 months' )}}</td>
							</tr>
							<tr>
								<td>Name</td>
								<td>{{$user->first_name}}</td>
							</tr>
							<tr>
								<td>Email Id</td>
								<td>{{$user->email_id}}</td>
							</tr>
							<tr>
								<td>Profile Password</td>
								<td>{{$user->password}}</td>
							</tr>
							<tr>
								<td>Mobile Number</td>
								<td>{{$user->mobile_number}}</td>
							</tr>
							<tr>
								<td>Profile Picture</td>
								<td>
									<img src="{{asset('/storage/file/'.$user->profile_image)}}" alt="">
								</td>
							</tr>
							<tr>
								<td>Profile Cover Image</td>
								<td>
									<img src="{{asset('/storage/file/'.$user->cover_image)}}" alt="">
								</td>
							</tr>
							<tr>
								<td>Phooto ID Proof</td>
								<td>
									<img src="{{asset('/storage/file/'.$user->profile_id_proof)}}" alt="">
								</td>
							</tr>
							<tr>
								<td>City</td>
								<td>{{$user->user_city}}</td>
							</tr>
							<tr>
								<td>Join date</td>
								<td>{{dateFormatConverter($user->user_cdt)}}</td>
							</tr>

							<tr>
								<td>Verified</td>
								<td>{{($user->verification_status==1)?'Yes':'No'}}</td>
							</tr>
							<tr>
								<td>Premium service provider</td>
								<td>{{($user->user_plan>0)?'Yes':'No'}}</td>
							</tr>
							<tr>
								<td>Profile Link</td>
								<td><a href="{{route('db-profile')}}" target="_blank">http://iwpdirectory.in/profile/{{$user->first_name}}</a>
								</td>
							</tr>
							<tr>
								<td>Facebook</td>
								<td>{{$user->user_facebook}}</td>
							</tr>
							<tr>
								<td>Twitter</td>
								<td>{{$user->user_twitter}}</td>
							</tr>
							<tr>
								<td>Youtube</td>
								<td>{{$user->user_youtube}}</td>
							</tr>
							<tr>
								<td>Website</td>
								<td>{{$user->user_website}}/</td>
							</tr>
							<tr>
								<td> <a href="{{route('edit-profile')}}" class="db-pro-bot-btn" style="border-radius: 2px; background: #50A2E3;">Edit profile page</a>
									<a href="db-payment" class="db-pro-bot-btn" style="border-radius: 2px; background: #50A2E3;">Upgrade</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!--RIGHT SECTION-->
		
	<!--END PRICING DETAILS-->
	<!-- START -->


@endsection