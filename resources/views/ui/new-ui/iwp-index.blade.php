@extends('main.master2')
@section('content')
    <!-- custom css -->
        <style>
            .home-tit h2{font-weight:400;}
            .home-tit h2 span{font-weight:700;font-size:32px;color:#4a5e95;position:relative;z-index:2}
            .home-tit h2 span:before{content:'';position:absolute;width:40%;height:6px;background:#ff83bc;bottom:1px;left:30%;z-index:-1;transform:skew(51deg,0deg)}
            .home-tit p{color:#4e6d8d}
            .home-tit{margin-bottom:20px;padding-top:60px}
            .hom2-hom-ban{float:left;width:46%;background-size:cover;margin:0 2%;background:#e6f6fb;padding:30px 100px 30px 30px;border-radius:5px;position:relative;}
            .hom2-hom-ban:hover a{background:#d6c607}
            .hom2-hom-ban h2{font-weight:600;font-size:22px;padding-bottom:5px}
            .hom2-hom-ban p{font-size:14px}
            .hom2-hom-ban a{background:#21d78d;color:#fff;padding:10px 20px;border-radius:5px;display:inline-block;cursor:pointer;font-size:13px;font-weight:400}
            .hom2-hom-ban p,.hom2-hom-ban h2,.hom2-hom-ban a{position:relative;color:#fff}
            .hom2-hom-ban:before{content:'';position:absolute;width:100%;height:100%;left:0;top:0;right:0;bottom:0;z-index:0;opacity:.8;background:#24C6DC;border-radius:5px}
            .hom2-hom-ban1:before{background-image:linear-gradient(140deg,#0c7ada 0%,#0761af 50%,#0f243e94 75%)}
            .hom2-hom-ban2:before{background-image:linear-gradient(140deg,#768404 0%,#768404 50%,#0f243e94 75%)}
            .hom2-hom-ban1{background-image:url(../frontend/images/home2-hand.jpg)}
            .hom2-hom-ban2{background-image:url(../frontend/images/home2-work.jpg)}
            .hom2-hom-ban-main{float:left;width:100%;padding-bottom:70px}
        </style>

                <div class="container">
                    <div class="row">
                        <div class="ban-tit">
                            <h1><b>{{title('Home')}}</b>{{title('HOM-BAN-SUB-TIT')}}</h1>
                        </div>
                        <div class="ban-search">
                            <form name="filter_form" id="filter_form" class="filter_form">
                                <ul>
                                    <li class="sr-cit">
                                        <select id="city_check" name="city_check" data-placeholder="Select city" class="chosen-select">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->city_id }}"></option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li class="sr-sea">
                                        <input type="text" autocomplete="off" id="select-search" placeholder="What are you looking for?" class="search-field">
                                        <ul id="tser-res" class="tser-res tser-res1">
                                            <li>
                                                <div>
                                                    <h4>Pre wed photo shoot locations in Telangana</h4>
                                                    <span>Pre wed photo shoot locations in Telangana and ap</span>
                                                    <a href="{{route('places')}}"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>Best Wedding photographer near by me</h4>
                                                    <span>photographer, videographer, candid photographer in Hyderabad </span>
                                                    <a href="{{route('all-listing')}}"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>Photo stores in Hyderabad</h4>
                                                    <span>camera, accessories, lenses, tripod, bags in Hyderabad</span>
                                                    <a href="{{route('all-products')}}"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>jobs in photography</h4>
                                                    <span>designers, video editors </span>
                                                    <a href="{{route('jobs')}}"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>photography exhibition in India </h4>
                                                    <span>exhibition, expo, workshops, seminar, and canon</span>
                                                    <a href="{{route('events')}}"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>photography coupons near me</h4>
                                                    <span>coupons, album print Digi press near by me</span>
                                                    <a href="{{route('coupons')}}"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>led wall rentals near by me </h4>
                                                    <span>ledwall, tvs, online mixixng, selfy booth</span>
                                                    <a href="{{route('experts')}}"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>photography news</h4>
                                                    <span>photo news,  industry news, camera reviews, product list</span>
                                                    <a href="{{route('all-news')}}"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sr-btn" >
                                        <input type="submit"   id="filter_submit" name="filter_submit" value="Search" class="filter_submit">
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="ban-short-links">
                            <ul>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/shop.png" alt="">
                                        <h4>Photo Directory</h4>
                                        <a href="{{route('all-category')}}" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/expert.png" alt="">
                                        <h4>Freelancers</h4>
                                        <a href="{{route('experts')}}" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/employee.png" alt="">
                                        <h4>Jobs</h4>
                                        <a href="{{route('jobs')}}" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/places/icons/hot-air-balloon.png" alt="">
                                        <h4>Locations</h4>
                                        <a href="{{route('places')}}" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/news.png" alt="">
                                        <h4>Photo News</h4>
                                        <a href="{{route('all-news')}}" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/calendar.png" alt="">
                                        <h4>Events</h4>
                                        <a href="{{route('events')}}" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/cart.png" alt="">
                                        <h4>Products</h4>
                                        <a href="{{route('product/categories')}}" class="fclick"></a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/coupons.png" alt="">
                                        <h4>Coupons</h4>
                                        <a href="{{route('coupons')}}" class="fclick"></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ban-ql">
                            <ul>
                                @foreach($top_section as $top)
                                <li>
                                    <div>
                                        <img src="{{asset('/storage/file/'.$top->top_section_image)}}" alt="">
                                        <h4>{{$top->top_section_title}}</h4>
                                        <p>{{$top->top_section_description}}</p>
                                        <a href="{{$top->top_section_link}}">{{$top->top_section_link_text}}</a>
                                    </div>
                                </li>
                                @endforeach
                               
                            </ul>
                        </div>
                        <div class="h2-ban-ql">
                            <ul>
                               
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/listing.png" alt="">
                                        <h5><span class="count1">11</span>Photo Directory </h5>
                                        <a href="{{route('all-category')}}">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/expert.png" alt="">
                                        <h5><span class="count1">11</span>Service Experts</h5>
                                        <a href="{{route('experts')}}">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/employee.png" alt="">
                                        <h5><span class="count1">11</span>Jobs</h5>
                                        <a href="{{route('jobs')}}">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/shop.png" alt="">
                                        <h5><span class="count1">07</span>Products</h5>
                                        <a href="{{route('all-products')}}">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/event.png" alt="">
                                        <h5><span class="count1">04</span>Events</h5>
                                        <a href="{{route('events')}}">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/coupons.png" alt="">
                                        <h5><span class="count1">03</span>Coupons</h5>
                                        <a href="{{route('coupons')}}">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/general.png" alt="">
                                        <h5><span class="count1">04</span>Community </h5>
                                        <a href="{{route('community')}}">&nbsp;</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->    
    <!-- custom css -->
        <style>
            .hom-top {
                transition: all 0.5s ease;
                background: none;
                box-shadow: none;
            }

            .top-ser {
                display: none;
            }

            .dmact .top-ser {
                display: block;
            }

            .caro-home {
                margin-top: 90px;
                float: left;
                width: 100%;
            }

            .carousel-item:before {
                background: none;
            }
        </style>
    <!-- START --> 
    <section>
        <div class="str">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2><span>Popular Services</span> near you</h2>
                        <p>Know More Information photo Industry sales and services around you</p>
                    </div>
                    <div class="land-pack">
                        <ul>
                           @foreach($top_category as $top)
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('/storage/file/'.$top->category_image)}}" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>{{name('vv_categories',$top->category_name)}}<span class="dir-ho-cat">Show All (01)</span></h4>
                                    </div>
                                    <a href="{{route('all-listings',['id'=>$top->category_name])}}" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                        <a href="{{route('all-category')}}" class="more">View all services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="str">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2><span>Explore Information</span> Category wise </h2>
                        <p>specific Information based on your need</p>
                    </div>
                    <div class="home-city">
                        <ul>
                          @foreach($trend_category as $trend)
                            <li>
                                <div class="hcity">
                                    <div>
                                        <img src="{{asset('/storage/file/'.$trend->category_image)}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{asset('/storage/file/'.$trend->category_bg_image)}}" alt="">
                                        <h4>{{name('vv_categories',$trend->category_name)}}</h4>
                                        <div class="list-rat-all"> <b>0 Ratings</b> </div>
                                        <p>{{CountCol('vv_listings','category_id',$trend->category_id,'category_id')}} Listings</p>
                                    </div>
                                    <a href="{{route('all-listings',['id'=>$trend->category_name])}}"
                                       class="fclick">&nbsp;</a>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    @if(session('user_C')=='false')
    <section>
        <div class="str">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2><span>Join us Now</span></h2>
                        <p>We connect with targeted customers for greater business conversion</p>
                    </div>
                    <div class="hom2-hom-ban-main">
                        <div class="hom2-hom-ban hom2-hom-ban1">
                            <h2>Looking for a Freelancers & Hire Services</h2>
                            <p>Tell us your service needs, we help you to send best Freelancers & Hire Services</p>
                            <a href="{{route('ui_login')}}">Book Freelancer</a>
                        </div>
                        <div class="hom2-hom-ban hom2-hom-ban2">
                            <h2>Are you a Freelancer?</h2>
                            <p>Join us today and earn more money and move your business to next level</p>
                            <a href="{{route('ui_login')}}">Join now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- END -->

    <!-- START -->
    <section>
        <div class="hom-mpop-ser">
            <div class="container">
                <div class="hom-mpop-main">
                    <div class="home-tit">
                        <h2><span>prime service providers</span>
                        </h2>
                        <p>recommend professional photography service providers near by you</p>
                    </div>

                    <!-- NEW FEATURE SERVICES -->
                    <div class="hom2-cus-sli">
                        <ul class="multiple-items1">
                            @foreach($top_business as $top)
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('/storage/file/'.Nam('vv_listings','listing_id',$top->listing_id,'profile_image'))}}" alt="">
                                    <div>
                                        <h4>
                                            <a href="{{route('all-listing')}}">{{Nam('vv_listings','listing_id',$top->listing_id,'listing_name')}}</a>
                                        </h4><span><a href="#">{{name('vv_categories',Nam('vv_listings','listing_id',$top->listing_id,'category_id'))}}</a></span>
                                    </div>
                                    <a href="{{route('all-listinged',['id'=>$top->listing_id])}}" class="fclick"></a>
                                </div>
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                    <!-- END NEW FEATURE SERVICES -->
                </div>
                <div class="hlead-coll">
                    <div class="col-md-6">
                        <div class="hom-cre-acc-left">
                            <h3>What service do you need? <span>All India Photographers Parivar Portal</span></h3>
                            <p>let us know to give you the best, your photography requirements so that we can connect you to the right service provider.</p>
                            <ul>
                                <li>
                                    <img src="{{asset('')}}frontend/images/icon/blog.png" alt="">
                                    <div>
                                        <h5>Tell us more about your requirements</h5>
                                        <p>HI Imagine you have made your presence online through a all india Photo directory, but your competitors have..</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{asset('')}}frontend/images/icon/shield.png" alt="">
                                    <div>
                                        <h5>We connect with right service provider</h5>
                                        <p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{asset('')}}frontend/images/icon/general.png" alt="">
                                    <div>
                                        <h5>Happy with our service</h5>
                                        <p>Your local business too needs brand management and image making. As you know the local market..</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hom-col-req">
                            <div class="log-bor">&nbsp;</div>
                            <span class="udb-inst">Fill the form</span>
                            <h4>What you looking for?</h4>
                            <div id="home_enq_success" class="log"
                                 style="display: none;">
                                <p>Your Enquiry Is Submitted Successfully!!!</p>
                            </div>
                            <div id="home_enq_fail" class="log" style="display: none;">
                                <p>Oops!! Something Went Wrong Try Later!!!</p>
                            </div>
                            <div id="home_enq_same" class="log" style="display: none;">
                                <p>You cannot make enquiry on your own listing!!</p>
                            </div>
                            <form name="home_enquiry_form" action="{{route('enquery')}}"id="home_enquiry_form" method="post"
                                  enctype="multipart/form-data">
                                  @csrf
                                <input type="hidden" class="form-control" name="listing_id" value="0" placeholder=""
                                       required>
                                <input type="hidden" class="form-control" name="listing_user_id" value="0"
                                       placeholder=""
                                       required>
                                <input type="hidden" class="form-control" name="enquiry_sender_id" value=""
                                       placeholder=""
                                       required>
                                <input type="hidden" class="form-control"
                                       name="enquiry_source"
                                       value="Website" placeholder="" required>
                                <div class="form-group">
                                    <input type="text" name="enquiry_name" value="" required="required"
                                           class="form-control"
                                           placeholder="Enter name*">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"
                                           placeholder="Enter email*"
                                           required="required"
                                           value="" name="enquiry_email"
                                           pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                           title="Invalid email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="" name="enquiry_mobile"
                                           placeholder="Enter mobile number *"
                                           pattern="[7-9]{1}[0-9]{9}"
                                           title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                           required="">
                                </div>
                                <div class="form-group">
                                    <select name="enquiry_category" id="enquiry_category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($service as $category)
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="enquiry_message"
                                  placeholder="Enter your query or message"></textarea>
                                </div>
                                <input type="hidden" id="source">
                                <button type="submit" id="home_enquiry_submit" name="home_enquiry_submit"
                                        class="btn btn-primary">
                                    Submit Requirements                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="str str-full">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2> <span>Top Service Providers</span> in India </h2>
                        <p>avail the best service providers information of pan India.</p>
                    </div>
                    <div class="ho-popu-bod">
                        <!--Top Branding Hotels-->
                        @foreach($top_service as $top)
                        <div class="col-md-4">
                           
                            <div class="hot-page2-hom-pre-head">
                                <h4>Top Branding <span>{{name('vv_categories',$top->top_service_provider_category_id)}}</span></h4>
                            </div>
                            <div class="hot-page2-hom-pre">
                                <ul>
                                    <!--LISTINGS-->
                                    @php $sub_cat=arr($top->top_service_provider_listings); @endphp
                                    @foreach($sub_cat as $sub)
                                    <li>
                                        <div class="hot-page2-hom-pre-1"><img
                                                src="{{asset('/storage/file/'.Nam('vv_listings','listing_id',$sub,'profile_image'))}}" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>{{Nam('vv_listings','listing_id',$sub,'listing_name')}}</h5>
                                            <span>{{Nam('vv_cities','city_id',Nam('vv_listings','listing_id',$sub,'city_id'),'city_name')}}, {{Nam('vv_states','state_id',Nam('vv_listings','listing_id',$sub,'state_id'),'state_name')}}</span>
                                        </div>
                                        <a href="{{route('all-listinged',['id'=>$sub])}}"
                                           class="fclick"></a>
                                    </li>
                                    <!--LISTINGS-->
                                    <!--LISTINGS-->
                                    @endforeach
                                    <!--LISTINGS--> 
                                </ul>
                            </div>
                           
                        </div>
                        @endforeach

                        <!--End Top Branding Hotels-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <section>
        <div id="demo" class="carousel slide cate-sli caro-home" data-ride="carousel">
            <div class="carousel-inner">
                @php $n=1; @endphp
                @foreach($sliders as $slider)
                <div class="carousel-item {{($n==1)?'active':''}}">
                    <img src="{{asset('/storage/file/'.$slider->slider_photo)}}" alt="Los Angeles"
                         width="1100" height="500">
                    <a href="{{$slider->slider_link}}" target="_blank"></a>
                </div>
                <input type=""class="d-none" value="{{$n++}}">
                @endforeach
                <!-- <div class="carousel-item ">
                    <img src="{{asset('')}}frontend/images/slider/27459517111.jpg" alt="Los Angeles"
                         width="1100" height="500">
                    <a href="https://bizbookdirectorytemplate.com/demo.html" target="_blank"></a>
                </div> -->
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>

    <!-- START -->
    <section>
        <div class="str count">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2><span>photo industry Events</span> in India</h2>
                        <p>events supports to enhance and upgrade technical knowledge</p>
                    </div>
                    <div class="hom-event">
                       
                        <div class="hom-eve-com hom-eve-lhs">
                        @foreach($top_event->slice(0, 2) as $top)
                            <div class="hom-eve-lhs-1 col-md-4">
                                <div class="eve-box">
                                    <div>
                                        <a href="{{route('events')}}">
                                            <img src="{{asset('/storage/file/'.Nam('vv_events','event_id',$top->event_name,'event_image'))}}"
                                                 alt="">
                                        <span>{{dateFormatConverter(Nam('vv_events','event_id',$top->event_name,'event_start_date'))}}</span>
                                        </a>
                                    </div>
                                    <div>
                                        <h4>
                                            <a href="{{route('events')}}">{{Nam('vv_events','event_id',$top->event_name,'event_name')}}</a>
                                        </h4>
                                        <span class="addr">{{Nam('vv_events','event_id',$top->event_name,'event_address')}} </span>
                                        <span class="pho">{{Nam('vv_events','event_id',$top->event_name,'event_contact_name')}}</span>
                                    </div>
                                    <div>
                                        <div class="auth">
                                            <img
                                                src="{{asset('/storage/file/'.(Nam('vv_users','user_id',(Nam('vv_events','event_id',$top->event_name,'user_id')),'profile_image')))}}" alt="">
                                            <b>Hosted by</b><br>
                                            <h4>{{user(Nam('vv_events','event_id',$top->event_name,'user_id'))}} </h4>
                                            <a target="_blank"
                                               href="profile/kasi-ratnam.html"
                                               class="fclick"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                           
                            <div class="hom-eve-lhs-2 col-md-4">
                                <ul>
                                @foreach($top_event->slice(2, 8) as $top)
                                    <li>
                                        <div class="eve-box-list">
                                        <img src="{{asset('/storage/file/'.Nam('vv_events','event_id',$top->event_name,'event_image'))}}"
                                                 alt="">
                                            <h4 title="Shoot Edit Workshop">{{Nam('vv_events','event_id',$top->event_name,'event_name')}}</h4>
                                            <p>{{Nam('vv_events','event_id',$top->event_name,'event_description')}}</p>
                                        <span>{{dateFormatConverter(Nam('vv_events','event_id',$top->event_name,'event_start_date'))}}</b></span>
                                            <a href="{{route('events')}}"
                                               class="fclick"></a>
                                        </div>
                                    </li>
                                    @endforeach
                                   
                            </ul>
                        </div>
                    </div>
                    <div class="mob-app">
                        <div class="lhs">
                            <img src="{{asset('')}}frontend/images/mobile.png" alt="">
                        </div>
                        <div class="rhs">
                            <h2>Looking for the Best Service Provider?                                    <span>Get the App!</span></h2>
                            <ul>
                                <li>HOM-APP-TITFind nearby listings</li>
                                <li>Easy service enquiry</li>
                                <li>Listing reviews and ratings</li>
                                <li>Manage your listing, enquiry and reviews</li>
                            </ul>
                            <span>We'll send you a link, to you below provided email id & open it on your smart phone to download the app</span>
                            <a href="#"><img src="{{asset('')}}frontend/images/gstore.png" alt=""> </a>
                            <a href="#"><img src="{{asset('')}}frontend/images/astore.png" alt=""> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    
    <!-- START -->
    <section>
        <div class="hom-ads">
            <div class="container">
                <div class="row">
                    <div class="filt-com lhs-ads">
                        @foreach($ads as $ad)
                        <div class="ads-box">
                                                    <a href="{{$ad->ad_link}}">
                                <span>Ad</span>

                                <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <div class="ani-quo">
        <div class="ani-q1">
            <h4>What you looking for?</h4>
            <p>We connect you to service experts.</p>
            <span>Get experts</span>
        </div>
        <div class="ani-q2">
            <img src="{{asset('')}}frontend/images/quote.png" alt="">
        </div>
    </div>
    <!-- END -->

    <!-- START -->

	@endsection

	<!-- END -->
	<!-- START -->
	