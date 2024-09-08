@extends('ui.old-ui.master.master')
@section('content')

	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">My Order</span>
				<div class="ud-cen-s2">
					<h2>My Order</h2>
					<!-- <a href="add-listing-start.html" class="db-tit-btn">Add New Listing</a> -->
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Order No</th>
									<th>Status</th>
									<th>Order Amount</th>
									<!--									<th>Expiry on</th>-->
									<th>Order Date</th>
									<th>Action</th>
									<th>View</th>
									<!-- <th>Delete</th> -->
									<!--                                    <th>-->
									<!--</th>-->
									<!-- <th>Preview</th> -->
								</tr>
							</thead>
							<tbody>
								@php $no=1;@endphp
							   @foreach($order as $user)
							    <tr>
									<td>{{$no++}}</td>
									<td>{{$user->order_id}}</td> 
									<!-- <td><span class="db-list-rat">0</span>
									</td> -->
									<!-- <td><span class="db-list-rat">1</span>
									</td> -->
									<!--									<td><span class="db-list-ststus">8 June 2020</span></td>-->
									<td><span class="db-list-ststus">{{$user->order_status}}</span>
									</td>
									<!-- <td><a href="edit-listing-step-1.html?row=LIST395" class="db-list-edit">Edit</a>
									</td> -->
									<td>Rs.{{amount($user->order_id)}}</td>
									<!-- <td><a href="delete-listing?row=LIST395" class="db-list-edit">Delete</a>
									</td> -->
									<td>{{dateFormatConverter($user->order_placed_on)}}</td>
									<!--									<td><a href="promote-business.html?code=-->
									<!--&&type=listing" class="db-list-edit">-->
									<!--</a></td>-->
									<td><a href="{{route('order-viwe',['id'=>$user->order_id])}}" class="db-list-edit" target="_blank">View</a>
									</td>
									@if($user->order_cancel)
									<td><span class="db-list-ststus ">Cancel</span></td>
									@else
									<td><a href="{{route('order.delete',['id'=>$user->order_id])}}" class="db-list-edit" >Delete</a></td>
									@endif
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
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