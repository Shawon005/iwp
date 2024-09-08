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
                    <form class="row needs-validation" action="{{route('job_update',['id'=>$job->job_id])}}"method="post"enctype="multipart/form-data">
                     @csrf
                     <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User name</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="user_id">
                            @foreach($users as $user):
                                @if($user->user_id==$job->user_id)
                                <option value="{{$user->user_id}}" selected>{{$user->first_name}}</option>
                                @else
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="job_title">Job Title</label>
                          <input class="form-control" id="job_title" type="text" name="job_title" placeholder="Job Title*" value="{{$job->job_title}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="salary">Salary</label>
                          <input class="form-control" id="salary" type="text" name="salary" placeholder="Salary*" value="{{$job->job_salary}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="no_of_openings">No of Openings*</label>
                          <input class="form-control" id="no_of_openings" type="text" name="no_of_openings" placeholder="No of Openings*" value="{{$job->no_of_openings}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Interview Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                            <input class=" form-control digits" type="date" data-language="en" name="interview_date"value="{{$job->job_interview_date}}">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Interview Time</label>
                          <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                            <div class="input-group date" id="dt-time" data-target-input="nearest">
                              <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time"name="interview_time"value="{{$job->job_interview_time}}">
                              <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label for="role">Role</label>
                          <input class="form-control" id="role" type="text" name="role" placeholder="Role" required=""value="{{$job->job_role}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="education_qualification">Education & Qualification</label>
                          <input class="form-control" id="education_qualification" type="text" name="education_qualification" placeholder="Education & Qualification" value="{{$job->educational_qualification}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>State</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="state">
                            @foreach($state as $user):
                              @if($job->state_id == $user->state_id)
                                    <option value="{{$user->state_id}}" selected >{{$user->state_name}}</option>
                                      @else
                                      <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                      @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Location</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="city_id">
                            @foreach($city as $user):
                              @if($job->job_location == $user->city_id)
                                    <option value="{{$user->city_id}}" selected >{{$user->city_name}}</option>
                                      @else
                                      <option value="{{$user->city_id}}" >{{$user->city_name}}</option>
                                      @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="company_logo">Company Logo</label>
                          <input class="form-control" id="company_logo" type="file" name="job_image[]" placeholder=""multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Job category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="category_id"value="{{$job->category_id}}">
                              @foreach($category as $user):
                                @if($job->category_id==$user->category_id)
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
                            <label>Job sub-category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="sub_category_id"value="{{$job->sub_category_id}}">
                            @foreach($sub_category as $user):
                              @if($job->sub_category_id==$user->sub_category_id)
                                <option value="{{$user->sub_category_id}}" selected>{{$user->sub_category_name}}</option>
                                @else
                                <option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Job Type</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="job_type">
                              <option value="1"{{($job->job_type == "1")?"selected":""}}>Premanent</option>
                              <option value="2"{{($job->job_type == "2")?"selected":""}}>Contract</option>
                              <option value="3"{{($job->job_type == "3")?"selected":""}}>Part Time</option>
                              <option value="4"{{($job->job_type == "4")?"selected":""}}>Freelance</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="year_of_experience">Year(s) of experience</label>
                          <input class="form-control" id="year_of_experience" type="text" name="year_of_experience" placeholder="Year(s) of experience" value="{{$job->years_of_experience}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="contact_no">Contact no</label>
                          <input class="form-control" id="contact_no" type="text" name="contact_no" placeholder="Contact no" value="{{$job->contact_number}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="email_id">Email id</label>
                          <input class="form-control" id="email_id" type="email" name="email_id" placeholder="Email id" value="{{$job->contact_email_id}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="website">Website</label>
                          <input class="form-control" id="website" type="text" name="website" placeholder="Website" value="{{$job->contact_website}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="contact_person">Contact Person</label>
                          <input class="form-control" id="contact_person" type="text" name="contact_person" placeholder="Contact Person" value="{{$job->contact_person}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="interview_location">Interview location</label>
                          <input class="form-control" id="interview_location" type="text" name="interview_location" placeholder="Interview location" value="{{$job->interview_location}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="company_name">Company Name</label>
                          <input class="form-control" id="company_name" type="text" name="company_name" placeholder="Company Name" value="{{$job->job_company_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Skill Set</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"required=""name="skill_set[]">
                               @foreach($skill as $user):
                                @if($job->skill_set == $user->category_id)
                                    <option value="{{$user->category_id}}" selected >{{$user->category_name}}</option>
                                      @else
                                      <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                      @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label>Job Descriptions</label>
                          <textarea id="editor1"  cols="10" rows="2"name="job_description" value="{{$job->job_description}}">{{$job->job_description}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label>About your company(small description)</label>
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="small_description"value="{{$job->job_small_description}}">{{$job->job_small_description}}</textarea>
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
 