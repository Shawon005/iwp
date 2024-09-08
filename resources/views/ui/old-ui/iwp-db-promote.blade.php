@extends('ui.old-ui.master.master')
@section('content')

	<!-- START -->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Listing promotions</span>
				<div class="ud-cen-s2">
					@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Promotions</h2>
					<a href="{{route('add-promote')}}" class="db-tit-btn">Start new promotions</a>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Listing name</th>
								<th>Start date</th>
								<th>End date</th>
								<th>Duration</th>
								<th>Status</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach($listing as $user)
							<tr>
							<td>{{$user->listing_id}}</td>
							<td>{{$user->listing_name}}</td>
                           @php 
                             $current_date=time();
                             $start_date=strtotime($user->start_date);
                             $end_date=strtotime($user->end_date);
                             $val=0;
                             $du=$end_date-$start_date;
                             if($current_date>=$end_date){
                              $val=1;
                             }
                             else{
                              $val=0;
                             }

                             @endphp
                           <td>{{dateFormatConverter($user->start_date)}}</td>
                           <td>{{dateFormatConverter($user->end_date)}}</td>
                           <td>{{$du/24/60/60}}</td>
                          <td>

                             @if($val==0)
                             <a class="btn-sm btn-info" href="">Active</a>
                             @else
                             <a class="btn-sm btn-danger"href="">Expire</a>
                             @endif
								</td>
								<td>
									<a href="{{route('user_promotion_delete',['id'=>$user->listing_id])}}"> <span style="background-color: #f33d45;" class="db-list-ststus"> Delete </span>
									</a>
								</td>
							</tr>
							@endforeach
							
							<!-- <tr>
								<td>4</td>
								<td>
									<img src="images/listings/432063dffe1d6-e6c7-4bc8-a563-0e5687c5fe12.jpeg">phoenix mall <span>13, Mar 2021</span>
								</td> -->
								<!--                            <td><span class="db-list-ststus">Listing</span></td>-->
								<!-- <td>26, Mar 2021</td>
								<td>27, Mar 2021</td>
								<td>1 Days</td>
								<td><span class="db-list-ststus">Expired                                    </span>
									</br>
									</br>
									<a href="promote-business.html?code=LIST392&&type=listing"> <span style="background-color: #4caf50;" class="db-list-ststus"> Activate                             </span>
									</a>
								</td>
								<td>
									<a href="promotion_trash?trash=X3BR1GX3E6S4PPLDNTXA6RVUN4UZZI30O6NC8AT40BQRIEKF67NSOE0PEPFU6RVUN4UZZI30O6NC8AT4X3BR1GX3E6S4PPLDNTXAFBQXCPEGZIP3UXDVYKPV&&code=98&&type=listing&&trashh=X3BR1GX3E6S4PPLDNTXA6RVUN4UZZI30O6NC8AT40BQRIEKF67NSOE0PEPFU6RVUN4UZZI30O6NC8AT4X3BR1GX3E6S4PPLDNTXAFBQXCPEGZIP3UXDVYKPV"> <span style="background-color: #f33d45;" class="db-list-ststus"> Delete </span>
									</a>
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>
									<img src="images/listings/72048pexels-francesco-ungaro-96444-(1).jpg">Core real estates <span>11, Mar 2021</span>
								</td> -->
								<!--                            <td><span class="db-list-ststus">Listing</span></td>-->
								<!-- <td>11, Mar 2021</td>
								<td>29, Mar 2021</td>
								<td>18 Days</td>
								<td><span class="db-list-ststus">Expired                                    </span>
									</br>
									</br>
									<a href="promote-business.html?code=LIST389&&type=listing"> <span style="background-color: #4caf50;" class="db-list-ststus"> Activate                             </span>
									</a>
								</td>
								<td>
									<a href="promotion_trash?trash=X3BR1GX3E6S4PPLDNTXA6RVUN4UZZI30O6NC8AT40BQRIEKF67NSOE0PEPFU6RVUN4UZZI30O6NC8AT4X3BR1GX3E6S4PPLDNTXAFBQXCPEGZIP3UXDVYKPV&&code=97&&type=listing&&trashh=X3BR1GX3E6S4PPLDNTXA6RVUN4UZZI30O6NC8AT40BQRIEKF67NSOE0PEPFU6RVUN4UZZI30O6NC8AT4X3BR1GX3E6S4PPLDNTXAFBQXCPEGZIP3UXDVYKPV"> <span style="background-color: #f33d45;" class="db-list-ststus"> Delete </span>
									</a>
								</td>
							</tr> -->
							 <!-- <tr>
								<td>6</td>
								<td>
									<img src="images/listings/72048pexels-francesco-ungaro-96444-(1).jpg">Core real estates <span>11, Mar 2021</span>
								</td> -->
								<!--                            <td><span class="db-list-ststus">Listing</span></td>-->
								<!-- <td>11, Mar 2021</td>
								<td>19, Mar 2021</td>
								<td>8 Days</td>
								<td><span class="db-list-ststus">Expired                                    </span>
									</br>
									</br>
									<a href="promote-business.html?code=LIST389&&type=listing"> <span style="background-color: #4caf50;" class="db-list-ststus"> Activate                             </span>
									</a>
								</td>
								<td>
									<a href="promotion_trash?trash=X3BR1GX3E6S4PPLDNTXA6RVUN4UZZI30O6NC8AT40BQRIEKF67NSOE0PEPFU6RVUN4UZZI30O6NC8AT4X3BR1GX3E6S4PPLDNTXAFBQXCPEGZIP3UXDVYKPV&&code=96&&type=listing&&trashh=X3BR1GX3E6S4PPLDNTXA6RVUN4UZZI30O6NC8AT40BQRIEKF67NSOE0PEPFU6RVUN4UZZI30O6NC8AT4X3BR1GX3E6S4PPLDNTXAFBQXCPEGZIP3UXDVYKPV"> <span style="background-color: #f33d45;" class="db-list-ststus"> Delete </span>
									</a>
								</td>
							</tr> -->
						</tbody>
					</table>
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
	