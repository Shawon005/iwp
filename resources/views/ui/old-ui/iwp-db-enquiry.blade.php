@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Leads</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Enquiry Details</h2>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Message</th>
								<th>Page Name</th>
								<th>Tracking-id</th>
								<th>URL</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach($listing as $user)
							<tr>
								<td>{{$user->enquiry_id}}</td>
								<td>{{$user->enquiry_name}}</td>
								<td>{{$user->enquiry_email}}</td>
								<td>{{$user->enquiry_mobile}}</td>
								<td>{{$user->enquiry_message}}</td>
								<td>{{(($user->listing_id!=null)?'Listing':(($user->event_id!=null)?'Event':'product'))}}</td>
								<td>{{$user->enquiry_source}}</td>
								<td><a href="{{(($user->listing_id!=null)?"/all-listings/$user->listing_id":(($user->event_id!=null)?"/event/details/$user->event_id":"products/$user->product_id"))}}"><span class="db-list-rat">Viwe Page</span></a></td>
								
								
								<td><a href="{{route('db-enquiry-delete',['id'=>$user->enquiry_id])}}" class="db-list-edit">Delete</a>
								</td>
							</tr>
							@endforeach
							
							<!-- <tr>
								<td>3</td>
								<td>johnyyy <span>20, Jun 2020</span>
								</td>
								<td>johnitsmes@gmail.com</td>
								<td>78658765</td>
								<td>Hi get quote test</td>
								<td>Beach luxury villa gardens</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST267</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=184" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>johnyyy <span>20, Jun 2020</span>
								</td>
								<td>johnitsmes@gmail.com</td>
								<td>78658765</td>
								<td>Hi get quote message</td>
								<td>Beach luxury villa gardens</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST267</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=183" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>jelotesan <span>16, Jun 2020</span>
								</td>
								<td>angelsanchezprat@gmail.com</td>
								<td>666111666</td>
								<td>fh</td>
								<td>Premium gardens</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST268</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=180" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>6</td>
								<td>jelotesan <span>16, Jun 2020</span>
								</td>
								<td>angelsanchezprat@gmail.com</td>
								<td>666111666</td>
								<td>gffb</td>
								<td>Premium gardens</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST268</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=179" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Leland K Cotter <span>22, May 2020</span>
								</td>
								<td>cotter@business.com</td>
								<td>9255886632</td>
								<td>BGHGBHGB</td>
								<td>Premium gardens</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST268</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=151" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>8</td>
								<td>Leland K Cotter <span>22, May 2020</span>
								</td>
								<td>cotter@business.com</td>
								<td>9255886632</td>
								<td>VBGBGTBGB</td>
								<td>Premium gardens</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST268</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=150" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>9</td>
								<td>Leland K Cotter <span>22, May 2020</span>
								</td>
								<td>cotter@business.com</td>
								<td>9255886632</td>
								<td>DFVCFVRGFV</td>
								<td>Premium gardens</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST268</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=149" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>10</td>
								<td>Leland K Cotter <span>02, May 2020</span>
								</td>
								<td>cotter@business.com</td>
								<td>9255886632</td>
								<td>dfsdgfsdfgfsd</td>
								<td>Benz cars showroom</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST238</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=136" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>11</td>
								<td>Leland K Cotter <span>02, May 2020</span>
								</td>
								<td>cotter@business.com</td>
								<td>9255886632</td>
								<td>svvsdfgsdg</td>
								<td>Benz cars showroom</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST238</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=135" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>12</td>
								<td>Leland K Cotter <span>28, Apr 2020</span>
								</td>
								<td>cotter@business.com</td>
								<td>9255886632</td>
								<td>hey give me</td>
								<td>Smart Digital Products</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST129</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=132" class="db-list-edit">Delete</a>
								</td>
							</tr>
							<tr>
								<td>13</td>
								<td>Leland K Cotter <span>26, Apr 2020</span>
								</td>
								<td>cotter@business.com</td>
								<td>9255886632</td>
								<td></td>
								<td>Benz cars showroom</td>
								<td>Website</td>
								<td>listing-details?src=Website&&code=LIST238</td>
								<td><a href="enquiry_trash.html?messageenquirymessageenquirymessageenquirymessageenquiry=129" class="db-list-edit">Delete</a>
								</td>
							</tr> -->
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