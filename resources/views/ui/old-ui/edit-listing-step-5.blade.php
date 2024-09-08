@extends('ui.old-ui.master.master2')
@section('content')

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
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>4])}}"> <span>Step 4</span>
									<b>map</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>5])}}"class="act"> <span>Step 5</span>
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
					<div class="log-bor">&nbsp;</div> <span class="steps">Step 5</span>
					<div class="log">
						<div class="login add-lis-oth">
							<h4>Other informations</h4>
							<span class="add-list-add-btn lis-add-oad" title="add new offer">+</span>
							<span class="add-list-rem-btn lis-add-ore" title="remove offer">-</span>
							<form action="{{route('user_listing_update',['id'=>$listing->listing_id])}}" class="listing_form" id="listing_form_5" name="listing_form_5" method="post" enctype="multipart/form-data">
								@csrf
							    <ul>
								<input name="step" type="text" class="d-none" value="5">
								@php $ans=0; @endphp
                             @foreach($listing_info_question as $qu)
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<input type="text" name="listing_info_question[]" class="form-control"value="{{$qu}}" placeholder="Experience">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group"> <i class="material-icons">arrow_forward</i>
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<input type="text" name="listing_info_answer[]" class="form-control"value="{{$listing_info_ans[$ans++]}}" placeholder="20 years">
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
									@endforeach
									<!--FILED START-->
									<!--                                    <li>-->
									<!--                                    <div class="row">-->
									<!--                                        <div class="col-md-5">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <input type="text" name="listing_info_question[]" class="form-control" placeholder="Parking">-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--										<div class="col-md-2">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <i class="material-icons">arrow_forward</i>-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--                                        <div class="col-md-5">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <input type="text" name="listing_info_answer[]" class="form-control" placeholder="yes">-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--                                    </div>-->
									<!--                                    </li>-->
									<!--FILED END-->
									<!--FILED START-->
									<!--                                    <li>-->
									<!--                                    <div class="row">-->
									<!--                                        <div class="col-md-5">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <input type="text" name="listing_info_question[]" class="form-control" placeholder="Smoking">-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--										<div class="col-md-2">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <i class="material-icons">arrow_forward</i>-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--                                        <div class="col-md-5">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <input type="text" name="listing_info_answer[]" class="form-control" placeholder="yes">-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--                                    </div>-->
									<!--                                    </li>-->
									<!--FILED END-->
									<!--FILED START-->
									<!--                                    <li>-->
									<!--                                    <div class="row">-->
									<!--                                        <div class="col-md-5">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <input type="text" name="listing_info_question[]" class="form-control" placeholder="Take Out">-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--										<div class="col-md-2">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <i class="material-icons">arrow_forward</i>-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--                                        <div class="col-md-5">-->
									<!--                                            <div class="form-group">-->
									<!--                                              <input type="text" name="listing_info_answer[]" class="form-control" placeholder="yes">-->
									<!--                                            </div>-->
									<!--                                        </div>-->
									<!--                                    </div>-->
									<!--                                    </li>-->
									<!--FILED END-->
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>4])}}">
											<button type="button" class="btn btn-primary">Previous</button>
										</a>
									</div>
									<div class="col-md-6">
										<button type="submit" name="listing_submit" class="btn btn-primary">Finish</button>
									</div>
									<!--                                        <div class="col-md-12">-->
									<!--                                            <a href="add-listing-step-6" class="skip">Skip this >></a>-->
									<!--                                        </div>-->
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
@wndsection