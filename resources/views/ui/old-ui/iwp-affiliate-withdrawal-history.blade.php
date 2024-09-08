@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">AFFILIATION WITHDRAWAL HISTORY</span>
				<div class="ud-cen-s2">
					<h2>Affiliation Withdrawal History</h2>
					<!-- <a href="add-coupons.html" class="db-tit-btn">Add new Coupon</a> -->
					<ul class="nav nav-tabs">
						<li class="nav-item"> <a class="nav-link " href="{{route('user_product_wallet_pending')}}">Pending</a>
						</li>
						<li class="nav-item"> <a class="nav-link"href="{{route('user_product_wallet_approve')}}">Approved</a>
						</li>
						<li class="nav-item"> <a class="nav-link"  href="{{route('user_product_wallet_rejected')}}">Rejected</a>
						</li>
						<li class="nav-item"> <a class="nav-link"  href="{{route('user_product_wallet_sent')}}">Sent</a>
						</li>
						<li class="nav-item"> <a class="nav-link active"  href="{{route('affiliate-withdrawal-history')}}">All</a>
						</li>
					</ul>
					<div class="">
						<!-- <div id="coupon" class="container tab-pane active">
							<div class="db-coupons">
								<ul>
									<li>
										<div class="db-coup-lhs">
											<div class="coup-box">
												<div class="coup-box-1">
													<div class="s1">
														<div class="lhs">
															<img src="images/user/1.png">
														</div>
														<div class="rhs">
															<h4>Bizbook 50% Off</h4>
														</div>
													</div>
													<div class="s2">
														<div class="lhs"> <span>Expires</span>
															<h6>16, Apr 2021</h6>
															<a href="coupons">Terms &amp; Conditions Apply</a>
														</div>
														<div class="rhs"> <a href="coupons"><span class="get-coup-btn get-coup-act">Get coupon</span></a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="db-coup-rhs">
											<h5>
                                            <b>00</b>
                                            <span>Members access this coupon</span>
                                        </h5>
											<ol>
												<li><b>Start
                                                    date:</b> 08, Apr 2021</li>
												<li><b>Expiry
                                                    date:</b> 16, Apr 2021</li>
												<li><b>Coupon code:</b> Biz50</li>
												<li> <a href="edit-coupon.html">Edit</a>
													<a href="#">Delete</a>
												</li>
											</ol>
										</div>
									</li>
								</ul>
							</div>
						</div> -->
						<div id="" class="container ">
							<table class="responsive-table bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>ORDER No.</th>
										<th>Request Date</th>
										<th>Approved Date</th>
										<th>Payment Date</th>
										<th>Payment Via</th>
										<th>Withdraw amount</th>
										<th>Payment Status</th>
										
									</tr>
								</thead>
								<tbody>
								@foreach($product_wallet as $user)
									<tr>
										<td>{{$user->wallet_transaction_id}}</td>
										<td>{{$user->invoice_no}}</td>
										<td> <span>{{dateFormatConverter($user->request_date)}}</span>
										</td>
										<td> <span>{{dateFormatConverter($user->approved_date)}}</span>
										</td>
										<td>{{dateFormatConverter($user->sent_date)}}</td>
										<td>{{$user->remarks}}</td>
										<td>{{$user->withdraw_amount}}</td>
										<td>{{$user->payment_status}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			
	<!--END PRICING DETAILS-->
	<!-- START -->


@endsection