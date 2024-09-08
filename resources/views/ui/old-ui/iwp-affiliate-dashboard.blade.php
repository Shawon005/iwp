
@extends('ui.old-ui.master.master')
@section('content')
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<!-- <div class="log-bor">&nbsp;</div> <span class="udb-inst">User Dashboard</span> -->
				<div class="cd-cen-intr">
					<div class="cd-cen-intr-inn">
						<h2>Welcom back, <b>{{$admin}}</b></h2>
						<p>Current Product Affiliate Wallet balance</p>
						<h1>₹ {{sprintf("%02d",$amount)}}</h1>
					</div>
				</div>
				<div class="ud-notes" style="font-weight: bold;">
		            <span style="background-color: #f44336; color: #FFF;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z"></path></svg></span>
		            &nbsp;Product Affiliation &amp; Wallet

		            <a href="affiliate-withdrawal-request" class="cta" style="color: #fff; font-size: 11px; padding: 8px 25px; border-radius: 20px; font-weight: 400; text-transform: uppercase; display: inline-block; background: #F44336; float: right;">Withdraw Request</a>
		            <div style="clear: both;"></div>
		        </div>
				<div class="ud-cen-s1">
				<ul>
						<li>
							<div> <b>{{$Pending}}</b>
								<h4>Pending</h4>
								<p>Withdrawal Request...</p> <a href="{{route('user_product_wallet_pending')}}">&nbsp;</a>
							</div>
						</li>
						<li>
							<div> <b>{{$Received}}</b>
								<h4>Received</h4>
								<p>Withdrawal Request...</p> <a href="{{route('user_product_wallet_sent')}}">&nbsp;</a>
							</div>
						</li>
						<li>
							<div> <b>{{$Rejected}}</b>
								<h4>Rejected</h4>
								<p>Withdrawal Request...</p> <a href="{{route('user_product_wallet_rejected')}}">&nbsp;</a>
							</div>
						</li>
					</ul>
				</div>
			
			</div>
	
@endsection