@extends('ui.old-ui.master.master2')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="add-list-ste">
					<div class="add-list-ste-inn">
					    <ul>
							<li>
								<a href="" > <span onclick="history.back()">Step 1</span>
									<b>Basic Info</b>
								</a>
							</li>
							<li>
								<a href=""> <span onclick="history.back()">Step 2</span>
									<b>Services</b>
								</a>
							</li>
							<li>
								<a href=""> <span onclick="history.back()">Step 3</span>
									<b>offers</b>
								</a>
							</li>
							<li>
								<a href="#"class="act"> <span>Step 4</span>
									<b>map</b>
								</a>
							</li>
							<li>
								<a href="#"> <span>Step 5</span>
									<b>Other</b>
								</a>
							</li>
							<li>
								<a href="#"> <span>Step 6</span>
									<b>done</b>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Step 4</span>
					<div class="log add-list-map">
						<div class="login add-list-map">
							<form action="{{route('user_listing_store')}}" class="listing_form_4" id="listing_form_4" name="listing_form_4" method="post" enctype="multipart/form-data">
							@csrf
							<input name="step" type="text" class="d-none" value="4">
							    <h4>Video Gallery</h4>
								<!-- TOOL TIP -->
								<div class="ttip-com"> <i class="material-icons">priority_high</i>
									<div>Right click on YouTube video then get your iframe code</div>
								</div>
								<!-- END -->
								<ul> <span class="add-list-add-btn lis-add-oadvideo" title="add new video">+</span>
									<span class="add-list-rem-btn lis-add-orevideo" title="remove video">-</span>
									<li>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea id="listing_video" name="listing_video[]" class="form-control" placeholder="Paste Your Youtube iframe Code here"></textarea>
												</div>
											</div>
										</div>
									</li>
								</ul>
								<h4>Map and 360 view</h4>
								<!-- TOOL TIP -->
								<div class="ttip-com"> <i class="material-icons">priority_high</i>
									<div>Go to Google maps -> Choose your location -> Click share button - > Copy your iframe code then paste here.</div>
								</div>
								<!-- END -->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea id="google_map" name="google_map" class="form-control" placeholder="Shop location"></textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea id="360_view" name="M360_view" class="form-control" placeholder="360 view"></textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<h4 class="pt30">Photo gallery</h4>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" name="gallery_image[]" class="form-control">
										</div>
									</div>
									<!--                                <div class="col-md-6">-->
									<!--                                    <div class="form-group">-->
									<!--                                        <input type="file" name="gallery_image[]" class="form-control">-->
									<!--                                    </div>-->
									<!--                                </div>-->
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<!--                            <div class="row">-->
								<!--                                <div class="col-md-6">-->
								<!--                                    <div class="form-group">-->
								<!--                                        <input type="file" name="gallery_image[]" class="form-control">-->
								<!--                                    </div>-->
								<!--                                </div>-->
								<!--                                <div class="col-md-6">-->
								<!--                                    <div class="form-group">-->
								<!--                                        <input type="file" name="gallery_image[]" class="form-control">-->
								<!--                                    </div>-->
								<!--                                </div>-->
								<!--                            </div>-->
								<!--FILED END-->
								<!--FILED START-->
								<!--                            <div class="row">-->
								<!--                                <div class="col-md-6">-->
								<!--                                    <div class="form-group">-->
								<!--                                        <input type="file" name="gallery_image[]" class="form-control">-->
								<!--                                    </div>-->
								<!--                                </div>-->
								<!--                                <div class="col-md-6">-->
								<!--                                    <div class="form-group">-->
								<!--                                        <input type="file" name="gallery_image[]" class="form-control">-->
								<!--                                    </div>-->
								<!--                                </div>-->
								<!--                            </div>-->
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<a href="add-listing-step-3">
											<button type="button" class="btn btn-primary">Previous</button>
										</a>
									</div>
									<div class="col-md-6">
										<button type="submit" name="listing_submit" class="btn btn-primary">Next</button>
									</div>
									<div class="col-md-12"> <a href="add-listing-step-5" class="skip">Skip this >></a>
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
	<!--END PRICING DETAILS-->
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!-- <section>
		<div class="full-bot-book">
			<div class="container">
				<div class="row">
					<div class="bot-book">
						<div class="col-md-2 bb-img">
							<img src="images/idea.png" alt="">
						</div>
						<div class="col-md-7 bb-text">
							<h4>#1 Business Directory and Service Provider</h4>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
						<div class="col-md-3 bb-link"> <a href="pricing-details.html">Add my business</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
@endsection