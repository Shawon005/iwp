@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->

	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Reviews</span>
				<div class="ud-cen-s2">
					<h2>All Listings - Received review details</h2>
					<ul class="nav nav-tabs">
						<li class="nav-item"> <a class="nav-link active" href="{{route('db-review')}}">All Received Reviews</a>
						</li>
						<li class="nav-item"> <a class="nav-link"  href="{{route('db-review_A')}}">All Sent Reviews</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="received" class="container  active">
							<br>
							<table class="responsive-table bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Listing Name</th>
										<th>User</th>
										<th>Email</th>
										<th>Phone</th>
										<th>City</th>
										<th>Ratings</th>
										<th>Message</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									@foreach($review as $user)
									<tr>
										<td>{{$user->review_id}}</td>
										<td>{{Nam('vv_listings','listing_id',$user->listing_id,'listing_name')}}</td>
										<td>{{user($user->review_user_id)}}</td>
										<td>{{$user->review_email}}</td>
										<td>{{$user->review_mobile}}</td>
										<td>{{$user->review_city}}</td>
										<td>{{$user->overall_rating}}</td>
										<td>{{$user->review_message}}</td>
										<td><a class="btn btn-danger" href="{{route('db-review-delete',['id'=>$user->review_id])}}">Delete</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
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