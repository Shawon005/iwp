@extends('main.master')
@section('content')
<section class="">
    <div class="job-prof-pg defa-prof-pg">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <!--START-->
                    <div class="profile">
                        <div class="jpro-ban-bg-img">
                            <span><b>0</b> Followings</span>
                            <p>Join on:
                                <b>{{dateFormatConverter($user->user_cdt)}}</b></p>
                            <img src="{{asset('/storage/file/'.$user->cover_image)}}" alt="">
                        </div>
                        <div class="jpro-ban-tit">
                            <div class="s1">
                                <img
                                    src="{{asset('/storage/file/'.$user->profile_image)}}" class="pro" alt="">
                            </div>
                            <div class="s2">
                                <h1>{{$user->first_name}}</h1>
                                <span class="loc"><b>City:{{$user->user_city}}</b> </span>
                                <p>{{countCol('vv_listings','user_id',$id,'user_id')}} Listings|{{countCol('vv_blogs','user_id',$id,'user_id')}} Blogs| {{countCol('vv_events','user_id',$id,'user_id')}} Events</p>
                            </div>
                            <div class="s3">
                                <a href="mailto:{{$user->email_id}}" class="cta fol" target="_blank">Message</a>
                                <span disabled                                      class="cta userfollow follow-content492"
                                      data-item="492"
                                      data-num="">
                            Follow</span>
                            </div>
                        </div>
                    </div>
                    <!--END-->
                    <!--START-->
                                        <!--END-->
                    <!--START-->
                    <div class="jpro-bd">
                            <div class="jpro-bd-com">
                                <h4>All Listings</h4>
                                <ul>
                                    @foreach($listings as $listing)
                                            <li>
                                                <div class="pro-listing-box">
                                                    <div>
                                                        <img
                                                            src="{{asset('/storage/file/'.$listing->profile_image)}}">
                                                        <h2>{{$listing->listing_name}}</h2>
                                                        <p>{{$listing->listing_address}}</p>
                                                        <a href="{{route('all-listings',['id'=>$listing->listing_id])}}"
                                                           class="fclick">&nbsp;</a>
                                                    </div>
                                                    <div>
                                                    <span data-toggle="modal"
                                                          data-target="#quote">Get quote</span>
                                                    </div>
                                                </div>
                                            </li>

                                            <div class="pop-ups pop-quo">
                                                <!-- The Modal -->
                                                <div class="modal fade" id="quote">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            <!-- Modal Header -->
                                                            <div class="quote-pop">
                                                                <h4>Get quote</h4>
                                                                <div id="profile_enq_success" class="log new-tnk-msg"
                                                                     style="display: none;">
                                                                    <p>Your Enquiry Is Submitted Successfully!!!</p>
                                                                </div>
                                                                <div id="profile_enq_same" class="log"
                                                                     style="display: none;">
                                                                    <p>You cannot make enquiry on your own listing!!</p>
                                                                </div>
                                                                <div id="profile_enq_fail" class="log"
                                                                     style="display: none;">
                                                                    <p>Oops!! Something Went Wrong Try Later!!!</p>
                                                                </div>
                                                                <form method="post" name="profile_enquiry_form"
                                                                      id="profile_enquiry_form">
                                                                    <input type="hidden" class="form-control"
                                                                           name="listing_id"
                                                                           value="515"
                                                                           placeholder=""
                                                                           required>
                                                                    <input type="hidden" class="form-control"
                                                                           name="listing_user_id"
                                                                           value="492"
                                                                           placeholder="" required>
                                                                    <input type="hidden" class="form-control"
                                                                           name="enquiry_sender_id"
                                                                           value=""
                                                                           placeholder="" required>
                                                                    <div class="form-group">
                                                                        <input type="text" readonly name="enquiry_name"
                                                                               value=""
                                                                               required="required" class="form-control"
                                                                               placeholder="Enter name*">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control"
                                                                               placeholder="Enter email*"
                                                                               readonly="readonly"
                                                                               value=""
                                                                               name="enquiry_email"
                                                                               pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                                                               title="Invalid email address"
                                                                               required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                               readonly="readonly"
                                                                               value=""
                                                                               name="enquiry_mobile"
                                                                               placeholder="Enter mobile number *"
                                                                               pattern="[7-9]{1}[0-9]{9}"
                                                                               title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                                                               required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <textarea class="form-control" rows="3"
                                                                              name="enquiry_message"
                                                                              placeholder="Enter your query or message"></textarea>
                                                                    </div>
                                                                    <input type="hidden" id="source">
                                                                    <button type="submit" name="enquiry_submit"
                                                                            class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                            <div class="log-bor">&nbsp;</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              @endforeach
                                            
                                </ul>

                            </div>
                            <div class="jpro-bd-com">
                                <h4>Blog posts</h4>
                                <ul>
                                     <div class="log"><p>No Blogs To Show</p></div>
                                  </ul>

                            </div>
                            <div class="jpro-bd-com">
                                <h4>Events</h4>
                                <ul>
                                    @foreach($events as $event)
                                    <li>
                                        <div class="pro-eve-box pro-eve-box1">
                                            <div>
                                                <img
                                                    src="{{asset('/storage/file/'.$event->event_image)}}"
                                                    alt="">
                                            </div>
                                            <div>
                                            <span>{{dateFormatConverter($event->event_start_date)}}</span>
                                                <h2>{{$event->event_name}}</h2>
                                                <p>{{$event->event_description}}</p>
                                            </div>
                                            <a href="{{route('event/details',['id'=>$event->event_id])}}"
                                                class="fclick">&nbsp;</a>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>

                            </div>
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Share this profile</h4>
                            <div class="list-sh list-sh">
                                <span class="share-new" data-toggle="modal" data-target="#sharepop"><i class="material-icons">share</i> Share now</span>
                            </div>
                        </div>
                        <!--END-->
                    </div>
              
                <div class="rhs">
                    <div class="ud-rhs-promo">
                        <h3>Tell us your Needs</h3>
                        <p>Tell us what kind of service or experts you are looking.</p>
                        <a href="http://iwpdirectory.in/login">Register for free</a>
                    </div>
                    <div class="job-rel-pro">
                        <div class="hot-page2-hom-pre">
                            <h4>Related profiles</h4>
                                <ul>
                                  @php $related=sub('vv_users','user_plan',$user->user_plan); @endphp
                                   @foreach($related->slice(0,2) as $user_r)
                                   @if($user_r->user_id != $user->user_id)
                                     <li>
                                        <div class="hot-page2-hom-pre-1">
                                            <img
                                                src="{{asset('/storage/file/'.$user_r->profile_image)}}" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>{{$user_r->first_name}}</h5>
                                            <span>Member since <b>{{dateFormatConverter($user_r->user_cdt)}}</b></span>
                                        </div>
                                        <a href="{{route('profile',['id'=>$user_r->user_id])}}" class="fclick"></a>
                                    </li>
                                    @endif
                                      @endforeach
                                </ul>
                        </div>
                    </div>
                    <div class="job-rel-pro">
                        <div class="hot-page2-hom-pre pmenu-spri">
                            <h4>Quick access</h4>
                            <ul>
                                <li><a href="{{route('all-category')}}" class="act"><img
                                            src="http://iwpdirectory.in/images/icon/shop.png">
                                        <div class="qui-acc-short">
                                            <h5>All Services</h5>
                                            <p>Easy to find your nearby Services</p>
                                            <span>View services</span>
                                        </div>

                                    </a></li>
                                <li><a href="{{route('experts')}}" class="act"><img
                                            src="http://iwpdirectory.in/images/icon/expert.png">
                                        <div class="qui-acc-short">
                                            <h5>Service Experts</h5>
                                            <p>Connect with the right Service Experts</p>
                                            <span>Book service experts</span>
                                        </div>

                                    </a></li>
                                <li><a href="{{route('jobs')}}" class="act"><img
                                            src="http://iwpdirectory.in/jobs/images/icon/employee.png">
                                        <div class="qui-acc-short">
                                            <h5> Jobs</h5>
                                            <p>Find your next job now</p>
                                            <span>Start finding</span>
                                        </div>
                                    </a></li>
                                <li><a href="{{route('events')}}"><img
                                            src="http://iwpdirectory.in/images/icon/calendar.png">
                                        <div class="qui-acc-short">
                                            <h5>Events</h5>
                                            <p>Find upcoming events now</p>
                                            <span>More info</span>
                                        </div>
                                    </a></li>
                                <li><a href="{{route('all-products')}}"><img
                                            src="http://iwpdirectory.in/images/icon/cart.png">
                                        <div class="qui-acc-short">
                                            <h5>Products</h5>
                                            <p>Now easy to Buy & Selling your products online</p>
                                            <span>Start Buying</span>
                                        </div>
                                    </a></li>
                                <li><a href="{{route('coupons')}}"><img
                                            src="http://iwpdirectory.in/images/icon/coupons.png">
                                        <div class="qui-acc-short">
                                            <h5>Coupon & deals</h5>
                                            <p>Get the latest and up-to-date coupons</p>
                                            <span>View Coupon & deals</span>
                                        </div>

                                    </a></li>
                                <li><a href="http://iwpdirectory.in/blog-posts"><img
                                            src="http://iwpdirectory.in/images/icon/blog1.png">
                                        <div class="qui-acc-short">
                                            <h5> Blogs</h5>
                                            <p>Create a unique and beautiful blog. It’s easy and free.</p>
                                            <span>More info</span>
                                        </div>

                                    </a></li>
                                <li><a href="{{route('community')}}"><img
                                            src="http://iwpdirectory.in/images/icon/11.png">
                                        <div class="qui-acc-short">
                                            <h5>Community</h5>
                                            <p>Build your business community and expand your business to next step.</p>
                                            <span>Join the Community</span>
                                        </div>

                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END -->


<!-- SHARE POPUP -->
<div class="modal fade sharepop" id="sharepop">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Share now</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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

<!-- START -->


<!-- END -->

<!-- START -->
<!-- END -->
@endsection
@section('js')
<script>

    $(document).ready(function () {
        $("#profile_enquiry_form").validate({
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
                $.ajax({
                    type: "POST",
                    data: $("#profile_enquiry_form").serialize(),
                    url: "http://iwpdirectory.in/enquiry_submit.php",
                    cache: true,
                    success: function (html) {
                        // alert(html);
                        if (html == 1) {
                            $("#profile_enq_success").show();
                            $("#profile_enquiry_form")[0].reset();
                        } else {
                            if (html == 3) {
                                $("#profile_enq_same").show();
                                $("#profile_enquiry_form")[0].reset();
                            } else {
                                $("#profile_enq_fail").show();
                                $("#profile_enquiry_form")[0].reset();
                            }
                        }

                    }

                })
            }
        });
    });

</script>


	<!--END PRICING DETAILS-->
	<!-- START -->
	@endsection
	