@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div>
					<span class="steps">POST NEW PLACE</span>
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
    					</div>
                        <form class="row listing_form_1 needs-validation" action="{{route('place_store')}}" id="listing_form_1" name="listing_form_1" method="post" enctype="multipart/form-data">
                             @csrf
                              <div class="col-sm-12">
                                <div class="mb-3">
                                  <label for="place_name">Place Name</label>
                                  <input class="form-control" id="place_name" type="text" name="place_name" placeholder="Place Name" >
                                  <div class="valid-feedback">Looks good!</div>
                                  @error('place_name')
                                    <span class="small text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="category_id" class="mb-3">Category</label>
											<select  name="category_id" id="category_id" class="chosen-select form-control">
												<option value="">Select Category</option>
												@foreach($category as $user):
												<option value="{{$user->category_id}}" >{{$user->category_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="tag_name">Tag name</label>
                                            <input class="form-control mt-2" id="tag_name" type="text" name="place_tags" placeholder="Ex:Group of three waterfalls" >
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="place_status" class="mb-3">Status</label>
                                            <select class="js-example-placeholder-multiple chosen-select form-control col-sm-12" name="place_status">
												<option value="">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Open</option>
                                                <option value="3">Close</option>
                                                <option value="4">Temporarily Close</option>
                                                <option value="5">Premanently Close</option>
											</select>
										</div>
									</div>
                                  <div class="col-sm-6">
                                    <div class="mb-3">
                                      <label for="tourism_fee">Booking payment</label>
                                      <input class="form-control mt-2" id="tourism_fee" type="text" name="place_fee" placeholder="" >
                                      <div class="valid-feedback">Looks good!</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="mb-3">
                                      <label class="col-form-label">Open time</label>
                                      <div class="input-group date" id="dt-time" data-target-input="nearest">
                                        <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time"name="opening_time">
                                        <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="mb-3">
                                      <label class="col-form-label">Close Time</label>
                                      <div class="input-group date" id="dt-time1" data-target-input="nearest">
                                        <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time1"name="closeing_time">
                                        <div class="input-group-text" data-target="#dt-time1" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="mb-3">
                                      <label class="col-form-label">Select Date</label>
                                      <div class="input-group date" id="dt-time1" data-target-input="nearest">
                                        <input class="form-control" id="place_date" type="date" name="place_date" placeholder="Select Date">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3">
                                  <label for="direction">Direction(Google map link)</label>
                                  <input class="form-control mt-2" id="direction" type="text"  placeholder="" name="google_map">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <hr> </hr>
                                <div class="mb-3">
                                  <h5 style="color:#0788E2">NEAR BY SERVICES & ACTIVITY</h5>
                                </div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="mb-3">Discover places</label>
										<select multiple ="multiple" name="place_discover[]" class="js-example-placeholder-multiple chosen-select form-control">
											<option value="">Discover places</option>
                                                @foreach($places as $place)
                                                    <option value="{{$place->place_id }}">{{$place->place_name}}</option>
                                                @endforeach
										</select>
									</div>
								</div>
                                <hr> </hr>
								<div class="col-md-12">
									<div class="form-group">
										<label class="mb-3">Discover places</label>
										<select multiple ="multiple" name="place_releted[]" class="js-example-placeholder-multiple chosen-select form-control">
											<option value="">Discover places</option>
                                                @foreach($places as $place)
                                                    <option value="{{$place->place_id }}">{{$place->place_name}}</option>
                                                @endforeach
										</select>
									</div>
								</div>
                                <hr> </hr>
								<div class="col-md-12">
									<div class="form-group">
										<label class="mb-3">Events in this place</label>
										<select multiple ="multiple" name="place_events[]" class="js-example-placeholder-multiple chosen-select form-control">
											<option value="">Discover places</option>
                                                @foreach($event as $user):
                                                    <option value="{{$user->event_id}}" >{{$user->event_name}}</option>
                                                @endforeach
										</select>
									</div>
								</div>
                                <hr> </hr>
                                <div class="mb-3">
                                    <h5>PHOTO GALLERY</h5>
                                    <input type="file" class="form-control " multiple="multiple"name="place_gallery_image[]">
                                </div>
                                <div class="mb-3">
                                  <label for="direction">Video Gallery</label>
                                  <input class="form-control mt-2" id="direction" type="url"  placeholder="" name="place_gallery_video">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                                <hr> </hr>
                                <h4 class="mt-4">What people ask</h4>
                                <div class=" text-end">
                                      <div class="btn btn-primary prod-add-oad"><span>+</span></div>
                                      <div class="btn btn-info prod-add-ore"><span>-</span></div>
                                  </div>
                                <div class="add-prod-oth">
                                  <ul>
                                  <li> 
                                  <div class="row ">
                                    <div class="col">
                                      <div class="mb-3">
                                        <label for="question">Question:</label>
                                        <input class="form-control mt-2" id="question" type="text" name="place_info_question[]" placeholder="" >
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="mb-3">
                                        <label for="answer">Answer:</label>
                                        <input class="form-control mt-2" id="answer" type="text" name="place_info_answer[]" placeholder="" >
                                        <div class="valid-feedback">Looks good!</div>
                                      </div>
                                    </div>
                                   </div>
                                    </li>
                                    </ul>
                               </div>
                                <div class="card alert alert-light">
                                  <div class="p-1">
                                    <h5>SEO Details</h5>
                                  </div>
                                  <div class="p-1">
                                    <input class="form-control" id="seo_title" type="text" name="seo_title" placeholder="SEO Title" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                  <hr> </hr>
                                  <div class="p-1">
                                    <input class="form-control" id="meta_descriptions" type="text" name="seo_descriptions" placeholder="Meta Descriptions" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                  <hr class=""> </hr>
                                  <div class="p-1">
                                    <input class="form-control" id="meta_keywords" type="text" name="seo_keywords" placeholder="Meta Keywords" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                  <hr> </hr>
                                </div>
                              </div>
                                <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">
    						<!--FILED END-->
    						<button type="submit" name="submit_now" class="btn btn-primary">SUBMIT NOW</button>
                        </form>
				    </div>
			    </div>
			</div>
		</div>
	</section>
@endsection

 @section('js')
<script>
   var count=1;
 //PRODUCT SPECIFICATION LIST ADD - APPEND
 $(".prod-add-oad").on('click', function() {
  $(".add-prod-oth ul li:last-child").after(' <li><div class="row "><div class="col"><div class="mb-3"><label for="question">Question:</label><input class="form-control mt-2" id="question" type="text" name="place_info_question[]" placeholder="" ><div class="valid-feedback">Looks good!</div></div></div><div class="col"><div class="mb-3"><label for="answer">Answer:</label><input class="form-control mt-2" id="answer" type="text" name="place_info_answer[]" placeholder="" ><div class="valid-feedback">Looks good!</div></div></div></div></li>');
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
 
</script>
 @endsection