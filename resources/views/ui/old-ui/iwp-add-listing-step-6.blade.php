@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->
	
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
								<a href="" > <span onclick="history.back()">Step 1</span>
									<b>Basic Info</b>
								</a>
							</li>
							<li>
								<a href=""> <span onclick="history.back()">Step 2</span>
									<b>Services</b>
								</a>
							</li>
							<li>
								<a href=""> <span onclick="history.back()"> Step 3</span>
									<b>offers</b>
								</a>
							</li>
							<li>
								<a href=""> <span onclick="history.back()">Step 4</span>
									<b>map</b>
								</a>
							</li>
							<li>
								<a href=""> <span onclick="history.back()">Step 5</span>
									<b>Other</b>
								</a>
							</li>
							<li>
								<a href=""class="act"> <span>Step 6</span>
									<b>done</b>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Step 6</span>
					<div class="log">
						<div class="login add-lis-done">
							<h4>Success</h4>
							@php $last=table('vv_listings'); $id=0; @endphp
                            @foreach($last as $list)
							@php $id=$list->listing_id; @endphp
							@endforeach
							<p>Your listing has been submitted successfully.</p>
							<form>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12"> <i class="material-icons succ">done</i>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6"> <a href="{{route('user/dasboard')}}" class="btn btn-primary">Go to user dashboard</a>
									</div>
									<div class="col-md-6"> <a target="_blank" href="{{route('all-listinged',['id'=>$id])}}" class="btn btn-primary">Listing preview</a>
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