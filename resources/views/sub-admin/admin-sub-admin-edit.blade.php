@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Others</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Sub admin</li>
                    <li class="breadcrumb-item active">Create Sub admin</li>
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
                    <h5>Sub admin details</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation"action="{{route('sub_admin_update',['id'=>$sub->admin_id])}}"method="POST" novalidate="">
                      @csrf
                    <div class="col-sm-12">
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-3">
                              <label>Sub admin Type</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select id="type"class="js-example-placeholder-multiple col-sm-12" name="admin_type"required="" >
                                  <option value="">Select sub admin type</option>
                                 @foreach($admin as $sub_admin)
                                 @if($sub->admin_type==$sub_admin->sub_admin_type_id)
                                 <option value="{{$sub_admin->sub_admin_type_id}}"selected>{{$sub_admin->sub_admin_type}}</option>
                                 @else
                                 <option value="{{$sub_admin->sub_admin_type_id}}">{{$sub_admin->sub_admin_type}}</option>
                                 @endif
                                 @endforeach
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="state">
                          <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-2">
                            <label>State</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">    
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="state_id"id="state_id">
                                  <option value="">Choose state</option>
                                  @foreach($state as $user):
                                    @if($sub->state_id==$user->state_id)
                                <option value="{{$user->state_id}}" selected >{{$user->state_name}}</option>
                                @else
                                <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                @endif
                                 @endforeach
                                </select>
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                       </div>
                        <div id="city">
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-2">
                            <label>City</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">    
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="city_id"id="city_id">
                                  <option value="">Select city</option>
                                  @foreach($city as $user):
                                    @if($sub->city_id==$user->city_id)
                                <option value="{{$user->city_id}}" selected >{{$user->city_name}}</option>
                                @else
                                <option value="{{$user->city_id}}" >{{$user->city_name}}</option>
                                @endif
                                 @endforeach
                                </select>
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-2">
                              <label for="city_name">Sub admin name</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">    
                              <input class="form-control" id="city_name" type="text" name="admin_name" placeholder="name*" required=""value="{{$sub->admin_name}}">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-2">
                              <label for="city_name">User name</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">                         
                              <input class="form-control" id="city_name" type="text" name="admin_email" value="{{$sub->admin_email}}"placeholder="Enter user name" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>    
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-2">
                              <label for="city_name">Password</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">
                              <input class="form-control" id="city_name" type="Password" name="admin_password"value="{{$sub->admin_password}}" placeholder="Enter Password" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>    
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-2">
                              <label for="city_name">Profile picture</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">           
                              <input class="form-control" id="city_name" type="file" name="admin_photo" placeholder="Brose No file checked">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        @php $ad=Nam('vv_admin','admin_id',session('id'),'admin_sub_admin_type'); @endphp
                        @if(!$ad)
                        <hr>                        
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_user_options"{{($sub->admin_user_options)==1?"checked":''}}  value=1>
                                <label class="form-check-label" for="exampleCheck1">User options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_listing_options"{{($sub->admin_listing_options)==1?"checked":''}}  value=1>
                                <label class="form-check-label" for="exampleCheck1">Listing options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_event_options"{{($sub->admin_event_options)==1?"checked":''}}  value=1>
                                <label class="form-check-label" for="exampleCheck1">Event options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"{{($sub->admin_blog_options)==1?"checked":''}}  name="admin_blog_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Blog post options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_product_options"{{($sub->admin_product_options)==1?"checked":''}}  value=1>
                                <label class="form-check-label" for="exampleCheck1"> Product options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_jobs_options"{{($sub->admin_jobs_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Job options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_service_expert_options"{{($sub->admin_service_expert_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Service Expert Options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_news_options"{{($sub->admin_news_options)==1?"checked":''}}  value=1>
                                <label class="form-check-label" for="exampleCheck1">News & Magazine options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_seo_setting_options"{{($sub->admin_seo_setting_options)==1?"checked":''}}  value=1>
                                <label class="form-check-label" for="exampleCheck1"> SEO Setting options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"{{($sub->admin_appearance_options)==1?"checked":''}} name="admin_appearance_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Appearance options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_category_options"value=1 {{($sub->admin_category_options)==1?"checked":''}} >
                                <label class="form-check-label" for="exampleCheck1">Listing Category options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_product_category_options"{{($sub->admin_category_options)==1?"checked":''}}  value=1>
                                <label class="form-check-label" for="exampleCheck1">
                                Product Category options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"{{($sub->admin_enquiry_options)==1?"checked":''}}  name="admin_enquiry_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">
                                Enquiry & get quote options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_review_options"{{($sub->admin_enquiry_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Reviews options</label>
                              </div>
                            </div>
                          </div>       
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_feedback_options"{{($sub->admin_enquiry_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Feedback options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="city_name">Credentials</label>
                              <!-- <input class="form-control" id="city_name" type="text" name="name" placeholder="" required=""> -->
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_notification_options"{{($sub->admin_enquiry_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Send notification  options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_ads_options"{{($sub->admin_ads_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Ads options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_home_options"{{($sub->admin_home_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Home Page options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_country_options"{{($sub->admin_country_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Country  options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_city_options"{{($sub->admin_city_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">City options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_listing_filter_options"{{($sub->admin_listing_filter_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Listing Filter options</label>
                              </div>
                            </div>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_invoice_options"{{($sub->admin_invoice_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Invoice options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_import_options"{{($sub->admin_import_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Import & Export options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_sub_admin_options"{{($sub->admin_sub_admin_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Sub Admin options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_text_options"{{($sub->admin_text_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">All Text Change options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_listing_price_options"{{($sub->admin_listing_price_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Listing Price options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_payment_options"{{($sub->admin_payment_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Admin Payment options</label>
                              </div>
                            </div>
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_setting_options"{{($sub->admin_setting_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Setting options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_footer_options"{{($sub->admin_footer_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Footer CM options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_dummy_image_options"{{($sub->admin_dummy_image_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Dummy images options</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_mail_template_options"{{($sub->admin_mail_template_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Mail Template options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_wallet_options"{{($sub->admin_wallet_options)==1?"checked":''}} value=1>
                                <label class="form-check-label" for="exampleCheck1">Wallet options</label>
                              </div>
                            </div>
                          </div>
                        </div>  
                        @endif
                      </div>
                    <!-- </div> -->
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Add user</button>
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
        <!-- footer start-->
 @endsection
 @section('js')

<script>
 

 $(document).ready(function(){
 
    var type =  $("#type").val();
    //alert(type);
    if(type==1 || type==2)
    {
      //alert(type);
      document.getElementById("state").style.display='block';
      document.getElementById("city").style.display= 'none';
    }
    else if(type==3 || type==6)
    {
      document.getElementById("state").style.display ='block';
      document.getElementById("city").style.display='block';
    }
    else{
      document.getElementById("state").style.display='none';
      document.getElementById("city").style.display='none';
    }
    $("#type").change(function(){
    var type = $(this).val();
    //alert(type);
    if(type==1 || type==2 || type==3)
    {
      //alert(type);
      document.getElementById("state").style.display='block';
      document.getElementById("city").style.display= 'none';
    }
    else if( type==6 || type==4)
    {
      document.getElementById("state").style.display ='block';
      document.getElementById("city").style.display='block';
    }
    else{
      document.getElementById("state").style.display='none';
      document.getElementById("city").style.display='none';
    }
   
  });
  
 $("#state_id").change(function(){

var state = $(this).val();
//window.alert(sub_category);
if(state == ""){
    $("#city_id").html("<option value=''>Select city</option>");
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
        $("#city_id").html(html);
    }
});

});
});

</script>
@endsection