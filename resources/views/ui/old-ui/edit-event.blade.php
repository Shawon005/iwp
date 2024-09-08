
@extends('main.master')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Edit Event</span>
					<div class="log">
						<div class="login add-list-off">
							<h4>Edit this Event</h4>
							<form action="{{route('add-event-update',['id'=>$event->event_id])}}" class="event_edit_form" id="event_edit_form" name="event_edit_form" method="post" enctype="multipart/form-data">
								@csrf
							    <input type="hidden" id="event_id" value="48" name="event_id" class="validate">
								<input type="hidden" id="event_image_old" value="88783banner16130393609bct2.jpg" name="event_image_old" class="validate">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="{{$event->event_name}}" required="required" class="form-control" value="CHAMPIONS OF INDIA RUN-RIDE-WALK" placeholder="Event Name*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="event_address" required="required" class="form-control" value="{{$event->event_address}}" placeholder="Address*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" id="event_start_date" name="event_start_date" required="required" class="form-control" value="{{$event->event_start_date}}" placeholder="Date*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_time" required="required" class="form-control" value="{{$event->event_time}}" placeholder="Time*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" required="required" name="event_description" id="event_description" placeholder="Event Details">
														<p>{{$event->event_description}}</p>
														
													</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="event_map" placeholder="Google map location">{{$event->event_map}}</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Choose banner image</label>
													<input type="file" name="event_image" class="form-control">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_contact_name" required="required" class="form-control" value="{{$event->event_contact_name}}" placeholder="Contact person*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_mobile" required="required" class="form-control" value="{{$event->event_mobile}}" placeholder="Contact phone number*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="email" name="event_email" required="required" class="form-control" value="{{$event->event_email}}" placeholder="Contact Email Id *">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_website" class="form-control" value="{{$event->event_website}}" placeholder="Event Website">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div>
													<div class="chbox">
												    	@if($event->isenquiry)
														<input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1" checked>
														@else
														<input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1">
														@endif
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
										<button type="submit" name="event_submit" class="btn btn-primary">Save Changes</button>
									</div>
									<!--                                        <div class="col-md-6">-->
									<!--                                            <button type="submit" class="btn btn-primary">Preview</button>-->
									<!--                                        </div>-->
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
	<!--END PRICING DETAILS-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection