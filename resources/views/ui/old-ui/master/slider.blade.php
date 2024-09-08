<section class=" ud">
		<div class="ud-inn">
			<!--LEFT SECTION-->
			@php $user=session('user_id'); @endphp
			<div class="ud-lhs">
				<div class="ud-lhs-s1">	
                <img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$user,'profile_image'))}}" alt="">
                 <div class="ud-lhs-pro-bio">
                <h4>{{user($user)}}</h4>
                <b>Join on {{dateFormatconverter(Nam('vv_users','user_id',$user,'user_cdt'))}}</b>
                <a class="ud-lhs-view-pro" target="_blank" href="{{route('profile',['id'=>$user])}}">My Profile</a>
                </div>
				</div>
				<div class="ud-lhs-s2">
					<ul>
						<li>
							<a href="{{route('user/dasboard')}}" class="db-lact">
								<img src="{{asset('')}}userend/images/icon/dbl1.png" alt="" />My Dashboard</a>
						</li>
						<li>
							<h4 class="mt-2">ALL MODULES</h4>
						</li>
						<li>
							<a href="{{route('user_all_listing')}}" class="">
								<img src="{{asset('')}}userend/images/icon/shop.png" alt="" />All Listings</a>
						</li>
						<!-- <li>
							<a href="add-listing-start.html">
								<img src="{{asset('')}}userend/images/icon/dbl3.png" alt="" />Add New Listing</a>
						</li> -->
						<li>
							<a href="{{route('my-order')}}"><img src="{{asset('')}}userend/images/icon/cart.png">My Orders</a>
						</li>
						<li>
							<a href="{{route('db-all-job')}}"><img src="{{asset('')}}frontend/images/icon/employee.png">Jobs</a>
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
							<a href="{{route('users.places.index')}}" class="">
								<img src="{{asset('')}}frontend/images/places/icons/hot-air-balloon.png" alt="" />Places</a>
						</li>
						<li>
							<h4 class="mt-2">LEADS & INQUIRY</h4>
						</li>
						<li>
							<a href="{{route('db-enquiry')}}" class=""><img src="{{asset('')}}userend/images/icon/tick.png" alt="" />Lead enquiry</a>
						</li>
						<li>
							<a href="{{route('db-service-expert')}}"><img src="{{asset('')}}userend/images/icon/tick.png">Service Expert Leads</a>
						</li>
						<li>
							<h4 class="mt-2">Payment & Promotions</h4>
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
							<h4 class="mt-2">Product Affiliation</h4>
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
							<h4 class="mt-2">PROFILE PAGES</h4>
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
				      
						<li>
							<a href="{{route('job-profile')}}" class="">
								<img src="{{asset('')}}userend/images/icon/dbl6.png" alt="" />Job Profile</a>
						</li>
						
						<li>
							<h4 class="mt-2">MY ACTIVITIES</h4>
						</li>
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