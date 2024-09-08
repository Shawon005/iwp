<span class="btn-ser-need-ani"><img src="{{asset('')}}frontend/images/icon/help.png" alt=""></span>
    <div class="ani-quo-form">
        <i class="material-icons ani-req-clo">close</i>
        <div class="tit">
            <h3>What service do you need? <span>Fototech India will help you</span></h3>
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
            <form name="home_slide_enquiry_form" id="home_slide_enquiry_form"action="{{route('enquery')}}" method="post" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" class="form-control"name="listing_id"value="0" placeholder=""required>
                <input type="hidden" class="form-control"name="listing_user_id"value="0"placeholder=""required>
                <input type="hidden" class="form-control"name="enquiry_sender_id"value=""placeholder=""required>
                <input type="hidden" class="form-control"name="enquiry_source"value="Website"placeholder=""required>
                <div class="form-group">
                    <input type="text" name="enquiry_name" value="" required="required" class="form-control"placeholder="Enter name*">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter email*" required="required" value=""name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"title="Invalid email address">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="" name="enquiry_mobile"placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}"title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required="">
                </div>
                <div class="form-group">
                    <select name="enquiry_category" id="enquiry_category" class="form-control chosen-select">
                        <option value="">Select Category</option>
                        @php $service=table('vv_categories'); @endphp
                           @foreach($service as $category)
                           <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                           @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="enquiry_message"placeholder="Enter your query or message"></textarea>
                </div>
                <input type="hidden" id="source">
                   <button type="submit" id="home_slide_enquiry_submit" name="home_slide_enquiry_submit"class="btn btn-primary">Submit Requirements            </button>
            </form>
        </div>
    </div>
<section>
        <div class="full-bot-book">
            <div class="container">
                <div class="row">
                                    <div class="bot-book">
                        <div class="col-md-12 bb-text">
                            <h4>List your business to Connect Digital world</h4>
                            <p>breakout your boundaries from tradition to digital world to be in Business or you will be out of business, your suppose to..</p>
                            <a href="{{route('pricing-details')}}">Add my business <i class="material-icons">arrow_forward</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    <section class=" wed-hom-footer">
        <div class="container">
            <div class="row foot-supp">
                <h2><span>Free support:</span>{{$footer->footer_mobile}}&nbsp;&nbsp;|&nbsp;&nbsp; <span>Email:</span> fototechpvtltd@gmail.com</h2>
            </div>
            <div class="row wed-foot-link">
                <div class="col-md-4 foot-tc-mar-t-o">
                    <h4>Top Category</h4>
                    <ul>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_1])}}">{{name('vv_product_categories',$footer->top_category_1)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_2])}}">{{name('vv_product_categories',$footer->top_category_2)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_3])}}">{{name('vv_product_categories',$footer->top_category_3)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_4])}}">{{name('vv_product_categories',$footer->top_category_4)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_5])}}">{{name('vv_product_categories',$footer->top_category_5)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_6])}}">{{name('vv_product_categories',$footer->top_category_6)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_7])}}">{{name('vv_product_categories',$footer->top_category_7)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->top_category_8])}}">{{name('vv_product_categories',$footer->top_category_8)}}</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Trending Category</h4>
                    <ul>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_1])}}">{{name('vv_product_categories',$footer->trend_category_1)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_2])}}">{{name('vv_product_categories',$footer->trend_category_2)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_3])}}">{{name('vv_product_categories',$footer->trend_category_3)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_4])}}">{{name('vv_product_categories',$footer->trend_category_4)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_5])}}">{{name('vv_product_categories',$footer->trend_category_5)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_6])}}">{{name('vv_product_categories',$footer->trend_category_6)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_7])}}">{{name('vv_product_categories',$footer->trend_category_7)}}</a></li>
                        <li><a href="{{route('all-listings',['id'=>$footer->trend_category_8])}}">{{name('vv_product_categories',$footer->trend_category_8)}}</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>HELP &amp; SUPPORT</h4>
                    <ul>
                        <li><a href="{{route('about')}}">{{$footer->footer_page_name_1}}</a>
                        </li>
                        <li><a href="{{route('faq')}}">{{$footer->footer_page_name_2}}</a>
                        </li>
                        <li><a href="{{route('feedback')}}">{{$footer->footer_page_name_3}}</a>
                        </li>
                        <li><a href="{{route('contact')}}">{{$footer->footer_page_name_4}}</a>
                        </li>
                        <li><a href="{{route('privacy')}}">privacy-policy</a></li>
                        <li><a href="{{route('terms')}}">terms-of-use</a></li>
                    </ul>
                </div>
            </div>

            <!-- POPULAR TAGS -->
            <div class="row wed-foot-link-pop">
                <div class="col-md-12">
                    <h4>Popular Tags</h4>
                    @php $pop=table('vv_popular_tags'); @endphp
                    <ul>
                         @foreach($pop->slice(0, 5) as $popular)
                         <li><a href="{{$popular->popular_tags_link}}">{{$popular->popular_tags_name}}</a></li>
                          @endforeach
                    </ul>
                </div>
            </div>
            <!-- POPULAR TAGS -->
            <div class="row wed-foot-link-1">
            @if($footer->admin_get_in_touch_feature==1)
                <div class="col-md-4">
                    <h4>Get In Touch</h4>
                    <p>Address:8-2-120/115/3, Venkat Nagar, Banjara Hills, Hyderabad, Telangana 500033</p>
                    <p>Phone: +914040112038, +919618980044 </p>
                    <p>Email: fototechportal@gmail.com </p>
                </div>
                @endif
                @if($footer->admin_footer_mobile_app_feature==1)
                <div class="col-md-4 fot-app">
                    <h4>DOWNLOAD OUR FREE MOBILE APPS</h4>
                    <ul>
                        <li><a href="{{$footer->mobile_app_andriod}}"><img src="{{asset('')}}frontend/images/gstore.png" alt=""></a>
                        </li>
                        <li><a href="{{$footer->mobile_app_ios}}"><img src="{{asset('')}}frontend/images/astore.png" alt=""></a>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="col-md-4 fot-soc">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <li><a target="_blank" href="{{$footer->footer_linked_in}}"><img src="{{asset('')}}frontend/images/social/1.png" alt=""></a></li>
                        <li><a target="_blank" href="{{$footer->footer_twitter}}"><img src="{{asset('')}}frontend/images/social/2.png" alt=""></a></li>
                        <li><a target="_blank" href="{{$footer->footer_fb}}"><img src="{{asset('')}}frontend/images/social/3.png" alt=""></a></li>
                        <li><a target="_blank" href="{{$footer->footer_google_plus}}"><img src="{{asset('')}}frontend/images/social/4.png" alt=""></a></li>
                        <li><a target="_blank" href="{{$footer->footer_youtube}}"><img src="{{asset('')}}frontend/images/social/5.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            @if($footer->admin_country_list_feature==1)
            <div class="row foot-count">
                <ul>
                    <li><a target="_blank" href="{{$footer->footer_country_url_1}}/">{{$footer->footer_country_name_1}}</a></li>
                    <li><a target="_blank" href="{{$footer->footer_country_url_2}}/">{{$footer->footer_country_name_2}}</a></li>
                    <li><a target="_blank" href="{{$footer->footer_country_url_3}}/">{{$footer->footer_country_name_3}}</a></li>
                    <li><a target="_blank" href="{{$footer->footer_country_url_4}}/">{{$footer->footer_country_name_4}}</a></li>
                    <li><a target="_blank" href="{{$footer->footer_country_url_5}}/">{{$footer->footer_country_name_5}}</a></li>
                    <li><a target="_blank" href="{{$footer->footer_country_url_6}}/">{{$footer->footer_country_name_6}}</a></li>
                    <li><a target="_blank" href="{{$footer->footer_country_url_7}}/">{{$footer->footer_country_name_7}}</a></li>
                </ul>
            </div>
            @endif
        </div>
</section>

    <!-- START -->
    <section>
        <div class="cr">
            <div class="container">
                <div class="row">
                    <p>Copyright ©{{$footer->copyright_year}} <a href="{{$footer->copyright_website_link}}" target="_blank">{{$footer->copyright_website}}</a>. Proudly powered by <a href="https://fototechportal.com/" target="_blank">Fototech India</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <div class="fqui-menu">
        <ul>
            <li><a href="{{route('index')}}"><img src="{{asset('')}}frontend/images/icon/home.png">Home</a></li>
            <li><span class="mob-sear"><img src="{{asset('')}}frontend/images/icon/search1.png">Search</span></li>
            <li><a href="{{route('all-category')}}" class="act"><img src="{{asset('')}}frontend/images/icon/shop.png">Services</a></li>
            <li><a href="{{route('experts')}}"><img src="{{asset('')}}frontend/images/icon/expert.png">Service Experts</a></li>
            <li><a href="{{route('jobs')}}"><img src="{{asset('')}}frontend/images/icon/employee.png">Jobs</a></li>
            <li><a href="{{route('places')}}"><img src="{{asset('')}}frontend/images/places/icons/hot-air-balloon.png">Explore Locations</a></li>
            <li><a href="{{route('all-news')}}"><img src="{{asset('')}}frontend/images/icon/news.png">News & Magazines</a></li>
            <li><a href="{{route('events')}}"><img src="{{asset('')}}frontend/images/icon/calendar.png">Events</a></li>
            <li><a href="{{route('all-products')}}"><img src="{{asset('')}}frontend/images/icon/cart.png">Products</a></li>
            <li><a href="{{route('coupons')}}"><img src="{{asset('')}}frontend/images/icon/coupons.png">Coupons</a></li>
            <li><a href="{{route('community')}}"><img src="{{asset('')}}frontend/images/icon/11.png">Community</a></li>
            <li><span class="#"><img src="{{asset('')}}frontend/images/icon/how1.png">Support</span></li>
        </ul>
    </div>
    <!-- END -->
    <!-- /Footer Content -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  