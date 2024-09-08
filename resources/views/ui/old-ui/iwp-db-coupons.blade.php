@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Coupons</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Coupons</h2>
					<a href="{{route('add-coupon')}}" class="db-tit-btn">Add new Coupon</a>
					<ul class="nav nav-tabs">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#coupon">All Coupon Details</a>
						</li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#couponacc">Coupon used members</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="coupon" class="container tab-pane active">
						
							<div class="db-coupons">
								<ul>
								@foreach($coupons as $coupon)
									<li>
										<div class="db-coup-lhs">
											<div class="coup-box">
												<div class="coup-box-1">
													<div class="s1">
														<div class="lhs">
															<img src="{{asset('/storage/file/'.$coupon->coupon_photo)}}">
														</div>
														<div class="rhs">
															<h4>{{$coupon->coupon_name}}</h4>
														</div>
													</div>
													<div class="s2">
														<div class="lhs"> <span>Expires</span>
															<h6>{{dateFormatConverter($coupon->coupon_end_date)}}</h6>
															<a href="terms">Terms &amp; Conditions Apply</a>
														</div>
														<div class="rhs"> <span class="get-coup-btn get-coup-act">Get coupon</span>
														</div>
													</div>
												</div>
												<div class="coup-box-2">
													<h4>Congratulations!</h4>
													<p>Here the code for <b>{{$coupon->coupon_name}}</b></p>
													<i>{{$coupon->coupon_code}}</i>
																								<a target="_blank"
														href="{{$coupon->coupon_link}}/">Website</a>
													<span class="coup-back">Back</span>
												</div>
											</div>
										</div>
										@php $users=arr($coupon->coupon_use_members); @endphp
										<div class="db-coup-rhs">
											<h5>
                                            <b>{{sprintf("%02d",count($users)-1)}}</b>
                                            <span>Members access this coupon</span>
                                        </h5>
											<ol>
												<li><b>Start
                                                    date:</b>  {{dateFormatConverter(now())}}</li>
												<li><b>Expiry
                                                    date:</b> {{dateFormatConverter($coupon->coupon_end_date)}}</li>
												<li><b>Coupon code:</b>{{$coupon->coupon_code}}</li>
												<li> <a href="{{route('db-coupon-edit',['id'=>$coupon->coupon_id])}}">Edit</a>
													<a href="{{route('coupon_delete',['id'=>$coupon->coupon_id])}}">Delete</a>
												</li>
											</ol>
												
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
						<div id="couponacc" class="container tab-pane">
							<table class="responsive-table bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Coupon name</th>
										<th>Profile</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									@php $no=1; @endphp
									@foreach($coupons as $coupon)
									
									@php $users=arr($coupon->coupon_use_members); @endphp
									@foreach($users as $user)
									@if($user!='')
									<tr>
										<td>{{$no++}}</td>
										<td> {{user($user)}}<br><span>{{dateFormatConverter(Nam('vv_users','user_id',$user,'user_cdt'))}}</span>
										</td>
										<td>{{Nam('vv_users','user_id',$user,'email_id')}}</td>
										<td>{{Nam('vv_users','user_id',$user,'mobile_number')}}</td>
										<td>{{$coupon->coupon_name}}</td>
										<td><a href="{{route('profile',['id'=>$user])}}" target="_blank" class="db-list-edit">View</a>
										</td>
										<td><a href="{{route('coupon_delete',['id'=>$coupon->coupon_id])}}" class="db-list-edit">Delete</a>
										</td>
									</tr>
									@endif
									@endforeach
									
									@endforeach
                                    <!-- <tr>
										<td>2</td>
										<td> <span>01, Jan 1970</span>
										</td>
										<td></td>
										<td></td>
										<td>Amazes 50% Off</td>
										<td><a href="profile.html" target="_blank" class="db-list-edit">View</a>
										</td>
										<td><a href="#" class="db-list-edit">Delete</a>
										</td>
									</tr>
                                    <tr>
                                        <td>2</td>
										<td> <span>01, Jan 1970</span>
										</td>
										<td></td>
										<td></td>
										<td>Bizbook 50% Off</td>
										<td><a href="profile.html" target="_blank" class="db-list-edit">View</a>
										</td>
										<td><a href="#" class="db-list-edit">Delete</a>
										</td>
									</tr> -->
								</tbody>
							</table>
						</div>
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
@section('js')
<script>
    $(document).ready(function () {
        $(".get-coup-act").click(function () {
            $(this).parent().parent().parent().parent().addClass("act");

            var coupon_id = $(this).attr("data-id");
            $.ajax({
                type: 'POST',
                url: 'coupon_view_process.php',
                cache: false,
                data: {coupon_id: coupon_id},
                success: function (response) {
                    return true;

                }
            });

        });
        $(".coup-back").click(function () {
            $(this).parent().parent().removeClass("act");
        });
        $("#tail-se").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#tail-re li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection