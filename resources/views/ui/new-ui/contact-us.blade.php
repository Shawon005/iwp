@extends('main.master')
@section('content')



	<!-- END -->
	<!-- START -->
	<section class=" con-us-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15226.847796644737!2d78.4235354!3d17.425606!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb913125387179%3A0xe41a89f0df01f2af!2sFototech%20Events%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1676595856895!5m2!1sen!2sin"" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</section>
	<!--END-->
	<!-- START -->
	<section class=" con-us-loc">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="tit">
						<h2>Fototech India Pvt Ltd</h2>
						<p>"We organize trade exhibitions for Photo, Film industries to showcase and demonstrate their new products and services."</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="con-pg-addr ">
						<h4>Address:</h4>
						<h5>Telangana:</h5>
						<p>8-2-120/115/3, Venkat Nagar, Banjara Hills, Hyderabad, Telangana 500033</p>
						<h5>Andhra Pradesh:</h5>
						<p>8-2-120/115/3, Venkat Nagar, Banjara Hills, Hyderabad, Telangana 500033</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="con-pg-info">
						<h4>Contact info:</h4>
						<ul>
							<li class="ic-pho">Support: +914040112038</li>
							<li class="ic-pho">Enquiry: +919618980044</li>
							<li class="ic-eml">Email: fototechportal@gmail.com</li>
							<li class="ic-eml">Email: info@fototechpvtltd.com</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="con-pg-soc">
						<h4>Website & Social media:</h4>
						<ul>
							<li class="ic-man-web"><a href="#">www.fototechportal.com</a>
							</li>
							<li class="ic-man-fb"><a href="https://www.facebook.com/fototechpvtltd">Follow us Facebook</a>
							</li>
							<li class="ic-man-tw"><a href="#">Twitter</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END-->
	<!-- START -->
<span class="btn-ser-need-ani">Help & Support</span>
	<div class="ani-quo-form"> <i class="material-icons ani-req-clo">close</i>
		<div class="tit">
			<h3>What service do you need? <span>Fototech will help you</span></h3>
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
@endsection	<!-- END -->
	<!-- START -->
	