
@extends('main.master')
@section('content')
    <!-- START -->
<section class=" coup-sec">
    <div class="plac-hom-ban coup-hom-ban">
        <div class="container">
            <div class="row">
                <div class="plac-hom-ban-inn">
                    <h1>Razorpay Payment</h1>
                    <p>Your Registration Will Pending For Payment.</p>
                    <div class="coup-sec-log">
                        <h4>Please Pay Your Plan Amount</h4>
                          <h3>Your Plan : {{Nam('vv_plan_type','plan_type_id',$id,'plan_type_name')}}</h3>
                          <h4>Amount: {{Nam('vv_plan_type','plan_type_id',$id,'plan_type_price')}}</h4>
                          <!-- id="login_form" name="login_form" method="POST" action="{{route('payment_store',['id'=>$user_id])}}"
                          name="razor_pay_dash_form" id="razor_pay_dash_form" method="post"
                                                action="{{route('add_payment')}} -->
                        <form name="razor_pay_dash_form" id="razor_pay_dash_form" method="post" action="{{route('payment_store',['id'=>$user_id])}}">
                            @csrf
                            <input type="hidden" name="" id="">
                            <button type="submit" name="register_submit" 
                                class="btn btn-primary">Pay Now</button>
                                <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id')}}"
                                data-amount="{{Nam('vv_plan_type','plan_type_id',$id,'plan_type_price')*100}}"
                                data-currency="{{Nam('vv_footer','footer_id',1,'admin_razor_pay_currency_code')}}"
                                data-buttontext=''
                                data-name="iwpdirectory.in"
                                data-description="Rozerpay"
                                data-image="{{URL::to('/')}}/storage/file/{{Nam('vv_footer','footer_id',1,'header_logo')}}"
                                data-prefill.name=""
                                data-prefill.email=""
                                data-theme.color="#F37254">
                            </script>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>    
@endsection  