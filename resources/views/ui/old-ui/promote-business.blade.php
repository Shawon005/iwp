@extends('ui.old-ui.master.master2')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Start promotions</span>
					<div class="log">
						<div class="login">
							<h4>Start promotions</h4>
							<form name="create_promote_form" id="create_promote_form" method="post" action="{{('business_promote_store')}}" enctype="multipart/form-data">
								@csrf
							    <input type="hidden" value="" name="ad_total_days" id="ad_total_days" class="validate">
								<input type="hidden" value="" name="ad_cost_per_day" id="ad_cost_per_day" class="validate">
								<input type="hidden" value="" name="ad_total_cost" id="ad_total_cost" class="validate">
								<input type="hidden" value="1" name="adposi" id="adposi" class="validate">
								<!--                            <input type="hidden" value="-->
								<!--" name="type_id" id="type_id"-->
								<!--                                   class="validate">-->
								<input type="hidden" value="promote-business.html" name="url" id="url" class="validate">
								<!--                            <input type="hidden" value="-->
								<!--" name="type_value" id="type_value"-->
								<!--                                   class="validate">-->
								<input type="hidden" value="1" name="type_value" id="type_value" class="validate">
								<!--FILED START-->
								<!--                            <div class="row">-->
								<!--                                <div class="col-md-12">-->
								<!--                                    <div class="form-group">-->
								<!--                                        <input id="listing_name" name="listing_name" type="text" required="required"-->
								<!--                                               readonly="readonly" class="form-control"-->
								<!--                                               value="-->
								<!--"-->
								<!--                                               placeholder="-->
								<!--">-->
								<!--                                    </div>-->
								<!--                                </div>-->
								<!--                            </div>-->
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select name="type_id" required="required" id="type_id" class=" form-control">
												<option value="">Choose Listing</option>
												<option value="395">test</option>
												<option value="394">dfzhfhd</option>
												<option value="393">Iei</option>
												<option value="392">phoenix mall</option>
												<option value="391">Ocha Thai Cuisine</option>
												<option value="389">Core real estates</option>
												<option value="384">Gill Automobiles and Services</option>
												<option value="381">Titan Wedding Hall</option>
												<option value="380">Taj Hotels</option>
												<option value="378">ccc</option>
												<option value="375">Hello</option>
												<option value="268">Premium gardens</option>
												<option value="267">Beach luxury villa gardens</option>
												<option value="266">GOS Villas</option>
												<option value="247">Super bike showroom</option>
												<option value="238">Benz cars showroom</option>
												<option value="207">Smith Luxury Villas</option>
												<option value="164">Ø§Ø¨Ù†Ù‰ Ù…ÙˆÙ‚Ø¹Ùƒ Ù…Ø¹Ù†Ø§</option>
												<option value="163">BizBookBusiness Directory Template</option>
												<option value="130">Tour and Travel html Template</option>
												<option value="129">Smart Digital Products</option>
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start date</label>
											<input id="start-date" name="ad_start_date" required="required" type="date" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>End date</label>
											<input id="end-date" name="ad_end_date" type="date" required="required" class="form-control">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div style="display:block" class="ad-pri-cal">
											<ul>
												<li>
													<div> <span>Total days</span>
														<h5 class="ad-tdays">0</h5>
													</div>
												</li>
												<li>
													<div> <span>Cost Per Day</span>
														<h5><b class="ad-pocost">1</b></h5>
													</div>
												</li>
												<!--                                                    <li>-->
												<!--                                                        <div>-->
												<!--                                                            <span>Tax</span>-->
												<!--                                                            <h5>-->
												<!--4</h5>-->
												<!--                                                        </div>-->
												<!--                                                    </li>-->
												<li>
													<div> <span>Total Points</span>
														<h5><b class="ad-tcost">0</b></h5>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<button type="submit" name="create_promote_submit" class="btn btn-primary">Submit</button>
							</form>
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