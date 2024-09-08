

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
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>1])}}" > <span>Step 1</span>
									<b>Basic Info</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>2])}}" > <span>Step 2</span>
									<b>Services</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>3])}}"> <span>Step 3</span>
									<b>offers</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>4])}}"class="act"> <span>Step 4</span>
									<b>map</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>5])}}"> <span>Step 5</span>
									<b>Other</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>6])}}"> <span>Step 6</span>
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
							<form action="{{route('user_listing_update',['id'=>$listing->listing_id])}}" class="listing_form_4" id="listing_form_4" name="listing_form_4" method="post" enctype="multipart/form-data">
								@csrf
							    <h4>Video Gallery</h4>
								<input name="step" type="text" class="d-none" value="4">
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
													<textarea id="listing_video" name="listing_video[]" class="form-control" placeholder="Paste Your Youtube iframe Code here">{{$listing->listing_video}}</textarea>
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
											<textarea id="google_map" name="google_map" class="form-control" placeholder="Shop location">{{$listing->google_map}}</textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea id="360_view" name="360_view" class="form-control" placeholder="360 view"></textarea>
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
										<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>3])}}">
											<button type="button" class="btn btn-primary">Previous</button>
										</a>
									</div>
									<div class="col-md-6">
										<button type="submit" name="listing_submit" class="btn btn-primary">Next</button>
									</div>
									<div class="col-md-12"> <a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>5])}}" class="skip">Skip this >></a>
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
@endsection