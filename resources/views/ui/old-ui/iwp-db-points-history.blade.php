@extends('ui.old-ui.master.master')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">POINTS HISTORY</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Points History</h2>
					<a href="{{route('buy-point')}}" class="db-tit-btn">Buy More Wallet Cash</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Purchase date</th>
									<th>Wallet Cash</th>
									<th>Total Cost</th>
									<!--									<th>Expiry on</th>-->
									<!-- <th>Status</th> -->
									<!-- <th>Edit</th> -->
									<th>Delete</th>
									<!--                                    <th>-->
									<!--</th>-->
									<!-- <th>Preview</th> -->
								</tr>
							</thead>
							<tbody>
								@php $point=sub('vv_all_points_enquiry','user_id',session('user_id')); $No=1; @endphp 
								@foreach($point as $user)
								<tr>
									<td>{{$No++}}</td>
									<td>
										{{dateFormatConverter($user->all_points_cdt)}}
									</td>
									<td><span class="db-list-rat">{{$user->new_points}}</span>
									</td>
									<td><span class="db-list-rat">{{$user->total_cost}}</span>
									</td>
									<!--									<td><span class="db-list-ststus">8 June 2020</span></td>-->
									<!-- <td><span class="db-list-ststus">Active</span>
									</td> -->
									<!-- <td><a href="edit-listing-step-1.html?row=LIST395" class="db-list-edit">Edit</a>
									</td> -->
									<td><a href="{{route('point_delete',['id'=>$user->all_points_enquiry_id])}}" class="db-list-edit">Delete</a>
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