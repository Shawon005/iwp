@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">SERVICE EXPERT PROFILE</span>
					<div class="log">
						<div class="login">
							<form action="{{route('user_expert_store')}}" class="" id="listing_form_1" name="listing_form_1" method="post" enctype="multipart/form-data">
								@csrf
							<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">Name*</label>
											<input id="name" name="name" type="text" required="required" class="form-control" value="{{$expert->profile_name}}" readonly placeholder="Name*">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="work_profession">Work profession</label>
											<select name="work_profession" required="required" id="category" class="chosen-select form-control">
												<option value="">Select your Profession</option>
												@foreach($category as $user):
													@if($expert->category_id==$user->category_id)
												<option value="{{$user->category_id}}" selected >{{$user->category_name}}</option>
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
											<label for="state">State</label>
											<select  name="state" required="required" id="state" class="chosen-select form-control">
												<option value="">Select your State</option>
												@foreach($state as $user):
													@if($expert->state_id==$user->state_id)
												<option value="{{$user->state_id}}" selected >{{$user->state_name}}</option>
												@else
												<option value="{{$user->state_id}}" >{{$user->state_name}}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="city">City</label>
											<select  name="city" required="required" id="city" class="chosen-select form-control">
												<option value="">Select your City</option>
												@foreach($city as $user):
													@if($expert->city_id==$user->country_id)
												<option value="{{$user->country_id}}" selected >{{$user->country_id}}</option>
												@else
												<option value="{{$user->country_id}}" >{{$user->country_name}}</option>
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
											<label for="service_start_time">Service Start Time</label>
											<!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
											<div class="input-group date" id="dt-time" data-target-input="nearest">
											<input class="form-control datetimepicker-input " type="time" data-target="#dt-time"name="available_start_time"value="{{$expert->available_time_start}}">
											<!-- <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div> -->
										    </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="year_of_experience">Year(s) of Experience</label>
											<input id="year_of_experience" type="text" name="year_of_experience" class="form-control" value="{{$expert->years_of_experience}}" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="service_close_time">Service Close Time</label>
											<div class="input-group date"  id="dt-time" data-target-input="nearest">
											<input class="form-control datetimepicker-input " type="time" data-target="#dt-time"name="service_close_time"value="{{$expert->available_time_end}}">
											<!-- <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div> -->
										    </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="base_fare">Base Fare</label>
											<input id="base_fare" type="text" name="base_fare" class="form-control" value="{{$expert->base_fare}}" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="profile_image">Profile Image</label>
											<input id="profile_image" type="file" name="profile_image" class="form-control" value="" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="profile_cover_image">Profile Cover Image</label>
											<input id="profile_cover_image" type="file" name="profile_cover_image" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="service_can_do">Services can do</label>
					                        <select  name="sub_category_id[]" required="required" id="sub_category" class="chosen-select form-control" >
											@foreach($sub_category as $user):
											@foreach($sub as $s)
											@if($user->sub_category_id==$s)
											<option value="{{$user->sub_category_id}}" selected>{{$user->sub_category_name}}</option>
											@endif
											@endforeach
											<option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
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
											<label for="service_area">Service Areas</label>
											<select  name="service_area" required="required" id="area" class="chosen-select form-control" >
											@foreach($area as $user):
											@foreach($a as $ai)
											@if($user->city_id==$ai)
											<option value="{{$user->city_id}}" selected>{{$user->city_name}}</option>
											@endif
											@endforeach
											<option value="{{$user->city_id}}" >{{$user->city_name}}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<!--                            <div class="row">-->
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
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="payment_accept">Payment Accept</label>
											<select  name="payment_accept[]" required="required" id="payment_accept" class="chosen-select form-control">
											@foreach($payment as $user):
											@foreach($pay as $pa)
											@if($user->payment_id==$pa)
											<option value="{{$user->payment_id}}" selected>{{$user->payment_name}}</option>
											@endif
											@endforeach
											<option value="{{$user->payment_id}}" >{{$user->payment_name}}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
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
												<input id="experience_details" type="text" required="required" name="experience_1"value="{{$expert->experience_1}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="experience_details" type="text" required="required" name="experience_2"value="{{$expert->experience_2}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="experience_details" type="text" required="required" name="experience_3"value="{{$expert->experience_3}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="experience_details" type="text" required="required" name="experience_4"value="{{$expert->experience_4}}" class="form-control">
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
												<input id="education_qualification" type="text" required="required" name="education_1" value="{{$expert->education_1}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="education_qualification" type="text" required="required" name="education_2" value="{{$expert->education_2}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="education_qualification" type="text" required="required" name="education_3" value="{{$expert->education_3}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="education_qualification" type="text" required="required" name="education_4"value="{{$expert->education_4}}" class="form-control">
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
												<input id="additional_information" type="text" required="required" name="additional_info_1" value="{{$expert->additional_info_1}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="additional_information" type="text" required="required" name="additional_info_2" value="{{$expert->additional_info_2}}"class="form-control">
											</div>
											<div class="form-group">
												<input id="additional_information" type="text" required="required" name="additional_info_3"value="{{$expert->additional_info_3}}" class="form-control">
											</div>
											<div class="form-group">
												<input id="additional_information" type="text" required="required" name="additional_info_4" value="{{$expert->additional_info_4}}"class="form-control">
											</div>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!-- FIELD START -->
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group">
											<label for="date_of_birth">Date of Birth</label>
											<input id="date_of_birth" type="date" autocomplete="off" name="date_of_birth" class="form-control" placeholder="Ad start date (YY/MM/DD)" value="{{$expert->date_of_birth}}"required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="id_proof">ID Proof</label>
											<input id="id_proof" type="file" name="id_proof" class="form-control" value="" placeholder="">
										</div>
									</div>
								</div>
								<!-- FIELD END -->
								<div class="col-md-3">
	                                <div class="form-group">
	                                    <button name="service_expert_submit" class="btn btn-primary" style="border-radius: 3px;">Submit Now</button>
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
@section('js')
 <script>


  $(document).ready(function(){
     
     $("#category").change(function(){

         var category = $(this).val();
        //  window.alert(category);
         if(category == ""){
             $("#sub_category").html("<option value=''>Select Service</option>");
         }

         $.ajax({
             url:"/get-plans/"+category,
             type:"GET",
             success:function(data){
                 var sub_category = data.sub_category;
                 var html = "<option value=''>Select Service</option>";
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

         var sub_category = $(this).val();
         //window.alert(sub_category);
         if(sub_category == ""){
             $("#city").html("<option value=''>Select City</option>");
         }

         $.ajax({
             url:"/get-plans1/"+sub_category,
             type:"GET",
             success:function(data){

                 var child_category = data.child_category;
                // window.alert(child_category.lenght);
                 var html = "<option value=''>Select City</option>";
                 for(let i =0;i<child_category.length;i++){
                     html += `
                     <option value="`+child_category[i]['country_id']+`">`+child_category[i]['country_name']+`</option>
                     `;
                 }
                 $("#city").html(html);
                 $("#city").trigger("chosen:updated");
             }
         });

     });

     $("#city").change(function(){

        var city = $(this).val();
        //window.alert(sub_category);
        if(city == ""){
            $("#area").html("<option value=''>Select Area</option>");
        }
        $.ajax({
            url:"/get-plans2/"+city,
            type:"GET",
            success:function(data){
                var area = data.area;
                // alert(area); window.alert(child_category.lenght);
                var html = "<option value=''>Select Area</option>";
                for(let i =0;i<area.length;i++){
                    html += `
                    <option value="`+area[i]['city_id']+`">`+area[i]['city_name']+`</option>
                    `;
                }
                $("#area").html(html);
                $("#area").trigger("chosen:updated");
             }
        });
      
});

 });

 </script>
 @endsection
