@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">EMPLOYEE PROFILE</span>
					<div class="log">
						<div class="login">
							<!-- <h4>Listing Details</h4> -->
							<form action="{{route('job-profile-store')}}" class="listing_form_1" id="listing_form_1" name="listing_form_1" method="post" enctype="multipart/form-data">
								<!--FILED START-->
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="employee_name">Employee Name*</label>
											<input id="employee_name" name="employee_name" type="text" required="required" readonly class="form-control" value="{{$job->profile_name}}" placeholder="Employee Name*">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="job_profession">Job profession</label>
											<select onChange="getCities(this.value);" name="category_id" required="required" id="job_profession" class="chosen-select form-control">
												<option value="">Select your Profession</option>
												@foreach($category as $user):
													@if($job->category_id==$user->category_id)
												<option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
												   @else 
												   <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
												   @endif
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="current_company">Current Company</label>
											<input id="current_company" type="text" name="current_company" class="form-control" value="{{$job->current_company}}" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="year_of_experience">Year(s) of Experience</label>
											<input id="year_of_experience" type="text" name="year_of_experience" class="form-control" value="{{$job->years_of_experience}}" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="notice_period">Notice Period(Months)</label>
											<div class="input-group date"  id="dt-time" data-target-input="nearest">
											<input class="form-control datetimepicker-input " type="number" data-target="#dt-time"name="notice_period"value="{{$job->notice_period}}">
											<!-- <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div> -->
										    </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="available_time_to_talk">Available time to talk</label>
											<input id="available_time_to_talk" type="time" name="available_time_to_talk" class="form-control" value="{{$job->available_time_start}}" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="education_&_qualification">Education & Qualification</label>
											<input id="education_&_qualification" type="text" name="educational_qualification" class="form-control" value="{{$job->educational_qualification}}" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="resume">Resume</label>
											<input id="resume" type="file" name="resume" class="form-control" accept="application/pdf" value="{{$job->profile_name}}" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="job_profile_image">Employee Profile Image</label>
											<input id="job_profile_image" type="file" name="job_profile_image" class="form-control" value="{{$job->profile_name}}" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="profile_cover_image">Profile Cover Image</label>
											<input id="profile_cover_image" type="file" name="profile_cover_image" class="form-control" value="{{$job->profile_name}}" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="skill_set">Skill set</label>
											<select onChange="getCities(this.value);" name="skill_set[]" required="required" id="skill_set" class="chosen-select form-control">
											@php $sk=arr($job->skill_set); @endphp
											@foreach($skill as $user):
											@foreach($sk as $skills)
											@if($user->category_id==$skills)
											<option value="{{$user->category_id}}"selected >{{$user->category_name}}</option>
											@endif
											@endforeach
											<option value="{{$user->category_id}}">{{$user->category_name}}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<!--                            <div classskill_set="row">-->
								<!--                                <div class="col-md-12">-->
								<!--                                    <div class="form-group">-->
								<!--                                        <input id="select-city" name="city_id" required="required" type="text"-->
								<!--                                               value="-->
								<!--"-->
								<!--                                               class="autocomplete form-control" placeholder="City name">-->
								<!--                                    </div>-->
								<!--                                </div>-->
								<!--                            </div>-->
								<!--FILED END-->
								<!--FILED START-->
								<!-- <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select onChange="getSubCategory(this.value);" name="category_id" id="category_id" class="chosen-select form-control">
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
									</div>
								</div> -->
								<!--FILED END-->
								<!--FILED START-->
								<!-- <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select data-placeholder="Select Sub Category" name="sub_category_id[]" id="sub_category_id" multiple class="chosen-select form-control">
												<option value="">Select Sub Category</option> -->
												<!--                                            -->
												<!--                                                <option -->
												<!--                                                    value="-->
												<!--">-->
												<!--</option>-->
											<!-- </select>
										</div>
									</div>
								</div> -->
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">									<div class="col-md-12">
										<div class="card p-2" style="background: #DAEBFF;">
											<div class="form-group">
												<label for="experience_details">Experience Details</label>
												<input id="experience_details" type="text"  name="experience_1" value="{{$job->experience_1}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="experience_details" type="text"  name="experience_2" value="{{$job->experience_2}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="experience_details" type="text"  name="experience_3" value="{{$job->experience_3}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="experience_details" type="text"  name="experience_4" value="{{$job->experience_4}}" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row mt-3">
									<div class="col-md-12">
										<div class="card p-2" style="background: #DAEBFF;">
											<div class="form-group">
												<label for="education_qualification">Education & Qualification</label>
												<input id="education_qualification" type="text"  name="education_1" value="{{$job->education_1}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="education_qualification" type="text"  name="education_2"  value="{{$job->education_2}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="education_qualification" type="text"  name="education_3"  value="{{$job->education_3}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="education_qualification" type="text"  name="education_4"  value="{{$job->education_4}}"class="form-control">
											</div>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row mt-3">
									<div class="col-md-12">
										<div class="card p-2" style="background: #DAEBFF;">
											<div class="form-group">
												<label for="additional_information">Additional Information</label>
												<input id="additional_information" type="text"  name="additional_info_1"  value="{{$job->additional_info_1}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="additional_information" type="text"  name="additional_info_2"  value="{{$job->additional_info_2}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="additional_information" type="text"  name="additional_info_3"  value="{{$job->additional_info_3}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="additional_information" type="text" name="additional_info_4"  value="{{$job->additional_info_4}}"class="form-control">
											</div>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<div class="col-md-3">
		                            <div class="form-group">
		                                <button name="job_profile_submit" class="btn btn-primary" style="border-radius: 3px;">Submit Now</button>
		                            </div>
		                        </div>
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