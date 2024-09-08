@extends('ui.old-ui.master.master2')
@section('content')
<style>
	.hom-top {
	        display: none;
	    }
	
	    html {
	        scroll-behavior: smooth;
	    }
</style>


	<!-- END -->
	<!-- START -->
	<!-- //template-def //template-rhs -->
	<section class=" abou-pg comp-pro-pg">
		<div class="com-pro-pg-head">
			<div class="container">
				<div class="row">
					<div class="comp-head">
						<img src="{{asset('/storage/file/'.$company->company_banner_photo)}}" alt="">
						<ul>
							<li><a href="#about">About us</a>
							</li>
							<li><a href="#prod">Products</a>
							</li>
							<li><a href="#event">Events</a>
							</li>
							<li><a href="#blog">Blogs</a>
							</li>
							<li><a href="#home_enquiry_form" id="bus-pg-quot">Get quote</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="com-pro-pg-banner">
			<img src="{{asset('/storage/file/'.$company->company_banner_photo)}}" alt="">
		</div>
		<div class="com-pro-pg-bd">
			<div class="container">
				<div class="row">
					<!--START-->
					<div class="box-s1">
						<div class="pro-pg-logo">
							<img src="{{asset('/storage/file/'.$company->company_profile_photo)}}" alt="">
						</div>
						<div class="pro-pg-bio">
							<h1>{{$company->company_name}} <i class="li-veri" title="Verified"><img
                                    src="{{asset('')}}frontend/images/icon/svg/verified.png"></i></h1>
							<ul class="bio">
								<li><span><img
                                        src="{{asset('/storage/file/'.$company->company_profile_photo)}}">Address:{{$company->company_address}}</span>
								</li>
								<li>
									<a href="Tel:{{$company->company_mobile}}">
										<img src="{{asset('')}}frontend/images/social/phone.png">{{$company->company_mobile}}</a>
								</li>
								<li>
									<a href="{{$company->company_email_id}}">
										<img src="{{asset('')}}frontend/images/social/email.png"> {{$company->company_email_id}}</a>
								</li>
								<li>
									<a target="_blank" href="{{$company->company_website}}">
										<img src="{{asset('')}}frontend/images/social/web.png">/{{$company->company_website}}</a>
								</li>
								<li>
									<img src="{{asset('')}}frontend/images/social/tax.png">GSTN no: {{$company->company_tax}}</li>
							</ul>
							<ul class="soc">
								<li>
									<a href="{{$company->company_facebook}}" target="_blank">
										<img src="{{asset('')}}frontend/images/social/3.png">
									</a>
								</li>
								<li>
									<a href="{{$company->company_twitter}}" target="_blank">
										<img src="{{asset('')}}frontend/images/social/2.png">
									</a>
								</li>
								<li>
									<a href="{{$company->company_whatsapp}}" target="_blank">
										<img src="{{asset('')}}frontend/images/social/6.png">
									</a>
								</li>
								<li>
									<a href="{{$company->company_youtube}}" target="_blank">
										<img src="{{asset('')}}frontend/images/social/5.png">
									</a>
								</li>
							</ul>
						</div>
						<div class="pro-pg-cts"> <a href="#home_enquiry_form" class="cta1">Get quote</a>
							<a href="Tel:8765768675" class="cta2">Call now</a>
							<a target="_blank" href="https://wa.me/{{$company->company_whatsapp}}" class="cta3">WhatsApp</a>
						</div>
					</div>
					<!--END-->
					<!--START-->
					<div class="box-s2">
						<div class="lhs">
							<!--START-->
							<div class="comp-abo" id="about">
								<h2>About company</h2>
									<p>{{$company->company_description}}</p>
									
									<!-- <ul>
										<li>
											<h3><strong>Classified Templates</strong></h3>
											<p>{{$company->company_description}}</p>
										</li>
									
									</ul> -->
								</p>
							</div>
							<!--END-->
							<!--START-->
							<div class="comp-pro" id="prod">
								<h2>Products</h2>
								@php $products=arr($company->company_products); @endphp
                                @foreach($products as $product)
								@php $Cpro=first('vv_products','product_id',$product); @endphp
								@if($Cpro!=null)
								<div class="all-pro-box">
									<div class="all-pro-img">
										@php $pro=arr($Cpro->gallery_image); @endphp
										<img src="{{asset('/storage/file/'.$pro[0])}}">
									</div>
									<div class="all-pro-aut">
										<div class="auth">
											<a target="_blank" href="{{route('product/details',['id'=>$product])}}" class="fclick"></a>
										</div>
									</div>
									<div class="all-pro-txt">
										<h4>{{$Cpro->product_name}}</h4>
										<span class="pri"><b
                                                    class="pro-off">${{$Cpro->product_price}}</b> {{$Cpro->discount_val}}% off</span>
										<div class="links"> <a target="_blank" href="https://themeforest.net/item/bizbook-directory-listings-template/25391222">Buy now</a>
										</div>
									</div>
									<a target="_blank" href="{{route('product/details',['id'=>$product])}}" class="pro-view-full"></a>
								</div>
								@endif
								@endforeach
							</div>
							<!--END-->
							<!--START-->
							<div class="comp-pro" id="event">
								<h2>Events</h2>
								@php $products=arr($company->company_events);@endphp
                                @foreach($products as $product)
								@php $Cpro=first('vv_events','event_id',$product); @endphp
								  @if($Cpro!=null)
								<div class="land-pack-grid">
									<div class="land-pack-grid-img">
										<img src="{{asset('/storage/file/'.$Cpro->event_image)}}" alt="">
									</div>
									<div class="land-pack-grid-text">
										<h4>{{$Cpro->event_name}}</h4>
									</div>
									<a target="_blank" href="{{route('event/details',['id'=>$Cpro->event_id])}}"class="land-pack-grid-btn"></a>
								</div>
								@endif
								@endforeach
							</div>
							<!--END-->
							<!--START-->
							<div class="comp-pro" id="blog">
								<h2>Blogs</h2>
								@php $products=arr($company->company_blogs);@endphp
                                @foreach($products as $product)
								@php $Cpro=first('vv_blogs','blog_id',$product); @endphp
								  @if($Cpro!=null)
								<div class="land-pack-grid">
									<div class="land-pack-grid-img">
										<img src="{{asset('/storage/file/'.$Cpro->blog_image)}}" alt="">
									</div>
									<div class="land-pack-grid-text">
										<h4>{{$Cpro->blog_name}}</h4>
									</div>
									<a target="_blank" href="#" class="land-pack-grid-btn"></a>
								</div>
								@endif
								@endforeach
							</div>
							<!--END-->
						</div>
						<div class="rhs">
							<div class="cpro-form">
								<div class="box templ-rhs-eve">
									<div class="hot-page2-hom-pre-head">
										<h4>Send enquiry</h4>
									</div>
									<div class="templ-rhs-form">
										<div id="home_enq_success" class="log" style="display: none;">
											<p>Your Enquiry Is Submitted Successfully!!!</p>
										</div>
										<div id="home_enq_fail" class="log" style="display: none;">
											<p>Something Went Wrong!!!</p>
										</div>
										<div id="home_enq_same" class="log" style="display: none;">
											<p>You cannot make enquiry on your own listing</p>
										</div>
										<form name="home_enquiry_form" id="home_enquiry_form" method="post" enctype="multipart/form-data">
											@csrf
											<input type="hidden" class="form-control" name="listing_id" value="0" placeholder="" required>
											<input type="hidden" class="form-control" name="listing_user_id" value="0" placeholder="" required>
											<input type="hidden" class="form-control" name="enquiry_sender_id" value="{{session('user_id')}}" placeholder="" required>
											<input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required>
											<div class="form-group ic-user">
												<input type="text" name="enquiry_name" value="" required="required" class="form-control" placeholder="Enter name*" id="ic-user">
											</div>
											<div class="form-group ic-eml">
												<input type="email" class="form-control" placeholder="Enter email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
											</div>
											<div class="form-group ic-pho">
												<input type="text" class="form-control" value="" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required="">
											</div>
											<div class="form-group">
												<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
											</div>
											<input type="hidden" id="source">
											<button type="submit" id="home_enquiry_submit" name="home_enquiry_submit" class="btn btn-primary">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--END-->
				</div>
			</div>
		</div>
	</section>
	<!--END-->
	<!-- START -->

@endsection
	<!-- END -->
	<!-- START -->
