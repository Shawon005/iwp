@extends('ui.old-ui.master.master')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">MY SERVICE BOOKINGS</span>
				<div class="ud-cen-s2">
					<!-- <h2>Listing Details</h2> -->
					<div class="text-center pb-4">
                		<input type="text" id="myInput" placeholder="Search this page..">
            		</div>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Expert Profile</th>
									<th>Enquirer Name</th>
									<th>Enquiry Details</th>
									<!--									<th>Expiry on</th>-->
									<th>Message</th>
									<th>Status</th>
									<th>Manage</th>
									<!-- <th>Edit</th> -->
									<th>Delete</th>
									<!--                                    <th>-->
									<!--</th>-->
									<!-- <th>Preview</th> -->
								</tr>
							
							</thead>
							<tbody>
								@foreach($expert as $user)
								<tr>
									<td>{{$user->enquiry_id}}</td>
									<td>
										<img src="{{asset('/storage/file/'.Nam('vv_experts','expert_id',$user->expert_id,'profile_image'))}}">{{Nam('vv_experts','expert_id',$user->expert_id,'profile_name')}}<span>Date : {{dateFormatConverter(Nam('vv_experts','expert_id',$user->expert_id,'expert_cdt'))}}</span>
									</td>
									<td>{{$user->enquiry_name}}</td>
									<td>Phone:{{$user->enquiry_mobile}}<br>
										Email:{{$user->enquiry_email}}<br>
										Address:{{$user->enquiry_location}}<br>
										Preferred date:{{dateFormatConverter($user->appointment_date)}}<br>
										Preferred time:{{$user->appointment_time}}
									</td>
									<td>{{$user->enquiry_message}}</td>
									<?php
									$status='Cancel';
									if($user->enquiry_status==300) {
									   $status="On the way";}
									if($user->enquiry_status==400) {
									  $status="Pending";}
									if($user->enquiry_status==500) {
									  $status="Done";}
									if($user->enquiry_status==200) {
									   $status="New" ;  }
									?>							
									<td><span class="db-list-rat">{{$status}}</span>
									</td>
									</td>
									<!--									<td><span class="db-list-ststus">8 June 2020</span></td>-->
									<td><a href="{{route('booking_expert',['id'=>$user->enquiry_id])}}"><span class="db-list-ststus">
										Manage</span></a>
									</td>
									<!-- <td><a href="edit-listing-step-1.html?row=LIST395" class="db-list-edit">Edit</a>
									</td> -->
									<td><a href="{{route('db-enquiry-delete',['id'=>$user->enquiry_id])}}" class="db-list-edit">Delete</a>
									</td>
									<!--									<td><a href="promote-business.html?code=-->
									<!--&&type=listing" class="db-list-edit">-->
									<!--</a></td>-->
									<!-- <td><a href="listing/test6" class="db-list-edit" target="_blank">Preview</a>
									</td> -->
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