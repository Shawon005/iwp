@extends('main.master')
@section('content')

	<!--    Google Analytics Code Ends-->


	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Add new Event</span>
					<div class="log">
						<div class="login add-list-off">
							<h4>Create Event</h4>
							<form action="event_insert.html" class="event_form" id="event_form" name="event_form" method="post" enctype="multipart/form-data">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="event_name" required="required" class="form-control" placeholder="Event Name*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="event_address" required="required" class="form-control" placeholder="Address*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="date" name="event_start_date" required="required" class="form-control" placeholder="Date*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_time" required="required" class="form-control" placeholder="Time*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" required="required" name="event_description" id="event_description" placeholder="Event Details"></textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="event_map" placeholder="Google map location"></textarea>
													<!-- INPUT TOOL TIP -->
													<div class="inp-ttip"> <b>Iframe code from google</b>
														Copy and paste Google iframe code here.</div>
													<!-- END INPUT TOOL TIP -->
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Choose banner image</label>
													<input type="file" name="event_image" required="required" class="form-control">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_contact_name" required="required" class="form-control" placeholder="Contact person*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_mobile" required="required" class="form-control" placeholder="Contact phone number*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="email" name="event_email" required="required" class="form-control" placeholder="Contact Email Id *">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_website" class="form-control" placeholder="Event Website">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div>
													<div class="chbox">
														<input type="checkbox" id="isenquiry" name="isenquiry" checked="">
														<label for="isenquiry">Enquiry or Registration form enable</label>
													</div>
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="event_submit" class="btn btn-primary">Submit</button>
									</div>
									<div class="col-md-12"> <a href="dashboard.html" class="skip">Go to user dashboard                                        >></a>
									</div>
								</div>
								<!--FILED END-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection	
	<!--END PRICING DETAILS-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	