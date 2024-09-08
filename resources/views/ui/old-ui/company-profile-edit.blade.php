@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg edit-comp-pro">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Company/Business profile</span>
					<div class="log">
						<div class="login add-list-off comp-pro-edit">
							<h4>Edit Your company /Business profile</h4>
							<form action="{{route('company_profile_update',['id'=>$company->user_company_id])}}" class="company_profile_form" id="company_profile_form" name="company_profile_form" method="post" enctype="multipart/form-data">
								@csrf
							    <input type="hidden" id="company_profile_photo_old" value="39791rn53-themes.png" name="company_profile_photo_old" class="validate">
								<input type="hidden" id="company_banner_photo_old" value="43550pexels-francesco-ungaro-409127.jpg" name="company_banner_photo_old" class="validate">
								<input type="hidden" id="company_header_photo_old" value="96677rn53themes.png" name="company_header_photo_old" class="validate">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<h6>Company info</h6>
												<div class="form-group">
													<input type="text" name="company_name" id="company_name" value="{{$company->company_name}}" required="required" class="form-control" placeholder="Commpany name">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="company_address" value="{{$company->company_address}}" id="company_address" required="required" class="form-control" placeholder="Address">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_mobile" id="company_mobile" value="{{$company->company_mobile}}" required="required" class="form-control" placeholder="Phone">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_email_id" id="company_email_id" value="{{$company->company_email_id}}" required="required" class="form-control" placeholder="Email id">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_website" id="company_website" value="{{$company->company_website}}" class="form-control" placeholder="Website">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>GSTN Details:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="company_tax" id="company_tax" value="{{$company->company_tax}}" class="form-control" placeholder="Tax No./ GST No.">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>Social media:</h6>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_facebook" id="company_facebook" value="{{$company->company_facebook}}" class="form-control" placeholder="Facebook profile">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_twitter" id="company_twitter" value="{{$company->company_twitter}}" class="form-control" placeholder="Twitter profile">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_linkedin" id="company_linkedin" value="{{$company->company_linkedin}}" class="form-control" placeholder="Linkedin profile">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_instagram" id="company_instagram" value="{{$company->company_instagram}}" class="form-control" placeholder="Instagram profile">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_youtube" id="company_youtube" value="{{$company->company_youtube}}" class="form-control" placeholder="Youtube profile">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="company_whatsapp" id="company_whatsapp" value="{{$company->company_whatsapp}}" class="form-control" placeholder="WhatsApp No">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>About company:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="editor" required="required" name="company_description" id="company_description" placeholder="Product Details">
														{{$company->company_description}}
													</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<label>Header top logo(size 200X35):</label>
												<div class="form-group">
													<input type="file" name="comp_head_logo" class="form-control" accept="image/png, image/jpeg">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Banner logo(size 200X35):</label>
												<div class="form-group">
													<input type="file" name="comp_top_logo" class="form-control" accept="image/png, image/jpeg">
												</div>
											</div>
											<div class="col-md-6">
												<label>Banner background(size 250X250):</label>
												<div class="form-group">
													<input type="file" name="comp_bann_logo" class="form-control" accept="image/png, image/jpeg">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<!--                                    <h6>Choose Listings:</h6>-->
										<!--                                    <div class="row">-->
										<!--                                        <div class="col-md-12">-->
										<!--                                            <div class="form-group">-->
										<!--                                                <select data-placeholder="Select Listings"  name="company_listings[]" id="company_listings" class="chosen-select form-control">-->
										<!--                                                    <option value="">-->
										<!--</option>-->
										<!--                                                </select>-->
										<!--                                            </div>-->
										<!--                                        </div>-->
										<!--                                    </div>-->
										<!--FILED END-->
										<!--FILED START-->
										<h6>Choose Products:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select data-placeholder="Select products" multiple="multiple" name="company_products[]" id="company_products" class="chosen-select form-control">
														<option  value="">Select products</option>
														@php $Cproduct=arr($company->company_products);@endphp
														@foreach($products as $product)
														@foreach($Cproduct as $CP)
														@if($product->product_id==$CP)
														<option value="{{$product->product_id}}" selected>{{$product->product_name}}</option>
														@endif
														@endforeach
														<option value="{{$product->product_id}}">{{$product->product_name}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>Choose events:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select data-placeholder="Select events" multiple="multiple" name="company_events[]" id="company_events" class="chosen-select form-control">
													   @php $Cproduct=arr($company->company_events);@endphp
													   <option disabled value="">Select event</option>
													    @foreach($events as $id=>$event)
														@foreach($Cproduct as $CP)
														@if($event->event_id==$CP)
														<option value="{{$event->event_id}}"selected>{{$event->event_name}}</option>
														@endif
														@endforeach
														<option value="{{$event->event_id}}">{{$event->event_name}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										
										<!--FILED END-->
										<!--FILED START-->
										<h6>Choose blog posts:</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select data-placeholder="Select blogs" multiple="multiple" name="company_blogs[]" id="company_blogs" class="chosen-select form-control">
														<option disabled value="">Select blogs</option>
														@php $Cproduct=arr($company->company_blogs);@endphp
														@foreach($blogs as $blog)
														@foreach($Cproduct as $CP)
														@if($blog->blog_id==$CP)
														<option value="{{$blog->blog_id}}" selected>{{$blog->blog_name}}</option>
														@endif
														@endforeach
														<option value="{{$blog->blog_id}}">{{$blog->blog_name}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<h6>SEO Settings</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="company_seo_description" id="company_seo_description" placeholder="Meta descriptions(Write some ">{{$company->company_seo_description}}</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="company_seo_keywords" id="company_seo_keywords" placeholder="Meta keywords(Write some short keywords, related your company profile. (i.e) electronics,laptop,hp,canon)">{{$company->company_seo_keywords}}</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="company_profile_submit" class="btn btn-primary">Submit</button>
									</div>
									<div class="col-md-12"> <a href="dashboard.html" class="skip">Go to user dashboard                                        >></a>
									</div>
								</div>
								<!--FILED END-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection	

	<!--END PRICING DETAILS-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
