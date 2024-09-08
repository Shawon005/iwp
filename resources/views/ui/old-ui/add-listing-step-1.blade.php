
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
@extends('main.master')
@section('content')
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="add-list-ste">
					<div class="add-list-ste-inn">
						{{error()}}
						<ul>
							<li>
								<a href="{{route('user_add_listing_step_1')}}" class="act"> <span>Step 1</span>
									<b>Basic Info</b>
								</a>
							</li>
							<li>
								<a href="{{route('user_add_listing_step_2')}}"> <span>Step 2</span>
									<b>Services</b>
								</a>
							</li>
							<li>
								<a href="{{route('user_add_listing_step_3')}}"> <span>Step 3</span>
									<b>offers</b>
								</a>
							</li>
							<li>
								<a href="{{route('user_add_listing_step_4')}}"> <span>Step 4</span>
									<b>map</b>
								</a>
							</li>
							<li>
								<a href="{{route('user_add_listing_step_5')}}"> <span>Step 5</span>
									<b>Other</b>
								</a>
							</li>
							<li>
								<a href="{{route('user_add_listing_step_6')}}"> <span>Step 6</span>
									<b>done</b>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Step 1</span>
					<div class="log">
						<div class="login">
							<h4>Listing Details</h4>
							<form action="add-listing-step-2.html" class="listing_form_1" id="listing_form_1" name="listing_form_1" method="post" enctype="multipart/form-data">
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input id="listing_name" name="listing_name" type="text" required="required" class="form-control" value="" placeholder="Listing Name*">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_mobile" class="form-control" value="" placeholder="Phone number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_email" class="form-control" value="" placeholder="Email Id">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_whatsapp" class="form-control" value="" placeholder="Whatsapp Number (e.g. +919876543210)">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_website" class="form-control" value="" placeholder="Website(www.rn53themes.net)">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_address" class="form-control" value="" placeholder="Shop address">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_lat" class="form-control" value="" placeholder="Latitude i.e 40.730610">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_lng" class="form-control" value="" placeholder="Longitude i.e -73.935242">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select onChange="getCities(this.value);" name="country_id" required="required" id="country_id" class="chosen-select form-control">
												<option value="">Select your Country</option>
												<option value="101">India</option>
												<option value="230">United Kingdom</option>
												<option value="231">United States</option>
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
											<select data-placeholder="Select your Cities" name="city_id[]" id="city_id" multiple required="required" class="chosen-select form-control">
												<option value="">Select your Cities</option>
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
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
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select data-placeholder="Select Sub Category" name="sub_category_id[]" id="sub_category_id" multiple class="chosen-select form-control">
												<option value="">Select Sub Category</option>
												<!--                                            -->
												<!--                                                <option -->
												<!--                                                    value="-->
												<!--">-->
												<!--</option>-->
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" id="listing_description" name="listing_description" placeholder="Details about your listing"></textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Choose profile image</label>
											<input type="file" required="required" name="profile_image" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Choose cover image</label>
											<input type="file" required="required" name="cover_image" class="form-control">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" id="service_locations" name="service_locations" placeholder="Enter your service locations... &#10;(i.e) London, Dallas, Wall Street, Opera House"></textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<button type="submit" name="listing_submit" class="btn btn-primary">Next</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
	<!--END PRICING DETAILS-->
	<!-- START -->
	@section('js')
<script src="{{asset('')}}assets/js/form-wizard/form-wizard-two.js"></script>
<script>
 $(document).ready(function(){
     
     $("#category").change(function(){

         var category = $(this).val();
        //  window.alert(category);
         if(category == ""){
             $("#sub_category").html("<option value=''>Select sub Category</option>");
         }

         $.ajax({
             url:"/get-listing/"+category,
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
             }
         });
        //  window.alert(sub_category);
     });
      //country
      $("#country").change(function(){

         var country = $(this).val();
//window.alert(sub_category);
            if(country == ""){
            $("#state").html("<option value=''>Select city</option>");
        }

        $.ajax({
            url:"/get-listing1/"+country,
            type:"GET",
            success:function(data){
        
        var state = data.state;
       // window.alert(child_category.lenght);
        var html = "<option value=''>Select city</option>";
        for(let i =0;i<state.length;i++){
            html += `
            <option value="`+state[i]['state_id']+`">`+state[i]['state_name']+`</option>
            `;
        }
        $("#state").html(html);
    }
});

});
     //state 
    
      $("#state").change(function(){

         var state = $(this).val();
         //window.alert(sub_category);
         if(state == ""){
             $("#city").html("<option value=''>Select city</option>");
         }

         $.ajax({
             url:"/get-listing2/"+state,
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
             }
         });

     });
 });

</script>
@endsection