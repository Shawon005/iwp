                 <div class="hom-top">
                    <div class="container">
                        <div class="row">
                            <div class="hom-nav "><!--MOBILE MENU-->
                                <a href="{{route('index')}}" class="top-log"><img class="ic-logo" src="{{asset('/storage/file/'.Nam('vv_footer','footer_id','1','header_logo'))}}" style="width: {{Nam('vv_footer','footer_id','1','header_logo_width')}}; height: {{Nam('vv_footer','footer_id','1','header_logo_height')}};" alt="" ></a>
                                <div class="menu">
                                    <h4>Explore</h4>
                                    @php $footer=footer(); @endphp
                                </div>
                                <div class="pop-menu">
                                    <div class="container">
                                        <div class="row">
                                            <i class="material-icons clopme">close</i>
                                            <div class="pmenu-spri">
                                                <ul>
                                                    <li><a href="{{route('all-category')}}" class="act"> <img src="{{asset('')}}frontend/images/icon/shop.png"> Photo Directory</a></li>
                                                    <li><a href="{{route('mystore')}}" class="act"><img src="{{asset('')}}frontend/images/icon/mystore.png">Store</a></li>
                                                    @if($footer->admin_expert_show)
                                                    <li><a href="{{route('experts')}}" class="act"> <img src="{{asset('')}}frontend/images/icon/expert.png">Service Experts </a></li>
                                                    @endif
                                                    @if($footer->admin_job_show)
                                                    <li><a href="{{route('jobs')}}" class="act"><img src="{{asset('')}}frontend/images/icon/employee.png"> Jobs </a></li>
                                                    @endif
                                                    @if($footer->admin_place_show)
                                                    <li><a href="{{route('places')}}" class="act"><img src="{{asset('')}}frontend/images/places/icons/hot-air-balloon.png">Explore Locations </a></li>
                                                    @endif
                                                    @if($footer->admin_news_show)
                                                    <li><a href="{{route('all-news')}}"><img src="{{asset('')}}frontend/images/icon/news.png">News & Magazines </a></li>
                                                    @endif
                                                    @if($footer->admin_event_show)
                                                    <li><a href="{{route('events')}}"><img src="{{asset('')}}frontend/images/icon/calendar.png">Events </a></li>
                                                    @endif
                                                    @if($footer->admin_product_show)
                                                    <li><a href="{{route('product/categories')}}"><img src="{{asset('')}}frontend/images/icon/cart.png">Products</a></li>
                                                    @endif
                                                    @if($footer->admin_coupon_show)
                                                    <li><a href="{{route('coupons')}}"><img src="{{asset('')}}frontend/images/icon/coupons.png">Coupon & offers</a></li>
                                                    @endif
                                                    <li><a href="{{route('community')}}"><img src="{{asset('')}}frontend/images/icon/11.png">Parivar</a></li>
                                                </ul>
                                            </div>
                                            <div class="pmenu-cat">
                                                <h4>All Categories</h4>
                                                <input type="text" id="pg-sear" placeholder="Search category">
                                                <ul id="pg-resu">
                                                    @php $category=table('vv_categories'); @endphp
                                                    @foreach($category as $cat)
                                                    <li>
                                                        <a href="{{route('all-listings',['id'=>$cat->category_id])}}">{{$cat->category_name}} -<span>{{CountCol('vv_listings','category_id',$cat->category_id)}}</span></a>
                                                    </li>
                                                    @endforeach
                                                  
                                                </ul>
                                            </div>
                                            <div class="dir-home-nav-bot">
                                                <ul>
                                                    <li>
                                                        A few reasons you’ll love Online Business Poratl & Parivar
                                                        <span>Call us on: +91 9989169278</span>
                                                    </li>
                                                    <li>
                                                        @if(session('user_C')=='true')
                                                        <a href="{{route('post-your-ads')}}" class="waves-effect waves-light btn-large"><i class="material-icons">font_download</i> Advertise with us </a>
                                                        @else
                                                        <a href="{{route('ads_post')}}" class="waves-effect waves-light btn-large"><i class="material-icons">font_download</i> Advertise with us </a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <a href="{{route('pricing-details')}}" class="waves-effect waves-light btn-large"> <i class="material-icons">store</i> Add your business</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END MOBILE MENU-->
                                <div class="top-ser">
                                    <form name="filter_form" id="filter_form" class="filter_form">
                                        <ul>
                                            <li class="sr-sea">
                                                <input type="text" autocomplete="off" id="top-select-search" placeholder="What are you looking for?">
                                                <ul id="tser-res1" class="tser-res tser-res2">
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
                                                            <a href="service-experts/index.html"></a>
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

                                            <li class="sbtn">
                                                <button type="button" class="btn btn-success" id="top_filter_submit"><i
                                                        class="material-icons" >&nbsp;</i></button>
                                            </li>
                                        </ul>
                                    </form>
                                  </div>
                              
                                @if(session('user_C')=='true')
                                <input type="text" type=""class="d-none {{$user=session('user_id')}}">
                                @else
                                <input type="text" type=""class="d-none {{$user=0}}">
                                @endif
                               
                                <!-- <ul class="bl {{($user==0)?'d-none':''}}">
                                <li>
                                    <a href="{{route('user_logout')}}"><img src="images/icon/dbl12.png" alt="">Log Out</a>
                                </li>
                                </ul> -->
                                @php $plan=Nam('vv_users','user_id',session('user_id'),'user_plan') @endphp
                                 @php $notip=sub('vv_notifications','notification_user',$plan); @endphp
                                <div class="top-noti {{(session('user_C')=='true')?'':'d-none'}}">
                                    <span class="material-icons db-menu-noti"><i id="noti-count">{{sprintf("%02d",count($notip))}}</i>notifications</span>
                                    <div class="db-noti top-noti-win">
                                        <span class="material-icons db-menu-clo">close</span>
                                        <h4>Notifications</h4>
                                            <ul id="all-notif-ul">
                                                   
                                                    @foreach($notip as $noti)
                                                    <li>
                                                        <a target="_blank" href="{{$noti->notification_link}}">
                                                            <h5>{{$noti->notification_title}}</h5>
                                                            <p>{{$noti->notification_message}}</p>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                            </ul>
                                            @if($notip==null)
                                        <span id="no-noti-clr-noti" class="no-noti-clr-noti">No Notifications to Show</span>
                                        @endif
                                    </div>
                                </div>
                                <ul class="bl {{($user!=0)?'d-none':''}}">
                                    <li>
                                        <a href="{{route('pricing-details')}}">Add business</a>
                                    </li>
                                    <li>
                                        <a href="{{route('ui_login')}}">Sign in</a>
                                    </li>
                                    <li>
                                        <a href="{{route('register')}}">Create an account</a>
                                    </li>
                                   
                                
                                    
                                </ul>
                                <div class="al {{($user==0)?'d-none':''}}">
                                    <div class="head-pro">
                                        <img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$user,'profile_image'))}}" alt="User" title="Go to dashboard">
                                        <span class="fclick near-pro-cta"></span>
                                    </div>
                                    <div class="db-menu">
                                        <span class="material-icons db-menu-clo">close</span>
                                        <div class="ud-lhs-s1">
                                            <img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$user,'profile_image'))}}" alt="">
                                            <div class="ud-lhs-pro-bio">    
                                            <h4>{{user($user)}}</h4>
                                            <b>Join on{{dateFormatconverter(Nam('vv_users','user_id',$user,'user_cdt'))}}</b>
                                            <a class="ud-lhs-view-pro" target="_blank" href="{{route('profile',['id'=>$user])}}">My Profile</a>
                                            </div>   
                                        </div>
                                        <ul>
                                        <li>
                                                <a href="{{route('user/dasboard')}}" class="db-lact">
                                                    <img src="{{asset('')}}userend/images/icon/dbl1.png" alt="" />My Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="{{route('user_all_listing')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/shop.png" alt="" />All Listings</a>
                                            </li>
                                            <li>
                                                <a href="{{route('user_add_listing')}}">
                                                    <img src="{{asset('')}}userend/images/icon/dbl3.png" alt="" />Add New Listing</a>
                                            </li>
                                            <li>
                                                <a href="{{route('my-order')}}"><img src="{{asset('')}}userend/images/icon/cart.png">My Orders</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-all-job')}}"><img src="{{asset('')}}userend/images/icon/cart.png">Jobs</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-all-product')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/cart.png" alt="" />All Products</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-events')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/calendar.png" alt="" />Events</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-coupons')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/coupons.png" alt="" />Coupons</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-enquiry')}}" class=""><img src="{{asset('')}}userend/images/icon/tick.png" alt="" />Lead enquiry</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-service-expert')}}"><img src="{{asset('')}}userend/images/icon/tick.png">Service Expert Leads</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-payment')}}" class=""><img src="{{asset('')}}userend/images/icon/dbl9.png" alt="">Payment & plan</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-promote')}}" class=""><img src="{{asset('')}}userend/images/icon/promotion.png" alt="" />Promotions</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-seo')}}" class=""><img src="{{asset('')}}userend/images/icon/seo.png" alt="" />SEO</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-points-history')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/point.png" alt="" />Points History</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-post-ads')}}" class=""><img src="{{asset('')}}userend/images/icon/dbl11.png" alt="" />Ad Summary</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-invoice')}}" class=""><img src="{{asset('')}}userend/images/icon/dbl16.png" alt="" />Payment invoice</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-affilate-dashboard')}}"><img src="{{asset('')}}userend/images/icon/dbl16.png">Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="{{route('affiliate-withdrawal-request')}}"><img src="{{asset('')}}userend/images/icon/dbl16.png">Withdrawal Request</a>
                                            </li>
                                            <li>
                                                <a href="{{route('affiliate-withdrawal-history')}}"><img src="{{asset('')}}userend/images/icon/dbl16.png">Withdrawal History</a>
                                            </li>
                                            <li>
                                                <a href="{{route('affiliate-commission-history')}}"><img src="{{asset('')}}userend/images/icon/dbl16.png">Affiliate Commission History</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-profile')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl6.png" alt="" />My Profile</a>
                                            </li>
                                            @php $expert=first('vv_experts','user_id',session('user_id')); @endphp
                                            @if($expert!=null)
                                            <li>
                                                <a href="{{route('service-expert')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl6.png" alt="" />Service Expert Profile</a>
                                            </li>
                                            @endif
                                            @php $job=first('vv_jobs','user_id',session('user_id')); @endphp
                                            @if($job!=null)
                                            <li>
                                                <a href="{{route('job-profile')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl6.png" alt="" />Job Profile</a>
                                            </li>
                                            @endif

                                            <li>
                                                <a href="{{route('db-applied-job')}}"><img src="{{asset('')}}userend/images/icon/dbl13.png">All Applied Jobs</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-service-bookings')}}"><img src="{{asset('')}}userend/images/icon/dbl13.png">	My Service Bookings</a>
                                            </li>
                                            <!-- <li>
                                                <a href="db-blog-posts.html" class=""><img src="{{asset('')}}userend/images/icon/blog1.png" alt="" />Blog posts</a>
                                            </li> -->
                                            <li>
                                                <a href="{{route('db-review')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl13.png" alt="" />Reviews</a>
                                            </li>
                                            <!--<li>
                                            <a href="db-message" class=""><img src="{{asset('')}}userend/images/icon/dbl14.png" alt="" />Messages</a>
                                        </li>-->
                                            <li>
                                                <a href="{{route('db-like-listing')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl15.png" alt="" />Liked Listings</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-following')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl18.png" alt="" />Followings</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-notification')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl19.png" alt="" />Notifications</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-how-to')}}" class="" target="_blank">
                                                    <img src="{{asset('')}}userend/images/icon/dbl17.png" alt="" />How to's</a>
                                            </li>
                                            <li>
                                                <a href="{{route('db-setting')}}" class="">
                                                    <img src="{{asset('')}}userend/images/icon/dbl210.png" alt="" />Setting</a>
                                            </li>
                                            <li>
                                                <a href="{{route('user_logout')}}">
                                                    <img src="{{asset('')}}userend/images/icon/dbl12.png" alt="" />Log Out</a>
                                            </li>
										</ul>
                                    </div>
                                </div>
                              
                                <!--MOBILE MENU-->
                                <div class="mob-menu">
                                    <div class="mob-me-ic"><i class="material-icons">menu</i></div>
                                    <div class="mob-me-all">
                                        <div class="mob-me-clo"><i class="material-icons">close</i></div>
                                        <div class="mv-bus">
                                            <h4></h4>
                                            <ul>
                                                <li>
                                                    <a href="{{route('pricing-details')}}">Add business</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('ui_login')}}">Sign in</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('register')}}">Create an account</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mv-cate">
                                            <h4>All Categories</h4>
                                            <ul>
                                                   @foreach($category as $cat)
                                                    <li>
                                                        <a href="{{route('all-listings',['id'=>$cat->category_id])}}">{{$cat->category_name}} -<span>{{CountCol('vv_listings','category_id',$cat->category_id)}}</span></a>
                                                    </li>
                                                    @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--END MOBILE MENU-->
                            </div>
                        </div>
                    </div>
                </div>