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
					<div class="log-bor">&nbsp;</div> <span class="steps"> Add new Event</span>
					<div class="log">
						<div class="login add-list-off">
							<h4>Create Event</h4>
							<form action="{{route('add-event-update',['id'=>$event->event_id])}}" class="product_form" id="product_form" name="product_form" method="post" enctype="multipart/form-data">
								@csrf
								<input type="hidden" id="product_id" value="34" name="product_id" class="validate">
								<input type="hidden" id="product_code" value="PROD034" name="product_code" class="validate">
								<input type="hidden" id="gallery_image_old" value="20234fp-263d-royal-protton-alpha-steel_interior.png" name="gallery_image_old" class="validate">
								<ul>
									<li>
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="event_name" id="event_name" required="required" class="form-control" value="{{$event->event_name}}" placeholder="Event name*">
													<!-- <label>Event name is required</label> -->
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select onChange="getProductSubCategory(this.value);" name="state_id" id="state" class="chosen-select form-control">
														<option value="">Select event state</option>
                                                        @foreach($state as $user):
                                                        @if($event->state_id==$user->state_id)
                                                                <option value="{{$user->state_id}}"selected >{{$user->state_name}}</option>
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
													<select onChange="getProductSubCategory(this.value);" name="city_id" id="city" class="chosen-select form-control">
														<option value="">select your cities</option>
														   @foreach($city as $user):
                                                            @if($event->city_id==$user->city_id)
                                                                <option value="{{$user->city_id}}"selected >{{$user->city_name}}</option>
                                                            @else
                                                            <option value="{{$user->city_id}}" >{{$user->city_name}}</option>
                                                            @endif
                                                            @endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" name="Address" id="Address" required="required" class="form-control" value="{{$event->event_address}}" placeholder="Address*">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select onChange="getProductSubCategory(this.value);" name="category_id" id="category_id" class="chosen-select form-control">
														<option value="">select category</option>
                                                        @foreach($category as $user):
                                                        @if($event->category_id==$user->category_id)
                                                            <option value="{{$user->category_id}}"selected >{{$user->category_name}}</option>
                                                        @else
                                                        <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                                        @endif
                                                        @endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="row">
									       <div class="col-md-6">
										     <div class="form-group">
											  <label>Start date</label>
											  <input id="start-date" name="ad_start_date" required="required" type="date"value="{{$event->event_start_date}}" class="form-control">
										     </div>									     
										  </div>	
										  <div class="col-md-6">
										     <!-- <div class="form-group">
											  <label>Start date</label>
											  <input id="start-date" name="ad_start_date" required="required" type="date" class="form-control">
										     </div>	 -->	
										     <div class="form-group">
										     	<label></label>
											    <input type="time" name="event_time" required="required" class="form-control error" value="{{$event->event_time}}"placeholder="Time*">
											</div>							     
										  </div>										 						     
									    </div>				       
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">		
													<textarea class="form-control" required="required" name="event_description" id="event_description" placeholder="Event Details">{{$event->event_description}}</textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">		
													<textarea class="form-control" required="required" name="product_description" id="product_description" placeholder="Google map location">{{$event->event_map}}</textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Choose banner image</label>
													<input type="file" name="gallery_image[]" class="form-control" accept="image/png, image/jpeg" multiple>
												</div>
											</div>
										</div>		
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="event_mobile" id="contect-phone-number"  value="{{$event->event_contact_name}}" required="required" class="form-control" placeholder="Contect person*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="contect_person" id="contect-person"  value="{{$event->event_mobile}}" required="required" class="form-control" placeholder="Contect phone number*">
												</div>
											</div>
										 </div>
										<div class="row">
										   <div class="col-md-6">
											 <div class="form-group">
												<input type="email" name="email_id" id="contect-email-id"  value="{{$event->event_email}}" required="required" class="form-control" placeholder="Contect Email id *">
											  </div>
											 </div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="website" id="event-website"  value="{{$event->event_website}}" required="required" class="form-control" placeholder="Event Website*">
												</div>
											</div>
										 </div>
										<!--FILED END-->
										<!--FILED START-->
										<!-- <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="product_payment_link" id="product_payment_link" placeholder="Product Payment External Link">https://bizbookdirectorytemplate.com/viki/</textarea>
												</div>
											</div>
										</div> -->
										<!--FILED END-->
										<!--FILED START-->
										<!-- <div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" required="required" name="product_description" id="product_description" placeholder="Product Details"></textarea>
												</div>
											</div>
										</div> -->
										<!--FILED END-->
										<!--FILED START-->
										<!--FILED END-->
										<!--FILED END-->
										<!--                            <div class="row">-->
										<!--                                <div class="col-md-12">-->
										<!--                                    <div class="form-group">-->
										<!--                                        <select data-placeholder="Tags" name="city_id[]" id="city_id"-->
										<!--                                                multiple required="required"-->
										<!--                                                class="chosen-select form-control">-->
										<!--                                                 <option value="">West New York</option>-->
										<!--                                                -->
										<!--                                        </select>-->
										<!--                                    </div>-->
										<!--                                </div>-->
										<!--                            </div>-->										
										
								
								
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
                                        <div>
                                            <div class="chbox">
                                            @if($event->isenquiry)
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1">
                                                    @endif
                                                <label for="isenquiry">Enquiry or Registration form enable</label>
                                            </div>
                                        </div>
                                    </div>	
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="product_submit" class="btn btn-primary">Submit</button>
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
	<!--END PRICING DETAILS-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection
@section('js')
<script>
 $(document).ready(function(){
      $("#state").change(function(){

         var state = $(this).val();
         //window.alert(sub_category);
         if(state == ""){
             $("#city").html("<option value=''>Select city</option>");
         }

         $.ajax({
             url:"/get-event/"+state,
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