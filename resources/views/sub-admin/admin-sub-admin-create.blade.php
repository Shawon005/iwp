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
                    <form class="row needs-validation"action="{{route('sub_admin_store')}}"method="POST" novalidate="">
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
                                <select id="type" class="js-example-placeholder-multiple col-sm-12" name="admin_type" required="">
                                  <option value="">Select sub admin type</option>
                                 @foreach($admin as $sub)
                                 <option value="{{$sub->sub_admin_type_id}}">{{$sub->sub_admin_type}}</option>
                                 @endforeach
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div  id="state">
                        <div class="row">
                          <hr>
                          <div class="col-sm-2">
                            <div class="mt-2">
                            <label>State</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">    
                            <select class="js-example-placeholder-multiple col-sm-12"  id="state_id" name="state_id">
                                  <option value="">Choose state</option>
                                  @foreach($state as $user):
                                <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                 @endforeach>
                                </select>
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                          <hr>
                        </div>
                        </div>
                         <div id="city">
                         <div class="row" >
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
                                <option value="{{$user->city_id}}" >{{$user->city_name}}</option>
                                 @endforeach>
                                </select>
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                          <hr>
                        </div>
                         </div>

                        
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="mt-2">
                              <label for="city_name">Sub admin name</label>
                            </div>
                          </div>
                          <div class="col-sm-10">
                            <div class="mb-1">    
                              <input class="form-control" id="city_name" type="text" name="admin_name" placeholder="name*" required="">
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
                              <input class="form-control" id="city_name" type="text" name="admin_email" placeholder="Enter user name" required="">
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
                              <input class="form-control" id="city_name" type="Password" name="admin_password" placeholder="Enter Password" required="">
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
                              <input class="form-control" id="city_name" type="file" name="admin_photo" placeholder="Brose No file selected" required="">
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_user_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">User options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_listing_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Listing options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_event_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_blog_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Blog post options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_product_options"value=1>
                                <label class="form-check-label" for="exampleCheck1"> Product options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_jobs_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_service_expert_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Service Expert Options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_news_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">News & Magazine options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_seo_setting_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_appearance_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Appearance options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_category_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Listing Category options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_product_category_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_enquiry_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">
                                Enquiry & get quote options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_review_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Reviews options</label>
                              </div>
                            </div>
                          </div>       
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_feedback_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_notification_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Send notification  options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_ads_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Ads options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_home_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_country_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Country  options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_city_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">City options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_listing_filter_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_invoice_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Invoice options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_import_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Import & Export options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_sub_admin_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_text_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">All Text Change options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_listing_price_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Listing Price options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_payment_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_setting_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Setting options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_footer_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Footer CM options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_dummy_image_options"value=1>
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_mail_template_options"value=1>
                                <label class="form-check-label" for="exampleCheck1">Mail Template options</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <div class="d-inline">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="admin_wallet_options"value=1>
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
  $("#type").change(function(){
    var type = $(this).val();
    //alert(type);
    if(type==1 || type==2  || type==3)
    {
      //alert(type);
      document.getElementById("state").style.display='block';
      document.getElementById("city").style.display= 'none';
    }
    else if(type==6 || type==4)
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