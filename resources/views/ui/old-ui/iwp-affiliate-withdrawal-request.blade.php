@extends('ui.old-ui.master.master2')
@section('content')
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class="login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list posr">
					<div class="log-bor">&nbsp;</div> <span class="udb-inst">WITHDRAWAL REQUEST</span>
					<div class="log log-1">
						<div class="login">
							<h4>Withdrawal Request</h4>
							<p style="color: #F44336; padding: 10px; background: #EEE4E8;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg> Available balance to withdrawal: ₹ <b>{{user_amount()}}</b>   , minimum withdrawal request is ₹ <b>{{Nam('vv_footer','footer_id',1,'minimum_withdrawal_amount')}}</b></p>
							<!-- <p>Hi Rn53 Themes,</br>Your Current Plan <b>Premium Plus</b>
								</br>Expiration date 26, Mar 2031</p> -->
								@if(session('message'))
									<div class="alert alert-danger">
										<span class="close" data-dismiss="alert"></span>
										<strong>{{session('message')}}</strong>
									</div>
								@endif    
							<form name="withdraw_request" id="withdraw_request" method="post" enctype="multipart/form-data" action="{{route('user_request_store')}}">
								@csrf
								<input type="hidden" name="wallet_balance" class="form-control" value="{{user_amount()}}" required="">
                                <input type="hidden" name="minimum_withdrawal_amount" class="form-control" value="{{Nam('vv_footer','footer_id',1,'minimum_withdrawal_amount')}}" required="">
								<div class="form-group">
									<div class="form-group">
										<label for="withdrawal_amount"></label>
										<input id="withdrawal_amount" name="withdrawal_amount" type="text" required="required" class="form-control" value="" placeholder="Withdrawal amount">
										<div style="font-size: 12px;">Minimum Withdrawal Amount ₹
											<b>{{Nam('vv_footer','footer_id',1,'minimum_withdrawal_amount')}}</b></div>
									</div>
									<div class="form-group">
										<select name="payment_type" required="required" id="payment_type"onchange="payment()" class="form-control">
											<option value="" selected="selected">Choose withdraw method</option>
											<option value="Google Pay">Google Pay</option>
											<option value="Cheque">Cheque</option>
											<option value="Bank">Bank</option>
										</select> 
										<!-- <a href="pricing-details.html" class="frmtip" target="_blank">Plan details</a> -->
									</div>
									<div class="row mb-3" id="withdraw-method-bank-name" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="bank_name" id="bank">
                                                    <option value="">Select Bank*</option>
                                                    @foreach($banks as $bank)
                                                    <option value="{{$bank->BANK}}">{{$bank->BANK}}</option>  
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-ref-no" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="ref_no" class="form-control" placeholder="Ref No" id="ref-no">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-ref-no-mobile" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="ref_no" class="form-control" placeholder="Mobile_Number" id="ref-no">
                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-cheque-no" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="cheque_no" class="form-control" placeholder="Cheque No">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-cheque-date" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="date" name="cheque_date" class="form-control" placeholder="Cheque Date">
                                                  
                                                </div>
                                            </div>
                                        </div>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
							<div class="col-md-12"> <a href="{{route('affiliate-withdrawal-history')}}" class="skip">Go to Withdrawal History &gt;&gt;</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
	@section('js')
<script>
function payment() {
  var x = document.getElementById("payment_type").value;

  if(x=='Google Pay')
  {
    document.getElementById("withdraw-method-ref-no-mobile").style.display="block";
    document.getElementById("withdraw-method-cheque-no").style.display="none"
    document.getElementById("withdraw-method-cheque-date").style.display="none"
    document.getElementById("withdraw-method-bank-name").style.display="none"
    document.getElementById("withdraw-method-ref-no").style.display="none"
  }
  else if(x=='Cheque')
  {
    document.getElementById("withdraw-method-ref-no-mobile").style.display="none";
    document.getElementById("withdraw-method-cheque-no").style.display="block"
    document.getElementById("withdraw-method-cheque-date").style.display="block"
    document.getElementById("withdraw-method-bank-name").style.display="block"
    document.getElementById("withdraw-method-ref-no").style.display="block"
  }
  else if(x=='Bank')
  {
    document.getElementById("withdraw-method-ref-no-mobile").style.display="none";
    document.getElementById("withdraw-method-cheque-no").style.display="none"
    document.getElementById("withdraw-method-cheque-date").style.display="none"
    document.getElementById("withdraw-method-bank-name").style.display="block"
    document.getElementById("withdraw-method-ref-no").style.display="block"
  }
}
</script>
@endsection