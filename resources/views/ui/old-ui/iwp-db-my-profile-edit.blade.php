@extends('ui.old-ui.master.master')
@section('content')

	<!-- START -->
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<!-- <section class="ud" style=""> -->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">Edit User Profile</span>
				<div class="ud-cen-s2 ud-pro-edit">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Profile Details</h2>
					<form id="profile_update" name="profile_update" action="{{route('profile-update')}}" method="post" enctype="multipart/form-data">
						@csrf
					    <input type="hidden" value="62736rn53themes.png" autocomplete="off" name="profile_image_old" id="profile_image_old" required class="validate">
						<input type="hidden" value="5f4dcc3b5aa765d61d8327deb882cf99" autocomplete="off" name="password_old" id="password_old" required class="validate">
						<table class="responsive-table bordered">
							<tbody>
								<tr>
									<td>Name</td>
									<td>{{user(session('user_id'))}}</td>
								</tr>
								<tr>
									<td>Email Id</td>
									<td>{{$user->email_id}}</td>
								</tr>
								<tr>
									<td>Profile Password</td>
									<td>
										<div class="form-group">
											<input type="password" id="password" class="form-control" name="password"value="{{$user->password}}" placeholder="Change password">
										</div>
									</td>
								</tr>
								<tr>
									<td>Mobile Number</td>
									<td>
										<div class="form-group">
											<input type="text" name="mobile_number" class="form-control" value="{{$user->mobile_number}}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Profile Picture</td>
									<td>
										<div class="form-group">
											<input type="file" name="profile_image" id="profile_image" class="form-control">
										</div>
									</td>
								</tr>
								<tr>
									<td>Profile Cover Image</td>
									<td>
										<div class="form-group">
											<input type="file" name="profile_cove_image" id="profile_cove_image" class="form-control">
										</div>
									</td>
								</tr>
								<tr>
									<td>Photo Id Proof</td>
									<td>
										<div class="form-group">
											<input type="file" name="photo_id_proof" id="photo_id_proof" class="form-control">
										</div>
									</td>
								</tr>
								<tr>
									<td>City</td>
									<td>
										<div class="form-group">
											<input type="text" id="select-city" class="autocomplete form-control" name="user_city" value="{{$user->user_city}}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Join date</td>
									<td>26, Mar 2021</td>
								</tr>
								<tr>
									<td>Verified</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Premium service provider</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Facebook</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="user_facebook" value="{{$user->user_facebook}}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Twitter</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="user_twitter" value="{{$user->user_twitter}}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Youtube</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="user_youtube" value="{{$user->user_youtube}}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Website</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" name="user_website" value="{{$user->user_website}}">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<button type="submit" name="" class="db-pro-bot-btn" style="border-radius: 3px;">Save Changes</button> <a href="db-payment" class="db-pro-bot-btn" style="border-radius: 3px;">Upgrade</a>
									</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
			<!--RIGHT SECTION-->
			
	<!--END PRICING DETAILS-->
	<!-- START -->
<!-- <span class="btn-ser-need-ani">Help & Support</span> -->

	<!-- END -->
	<!-- START -->

@endsection