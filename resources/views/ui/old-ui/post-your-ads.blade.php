

@extends('main.master')
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
							<form name="create_ads_form" id="create_ads_form" method="post" action="new_ads_insert.html" enctype="multipart/form-data">
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
														<option myTag="70" value="1">Home page Bottom (70$ /per day)</option>
														<option myTag="50" value="2">All listing page Top (50$ /per day)</option>
														<option myTag="20" value="3">All listing page Bottom (20$ /per day)</option>
														<option myTag="70" value="4">All listing page Left (70$ /per day)</option>
														<option myTag="20" value="5">Listing detail page Right (20$ /per day)</option>
														<option myTag="40" value="6">Listing detail page Bottom (40$ /per day)</option>
													</select> <a href="ad-details.html" class="frmtip" target="_blank">Pricing
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
									<div class="col-md-12"> <a href="dashboard.html" class="skip">Go to User Dashboard >></a>
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
<span class="btn-ser-need-ani">Help & Support</span>
	<div class="ani-quo-form"> <i class="material-icons ani-req-clo">close</i>
		<div class="tit">
			<h3>What service do you need? <span>BizBook will help you</span></h3>
		</div>
		<div class="hom-col-req">
			<div id="home_slide_enq_success" class="log" style="display: none;">
				<p>Your Enquiry Is Submitted Successfully!!!</p>
			</div>
			<div id="home_slide_enq_fail" class="log" style="display: none;">
				<p>Something Went Wrong!!!</p>
			</div>
			<div id="home_slide_enq_same" class="log" style="display: none;">
				<p>You cannot make enquiry on your own listing</p>
			</div>
			<form name="home_slide_enquiry_form" id="home_slide_enquiry_form" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="listing_id" value="0" placeholder="" required>
				<input type="hidden" class="form-control" name="listing_user_id" value="0" placeholder="" required>
				<input type="hidden" class="form-control" name="enquiry_sender_id" value="" placeholder="" required>
				<input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required>
				<div class="form-group">
					<input type="text" name="enquiry_name" value="" required="required" class="form-control" placeholder="Enter name*">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" placeholder="Enter email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" value="" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required="">
				</div>
				<div class="form-group">
					<select name="enquiry_category" id="enquiry_category" class="form-control">
						<option value="">Select Category</option>
						<option value="19">Wedding halls</option>
						<option value="18">Hotel & Food</option>
						<option value="17">Pet shop</option>
						<option value="16">Digital Products</option>
						<option value="15">Spa and Facial</option>
						<option value="10">Real Estate</option>
						<option value="8">Sports</option>
						<option value="7">Education</option>
						<option value="6">Electricals</option>
						<option value="5">Automobiles</option>
						<option value="3">Transportation</option>
						<option value="2">Hospitals</option>
						<option value="1">Hotels And Resorts</option>
					</select>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
				</div>
				<input type="hidden" id="source">
				<button type="submit" id="home_slide_enquiry_submit" name="home_slide_enquiry_submit" class="btn btn-primary">Submit Requirements</button>
			</form>
		</div>
	</div>
	<!-- END -->
	<!-- START -->
	@endsection