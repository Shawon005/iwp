@extends('main.master')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class="login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list posr">
					<div class="log-bor">&nbsp;</div> <span class="udb-inst">plan change</span>
					<div class="log log-1">
						<div class="login">
							<h4>Change my plan</h4>
							<p>Hi Rn53 Themes,</br>Your Current Plan <b>Premium Plus</b>
								</br>Expiration date 26, Mar 2031</p>
							<form name="plan_change_form" id="plan_change_form" method="post" enctype="multipart/form-data" action="plan_change_submit.html">
								<div class="form-group">
									<div class="form-group">
										<select name="user_plan" required="required" id="user_plan" class="form-control">
											<option value="" selected="selected">Choose your plan</option>
											<option value="4">Premium Plus - $20/year</option>
											<!--                                    <option value="Standard plan">Standard plan - $120/year</option>-->
											<!--                                    <option value="Premium plan">Premium plan - $250/year</option>-->
											<!--                                    <option>Premium plus plan - $350/year</option>-->
										</select> <a href="pricing-details.html" class="frmtip" target="_blank">Plan details</a>
									</div>
								</div>
								<button type="submit" name="plan_type_submit" class="btn btn-primary">Change</button>
							</form>
							<div class="col-md-12"> <a href="dashboard.html" class="skip">Go to User Dashboard &gt;&gt;</a>
							</div>
						</div>
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
									<input type="text" class="form-control" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required>
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

	<!-- END -->
	<!-- START -->
@endsection
