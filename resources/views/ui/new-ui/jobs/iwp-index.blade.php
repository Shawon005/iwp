@extends('main.master')
@section('content')
    <!-- END -->

    <!-- custom css -->
        <style>
            .hom-head .container{display:none}
            .hom-top{transition:all .5s ease;background:#000;box-shadow:none}
            .hom-head{background:none!important;padding:0;margin:0}
            .hom-head .hom-top .container{display:block}
            .dmact .top-ser{display:block}
            .hm3-auto-ban{background:url(images/automobile-bg.html) no-repeat;background-size:100%;background-position:center right;padding-top:55px}
            .h2-ban-ql{display:table}
            .hm3-auto-ban .rhs .hom-col-req .log-bor{display:block}
            .caro-home{margin-top:90px;float:left;width:100%}
            .carousel-item:before{background:none}
            .ban-tit h1{font-weight:500;color:#fff;text-shadow:none}
            .ban-tit h1 b{font-weight:700;font-size:42px;line-height:49px;padding-bottom:15px;color:#fff;text-shadow:none}
            .h2-ban-ql ul li div{border:1px solid #d9d9da;background:#fff}
            .h2-ban-ql ul li div h5{font-weight:500;color:#383942}
            .h2-ban-ql ul li div h5 span{font-weight:700}
            .home-tit h2{font-weight:400}
            .home-tit h2 span{font-weight:700}
            .h2-ban-ql ul li div:hover{background:#d3f0fb;box-shadow:0 14px 22px -13px #0b1017ba}
            .land-pack-grid-text{position:relative;-webkit-transition:all .5s ease;-moz-transition:all .5s ease;-o-transition:all .5s ease;transition:all .5s ease;position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;z-index:2;background:linear-gradient(to top,#000000c7,#00000008)}
            .land-pack-grid-text h4{padding:15px;font-size:20px;font-weight:400;text-align:center;bottom:0;position:absolute;width:100%;text-align:center;color:#fff}
            .land-pack-grid-text h4 .dir-ho-cat{color:#f6f7f9;font-size:11px;position:relative;width:100%;display:inline-block}
            .land-pack-grid-img{background:#333}
            .home-tit{padding-top:60px}
            .hom2-hom-ban{float:left;width:46%;background-size:cover;margin:0 2%;background:#e6f6fb;padding:30px 100px 30px 30px;border-radius:5px;position:relative}
            .hom2-hom-ban:hover a{background:#d6c607}
            .hom2-hom-ban h2{font-weight:600;font-size:22px;padding-bottom:5px}
            .hom2-hom-ban p{font-size:14px}
            .hom2-hom-ban a{background:#21d78d;color:#fff;padding:10px 20px;border-radius:5px;display:inline-block;cursor:pointer;font-size:13px;font-weight:400}
            .hom2-hom-ban p,.hom2-hom-ban h2,.hom2-hom-ban a{position:relative;color:#fff}
            .hom2-hom-ban:before{content:'';position:absolute;width:100%;height:100%;left:0;top:0;right:0;bottom:0;z-index:0;opacity:.8;background:#24C6DC;border-radius:5px}
            .hom2-hom-ban1:before{background-image:linear-gradient(140deg,#0c7ada 0%,#0761af 50%,#0f243e94 75%)}
            .hom2-hom-ban2:before{background-image:linear-gradient(140deg,#768404 0%,#768404 50%,#0f243e94 75%)}
            .hom2-hom-ban1{background-image:url(../../../frontend/images/home2-hand.jpg)}
            .hom2-hom-ban2{background-image:url(../../../frontend/images/home2-work.jpg)}
            .hom2-hom-ban-main{float:left;width:100%;padding-bottom:70px}
            .hom2-cus-sli{float:left;width:100%;padding-top:0}
            .hom2-cus-sli ul li{float:left;width:25%;padding:12px 20px}
            .testmo{width:100%;background:#fff;box-shadow:0 1px 7px -3px #161d2926;border-radius:5px;padding:30px;position:relative}
            .testmo img{width:64px;height:64px;border-radius:50px;object-fit:cover;margin:-80px 0 0}
            .testmo h4{font-size:14px;font-weight:600;margin-bottom:2px;}
            .testmo span{font-size:11px;font-weight:400;color:#727688}
            .testmo span a{font-weight:500;color:#4caf50;display:block;font-size:12px}
            .testmo p{color:#727688;font-size:12px;line-height:20px;margin:0;font-weight:400;height:58px;overflow:hidden;border-top:1px solid #f1eeee;padding-top:15px;margin-top:15px}
            .testmo p:before{content:'format_quote';font-size:21px;margin:-25px 0 0;background:#fff}
            .hom2-cus{background:#f7f8f9;padding-bottom:70px}
            .testmo .rat{padding:2px 2px 2px 10px;display:inline-block;position:absolute;right:30px;top:50px}
            .testmo .rat i{color:#FF9800;font-size:13px;width:7px}
            .hom2-cus-sli ul{position:relative;overflow:hidden;padding:20px 20px 0}
            .slick-arrow{width:50px;height:50px;border-radius:50px;background:#fff;border:1px solid #ededed;color:#ffffff03;position:absolute;z-index:9;top:38%}
            .slick-arrow:before{content:'chevron_left';font-size:27px;top:4px;left:9px}
            .slick-prev{left:14px}
            .slick-next{right:14px}
            .slick-next:before{content:'chevron_right';font-size:27px}
            .hom4-prop-box{padding:0;background:#fff;box-shadow:0 1px 14px -4px #161d2926;border:1px solid #efefef}
            .hom4-prop-box img{width:100%;border-radius:2px;margin:0;height:120px}
            .hom4-prop-box div{padding:25px}
            .hom4-prop-box .rat{position:relative;top:initial;right:initial;padding:2px 2px 2px 0;display:block;margin:0;height:17px;left:-2px}
            .hom4-fea{background:#fff;padding-bottom:40px}
            .hom4-fea .hom2-cus-sli ul li{padding:12px 20px}
            .hom4-fea .home-tit{margin-bottom:0;padding-top:70px}
        </style>

    <!-- START -->
    <section>
        <div class="all-jobs-ban">
            <div class="container">
                <div class="row">
                    <div class="jtit">
                        <h1>The Photographer's Path to Dream Job Success</h1>
                        <p>Get Snapping: Explore Thousands of Photography Jobs and Find Your Next Opportunity</p>
                    </div>
                    <br>
                    <div class="job-sear">
                        <form name="job_filter_form" id="job_filter_form" class="job_filter_form">
                            <ul>
                                <li class="sr-sea" style="width: 30%">
                                    <select class="chosen-select" id="job-select-search" name="serjobs">
                                     @foreach($category as $cat)
                                     <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                     @endforeach
                                    </select>
                                </li>
                                <li class="sr-loc" style="width: 30%">
                                    <select class="chosen-select" id="job-select-city" name="serjobsloc">
                                    @foreach($states as $state)
                                     <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                     @endforeach
                                    </select>
                                </li>
                                <li class="sr-loc" style="width: 30%">
                                    <select class="form-control" id="job-select-city1" name="serjobsloc1">
                                    @foreach($citys as $city)
                                     <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                     @endforeach
                                    </select>
                                </li>
                                <li class="sr-btn">
                                    <button id="job_filter_submit"><i class="material-icons">search</i></button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="job-pop-tag">
                        @foreach($category as $cat)
                        <a href="{{route('all-jobs',['id'=>$cat->category_id])}}">{{$cat->category_name}}</a>
                        @endforeach
                    </div>
                    <div class="job-counts">
                        <ul>
                            <li>
                                <span class="count1">{{CountC('vv_jobs','job_id')}}</span>
                                <h4>Job Posted</h4>
                            </li>
                            <li>
                                <span class="count1">02</span>
                                <h4>Companies</h4>
                            </li>
                            <li>
                                <span class="count1">{{Sum()}}</span>
                                <h4>Employees</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="jobs-cate">
            <div class="container">
                <div class="row">
                    <div class="sub-tit">
                        <h2>Popular Categories</h2>
                        <p>Find jobs from various Companies</p>
                    </div>
                    <div class="job-cate-main">
                        <ul>
                            @foreach($category as $cat)
                            <li>
                                <div>
                                    <h4>{{$cat->category_name}}</h4>
                                    <span>{{CountCol('vv_jobs','category_id',$cat->category_id)}} Jobs</span><a
                                        href="{{route('all-jobs',['id'=>$cat->category_id])}}" class="fcli"></a>
                                </div>
                            </li>
                            @endforeach
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="str hom2-cus hom4-fea">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2><span>Trending Jobs</span></h2>
                        <p>"Hot Jobs in Photography: Trending Opportunities for Your Next Career Move"</p>
                    </div>
                    <div class="job-tre">
                        <ul>
                        
                                @foreach($jobs->slice(0,2) as $job)
                            <li>
                                <div class="inn">
                                    <div class="jbtre-img">
                                        <div class="jbtre-img1">
                                            <img  src="{{asset('/storage/file/'.$job->company_logo)}}"
                                                 alt="">
                                        </div>
                                        <div class="jbtre-img2">
                                            <h4>{{$job->job_title}}</h4>
                                            <span>Central Delhi</span>
                                            <div class="jbtre-days">
                                                <span>{{floor(diff($job->job_interview_date,today())/30)}} Months ago</span>
                                                <span>{{CountCol('vv_job_applied','job_id',$job->job_id,'job_id')}} Applicants</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jbtre-con">
                                        <span>{{job($job->job_type)}}</span>
                                        <span>{{name('vv_job_categories',$job->category_id)}}</span>
                                        <span>{{$job->no_of_openings}} Openings</span>
                                    </div>
                                    <div class="jbtre-sale">
                                        <span>Salary</span>
                                        <span class="empsal">{{$job->job_salary}}K</span>
                                    </div>
                                    <div class="jbtre-apl">
                                        <span class="job-box-cta">Apply now</span>
                                        <span>More details</span>
                                    </div>
                                    <a href="{{route('job_details',['id'=>$job->job_id])}}"
                                       class="job-full-cta"></a>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="str">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2><span>Join us Now</span></h2>
                        <p>We connect with targeted customers for greater business conversion</p>
                    </div>
                    <div class="hom2-hom-ban-main">
                       <div class="hom2-hom-ban hom2-hom-ban1">
                            <h2>Are you looking for a job?</h2>
                            <p>Tell us what kind of a job you are looking for and stay updated with latest opportunities.</p>
                            @if(session('user_C')=='true')
                            <!-- <a href="">Register for free</a> -->
                            @else
                            <a href="{{route('ui_login')}}">Register for free</a>
                            @endif
                        </div>
                        <div class="hom2-hom-ban hom2-hom-ban2">
                            <h2>Post a Job & Hire best candidates </h2>
                            <p>Post your job openings and hire more professional candidates</p>
                            @if(session('user_C')=='true')
                            <!-- <a href="{{route('ui_login')}}">Post a Job</a> -->
                            @else
                            <a href="{{route('ui_login')}}">Post a Job</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="str hom2-cus hom4-fea">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <h2><span>Premium Jobs</span></h2>
                        <p>recommend professional photography service providers near by you</p>
                    </div>
                    <div class="job-tre">
                        <ul class="multiple-items1">

                        @foreach($P_jobs->slice(0,9) as $jobs)
                        @php $job=first('vv_jobs','job_id',$jobs->job_name); @endphp
                        @if($job!=null)
                            <li>
                                <div class="inn">
                                    <div class="jbtre-img">
                                        <div class="jbtre-img1">
                                            <img  src="{{asset('/storage/file/'.$job->company_logo)}}"
                                                 alt="">
                                        </div>
                                        <div class="jbtre-img2">
                                            <h4>{{$job->job_title}}</h4>
                                            <span>Central Delhi</span>
                                            <div class="jbtre-days">
                                                <span>{{floor(diff($job->job_interview_date,today())/30)}} Months ago</span>
                                                <span>{{CountCol('vv_job_applied','job_id',$job->job_id,'job_id')}} Applicants</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jbtre-con">
                                        <span>{{job($job->job_type)}}</span>
                                        <span>{{name('vv_job_categories',$job->category_id)}}</span>
                                        <span>{{$job->no_of_openings}} Openings</span>
                                    </div>
                                    <div class="jbtre-sale">
                                        <span>Salary</span>
                                        <span class="empsal">{{$job->job_salary}}K</span>
                                    </div>
                                    <div class="jbtre-apl">
                                        <span class="job-box-cta">Apply now</span>
                                        <span>More details</span>
                                    </div>
                                    <a href="{{route('job_details',['id'=>$job->job_id])}}"
                                       class="job-full-cta"></a>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- START -->
    <section>
        <div class="str count">
            <div class="container">
                <div class="row">

                    <div class="how-wrks">
                        <div class="home-tit">
                            <h2><span>How It Works</span></h2>
                            <p>online is happening industry, join us to reach pan India photo industry for more business leads</p>
                        </div>
                        <div class="how-wrks-inn">
                            <ul>
                                <li>
                                    <div>
                                        <span>1</span>
                                        <img src="{{asset('')}}frontend/images/icon/how1.png" alt="">
                                        <h4>Create an account</h4>
                                        <p>user friendly process to reach online photo industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span>2</span>
                                        <img src="{{asset('')}}frontend/images/icon/how2.png" alt="">
                                        <h4>Add your business</h4>
                                        <p>showcase your services/products to enhance your market share</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span>3</span>
                                        <img src="{{asset('')}}frontend/images/icon/how3.png" alt="">
                                        <h4>Get more leads</h4>
                                        <p>present yourself creative way to get more business leads</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span>4</span>
                                        <img src="{{asset('')}}frontend/images/icon/how4.png" alt="">
                                        <h4>Archive goles</h4>
                                        <p>enhanced achievements assures you to gain more Business</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="mob-app">
                        <div class="lhs">
                            <img src="{{asset('')}}frontend/images/mobile.png" alt="">
                        </div>
                        <div class="rhs">
                            <h2>Looking for the Best Service Provider?                            <span>Get the App!</span></h2>
                            <ul>
                                <li>HOM-APP-TITFind nearby listings</li>
                                <li>Easy service enquiry</li>
                                <li>Listing reviews and ratings</li>
                                <li>Manage your listing, enquiry and reviews</li>
                            </ul>
                            <span>We'll send you a link, to you below provided email id & open it on your smart phone to download the app</span>
                            <form>
                                <ul>
                                    <li>
                                        <input type="email" placeholder="Enter email id" required></li>
                                    <li>
                                        <input type="submit" value="Get App Link"></li>
                                </ul>
                            </form>
                            <a href="#"><img src="{{asset('')}}frontend/images/android.html" alt=""> </a>
                            <a href="#"><img src="{{asset('')}}frontend/images/apple.html" alt=""> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- START -->
    <section>
        <div class="hom-ads">
            <div class="container">
                <div class="row">
                    <div class="filt-com lhs-ads">
                        <div class="ads-box">
                                                    <a href="#">
                                <span>Ad</span>

                                <img src="{{asset('')}}frontend/images/ads/ads2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <div class="ani-quo">
        <div class="ani-q1">
            <h4>What you looking for?</h4>
            <p>We connect you to Freelancer/service experts.</p>
            <span>Get experts</span>
        </div>
        <div class="ani-q2">
            <img src="{{asset('')}}frontend/images/quote.png" alt="">
        </div>
    </div>
    <!-- END -->

    <!-- START -->

    <!-- END -->

    <!-- START -->
   @endsection