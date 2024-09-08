@extends('main.master')
@section('content')

	<!-- END -->
	<style>
		.test53{}
		.test53 p{}
		.plist{}
		.plist li{}
	</style>
	<!-- START -->
	<section>
		<!-- START -->
		<div class="ebk-ban">
			<div class="container">
				<div class="row">
					<div class="lhs">
						<h1>Bizbook Digital marketing ebook</h1>
						<p>Digital marketing tips: email marketing, SEM and more</p> <a href="https://themeforest.net/item/bizbook-directory-listings-template/25391222" class="btn">Download now</a>
					</div>
					<div class="rhs">
						<img src="images/ebook.png" alt="">
					</div>
				</div>
			</div>
		</div>
		<!-- END -->
		<!-- START -->
		<div class="ebk-con">
			<div class="container">
				<div class="row">
					<div class="lhs">
						<form name="feedback_form" id="feedback_form" method="post" action="feedback_submit.html" enctype="multipart/form-data">
							<h4>Download request</h4>
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
								<textarea name="feedback_message" id="feedback_message" required="required" placeholder="Write your message here*"></textarea>
							</div>
							<button type="submit" id="feedback_submit" name="feedback_submit" class="btn btn-primary">Submit Feedback</button>
						</form>
					</div>
					<div class="rhs">
						<h4>About Bizbook Digital marketing ebook</h4>
						<p>
							<h2><strong>BizBook &ndash; Directory &amp; Listings Template</strong></h2>
							<p>Get the premium business directory templates with the best quality and lowest price and template made for local business, portal, classifieds and all kinds of directory services. A powerful tool for the business directory template with powerful features like listing submission, events, blog posts, lead capture, SEO friendly, source tracking, cool listing filters, user profiles, payment gateway, user dashboard, admin panel and more. Try it today! Template powered with Bootstrap 4.0.</p>
							<h2><strong>Classified ADs:</strong></h2>
							<p>A powerful&nbsp;<strong>classified template</strong>&nbsp;for the business directory template with powerful features like listing submission, events, blog posts, lead capture, SEO friendly, source tracking, cool listing filters, user profiles, payment gateway, user dashboard, admin panel and more. Try it today!</p>
							<p class="test53">powerful features like listing submission</p>
							<ul class="plist">
								<li>Directory template</li>
								<li>Bizbook listing template</li>
							</ul>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- END -->
	</section>
	<!-- END -->
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