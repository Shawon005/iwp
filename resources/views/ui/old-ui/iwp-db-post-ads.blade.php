@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Paid ads</span>
				<div class="ud-cen-s2">
					<h2>Your Banner Ads</h2>
					<a href="{{route('post-your-ads')}}" class="db-tit-btn db-tit-btn-2-ads">Post your Ads</a>
					<a href="{{route('ad-details')}}" class="db-tit-btn">Pricing and other details</a>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<!--                    <th>Ads Name</th>-->
								<th>Ads Position</th>
								<th>Start date</th>
								<th>End date</th>
								<th>Duration</th>
								<th>Status</th>
								<th>Views</th>
								<th>Clicks</th>
							</tr>
						</thead>
						<tbody>
							@php $NO=1;@endphp
							@foreach($ads as $user)
							<tr>
								<td>{{$NO++}}</td>
								<td>{{Nam('vv_all_ads_price','all_ads_price_id',$user->all_ads_price_id,'ad_price_name')}}</td>
								<td>{{dateFormatConverter($user->ad_start_date)}}</td>
								<td>{{dateFormatConverter($user->ad_end_date)}}</td>
										<td>{{diff($user->ad_start_date,$user->ad_end_date)}} Days</td>
								<td><span class="db-list-ststus">{{$user->ad_enquiry_status}}</span>
								</td>
								<td><span class="db-list-rat">1K</span>
								</td>
								<td><span class="db-list-rat">642</span>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
					<div class="ud-notes">
						<p><b>Notes:</b> Hi, Before start "Ads Payment" you must know the pricing details and positions and all. You just click the "Pricing and other details" button in this same page and you know the all details. If your payment done means your invoice automaticall received your "Payment invoice" page and you never stop your Ads till the end date.</p>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
		
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