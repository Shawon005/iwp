@extends('layout.master')
@section('content')  
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Notification</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Notification</li>
                    <li class="breadcrumb-item active">Add New Notification</li>
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
                    <h5>Add New Notification</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('plan_update',['id'=>$plan->plan_type_id])}}" method="post">
                      @csrf
                            <input type="hidden" class="validate" id="plan_type_id" name="plan_type_id" value="1" required="required">
                            <tbody>
                            <tr>
                                <td>Plan name</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="plan_type_name" name="plan_type_name" value="{{$plan->plan_type_name}}" required="required" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="plan_type_price" name="plan_type_price" value="{{$plan->plan_type_price}}" onkeypress="return isNumber(event)" required="required">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_duration" name="plan_type_duration" required="required" class="form-control">
                                            <option {{($plan->plan_type_duration==1)?'selected':''}} value="1">1 month</option>
                                            <option value="2"{{($plan->plan_type_duration==2)?'selected':''}} >2 months</option>
                                            <option value="3"{{($plan->plan_type_duration==3)?'selected':''}} >3 months</option>
                                            <option value="6"{{($plan->plan_type_duration==6)?'selected':''}} >6 months</option>
                                            <option value="12"{{($plan->plan_type_duration==12)?'selected':''}}>1 year</option>
                                            <option value="24"{{($plan->plan_type_duration==24)?'selected':''}}>2 years</option>
                                            <option value="36"{{($plan->plan_type_duration==36)?'selected':''}}>3 years</option>
                                            <option value="48"{{($plan->plan_type_duration==48)?'selected':''}}>4 years</option>
                                            <option value="60"{{($plan->plan_type_duration==60)?'selected':''}}>5 years</option>
                                            <option value="72"{{($plan->plan_type_duration==72)?'selected':''}}>6 years</option>
                                            <option value="84"{{($plan->plan_type_duration==84)?'selected':''}}>7 years</option>
                                            <option value="96"{{($plan->plan_type_duration==96)?'selected':''}}>8 years</option>
                                            <option value="108"{{($plan->plan_type_duration==108)?'selected':''}}>9 years</option>
                                            <option value="120"{{($plan->plan_type_duration==120)?'selected':''}}>10 years</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>No of listings</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_listing_count" name="plan_type_listing_count" required="required" class="form-control">
                                            <option value="1" {{($plan->plan_type_listing_count==1)?'selected':''}} > 1</option>
                                            <option value="5" {($plan->plan_type_listing_count==5)?'selected':''}} > 5 </option>
                                            <option value="10" {{($plan->plan_type_listing_count==10)?'selected':''}} > 10</option>
                                            <option value="15" {{($plan->plan_type_listing_count==15)?'selected':''}}> 15</option>
                                            <option value="20"{{($plan->plan_type_listing_count==20)?'selected':''}}>20</option>
                                            <option value="25"{{($plan->plan_type_listing_count==25)?'selected':''}}>25</option>
                                            <option value="30"{{($plan->plan_type_listing_count==30)?'selected':''}}>30</option>
                                            <option value="50"{{($plan->plan_type_listing_count==50)?'selected':''}}>50</option>
                                            <option value="70"{{($plan->plan_type_listing_count==70)?'selected':''}}>70</option>
                                            <option value="100"{{($plan->plan_type_listing_count==100)?'selected':''}}>100</option>
                                            <option value="200"{{($plan->plan_type_listing_count==200)?'selected':''}}>200</option>
                                            <option value="1000"{{($plan->plan_type_listing_count==1000)?'selected':''}}>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>No of products</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_product_count" name="plan_type_product_count" required="required" class="form-control">
                                            <option  {{($plan->plan_type_product_count==1)?'selected':''}} value="1">1</option>
                                            <option value="5"{{($plan->plan_type_product_count==5)?'selected':''}}>5</option>
                                            <option value="10"{{($plan->plan_type_product_count==10)?'selected':''}}>10</option>
                                            <option value="15"{{($plan->plan_type_product_count==15)?'selected':''}}>15</option>
                                            <option value="20"{{($plan->plan_type_product_count==20)?'selected':''}}>20</option>
                                            <option value="25"{{($plan->plan_type_product_count==25)?'selected':''}}>25</option>
                                            <option value="30"{{($plan->plan_type_product_count==30)?'selected':''}}>30</option>
                                            <option value="50"{{($plan->plan_type_product_count==50)?'selected':''}}>50</option>
                                            <option value="70"{{($plan->plan_type_product_count==70)?'selected':''}}>70</option>
                                            <option value="100"{{($plan->plan_type_product_count==100)?'selected':''}}>100</option>
                                            <option value="200"{{($plan->plan_type_product_count==200)?'selected':''}}>200</option>
                                            <option value="1000"{{($plan->plan_type_product_count==1000)?'selected':''}}>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>No of events</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_event_count" name="plan_type_event_count" required="required" class="form-control">
                                        <option value="1"{{($plan->plan_type_event_count==1)?'selected':''}}>1</option>
                                            <option value="5"{{($plan->plan_type_event_count==5)?'selected':''}}>5</option>
                                            <option value="10"{{($plan->plan_type_event_count==10)?'selected':''}}>10</option>
                                            <option value="15"{{($plan->plan_type_event_count==15)?'selected':''}}>15</option>
                                            <option value="20"{{($plan->plan_type_event_count==20)?'selected':''}}>20</option>
                                            <option value="25"{{($plan->plan_type_event_count==25)?'selected':''}}>25</option>
                                            <option value="30"{{($plan->plan_type_event_count==30)?'selected':''}}>30</option>
                                            <option value="50"{{($plan->plan_type_event_count==50)?'selected':''}}>50</option>
                                            <option value="70"{{($plan->plan_type_event_count==70)?'selected':''}}>70</option>
                                            <option value="100"{{($plan->plan_type_event_count==100)?'selected':''}}>100</option>
                                            <option value="200"{{($plan->plan_type_event_count==200)?'selected':''}}>200</option>
                                            <option value="1000"{{($plan->plan_type_event_count==1000)?'selected':''}}>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>No of blogs</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_blog_count" name="plan_type_blog_count" required="required" class="form-control">
                                        <option value="1"{{($plan->plan_type_blog_count==1)?'selected':''}}>1</option>
                                            <option value="5"{{($plan->plan_type_blog_count==5)?'selected':''}}>5</option>
                                            <option value="10"{{($plan->plan_type_blog_count==10)?'selected':''}}>10</option>
                                            <option value="10"{{($plan->plan_type_blog_count==10)?'selected':''}}>10</option>
                                            <option value="15"{{($plan->plan_type_blog_count==15)?'selected':''}}>15</option>
                                            <option value="20"{{($plan->plan_type_blog_count==20)?'selected':''}}>20</option>
                                            <option value="25"{{($plan->plan_type_blog_count==25)?'selected':''}}>25</option>
                                            <option value="30"{{($plan->plan_type_blog_count==30)?'selected':''}}>30</option>
                                            <option value="50"{{($plan->plan_type_blog_count==50)?'selected':''}}>50</option>
                                            <option value="70"{{($plan->plan_type_blog_count==70)?'selected':''}}>70</option>
                                            <option value="100"{{($plan->plan_type_blog_count==100)?'selected':''}}>100</option>
                                            <option value="200"{{($plan->plan_type_blog_count==200)?'selected':''}}>200</option>
                                            <option value="1000"{{($plan->plan_type_blog_count==1000)?'selected':''}}>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>No of jobs</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_job_count" name="plan_type_job_count" required="required" class="form-control">
                                        <option value="1"{{($plan->plan_type_job_count==1)?'selected':''}}>1</option>
                                            <option value="5"{{($plan->plan_type_job_count==5)?'selected':''}}>5</option>
                                            <option value="10"{{($plan->plan_type_job_count==10)?'selected':''}}>10</option>
                                            <option value="15"{{($plan->plan_type_job_count==15)?'selected':''}}>15</option>
                                            <option value="20"{{($plan->plan_type_job_count==20)?'selected':''}}>20</option>
                                            <option value="25"{{($plan->plan_type_job_count==25)?'selected':''}}>25</option>
                                            <option value="30"{{($plan->plan_type_job_count==30)?'selected':''}}>30</option>
                                            <option value="50"{{($plan->plan_type_job_count==50)?'selected':''}}>50</option>
                                            <option value="70"{{($plan->plan_type_job_count==70)?'selected':''}}>70</option>
                                            <option value="100"{{($plan->plan_type_job_count==100)?'selected':''}}>100</option>
                                            <option value="200"{{($plan->plan_type_job_count==200)?'selected':''}}>200</option>
                                            <option value="1000"{{($plan->plan_type_job_count==1000)?'selected':''}}>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Points</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="plan_type_points" name="plan_type_points" value="{{$plan->plan_type_points}}" onkeypress="return isNumber(event)" required="required">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Get direct leads</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_direct_lead" name="plan_type_direct_lead" class="form-control">
                                            <option value="1"{{($plan->plan_type_direct_lead==1)?"selected":''}}>Yes</option>
                                            <option  value="0"{{($plan->plan_type_direct_lead==0)?"selected":''}}>No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email notification(leads)</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_email_notification" name="plan_type_email_notification" class="form-control">
                                            <option value="1"{{($plan->plan_type_email_notification==1)?"selected":''}}>Yes</option>
                                            <option {{($plan->plan_type_email_notification==0)?"selected":''}} value="0">No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Verified listing</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_verified" name="plan_type_verified" class="form-control">
                                            <option value="1"{{($plan->plan_type_verified==1)?"selected":''}}>Yes</option>
                                            <option value="0"{{($plan->plan_type_verified==0)?"selected":''}}>No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Trusted listing</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_trusted" name="plan_type_trusted" class="form-control">
                                            <option value="1"{{($plan->plan_type_trusted==1)?"selected":''}}>Yes</option>
                                            <option {{($plan->plan_type_trusted==0)?"selected":''}} value="0">No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Special offers</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_offers" name="plan_type_offers" class="form-control">
                                            <option value="1"{{($plan->plan_type_offers==1)?"selected":''}}>Yes</option>
                                            <option {{($plan->plan_type_offers==0)?"selected":''}} value="0">No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Photos</td>
                                <td>
                                    <div class="form-group">
                                        <select type="number" id="plan_type_photos_count" name="plan_type_photos_count" class="form-control">
                                            <option value="1"{{($plan->plan_type_photos_count==1)?"selected":''}}>1</option>
                                            <option value="2"{{($plan->plan_type_photos_count==2)?"selected":''}}>2</option>
                                            <option value="5"{{($plan->plan_type_photos_count==5)?"selected":''}}>5</option>
                                            <option value="10"{{($plan->plan_type_photos_count==10)?"selected":''}}>10</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Videos</td>
                                <td>
                                    <div class="form-group">
                                        <select type="number" id="plan_type_videos_count" name="plan_type_videos_count" class="form-control">
                                        <option value="1"{{($plan->plan_type_videos_count==1)?"selected":''}}>1</option>
                                            <option value="2"{{($plan->plan_type_videos_count==2)?"selected":''}}>2</option>
                                            <option value="5"{{($plan->plan_type_videos_count==5)?"selected":''}}>5</option>
                                            <option value="10"{{($plan->plan_type_videos_count==10)?"selected":''}}>10</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Review control</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_ratings" name="plan_type_ratings" class="form-control">
                                            <option value="1"{{($plan->plan_type_ratings==1)?"selected":''}}>Yes</option>
                                            <option {{($plan->plan_type_ratings==0)?"selected":''}} value="0">No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Social media share</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_social" name="plan_type_social" class="form-control">
                                            <option value="1"{{($plan->plan_type_social==1)?"selected":''}} >Yes</option>
                                            <option value="0" {{($plan->plan_type_social==0)?"selected":''}}>No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <div class="form-group">
                                        <select id="plan_type_status" name="plan_type_status" class="form-control">
                                            <option  value="Active"{{($plan->plan_type_status=='Active')?"selected":''}} >Active</option>
                                            <option value="inActive"{{($plan->plan_type_status=='inActive')?"selected":''}}>InActive</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
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