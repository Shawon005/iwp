
				<div class="hom-top">
					<div class="container">
						<div class="row">
							<div class="hom-nav  db-open ">
								<!--MOBILE MENU-->
								<!--<div class="menu">
                                <i class="material-icons mopen">menu</i>
                            </div>-->
								<a href="{{route('index')}}" class="top-log">
									<img src="{{asset('')}}frontend/images/home/logo.png" style="width:75px; height:auto" alt="" class="ic-logo">
								</a>
								<div class="menu">
									<h4>Explore</h4>
								</div>
								<div class="pop-menu">
									<div class="container">
										<div class="row"> <i class="material-icons clopme">close</i>
											<div class="pmenu-spri">
												<ul>
													<li>
														<a href="{{route('all-category')}}" class="act">
															<img src="{{asset('')}}frontend/images/icon/shop.png">All Services</a>
													</li>
													<li>
														<a href="{{route('events')}}">
															<img src="{{asset('')}}frontend/images/icon/calendar.png">Events</a>
													</li>
													<li>
														<a href="{{route('all-products')}}">
															<img src="{{asset('')}}frontend/images/icon/cart.png">Products</a>
													</li>
													<li>
														<a href="{{route('coupons')}}">
															<img src="{{asset('')}}frontend/images/icon/coupons.png">Coupon & deals</a>
													</li>
													<li>
														<a href="{{route('blog-posts')}}">
															<img src="{{asset('')}}frontend/images/icon/blog1.png">Blogs</a>
													</li>
													<li>
														<a href="{{route('community')}}">
															<img src="{{asset('')}}frontend/images/icon/11.png">Parivar</a>
													</li>
												</ul>
											</div>
											<div class="pmenu-cat">
												<h4>All Categories</h4>
												<input type="text" id="pg-sear" placeholder="Search category">
												<ul id="pg-resu">
													<li><a href="{{route('all-listing')}}">Wedding halls - <span>03</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Hotel & Food - <span>01</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Pet shop - <span>12</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Digital Products - <span>31</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Spa and Facial - <span>10</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Real Estate - <span>23</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Sports - <span>05</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Education - <span>02</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Electricals - <span>05</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Automobiles - <span>06</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Transportation - <span>02</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Hospitals - <span>08</span></a>
													</li>
													<li><a href="{{route('all-listing')}}">Hotels And Resorts - <span>09</span></a>
													</li>
												</ul>
											</div>
											<div class="dir-home-nav-bot">
												<ul>
													<li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span> 
													</li>
													<li><a href="{{route('ads_post')}}" class="waves-effect waves-light btn-large"><i class="material-icons">font_download</i> Advertise with us</a>
													</li>
													<li>
														<a href="pricing-details.html.html" class="waves-effect waves-light btn-large"> <i class="material-icons">store</i> Add your business</a>
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
												<!--                                            <input type="text"  id="-->
												<!--" class="autocomplete"-->
												<!--                                                   placeholder="-->
												<!--">-->
												<input type="text" autocomplete="off" id="top-select-search" placeholder="Search for services and business...">
												<ul id="tser-res1" class="tser-res tser-res2">
													<li>
														<div>
															<h4>The Royal Spa Center For Womens</h4>
															<span>No:2, 4th Avenue, Newyork, USA, Near to Airport</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Real estate</h4>
															<span>Chennai, India</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Education</h4>
															<span>Schools, university, colleges, online classes, tution centers, distance education..</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Hotel and resort booking</h4>
															<span>hotel booking online, hotel reservation, holiday room booking</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Import and export</h4>
															<span>Import and export to other countrys with low cost</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Properties in Illunois</h4>
															<span>Villas, Plots, House rent and buy</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Schools in Adyar</h4>
															<span>schools, adyar, education, </span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Laptop services near you</h4>
															<span>laptop services, computer services</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
													<li>
														<div>
															<h4>Hospital and medical services near you</h4>
															<span>Hospital and medical services near you</span>
															<a href="{{route('all-listing')}}"></a>
														</div>
													</li>
												</ul>
											</li>
											<li class="sbtn">
												<button type="button" class="btn btn-success" id="top_filter_submit"><i class="material-icons">&nbsp;</i>
												</button>
											</li>
										</ul>
									</form>
								</div>
                              <div class="al mt-2">
								<ul class="head-pro d-inline">
                                
                                    <li class="d-inline p-1">
                                        <a style="color:white ; margin-right:15px" href="{{route('sign-up')}}">Sign in</a>
                                    </li>
                                    <li class="d-inline btn-primary p-1">
                                        <a style="color:white" href="http://iwpdirectory.in/login?login=register">Create an account</a>
                                    </li>
                                </ul>
                              </div>
								<!-- <div class="al">
									<div class="head-pro">
										<img src="{{asset('')}}frontend/images/user/logo.png" alt=""> <b>Profile by</b>
										<br>
										<h4>Rn53 Themes</h4>
										<a href="{{route('dashboard')}}" class="fclick"></a>
									</div> -->
									<!-- <div class="db-menu">
										<ul>
											<li>
												<a href="dashboard.html" class="db-lact">
													<img src="{{asset('')}}frontend/images/icon/dbl1.png" alt="" />My Dashboard</a>
											</li>
											<li>
												<a href="db-{{route('all-listing')}}">
													<img src="{{asset('')}}frontend/images/icon/dbl7.png" alt="" />All Listings</a>
											</li>
											<li>
												<a href="add-listing-start.html" class="tz-lma">
													<img src="{{asset('')}}frontend/images/icon/dbl3.png" alt="" />Add New Listing</a>
											</li>
											<li>
												<a href="db-enquiry.html">
													<img src="{{asset('')}}frontend/images/icon/dbl14.png" alt="" />Lead enquiry</a>
											</li>
											<li>
												<a href="db-events.html">
													<img src="{{asset('')}}frontend/images/icon/dbl4.png" alt="" />Events</a>
											</li>
											<li>
												<a href="db-blog-posts.html">
													<img src="{{asset('')}}frontend/images/icon/dbl10.png" alt="" />Blog posts</a>
											</li>
											<li>
												<a href="db-review.html">
													<img src="{{asset('')}}frontend/images/icon/dbl13.png" alt="" />Reviews</a>
											</li>
											<li>
												<a href="db-my-profile.html">
													<img src="{{asset('')}}frontend/images/icon/dbl6.png" alt="" />My Profile</a>
											</li>
											<li>
												<a href="#">
													<img src="{{asset('')}}frontend/images/icon/dbl12.png" alt="" />Log Out</a>
											</li>
										</ul>
									</div> -->
								<!-- </div> -->
								<!--MOBILE MENU-->
								<div class="mob-menu">
									<div class="mob-me-ic"><i class="material-icons">menu</i>
									</div>
									<div class="mob-me-all">
										<div class="mob-me-clo"><i class="material-icons">close</i>
										</div>
										<div class="mv-pro ud-lhs-s1">
											<img src="{{asset('')}}frontend/images/user/62736rn53themes.png" alt="">
											<h4>Rn53 Themes</h4>
											<b>Join on 26, Mar 2021</b>
										</div>
										<div class="mv-pro-menu ud-lhs-s2">
											<ul>
												<li>
													<a href="dashboard.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl1.png" alt="" />My Dashboard</a>
												</li>
												<li>
													<a href="db-{{route('all-listing')}}" class="">
														<img src="{{asset('')}}frontend/images/icon/shop.png" alt="" />All Listings</a>
												</li>
												<li>
													<a href="add-listing-start.html">
														<img src="{{asset('')}}frontend/images/icon/dbl3.png" alt="" />Add New Listing</a>
												</li>
												<li>
													<a href="db-enquiry.html" class="">
														<img src="{{asset('')}}frontend/images/icon/tick.png" alt="" />Lead enquiry</a>
												</li>
												<li>
													<a href="db-products.html" class="">
														<img src="{{asset('')}}frontend/images/icon/cart.png" alt="" />All Products</a>
												</li>
												<li>
													<a href="db-events.html" class="">
														<img src="{{asset('')}}frontend/images/icon/calendar.png" alt="" />Events</a>
												</li>
												<li>
													<a href="db-blog-posts.html" class="">
														<img src="{{asset('')}}frontend/images/icon/blog1.png" alt="" />Blog posts</a>
												</li>
												<li>
													<a href="db-coupons.html" class="">
														<img src="{{asset('')}}frontend/images/icon/coupons.png" alt="" />Coupons</a>
												</li>
												<li>
													<a href="db-promote.html" class="">
														<img src="{{asset('')}}frontend/images/icon/promotion.png" alt="" />Promotions</a>
												</li>
												<li>
													<a href="db-seo.html" class="">
														<img src="{{asset('')}}frontend/images/icon/seo.png" alt="" />SEO</a>
												</li>
												<li>
													<a href="db-review.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl13.png" alt="" />Reviews</a>
												</li>
												<li>
													<a href="db-message.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl14.png" alt="" />Messages</a>
												</li>
												<li>
													<a href="db-my-profile.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl6.png" alt="" />My Profile</a>
												</li>
												<li>
													<a href="db-like-listings.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl15.png" alt="" />Liked Listings</a>
												</li>
												<li>
													<a href="db-followings.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl18.png" alt="" />Followings</a>
												</li>
												<li>
													<a href="db-post-ads.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl11.png" alt="" />Ad Summary</a>
												</li>
												<li>
													<a href="db-payment.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl9.png" alt="">Payment & plan</a>
												</li>
												<li>
													<a href="db-invoice-all.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl16.png" alt="" />Payment invoice</a>
												</li>
												<li>
													<a href="db-notifications.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl19.png" alt="" />Notifications</a>
												</li>
												<li>
													<a href="how-to.html" class="" target="_blank">
														<img src="{{asset('')}}frontend/images/icon/dbl17.png" alt="" />How to's</a>
												</li>
												<li>
													<a href="db-setting.html" class="">
														<img src="{{asset('')}}frontend/images/icon/dbl210.png" alt="" />Setting</a>
												</li>
												<li>
													<a href="#">
														<img src="{{asset('')}}frontend/images/icon/dbl12.png" alt="" />Log Out</a>
												</li>
											</ul>
										</div>
										<div class="mv-cate">
											<h4>All Categories</h4>
											<ul>
												<li> <a href="{{route('all-listing')}}">Wedding halls</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Hotel & Food</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Pet shop</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Digital Products</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Spa and Facial</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Real Estate</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Sports</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Education</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Electricals</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Automobiles</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Transportation</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Hospitals</a>
												</li>
												<li> <a href="{{route('all-listing')}}">Hotels And Resorts</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!--END MOBILE MENU-->
							</div>
						</div>
					</div>
				</div>