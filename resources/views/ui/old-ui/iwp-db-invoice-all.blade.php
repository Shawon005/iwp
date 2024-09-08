@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->


			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Invoices</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<h2>Payment Invoices</h2>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Payment date</th>
								<th>Amount</th>
								<th>Download</th>
							</tr>
						</thead>
						<tbody>
							@php $no=1; @endphp
					    	@foreach($payment as $user)
							<tr>
							    <td>{{$no++}}</td>
								<td>{{Nam('vv_plan_type','plan_type_id',$user->plan_type_id,'plan_type_name')}}</td>
								<td>{{dateFormatConverter($user->transaction_cdt)}}</td>
								<td><span class="db-list-rat">Rs:{{$user->transaction_amount}} {{$user->transaction_currency}}</span>
								</td>
								<!-- <td><a href="images/invoices/66625invoice-(4).pdf" download="Rn53 Themes-Invoice-1577556969" class="db-invo-dwn">Download Invoice</a>
								</td> -->
								<td>Invoice N/A</td>
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