@extends('main.master2')
@section('content')

                <div class="container">
                    <div class="row">
                        <div class="ban-tit">
                            <h1><b>India's Biggest Photographer's Organisation</b> find Photographers, Photo Stores, Album Prints and Associations in India</h1>
                        </div>
                        <div class="ban-search">
                            <form name="filter_form" id="filter_form" class="filter_form">
                                <ul>
                                    <li class="sr-cit">
                                        <select id="city_check" name="city_check" class="chosen-select">
                                            <option value="">Select City</option>
                                            <option value="13">HYDERABAD</option>
                                            <option value="43">Ananthapuram</option>
                                            <option value="50">Eluru</option>
                                            <option value="66">Vishakhapatnam</option>
                                            <option value="150">South Goa</option>
                                            <option value="646">Azamgarh</option>
                                        </select>
                                    </li>
                                    <li class="sr-sea">
                                        <input type="text" autocomplete="off" id="select-search" placeholder="What are you looking for?" class="search-field">
                                        <ul id="tser-res" class="tser-res tser-res1">
                                            <li>
                                                <div>
                                                    <h4>Pre wed photo shoot locations in Telangana</h4>
                                                    <span>Pre wed photo shoot locations in Telangana and ap</span>
                                                    <a href="places/index.html"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>Best Wedding photographer near by me</h4>
                                                    <span>photographer, videographer, candid photographer in Hyderabad </span>
                                                    <a href="all-listing/photographer.html"></a>
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
                                                    <a href="jobs/index.html"></a>
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
                                                    <a href="service-experts/index.html"></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <h4>photography news</h4>
                                                    <span>photo news,  industry news, camera reviews, product list</span>
                                                    <a href="news/index.html"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sr-btn">
                                        <input type="submit" id="filter_submit" name="filter_submit" value="Search" class="filter_submit">
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="ban-short-links">
                            <ul>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/shop.png" alt="">
                                        <h4>All Services</h4>
                                        <a href="{{route('all-category')}}" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/expert.png" alt="">
                                        <h4>Experts</h4>
                                        <a href="service-experts/index.html" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/employee.png" alt="">
                                        <h4>Jobs</h4>
                                        <a href="jobs/index.html" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/places/icons/hot-air-balloon.png" alt="">
                                        <h4>Travel</h4>
                                        <a href="places/index.html" class="fclick"></a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/news.png" alt="">
                                        <h4>News</h4>
                                        <a href="news/index.html" class="fclick"></a>
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
                                        <a href="{{route('all-products')}}" class="fclick"></a>
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
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/1.png" alt="">
                                        <h4>Photography Industry Just Dail</h4>
                                        <p>Find any photography related traders and professional details </p>
                                        <a href="{{route('all-category')}}">Explore Now</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/2.png" alt="">
                                        <h4>500+ Photography Service Providers</h4>
                                        <p>Are you looking for the best Service Expert? We make it easy to hire the right professional</p>
                                        <a href="service-experts/index.html">Book Expert Now</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/3.png" alt="">
                                        <h4>Find Your Next Job Now</h4>
                                        <p>Search latest job openings online including photographer, videographer, photoshop, video editors & more</p>
                                        <a href="jobs/index.html">Find you Job</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/4.png" alt="">
                                        <h4>Sell & Buy Product Online</h4>
                                        <p>Fototech Online store. Everything you need to sell & buy online.</p>
                                        <a href="mystore.html">Start Selling Online</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="h2-ban-ql">
                            <ul>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/listing.png" alt="">
                                        <h5><span class="count1">11</span>All Services </h5>
                                        <a href="{{route('all-category')}}">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/expert.png" alt="">
                                        <h5><span class="count1">11</span>Service Experts</h5>
                                        <a href="service-experts/index.html">&nbsp;</a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/icon/employee.png" alt="">
                                        <h5><span class="count1">11</span>Jobs</h5>
                                        <a href="jobs/index.html">&nbsp;</a>
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
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/75651expert-cat-001.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>Photographer<span class="dir-ho-cat">Show All (01)</span></h4>
                                    </div>
                                    <a href="all-listing/photographer.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/92661rentals.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>Rentals <span class="dir-ho-cat">Show All (00)</span> </h4>
                                    </div>
                                    <a href="all-listing/rentals.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/80719printers.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>printers <span class="dir-ho-cat">Show All (01)</span></h4>
                                    </div>
                                    <a href="all-listing/printers.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/6841softwares.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>Softwares <span class="dir-ho-cat">Show All (00)</span> </h4>
                                    </div>
                                    <a href="all-listing/softwares.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/58315academics.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>Academics<span class="dir-ho-cat">Show All (01)</span></h4>
                                    </div>
                                    <a href="all-listing/academics.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/8667computers.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>Computers<span class="dir-ho-cat">Show All (00)</span> </h4>
                                    </div>
                                    <a href="all-listing/computers.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/91711traders.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>Photostore<span class="dir-ho-cat">Show All (03)</span></h4>
                                    </div>
                                    <a href="all-listing/photostore.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
                            <li>
                                <div class="land-pack-grid">
                                    <div class="land-pack-grid-img">
                                        <img src="{{asset('')}}frontend/images/services/69164photobook.jpg" alt="">
                                    </div>
                                    <div class="land-pack-grid-text">
                                        <h4>Photobooks<span class="dir-ho-cat">Show All (00)</span> </h4>
                                    </div>
                                    <a href="all-listing/photobooks.html" class="land-pack-grid-btn">View all listings</a>
                                </div>
                            </li>
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
                            <li>
                                <div class="hcity">
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/5901889175012.jpg" alt="">
                                    </div>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/8896454838013.jpg" alt="">
                                        <h4>Academics</h4>
                                        <div class="list-rat-all"> <b>0 Ratings</b> </div>
                                        <p>01Listings</p>
                                    </div>
                                    <a href="all-listing/academics.html"
                                       class="fclick">&nbsp;</a>
                                </div>
                            </li>
                            <li>
                                <div class="hcity">
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/27799pexels-pixabay-159823.jpg"
                                             alt="">
                                    </div>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/1185pexels-buro-millennial-1438081.jpg" alt="">
                                        <h4>Graphic Designers </h4>
                                        <div class="list-rat-all"> <b>0 Ratings</b>  </div>
                                        <p>00Listings</p>
                                    </div>
                                    <a href="all-listing/graphic-designers.html" class="fclick">&nbsp;</a>
                                </div>
                            </li>
                            <li>
                                <div class="hcity">
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/2459666468nikon.jpg" alt="">
                                    </div>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/503271686nikon.jpg" alt="">
                                        <h4>Photobooks</h4>
                                        <div class="list-rat-all"> <b>0 Ratings</b> </div>
                                        <p>00Listings</p>
                                    </div>
                                    <a href="all-listing/photobooks.html" class="fclick">&nbsp;</a>
                                </div>
                            </li> 
                            <li>
                                <div class="hcity">
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/87731pexels-pixabay-461064.jpg" alt="">
                                    </div>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/7023690544002.jpg" alt="">
                                        <h4>Softwares</h4>
                                        <div class="list-rat-all"> <b>0 Ratings</b> </div>
                                        <p>00Listings</p>
                                    </div>
                                    <a href="all-listing/softwares.html" class="fclick">&nbsp;</a>
                                </div>
                            </li>
                            <li>
                                <div class="hcity">
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/5655847175002.jpg" alt="">
                                    </div>
                                    <div>
                                        <img src="{{asset('')}}frontend/images/services/2523298815nikon.jpg" alt="">
                                        <h4>Photostore</h4>
                                        <div class="list-rat-all"> <b>0 Ratings</b> </div>
                                        <p>03Listings</p>
                                    </div>
                                    <a href="all-listing/photostore.html" class="fclick">&nbsp;</a>
                                </div>
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
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/65841workshop.jpg" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/fototech-school.html">fototech school</a>
                                        </h4><span><a href="#">Academics</a></span>
                                    </div>
                                    <a href="listing/fototech-school.html" class="fclick"></a>
                                </div>
                            </li>
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/42110abhi-pp.jpg" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/abhimanyu.html">Abhimanyu</a>
                                        </h4> 
                                        <span><a href="#">Photographer</a></span>
                                    </div>
                                    <a href="listing/abhimanyu.html" class="fclick"></a>
                                </div>
                            </li>
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/37704print-image.jpg" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/print-image-solutions.html">Print Image Solutions</a>
                                        </h4>
                                        <span><a href="#">printers</a></span>
                                    </div>
                                    <a href="listing/print-image-solutions.html" class="fclick"></a>
                                </div>
                            </li>
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/92015kr-photo.jpg" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/kr-photo-emporium.html">Kr Photo Emporium </a>
                                        </h4>
                                        <span><a href="#">Photostore</a></span>
                                    </div>
                                    <a href="listing/kr-photo-emporium.html" class="fclick"></a>
                                </div>
                            </li>
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/41122gurumaharaj-sublimation-logo-120x120.png" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/guru-maharaj-sublimation.html">GURU MAHARAJ SUBLIMATION</a>
                                        </h4>
                                        <span><a href="#">Sublimation </a></span>
                                    </div>
                                    <a href="listing/guru-maharaj-sublimation.html" class="fclick"></a>
                                </div>
                            </li>
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/77314tokyo.jpg" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/tokyo-japan-center.html">Tokyo Japan Center</a>
                                        </h4>
                                        <span><a href="#">Photostore</a></span>
                                    </div>
                                    <a href="listing/tokyo-japan-center.html" class="fclick"></a>
                                </div>
                            </li>
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/31545shiv-ajyothi.jpg" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/shiva-jyothi-electronics.html">Shiva jyothi electronics </a>
                                        </h4>
                                        <span><a href="#">Photostore</a></span>
                                    </div>
                                    <a href="listing/shiva-jyothi-electronics.html" class="fclick"></a>
                                </div>
                            </li>
                            <li>
                                <div class="testmo hom4-prop-box">
                                    <img src="{{asset('')}}frontend/images/listings/hot4.jpg" alt="">
                                    <div>
                                        <h4>
                                            <a href="listing/index.html"></a>
                                        </h4>
                                        <span><a href="#"></a></span>
                                    </div>
                                    <a href="listing/index.html" class="fclick"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END NEW FEATURE SERVICES -->
                </div>
                <div class="hlead-coll">
                    <div class="col-md-6">
                        <div class="hom-cre-acc-left">
                            <h3>What service do you need? <span>All India Photographers Portal</span></h3>
                            <p>let us know to give you the best, your photography requirements so that we can connect you to the right service provider.</p>
                            <ul>
                                <li>
                                    <img src="{{asset('')}}frontend/images/icon/blog.png" alt="">
                                    <div>
                                        <h5>Tell us more about your requirements</h5>
                                        <p>HI Imagine you have made your presence online through a local online directory, but your competitors have..</p>
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
                            <form name="home_enquiry_form" id="home_enquiry_form" method="post"
                                  enctype="multipart/form-data">
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
                                                                                    <option
                                                value="34">Photographer</option>
                                                                                        <option
                                                value="33">Graphic Designers </option>
                                                                                        <option
                                                value="32">Rentals</option>
                                                                                        <option
                                                value="31">printers</option>
                                                                                        <option
                                                value="30">Assocaitions</option>
                                                                                        <option
                                                value="29">Softwares</option>
                                                                                        <option
                                                value="28">Academics</option>
                                                                                        <option
                                                value="27">Computers</option>
                                                                                        <option
                                                value="26">Sublimation </option>
                                                                                        <option
                                                value="25">Photostore</option>
                                                                                        <option
                                                value="21">Photobooks</option>
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
                        <div class="col-md-4">
                            <div class="hot-page2-hom-pre-head">
                                <h4>Top Branding <span>Photostore</span></h4>
                            </div>
                            <div class="hot-page2-hom-pre">
                                <ul>
                                    <!--LISTINGS-->
                                    <li>
                                        <div class="hot-page2-hom-pre-1"><img
                                                src="{{asset('')}}frontend/images/listings/92015kr-photo.jpg" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>Kr Photo Emporium </h5>
                                            <span>Chikkadapally, Hyderabad</span>
                                        </div>
                                        <a href="listing/kr-photo-emporium.html"
                                           class="fclick"></a>
                                    </li>
                                    <!--LISTINGS-->
                                    <!--LISTINGS-->
                                    <li>
                                        <div class="hot-page2-hom-pre-1"><img
                                                src="{{asset('')}}frontend/images/listings/31545shiv-ajyothi.jpg" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>Shiva jyothi electronics </h5>
                                            <span>Chikkadapally, Hyderabad</span>
                                        </div>
                                        <a href="listing/shiva-jyothi-electronics.html"
                                           class="fclick"></a>
                                    </li>
                                    <!--LISTINGS-->
                                    <!--LISTINGS-->
                                    <li>
                                        <div class="hot-page2-hom-pre-1"><img
                                                src="{{asset('')}}frontend/images/listings/77314tokyo.jpg" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>Tokyo Japan Center</h5>
                                            <span>Chikkadapally, Hyderabad</span>
                                        </div>
                                        <a href="listing/tokyo-japan-center.html"
                                           class="fclick"></a>
                                    </li>
                                    <!--LISTINGS--> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="hot-page2-hom-pre-head">
                                <h4>Top Branding<span>Academics</span></h4>
                            </div>
                            <div class="hot-page2-hom-pre">
                                <ul>
                                    <!--LISTINGS-->
                                    <li>
                                        <div class="hot-page2-hom-pre-1"><img
                                                src="{{asset('')}}frontend/images/listings/65841workshop.jpg" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>fototech school</h5>
                                            <span>bvanjara hills</span>
                                        </div>
                                        <a href="listing/fototech-school.html" class="fclick"></a>
                                    </li>
                                    <!--LISTINGS-->
                                        
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="hot-page2-hom-pre-head">
                                <h4>Top Branding <span>Sublimation </span></h4>
                            </div>
                            <div class="hot-page2-hom-pre">
                                <ul>
                                    <!--LISTINGS-->
                                    <li>
                                        <div class="hot-page2-hom-pre-1"><img
                                                src="{{asset('')}}frontend/images/listings/41122gurumaharaj-sublimation-logo-120x120.png" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>GURU MAHARAJ SUBLIMATION</h5>
                                            <span>Chikkadapally, Hyderabad</span>
                                        </div>
                                        <a href="listing/guru-maharaj-sublimation.html" class="fclick"></a>
                                    </li>
                                    <!--LISTINGS-->
                                        
                                </ul>
                            </div>
                        </div>
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
                <div class="carousel-item active">
                    <img src="{{asset('')}}frontend/images/slider/90890557952.jpg" alt="Los Angeles"
                         width="1100" height="500">
                    <a href="https://bizbookdirectorytemplate.com/demo.html" target="_blank"></a>
                </div>
                <div class="carousel-item ">
                    <img src="{{asset('')}}frontend/images/slider/27459517111.jpg" alt="Los Angeles"
                         width="1100" height="500">
                    <a href="https://bizbookdirectorytemplate.com/demo.html" target="_blank"></a>
                </div>
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
                            <div class="hom-eve-lhs-1 col-md-4">
                                <div class="eve-box">
                                    <div>
                                        <a href="event/goa-photo-festival.html">
                                            <img src="{{asset('')}}frontend/images/events/76230goa-poster-13x19-002.jpg"
                                                 alt="">
                                        <span>Oct                                                <b> 29</b></span>
                                        </a>
                                    </div>
                                    <div>
                                        <h4>
                                            <a href="event/goa-photo-festival.html">Goa Photo Festival</a>
                                        </h4>
                                        <span class="addr">Stadium </span>
                                        <span class="pho">9246579601</span>
                                    </div>
                                    <div>
                                        <div class="auth">
                                            <img
                                                src="{{asset('')}}frontend/images/user/78087007-kasi-ratnam.jpg" alt="">
                                            <b>Hosted by</b><br>
                                            <h4>Kasi Ratnam</h4>
                                            <a target="_blank"
                                               href="profile/kasi-ratnam.html"
                                               class="fclick"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hom-eve-lhs-1 col-md-4">
                                <div class="eve-box">
                                    <div>
                                        <a href="event/photo-trade-expo.html">
                                            <img src="{{asset('')}}frontend/images/events/6889613x19-hyd-poster.jpg"
                                                 alt="">
                                        <span>Nov                                                <b> 18</b></span>
                                        </a>
                                    </div>
                                    <div>
                                        <h4>
                                            <a href="event/photo-trade-expo.html">Photo Trade Expo</a>
                                        </h4>
                                        <span class="addr">Kbr Convention, Lb nagar</span>
                                        <span class="pho">9246579601</span>
                                    </div>
                                    <div>
                                        <div class="auth">
                                            <img
                                                src="{{asset('')}}frontend/images/user/18037002-om-prakash.jpg" alt="">
                                            <b>Hosted by</b><br>
                                            <h4>OM PRAKASH</h4>
                                            <a target="_blank"
                                               href="profile/om-prakash.html"
                                               class="fclick"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hom-eve-lhs-2 col-md-4">
                                <ul>
                                    <li>
                                        <div class="eve-box-list">
                                            <img src="{{asset('')}}frontend/images/events/66789workshop.jpg"
                                                 alt="">
                                            <h4 title="Shoot Edit Workshop">Shoot Edit Workshop</h4>
                                            <p>నేటి తరం సృజనాత్మక</p>
                                        <span>Oct                                                <b> 15</b></span>
                                            <a href="event/shoot-edit-workshop.html"
                                               class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="eve-box-list">
                                            <img src="{{asset('')}}frontend/images/events/index.html"
                                                 alt="">
                                            <h4 title=""></h4>
                                            <p></p>
                                            <span>Jan                                                <b> 01</b></span>
                                            <a href="event/index.html"
                                               class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="eve-box-list">
                                            <img src="{{asset('')}}frontend/images/events/index.html"
                                                 alt="">
                                            <h4 title=""></h4>
                                            <p></p>
                                        <span>Jan                                                <b> 01</b></span>
                                            <a href="event/index.html"
                                               class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="eve-box-list">
                                            <img src="{{asset('')}}frontend/images/events/index.html"
                                                 alt="">
                                            <h4 title=""></h4>
                                            <p></p>
                                        <span>Jan                                                <b> 01</b></span>
                                            <a href="event/index.html"
                                               class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="eve-box-list">
                                            <img src="{{asset('')}}frontend/images/events/index.html"
                                                 alt="">
                                            <h4 title=""></h4>
                                            <p></p>
                                        <span>Jan                                                <b> 01</b></span>
                                            <a href="event/index.html"
                                               class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="eve-box-list">
                                            <img src="{{asset('')}}frontend/images/events/index.html"
                                                 alt="">
                                            <h4 title=""></h4>
                                            <p></p>
                                        <span>Jan                                                <b> 01</b></span>
                                            <a href="event/index.html"
                                               class="fclick"></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="how-wrks">
                        <div class="home-tit">
                            <h2><span>How It Works</span></h2>
                            <p>online is happening industry, join us to reach pan India photo industry for more business leads</p>
                        </div>
                        <div class="how-wrks-inn">
                            <ul>
                                <li>
                                    <div>
                                        <span>1</span>
                                        <img src="{{asset('')}}frontend/images/icon/how1.png" alt="">
                                        <h4>Create an account</h4>
                                        <p>user friendly process to reach online photo industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span>2</span>
                                        <img src="{{asset('')}}frontend/images/icon/how2.png" alt="">
                                        <h4>Add your business</h4>
                                        <p>showcase your services/products to enhance your market share</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span>3</span>
                                        <img src="{{asset('')}}frontend/images/icon/how3.png" alt="">
                                        <h4>Get more leads</h4>
                                        <p>present yourself creative way to get more business leads</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span>4</span>
                                        <img src="{{asset('')}}frontend/images/icon/how4.png" alt="">
                                        <h4>Archive goles</h4>
                                        <p>enhanced achievements assures you to gain more Business</p>
                                    </div>
                                </li>
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
                        <div class="ads-box">
                                                    <a href="#">
                                <span>Ad</span>

                                <img src="{{asset('')}}frontend/images/ads/ads2.jpg" alt="">
                            </a>
                        </div>
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
    <span class="btn-ser-need-ani"><img src="{{asset('')}}frontend/images/icon/help.png" alt=""></span>
    <div class="ani-quo-form">
        <i class="material-icons ani-req-clo">close</i>
        <div class="tit">
            <h3>What service do you need? <span>AIPO will help you</span></h3>
        </div>
        <div class="hom-col-req">
            <div id="home_slide_enq_success" class="log"
                 style="display: none;">
                <p>Your Enquiry Is Submitted Successfully!!!</p>
            </div>
            <div id="home_slide_enq_fail" class="log" style="display: none;">
                <p>Oops!! Something Went Wrong Try Later!!!</p>
            </div>
            <div id="home_slide_enq_same" class="log" style="display: none;">
                <p>You cannot make enquiry on your own listing!!</p>
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
                           title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required="">
                </div>
                <div class="form-group">
                    <select name="enquiry_category" id="enquiry_category" class="form-control chosen-select">
                        <option value="">Select Category</option>
                                                <option
                                value="34">Photographer</option>
                                                    <option
                                value="33">Graphic Designers </option>
                                                    <option
                                value="32">Rentals</option>
                                                    <option
                                value="31">printers</option>
                                                    <option
                                value="30">Assocaitions</option>
                                                    <option
                                value="29">Softwares</option>
                                                    <option
                                value="28">Academics</option>
                                                    <option
                                value="27">Computers</option>
                                                    <option
                                value="26">Sublimation </option>
                                                    <option
                                value="25">Photostore</option>
                                                    <option
                                value="21">Photobooks</option>
                                            </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="enquiry_message"
                              placeholder="Enter your query or message"></textarea>
                </div>
                <input type="hidden" id="source">
                <button type="submit" id="home_slide_enquiry_submit" name="home_slide_enquiry_submit"
                        class="btn btn-primary">Submit Requirements            </button>
            </form>
        </div>
    </div>
	@endsection

	<!-- END -->
	<!-- START -->
	