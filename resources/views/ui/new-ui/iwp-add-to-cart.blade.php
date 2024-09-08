<?php
use Illuminate\Support\Facades\URL;
?>
    <!-- END -->
@extends('main.master')
@section('content')
    <!-- START -->
    <section>
        <div class="all-list-bre all-pro-bre">
            <div class="container sec-all-list-bre">
                <div class="row">
                                        <h1>All Categories</h1>
                                        <ul>
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('all-products')}}">All Category</a></li>
                                        </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    <!-- START -->
    <section class="biz-pro">
    <div class="container">
        <div class="row">
         <div class="col-md-12">   
            <div class="ud-pay-op">
            @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <ul>
                        <li>
                            <table class="responsive-table bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th style="text-align:right;">Product Price</th>
                                        <th style="text-align:right;">Wallet Cash</th>                                    
                                        <th style="text-align:right;">Product Price Discount</th>                                    
                                        <th align="center"></th>
                                    </tr>
                                </thead>
                                @php $no=1;$n=0; $total=0; @endphp

                                @foreach($cartItems as $item)
                                 @php $product=first('vv_products','product_id',$item->id);$products[]=$product->product_id;  @endphp
                                 @php $ty=$product->discount_type @endphp
                                  <tr>
                                  <td>{{$no++}}</td>
                                  <td>{{$item->name}}</td>
                                    <td align="right"><b>
                                    <span class="strike-price">Rs {{$item->price}}</span> &nbsp; {{$product->product_price_offer}}                                      
                                    </b> </td>
                                    @if(Nam('vv_users','user_id',session('user_id'),'user_type')=='Service provider')
                                    @if($ty=='percentage')
                                    <td align="right">{{$val=($item->price*$product->discount_val)/100}} </td>
                                    @else
                                    <td align="right">{{$val=$product->discount_val}} </td>
                                    @endif
                                   <td align="right"><b> Rs {{$tto= ($product->product_price_offer-$val)}}</b></td>
                                  @else
                                  <td align="right">0</td>
                                  <td align="right">Rs {{$tto=($product->product_price_offer)}}</td>
                                  @endif
                                   <!-- <td align="right"><b>0</b></td> -->
                                  
                                  
                                    <td><a href="{{route('remove_cart',['id'=>$item->id])}}" class="db-list-edit">Delete</a></td>
                                    </tr>
                                     @php $total=$total+$tto;@endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="5" align="right">
                                            <h4>Product Amount: Rs {{$total}}</h4>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right">
                                            <h4 align="right">Shipping Amount: Rs {{$ship=shipping(Nam('vv_users','user_id',session('user_id'),'user_city'))}}</h4>
                                        </td>   
                                        <td>&nbsp;</td> 
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right">
                                            <h3>Total Amount: Rs {{$total=$total+$ship}}</h2>
                                        </td> 
                                    </tr>
                            <tbody>
                            </tbody>
                            </table>                            
                        </li>
                                </ul>
                    <h4>Select your payment option</h4>
                    <ul>
                                                                            <li>
                                <div class="pay-full">
                                    <div class="rbbox">
                                        <input type="radio" id="payment_razor_pay"
                                            name="payment" checked='checked'>
                                        <label class="payment-radio" for="payment_razor_pay">RazorPay payment gateway</label>
                                        <div class="pay-note">
                                            <span><i class="material-icons">star</i> You can pay with your credit card if you don’t have a RazorPay account.</span>
                                            <span><i class="material-icons">star</i>What is RazorPay?</span>
                                            <form name="razor_pay_dash_form" id="razor_pay_dash_form" method="post"
                                                action="{{route('add_payment')}}">
                                                @csrf
                                                <input type="hidden" class="form-control" name="ref" value="{{(isset($ref))?$ref:'null'}}" placeholder="" required="">
                                                <input type="hidden" name="total" value="{{$total}}" readonly />
                                                @if(isset($products))
                                                @foreach($products as $pot)
                                                <input type="hidden" name="cart[]" value="{{$pot}}" readonly />
                                                @endforeach
                                                @endif
                                                <input type="hidden" readonly="readonly"
                                                    class="form-control" name="razor_pay_dash_user_id"
                                                    value="{{session('user_id')}}"
                                                    placeholder="Full name *" required>

                                                <h4>Billing details</h4>
                                                <ul>
                                                    <li>
                                                        <!--                                                    FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" readonly="readonly"
                                                                        class="form-control"
                                                                        value="{{user(session('user_id'))}}" name="user_name"
                                                                        placeholder="Full name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="user_country"
                                                                        class="form-control" 
                                                                        value="{{Nam('vv_countries','country_id',105,'country_name')}}"
                                                                        placeholder="Country"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--                                                    FILED END-->
                                                        <!--                                                    FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="user_state"
                                                                        class="form-control"
                                                                        value="{{Nam('vv_states','state_id',Nam('vv_users','user_id',session('user_id'),'user_state'),'state_name')}}" 
                                                                        placeholder="State"required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="user_city"
                                                                        class="form-control"
                                                                        value="{{Nam('vv_cities','city_id',Nam('vv_users','user_id',session('user_id'),'user_city'),'city_name')}}" 
                                                                        placeholder="City *"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--                                                    FILED END-->
                                                        <!--                                                    FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" name="user_address"
                                                                        class="form-control"
                                                                        value="{{Nam('vv_users','user_id',session('user_id'),'user_address')}}"
                                                                        placeholder="Village & Street name"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--                                                    FILED END-->
                                                        <!--                                                    FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="user_zip_code"
                                                                        onkeypress="return isNumber(event)"
                                                                        class="form-control"
                                                                        value=""
                                                                        placeholder="Postcode/ZIP" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="user_contact_name"
                                                                        value="{{Nam('vv_users','user_id',session('user_id'),'user_contact_name')}}"
                                                                        placeholder="Contact person *" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--                                                    FILED END-->
                                                        <!--                                                    FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="user_contact_mobile"
                                                                        onkeypress="return isNumber(event)"
                                                                        value="{{Nam('vv_users','user_id',session('user_id'),'user_contact_mobile')}}"
                                                                        placeholder="Contact phone number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="user_contact_email"
                                                                        value="{{Nam('vv_users','user_id',session('user_id'),'user_contact_email')}}"
                                                                        placeholder="Contact Email Id " required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--                                                    FILED END-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="checkbox" 
                                                                        name="razor_same_shipping"
                                                                        value="true" checked="checked" id="billing">
                                                                    <label for="razor_same_shipping">Shipping Address is same as Billing Address</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div id="razor_shipping">
                                                <h4></h4>
                                                <ul>
                                                    <li>
                                                        <!--FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="shipping_user_name" class="form-control"
                                                                        readonly="readonly"
                                                                        value="{{user(session('user_id'))}}"
                                                                        placeholder="Full name *" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="shipping_user_country"
                                                                        class="form-control"
                                                                        value=""
                                                                        placeholder="Country">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--FILED END-->
                                                        <!--FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="shipping_user_state"
                                                                        class="form-control"
                                                                        value="43"
                                                                        placeholder="State">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="shipping_user_city"
                                                                        class="form-control"
                                                                        value="29"
                                                                        placeholder="City *"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--FILED END-->
                                                        <!--FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" name="shipping_user_address"
                                                                        class="form-control"
                                                                        value=""
                                                                        placeholder="Village & Street name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--FILED END-->
                                                        <!--FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="shipping_user_zip_code"
                                                                        onkeypress="return isNumber(event)"
                                                                        class="form-control"
                                                                        value=""
                                                                        placeholder="Postcode/ZIP">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="shipping_user_contact_name"
                                                                        value=""
                                                                        placeholder="Contact person *" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--FILED END-->
                                                        <!--FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="shipping_user_contact_mobile"
                                                                        onkeypress="return isNumber(event)"
                                                                        value=""
                                                                        placeholder="Contact phone number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="shipping_user_contact_email"
                                                                        value=""
                                                                        placeholder="Contact Email Id " required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--FILED END-->
                                                        
                                                    </li>
                                                </ul>
                                                </div>
                                                <div class="shipping_info" style="display: none;">
                                                    <h4>Shipped via (postal or courier details)</h4>
                                                    <ul>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="shipping_via">n/a</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button type="submit" name="razor_pay_dash_form_submit"
                                                        class="db-pro-bot-btn"id="razor_pay_dash_form_submit" >Start Payment</button>
                                                        <script
                                                        
                                                        src="https://checkout.razorpay.com/v1/checkout.js"
                                                        data-key="{{Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id')}}"
                                                        data-amount="{{$total*100}}"
                                                        data-currency="{{Nam('vv_footer','footer_id',1,'admin_razor_pay_currency_code')}}"
                                                        data-buttontext=''
                                                        data-name="iwpdirectory.in"
                                                        data-description="Rozerpay"
                                                        data-image="{{URL::to('/')}}/storage/file/{{Nam('vv_footer','footer_id',1,'header_logo')}}"
                                                        data-prefill.name="{{user(session('user_id'))}}"
                                                        data-prefill.email="{{Nam('vv_users','user_id',session('user_id'),'user_contact_email')}}"
                                                        data-theme.color="#F37254">
                                                   
                                                    </script> 
                                                  
                                            </form>
                                         
                                        </div>
                                    </div>
                                </div>
                            </li>
                                                                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
    <!-- END -->
@endsection
    <!-- START -->
@section('js')


    <script>
        function Productbreadcrumbs(val) {
            $(".sec-all-list-bre").css("opacity", 0);
            $.ajax({
                type: "POST",
                url: "http://iwpdirectory.in/product_category_filter_breadcrumb.php",
                data: 'category_id=' + val,
                success: function (data) {
                    if (data == null) {
                        $(".sec-all-list-bre").css("opacity", 1);
                    } else {
                        $(".sec-all-list-bre").html(data);
                        $(".sec-all-list-bre").css("opacity", 1);
                    }

                }
            });
        }

    //Auto complete For Listing Name and Category Name Starts Top Header Page particularly for All details page

    jQuery(document).ready(function ($) {
        $('#cod_shipping').hide();
        $('#paypal_shipping').hide();
        $('#stripe_shipping').hide();
        $('#razor_shipping').hide();
        $('#paytm_shipping').hide();
        $("input[name='shipping_user_name']").removeAttr('required');
        $("input[name='shipping_user_city']").removeAttr('required');
        $("input[name='shipping_user_contact_name']").removeAttr('required');
        $("input[name='shipping_user_contact_email']").removeAttr('required');
        $(function () {
            $.ajax({
                url: 'list_category_search.php',
                success: function (response) {

                    var categoryArray = JSON.parse(response);
                    
                    $('#top-select-search-new.autocomplete').autocomplete({  //Home Page City Search Box
                        source: categoryArray,
                        limit: 10 // The max amount of results that can be shown at once. Default: Infinity.
                    });
                }
            });
        });
        $('input[name="cash_same_shipping"]').change(function(){
            if ($(this).is(":checked")) {
                $('#cod_shipping').hide();
                $("input[name='shipping_user_name']").removeAttr('required');
                $("input[name='shipping_user_city']").removeAttr('required');
                $("input[name='shipping_user_contact_name']").removeAttr('required');
                $("input[name='shipping_user_contact_email']").removeAttr('required');
            } else {
                $('#cod_shipping').show();
                $("input[name='shipping_user_name']").attr('required', true);
                $("input[name='shipping_user_city']").attr('required', true);
                $("input[name='shipping_user_contact_name']").attr('required', true);
                $("input[name='shipping_user_contact_email']").attr('required', true)
            }
        });
        $('input[name="paypal_same_shipping"]').change(function(){
            if ($(this).is(":checked")) {
                $('#paypal_shipping').hide();
            } else {
                $('#paypal_shipping').show();
            }
        });
        $('input[name="stripe_same_shipping"]').change(function(){
            if ($(this).is(":checked")) {
                $('#stripe_shipping').hide();
            } else {
                $('#stripe_shipping').show();
            }
        });
        $('input[name="razor_same_shipping"]').change(function(){
            if ($(this).is(":checked")) {
                $('#razor_shipping').hide();
                $("input[name='shipping_user_name']").removeAttr('required');
                $("input[name='shipping_user_city']").removeAttr('required');
                $("input[name='shipping_user_contact_name']").removeAttr('required');
                $("input[name='shipping_user_contact_email']").removeAttr('required');
            } else {
                $('#razor_shipping').show();
                $("input[name='shipping_user_name']").attr('required', true);
                $("input[name='shipping_user_city']").attr('required', true);
                $("input[name='shipping_user_contact_name']").attr('required', true);
                $("input[name='shipping_user_contact_email']").attr('required', true);
            }
        });
        $('input[name="paytm_same_shipping"]').change(function(){
            if ($(this).is(":checked")) {
                $('#paytm_shipping').hide();
            } else {
                $('#paytm_shipping').show();
            }
        });
    });

    </script>
    
@endsection    