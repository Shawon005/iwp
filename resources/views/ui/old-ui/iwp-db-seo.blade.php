@extends('ui.old-ui.master.master')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">SEO Details</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Here you can update Title, descriptions and keywords of all your posts.</h2>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Type</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							@php $no=1; @endphp
							@foreach($listings as $listing)
							<tr>
								<td>{{$no++}}</td>
								<td>
									<img src="{{asset('/storage/file/'.$listing->profile_image)}}"> {{$listing->listing_name}} <span>{{dateFormatConverter($listing->listing_cdt)}}</span>
								</td>
								<td><span class="db-list-ststus">Listing</span>
								</td>
								<td><a href="{{route('db-seo-edit',['type'=>'listing','id'=>$listing->listing_id])}}" class="db-list-edit">Edit</a>
								</td>
							</tr>
							@endforeach
							@foreach($events as $event)
							<tr>
								<td>{{$no++}}</td>
								<td>
									<img src="{{asset('/storage/file/'.$event->event_image)}}"> {{$event->event_name}} <span>{{dateFormatConverter($event->event_cdt)}}</span>
								</td>
								<td><span class="db-list-ststus">Event</span>
								</td>
								<td><a href="{{route('db-seo-edit',['type'=>'event','id'=>$event->event_id])}}" class="db-list-edit">Edit</a>
								</td>
							</tr>
							@endforeach
							@foreach($products as $product)
							<tr>
								<td>{{$no++}}</td>
								<td>
									<img src="{{asset('/storage/file/'.$product->service_image)}}"> {{$product->product_name}} <span>{{dateFormatConverter($product->product_cdt)}}</span>
								</td>
								<td><span class="db-list-ststus">Product</span>
								</td>
								<td><a href="{{route('db-seo-edit',['type'=>'product','id'=>$product->product_id])}}" class="db-list-edit">Edit</a>
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