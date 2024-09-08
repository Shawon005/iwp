
@extends('main.master')
@section('content')

<!-- END -->
<section class=" login-reg">
    <div class="container">
        <div class="row">
            <div class="login-main add-list  buy-poin">
                <div class="log-bor">&nbsp;</div>
                <span class="steps">Buy Points</span>
                <div class="log">
                    <div class="login">
                        <h4>Hi, Rn53 Themes!!!</h4>
                                                <form name="buy_points_form" id="buy_points_form" method="post"
                              action="new_buy_points_insert.html" enctype="multipart/form-data">
                            <input id="all_cost" name="all_cost" type="hidden" class="form-control">
                            <input id="cost_per_point" name="cost_per_point" value="1" type="hidden" class="form-control">
                            <input id="cost_symbol" name="cost_symbol" value="$" type="hidden" class="form-control">
                            <!--FILED START-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="notes"> Your Existing Points - 60 | Cost of 1 point = $1</p>
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
                                                                                <div class="radi-v4">
                                            <input type="radio" id="paymentpaypal" value="1"
                                                   name="payment" checked='checked'>
                                            <label for="paymentpaypal">PayPal</label>
                                        </div>
                                                                                                                            <div class="radi-v4">
                                            <input type="radio" id="paymentstripe" value="2"
                                                   name="payment" >
                                            <label for="paymentstripe">Stripe</label>
                                        </div>    
                                                                                                                                <div class="radi-v4">
                                            <input type="radio" id="payment_razor_pay" value="3"
                                                   name="payment" >
                                            <label for="payment_razor_pay">Razor Pay</label>
                                            </div>    
                                                                                                                            <div class="radi-v4">
                                            <input type="radio" id="payment_paytm" value="4"
                                                   name="payment" >
                                            <label for="payment_paytm">Paytm</label>
                                        </div>    
                                            
                                    </div>
                                </div>

                            </div>

                            <button type="submit" id="buy_points_submit" name="buy_points_submit" class="btn btn-primary">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END PRICING DETAILS-->
<!-- START -->

<span class="btn-ser-need-ani">Help & Support</span>

<div class="ani-quo-form">
    <i class="material-icons ani-req-clo">close</i>
    <div class="tit">
        <h3>What service do you need? <span>BizBook will help you</span></h3>
    </div>
    <div class="hom-col-req">
        <div id="home_slide_enq_success" class="log"
             style="display: none;">
            <p>Your Enquiry Is Submitted Successfully!!!</p>
        </div>
        <div id="home_slide_enq_fail" class="log" style="display: none;">
            <p>Something Went Wrong!!!</p>
        </div>
        <div id="home_slide_enq_same" class="log" style="display: none;">
            <p>You cannot make enquiry on your own listing</p>
        </div>
        <form name="home_slide_enquiry_form" id="home_slide_enquiry_form" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control"
                   name="listing_id"
                   value="0"
                   placeholder=""
                   required>
            <input type="hidden" class="form-control"
                   name="listing_user_id"
                   value="0"
                   placeholder=""
                   required>
            <input type="hidden" class="form-control"
                   name="enquiry_sender_id"
                   value=""
                   placeholder=""
                   required>
            <input type="hidden" class="form-control"
                   name="enquiry_source"
                   value="Website"
                   placeholder=""
                   required>
            <div class="form-group">
                <input type="text" name="enquiry_name" value="" required="required" class="form-control"
                       placeholder="Enter name*">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter email*" required="required" value=""
                       name="enquiry_email"
                       pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                       title="Invalid email address">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="" name="enquiry_mobile"
                       placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}"
                       title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required="">
            </div>
            <div class="form-group">
                <select name="enquiry_category" id="enquiry_category" class="form-control">
                    <option value="">Select Category</option>
                                            <option
                            value="19">Wedding halls</option>
                                                <option
                            value="18">Hotel & Food</option>
                                                <option
                            value="17">Pet shop</option>
                                                <option
                            value="16">Digital Products</option>
                                                <option
                            value="15">Spa and Facial</option>
                                                <option
                            value="10">Real Estate</option>
                                                <option
                            value="8">Sports</option>
                                                <option
                            value="7">Education</option>
                                                <option
                            value="6">Electricals</option>
                                                <option
                            value="5">Automobiles</option>
                                                <option
                            value="3">Transportation</option>
                                                <option
                            value="2">Hospitals</option>
                                                <option
                            value="1">Hotels And Resorts</option>
                                        </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="enquiry_message"
                          placeholder="Enter your query or message"></textarea>
            </div>
            <input type="hidden" id="source">
            <button type="submit" id="home_slide_enquiry_submit" name="home_slide_enquiry_submit"
                    class="btn btn-primary">Submit Requirements
            </button>
        </form>
    </div>
</div>
<!-- END -->
@endsection
<!-- START -->
