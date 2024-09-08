@extends('ui.old-ui.master.master2')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Create new Ads</span>
					<div class="log">
						<div class="login">
							<h4>Submit your Ads</h4>
							<form name="create_ads_form" id="create_ads_form" method="post" action="{{route('ads_post_store')}}" enctype="multipart/form-data">
								@csrf
								<input type="hidden" value="" name="ad_total_days" id="ad_total_days" class="validate">
								<input type="hidden" value="" name="ad_cost_per_day" id="ad_cost_per_day" class="validate">
								<input type="hidden" value="" name="ad_total_cost" id="ad_total_cost" class="validate">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group ca-sh-user">
													<select name="all_ads_price_id" required="required" class="form-control" id="adposi">
														<option value="">Choose Ads Position *</option>
														@foreach($position as $user):
														<option value="{{$user->all_ads_price_id}}" >{{$user->ad_price_name}}({{$user->ad_price_cost}}Rs/Per Day)</option>
														@endforeach
													</select> <a href="{{route('ad-details')}}" class="frmtip" target="_blank">Pricing
                                                        details</a>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="date" autocomplete="off" name="ad_start_date" class="form-control" placeholder="Ad start date (MM/DD/YYYY)" required>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="date" autocomplete="off" name="ad_end_date" class="form-control" placeholder="Ad end date (MM/DD/YYYY)" required>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Choose Ad image</label>
													<input type="file" name="ad_enquiry_photo" class="form-control" required>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea id="ad_link" name="ad_link" class="form-control" placeholder="Advertisement External link" required></textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="ad-pri-cal">
													<ul>
														<li>
															<div> <span>Total days</span>
																<h5 class="ad-tdays">0</h5>
															</div>
														</li>
														<li>
															<div> <span>Cost Per Day</span>
																<h5>$<b
                                                                        class="ad-pocost">0</b></h5>
															</div>
														</li>
														<li>
															<div> <span>Tax</span>
																<h5>$4</h5>
															</div>
														</li>
														<li>
															<div> <span>Total Cost</span>
																<h5>$<b
                                                                        class="ad-tcost">0</b></h5>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="create_ad_submit" class="btn btn-primary">Publish this Ad</button>
									</div>
									<div class="col-md-12"> <a href="{{route('user/dasboard')}}" class="skip">Go to User Dashboard >></a>
									</div>
								</div>
								<!--FILED END-->
							</form>
							<div class="ud-notes">
								<p><b>Notes:</b> Once you submit your Ad then Admin or support team will contact you shortly.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END PRICING DETAILS-->
	<!-- START -->

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