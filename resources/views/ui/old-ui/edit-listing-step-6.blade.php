@extends('ui.old-ui.master.master2')
@section('content')

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
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>3])}}"> <span>Step 3</span>
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
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>6])}}"class="act"> <span>Step 6</span>
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
							<p>Your listing has been submitted successfully.</p>
							@php $last=table('vv_listings'); $id=0; @endphp
                            @foreach($last as $list)
							@php $id=$list->listing_id; @endphp
							@endforeach
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
									<div class="col-md-6"> <a target="_blank" href="{{route('all-listinged',['id'=>$listing->listing_id])}}" class="btn btn-primary">Listing preview</a>
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