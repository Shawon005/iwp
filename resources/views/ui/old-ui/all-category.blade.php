@extends('main.master')
@section('content')
	<!-- START -->

	<!-- END -->
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
                <img src="{{asset('')}}frontend/images/slider/" alt="Los Angeles" width="1100" height="500">
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
										<img src="{{asset('')}}frontend/images/services/29.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Real Estate </a><span>23</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Villas                                                        <span>87</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Indepentant House                                                        <span>45</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Plots and Lands                                                        <span>80</span></a>
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
										<img src="{{asset('')}}frontend/images/services/10.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Hotels And Resorts </a><span>987</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Street food                                                        <span>23</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Coffee shop                                                        <span>234</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Food hotel                                                        <span>423</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Beach Resort                                                        <span>52</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Resort                                                        <span>86</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Hotels                                                        <span>33</span></a>
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
										<img src="{{asset('')}}frontend/images/services/17.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Pet shop </a><span>12</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Buy dogs                                     <span>765</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Puppy dog types                                                        <span>76</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Other pets                                                        <span>40</span></a>
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
										<img src="{{asset('')}}frontend/images/services/18.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Digital Products </a><span>1238</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Smart classes                                                        <span>22</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Health care products                                                        <span>898</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Website Template                                                        <span>988</span></a>
											</li>
                                            <li> <a href="{{route('all-listing')}}">Ebooks                                         <span>11</span></a>
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
										<img src="{{asset('')}}frontend/images/services/21.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Spa and Facial </a><span>5321</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Health & Beauty                                                        <span>230</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Health &Beauty                                                        <span>64</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Face & Body                                                        <span>72</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Massage                                                        <span>321</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Facial                                                        <span>532</span></a>
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
										<img src="{{asset('')}}frontend/images/services/22.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Wedding halls </a><span>03</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Seminar hall                                                        <span>00</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Party hall                                                        <span>01</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Marriage hall                                                        <span>00</span></a>
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
										<img src="{{asset('')}}frontend/images/services/23.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Sports </a><span>05</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Cycling                                                        <span>231</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Swimming                                                        <span>342</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Sports Kits Shop                                                        <span>764</span></a>
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
										<img src="{{asset('')}}frontend/images/services/28.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Education </a><span>235</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Tution Centers                                                        <span>45</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Colleges                                                        <span>23</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Schools                                                        <span>632</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Pre kg and Child care                                                        <span>342</span></a>
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
										<img src="{{asset('')}}frontend/images/services/25.jpeg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Electricals </a><span>95</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Panel                                                        <span>70</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Power                                                        <span>35</span></a>
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
										<img src="{{asset('')}}frontend/images/services/4.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Automobiles </a><span>245</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Bike Showrooms                                                        <span>23</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Car showrooms                                                        <span>76</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Car and Bike Services                                                        <span>65</span></a>
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
										<img src="{{asset('')}}frontend/images/services/1.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Transportation </a><span>432</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Bike Services                                                        <span>40</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Bus Tickets                                                        <span>231</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Cab services                                                        <span>40</span></a>
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
										<img src="{{asset('')}}frontend/images/services/30.jpg" alt="">
									</div>
									<div class="rhs">
										<h4>
                                            <a href="{{route('all-listing')}}">Hospitals </a><span>1258</span>
                                        </h4>
										<ol>
											<li> <a href="{{route('all-listing')}}">Community Hospitals                                                        <span>455</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Clinics                                                        <span>890</span></a>
											</li>
											<li> <a href="{{route('all-listing')}}">Child Hospitals                                                        <span>83</span></a>
											</li>
										</ol>
									</div>
								</div>
							</li>
						</ul>
						<!--                    <ul>-->
						<!--                        -->
						<!--                            <li>-->
						<!--                                <div class="sh-all-scat-box">-->
						<!--                                    <div class="lhs">-->
						<!--                                        <img src="{{asset('')}}frontend/images/services/-->
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
                            <img src="{{asset('')}}frontend/images/ads/ads2.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
	<!-- END -->
	<!-- START -->
@endsection