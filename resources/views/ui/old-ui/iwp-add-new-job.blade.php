@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<!-- <div class="row">
				<div class="add-list-ste">
					<div class="add-list-ste-inn">
						<ul>
							<li>
								<a href="add-listing-step-1.html" class="act"> <span>Step 1</span>
									<b>Basic Info</b>
								</a>
							</li>
							<li>
								<a href="add-listing-step-2.html"> <span>Step 2</span>
									<b>Services</b>
								</a>
							</li>
							<li>
								<a href="add-listing-step-3.html"> <span>Step 3</span>
									<b>offers</b>
								</a>
							</li>
							<li>
								<a href="add-listing-step-4.html"> <span>Step 4</span>
									<b>map</b>
								</a>
							</li>
							<li>
								<a href="add-listing-step-5.html"> <span>Step 5</span>
									<b>Other</b>
								</a>
							</li>
							<li>
								<a href="add-listing-step-6.html"> <span>Step 6</span>
									<b>done</b>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">POST NEW JOB</span>
					<div class="log">
						<div class="login">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
							<!-- <h4>Listing Details</h4> -->
							<form action="{{route('user_job_store')}}" class="listing_form_1" id="listing_form_1" name="listing_form_1" method="post" enctype="multipart/form-data">
								<!--FILED START-->
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="job_title">Job Title*</label>
											<input id="job_title" name="job_title" type="text" required="required" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="salary">Salary</label>
											<input id="salary" type="text" name="salary" class="form-control" value="" placeholder="Rs:">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="job_category">Job Category</label>
											<select  name="job_category" id="category" class="chosen-select form-control">
											  @foreach($category as $user):
												<option value="{{$user->category_id}}" >{{$user->category_name}}</option>
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
											<label for="no_of_openings">No of Openings</label>
											<input type="number" name="no_of_openings" class="form-control" value="" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="job_sub_category">Job Sub Category</label>
											<select  name="job_sub_category" id="sub_category" class="chosen-select form-control">
												<option value="">Select Sub Category</option>
												@foreach($sub_category as $user):
												<option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
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
											<label for="interview_date">Interview Date</label>
											<input id="interview_date" type="date" class="form-control" name="interview_date" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="job_type">Job Type</label>
											<select onChange="getSubCategory(this.value);" name="job_type" id="job_type" class="chosen-select form-control">
												<option value="">Select Job Type</option>
												<option value="1">Premanent</option>
												<option value="2">Contract</option>
												<option value="3">Part Time</option>
												<option value="4">Freelance</option>
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="interview_time">Interview Time</label>
											<input id="interview_time" type="text" name="interview_time" required="required" class="form-control" placeholder="Time*">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="year_of_experience">Year(s) of experience</label>
											<input id="year_of_experience" type="text" name="year_of_experience" class="form-control" value="" placeholder="">
										</div>
									</div>									
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="role">Role</label>
											<input id="role" type="text" name="role" class="form-control" value="" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="contact_no">Contact No</label>
											<input id="contact_no" type="text" name="contact_no" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="education_&_qualification">Education & Qualification</label>
											<input id="education_&_qualification" type="text" name="education_qualification" class="form-control" value="" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="email_id">Email Id</label>
											<input id="email_id" type="email" name="email_id" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="state">State</label>
											<select onChange="getSubCategory(this.value);" name="state" id="state" class="chosen-select form-control">
												<option value="">Select State</option>
												@foreach($state as $user):
												<option value="{{$user->state_id}}" >{{$user->state_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="website">Website</label>
											<input id="website" type="text" name="website" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="location">Location</label>
											<select onChange="getSubCategory(this.value);" name="location" id="city" class="chosen-select form-control">
												<option value="">Select city</option>
												@foreach($city as $user):
												<option value="{{$user->city_id}}" >{{$user->city_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="contact_person">Contact Person</label>
											<input id="contact_person" type="text" name="contact_person" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="company_logo">Company Logo</label>
											<input id="company_logo" type="file" name="company_logo" class="form-control" value="" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="interview_location">Interview Location</label>
											<input id="interview_location" type="text" name="interview_location" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="company_name">Company Name</label>
											<input id="company_name" type="text" name="company_name" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="skill_set">Skill Set</label>
											<select onChange="getSubCategory(this.value);" name="skill_set[]" id="skill_set" multiple class="chosen-select form-control">
											@foreach($skill as $user):
											<option value="{{$user->category_id}}" >{{$user->category_name}}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="job_descriptions">Job Descriptions</label>
											<textarea class="form-control" id="job_descriptions" name="job_description" placeholder=""></textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="small_descriptions">About your company(Small description)</label>
											<textarea class="form-control" id="small_descriptions" name="small_description" placeholder=""></textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<button type="submit" name="submit_now" class="btn btn-primary">SUBMIT NOW</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END PRICING DETAILS-->
	<!-- START -->

@endsection
@section('js')
 <script>
$(document).ready(function(){
	$("#category").change(function(){
        // alert('hellp');
         var category = $(this).val();
          //window.alert(category);
         if(category == ""){
             $("#sub_category").html("<option value=''>Select sub Category</option>");
         }

         $.ajax({
             url:"/get-job-category/"+category,
             type:"GET",
             success:function(data){
                 var sub_category = data.sub_category;
                 var html = "<option value=''>Select Sub Category</option>";
                 for(let i =0;i<sub_category.length;i++){
                     html += `
                     <option value="`+sub_category[i]['sub_category_id']+`">`+sub_category[i]['sub_category_name']+`</option>
                     `;
                 }
                 $("#sub_category").html(html);
				 $("#sub_category").trigger("chosen:updated");
             }
         });
        //  window.alert(sub_category);
     });
        $("#state").change(function(){

      var state = $(this).val();
      //window.alert(sub_category);
      if(state == ""){
          $("#city").html("<option value=''>Select city</option>");
      }

      $.ajax({
          url:"/get-job/"+state,
          type:"GET",
          success:function(data){

              var city = data.city;
            // window.alert(child_category.lenght);
              var html = "<option value=''>Select city</option>";
              for(let i =0;i<city.length;i++){
                  html += `
                  <option value="`+city[i]['city_id']+`">`+city[i]['city_name']+`</option>
                  `;
              }
              $("#city").html(html);
			  $("#city").trigger("chosen:updated");
          }
      });

      });
});
 </script>
 @endsection