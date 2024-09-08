

@extends('layout.master')
@section('content')
        <div class="page-body">

          <div class="container-fluid">
 @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
               @endif            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Listings</h3>
                 
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Listings</li>
                    <li class="breadcrumb-item active">Add Listings</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Listing Details</h5>
                    <!-- <h5>Services Provide</h5> step 2 --> 
                    <!-- <h5>Special Offers</h5> step 3 -->
                    <!-- <h5>Others information</h5> step 5-->
                  </div>
                  <div class="card-body">
                    <div class="stepwizard">
                      <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step"><a class="btn btn-primary" href="#step-1">1</a>
                          <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-2">2</a>
                          <p>Step 2</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-3">3</a>
                          <p>Step 3</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-4">4</a>
                          <p>Step 4</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-5">5</a>
                          <p>Step 5</p>
                        </div>
                      </div>
                    </div>
                    <form action="{{route('listing_store')}}" method="post"enctype="multipart/form-data">
                      @csrf
                      <div class="setup-content" id="step-1">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>User Name</label>
                                <select class="js-example-placeholder-multiple col-sm-12"name="user_id">
                                @foreach($users as $user):
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                 @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="listing_name">Listing Name</label>
                              <input class="form-control" id="listing_name" type="text" name="listing_name" placeholder="Listing Name*" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="phone_number">Phone Number</label>
                                  <input class="form-control" id="phone_number" type="text" name="listing_moblie" placeholder="Phone Number" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="email_id">Email ID</label>
                                  <input class="form-control" id="email_id" type="email" name="listing_email" placeholder="Email Id" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="whatsapp_number">Whatsapp Number</label>
                              <input class="form-control" id="whatsapp_number" type="text" name="listing_whatsapp" placeholder="Whatsapp Number">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="mb-3">
                              <label for="website">Website</label>
                              <input class="form-control" id="website" type="text" name="listing_website" placeholder="Website" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="mb-3">
                              <label for="shop_address">Shop Address</label>
                              <input class="form-control" id="shop_address" type="text" name="listing_address" placeholder="Shop Address" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="latitude">Latitude</label>
                                  <input class="form-control" id="latitude" type="text" name="listing_lat" placeholder="Latitude i.e 40.730610" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="longitude">Longitude</label>
                                  <input class="form-control" id="longitude" type="text" name="listing_lng" placeholder="Longitude i.e-73.935242">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>Country</label>
                                <select class="js-example-placeholder-multiple col-sm-12"name="country_id"id="country">
                                  <option value="">Select your country</option>
                                  @foreach($country as $user):
                              <option value="{{$user->country_id}}" >{{$user->country_name}}</option>
                               @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>States</label>
                                <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="state_id[]"id="state">
                                  <option value="">Select states</option>
                                  @foreach($state as $user):
                                <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                 @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>Cities</label>
                                <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="city_id[]"id="city">
                                  <option value="">Select cities</option>
                                  @foreach($city as $user):
                                <option value="{{$user->city_id}}" >{{$user->city_name}}</option>
                                 @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>Category</label>
                                <select class="js-example-placeholder-multiple col-sm-12"name="category_id"id="category">
                                  <option value="">Select Category</option>
                                  @foreach($category as $user):
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                 @endforeach>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>Sub Category</label>
                                <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="sub_category_id[]"id="sub_category">
                                  <option value="">Select Sub Category</option>
                                  @foreach($sub_category as $user):
                                <option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
                                 @endforeach>
                                </select>
                              </div>
                            </div>
                            <div class="email-wrapper">
                              <div class="theme-form">
                                <div class="mb-3">
                                  <label>Details about your listing</label>
                                  <textarea id="editor1"  cols="10" rows="2"name="listing_description"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="choose_profile_image">Choose Profile Image</label>
                                  <input class="form-control" id="choose_profile_image" type="file" name="profile_image" placeholder="" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="choose_cover_image">Choose Cover Image</label>
                                  <input class="form-control" id="choose_cover_image" type="file" name="cover_image" placeholder="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>                            
                            <div class="mb-3">
                              <label>Enter service locations</label>
                              <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="service_location"></textarea>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-2">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="card alert-light border">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class=" p-4">
                                    <label for="service_name">Service Name</label>
                                    <input class="form-control" id="service_name" type="text" name="service_id[]" placeholder="Ex:Plumbile" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="p-4">
                                    <label for="choose_profile_image">Choose Profile Image</label>
                                    <input class="form-control" id="choose_profile_image" type="file" name="service_image[]" placeholder="" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card alert-light border">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class=" p-4">
                                    <label for="service_name">Service Name</label>
                                    <input class="form-control" id="service_name" type="text" name="service_id[]" placeholder="Ex:Bike Service" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="p-4">
                                    <label for="choose_profile_image">Choose Profile Image</label>
                                    <input class="form-control" id="choose_profile_image" type="file" name="service_image[]" placeholder="" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-3">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="card alert-light border">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="p-3">
                                    <label for="offer_name">Offer Name</label>
                                    <input class="form-control" id="offer_name" type="text" name="service_1_name[]" placeholder="offer name*">
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="p-3">
                                    <label for="price">Price</label>
                                    <input class="form-control" id="price" type="text" name="service_1_price[]" placeholder="price" >
                                    <div class="valid-feedback">Looks good!</div>
                                  </div>
                                </div>
                              </div>
                              <div class="p-3">
                                <label> Details about this offer</label>
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="service_1_details[]"></textarea>
                              </div>
                              <div class="p-3">
                                <label for="choose_offer_image">Choose Offer Image</label>
                                <input class="form-control" id="choose_offer_image" type="file" name="service_1_image[]" placeholder="" >
                                <div class="valid-feedback">Looks good!</div>
                              </div>
                              <div class="p-3">
                                <label for="view_more_link">View more link</label>
                                <input class="form-control" id="view_more_link" type="text" name="service_1_viwe_more[]" placeholder="" >
                                <div class="valid-feedback">Looks good!</div>
                              </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-4">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="mb-3">
                              <label>Video Gallery</label>
                              <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="listing_video"></textarea>
                            </div>
                            <div class="mb-3">
                              <label>Map and 360 view</label>
                              <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="google_map"></textarea>
                            </div>
                            <div class="mb-3">
                              <label></label>
                              <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="M360_view"></textarea>
                            </div>
                            <div class="mt-3">
                              <h4>Photo Gallery</h4>
                            </div>
                            <div class="row"> 
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="photo_gallery"></label>
                                  <input class="form-control" id="photo_gallery" type="file" name="gallery_image[]" placeholder="" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="photo_gallery"></label>
                                  <input class="form-control" id="photo_gallery" type="file" name="gallery_image[]" placeholder="" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <div class="row"> 
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="photo_gallery"></label>
                                  <input class="form-control" id="photo_gallery" type="file" name="gallery_image[]" placeholder="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="photo_gallery"></label>
                                  <input class="form-control" id="photo_gallery" type="file" name="gallery_image[]" placeholder="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <div class="row"> 
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="photo_gallery"></label>
                                  <input class="form-control" id="photo_gallery" type="file" name="gallery_image[]" placeholder="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3">
                                  <label for="photo_gallery"></label>
                                  <input class="form-control" id="photo_gallery" type="file" name="gallery_image[]" placeholder="">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>                            
                            <button class="btn btn-primary nextBtn pull-right" type="submit">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-5">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="experience" type="text" name="listing_info_question[]" placeholder="Experience" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="mb-3 ms-5">
                                  <div class="media font-success mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    <!-- <div class="media-body align-self-center">
                                      <h6 class="mt-0">arrow-right</h6>
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="year" type="text" name="listing_info_answer[]" placeholder="20 Years" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="parking" type="text" name="listing_info_question[]" placeholder="Parking">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="mb-3 ms-5">
                                  <div class="media font-success mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    <!-- <div class="media-body align-self-center">
                                      <h6 class="mt-0">arrow-right</h6>
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="yes" type="text" name="listing_info_answer[]" placeholder="Yes" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="smoking" type="text" name="listing_info_question[]" placeholder="Smoking" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="mb-3 ms-5">
                                  <div class="media font-success mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    <!-- <div class="media-body align-self-center">
                                      <h6 class="mt-0">arrow-right</h6>
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="yes" type="text" name="listing_info_answer[]" placeholder="Yes">
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="take_out" type="text" name="listing_info_question[]" placeholder="Take Out" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="mb-3 ms-5">
                                  <div class="media font-success mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    <!-- <div class="media-body align-self-center">
                                      <h6 class="mt-0">arrow-right</h6>
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="mb-3">
                                  <input class="form-control" id="yes" type="text" name="listing_info_answer[]" placeholder="Yes" >
                                  <div class="valid-feedback">Looks good!</div>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-primary pull-right" type="submit">Submit Listing</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection        
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
        <!-- footer start-->
