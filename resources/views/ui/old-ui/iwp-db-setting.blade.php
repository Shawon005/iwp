@extends('ui.old-ui.master.master')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<!-- <section class="ud" style=""> -->
@php $user=first('vv_users','user_id',session('user_id')); @endphp
			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">SETTING</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Profile Setting</h2>
					<form id="setting_update" name="setting_update" action="{{route('setting-update')}}" method="post" enctype="multipart/form-data">
						@csrf
					   <table class="responsive-table bordered">
							<tbody>
								<tr>
									<td>Account status</td>
									<td>:</td>
									<td>
										<div class="form-group mt-3">
											<select name="setting_user_status" class="setting_user_status form-control">
												<option value="1"{{($user->setting_user_status==1)?'selected':''}}>Active</option>
												<option value="0"{{($user->setting_user_status==0)?'selected':''}}>In-Active</option>
											
											</select>
										</div>
									</td>
									<div class="log-error">
										<p style="display: none" class=" delete-message-box">Close Account will Delete your account permanently!! Think before submitting!!</p>
									</div>
								</tr>
								<tr>
									<td>Listing reviews</td>
									<td>:</td>
									<td>
										<div class="form-group mt-3">
											<select name="setting_review" class=" form-control">
												<option value="1" {{($user->setting_review==1)?'selected':''}} >Active</option>
												<option value="0"{{($user->setting_review==0)?'selected':''}}>In-Active</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>Listing share</td>
									<td>:</td>
									<td>
										<div class="form-group mt-3">
											<select name="setting_share" class=" form-control">
												<option value="1"{{($user->setting_share==1)?'selected':''}} >Active</option>
												<option value="0" {{($user->setting_share==0)?'selected':''}}>In-Active</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>Show my profile on listing page</td>
									<td>:</td>
									<td>
										<div class="form-group mt-3">
											<select name="setting_profile_show" class=" form-control">
												<option value="1"{{($user->setting_profile_show==1)?'selected':''}} >Active</option>
												<option value="0" {{($user->setting_profile_show==0)?'selected':''}}>In-Active</option>
											</select>
										</div>
									</td>
								</tr>
								<!--            <tr>-->
								<!--                <td>Listing guarantee show on listing page</td>-->
								<!--                <td>:</td>-->
								<!--                <td>-->
								<!--                    <div class="form-group">-->
								<!--                        <select name="setting_guarantee_show" class=" form-control">-->
								<!--                            <option -->
								<!-- value="0">Enable</option>-->
								<!--                            <option -->
								<!-- value="1">Disable</option>-->
								<!--                        </select>-->
								<!--                    </div>-->
								<!--                </td>-->
								<!--            </tr>-->
								<!--            <tr>-->
								<!--                <td>User type</td>-->
								<!--                <td>:</td>-->
								<!--                <td>-->
								<!--                    <div class="form-group">-->
								<!--                        <select class="form-control">-->
								<!--                            <option>Service provider</option>-->
								<!--                            <option>General users</option>-->
								<!--                        </select>-->
								<!--                    </div>-->
								<!--                </td>-->
								<!--            </tr>-->
								<tr>
			                        <td>Job Module</td>
			                        <td>:</td>
			                        <td>
			                            <div class="form-group">
			                                <!-- Default switch -->
			                                <div class="custom-control custom-switch">
			                                    <input type="checkbox" class="custom-control-input" id="setjob" name="setting_job_show" {{($user->setting_job_show==1)?"checked":''}}>
			                                    <label class="custom-control-label mt-2" for="setjob"> Enable or Disable Job related feature in your Dashboard</label>
			                                </div>
			                            </div>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Service Expert Module</td>
			                        <td>:</td>
			                        <td>
			                            <div class="form-group">
			                                <!-- Default switch -->
			                                <div class="custom-control custom-switch">
			                                    <input type="checkbox" class="custom-control-input" id="setexprt" name="setting_expert_show" {{($user->setting_expert_show==1)?"checked":''}}>
			                                    <label class="custom-control-label mt-2" for="setexprt"> Enable or Disable Service Expert related feature in your Dashboard</label>
			                                </div>
			                            </div>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Product Module</td>
			                        <td>:</td>
			                        <td>
			                            <div class="form-group">
			                                <!-- Default switch -->
			                                <div class="custom-control custom-switch">
			                                    <input type="checkbox" class="custom-control-input" id="setprod" name="setting_product_show" {{($user->setting_product_show==1)?"checked":''}}>
			                                    <label class="custom-control-label mt-2" for="setprod"> Enable or Disable Product related feature in your Dashboard</label>
			                                </div>
			                            </div>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Blog Module</td>
			                        <td>:</td>
			                        <td>
			                            <div class="form-group">
			                                <!-- Default switch -->
			                                <div class="custom-control custom-switch">
			                                    <input type="checkbox" class="custom-control-input" id="setblog" name="setting_blog_show" {{($user->setting_blog_show==1)?"checked":''}}>
			                                    <label class="custom-control-label mt-2" for="setblog"> Enable or Disable Blog related feature in your Dashboard</label>
			                                </div>
			                            </div>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Event Module</td>
			                        <td>:</td>
			                        <td>
			                            <div class="form-group">
			                                <!-- Default switch -->
			                                <div class="custom-control custom-switch">
			                                    <input type="checkbox" class="custom-control-input" id="seteve" name="setting_event_show" {{($user->setting_event_show==1)?"checked":''}}>
			                                    <label class="custom-control-label mt-2" for="seteve"> Enable or Disable Event related feature in your Dashboard</label>
			                                </div>
			                            </div>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Discount &amp; Coupon Module</td>
			                        <td>:</td>
			                        <td>
			                            <div class="form-group">
			                                <!-- Default switch -->
			                                <div class="custom-control custom-switch">
			                                    <input type="checkbox" class="custom-control-input" id="setdiscou" name="setting_coupon_show" {{($user->setting_coupon_show==1)?"checked":''}}>
			                                    <label class="custom-control-label mt-2" for="setdiscou"> Enable or Disable Coupons related feature in your Dashboard</label>
			                                </div>
			                            </div>
			                        </td>
			                    </tr>
								<tr>
									<td>
										<button type="submit" name="" class="sub-btn">Save changes</button>
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
	<!-- <section>
		<div class="full-bot-book">
			<div class="container">
				<div class="row">
					<div class="bot-book">
						<div class="col-md-2 bb-img">
							<img src="images/idea.png" alt="">
						</div>
						<div class="col-md-7 bb-text">
							<h4>#1 Business Directory and Service Provider</h4>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
						<div class="col-md-3 bb-link"> <a href="pricing-details.html">Add my business</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	@endsection