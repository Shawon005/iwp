@extends('ui.old-ui.master.master2')
@section('content')

	<!-- START -->
	<!--PRICING DETAILS-->
	<section class="login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list posr">
					<div class="log-bor">&nbsp;</div> <span class="udb-inst">plan change</span>
					<div class="log log-1">
						<div class="login">
						@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<h4>Change my plan</h4>
							<p>{{user(session('user_id'))}},</br>Your Current Plan <b>{{Nam('vv_plan_type','plan_type_id',Nam('vv_users','user_id',session('user_id'),'user_plan'), 'plan_type_name')}}</b>
								</br>Expiration date {{dateSum(Nam('vv_users','user_id',session('user_id'),'user_cdt'),Nam('vv_plan_type','plan_type_id',Nam('vv_users','user_id',session('user_id'),'user_plan'),'plan_type_duration'))}}</p>

							
							    <div class="form-group">
									<div class="form-group">
										<select name="user_plan" required="required" id="user_plan" class="form-control">
											<option value="" selected="selected">Choose your plan</option>
											@foreach($plan as $user):
												@if(Nam('vv_users','user_id',session('user_id'),'user_plan')<=$user->plan_type_id)
											<option value="{{$user->plan_type_id}}" >{{$user->plan_type_name}}-{{$user->plan_type_price}}/Year</option>
											@endif
											@endforeach
										</select> <a href="{{route('pricing-details')}}" class="frmtip" target="_blank">Plan details</a>
									</div>
								</div>
								<button type="submit" name="plan_type_submit" id="plan_type_submit" class="btn btn-primary">Change</button>
						
							<div class="col-md-12"> <a href="{{route('user/dasboard')}}" class="skip">Go to User Dashboard &gt;&gt;</a>
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
   
    $( document ).ready(function() {
        // $(document).on('click', '#buy_points_submit', function(e) {
        //     e.preventDefault();

        //     var totalAmount = $(this).attr("data-amount");

        //     console.log(totalAmount);
        // });
        $('#plan_type_submit').on('click', function() {   
              // alert('hello');   
                var SITEURL = '{{URL::to('')}}';
                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                }); 
                
                var plan = $("#user_plan").val();
				

				if(plan==1){
					window.location.href = '/plan_store';
					var cost ={{Nam('vv_plan_type','plan_type_id',1, 'plan_type_price')}};
					
				}
				else if(plan==2){
					var cost ={{Nam('vv_plan_type','plan_type_id',2, 'plan_type_price')}};
				}
				else if(plan==3){
					var cost ={{Nam('vv_plan_type','plan_type_id',3, 'plan_type_price')}};
				}
				else{
					var cost ={{Nam('vv_plan_type','plan_type_id',4, 'plan_type_price')}};
				}
                
                var options = {
                "key": "{{Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id')}}",
                "amount": (cost*100), // 2000 paise = INR 20
                "name": "iwpdirectory.in",
                "description": "Payment",
                "image": "{{URL::to('/')}}/storage/file/{{Nam('vv_footer','footer_id',1,'header_logo')}}",
                "handler": function (response){
                window.location.href = SITEURL +'/'+ 'plan_store/'+response.razorpay_payment_id+'/'+plan;
                },
                "prefill": {
                "contact": '',
                "email":   '{{Nam('vv_users','user_id',session('user_id'),'user_contact_email')}}',
                },
                "theme": {
                "color": "#F37254"
                }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();
                
                            
            // var dataVal = $("#buy_points_submit").data('amount');
            // $('#buy_points_submit').data('amount',new_points);
            // var dataVal = $("#buy_points_submit").data('amount');
             
            // alert(dataVal);
            
            // $('#buy_points_submit').data('amount',totcost);
            // console.log($("#buy_points_submit").data("amount"));
            // $("#buy_points_submit").text(button_msg);
            
            // $("#all_cost").val(totcost);
        });
    });

    
    
</script>
@endsection