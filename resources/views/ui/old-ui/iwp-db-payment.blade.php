@extends('ui.old-ui.master.master')
@section('content')

	<!-- END -->
	<!-- START -->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Payment</span>
				<div class="ud-cen-s2">
					<h2>Payment Status</h2>
					<a href="{{route('plan-change')}}" class="db-tit-btn">Change My Plan</a>
					
					<div class="ud-payment">
						<div class="pay-lhs">
							<img src="images/user/abhi.jpg" alt="">
						</div>
						<div class="pay-rhs">
							<ul>
								<li><b>Name : </b>{{$user->first_name}}</li>
								<li><b>Plan name : </b>{{$plan->plan_type_name}}</li>
								<li><b>Start date : </b>{{dateFormatConverter($user->user_cdt)}}</li>
								<li><b>Expiry date : </b> {{dateFormatConverter(($user->user_cdt. '+ 6 month'))}}</li>
								<li><b>Duration : </b>  {{$plan->plan_type_duration}} month(s)</li>
								<li><b>Remaining days : </b>{{diff($user->user_cdt,now())}}</li>
								<li><span class="ud-stat-pay-btn">Checkout amount: Rs:{{$plan->plan_type_price}}</span>
								</li>
								<li><span class="ud-stat-pay-btn">Payment Status: {{$user->payment_status}}</span>
								</li>
							</ul>
						</div>
					</div>
					<!-- <div class="ud-pay-op">
						<h4>Select your payment option</h4>
						<ul>
							<li>
								<div class="pay-full">
									<div class="rbbox">
										<input type="radio" id="paymentpaypal" name="payment" checked='checked'>
										<label for="paymentpaypal">PayPal payment gateway</label>
										<div class="pay-note"> <span><i class="material-icons">star</i> You can pay with your credit card if you don’t have a PayPal account.</span>
											<span><i class="material-icons">star</i>What is PayPal?</span>
											<form name="paypal_form" id="paypal_form" method="post" action="payment_paypal_submit.html">
												<h4>Billing details</h4> -->
												<!-- <ul>
													<li> -->
														<!--FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" readonly="readonly" class="form-control" value="Rn53 Themes" placeholder="Full name *" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_country" class="form-control" value="Austarlia" placeholder="Country">
																</div>
															</div>
														</div> -->
														<!--FILED END-->
														<!--FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_state" class="form-control" value="Sydney" placeholder="State">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_city" class="form-control" value="Sydney" placeholder="City *" required>
																</div>
															</div>
														</div> -->
														<!--FILED END-->
														<!--FILED START-->
														<!-- <div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" name="user_address" class="form-control" value="No 27, Pointing street, Sydney, Australia" placeholder="Village & Street name">
																</div>
															</div>
														</div> -->
														<!--FILED END-->
														<!--FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_zip_code" onkeypress="return isNumber(event)" class="form-control" value="65448811" placeholder="Postcode/ZIP">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_name" value="John smth" placeholder="Contact person *" required>
																</div>
															</div>
														</div> -->
														<!--FILED END-->
														<!--FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_mobile" onkeypress="return isNumber(event)" value="2211446688" placeholder="Contact number">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_email" value="rn53hemes@gmail.com" placeholder="Contact email" required>
																</div>
															</div>
														</div> -->
														<!--FILED END-->
													<!-- </li>
												</ul>
												<button type="submit" name="payment_submit" class="db-pro-bot-btn">Start Payment</button>
											</form>
										</div>
									</div>
								</div>
							</li> -->
							<!-- <li>
								<div class="pay-full">
									<div class="rbbox">
										<input type="radio" id="paymentstripe" name="payment">
										<label for="paymentstripe">Stripe payment gateway</label>
										<div class="pay-note"> <span><i class="material-icons">star</i> You can pay with your credit card if you don’t have a Stripe account.</span>
											<span><i class="material-icons">star</i>What is Stripe?</span>
											<form name="stripe_dash_form" id="stripe_dash_form" method="post" action="stripe_bypass_submit.html">
												<input type="hidden" readonly="readonly" class="form-control" name="stripe_dash_user_id" value="37" placeholder="Full name *" required>
												<h4>Billing details</h4>
												<ul>
													<li> -->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" readonly="readonly" class="form-control" value="Rn53 Themes" placeholder="Full name *" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_country" class="form-control" value="Austarlia" placeholder="Country">
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_state" class="form-control" value="Sydney" placeholder="State">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_city" class="form-control" value="Sydney" placeholder="City *" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" name="user_address" class="form-control" value="No 27, Pointing street, Sydney, Australia" placeholder="Village & Street name">
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_zip_code" onkeypress="return isNumber(event)" class="form-control" value="65448811" placeholder="Postcode/ZIP">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_name" value="John smth" placeholder="Contact person *" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_mobile" onkeypress="return isNumber(event)" value="2211446688" placeholder="Contact number">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_email" value="rn53hemes@gmail.com" placeholder="Contact email" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
													<!-- </li>
												</ul>
												<button type="submit" name="stripe_dash_form_submit" class="db-pro-bot-btn">Start Payment</button>
											</form>
										</div>
									</div>
								</div>
							</li> -->
							<!-- <li>
								<div class="pay-full">
									<div class="rbbox">
										<input type="radio" id="payment_razor_pay" name="payment">
										<label for="payment_razor_pay">Razor Pay payment gateway</label>
										<div class="pay-note"> <span><i class="material-icons">star</i> You can pay with your credit card if you don’t have a Razor Pay account.</span>
											<span><i class="material-icons">star</i>What is Razor Pay?</span>
											<form name="razor_pay_dash_form" id="razor_pay_dash_form" method="post" action="razor_pay_bypass_submit.html">
												<input type="hidden" readonly="readonly" class="form-control" name="razor_pay_dash_user_id" value="37" placeholder="Full name *" required>
												<h4>Billing details</h4>
												<ul>
													<li> -->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" readonly="readonly" class="form-control" value="Rn53 Themes" placeholder="Full name *" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_country" class="form-control" value="Austarlia" placeholder="Country">
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_state" class="form-control" value="Sydney" placeholder="State">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_city" class="form-control" value="Sydney" placeholder="City *" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" name="user_address" class="form-control" value="No 27, Pointing street, Sydney, Australia" placeholder="Village & Street name">
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_zip_code" onkeypress="return isNumber(event)" class="form-control" value="65448811" placeholder="Postcode/ZIP">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_name" value="John smth" placeholder="Contact person *" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_mobile" onkeypress="return isNumber(event)" value="2211446688" placeholder="Contact number">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_email" value="rn53hemes@gmail.com" placeholder="Contact email" required>
																</div>
															</div>
														</div -->
														<!--                                                    FILED END-->
													<!-- </li>
												</ul>
												<button type="submit" name="razor_pay_dash_form_submit" class="db-pro-bot-btn">Start Payment</button>
											</form>
										</div>
									</div>
								</div>
							</li> -->
							<!-- <li>
								<div class="pay-full">
									<div class="rbbox">
										<input type="radio" id="payment_paytm" name="payment">
										<label for="payment_paytm">Paytm payment gateway</label>
										<div class="pay-note"> <span><i class="material-icons">star</i> You can pay with your credit card if you don’t have a Paytm account.</span>
											<span><i class="material-icons">star</i>What is Paytm?</span>
											<form name="paytm_dash_form" id="paytm_dash_form" method="post" action="paytm_bypass_submit.html">
												<input type="hidden" readonly="readonly" class="form-control" name="paytm_dash_user_id" value="37" placeholder="Full name *" required>
												<h4>Billing details</h4>
												<ul>
													<li> -->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" readonly="readonly" class="form-control" value="Rn53 Themes" placeholder="Full name *" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_country" class="form-control" value="Austarlia" placeholder="Country">
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_state" class="form-control" value="Sydney" placeholder="State">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_city" class="form-control" value="Sydney" placeholder="City *" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" name="user_address" class="form-control" value="No 27, Pointing street, Sydney, Australia" placeholder="Village & Street name">
																</div>
															</div>
														</div -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="user_zip_code" onkeypress="return isNumber(event)" class="form-control" value="65448811" placeholder="Postcode/ZIP">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_name" value="John smth" placeholder="Contact person *" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
														<!--                                                    FILED START-->
														<!-- <div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_mobile" onkeypress="return isNumber(event)" value="2211446688" placeholder="Contact number">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="user_contact_email" value="rn53hemes@gmail.com" placeholder="Contact email" required>
																</div>
															</div>
														</div> -->
														<!--                                                    FILED END-->
													<!-- </li>
												</ul>
												<button type="submit" name="paytm_dash_form_submit" class="db-pro-bot-btn">Start Payment</button>
											</form>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div> -->
					<div class="ud-notes">
						<p><b>Notes:</b> Hi, Before start "Ads Payment" you must know the pricing details and positions and all. You just click the "Pricing and other details" button in this same page and you know the all details. If your payment done means your invoice automaticall received your "Payment invoice" page and you never stop your Ads till the end date.</p>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
	
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