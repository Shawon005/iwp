@extends('main.master')
@section('content')
    <!-- END -->
    <?php
    use Illuminate\Support\Facades\URL;
    ?>
    <div class="all-list-bre all-pro-bre">
        <div class="container sec-all-list-bre">
            <div class="row">
                
                <ul>
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('product/categories')}}">All Product Categories</a></li>
                    <li><a href="/products_cat/{{$product->category_id}}">{{name('vv_product_categories',$product->category_id)}}</a></li>
                    <li><a href="#">{{$product->product_name}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- START -->
    <section class="biz-pro">
        <div class="container">
            <div class="row">
                <div class="col-md-5 lhs">
                    <div class="bpro-sli">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('/storage/file/'.$product->gallery_image)}}"
                                    alt="28443d-vacuum-heat-press-machine-500x500.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="biz-pro-btn">
                    <!-- <button data-bs-toggle="modal" data-bs-toggle="#quote" class="btn btn1">Get quote</button> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ask Price
                    </button>
                   
    
                        @if($product->product_type=="External")
                        <a href='{{$product->product_payment_link}}' class="btn btn2">Buy now</a>
                        @else
                        @if(session('user_C')=='true')
                        @if(isset($ref))
                        <a href="{{route('add_to_carts',['id'=>$product->product_id,'ref'=>$ref])}}" class="btn btn2">Buy now</a>
                        @else
                        <a href="{{route('add_to_cart',['id'=>$product->product_id])}}" class="btn btn2">Buy now</a>
                        @endif
                        @else
                        <a href="{{route('ui_login')}}" class="btn btn2">Buy now</a>
                        @endif
                        @endif 
                    </div>
                </div>

                <div class="col-md-7 rhs">
                    <div class="pro-pri-box">
                        <div class="pro-pbox-2">
                            <span class="veri">Verified</span>
                            <h1>{{$product->product_name}}</h1>
                            <span class="rat">4.0</span>
                            <span class="pro-cost strike-price">Rs: {{$product->product_price}}</span>
                            <b class="pro-off">Rs: {{$product->product_price_offer}}</b> 
                            @if($product->product_type=="Internal") 
                            @if(session('user_C')=='true')                          
                            <div class="clearfix" style="width: 100%;">
                                <p class="all-pro-txt-hints">Wallet Cash used for this: {{$product->discount_val}}{{($product->discount_type=='percentage')? '%':' coins'}}</p>
                                <p class="all-pro-txt-walletcash">Rs.{{$product->wallet_cashback}} cashback from Fototech</p>
                                <p class="all-pro-txt-walletcash">Share & Earn Rs.{{$product->affiliation_amount}} {{($product->affiliation_amount_type=='percentage')?' %':''}} from this product</p>
                            </div>
                            @endif 
                            @endif 
                        </div>
                        <div class="pro-pbox-3 pro-pbox-com">
                            <h4>Highlights</h4>
                            <ul>
                            @php $qu=arr($product->product_highlights); @endphp
                                @foreach($qu as $qus)
                                 <li>{{$qus}}</li>
                                @endforeach 
                            </ul>
                        </div>
                        <div class="pro-pbox-4 pro-pbox-com">
                            <h4>Descriptions</h4>
                            <p>{{$product->product_description}}.</p>
                        </div>

                         <div class="pro-pbox-7 pro-pbox-com">
                            <h4>Tags</h4>
                            <a href="{{route('product/cat',['id'=>$product->category_id])}}">{{name('vv_product_categories',$product->category_id)}}</a>
                         </div>
                         <div class="pro-pbox-5 pro-pbox-com">
                            <h4>Specifications</h4>
                            <ul>
                                @php $qu=arr($product->product_info_question); $ans=arr($product->product_info_answer);$i=0;@endphp
                                @foreach($qu as $id=>$qus)
                                <li class="{{($id>1)?'more':''}}">
                                    <span class="pro-spe-li">{{$qus}}</span>:
                                    <span class="pro-spe-po">&nbsp;&nbsp;{{$ans[$i++]}}</span>
                                </li>
                               @endforeach
                               <span class="db-list-ststus read-more">Read More</span>
                             </ul>
                        </div>
                        <div class="pro-pbox-6 pro-pbox-com">
                            <h4>Created by</h4>
                            <div class="ud-lhs-s1">
                                <img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$product->user_id,'profile_image'))}}" alt="">
                                <h4>{{user($product->user_id)}}</h4>
                                <b>{{dateFormatConverter($product->product_cdt)}}</b>
                                <a href="{{route('profile',['id'=>$product->user_id])}}" target="_blank" class="fclick">&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->
<!-- Button trigger modal -->

<!-- Modal -->

    <!-- START -->
    <section class="eve-deta-body blog-deta-body">
        <div class="container">
            <div class="pro-bot-shar">
                <h4>Share & Earn From this Product</h4>
              <ul>
                    <li>
                        <div class="sh-pro-shar sh-pro-face">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://iwpdirectory.in/product/guru-mahraj-sublimation?src=facebook&amp;quote=Guru%20Mahraj%20Sublimation"><img src="{{asset('')}}frontend/images/social/3.png" alt=""> Facebook</a>
                        </div>
                    </li>
                     <li>
                            <div class="sh-pro-shar sh-pro-what">
                                <a target="_blank"
                                   href="whatsapp://send?text=http%3A%2F%2Fiwpdirectory.in%2Fproduct%2Fguru-mahraj-sublimation%3Fsrc%3Dwhatsapp"><img src="{{asset('')}}frontend/images/social/6.png" alt=""> WhatsApp</a>
                            </div>
                    </li>
                    @if(session('user_C')=='true')
                    @php $ch=Nam('vv_users','user_id',session('user_id'),'user_type');@endphp
                    @if($ch=='Service provider')
                    <li>
                    <div class="sh-pro-shar sh-pro-link">
                        <a href="javascript:;" data-url="{{URL::to('/')}}/products/{{$product->product_id}}/{{session('user_id')}}" class="" id="affiliate-link">Get Link to Share & Earn </a>
                    </div>
                    </li>
                    @endif
                    @endif
              </ul>
            </div>
            <div class="pro-rel-pro-box">
                <h4>Frequently purchased products</h4>
                <div class="us-ppg-com us-ppg-blog">
                    <ul>
                      @foreach($frequents as $frequent)
                        <li>
                            <div class="pro-eve-box">
                                <div>
                                    <img src="{{asset('/storage/file/'.$frequent->gallery_image)}}" alt="">
                                </div>
                                <div>
                                    <span>Rs: {{$frequent->product_price_offer}}</span>
                                    <h2>{{$frequent->product_name}}</h2>
                                </div>
                                <a href="{{route('product/details',['id'=>$frequent->product_id])}}" class="fclick">&nbsp;</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="pro-rel-pro-box">
                <h4>Most popular products</h4>
                <div class="us-ppg-com us-ppg-blog">
                    <ul>
                      @foreach($populars as $popular)
                        <li>
                            <div class="pro-eve-box">
                                <div>
                                    <img src="{{asset('/storage/file/'.$popular->gallery_image)}}" alt="">
                                </div>
                                <div>
                                    <span>Rs: {{$popular->product_price_offer}}</span>
                                    <h2>{{$popular->product_name}}</h2>
                                </div>
                                <a href="{{route('product/details',['id'=>$popular->product_id])}}" class="fclick">&nbsp;</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="pro-rel-pro-box">
                <h4>Related products</h4>
                <div class="us-ppg-com us-ppg-blog">
                @php $R_products=Sub('vv_products','category_id',$product->category_id); @endphp
                    <ul>
                      @foreach($R_products->slice(0,3) as $R_product)
                        <li>
                            <div class="pro-eve-box">
                                <div>
                                    <img src="{{asset('/storage/file/'.$R_product->gallery_image)}}" alt="">
                                </div>
                                <div>
                                    <span>Rs: {{$R_product->product_price_offer}}</span>
                                    <h2>{{$R_product->product_name}}</h2>
                                </div>
                                <a href="{{route('product/details',['id'=>$R_product->product_id])}}" class="fclick">&nbsp;</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @if(session('user_C')=='true')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
    <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <!-- Modal Header -->
                    <div class="quote-pop">
                        <h4>Ask Price</h4>
                        <div id="product_detail_enq_success" class="log" style="display: none;"><p>Your Enquiry Is Submitted Successfully!!!</p>
                        </div>
                        <div id="product_detail_enq_same" class="log" style="display: none;"><p>You cannot make enquiry on your own product!!</p>
                        </div>
                        <div id="product_detail_enq_fail" class="log" style="display: none;"><p>Oops!! Something Went Wrong Try Later!!!</p>
                        </div>
                        @php $user=First('vv_users','user_id',session('user_id')) @endphp
                        <form method="post" name="product_detail_enquiry_form" id="product_detail_enquiry_form" novalidate="novalidate">
                            @csrf
                           <input type="hidden" class="form-control" name="product_id" value="{{$product->product_id}}" placeholder="" required="">
                            <input type="hidden" class="form-control" name="listing_user_id" value="{{$product->user_id}}" placeholder="" required="">
                            <input type="hidden" class="form-control" name="enquiry_sender_id" value="{{session('user_id')}}" placeholder="" required="">
                            <input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required="">
                           
                            <div class="form-group">
                                <input type="text" name="enquiry_name" value="{{user(session('user_id'))}}" required="required" class="form-control valid" placeholder="Enter name*">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control valid" placeholder="Enter email*" required="required" value="{{$user->email_id}}" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control valid" value="{{$user->mobile_number}}" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required="">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="enquiry_message" placeholder="I’m interested in buying this product. Could you please send me a best price."></textarea>
                            </div>
                            <input type="hidden" id="source">
                            <button type="submit" id="product_detail_enquiry_submit" name="enquiry_submit" class="btn btn-primary">Submit                             </button>
                        </form>
                    </div>
                    <div class="log-bor">&nbsp;</div>
                </div>
            </div>
        
</div>
@else
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
   <div class="modal-dialog">
               <div class="modal-content">
                   <button type="button" class="close" style="left:10%;" data-dismiss="modal">×</button>
                   <!-- Modal Header -->
                   <div class="quote-pop">
                       <h4>Get quote</h4>
                       <div id="product_detail_enq_success" class="log" style="display: none;"><p>Your Enquiry Is Submitted Successfully!!!</p>
                       </div>
                       <div id="product_detail_enq_same" class="log" style="display: none;"><p>You cannot make enquiry on your own product!!</p>
                       </div>
                       <div id="product_detail_enq_fail" class="log" style="display: none;"><p>Oops!! Something Went Wrong Try Later!!!</p>
                       </div>
                      
                       <!-- <form method="post" name="product_detail_enquiry_form" id="" novalidate="novalidate"> -->
                           @csrf
                          <input type="hidden" class="form-control" name="product_id" value="{{$product->product_id}}" placeholder="" required="">
                           <input type="hidden" class="form-control" name="listing_user_id" value="{{$product->user_id}}" placeholder="" required="">
                           <input type="hidden" class="form-control" name="enquiry_sender_id" value="" placeholder="" required="">
                           <input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required="">
                           <div class="form-group">
                               <input type="text" name="enquiry_name" value="" required="required" class="form-control valid" placeholder="Enter name*">
                           </div>
                           <div class="form-group">
                               <input type="email" class="form-control valid" placeholder="Enter email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control valid" value="" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required="">
                           </div>
                           <div class="form-group">
                               <textarea class="form-control" rows="3" name="enquiry_message" placeholder="I’m interested in buying this product. Could you please send me a best price."></textarea>
                           </div>
                           <input type="hidden" id="source">
                           <a type="submit" id="" href="{{route('ui_login')}}"name="enquiry_submit" class="btn btn-primary">Login To Submit</a>
                       <!-- </form> -->
                   </div>
                   <div class="log-bor">&nbsp;</div>
               </div>
           </div>
       
</div>
@endif
 @endsection
 @section('js')
    <script>

        //    <!--Product Enquiry Form Detail Page Ajax Call And Validation starts-->
        $("#product_detail_enquiry_submit").click(function() {
            $("#product_detail_enquiry_form").validate({
                rules: {
                    enquiry_name: {required: true},
                    enquiry_email: {required: true, email: true},
                    enquiry_mobile: {required: true}

                },
                messages: {

                    enquiry_name: {required: "Name is Required"},
                    enquiry_email: {required: "Email ID is Required"},
                    enquiry_mobile: {required: "Mobile Number is Required"}
                },

                submitHandler: function (form) { // for demo
                    //form.submit();
                    //url create yet. 
                    $.ajax({
                        type: "POST",
                        data: $("#product_detail_enquiry_form").serialize(),
                        url: "/product_enquery",
                        cache: true,
                        success: function (html) {
                            // alert(html);
                            if(html=='a') {
                                $("#product_detail_enq_success").show();
                                $("#product_detail_enquiry_form")[0].reset();
                            } 
                            else if(html=='s') {
                                    $("#product_detail_enq_same").show();
                                    $("#product_detail_enquiry_form")[0].reset();
                                }else {
                                    $("#product_detail_enq_fail").show();
                                    $("#product_detail_enquiry_form")[0].reset();
                                }
                            }

                        

                    })
                }
            });
        });
        // <!--Product Enquiry Form Detail Page Ajax Call And Validation ends-->
    </script>
    <script>
        //Auto complete For Listing Name and Category Name Starts Top Header Page particularly for All details page

        jQuery(document).ready(function ($) {

            $(function () {
                $.ajax({
                    url: 'http://iwpdirectory.in/list_category_search.php',
                    success: function (response) {

                        var categoryArray = JSON.parse(response);
                        
                        $('#top-select-search-new.autocomplete').autocomplete({  //Home Page City Search Box
                            source: categoryArray,
                            limit: 10 // The max amount of results that can be shown at once. Default: Infinity.
                        });
                    }
                });
            });
        });
    </script>
    <script>
        //Auto complete For Listing Name and Category Name Starts Top Header Page particularly for All details page

        jQuery(document).ready(function ($) {

            $(function () {
                $.ajax({
                    url: 'http://iwpdirectory.in/list_category_search.php',
                    success: function (response) {

                        var categoryArray = JSON.parse(response);
                        
                        $('#top-select-search-new.autocomplete').autocomplete({  //Home Page City Search Box
                            source: categoryArray,
                            limit: 10 // The max amount of results that can be shown at once. Default: Infinity.
                        });
                    }
                });
            });
        });
    </script>
    <script>
        jQuery(document).ready(function ($) {
            $('.more').removeClass('d-block');
            $('.more').addClass('d-none');
            $('.read-more').on('click',function(){
                $('.more').addClass('d-block');
                $('.read-more').addClass('d-none');
            });
            $(function () {
                $("#affiliate-link").on('click', function() {
                    var affiliate_link = $(this).data("url");
                    // alert(affiliate_link);
                    copyToClipboard(affiliate_link);

                    $(this).text("Link Copied!");
                });
            });
        });

        function copyToClipboard(text) {
            var sampleTextarea = document.createElement("textarea");
            document.body.appendChild(sampleTextarea);
            sampleTextarea.value = text; //save main text in it
            sampleTextarea.select(); //select textarea contenrs
            document.execCommand("copy");
            document.body.removeChild(sampleTextarea);
        } 
    </script>
@endsection