@extends('ui.old-ui.master.master')
@section('content')
    <div class="ud-cen" >
        <div class="log-bor">&nbsp;</div>
        <span class="udb-inst">Payment</span>
        <!-- <div class="log-error use-act-err"><p>Your order has been successfully processed.</p></div> -->
            
        <div class="ud-cen-s2">
            <h2>Payment Status</h2>
                <div class="log-suc" style="display: none;"><p>Payment Successful!! The User has been Upgraded Successfully!!!</p></div>
                <div class="ud-payment">
                <div>
                    <ul>
                        <li><b>Order Details</b>: O-000{{$order->order_id}}</li>
                        <li>
                        <table class="responsive-table bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Shipping Amount</th>
                                    <th>Wallet Cash</th>            
                                    <th align="center">Product Price Discount</th>                         
                                </tr>
                            </thead>
                            <tbody>
                                @php $items=sub('vv_order_lineitems','order_id',$order->order_id);$no=1 @endphp
                                @foreach($items as $item)
                                @php $product=first('vv_products','product_id',$item->product_id); @endphp
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td><b>
                                    
                                    <span class="strike-price">Rs {{$product->product_price}}</span> &nbsp;Rs {{$product->product_price_offer}}</b> 
                                    </td>
                                    <td align="center">Rs {{shipping(Nam('vv_users','user_id',session('user_id'),'user_city'))}}</td>
                                    <td>{{$val=$product->discount_val}} {{$ty=$product->discount_type}}</td>
                                   
                                    @if($ty=='percentage')
                                   <td ><b>Rs {{$tto= $product->product_price_offer-(($product->product_price_offer*$val)/100)}}</b></td>
                                   @else
                                   <td ><b> Rs {{$tto= ($product->product_price_offer-$val)}}</b></td>
                                   @endif
                                   
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right">
                                    <h4>Total Amount :  Rs.{{$order->order_amount}}</h4>
                                    </td>
                                </tr>
                        </tbody></table>
                        </li>
                    </ul>
                </div>
            </div>
                        <div class="ud-payment" style="margin-top: 5px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <ul>
                                <li class="my-3"><b>Order Placed On</b>: {{dateFormatConverter($order->created_date)}}</li>
                                <li class="my-3"><b>Order Approved On</b>: <span class="db-list-ststus">{{$order->order_status}}</span> </li>
                                <li class="my-3"><b>Dispatch Status</b>: 
                                  <!-- <span class="db-list-ststus">pending</span>  -->
                                 <span class="db-list-ststus "> {{$order->dispatch_status}} </span></li>
                                <li class="my-3"><b>Shipped via </b>: {{$order->shipping_info}}</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                @php $address=first('vv_order_address','order_id',$order->order_id); @endphp
                                @if($address!=null)
                                <li class="">
                                    <b>Delivery To</b>: <br>
                                    <p>
                                        {{$address->shipping_user_contact_name}}<br>
                                        {{$address->shipping_user_contact_mobile}} <br>
                                        {{$address->shipping_user_contact_email}} <br>{{$address->shipping_user_country}}
                                        <br>{{$address->shipping_user_state}}<br>{{$address->shipping_user_city}}
                                    </p>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ud-payment" style="margin-top: 5px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <p style="background: #fffaba; padding: 5px 8px; font-size: 12px;">Due to overwhealing number of orders, we are delayed on this order. We are working hard to get your order delivered.</p>

                        </div>
                    </div>
                    @php $vall=0; if($order->dispatch_status == "confirmed") { $vall=20; }else{}; @endphp

                    @php if($order->dispatch_status == "packed" ) {$vall=40;} else{}; @endphp

                    @php if($order->dispatch_status == "shipped" ) {$vall=60;} else{}; @endphp

                    @php if($order->dispatch_status == "out_for_delivery"){$vall=80;} else{}; @endphp

                    @php if($order->dispatch_status == "delivered"){$vall=100;} else{};@endphp
                    <div class="row">
                        <div class="col">
                            <p>Shipment <!-- 2/3 - 1 item --></p>
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$vall}}%"></div>
                                </div>
                             <ul id="progress-bar" class=" progressbar d-flex">
                                <li class="<?php echo ($order->dispatch_status == "confirmed" || $order->dispatch_status == "packed" || $order->dispatch_status == "shipped" || $order->dispatch_status == "out_for_delivery" || $order->dispatch_status == "delivered") ? '' : ''; ?>"><br>Confirmed <br> <?php echo isset($order->confirmed_date) ? date('d M', strtotime($order->confirmed_date)) : ''; ?></li>

                                <li class="<?php echo ($order->dispatch_status == "packed" || $order->dispatch_status == "shipped" || $order->dispatch_status == "out_for_delivery" || $order->dispatch_status == "delivered") ? 'active' : ''; ?>"> <br> Packed <br> <?php echo isset($order->packed_date) ? date('d M', strtotime($order->packed_date)) : ''; ?></li>
                                
                                <li class="<?php echo ($order->dispatch_status == "shipped" || $order->dispatch_status == "out_for_delivery" || $order->dispatch_status == "delivered") ? 'active' : ''; ?>"> <br> Shipped<br> <?php echo isset($order->shipped_date) ? date('d M', strtotime($order->shipped_date)) : ''; ?></li>
                                
                                <li class="<?php echo ($order->dispatch_status == "out_for_delivery" || $order->dispatch_status == "delivered") ? 'active' : ''; ?>"> <br> Out For Delivery <br> <?php echo isset($order->out_for_delivery_date) ? date('d M', strtotime($order->out_for_delivery_date)) : ''; ?></li>
                                
                                <li class="<?php echo ($order->dispatch_status == "delivered") ? 'active' : ''; ?>"> <br> Delivered <br> <?php echo isset($order->arriving_date) ? date('d M', strtotime($order->arriving_date)) : ''; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="btn-container">
                    <button class="btn" id="Next">Next</button>
                    <button class="btn" id="Back">Back</button>
                    <button class="btn" id="Reset">Reset</button>
                </div> -->
            </div>
            <div class="ud-notes">
                <p><b>Notes:</b> Hi, Before start "Ads Payment" you must know the pricing details and positions and all.
                    You just click the "Pricing and other details" button in this same page and you know the all
                    details. If your payment done means your invoice automatically received your "Payment invoice" page
                    and you never stop your Ads till the end date.</p>
            </div>
        </div>
    </div>
@endsection    