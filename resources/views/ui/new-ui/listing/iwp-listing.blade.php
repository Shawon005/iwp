@extends('main.master')
@section('content')
    <!-- START -->
    <section>
        <div class="v3-list-ql">
            <div class="container">
                <div class="row">
                    <div class="v3-list-ql-inn">
                        <ul>
                            <li class="active"><a href="#ld-abo"><i
                                class="material-icons">person</i> About                            </a>
                            </li>
                            <li><a href="#ld-ser"><i
                                class="material-icons">business_center</i> Services                            </a>
                            </li>
                            <li><a href="#ld-gal"><i
                                class="material-icons">photo</i> Gallery                            </a>
                            </li>
                            <li><a href="#ld-off"><i
                                class="material-icons">style</i> Offers                            </a>
                            </li>
                            <li><a href="#ld-360"><i
                                class="material-icons">camera</i> 360 View                            </a>
                            </li>
                            <li><a href="#ld-rev"><i
                                class="material-icons">star_half</i> Write Review                            </a>
                            </li>
                            <li><a href="#" data-toggle="modal" data-target="#claim"><i
                                class="material-icons">store</i>Claim business                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="list-det-fix">
            <div class="container">
                <div class="row">
                    <div class="list-det-fix-inn">
                        <div class="list-fix-pro">
                            <img src="{{asset('/storage/file/'.$listing->profile_image)}}" alt="">
                        </div>
                        <div class="list-fix-tit">
                            <h3>{{$listing->listing_name}}</h3>
                            <p><b>Address:</b> {{$listing->listing_address}}</p>
                        </div>
                        <div class="list-fix-btn">
                            <span data-toggle="modal" data-target="#quote"
                            class="pulse">Send an enquiry</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="list-bann">
            <img src="{{asset('/storage/file/'.$listing->cover_image)}}" alt="">
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <!--LISTING DETAILS-->
    <section class=" pg-list-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pg-list-1-pro">
                        <img src="{{asset('/storage/file/'.$listing->profile_image)}}" alt="">
                        <span class="stat"><i class="material-icons">verified_user</i></span>
                    </div>
                    <div class="pg-list-1-left">
                        <h3>{{$listing->listing_name}}</h3>
                        <div class="list-rat-all">
                            @php $total=0; $rats=sub('vv_reviews','listing_id',$listing->listing_id); @endphp
                            @foreach($rats as $rat)
                            @php $total=$total+$rat->price_rating; @endphp
                            @endforeach 
                            @if($total==0)
                            <span>No Reviews Yet</span>
                            @else
                            <b>{{sprintf("%02d",$total/count($rats))}}</b>
                            <label class="rat">
                                <?php for($i=(int)$total/count($rats); $i>0; $i--){?>
                                <i class="material-icons">star</i>
                                <?php } ?>
                            </label>
                            <span>{{count($rats)}} Reviews</span>
                            @endif   
                        </div>

                        <p><b>Address:</b> {{$listing->listing_address}}</p>
                        <div class="list-number pag-p1-phone">
                            <ul>
                                <a href="tel:{{$listing->listing_mobile}}">
                                    <li class="ic-php">{{$listing->listing_mobile}}                               </li>
                                </a>
                                <a href="mailto:phototradeexpo@gmail.com">
                                    <li class="ic-mai">{{$listing->listing_email}}                               </li>
                                </a>
                                <a target="_blank" href="http:{{$listing->listing_website}}">
                                    <li class="ic-web">{{$listing->listing_website}}/</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="list-ban-btn" >
                        <ul>
                            <li>
                                <a href="tel:{{$listing->listing_mobile}}"
                                class="cta cta-call">Call Now</a>
                            </li>
                            <li>
                                <span
                                class="cta cta-like ldelik Animatedheartfunc"
                                data-for="0"
                                data-section="{{$listing->user_id}}"
                                data-num="489" data-item="{{session('user_id')}}"
                                data-id='{{$listing->listing_id}}'>
                                <b id="chk">{{CountCol('vv_listing_likes','listing_id',$id,'listing_id')}}</b> LIKES</span>
                            </li>
                            <li>
                                <a target="_blank" href="https://wa.me/{{$listing->listing_whatsapp}}"
                                class="cta cta-rev">WhatsApp</a>
                            </li>
                            <li>
                                <a target="_blank" href="{{$listing->fb_link}}"
                                class="cta " style="background: #3B5998; color: #fff;">Facebook</a>
                            </li>
                            <li>
                                <span data-toggle="modal" data-target="#quote"
                                class="pulse cta cta-get">Get quote</span>
                            </li>
                            
                            <li><span class="share-new-top" data-toggle="modal" data-target="#sharepop"><i class="material-icons">share</i></span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class=" list-pg-bg">
        <div class="container">
            <div class="row">
                <div class="com-padd">
                    <div id="ld-abo" class="list-pg-lt list-page-com-p">

                        <!--LISTING DETAILS: LEFT PART 1-->
                        <div class="pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti">
                                <h3><span>About</span> {{$listing->listing_name}}</h3>
                            </div>
                            <div class="list-pg-inn-sp list-pg-inn-abo">
                                @php echo $listing->listing_description; @endphp
                            </div>
                        </div>

                        <!--END LISTING DETAILS: LEFT PART 1-->
                        <!--LISTING DETAILS: LEFT PART 2-->
                        <div id="ld-ser" class="pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti">
                                <h3><span>Services</span> Offered</h3>
                            </div>

                            <div class="list-pg-inn-sp">
                                <div class="row pg-list-ser">
                                    <ul>
                                        @php $offer_name=arr($listing->service_id); $offer_image=arr($listing->service_image); $no=0; @endphp
                                        @if($offer_image!=null)
                                        @foreach($offer_image as $image)
                                        
                                        <li class="col-md-3">
                                            <div class="pg-list-ser-p1"><img
                                                src="{{asset('/storage/file/'.$image)}}"
                                                alt=""/>
                                            </div>
                                            <div class="pg-list-ser-p2">
                                                <h4>{{$offer_name[$no++]}}</h4></div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                         <!--END LISTING DETAILS: LEFT PART 2-->

                        <!--LISTING DETAILS: LEFT PART 3-->
                        <div id="ld-gal" class="pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti">
                                <h3><span>photo</span> Gallery</h3>
                            </div>
                                    <div class="list-pg-inn-sp">
                                        <div id="demo" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ul class="carousel-indicators">
                                                <li data-target="#demo" data-slide-to="0"
                                                class="active"></li>
                                                <li data-target="#demo" data-slide-to="1"
                                                class=""></li>
                                            </ul>

                                            <!-- The slideshow -->
                                            <div class="carousel-inner">
                                                @php $pics=arr($listing->gallery_image);$n=1 @endphp
                                                @foreach($pics as $pic)
                                                <div class="carousel-item {{($n==1)?'active':''}}">
                                                    <img src="{{asset('/storage/file/'.$pic)}}"
                                                    alt="11942images.jpg ">
                                                </div class="{{$n++}}">
                                                @endforeach
                                               
                                            </div>
                                            <!-- Left and right controls -->
                                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                                    <span class="carousel-control-prev-icon"></span>
                                                </a>
                                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                                    <span class="carousel-control-next-icon"></span>
                                                </a>
                                        </div>
                                    </div>
                        </div>
                         <!--END LISTING DETAILS: LEFT PART 3-->

                        <!--LISTING DETAILS: LEFT PART 4-->
                        <div id="ld-off" class="pglist-bg pglist-off-last pglist-p-com">
                            <div class="pglist-p-com-ti">
                                <h3><span>Special</span> Offers</h3></div>
                            <?php

                            $ser_1_name_Array = explode(',', $listing->service_1_name);
                            $ser_1_price_Array = explode(',', $listing->service_1_price);
                            $ser_1_detail_Array = explode(',', $listing->service_1_detail);
                            $ser_1_image_Array = explode(',', $listing->service_1_image);
                            $ser_1_view_more_Array = explode(',', $listing->service_1_view_more);

                            $arr = array_map(null, $ser_1_name_Array, $ser_1_price_Array, $ser_1_detail_Array, $ser_1_image_Array, $ser_1_view_more_Array);

                            foreach ($arr as $item) {
                                $item[0];
                                $item[1];
                                $item[2];
                                $item[3];
                                $item[4];

                                ?>
                                <div class="list-pg-inn-sp">
                                    <div class="home-list-pop">
                                        <!--LISTINGS IMAGE-->
                                        <div class="col-md-3"><img
                                                src="{{asset('storage/file/'.$item[3])}}" alt=""></div>
                                        <!--LISTINGS: CONTENT-->
                                        <div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"><a
                                                href="#!"><h3><?php echo $item[0]; ?></h3></a>
                                            <p><?php echo $item[2]; ?></p>
                                            <?php
                                            if (!empty($item[1])) {
                                                ?>
                                                <span
                                                    class="home-list-pop-rat list-rom-pric">Rs. <?php echo $item[1]; ?></span>
                                                <?php
                                            }
                                            ?>
                                            <div class="list-enqu-btn">
                                                <ul>
                                                    <li>
                                                        <a <?php if ($item[4] != NULL){ ?>target="_blank" <?php } ?>
                                                           href="<?php if ($item[4] != NULL) {
                                                               echo $item[4];
                                                           } else { ?>#! <?php } ?>">More Details</a>
                                                    </li>
                                                    <li><a href="#!" data-toggle="modal"
                                                           data-target="#quote">Send enquiry</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                         <!--END LISTING DETAILS: LEFT PART 4-->

                        <!--LISTING DETAILS: LEFT PART 4-->
                        <div id="ld-off" class="pglist-bg pglist-off-last pglist-p-com">
                            <div class="pglist-p-com-ti"><h3><span>Products</span></h3></div>
                            <div style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                                <?php
                                    foreach($products as $product) {
                                ?>
                                        <div class="all-pro-box" style="width: calc(32.3% - 40px); margin: 20px; border: none; border-radius: 5px;">
                                            <div class="all-pro-img">
                                                <img src="{{asset('storage/file/'.$product->gallery_image)}}">
                                            </div>
                                            <div class="all-pro-aut">
                                                <div class="auth">
                                                    <a target="_blank" href="{{route('product/details',['id'=>$product->product_id])}}" class="fclick"></a>
                                                </div>
                                            </div>
                                            <div class="all-pro-txt">
                                                <h4><?php echo $product->product_name ?></h4>
                                                <span class="pri"><b
                                                            class="pro-off"><?php echo $product->product_price ?></b><?php echo $product->discount_val ?>% off</span>
                                                <div class="links"> <a target="_blank" href="https://themeforest.net/item/bizbook-directory-listings-template/25391222">Buy now</a>
                                                </div>
                                            </div>
                                            <a target="_blank" href="{{route('product/details', ['id'=>$product->product_id])}}" class="pro-view-full"></a>
                                        </div>
                                    <?php 
                                    }
                                ?>
                            </div>
                        </div>
                        <!--END LISTING DETAILS: LEFT PART 4-->

                    <div class="list-sh">
                        <span class="share-new" data-toggle="modal" data-target="#sharepop"><i class="material-icons">share</i> Share now</span>
                    </div>
                    <div class="modal fade sharepop show" id="sharepop" >
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Share now</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input type="text" value="" id="shareurl">
                                    <div class="shareurltip">
                                        <button onclick="shareurl()" onmouseout="shareurlout()">
                                            <span class="shareurltxt" id="myTooltip">Copy to clipboard</span>
                                            Copy text                    </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--END 360 DEGREE MAP: LEFT PART 8-->


                    <!--LISTING DETAILS: LEFT PART 6-->
                    @if(session('user_C')=='false')
                    <span id="Review_Disable">Login And Write Your Review</span>
                    @endif

                    <!--LISTING DETAILS: LEFT PART 6-->
                    <div class="pglist-bg pglist-p-com"
                        style="{{(session('user_C')=='false')?'opacity:0.5': ''}}" id="ld-rev">
                        <div class="pglist-p-com-ti">
                            <h3><span>Write Your</span> Reviews </h3>
                        </div>
                        <div class="list-pg-inn-sp">
                            <div class="list-pg-write-rev " style="{{(session('user_C')=='false')?'opacity:0.5':''}}">
                                <form class="col" id="reviwe_list" action="{{route('listing_reviwe')}}" method="post">
                                    @csrf
                                    <input type="hidden" class="form-control" name="listing_id"
                                    value="{{$listing->listing_id}}">
                                    <input type="hidden" class="form-control" name="listing_user_id"
                                    value="{{$listing->user_id}}">
                                    <input name="review_user_id" value=""
                                    type="hidden"
                                    >
                                    <p>Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</p>
                                    @if(session('message'))
                                        <div class="alert alert-success">
                                            <span class="close" data-dismiss="alert"></span>
                                            <strong>{{session('message')}}</strong>
                                        </div>
                                    @endif
                                    <div id="review_fail"
                                    style="text-align:center;display: none;color: red;">Oops!! Something Went Wrong Try Later!!!</div>
                                    <div class="row">
                                        <div>
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="price_rating"
                                                class="price_rating" value="5"/>
                                                <label class="full" for="star5" title="Awesome"></label>
                                                <input type="radio" id="star4" name="price_rating"
                                                class="price_rating" value="4"/>
                                                <label class="full" for="star4" title="Excellent"></label>
                                                <input type="radio" checked="checked" id="star3"
                                                class="price_rating" name="price_rating" value="3"/>
                                                <label class="full" for="star3" title="Good"></label>
                                                <input type="radio" id="star2" name="price_rating"
                                                class="price_rating" value="2"/>
                                                <label class="full" for="star2" title="Average"></label>
                                                <input type="radio" id="star1" name="price_rating"
                                                class="price_rating" value="1"/>
                                                <label class="full" for="star1" title="Poor"></label>
                                                <input type="radio" id="star0" name="price_rating"
                                                class="price_rating" value="0"/>
                                                <label class="" for="star0" title="Very Poor"></label>
                                            </fieldset>
                                            <div id="star-value">3 Star</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input
                                            id="review_name"  name="review_name" type="text"
                                            value="">
                                        </div>
                                        <div class="input-field col s6">
                                            <input
                                            id="review_mobile"  name="review_mobile" type="text"
                                            onkeypress="return isNumber(event)"
                                            placeholder="Mobile number"
                                            value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input
                                            id="review_email"   name="review_email" type="email" placeholder="Email Id"
                                            value="">
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="review_city"  name="review_city" placeholder="City"
                                            type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="review_message"  placeholder="Write review"
                                            name="review_message"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 mt-2 text-center">
                                           <button class="btn btn-primary " type="submit">Submit Your Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--END LISTING DETAILS: LEFT PART 6-->
                    <!--END LISTING DETAILS: LEFT PART 6-->


                    <!--LISTING DETAILS: LEFT PART 5-->
                    <div class="spa-first-review">Be the First One To Review This Listing!!!</div>

                        <!--END LISTING DETAILS: LEFT PART 5-->
                           @php $ch=sub('vv_reviews','listing_id',$listing->listing_id); @endphp
                           
                           @if(!empty($ch))
                                <div class="list-pg-inn-sp">
                                    <div class="lp-ur-all">
                                        <div class="lp-ur-all-left">
                                            <div class="lp-ur-all-left-1">
                                                <div class="lp-ur-all-left-11">Excellent</div>
                                                <div class="lp-ur-all-left-12">
                                                    <div class="lp-ur-all-left-13"></div>
                                                </div>
                                            </div>
                                            <div class="lp-ur-all-left-1">
                                                <div class="lp-ur-all-left-11">Good</div>
                                                <div class="lp-ur-all-left-12">
                                                    <div class="lp-ur-all-left-13 lp-ur-all-left-Good"></div>
                                                </div>
                                            </div>
                                            <div class="lp-ur-all-left-1">
                                                <div class="lp-ur-all-left-11">Satisfactory</div>
                                                <div class="lp-ur-all-left-12">
                                                    <div class="lp-ur-all-left-13 lp-ur-all-left-satis"></div>
                                                </div>
                                            </div>
                                            <div class="lp-ur-all-left-1">
                                                <div class="lp-ur-all-left-11">Below Average</div>
                                                <div class="lp-ur-all-left-12">
                                                    <div class="lp-ur-all-left-13 lp-ur-all-left-below"></div>
                                                </div>
                                            </div>
                                            <div class="lp-ur-all-left-1">
                                                <div class="lp-ur-all-left-11">Below Average</div>
                                                <div class="lp-ur-all-left-12">
                                                    <div class="lp-ur-all-left-13 lp-ur-all-left-poor"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lp-ur-all-right">
                                            <h5>Overall Ratings</h5>
                                            <p>
                                            <label class="rat">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                            </label>
                                            <span>based on1Reviews</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="lp-ur-all-rat">
                                        <h5>Reviews</h5>
                                        <ul>
                                           
                                            @foreach($ch as $list)
                                            
                                            <li>
                                                <div class="lr-user-wr-img"><img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$list->review_user_id,'profile_image'))}}" alt="">
                                                </div>
                                                <div class="lr-user-wr-con">
                                                    <h6>{{user($list->review_user_id)}}</h6>
                                                    <label class="rat">
                                                           <?php for($i=(int)$list->price_rating; $i>0; $i--){?>
                                                            <i class="material-icons">star</i>
                                                            <?php } ?>
                                                         </label>
                                                    <span class="lr-revi-date">31, Jan 2023</span>
                                                    <p>{{$list->review_message}}</p>
                                                </div>
                                            </li>
                                            
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                        <!--ADS-->
                                  @php $ads=Ads(6); @endphp    
                                  @foreach($ads as $ad)
                                  <div class="ban-ati-com ads-det-page">
                                             <a href="{{$ad->ad_link}}">
                                            <span>Ad</span>
                                            <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                                            </a>
                                   </div>
                                   @endforeach
                            <!--ADS-->

                            <!--RELATED PREMIUM LISTINGS-->
                            <div class="list-det-rel-pre">
                                <h2>Related listings:</h2>
                                <ul>
                                    @php $Rlisting=sub('vv_listings','category_id',$listing->category_id) @endphp
                                    @foreach($Rlisting->slice(0,3) as $R_listing)
                                    @if($R_listing->listing_id!=$listing->listing_id)
                                    <li>
                                    <div class="land-pack-grid">
                                        <div class="land-pack-grid-img">
                                            <img src="{{asset('/storage/file/'.$R_listing->profile_image)}}" alt="">
                                        </div>
                                        <div class="land-pack-grid-text">
                                            <h4>{{$R_listing->listing_name}}</h4>
                                            <div class="list-rat-all">
                                                <b></b>
                                                                                            </div>
                                        </div>
                                        <a target="_blank" href="{{route('all-listinged',['id'=>$R_listing->listing_id])}}" class="land-pack-grid-btn"></a>
                                    </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!--RELATED PREMIUM LISTINGS-->

                        </div>
                        <div class="list-pg-rt">

                            <!--LISTING DETAILS: LEFT PART 9-->
                            <div class="list-rhs-form pglist-bg pglist-p-com">

                                <div class="quote-pop">
                                    <h3><span>Get</span> Quote </h3>
                                    <div id="detail_enq_success" class="log" style="display: none;">
                                        <p>Your Enquiry Is Submitted Successfully!!!</p>
                                    </div>
                                    <div id="detail_enq_same" class="log" style="display: none;">
                                        <p>You cannot make enquiry on your own listing!!</p>
                                    </div>
                                    <div id="detail_enq_fail" class="log" style="display: none;">
                                        <p>Oops!! Something Went Wrong Try Later!!!</p>
                                    </div>
                                    <form method="post" name="detail_enquiry_form" id="detail_enquiry_form">
                                        @csrf
                                        <input type="hidden" class="form-control" name="listing_id"
                                        value="{{$listing->listing_id}}"
                                        placeholder=""
                                        required>
                                        <input type="hidden" class="form-control"
                                        name="listing_user_id"
                                        value="{{$listing->user_id}}" placeholder=""
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
                                        <div class="form-group ic-user">
                                            <input type="text" name="enquiry_name"
                                            value=""
                                            required="required" class="form-control"
                                            placeholder="Enter name*">
                                        </div>
                                        <div class="form-group ic-eml">
                                            <input type="email" class="form-control"
                                            placeholder="Enter email*" required="required"
                                            value=""
                                            name="enquiry_email"
                                            pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                            title="Invalid email address">
                                        </div>
                                        <div class="form-group ic-pho">
                                            <input type="text" class="form-control"
                                            value=""
                                            name="enquiry_mobile"
                                            placeholder="Enter mobile number *"
                                            pattern="[7-9]{1}[0-9]{9}"
                                            title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                            required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="enquiry_message"
                                            placeholder="Enter your query or message"></textarea>
                                        </div>
                                        <input type="hidden" id="source">
                                        @if(session('user_C')!=true)
                                        <button disabled="disabled"  type="submit" id="detail_enquiry_submit" name="enquiry_submit" class="btn btn-primary">You can't make enquiry!! As per your plan !! </button>
                                        @else
                                        <button   type="submit" id="detail_enquiry_submit" name="enquiry_submit" class="btn btn-primary">Submit</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <!--END LISTING DETAILS: LEFT PART 9-->


                            <!--LISTING DETAILS: LEFT PART 7-->
                            <div class="lide-guar pglist-bg pglist-p-com">
                                <div class="pglist-p-com-ti pglist-p-com-ti-right">
                                    <h3><span>Claim</span> Listing </h3>
                                </div>
                                    <div class="list-pg-inn-sp">
                                        <div class="list-pg-guar">
                                            <ul>
                                                <li>
                                                    <div class="list-pg-guar-img"><img
                                                        src="{{asset('')}}frontend/images/icon/g2.png" alt=""/>
                                                    </div>
                                                        <h4>Claim this business</h4>
                                                        <span data-toggle="modal" data-target="#claim"
                                                        class="clim-edit">Suggest an edit</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                            <!--END LISTING DETAILS: LEFT PART 7-->
                            <!--LISTING DETAILS: LEFT PART 8-->
                            <!--END LISTING DETAILS: LEFT PART 8-->
                            <!--LISTING DETAILS: LEFT PART 9-->
                            
                            @php $C_listing = first('vv_user_company','user_id',$listing->user_id); @endphp
                            @if($C_listing != null)
                            <div class="ld-rhs-pro pglist-bg pglist-p-com">
                            <div class="lis-comp-badg">
                                <div class="s1">
                                    <div>
                                        <span
                                            class="by">LISTING_DETAILS_BUSINESS_PROFILE</span>
                                        <img class="proi"
                                             src="{{asset('/storage/file/'.$C_listing->company_profile_photo)}}"
                                             alt="">
                                        <h4><?php if ($C_listing->company_name != NULL) {
                                                echo $C_listing->company_name;
                                            } else {
                                                echo user($listing->user_id);
                                            } ?></h4>
                                        <p>{{$C_listing->company_address}}</p>
                                        <ul>
                                            
                                            @if ($C_listing->company_facebook!= NULL)
                                                <li><a href="{{$C_listing->company_facebook}}"
                                                       target="_blank"><img
                                                            src="{{asset('')}}frontend/images/social/3.png"></a></li>
                                            @endif
                                            @if ($C_listing->company_twitter!= NULL)
                                                <li><a href="{{$C_listing->company_twitter}}"
                                                       target="_blank"><img
                                                            src="{{asset('')}}frontend/images/social/2.png"></a></li>
                                            @endif
                                            @if ($C_listing->company_linkedin!= NULL)
                                                <li><a href="{{$C_listing->company_linkedin}}"
                                                       target="_blank"><img
                                                            src="{{asset('')}}frontend/images/social/1.png"></a></li>
                                            @endif
                                            @if ($C_listing->company_instagram!= NULL)
                                                <li><a href="{{$C_listing->company_instagram}}"
                                                       target="_blank"><img
                                                            src="{{asset('')}}frontend/images/social/7.png"></a></li>
                                            @endif
                                            @if ($C_listing->company_youtube!= NULL)
                                                <li><a href="{{$C_listing->company_youtube}}"
                                                       target="_blank"><img
                                                            src="{{asset('')}}frontend/images/social/5.png"></a></li>
                                            @endif
                                            @if ($C_listing->company_whatsapp!= NULL)
                                                <li><a href="{{$C_listing->company_whatsapp}}"
                                                       target="_blank"><img
                                                            src="{{asset('')}}frontend/images/social/6.png"></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="s2">
                                    <a target="_blank" href="{{route('company-profile',['id'=>$C_listing->user_id])}}" class="use-fol">VIEW_PROFILE</a>
                                </div>
                            </div>
                        </div>
                        @endif
                            <!--END LISTING DETAILS: LEFT PART 9-->

                            <!--LISTING DETAILS: LEFT PART 7-->
                            <div class="ld-rhs-pro pglist-bg pglist-p-com">
                                <div class="lis-pro-badg">
                                    <div>
                                        <span class="rat" alt="User rating">4.2</span>
                                        <span class="by">Created by</span>
                                        <img
                                        src="{{asset('/storage/file/'.Nam('vv_users','user_id',$listing->user_id,'profile_image'))}}" alt="">
                                        <h4>{{user($listing->user_id)}}</h4>
                                        <p>Member since Sep 2022</p>
                                    </div>
                                    <a href="{{route('profile',['id'=>$listing->user_id])}}"
                                    class="fclick"
                                    target="_blank">&nbsp;</a>
                                </div>
                            </div>
                            <!--END LISTING DETAILS: LEFT PART 7-->

                            <!--ADS-->
                                @php $ads=Ads(5); @endphp    
                                  @foreach($ads as $ad)
                                  <div class="ban-ati-com ads-det-page">
                                             <a href="{{$ad->ad_link}}">
                                            <span>Ad</span>
                                            <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                                            </a>
                                   </div>
                                   @endforeach
                            <!--ADS-->
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- START -->
<section>
    <div class="pop-ups pop-quo">
        <div class="modal fade" id="claim">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">Claim now</span>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- Modal Header -->
                    <div class="quote-pop" style="{{(session('user_C')==false)?'opacity:0.5':''}}">
                        <h4>Claim this business</h4>
                        <div id="pop_claim_success" class="log" style="display: none;">
                            <p>Your Claim Request Submitted Successfully</p>
                        </div>
                        <div id="pop_claim_same" class="log" style="display: none;">
                            <p>You cannot make enquiry on your own listing!!</p>
                        </div>
                        <div id="pop_claim_fail" class="log" style="display: none;">
                            <p>Oops!! Something Went Wrong Try Later!!!</p>
                        </div>
                        <form method="post" name="popup_claim_form" id="popup_claim_form" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" class="form-control" name="listing_id"
                                       value="{{$listing->listing_id}}"
                                       placeholder=""
                                       required>
                                <input type="hidden" class="form-control"
                                       name="listing_user_id"
                                       value="{{$listing->user_id}}" placeholder=""
                                       required>
                                <input type="hidden" class="form-control"
                                       name="enquiry_sender_id"
                                       value="{{session('user_id')}}"
                                       placeholder=""
                                       required>
                                <input type="hidden" class="form-control"
                                       name="enquiry_source"
                                       value="Website"
                                       placeholder=""
                                       required>
                                <div class="form-group">
                                    <input type="text" name="enquiry_name"
                                           value=""
                                           required="required" class="form-control"
                                           placeholder="Enter name*">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"
                                           placeholder="Enter Email Id*"
                                           required="required"
                                           value=""
                                           name="enquiry_email"
                                           pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                           title="Invalid email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           value=""
                                           name="enquiry_mobile"
                                           placeholder="Enter mobile number *"
                                           pattern="[7-9]{1}[0-9]{9}"
                                           title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                           required>
                                </div>
                                <div class="form-group">
                                    <div class="fil-img-uplo">
                                            <span class="dumfil">Identification Proof *</span>
                                            <input type="file" name="enquiry_image" accept="image/*,.jpg,.jpeg,.png" class="form-control" required>
                                        </div>       
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" rows="3" name="enquiry_message"
                                          placeholder="Enter your query and why claim this business"></textarea>
                                </div>
                                <input type="hidden" id="source">
                                <button type="submit"
                                      id="popup_claim_submit"
                                      name="popup_claim_submit"
                                      class="btn btn-primary">Submit Your Claim                                                                    </button>
                            
                        </form>
                        <div class="form-notes"><p>We send you the verification email to you provider the email id. Once you done the verification process then you can manage this business.</p></div>
                    </div>
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
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            var x = $(".list-pg-bg").offset().top;
            if (scroll >= x) {
                $(".list-det-fix").addClass("list-det-fix-act");
            }
            else {
                $(".list-det-fix").removeClass("list-det-fix-act");
            }
        });
        function scrollNav() {
            $('.v3-list-ql-inn a').click(function () {
                //Toggle Class
                $(".active-list").removeClass("active-list");
                $(this).closest('li').addClass("active-list");
                var theClass = $(this).attr("class");
                $('.' + theClass).parent('li').addClass('active-list');
                //Animate
                $('html, body').stop().animate({
                    scrollTop: $($(this).attr('href')).offset().top - 130
                }, 400);
                return false;
            });
            $('.scrollTop a').scrollTop();
        }
        scrollNav();
    </script>

    <script>
        $(document).ready(function () {
            $('input[name="price_rating"]').change(function () {
                if ($('#star0').prop('checked')) {
                    $("#star-value").html('0 Star');
                }
                else if ($('#star1').prop('checked')) {
                    $("#star-value").html('1 Star');
                }
                else if ($('#star2').prop('checked')) {
                    $("#star-value").html('2 Star');
                }
                else if ($('#star3').prop('checked')) {
                    $("#star-value").html('3 Star');
                }
                else if ($('#star4').prop('checked')) {
                    $("#star-value").html('4 Star');
                }
                else if ($('#star5').prop('checked')) {
                    $("#star-value").html('5 Star');
                }
            });
        });
    </script>
@endsection