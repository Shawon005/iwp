@extends('main.master')
@section('content')

	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main">
					<div class="log-bor">&nbsp;</div>
					<div class="log log-1">
						<div class="login">
							<h4>Member Login</h4>
							<form id="login_form" name="login_form" method="post">
								<div class="form-group">
									<input type="email" autocomplete="off" name="email_id" id="email_id" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Enter email address" value="rn53themes@gmail.com" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Enter password*" required value="passwor">
								</div>
								<button type="submit" name="login_submit" value="submit" class="btn btn-primary">Sign in</button>
							</form>
							<!-- SOCIAL MEDIA LOGIN -->
							<div class="soc-log">
								<ul>
									<li>
										<div class="g-signin2" data-onsuccess="onSignIn"></div>
									</li>
									<!--                                <li>-->
									<!--                                    <a href="google_login.html" class="login-goog"><img src="images/icon/seo.png">Continue-->
									<!--                                        with Google</a>-->
									<!--                                </li>-->
									<li>
										<a href="javascript:void(0);" onclick="fbLogin();" class="login-fb">
											<img src="images/icon/facebook.png">Continue with Facebook</a>
									</li>
								</ul>
							</div>
							<!-- END SOCIAL MEDIA LOGIN -->
						</div>
					</div>
					<div class="log log-2">
						<div class="login">
							<h4>Create an account</h4>
							<p>Don't have an account? Create your account. It's take less then a minutes</p>
							<form name="register_form" id="register_form" method="post" action="register_update.html">
								<input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">
								<input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU" id="mode_path" class="validate">
								<div class="form-group">
									<input type="text" autocomplete="off" name="first_name" id="first_name" class="form-control" placeholder="Name">
								</div>
								<div class="form-group">
									<input type="email" autocomplete="off" name="email_id" id="email_id" class="form-control" placeholder="Email id*" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password*" required>
								</div>
								<div class="form-group">
									<input type="text" onkeypress="return isNumber(event)" autocomplete="off" name="mobile_number" id="mobile_number" class="form-control" placeholder="Phone">
								</div>
								<div class="form-group ca-sh-user">
									<select name="user_type" id="user_type" class="form-control ca-check-plan">
										<option value="">User type</option>
										<option value="General">General user</option>
										<option value="Service provider">Service provider</option>
									</select> <a href="user-type" class="frmtip" target="_blank">User options</a>
								</div>
								<div class="form-group ca-sh-plan">
									<select name="user_plan" id="user_plan" class="form-control">
										<option value="" disabled="disabled" selected="selected">Choose your plan</option>
										<option value="1">Free</option>
										<option value="2">Standard - $9/year</option>
										<option value="3">Premium - $19/year</option>
										<option value="4">Premium Plus - $20/year</option>
										<!--                                    <option value="Standard plan">Standard plan - $120/year</option>-->
										<!--                                    <option value="Premium plan">Premium plan - $250/year</option>-->
										<!--                                    <option>Premium plus plan - $350/year</option>-->
									</select> <a href="pricing-details.html" class="frmtip" target="_blank">Plan details</a>
								</div>
								<button type="submit" name="register_submit" class="btn btn-primary">Register Now</button>
							</form>
							<!-- SOCIAL MEDIA LOGIN -->
							<div class="soc-log">
								<ul>
									<li>
										<div class="g-signin2" data-onsuccess="onSignIn"></div>
									</li>
									<!--                                        <li>-->
									<!--                                            <a href="google_login.html" class="login-goog"><img-->
									<!--                                                    src="images/icon/seo.png">Continue-->
									<!--                                                with Google</a>-->
									<!--                                        </li>-->
									<li>
										<a href="javascript:void(0);" onclick="fbLogin();" class="login-fb">
											<img src="images/icon/facebook.png">Continue with Facebook</a>
									</li>
								</ul>
							</div>
							<!-- END SOCIAL MEDIA LOGIN -->
						</div>
					</div>
					<div class="log log-3">
						<div class="login">
							<h4>Forgot password</h4>
							<form id="forget_form" name="forget_form" method="post" action="forgot_process.html">
								<div class="form-group">
									<input type="email" autocomplete="off" name="email_id" id="email_id" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address" required>
								</div>
								<button type="submit" name="forgot_submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
					<div class="log-bot">
						<ul>
							<li> <span class="ll-1">Login?</span>
							</li>
							<li> <span class="ll-2">Create an account?</span>
							</li>
							<li> <span class="ll-3">Forgot password?</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END PRICING DETAILS-->
	<section>
		<div class="pop-ups pop-quo">
			<!-- The Modal -->
			<div class="modal fade" id="quote">
				<div class="modal-dialog">
					<div class="modal-content">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<!-- Modal Header -->
						<div class="quote-pop">
							<h4>Get quote</h4>
							<form>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Enter name*" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Enter email*" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="3" placeholder="Enter your query or message"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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