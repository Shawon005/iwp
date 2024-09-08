@extends('main.master')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Add new Coupons</span>
					<div class="log">
						<div class="login">
							<h4>Add New Coupons</h4>
							<form name="coupon_form" id="coupon_form" enctype="multipart/form-data" method="post" action="{{route('db-coupon-update',['id'=>$coupon->coupon_id])}}" class="listing_form_1">
								<!--FILED START-->
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" name="coupon_name" value="{{$coupon->coupon_name}}"placeholder="Coupon name" required>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<div class="col-form-label"> 
										<label>Category:</label>
										<select class="chosen-select js-example-placeholder-multiple col-sm-12" name="category_id"required=""id="category_id">
										<option value="">Select Category</option>
										@foreach($category as $user):
											@if($user->category_id==$coupon->category_id)
											<option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
											@else
											<option value="{{$user->category_id}}" >{{$user->category_name}}</option>
											@endif
											@endforeach
										</select>
									</div>
									</div>
									<div class="mb-3">
										<div class="col-form-label"> 
											<label>Sub Category</label>
											<select class="chosen-select  js-example-placeholder-multiple col-sm-12" multiple="multiple"name="sub_category_id[]"required=""id="sub_category_id">
											<option value="">Select Sub Category</option>
											@foreach($sub_category as $user):
												@foreach($sub as $S)                            
											@if($user->sub_category_id==$S)
											<option value="{{$user->sub_category_id}}" selected >{{$user->sub_category_name}}</option>
												@endif
												@endforeach
												<option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="mb-3">
										<div class="col-form-label"> 
											<label>Child Category</label>
											<select class="chosen-select  js-example-placeholder-multiple col-sm-12" multiple="multiple"name="child_category_id[]"required=""id="child_category_id">
											<option value="">Select Child Category</option>
											@foreach($child_category as $user):
												@foreach($child as $C)                            
											@if($user->child_category_id==$C)
											<option value="{{$user->child_category_id}}" selected >{{$user->child_category_name}}</option>
												@endif
												@endforeach
												<option value="{{$user->child_category_id}}" >{{$user->child_category_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="mb-3">
										<label class="col-form-label">Brand</label>
										<select class="chosen-select js-example-basic-single col-sm-12"name="brand_id"required="">
											<optgroup label="">
											<option value="">Select Brand</option>
											@foreach($brand as $user):
												@if($user->brand_id==$coupon->brand_id)
												<option value="{{$user->brand_id}}" selected>{{$user->brand_name}}</option>
												@else
												<option value="{{$user->brand_id}}" >{{$user->brand_name}}</option>
												@endif
												@endforeach
											</optgroup>
										</select>
									</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" name="coupon_code"value="{{$coupon->coupon_code}}" placeholder="Offer code" required>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" name="coupon_link" value="{{$coupon->coupon_link}}"placeholder="Website link(if online offer)">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Brand logo or Offer image(Recommended size 65 X 65)</label>
											<input type="file" name="coupon_photo_e" class="form-control">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start date</label>
											<input type="date" class="form-control" value="{{$coupon->coupon_start_date}}"name="coupon_start_date" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>End date</label>
											<input type="date" class="form-control" value="{{$coupon->coupon_end_date}}"name="coupon_end_date" required>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<button type="submit" name="coupon_submit" class="btn btn-primary">Update</button>
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
	@section('js')
<script>


$(document).ready(function(){
   
   $("#category_id").change(function(){

       var category = $(this).val();
      // window.alert(category);
       if(category == ""){
           $("#sub_category_id").html("<option value=''>Select sub Category</option>");
       }

       $.ajax({
           url:"/get-planscoupon/"+category,
           type:"GET",
           success:function(data){
               var sub_category = data.sub_category;
               var html = "<option value=''>Select Sub Category</option>";
               for(let i =0;i<sub_category.length;i++){
                   html += `
                   <option value="`+sub_category[i]['sub_category_id']+`">`+sub_category[i]['sub_category_name']+`</option>
                   `;
               }
               $("#sub_category_id").html(html);
			   $("#sub_category_id").trigger("chosen:updated");
           }
       });
      //  window.alert(sub_category);
   });
    $("#sub_category_id").change(function(){

       var sub_category = $(this).val();
       //window.alert(sub_category);
       if(sub_category == ""){
           $("#child_category_id").html("<option value=''>Select city</option>");
       }

       $.ajax({
           url:"/get-plans1coupon/"+sub_category,
           type:"GET",
           success:function(data){

               var child_category = data.child_category;
              // window.alert(child_category.lenght);
               var html = "<option value=''>Select city</option>";
               for(let i =0;i<child_category.length;i++){
                   html += `
                   <option value="`+child_category[i]['child_category_id']+`">`+child_category[i]['child_category_name']+`</option>
                   `;
               }
               $("#child_category_id").html(html);
			   $("#child_category_id").trigger("chosen:updated");
           }
       });

   });

});
</script>
@endsection