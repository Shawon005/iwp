

@extends('main.master')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Edit Blog Post</span>
					<div class="log">
						<div class="login add-list-off">
							<h4>Edit this Blog Post</h4>
							<form action="blog_update.html" class="blog_edit_form" id="blog_edit_form" name="blog_edit_form" method="post" enctype="multipart/form-data">
								<input type="hidden" id="blog_id" value="52" name="blog_id" class="validate">
								<input type="hidden" id="blog_image_old" value="36614hollywood-insider-feature-inception-greatest-movie-of-the-decade-leonardo-dicaprio-tom-hardy-marion-cotillard-joseph-gordon-levitt-michael-caine-christopher-nolan-ken-wantanabe-ellen-paige.jpg" name="blog_image_old" class="validate">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="blog_name" value="INCEPTION" required="required" class="form-control" placeholder="Post Name*">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="blog_description" id="blog_description" required="required" class="form-control" placeholder="Post Details">
														<p>A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.</p>
													</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Choose banner image</label>
													<input type="file" name="blog_image" class="form-control">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div>
													<div class="chbox">
														<input type="checkbox" name="isenquiry" id="evefmenab" checked="">
														<label for="evefmenab">Enquiry or Registration form enable</label>
													</div>
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="blog_submit" class="btn btn-primary">Save Changes</button>
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