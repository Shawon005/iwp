@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->

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
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>1])}}" class="act"> <span>Step 1</span>
									<b>Basic Info</b>
								</a>
							</li>
							<li>
								<a href="{{route('edit_listing_step_1',['id'=>$listing->listing_id,'step'=>2])}}"> <span>Step 2</span>
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
					<div class="log-bor">&nbsp;</div> <span class="steps">Step 1</span>
					<div class="log">
						<div class="login">
							<h4>Listing Details</h4>
							@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
							<form action="{{route('user_listing_update',['id'=>$listing->listing_id])}}" class="listing_form_1" id="listing_form_1" name="listing_form_1" method="post" enctype="multipart/form-data">
								@csrf
							   <!--FILED START-->
							   <input name="step" type="text" class="d-none" value="1">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input id="listing_name" name="listing_name" type="text" required="required" class="form-control" value="{{$listing->listing_name}}" placeholder="Listing Name*">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_mobile" class="form-control" value="{{$listing->listing_mobile}}" placeholder="Phone number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_email" class="form-control" value="{{$listing->listing_email}}" placeholder="Email Id">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_whatsapp" class="form-control" value="{{$listing->listing_whatsapp}}" placeholder="Whatsapp Number (e.g. +919876543210)">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_website" class="form-control" value="{{$listing->listing_website}}" placeholder="Website(www.rn53themes.net)">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="listing_address" class="form-control" value="{{$listing->listing_address}}" placeholder="Shop address">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_lat" class="form-control" value="{{$listing->listing_lat}}" placeholder="Latitude i.e 40.730610">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="listing_lng" class="form-control" value="{{$listing->listing_lng}}" placeholder="Longitude i.e -73.935242">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select  name="country_id" required="required" id="country" class="chosen-select form-control">
											@foreach($country as $user):
												@if($listing->country_id==$user->country_id)
											   <option value="{{$user->country_id}}" selected>{{$user->country_name}}</option>
												@else
												<option value="{{$user->country_id}}" >{{$user->country_name}}</option>
												@endif
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select  name="state_id" id="state"  required="required" class="chosen-select form-control">
											<option value="">Select States</option>
												@foreach($state as $user):
													@if($listing->state_id==$user->state_id)
												<option value="{{$user->state_id}}" selected >{{$user->state_name}}</option>
												@else
												<option value="{{$user->state_id}}" >{{$user->state_name}}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select data-placeholder="Select your Cities" name="city_id[]" id="city" multiple required="required" class="chosen-select form-control">
											<option value="">Select cities</option>
												@foreach($city as $user):
													@if($listing->city_id==$user->city_id)
												<option value="{{$user->city_id}}" selected >{{$user->city_name}}</option>
												@else
												<option value="{{$user->city_id}}" >{{$user->city_name}}</option>
												@endif
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
											<select  name="category_id" id="category" class="chosen-select form-control">
												<option value="">Select Category</option>
												@foreach($category as $user):
													@if($listing->category_id==$user->category_id)
												<option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
												@else
												<option value="{{$user->category_id}}">{{$user->category_name}}</option>
												@endif
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
											<select data-placeholder="Select Sub Category" name="sub_category_id[]" id="sub_category" multiple class="chosen-select form-control">
												<option value="">Select Sub Category</option>
												@foreach($sub_categories as $sub_category):
    												<option value="{{$sub_category->sub_category_id}}"
                                                            @if ($subs->contains($sub_category->sub_category_id))
                                                                selected="selected"
                                                            @endif>{{$sub_category->sub_category_name}}</option>
												@endforeach>
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" id="listing_description" name="listing_description" placeholder="Details about your listing">{{$listing->listing_description}}</textarea>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Choose profile image</label>
											<input type="file"  name="profile_image" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Choose cover image</label>
											<input type="file"  name="cover_image" class="form-control">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" id="service_locations" name="service_locations" placeholder="Enter your service locations">{{$listing->service_locations}}</textarea>
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
	<!--END PRICING DETAILS-->
	<!-- START -->

	<!-- END -->
	@endsection
	@section('js')
<script>
 $(document).ready(function(){
     
     $("#category").change(function(){
      // alert('d');
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
				 $("#sub_category").trigger("chosen:updated");
             }
         });
          //window.alert(html);
     });
      //country
      $("#country").change(function(){

         var country = $(this).val();
//window.alert(sub_category);
            if(country == ""){
            $("#state").html("<option value=''>Select State</option>");
        }

        $.ajax({
            url:"/get-listing1/"+country,
            type:"GET",
            success:function(data){
        
        var state = data.state;
       // window.alert(child_category.lenght);
        var html = "<option value=''>Select State</option>";
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
				 $("#city").trigger("chosen:updated");
             }
         });

     });
 });

</script>
@endsection