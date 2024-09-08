@extends('main.master')
@section('content')

	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">SEO</span>
					<div class="log">
						<div class="login add-list-off">
							<h4>Edit this SEO</h4>
							<form action="seo_update.html" class="seo_edit_form" id="seo_edit_form" name="seo_edit_form" method="post" enctype="multipart/form-data">
								<input type="hidden" id="path" value="listing" name="path" class="validate">
								<input type="hidden" id="id" value="396" name="id" class="validate">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" readonly="readonly" name="seo_name" required="required" class="form-control" value="qwerqw" placeholder="seo name">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="seo_title" class="form-control" value="" placeholder="SEO Title">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" required="required" name="seo_description" id="seo_description" placeholder="SEO Description"></textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="seo_keywords" placeholder="SEO Keywords i.e products,market,health"></textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="seo_submit" class="btn btn-primary">Save Changes</button>
									</div>
									<!--                                        <div class="col-md-6">-->
									<!--                                            <button type="submit" class="btn btn-primary">Preview</button>-->
									<!--                                        </div>-->
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
	<!--END PRICING DETAILS-->
	<!-- Optional JavaScript -->
@endsection