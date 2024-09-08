
@extends('ui.old-ui.master.master2')
@section('content')
<!-- START -->

<!-- END -->
<section class=" login-reg">
    <div class="container">
        <div class="row">
            <div class="login-main add-list  buy-poin">
                <div class="log-bor">&nbsp;</div>
                <span class="steps">BUY WALLET CASH</span>
                @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                <div class="log">
                    <div class="login">
                        <h4>Hi, {{user(session('user_id'))}}!!!</h4>
                        <!-- <form  method="post"
                              enctype="multipart/form-data">
                              @csrf -->
                            <input id="all_cost" name="all_cost" type="hidden" class="form-control">
                            <input id="cost_per_point" name="cost_per_point" value="{{Nam('vv_footer','footer_id',1,'cost_per_point')}}" type="hidden" class="form-control">
                            <input id="cost_symbol" name="cost_symbol" value="Rs: " type="hidden" class="form-control">
                           
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="notes"> Your Existing Points - {{Nam('vv_users','user_id',session('user_id'),'user_points')}} | Cost of 1 point = Rs:{{Nam('vv_footer','footer_id',1,'cost_per_point')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->

                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Please Enter Points:</label>
                                        <input id="new_points" name="new_points" autocomplete="off" required="required" min="1" type="text" onkeypress="return isNumber(event)" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <h5>Payment Mode</h5>
                                         <!-- <div class="radi-v4">
                                            <input type="radio" id="paymentpaypal" value="1"
                                                   name="payment" checked='checked'>
                                            <label for="paymentpaypal">PayPal</label>
                                        </div>
                                          <div class="radi-v4">
                                            <input type="radio" id="paymentstripe" value="2"
                                                   name="payment" >
                                            <label for="paymentstripe">Stripe</label>
                                        </div>     -->
                                                                                                                                <div class="radi-v4">
                                            <input type="radio" id="payment_razor_pay"checked='checked' value="3"
                                                   name="payment" >
                                            <label for="payment_razor_pay">Razor Pay</label>
                                            </div>    
                                            <!-- <div class="radi-v4">
                                            <input type="radio" id="payment_paytm" value="4"
                                                   name="payment" >
                                            <label for="payment_paytm">Paytm</label>
                                        </div>     -->
                                            
                                    </div>
                                </div>

                            </div>

                            <button type="submit" id="buy_points_submit" name="buy_points_submit"   class="btn btn-primary">Pay Now</button>
                            <!-- <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id')}}"
                                data-amount=1000
                                data-currency="{{Nam('vv_footer','footer_id',1,'admin_razor_pay_currency_code')}}"
                                data-buttontext=''
                                data-name="iwpdirectory.in"
                                data-description="Rozerpay"
                                data-image="{{URL::to('/')}}/storage/file/{{Nam('vv_footer','footer_id',1,'header_logo')}}"
                                data-prefill.name="{{user(session('user_id'))}}"
                                data-prefill.email="{{Nam('vv_users','user_id',session('user_id'),'user_contact_email')}}"
                                data-theme.color="#F37254">
                            </script>  -->

                        <!-- </form> -->
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
        $('#buy_points_submit').on('click', function() {   
              // alert('hello');   
                var SITEURL = '{{URL::to('')}}';
                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                }); 
                var cost ={{Nam('vv_footer','footer_id',1,'cost_per_point')}};
                var totalPoint = $("#new_points").val();
                var totalAmount = $("#new_points").val();
                var totalAmount=totalAmount*cost;
                var options = {
                "key": "{{Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id')}}",
                "amount": (totalAmount*100), // 2000 paise = INR 20
                "name": "iwpdirectory.in",
                "description": "Payment",
                "image": "{{URL::to('/')}}/storage/file/{{Nam('vv_footer','footer_id',1,'header_logo')}}",
                "handler": function (response){
                    window.location.href = SITEURL +'/'+ 'buy_point_request/'+response.razorpay_payment_id+'/'+totalPoint;
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