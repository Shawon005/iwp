@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Settings</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Settings</li>
                    <li class="breadcrumb-item active">Site Setting</li>
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
                  <!-- <div class="card-header pb-0">
                    <h5>Settings</h5>
                  </div> -->
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('setting_store')}}"method="post"enctype="multipart/form-data" novalidate="">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <h4>Admin Details</h4>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="website_name">Website Name</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                          
                              <input class="form-control" id="website_name" type="text" name="website_name" placeholder="Website Name*" required="" value="{{$setting->website_address}}">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="admin_email">Admin Email [For all Mails]:</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="admin_email" type="text" name="admin_email" value="{{$setting->admin_primary_email}}"placeholder="Admin Email" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="currency_symbol">Currency Symbol<label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="currency_symbol" type="text"value="{{$setting->currency_symbol}}" name="currency_symbol" placeholder="Currency Symbol" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="name">Name</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                          
                              <input class="form-control" id="name" type="text" value="{{$admin->admin_name}}" name="name" placeholder="Name" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="user_name">User name</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                          
                              <input class="form-control" id="user_name" type="text"value="{{$admin->admin_email}}" name="user_name" placeholder="User name" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="new_password">New Password</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                         
                              <input class="form-control" id="ronew_passwordle" value="{{$admin->admin_password}}" type="password" name="new_password" placeholder="New Password" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="recovery_email">Recovery Email [For Password reset]:le</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="recovery_email" value="{{$admin->admin_recovery_email}}"type="email" name="recovery_email" placeholder="Recovery Email" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="fav_icon">Fav Icon</label>                 
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="fav_icon" type="file" name="fav_icon" placeholder="Fav Icon" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="seo_title">SEO Title</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="seo_title" value="{{$setting->admin_seo_title}}"type="text" name="seo_title" placeholder="SEO Title" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="seo_description">SEO Description</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="seo_description"  value="{{$setting->admin_seo_description}}"type="text" name="seo_description" placeholder="SEO Description" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="seo_keywords">SEO Keywords</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="seo_keywords"  value="{{$setting->admin_seo_keywords}}"type="text" name="seo_keywords" placeholder="SEO Keywords" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="home_page_banner">Home Page Banner</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">          
                              <input class="form-control" id="home_page_banner" type="file" name="home_page_banne" placeholder="" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label>Login using Google</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12"name="admin_google_login">
                                  <option value=1 {{($setting->admin_google_login==1)?"selected":''}}>Active</option>
                                  <option value=0 {{($setting->admin_google_login==0)?"selected":''}}>Inactive</option>

                                </select>
                              </div>
                            </div>

                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label>Login using Facebook</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mb-1">
                              <div class="col-form-label">                          
                                <select class="js-example-placeholder-multiple col-sm-12"name="admin_facebook_login">
                                <option value=1 {{($setting->admin_facebook_login==1)?"selected":''}}>Active</option>
                                  <option value=0 {{($setting->admin_facebook_login==0)?"selected":''}}>Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-1">
                              <label for="client_id">Client ID [Login using Google]</label> <br>
                              <a href=""> To Create New Click Here</a>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                          
                              <input class="form-control" id="client_id" type="text" name="client_id"value="{{$setting->admin_google_client_id}}" placeholder="Client Id" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-1">
                              <label for="app_id">APP ID [Login using Facebook]</label> <br>
                              <a href=""> To Create New Click Here</a>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <input class="form-control" id="app_id" type="text" name="app_id"value="{{$setting->admin_facebook_app_id}}" placeholder="App Id" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-1">
                              <label for="google_geo_map">Google Geo Map API Key</label> <br><a href=""> To Create New Click Here</a>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                        
                              <input class="form-control" id="google_geo_map" type="text" name="google_geo_map"value="{{$setting->admin_geo_map_api}}" placeholder="Geo Map API Key" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="map_view_default_latitude">Map View Default Latitude</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                        
                              <input class="form-control" id="map_view_default_latitude" type="text" name="googlmap_view_default_latitudee_geo_map"value="{{$setting->admin_geo_default_latitude}}" placeholder="Default Latitude" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="map_view_default_longitude">Map View Default Longitude</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                    
                              <input class="form-control" id="map_view_default_longitude" type="text" name="map_view_default_longitude" value="{{$setting->admin_geo_default_longitude}}"placeholder="Default Longitude" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>     
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="map_view_default_zoom_size">Map View Default Zoom Size</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-2">                        
                              <input class="form-control" id="map_view_default_zoom_size" type="text" name="map_view_default_zoom_size"value="{{$setting->admin_geo_default_zoom}}" placeholder="Default Zoom Size" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label>Language</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mb-1">
                              <div class="col-form-label">                     
                                <select class="js-example-placeholder-multiple col-sm-12"name="admin_language">
                                  <option value="1" {{($setting->admin_language==1)?"selected":''}}>English</option>
                                  <option value="2" {{($setting->admin_language==2)?"selected":''}}>Arabic </option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label>Countries</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mb-1">
                              <div class="col-form-label"> 
                                <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="admin_countries">
                                  <option value="Bangladesh"{{($setting->admin_countries=='Bangladesh')?'selected':''}}>Bangladesh</option>
                                  <option value="India"{{($setting->admin_countries=='India')?'selected':''}}>India</option>
                                  <option value="Srilanka"{{($setting->admin_countries=='Srilanka')?'selected':''}}>Srilanka </option>
                                  <option value="Napal"{{($setting->admin_countries=='Napal')?'selected':''}}>Napal</option>
                                  <option value="China"{{($setting->admin_countries=='China')?'selected':''}}>China </option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="profile_picture">Profile Picture</label>
                            </div>

                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="profile_picture" type="file" name="profile_picture" placeholder="" >
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">Job Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1" {{($setting->admin_job_show==1)?'checked':''}} name="admin_job_show" value=1>
                              <label class="form-check-label" for="exampleCheck1">Enable Job related feature</label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="mt-2" style="margin-left: px;">
                             
                            </div>
                          </div>
                        </div>
                        <hr>                        
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">Service Expert Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox" class="form-check-input"{{($setting->admin_expert_show==1)?'checked':''}} name="admin_expert_show" value=1 id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Enable Service Expert related feature</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2" style="margin-left:rem;">
                            
                            </div>
                          </div>             
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">Product Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox"class="form-check-input"  name="admin_product_show" value=1 id="exampleCheck1" {{($setting->admin_product_show==1)?'checked':''}}>
                              <label class="form-check-label" for="exampleCheck1">Enable Product related feature</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              
                            </div>
                          </div>
                        </div>
                        <hr>                        
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">Blog Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox" class="form-check-input" {{($setting->admin_blog_show==1)?'checked':''}} name="admin_blog_show" value=1 id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Enable Blog related feature</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                             
                            </div>
                          </div>                          
                        </div>
                        <hr>                        
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">Event Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox" class="form-check-input" {{($setting->admin_event_show==1)?'checked':''}} name="admin_event_show" value=1 id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Enable Event related feature</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                          
                            </div>
                          </div>                          
                        </div>
                        <hr>                        
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">News Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox" class="form-check-input"{{($setting->admin_news_show==1)?'checked':''}} name="admin_news_show" value=1 id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Enable News related feature</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                             
                            </div>
                          </div>                          
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">Places Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox" class="form-check-input"{{($setting->admin_place_show==1)?'checked':''}} name="admin_place_show" value=1 id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Enable Places related feature</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">

                            </div>
                          </div>                          
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label class="form-label">Discount & Coupon Module</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <input type="checkbox" class="form-check-input"{{($setting->admin_coupon_show==1)?'checked':''}} name="admin_coupon_show" value=1 id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Enable Coupons related feature</label>
                            </div>  
                          </div>
                          <div class="col-sm-4">
                            <div class="mt-2">
                    
                            </div>
                          </div>                          
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-2">
                              <label for="minimum_withdrawal_amount">Minimum Withdrawal Amount</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">                         
                              <input class="form-control" id="minimum_withdrawal_amount" type="text" name="minimum_withdrawal_amount" value="{{$setting->minimum_withdrawal_amount}}"placeholder="Withdrawal amount" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>                          
                        </div>
                        <hr>                  
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Submit Changes</button>
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