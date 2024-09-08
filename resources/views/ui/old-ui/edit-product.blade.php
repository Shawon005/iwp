@extends('ui.old-ui.master.master2')
@section('content')

	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Edit Product</span>
					<div class="log">
						<div class="login add-list-off">
							<h4>Edit this product</h4>
							@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
							<form action="{{route('user_product_update',['id'=>$product->product_id])}}" class="product_form" id="product_form" name="product_form" method="post" enctype="multipart/form-data">
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
													<input type="text" name="product_name" id="product_name" required="required" class="form-control" value="{{$product->product_name}}" placeholder="Product Name*">
												</div>
												@error('product_name')
												<span class="small text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select onChange="getProductSubCategory(this.value);" name="category_id" id="category_id" class="chosen-select form-control">
												    	@foreach($category as $user):
														@if($user->category_id==$product->category_id)
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
											<div class="col-md-12">
												<div class="form-group">
													<select name="sub_category_id[]" id="sub_category_id" multiple class="chosen-select form-control">
														<!--                                            <option -->
														<!-- value="">Select Sub Category</option>-->
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
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select name="sub_category_id[]" id="child_category_id" multiple class="chosen-select form-control">
														<!--                                            <option -->
														<!-- value="">Select Sub Category</option>-->
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
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select onChange="getProductSubCategory(this.value);" name="brand_id" id="category_id" class="chosen-select form-control">
													    @foreach($brand as $user):
														@if($user->brand_id==$product->brand_id)
														<option value="{{$user->brand_id}}" selected>{{$user->brand_name}}</option>
														@else
														<option value="{{$user->brand_id}}" >{{$user->brand_name}}</option>
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
													<input type="text" name="product_price" id="product_price" onkeypress="return isNumber(event)" value="{{$product->product_price}}" required="required" class="form-control" placeholder="Price*">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="product_price_offer" id="product_price_offer" onkeypress="return isNumber(event)" value="{{$product->product_price_offer}}" class="form-control" placeholder="Offer (i.e) 50">
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="product_payment_link" id="product_payment_link" placeholder="Product Payment External Link">{{$product->product_payment_link}}</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" required="required" name="product_description" id="product_description" placeholder="Product Details">{{$product->product_description}}</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Product images(max 5 images)</label>
													<input type="file" name="gallery_image[]" class="form-control" accept="image/png, image/jpeg" multiple>
												</div>
											</div>
										</div>
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
												<div class="log">
													<div class="login add-prod-high-oth">
														<h4>Highlights</h4>
														<span class="add-list-add-btn prod-add-high-oad" title="add new offer">+</span>
														<span class="add-list-rem-btn prod-add-high-ore" title="remove offer">-</span>
														<ul>
													    	@foreach($highlight as $list)
															<li>
																<!--FILED START-->
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group">
																			<input type="text" name="product_highlights[]" value="{{$list}}" class="form-control" placeholder="(i.e) 1 Year Onsite Warranty">
																		</div>
																	</div>
																</div>
																<!--FILED END-->
															</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="log">
													<div class="login add-prod-oth">
														<h4>Specifications</h4>
														<span class="add-list-add-btn prod-add-oad" title="add new offer">+</span>
														<span class="add-list-rem-btn prod-add-ore" title="remove offer">-</span>
														<ul>
														@php
														$val=0;
														@endphp
												    	@foreach($product_info_question as $qu)
															<li>
																<!--FILED START-->
																<div class="row">
																	<div class="col-md-5">
																		<div class="form-group">
																			<input type="text" class="form-control" name="product_info_question[]" value="{{$qu}}" placeholder="(i.e) Serial Number">
																		</div>
																	</div>
																	<div class="col-md-2">
																		<div class="form-group"> <i class="material-icons">arrow_forward</i>
																		</div>
																	</div>
																	<div class="col-md-5">
																		<div class="form-group">
																			<input type="text" class="form-control" name="product_info_answer[]" value="{{$product_info_answer[$val++]}}" placeholder="(i.e) qwerty3421">
																		</div>
																	</div>
																</div>
																<!--FILED END-->
															</li>
															@endforeach
															
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!--FILED END-->
										<!--FILED START-->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea class="form-control" name="product_tags" id="product_tags" placeholder="Product Tags (i.e) electronics,laptop,hp,canon">{{$product->product_tags}}</textarea>
												</div>
											</div>
										</div>
										<!--FILED END-->
									</li>
								</ul>
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="product_submit" class="btn btn-primary">Update & Submit</button>
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
     
     $("#category_id").change(function(){

         var CatId = $(this).val();
        //  window.alert(category);
		$("#sub_category_id").html('');
         if(CatId == ""){
             $("#sub_category_id").html("<option value=''>Select sub Category</option>");
         }
		 
         $.ajax({
             url:"/getSubCatByCatId/"+CatId,
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

         var SubCatId = $(this).val();
         //window.alert(sub_category);
         if(SubCatId == ""){
             $("#child_category_id").html("<option value=''>Select city</option>");
         }

         $.ajax({
             url:"/getChildCatByCatId/"+SubCatId,
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
 var count=1;
 //PRODUCT SPECIFICATION LIST ADD - APPEND
 $(".prod-add-oad").on('click', function() {
  $(".add-prod-oth ul li:last-child").after('<li><div class="row mb-3"><div class="col"><input class="form-control" id="serial_number" type="text" name="product_info_question[]" placeholder="Quation" required=""><div class="valid-feedback">Looks good!</div></div><div class="col"><input class="form-control" id="serial_number" type="text" name="product_info_answer[]" placeholder="Answer " required=""><div class="valid-feedback">Looks good!</div></div></div></li>');
count=count+1;
});
    //PRODUCT SPECIFICATION LIST REMOVE - APPEND
    $(".prod-add-ore").on('click', function() {
        var _prodspec = $(".add-prod-oth ").length;
        if(count >= 2){
            $(".add-prod-oth ul li:last-child").remove();
            count=count-1;
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });
    var count1=1;
 //PRODUCT SPECIFICATION LIST ADD - APPEND
 $(".prod-add-oad1").on('click', function() {
  $(".highlight ul li:last-child").after(' <li><div class=mb-3><input class="form-control " id="" type="text" name="highlight[]" placeholder="(i.e) 1 year onsite warranty" required=""></div></li>');
count1=count1+1;
});
    //PRODUCT SPECIFICATION LIST REMOVE - APPEND
    $(".prod-add-ore1").on('click', function() {
        var _prodspec = $(".highlight ").length;
        if(count1 >= 2){
            $(".highlight ul li:last-child").remove();
            count1=count1-1;
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

  function hide(){
    document.getElementById("Ex_payment").style.display="none";
  }
  function show(){
    document.getElementById("Ex_payment").style.display="inline";

  }
</script>
@endsection