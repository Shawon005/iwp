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
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">Page URL Setting</li>
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
                    <h5>Page URL's</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation"action="{{route('setting_page_url')}}"method="POST" novalidate="">
                        @csrf
                      <div class="col-sm-12">
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="all_listing_page">All Listing Page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">                          
                              <input class="form-control" id="all_listing_page" type="text" name="all_listing_page_url" value="{{$setting->all_listing_page_url}}"placeholder="All Listing Page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="all_products_page">All Products Page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">                          
                              <input class="form-control" id="all_products_page" type="text" name="all_products_page_url"value="{{$setting->all_products_page_url}}" placeholder="All Products Page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="all_jobs_page">All Jobs page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">                        
                              <input class="form-control" id="all_jobs_page" type="text" name="all_jobs_page_url" value="{{$setting->all_jobs_page_url}}"placeholder="All Jobs page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="all_service_experts_page">All Service Experts page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="all_service_experts_page" type="text" name="all_experts_page_url"value="{{$setting->all_experts_page_url}}" placeholder="All Service Experts Page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="all_news_page">All News page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="all_news_page" type="text" name="all_news_page_url"value="{{$setting->all_news_page_url}}" placeholder="All News page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="user_profile_page">User Profile page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="user_profile_page" type="text" name="profile_page_url" value="{{$setting->profile_page_url}}"placeholder="User Profile page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="listing_page">Listing page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="listing_page" type="text" name="listing_page_url" value="{{$setting->listing_page_url}}"placeholder="Listing page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="job_page">Job page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="job_page" type="text" name="job_page_url"value="{{$setting->job_page_url}}" placeholder="Job page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="service_expert_page">Service Expert page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="service_expert_page" type="text" name="service_expert_page_url"value="{{$setting->service_expert_page_url}}" placeholder="Service Expert page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="news_page">News page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="news_page" type="text" name="news_page_url"value="{{$setting->news_page_url}}" placeholder="News page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="place_page">Place page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">                          
                              <input class="form-control" id="place_page" type="text" name="place_page_url"value="{{$setting->place_page_url}}" placeholder="Place page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="job_profile_page">Job Profile page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">              
                              <input class="form-control" id="job_profile_page" type="text" name="job_profile_page_url" value="{{$setting->job_profile_page_url}}"placeholder="Job Profile page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="job_profile_creation_page">Job Profile Creation page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="job_profile_creation_page" type="text" name="job_profile_creation_page_url" value="{{$setting->job_profile_creation_page_url}}"placeholder="Job Profile Creation page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="event_page">Event page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="event_page" type="text" name="event_page_url"value="{{$setting->event_page_url}}" placeholder="Event page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="blog_page">Blog page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="blog_page" type="text" name="blog_page_url" value="{{$setting->blog_page_url}}"placeholder="Blog page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="product_page">Product page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="salary" type="text" name="product_page_url" value="{{$setting->product_page_url}}"placeholder="Product page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="company_page">Company page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="company_page" type="text" name="company_page_url" value="{{$setting->company_page_url}}"placeholder="Company page" required="">
                            <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="target_listing_page">Target Listing page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="target_listing_page" type="text" name="target_listing_page_url" value="{{$setting->target_listing_page_url}}"placeholder="Target Listing page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="e_book_page">E-Book page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">  
                              <input class="form-control" id="e_book_page" type="text" name="ebook_page_url" value="{{$setting->ebook_page_url}}"placeholder="E-Book page" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mt-3">
                              <label for="promotional_page">Promotional page</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="mt-1">
                              <input class="form-control" id="promotional_page" type="text" name="promotion_page_url" value="{{$setting->promotion_page_url}}"placeholder="Promotional page" required="">
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
                    <div class="mb-3">
                      <div class="alert alert-info mt-5">
                        <p><b>Notes:</b> Hi, Its important to update the same on .htaccess file manually what you have changed here.
                        </p><p>For example : </p>
                        <p>if All Listing page URl have been changed from '<b>all-listing</b>' to '<b>listing-all</b>'</p>
                        <p></p>
                        <p></p>
                        <p>1. Open .htaccess file</p>
                        <p>2. Find this line -&gt; RewriteRule ^<b>all-listing</b>/([^/]*)$ %{ENV:BASE_PATH}all-listing.php?category=$1 [L]</p>
                        <p>3. Update this as -&gt; RewriteRule ^<b>listing-all</b>/([^/]*)$ %{ENV:BASE_PATH}all-listing.php?category=$1 [L]</p>
                        <p>4. Save and close .htaccess file</p>
                      </div>
                      <div class="valid-feedback">Looks good!</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection     
        <!-- footer start-->
 