@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">All EVENTS</span>
				<div class="ud-cen-s2">
					<h2>EVENTS Details</h2>
					@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<a href="{{route('add_event')}}" class="db-tit-btn">Add New EVENTS</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Event Name</th>
									<th>Event date</th>
									<!-- <th></th> -->
									<!--									<th>Expiry on</th>-->
									<th>VIEW</th>
									<th>Edit</th>
									<th>Delete</th>
									<!--                                    <th>-->
									<!--</th>-->
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
							 @foreach($event as $user)
								<tr>
									<td>{{$user->event_id}}</td>
									<td>{{$user->event_name}}</td>
									<td>{{dateFormatconverter($user->event_start_date)}}</td>
									<td>{{CountCol('vv_page_views','event_id',$user->event_id)}}</td>
									</td>
									<td><a href="{{route('edit-event',['id'=>$user->event_id])}}" class="db-list-edit">Edit</a>
									</td>
									<td><a href="{{route('delete-event',['id'=>$user->event_id])}}" class="db-list-edit">Delete</a>
									</td>
									<!--									<td><a href="promote-business.html?code=-->
									<!--&&type=listing" class="db-list-edit">-->
									<!--</a></td>-->
									<td><a href="{{route('event/details',['id'=>$user->event_id])}}" class="db-list-edit" target="_blank">Preview</a>
									</td>
								</tr>
								@endforeach
								 
							</tbody>
						</table>
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