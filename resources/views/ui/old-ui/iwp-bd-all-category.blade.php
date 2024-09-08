
@extends('ui.old-ui.master.master2')
@section('content')

	<style>
		.hom-head {
		        padding: 0
		    }
		
		    .hom-head:before {
		        display: none
		    }
		
		    .hom-head .hom-top ~ .container {
		        display: none
		    }
		
		    .carousel-item:before {
		        background: none
		    }
		
		    .home-tit {
		        padding-top: 0
		    }
	</style>
	<!--<section>
    <div id="demo" class="carousel slide cate-sli" data-ride="carousel">
        <div class="carousel-inner">
                        <div class="carousel-item active">
                <img src="images/slider/" alt="Los Angeles" width="1100" height="500">
                <a href="" target="_blank"></a>
            </div>
                        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</section>-->
	<section class="abou-pg commun-pg-main">
		<div class="about-ban comunity-ban">
			<h1>All Services</h1>
			<p>Connect with the right Service Experts</p>
			<input type="text" id="tail-se" placeholder="Search sub category here..">
		</div>
	</section>
	<!-- START -->
	<section>
		<div class="str all-cate-pg">
			<div class="container">
				<div class="row">
					<div class="sh-all-scat">
                        <ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="http://iwpdirectory.in/images/services/21672photobook.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Photobooks </a><span>00</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">HP indigo<span>00</span></a>
											</li>
											<li> <a href="all-listing.html">konica Minolta                                                        <span>00</span></a>
											</li>
											<li> <a href="all-listing.html">Canon dream lab                                                        <span>00</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="http://iwpdirectory.in/images/services/42623traders.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html"> Photostore 03 </a><span></span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">accessories<span>03</span></a>
											</li>
											<li> <a href="all-listing.html">Cmera<span></span>03</a>
											</li>
											<!-- <li> <a href="all-listing.html">Food hotel                                                        <span>423</span></a>
											</li> -->
											<!-- <li> <a href="all-listing.html">Beach Resort                                                        <span>52</span></a>
											</li>
											<li> <a href="all-listing.html">Resort                                                        <span>86</span></a>
											</li>
											<li> <a href="all-listing.html">Hotels                                                        <span>33</span></a>
											</li> -->
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="http://iwpdirectory.in/images/services/24659sublimation.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html"> Sublimation 01 </a><span></span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Etc sublimention <span>01</span></a>
											</li>
											<li> <a href="all-listing.html">T shirt prient <span>01</span></a>
											</li>
											<li> <a href="all-listing.html">Mug prient<span>01</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="http://iwpdirectory.in/images/services/6395computers.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html"> Computers 00 </a><span></span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Computer SYSTEM<span>00</span></a>
											</li>
											<li> <a href="all-listing.html">Hard disks<span>00</span></a>
											</li>
											<li> <a href="all-listing.html">Laptops<span>00</span></a>
											</li>                                            
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="images/services/21.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Spa and Facial </a><span>5321</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Health & Beauty                                                        <span>230</span></a>
											</li>
											<li> <a href="all-listing.html">Health &Beauty                                                        <span>64</span></a>
											</li>
											<li> <a href="all-listing.html">Face & Body                                                        <span>72</span></a>
											</li>
											<li> <a href="all-listing.html">Massage                                                        <span>321</span></a>
											</li>
											<li> <a href="all-listing.html">Facial                                                        <span>532</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="images/services/22.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Wedding halls </a><span>03</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Seminar hall                                                        <span>00</span></a>
											</li>
											<li> <a href="all-listing.html">Party hall                                                        <span>01</span></a>
											</li>
											<li> <a href="all-listing.html">Marriage hall                                                        <span>00</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="images/services/23.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Sports </a><span>05</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Cycling                                                        <span>231</span></a>
											</li>
											<li> <a href="all-listing.html">Swimming                                                        <span>342</span></a>
											</li>
											<li> <a href="all-listing.html">Sports Kits Shop                                                        <span>764</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="images/services/28.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Education </a><span>235</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Tution Centers                                                        <span>45</span></a>
											</li>
											<li> <a href="all-listing.html">Colleges                                                        <span>23</span></a>
											</li>
											<li> <a href="all-listing.html">Schools                                                        <span>632</span></a>
											</li>
											<li> <a href="all-listing.html">Pre kg and Child care                                                        <span>342</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="images/services/25.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Electricals </a><span>95</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Panel                                                        <span>70</span></a>
											</li>
											<li> <a href="all-listing.html">Power                                                        <span>35</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="images/services/4.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Automobiles </a><span>245</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Bike Showrooms                                                        <span>23</span></a>
											</li>
											<li> <a href="all-listing.html">Car showrooms                                                        <span>76</span></a>
											</li>
											<li> <a href="all-listing.html">Car and Bike Services                                                        <span>65</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<ul id="tail-re">
							<li>
								<div class="sh-all-scat-box">
									<div class="lhs">
										<img src="images/services/1.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="all-listing.html">Transportation </a><span>432</span>
                                        </h4>
										<ol>
											<li> <a href="all-listing.html">Bike Services                                                        <span>40</span></a>
											</li>
											<li> <a href="all-listing.html">Bus Tickets                                                        <span>231</span></a>
											</li>
											<li> <a href="all-listing.html">Cab services                                                        <span>40</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<!--  -->
						<!--                    <ul>-->
						<!--                        -->
						<!--                            <li>-->
						<!--                                <div class="sh-all-scat-box">-->
						<!--                                    <div class="lhs">-->
						<!--                                        <img src="images/services/-->
						<!--" alt="">-->
						<!--                                    </div>-->
						<!--                                    <div class="rhs">-->
						<!--                                        <h4>-->
						<!-- <span>40</span></h4>-->
						<!--                                        <ol>-->
						<!--                                            <li><a href="#">Villas <span>23</span></a></li>-->
						<!--                                            <li><a href="#">Plots <span>12</span></a></li>-->
						<!--                                            <li><a href="#">Flots <span>08</span></a></li>-->
						<!--                                            <li><a href="#">Computer software <span>58</span></a></li>-->
						<!--                                            <li><a href="#">Mobile apps <span>64</span></a></li>-->
						<!--                                            <li><a href="#">Business softwares <span>86</span></a></li>-->
						<!--                                            <li><a href="#">Website design <span>90</span></a></li>-->
						<!--                                            <li><a href="#">Website apps <span>67</span></a></li>-->
						<!--                                            <li><a href="#">Website app development <span>56</span></a></li>-->
						<!--                                            <li><a href="#">Spa and facial <span>120</span></a></li>-->
						<!--                                            <li><a href="#">Facial <span>144</span></a></li>-->
						<!--                                        </ol>-->
						<!--                                    </div>-->
						<!--                                </div>-->
						<!--                            </li>-->
						<!--                            -->
						<!--                    </ul>-->
					</div>
				</div>
			</div>
	</section>
	<!-- END -->
	<!-- START -->
	<!--<section>
    <div class="hom-ads">
        <div class="container">
            <div class="row">
                <div class="filt-com lhs-ads">
                    <div class="ads-box">
                        <a href="listing-details.html">
                            <span>Ad</span>
                            <img src="images/ads/ads2.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
	<!-- END -->
	<!-- START -->
<span class="btn-ser-need-ani">Help & Support</span>
	<div class="ani-quo-form"> <i class="material-icons ani-req-clo">close</i>
		<div class="tit">
			<h3>What service do you need? <span>BizBook will help you</span></h3>
		</div>
		<div class="hom-col-req">
			<div id="home_slide_enq_success" class="log" style="display: none;">
				<p>Your Enquiry Is Submitted Successfully!!!</p>
			</div>
			<div id="home_slide_enq_fail" class="log" style="display: none;">
				<p>Something Went Wrong!!!</p>
			</div>
			<div id="home_slide_enq_same" class="log" style="display: none;">
				<p>You cannot make enquiry on your own listing</p>
			</div>
			<form name="home_slide_enquiry_form" id="home_slide_enquiry_form" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="listing_id" value="0" placeholder="" required>
				<input type="hidden" class="form-control" name="listing_user_id" value="0" placeholder="" required>
				<input type="hidden" class="form-control" name="enquiry_sender_id" value="" placeholder="" required>
				<input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required>
				<div class="form-group">
					<input type="text" name="enquiry_name" value="" required="required" class="form-control" placeholder="Enter name*">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" placeholder="Enter email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" value="" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required="">
				</div>
				<div class="form-group">
					<select name="enquiry_category" id="enquiry_category" class="form-control">
						<option value="">Select Category</option>
						<option value="19">Wedding halls</option>
						<option value="18">Hotel & Food</option>
						<option value="17">Pet shop</option>
						<option value="16">Digital Products</option>
						<option value="15">Spa and Facial</option>
						<option value="10">Real Estate</option>
						<option value="8">Sports</option>
						<option value="7">Education</option>
						<option value="6">Electricals</option>
						<option value="5">Automobiles</option>
						<option value="3">Transportation</option>
						<option value="2">Hospitals</option>
						<option value="1">Hotels And Resorts</option>
					</select>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
				</div>
				<input type="hidden" id="source">
				<button type="submit" id="home_slide_enquiry_submit" name="home_slide_enquiry_submit" class="btn btn-primary">Submit Requirements</button>
			</form>
		</div>
	</div>
	<!-- END -->
	<!-- START -->
	@endsection