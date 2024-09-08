@extends('ui.old-ui.master.master')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">AFFILIATE COMMISSION HISTORY</span>
				<div class="ud-cen-s2">
					<h2>Affiliate Commission History</h2>
					<!-- <a href="add-listing-start.html" class="db-tit-btn">Add New Job</a> -->
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Order No.</th>
									<th>User</th>
									<th>Product</th>
									<th>Date</th>
									<th>Commission Amount</th>
									<th>Affiliate Link</th>
								</tr>
							</thead>
							<tbody>
								@foreach($product_wallet as $user)
								<tr>
									<td>{{$user->wallet_transaction_id}}</td>
									<td>{{$user->order_code}}</td>
									<td>
									<img  src="{{asset('/storage/file/'.Nam('vv_users','user_id',$user->user_id,'profile_image'))}}"width="50" height="60"class="rounded-circle" alt="">
							         <br>{{user($user->user_id)}}<br><small>{{dateFormatConverter(Nam('vv_users','user_id',$user->user_id,'user_cdt'))}}<small>
									</td>
									<td><img  src="{{asset('/storage/file/'.Nam('vv_products','product_id',$user->order_lineitem_id,'gallery_image'))}}"width="50" height="60"class="rounded-circle" alt=""><br>
										{{Nam('vv_products','product_id',$user->order_lineitem_id,'product_name')}}
										<br><small>{{dateFormatConverter(Nam('vv_products','product_id',$user->order_lineitem_id,'product_cdt'))}}<small></td>
									<td><span class="db-list-ststus">{{dateFormatConverter($user->request_date)}}</span></td>
									<td align="center"><span class="db-list-ststus">{{$user->commission_amount}}</span>
									</td>
									<td><a href="{{route('product/details_u',['id'=>$user->order_lineitem_id,'ref'=>$user->ref_user_id])}}"><span class="db-list-ststus">View</span></a></td>
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