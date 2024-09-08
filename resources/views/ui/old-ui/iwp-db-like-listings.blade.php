@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Liked Listings</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>All Liked Listings</h2>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Listing Name</th>
								<th>Rating</th>
								<th>Remove</th>
								<th>Preview</th>
							</tr>
						</thead>
						<tbody>
							@foreach($like as $user)
							<tr>
							@php $T_R=sub('vv_reviews','listing_id',$user->listing_id); $T=count($T_R); $review=0; @endphp
									@foreach($T_R as $R)
									@php $review=$review+$R->price_rating @endphp
									@php ($review==0)? $review=1:$review=$review/count($T_R); @endphp
									@endforeach
								<td>{{$user->listing_likes_id}}</td>
								<td>
								<img src="{{asset('/storage/file/'.Nam('vv_listings','listing_id',$user->listing_id,'profile_image'))}}">{{Nam('vv_listings','listing_id',$user->listing_id,'listing_name')}}<span>Date : {{dateFormatConverter(Nam('vv_listings','listing_id',$user->listing_id,'listing_cdt'))}}</span>
								</td>
								<td><span class="db-list-rat">{{$review}}</span>
								</td>
								<td><a href="{{route('db-like-listing-delete',['id'=>$user->listing_likes_id])}}"><span class="db-list-edit">Remove</span></a>
								</td>
								<td><a href="{{route('all-listinged',['id'=>$user->listing_id])}}" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
                            @endforeach
						
						</tbody>
					</table>
				</div>
			</div>
			<!--RIGHT SECTION-->
		
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