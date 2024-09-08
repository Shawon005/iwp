@extends('main.master')
@section('content')

	<section class=" fedback">
		<img src="images/admin-log-bg.jpg" alt="" class="fed">
		<div class="fed-box">
			<div class="lhs">
				<h3>Send your feedbacks</h3>
				<form name="feedback_form" id="feedback_form" method="post" action="feedback_submit.html" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" placeholder="Name*" name="feedback_name" id="feedback_name" class="form-control" required="required">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Enter email*" required="required" name="feedback_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
					</div>
					<div class="form-group">
						<input type="text" onkeypress="return isNumber(event)" class="form-control" id="feedback_mobile" name="feedback_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required="">
					</div>
					<div class="form-group">
						<textarea name="feedback_message" id="feedback_message" required="required" placeholder="Write your feedback here*"></textarea>
					</div>
					<button type="submit" id="feedback_submit" name="feedback_submit" class="btn btn-primary">Submit Feedback</button>
				</form>
			</div>
			<div class="rhs">
				<h2>Your feedback</h2>
				<p>Your feedback is most important for us. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
				<ul>
					<li>
						<a href="#">
							<img src="images/icon/facebook.png" alt="">
						</a>
					</li>
					<li>
						<a href="#">
							<img src="images/icon/twitter.png" alt="">
						</a>
					</li>
					<li>
						<a href="#">
							<img src="images/icon/linkedin.png" alt="">
						</a>
					</li>
					<li>
						<a href="#">
							<img src="images/icon/whatsapp.png" alt="">
						</a>
					</li>
				</ul>
				<h4>Why send feedback?</h4>
				<p>Useful for feature update</p>
				<p>Helping for customerfeedback</p>
			</div>
		</div>
	</section>
	<!--END-->
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
@endsection