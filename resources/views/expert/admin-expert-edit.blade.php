@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Service Experts</h3>
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
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">  <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Service Experts</li>
                    <li class="breadcrumb-item active">Add New Expert</li>
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
                    <h5>Add New Service Expert Profile</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('expert_update',['id'=>$expert->expert_id])}}"method="post"enctype="multipart/form-data">   
                      @csrf    
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>User</label>
                                <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="user_id">
                                  <option value="">Choose user</option>
                                  @foreach($users as $user):
                                @if($user->user_id==$expert->user_id)
                                <option value="{{$user->user_id}}" selected>{{$user->first_name}}</option>
                                @else
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                @endif
                                 @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>Work profession</label>
                                <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="category_id"id="category">
                                  <option value="">Select Work profession</option>
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
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3 ">
                              <div class="col-form-label"> 
                                <label>State</label>
                                <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="state_id"id="state">
                                  <option value="">Choose state</option>
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
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>City</label>
                                <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="city_id"id="city">
                                  <option value="">Select city</option>
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
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="col-form-label">Service start time</label>
                            <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                              <div class="input-group date" id="dt-time" data-target-input="nearest">
                                <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time"name="available_start_time"value="{{$expert->available_time_start}}">
                                <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                              </div>
                            <!-- </div> -->       
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="col-form-label">Service close time</label>
                              <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                              <div class="input-group date" id="dt-time1" data-target-input="nearest">
                                <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time1"name="available_close_time"value="{{$expert->available_time_end}}">
                                <div class="input-group-text" data-target="#dt-time1" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                              </div>
                              <!-- </div> -->       
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="col-form-label">Select Date</label>
                              <div class="input-group date" id="dt-time1" data-target-input="nearest">
                                <input class="form-control" id="expert_date" type="date" name="expert_date" value="{{$expert->expert_date}}" placeholder="Select Date">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="year_of_experience">Year of experience</label>
                              <input class="form-control" id="year_of_experience" type="text" name="year_of_experience" placeholder="Year of experience"value="{{$expert->years_of_experience}}">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="base_fare">Booking payment</label>
                              <input class="form-control" id="base_fare" type="text" name="base_fare" placeholder="Base fare" required=""name="base_fare"value="{{$expert->base_fare}}">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="profile_image">Profile image</label>
                              <input class="form-control" id="profile_image" type="file" name="profile_image" placeholder="" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="profile_cover_image">Profile cover image</label>
                              <input class="form-control" id="profile_cover_image" type="file" name="cover_image" placeholder="" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Services can do</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="service_can_do[]"id="sub_category">
                              <option value="">Services can do</option>
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
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Service Areas</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="area_id[]"id="area">
                              <option value="">Service Areas</option>
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
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Payment accept</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="payment_id[]">
                              <option value="">Payment accept</option>
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
                        <div class="card alert alert-light">
                          <div class="p-1">
                          <div ><h5 class=" accordion-button"  data-bs-toggle="collapse" data-bs-target="#collapseOne">Experience details </h></div>
                          </div>
                          <div class="p-1"id="collapseOne">
                            <input class="form-control" id="experience_details" type="text"  placeholder="" name="experience_1"id="collapseOne"value="{{$expert->experience_1}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                          
                          <div class="p-1"id="collapseOne">
                            <input class="form-control" id="experience_details" type="text"  placeholder="" name="experience_2"id="experience"value="{{$expert->experience_2}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr class=""> </hr>
                          </div>
                          
                          <div class="p-1"id="collapseOne">
                            <input class="form-control" id="experience_details" type="text"  placeholder="" name="experience_3"id="experience"value="{{$expert->experience_3}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                          
                          <div class="p-1"id="collapseOne">
                            <input class="form-control" id="experience_details" type="text"  placeholder="" name="experience_4"id="experience"value="{{$expert->experience_4}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                          
                        </div>
                        <div class="card alert alert-light">
                          <div class="p-1">
                            <h5 class=" accordion-button"  data-bs-toggle="collapse" data-bs-target="#collapsetwo">Education and Qualifications</h5>
                          </div>
                          <div class="p-1"id="collapsetwo">
                            <input class="form-control" id="education_and_qualification" type="text"  placeholder="" name="education_1"id="education"value="{{$expert->education_1}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                         
                          <div class="p-1"id="collapsetwo">
                            <input class="form-control" id="education_and_qualification" type="text"  placeholder="" name="education_2"id="education"value="{{$expert->education_2}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr class=""> </hr>
                          </div>
                         
                          <div class="p-1"id="collapsetwo">
                            <input class="form-control" id="education_and_qualification" type="text"  placeholder="" name="education_3"id="education"value="{{$expert->education_3}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                          
                          <div class="p-1"id="collapsetwo">
                            <input class="form-control" id="education_and_qualification" type="text"  placeholder="" name="education_4"id="education"value="{{$expert->education_4}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                         
                        </div>
                        <div class="card alert alert-light">
                          <div class="p-1">
                            <h5 class=" accordion-button"  data-bs-toggle="collapse" data-bs-target="#collapsethree">Additional information</h5>
                          </div>
                          <div class="p-1"id="collapsethree">
                            <input class="form-control" id="evtra_coursestraining_details" type="text" name="additional_info_1"id="additional_info" placeholder="Extra Courses" value="{{$expert->additional_info_1}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                            
                          </div>
                          
                          <div class="p-1"id="collapsethree">
                            <input class="form-control" id="training_details" type="text" name="additional_info_2"id="additional_info" placeholder="Training Details" value="{{$expert->additional_info_2}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr class=""> </hr>
                          </div>
                          
                          <div class="p-1"id="collapsethree">
                            <input class="form-control" id="others_1" type="text" name="additional_info_3" id="additional_info" placeholder="Others 1" value="{{$expert->additional_info_3}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                         
                          <div class="p-1"id="collapsethree">
                            <input class="form-control" id="others_2" type="text"name="additional_info_4" id="additional_info" placeholder="Others 2" value="{{$expert->additional_info_4}}">
                            <div class="valid-feedback">Looks good!</div>
                            <hr> </hr>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label class="col-form-label">Date of Birth</label>
                              <!-- <div class="col-xl-5 col-sm-9"> -->
                                <div class="input-group">
                                  <input class="form-control digits" type="date" data-language="en"name="date_of_birth"value="{{$expert->date_of_birth}}">
                                </div>
                              <!-- </div> -->
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="id_proof">ID proof</label>
                              <input class="form-control" id="id_proof" type="file" name="id_proof" placeholder="No of Openings*">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>                                                
                      </div>
                      <div class="btn-showcase text-end">
                      <button class="btn btn-primary" type="submit">Submit Now</button>
                      <input class="btn btn-light" type="reset" value="Discard">
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
        <!-- footer start-->
        @section('js')
        <script>


$(document).ready(function(){
   
   $("#category").change(function(){
        alert('If you Change this item , You Should change Service can do also');
       var category = $(this).val();
      //  window.alert(category);
       if(category == ""){
           $("#sub_category").html("<option value=''>Select sub Category</option>");
       }

       $.ajax({
           url:"/get-plans/"+category,
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
  
    $("#state").change(function(){

       var sub_category = $(this).val();
       //window.alert(sub_category);
       if(sub_category == ""){
           $("#city").html("<option value=''>Select city</option>");
       }

       $.ajax({
           url:"/get-plans1/"+sub_category,
           type:"GET",
           success:function(data){

               var child_category = data.child_category;
              // window.alert(child_category.lenght);
               var html = "<option value=''>Select city</option>";
               for(let i =0;i<child_category.length;i++){
                   html += `
                   <option value="`+child_category[i]['country_id']+`">`+child_category[i]['country_name']+`</option>
                   `;
               }
               $("#city").html(html);
           }
       });

   });

   $("#city").change(function(){

      var sub_category = $(this).val();
      //window.alert(sub_category);
      if(sub_category == ""){
          $("#area").html("<option value=''>Select city</option>");
      }

      $.ajax({
          url:"/get-plans2/"+sub_category,
          type:"GET",
          success:function(data){

              var child_category = data.child_category;
            // window.alert(child_category.lenght);
              var html = "<option value=''>Select city</option>";
              for(let i =0;i<child_category.length;i++){
                  html += `
                  <option value="`+child_category[i]['city_id']+`">`+child_category[i]['city_name']+`</option>
                  `;
              }
              $("#area").html(html);
           }
});

});

});

</script>
 @endsection