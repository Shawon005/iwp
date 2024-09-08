@extends('layout.master')
@section('content')
<div class="page-body">
  <h2 class="p-2"> </h2>
    <div class="container-fluid">        
      <div class="card mt-3">
        <div class="card-body mt-3">
                <div class="card alert-primary p-4" style="height:195px; background: linear-gradient(to right,#A5FECB,#429dde,#7b4ffc);" >
                    <div class="row">
                        <div class="col-3">
                          <img src="{{asset('/storage/file/Admin.png')}}"width="180" height="180" alt="">
                        </div>
                        <div class="col">
                            <div class="mt-5">
                                <h2>Hi Welcome <b>{{Nam('vv_admin','admin_id',session('id'),'admin_name')}}</b></h2>
                               
                                
                               <p><b>Stay up to date reports in your listing, products, events and blog reports here</b></p>
                                <!-- <p style="font-size: 30px;font-weight: bold;">₹100</p>  -->
                            </div>
                        </div>
                    </div>
                  </div>
                <div class="card alert-primary p-4 " style="height:90px; background: linear-gradient(to right,#A5FECB,#F6FF00,#DC9B00);" >
                        <h2><i class="fa-solid fa-wallet"></i>Wallet & Credits</h2>
                </div>
                @php $admin=first('vv_admin','admin_id',session('id')); $footer=footer(); @endphp
                    
                <div class="row">
                    @if($admin->admin_user_options==1)
                    <div class="col-sm">
                    <a href="{{route('user_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center  text-dark mt-2" id="day" >
                            <img src="{{asset('')}}assets/images/logo/ic-1.png"width="30" height="30" alt=""><br>
                          <span >All User</span>
                          <h5 id="total_day">{{CountC('vv_users','user_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_product_options==1)
                    <div class="col-sm">
                    <a href="{{route('product_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center  text-dark mt-2">
                        <img src="{{asset('')}}assets/images/logo/cart.png"width="30" height="30" alt=""><br>
                          <span>All product</span>
                          <h5>{{CountC('vv_products','product_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_blog_options==1)
                    <div class="col-sm">
                    <a href="{{route('blog_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center  text-dark mt-2">
                        <img src="{{asset('')}}assets/images/logo/blog.png"width="30" height="30" alt=""><br>
                          <span>All Blog</span>
                          <h5>{{CountC('vv_blogs','blog_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_event_options==1)
                    <div class="col-sm">
                    <a  href="{{route('event_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center text-dark mt-2">
                        <img src="{{asset('')}}assets/images/logo/calendar.png"width="30" height="30" alt=""><br>
                          <span>All Event</span>
                          <h5 id="point">{{CountC('vv_events','event_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_listing_options==1)
                    <div class="col-sm">
                    <a href="{{route('listing_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center text-dark mt-2">
                        <img src="{{asset('')}}assets/images/logo/shop.png"width="30" height="30" alt=""><br>
                          <span>All Listing</span>
                          <h5 id="point">{{CountC('vv_listings','listing_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    
                </div>
                
                <div class="row">
                    
                    @if($admin->admin_service_expert_options==1)
                    <div class="col-sm">
                    <a href="{{route('expert_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center  text-dark mt-2" id="day" >
                        <img src="{{asset('')}}assets/images/logo/expert.png"width="30" height="30" alt=""><br>
                          <span >Service Expert</span>
                          <h5 id="total_day">{{CountC('vv_experts','expert_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_sub_admin_type==0)
                    <div class="col-sm">
                    <a  href="{{route('coupon_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center text-dark mt-2">
                        <img src="{{asset('')}}assets/images/logo/coupons.png"width="30" height="30" alt=""><br>
                          <span>Coupon & Deals</span>
                          <h5 id="point">{{CountC('vv_coupons','coupon_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_sub_admin_type==0)
                    <div class="col-sm">
                    <a  href="{{route('place_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center text-dark mt-2">
                        <img src="{{asset('')}}assets/images/logo/hot-air-balloon.png"width="30" height="30" alt=""><br>
                          <span>Place & Travel</span>
                          <h5 id="point">{{CountC('vv_places','place_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_jobs_options==1)
                    <div class="col-sm">
                    <a href="{{route('job_table')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center text-dark mt-2">
                        <img src="{{asset('')}}assets/images/logo/employee.png"width="30" height="30" alt=""><br>
                          <span>Job Posts</span>
                          <h5 id="point">{{CountC('vv_jobs','job_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    @if($admin->admin_news_options==1)
                    <div class="col-sm">
                    <a  href="{{route('news_table')}}">
                      <div class="card shadow p-2 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center text-dark mt-3">
                        <img src="{{asset('')}}assets/images/logo/news.png"width="30" height="30" alt=""><br>
                          <span>News & Magazines</span>
                          <h5 id="point">{{CountC('vv_news','news_id')}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    
                  </div>
      
    </div>
              <div class="container-fluid default-dash ">
             <div class="row">
                    <div class="col-sm" >
                    @if($admin->admin_user_options==1)
                    <a href="{{route('user_table_request')}}">
                      <div class="card shadow p-3 mb-5  rounded-5"style="height:200px;background:#a7f2ed;">
                        <div class="  text-dark mt-2" id="day" >
                          <div class="row">
                             <div class="col-sm-8">
                               <h5>NEW USER</h5>
                              <h3>User Request</h3>
                              <span>{{sprintf("%02d",CountCol('vv_users','user_status','Inactive','user_id'))}}</span>
                             </div>
                             <div class="col-sm-4">
                             <img src="{{asset('')}}assets/images/user.png"width="80" height="70" class="rounded-circle" alt=""><br>
                             </div>
                          </div>
                          <br>
                           <p>This count for today how many get quote and enquiry you got it</p>
                        </div>
                      </div></a>
                      @endif
                    </div>
                    @if($admin->admin_service_expert_options==1)
                    <div class="col-sm">
                    <a  href="{{route('lead_expert_table')}}">
                      <div class="card shadow p-3 mb-5 rounded-5" style="background :#e7f7b2;height:200px">
                        <div class=" text-dark mt-2">
                        <div class="row">
                                
                             
                             <div class="col-sm-8">
                               <h5>LEADS</h5>
                              <h3>Leads Enquiry</h3>
                              <span>{{sprintf("%02d",CountC('vv_expert_enquiries','enquiry_id'))}}</span>
                             </div>
                             <div class="col-sm-4">
                             <img src="{{asset('')}}assets/images/mgs.png"width="80" height="70" class="rounded-circle"alt=""><br>
                             </div>
                          </div>
                          <br>
                           <p>This count for last month get quote and enquiry you got it</p>
                        </div>
                      </div></a>
                    </div>
                    @endif
                    <div class="col-sm">
                    @if($admin->admin_ads_options==1)
                    <a  href="{{route('ads_request_table')}}">
                      <div class="card shadow p-3 mb-5rounded-5" style="height:200px;background :#f2cece;">
                        <div class="text-dark mt-2">
                        <div class="row">
                             <div class="col-sm-8">
                               <h5>ENQUIRY</h5>
                              <h3>Ads Request</h3>
                              <span>{{sprintf("%02d",CountC('vv_all_ads_enquiry','all_ads_enquiry_id'))}}</span>
                             </div>
                             <div class="col-sm-4">
                             <img src="{{asset('')}}assets/images/ad1.png"width="80" height="80" alt=""><br>
                             </div>
                          </div>
                          <br>
                           <p>This count for total get quote and enquiry leads you got it till to end.</p>
                        </div>
                      </div></a>
                      @endif
                    </div>

              </div>
          </div>
         
          <!-- Container-fluid Ends-->
          <div class="card p-4">
            <div class="das-com das-chart-pay">
                  <div class="chartin"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <div class="chart-tit">
                          <div class="lhs">
                              <h4><b>Earnings</b> last 30 days </h4>
                          </div>
                          <div class="rhs">
                              <ul>
                                  <li><span>Total earning: <b>${{chart_total('vv_transactions','transaction_amount')}}</b></span></li>
                                  <li><span>Last 30 days earning: <b>${{chart('vv_transactions','transaction_amount','transaction_cdt')}}</b></span></li>
                              </ul>
                          </div>
                      </div>
                      
                      <canvas id="Chart_payments" style="display: block; height: 429px; width: 858px;" width="1287" height="643" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
           </div>
           <div class="row">
                  @if($admin->admin_user_options==1)
                    <div class="col-sm">
                    <a href="{{route('user_table_free')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center  text-dark mt-2" id="day" >
                            <img src="{{asset('')}}assets/images/logo/ic-1.png"width="30" height="30" alt=""><br>
                          <span >Free Users</span>
                          <h5 id="total_day">{{sprintf("%02d",CountCol('vv_users','user_plan',1,'user_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                    <div class="col-sm">
                    <a href="{{route('user_table_standard')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center  text-dark mt-2">
                        <img src="{{asset('')}}assets/images/images.png"width="30" height="30" alt=""><br>
                          <span>Standard User</span>
                          <h5>{{sprintf("%02d",CountCol('vv_users','user_plan',2,'user_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                    <div class="col-sm">
                    <a href="{{route('user_table_premium')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center  text-dark mt-2">
                        <img src="{{asset('')}}assets/images/img3.png"width="30" height="30" alt=""><br>
                          <span>Premium Users</span>
                          <h5>{{sprintf("%02d",CountCol('vv_users','user_plan',3,'user_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                    <div class="col-sm">
                    <a  href="{{route('user_table_premium_plus')}}">
                      <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                        <div class="text-center text-dark mt-2">
                        <img src="{{asset('')}}assets/images/img.jpg"width="30" height="30" alt=""><br>
                          <span>Premium Plus Uses</span>
                          <h5 id="point">{{sprintf("%02d",CountCol('vv_users','user_plan',4,'user_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                    @endif
                </div>

              <div class="row">
                <div class="col-sm card p-3 m-3">
                <div class=""><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <div class="chart-tit">
                        <div class="lhs">
                            <h4><b>Registered users</b></h4>
                        </div>
                        <div class="rhs">
                            <ul class="list-inline">
                                <li><span>All users: <b>{{count(table('vv_users'))}}</b></span></li>
                                <li><span>Last 30 days: <b></b></span></li>
                            </ul>
                        </div>
                    </div>
                    <canvas id="Chart_users" width="280" height="220" style="display: block; height: 195px; width: 390px;" class="chartjs-render-monitor"></canvas>
                </div>
                </div>
                <div class="col-sm card p-3 m-3">
                <div class=""><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <div class="chart-tit">
                        <div class="lhs">
                            <h4><b>Leads &amp; enquiry</b></h4>
                        </div>
                        <div class="rhs">
                            <ul>
                                <li><span>All leads: <b>{{count(table('vv_expert_enquiries'))}}</b></span></li>
                                <li><span>Last 30 days: <b>00</b></span></li>
                            </ul>
                        </div>
                    </div>
                    <canvas id="Chart_leads" width="280" height="220" style="display: block; height: 195px; width: 390px;" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
            </div>
           
            <div class="row p-3">
                  @if($admin->admin_listing_options==1)
                    <div class="col-sm">
                    <a href="{{route('listing_category_table')}}">
                      <div class="card shadow p-2 mb-2 " style="height:70px;background :#adb8b6">
                        <div class="text-right  text-dark mt-1" id="day" >
                            <img src="{{asset('')}}assets/images/logo/ic-1.png"width="30" height="30" alt="">
                          <span >Category</span>
                          <h5 style="margin-left:40px">{{sprintf("%02d",CountC('vv_categories','category_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                    <div class="col-sm">
                    <a href="{{route('listing_sub_category_table')}}">
                      <div class="card shadow p-2 mb-2" style="height:70px;background :#adb8b6">
                        <div class="text-center  text-dark mt-2">
                        <img src="{{asset('')}}assets/images/images.png"width="30" height="30" alt="">
                          <span>Sub Category</span>
                          <h5 class="ms-2">{{sprintf("%02d",CountC('vv_sub_categories','sub_category_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                    <div class="col-sm">
                    <a href="{{route('listing_city_table')}}">
                      <div class="card shadow p-2 mb-2  " style="height:70px;background :#adb8b6">
                        <div class="text-center  text-dark mt-2">
                        <img src="{{asset('')}}assets/images/img3.png"width="30" height="30" alt="">
                          <span>City</span>
                          <h5 class="ms-5">{{sprintf("%02d",CountC('vv_cities','city_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                    <div class="col-sm">
                    <a  href="{{route('notification_table')}}">
                      <div class="card shadow p-2 mb-2" style="height:70px;background :#adb8b6">
                        <div class="text-center text-dark mt-2">
                        <img src="{{asset('')}}assets/images/img.jpg"width="30" height="30" alt="">
                          <span>Notifications Send</span>
                          <h5 id="point">{{sprintf("%02d",CountC('vv_notifications','notification_id'))}}</h5>
                        </div>
                      </div></a>
                    </div>
                </div>
                @endif
              </div>
  </div>
  
          <!-- Container-fluid starts-->

</div>
<?php $x=implode(",", array_reverse(last_mouth_t())); ?>
<?php $d=implode(",", array_reverse(last_mouth('vv_users','user_cdt'))); $v=implode(",", array_reverse(last_mouth('vv_expert_enquiries','enquiry_cdt')));?>
      
@endsection        
        <!-- footer start-->
 @section('js')

    <script src="{{asset('')}}assets/js/chart/knob/knob.min.js"></script>
    <script src="{{asset('')}}assets/js/chart/knob/knob-chart.js"></script>
    <script src="{{asset('')}}assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="{{asset('')}}assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="{{asset('')}}assets/js/dashboard/default.js"></script>
    <script src="{{asset('')}}assets/js/notify/index.js"></script>
    <script src="{{asset('')}}assets/js/photoswipe/photoswipe.min.js"></script>
    <script src="{{asset('')}}assets/js/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="{{asset('')}}assets/js/photoswipe/photoswipe.js"></script>
    <script src="{{asset('')}}assets/js/typeahead/handlebars.js"></script>
    <script src="{{asset('')}}assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="{{asset('')}}assets/js/typeahead/typeahead.custom.js"></script>
    <script src="{{asset('')}}assets/js/typeahead-search/handlebars.js"></script>
    <script src="{{asset('')}}assets/js/typeahead-search/typeahead-custom.js"></script>
    <script src="{{asset('')}}assets/js/height-equal.js"></script>
    <script src="{{asset('')}}js/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>




    <script>
    //CHART PAYMENT

    //Function to get transaction table to get chart X values and point values starts

    
    //Function to get transaction table to get chart X values and point values ends

    var xValues = [<?= date_last()?>];
    var yValues = [<?= $x ?>];

    new Chart("Chart_payments", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#02b842",
                borderColor: "#65fc9a",
                data: yValues
            }]
        },
        options: {
            responsive: true,
            legend: {display: false},
            scales: {
                yAxes: [{ticks: {min: 0, max: 10000}}]
            }
        }
    });

    //CHART users

    //Function to get user table to get chart X values and point values starts

    
    //Function to get user table to get chart X values and point values ends

    var xValues = [<?= date_last()?>];
    var yValues = [<?= $d ?>];
    

    new Chart("Chart_users", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#fe386f",
                borderColor: "#ffc6d6",
                data: yValues
            }]
        },
        options: {
            responsive: true,
            legend: {display: false},
            scales: {
                yAxes: [{ticks: {min: 0, max: 25}}]
            }
        }
    });

    //CHART LEADS

    //Function to get enquiry table to get chart X values and point values starts

    
    //Function to get enquiry table to get chart X values and point values ends

    var xValues =[<?= date_last()?>];
    var yValues = [<?= $v ?>];

    new Chart("Chart_leads", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#f1bb51",
                borderColor: "#fae9c8",
                data: yValues
            }]
        },
        options: {
            responsive: true,
            legend: {display: false},
            scales: {
                yAxes: [{ticks: {min: 0, max: 100}}]
            }
        }
    });
</script>
 @endsection      