

@extends('ui.old-ui.master.master2')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="add-list-ste">
					<div class="add-list-ste-inn">
					<ul>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>1])}}" > <span>Step 1</span>
									<b>Basic Info</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>2])}}" > <span>Step 2</span>
									<b>Services</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>3])}}"class="act"> <span>Step 3</span>
									<b>offers</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>4])}}"> <span>Step 4</span>
									<b>map</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>5])}}"> <span>Step 5</span>
									<b>Other</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>6])}}"> <span>Step 6</span>
									<b>done</b>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Step 3</span>
					<div class="log">
						<div class="login add-list-off">
							<h4>Special offers</h4>
							<span class="add-list-add-btn lis-add-off" title="add new offer">+</span>
							<span class="add-list-rem-btn lis-add-rem" title="remove offer">-</span>
							<form action="{{route('user_listing_update',['id'=>$listing->listing_id])}}" class="listing_form_3" id="listing_form_3" name="listing_form_3" method="post" enctype="multipart/form-data">
								@csrf
								<input name="step" type="text" class="d-none" value="3">
							    <ul>
								@php
                                $val=0;
                                @endphp
                                @foreach($service_1_name as $name)
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="service_1_name[]" class="form-control"value="{{$service_1_name[$val]}}" placeholder="Offer name*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="service_1_price[]" onkeypress="return isNumber(event)"value="{{$service_1_price[$val]}}" class="form-control" placeholder="Price">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="service_1_detail[]" class="form-control" placeholder="Details about this offer">{{$service_1_detail[$val]}}</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Choose offer image</label>
													<input type="file" name="service_1_image[]" class="form-control">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="service_1_view_more[]" value="{{$service_1_view_more[$val++]}}" class="form-control" placeholder="View More Link">
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
									@endforeach
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>2])}}">
											<button type="button" class="btn btn-primary">Previous</button>
										</a>
									</div>
									<div class="col-md-6">
										<button type="submit" name="listing_submit" class="btn btn-primary">Next</button>
									</div>
									<div class="col-md-12"> <a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>4])}}" class="skip">Skip this                                        >></a>
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
	<!-- START -->

	<!-- END -->
	<!-- START -->
@endsection