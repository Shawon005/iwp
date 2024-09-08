@extends('layout.master')
@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/vendors/date-picker.css">
@endsection
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Events</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Events</li>
                    <li class="breadcrumb-item active">Add Events</li>
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
                    <h5>Create Events</h5>
                  </div>
                  <div class="card-body add-post">
                  @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <form class="row needs-validation" action="{{route('event_update',['id'=>$event->event_id])}}" method="Post"enctype="multipart/form-data">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="user_id">
                              <option value="">Choose a user</option>
                              @foreach($users as $user):
                                @if($user->user_id==$event->user_id)
                                <option value="{{$user->user_id}}" selected>{{$user->first_name}}</option>
                                @else
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="event_name">Event Name*</label>
                          <input class="form-control" id="event_name" type="text" name="event_name" placeholder="Event name*" required=""value="{{$event->event_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Event State</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="state_id"id="state">
                            <option value="AL">Select your states</option>
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
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Cities</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple" name="city_id[]"id="city">
                              <option value="AL">Select your cities</option>
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
                        <div class="mb-3">
                          <label for="address">Address</label>
                          <input class="form-control" id="address" type="text" name="event_address" placeholder="Address*" required=""value="{{$event->event_address}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="category_id">
                              <option value="AL">Select Category</option>
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
                        <div class="mb-3">
                          <label class="col-form-label">Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class=" form-control digits" type="date" data-language="en"name="event_start_date"required="" value="{{$event->event_start_date}}">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Time</label>
                          <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                            <div class="input-group date" id="dt-time" data-target-input="nearest">
                              <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time"name="event_time"value="{{$event->event_time}}">
                              <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="email-wrapper">
                          <div class="theme-form">
                            <div class="mb-3">
                              <label>Event Details</label>
                              <textarea id="editor1" name="event_description" cols="10" rows="2"name="event_description"value="{{$event->event_description}}">{{$event->event_description}}</textarea>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label>Google Map Location</label>
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="event_map"value="{{$event->event_map}}">{{$event->event_map}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="banner_image">Choose Banner Image</label>
                          <input class="form-control" id="banner_image" type="file" name="event_image[]" placeholder="" multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="contact_person">Contact Person</label>
                          <input class="form-control" id="contact_person" type="text" name="event_contact_name" placeholder="Contact Person*" required=""value="{{$event->event_contact_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="contact_phone_no">Contact Phone number</label>
                          <input class="form-control" id="contact_phone_no" type="text" name="event_mobile" placeholder="Contact Phone number*" required=""value="{{$event->event_mobile}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="email_id">Contact Email id</label>
                          <input class="form-control" id="email_id" type="email" name="event_email" placeholder="event_email" required=""value="{{$event->event_email}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>           
                        <div class="mb-3">
                          <label for="event_website">Event website</label>
                          <input class="form-control" id="event_website" type="text" name="event_website" placeholder="Event website" value="{{$event->event_website}}"required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="d-inline">
                            @if($event->isenquiry)
                            <input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1" checked>
                             @else
                             <input type="checkbox" class="form-check-input" id="exampleCheck1"name="isenquiry" value="1">
                             @endif
                            <label class="form-check-label" for="exampleCheck1">Enquiry or Registration form enable</label>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </form>  
                  </div>
                  <div class="btn-showcase text-end">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
 @endsection 
 @section('js')
<script src="{{asset('')}}assets/js/form-wizard/form-wizard-two.js"></script>
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
             }
         });

     });
 });

</script>
@endsection  