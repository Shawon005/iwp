@extends('ui.old-ui.master.master2')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Create new</span>
					<div class="log">
						<div class="login">
							<h4>Add New Listing</h4>
							<div class="row cre-dup">
								<div class="col-md-6"> <a href="{{route('user_add_listing_step_1')}}">Create listing from scratch</a>
								</div>
								<div class="col-md-6"> <span class="cre-dup-btn">Create duplicate listing</span>
								</div>
							</div>
							<form name="" action="{{route('duplicate_listing_create')}}" id="duplicate_listing_form" method="post" class="cre-dup-form cre-dup-form-show">
								<!--FILED START-->
								@csrf
								@php $listings=sub('vv_listings','user_id',session('user_id')) @endphp
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select name="listing_id" id="listing_id" class="chosen-select form-control" required="required">
												<option value="" disabled selected>Listing Name</option>
                                              @foreach($listings as $listing)
											  <option value="{{$listing->listing_id}}" >{{$listing->listing_name}}</option>
											  @endforeach
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_name" required="required" class="form-control" placeholder="New Listing Name*">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<button type="submit" name="listing_submit" class="btn btn-primary">Create Now</button>
							</form>
							<div class="col-md-12"> <a href="{{route('user/dasboard')}}" class="skip">Go to user dashboard >></a>
							</div>
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
