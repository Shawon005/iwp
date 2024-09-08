@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Jobs</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Jobs</li>
                    <li class="breadcrumb-item active">Add Job</li>
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
                    <h5>Add New Job</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('job_store')}}"method="post"enctype="multipart/form-data">
                     @csrf
                     <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User name</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="user_id">
                            @foreach($users as $user):
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="job_title">Job Title</label>
                          <input class="form-control" id="job_title" type="text" name="job_title" placeholder="Job Title*" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="salary">Salary</label>
                          <input class="form-control" id="salary" type="text" name="salary" placeholder="Salary*" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="no_of_openings">No of Openings*</label>
                          <input class="form-control" id="no_of_openings" type="text" name="no_of_openings" placeholder="No of Openings*" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Interview Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                            <input class=" form-control digits" type="date" data-language="en" name="interview_date">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Interview Time</label>
                          <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                            <div class="input-group date" id="dt-time" data-target-input="nearest">
                              <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time"name="interview_time">
                              <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label for="role">Role</label>
                          <input class="form-control" id="role" type="text" name="role" placeholder="Role" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="education_qualification">Education & Qualification</label>
                          <input class="form-control" id="education_qualification" type="text" name="education_qualification" placeholder="Education & Qualification" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>State</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="state"id="state">
                            @foreach($state as $user):
                                <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Location</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="location"id="city">
                            @foreach($city as $user):
                                <option value="{{$user->city_id}}" >{{$user->city_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="company_logo">Company Logo</label>
                          <input class="form-control" id="company_logo" type="file" name="job_image[]" placeholder="" required=""multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Job category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="category_id" id="category">
                              @foreach($category as $user):
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Job sub-category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="sub_category_id"id="sub_category">
                            @foreach($sub_category as $user):
                                <option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Job Type</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="job_type">
                              <option value="1">Premanent</option>
                              <option value="2">Contract</option>
                              <option value="3">Part Time</option>
                              <option value="4">Freelance</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="year_of_experience">Year(s) of experience</label>
                          <input class="form-control" id="year_of_experience" type="text" name="year_of_experience" placeholder="Year(s) of experience" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="contact_no">Contact no</label>
                          <input class="form-control" id="contact_no" type="text" name="contact_no" placeholder="Contact no" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="email_id">Email id</label>
                          <input class="form-control" id="email_id" type="email" name="email_id" placeholder="Email id" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="website">Website</label>
                          <input class="form-control" id="website" type="text" name="website" placeholder="Website" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="contact_person">Contact Person</label>
                          <input class="form-control" id="contact_person" type="text" name="contact_person" placeholder="Contact Person" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="interview_location">Interview location</label>
                          <input class="form-control" id="interview_location" type="text" name="interview_location" placeholder="Interview location" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="company_name">Company Name</label>
                          <input class="form-control" id="company_name" type="text" name="company_name" placeholder="Company Name" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Skill Set</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="skill_set[]">
                               @foreach($skill as $user):
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label>Job Descriptions</label>
                          <textarea id="editor1"  cols="10" rows="2"name="job_description"></textarea>
                        </div>
                        <div class="mb-3">
                          <label>About your company(small description)</label>
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="small_description"></textarea>
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
          }
      });

      });
});
 </script>
 @endsection