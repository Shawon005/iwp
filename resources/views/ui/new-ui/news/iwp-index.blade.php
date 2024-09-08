@extends('main.master')
@section('content')
    <!-- END -->

    <!-- custom css -->
        <style>
            .hom-head .container {
                display: none
            }

            .hom-top {
                transition: all .5s ease;
                background: #000;
                box-shadow: none
            }

            .hom-head {
                background: none !important;
                padding: 0;
                margin: 0
            }

            .hom-head .hom-top .container {
                display: block
            }

            .hom-top {
                background: #292c2e;
            }
        </style>
    <!-- START -->
    <section class="news-top-menu">
        <div class="container">
            <div class="row">
                <div class="news-menu">
                    <ul>
                        
                        <li><a href="" class="act">Home</a></li>
                                   @foreach($category as $cat)
                        <li><a href="{{route('news-all',['id'=>$cat->category_id])}}"
                                   class="">{{$cat->category_name}}</a></li>
                                   @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class="news-hom-ban">
        <div class="news-hom-ban-inn">
            <h1><b>Fototech</b> News & Magazines</h1>
            <p>All Photography News & updates in one place.</p>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class="news-hom-top">
        <div class="news-hom-top-inn">
            <div class="container">
                <div class="row">
                         @php $ads=Ads(7); @endphp    
                          @foreach($ads as $ad)
                        <div class="news-hom-ban-ads">
                                <a href="{{$ad->ad_link}}">
                                <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                                </a>
                        </div>
                    @endforeach
                    <div class="news-com-tit">
                        <h2>Trendings In Photo Industry</h2>
                    </div>
                    <div class="col-md-3">
                        @foreach($trending->slice(0, 2) as $trend)
                        <div class="news-home-box ">
                            <div class="im">
                                <img src="{{asset('/storage/file/'.Nam('vv_news','news_id',$trend->news_id,'news_image'))}}"
                                     alt="">
                            </div>
                            <div class="txt">
                                <span class="news-cate">{{name('vv_news_categories',Nam('vv_news','news_id',$trend->news_id,'category_id'))}}</span>
                                <h2>{{Nam('vv_news','news_id',$trend->news_id,'news_title')}}</h2>
                            <span
                                class="news-date">{{dateFormatConverter(Nam('vv_news','news_id',$trend->news_id,'news_cdt'))}}</span>
                            </div>
                            <a href="{{route('news-details',['id'=>$trend->news_id])}}" class="fclick"></a>
                        </div>
                        @endforeach                                     
                    </div>
                    <div class="col-md-6">        
                      @foreach($trending->slice(2,1) as $trend)
                        <div class="news-home-box news-home-box-big">
                           <div class="im">
                                <img src="{{asset('/storage/file/'.Nam('vv_news','news_id',$trend->news_id,'news_image'))}}"
                                     alt="">
                            </div>
                            <div class="txt">
                                <span class="news-cate">{{name('vv_news_categories',Nam('vv_news','news_id',$trend->news_id,'category_id'))}}</span>
                                <h2>{{Nam('vv_news','news_id',$trend->news_id,'news_title')}}</h2>
                            <span
                                class="news-date">{{dateFormatConverter(Nam('vv_news','news_id',$trend->news_id,'news_cdt'))}}</span>
                            </div>
                            <a href="{{route('news-details',['id'=>$trend->news_id])}}" class="fclick"></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3">    
                    @foreach($trending->slice(3,2) as $trend)
                    <div class="news-home-box ">
                            <div class="im">
                                <img src="{{asset('/storage/file/'.Nam('vv_news','news_id',$trend->news_id,'news_image'))}}"
                                     alt="">
                            </div>
                            <div class="txt">
                                <span class="news-cate">{{name('vv_news_categories',Nam('vv_news','news_id',$trend->news_id,'category_id'))}}</span>
                                <h2>{{Nam('vv_news','news_id',$trend->news_id,'news_title')}}</h2>
                            <span
                                class="news-date">{{dateFormatConverter(Nam('vv_news','news_id',$trend->news_id,'news_cdt'))}}</span>
                            </div>
                            <a href="{{route('news-details',['id'=>$trend->news_id])}}" class="fclick"></a>
                        </div>
                        @endforeach                                
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class="news-hom-ban-sli">
        <div class="news-hom-ban-sli-inn">
            <ul class="multiple-items1">
                @foreach($sliders as $slider)
            <li>
                    <div class="news-hban-box">
                        <div class="im">
                            <img
                                src="{{asset('/storage/file/'.Nam('vv_news','news_id',$slider->news_id,'news_image'))}}"
                                alt="">
                        </div>
                        <div class="txt">
                            <span class="news-cate">{{name('vv_news_categories',Nam('vv_news','news_id',$slider->news_id,'category_id'))}}</span>
                            <h2>{{Nam('vv_news','news_id',$slider->news_id,'news_title')}}</h2>
                            <span
                                class="news-date">{{dateFormatConverter(Nam('vv_news','news_id',$slider->news_id,'news_cdt'))}}</span>
                        </div>
                        <a href="{{route('news-details',['id'=>$slider->news_id])}}"
                           class="fclick"></a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class="news-hom-big">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="news-com-tit">
                        <h2>Latest & Popular</h2>
                    </div>
                    <!--BIG POST START-->
                    @php $no=1;@endphp
                    @foreach($populars as $popular)
                    <div class="news-home-box {{($no<3)?'':'news-home-box1'}}">
                        <div class="im">
                            <img src="{{asset('/storage/file/'.$popular->news_image)}}"
                                 alt="">
                        </div>
                        <div class="txt">
                            <span class="news-cate">{{name('vv_news_categories',$popular->category_id)}}</span>
                            <h2>{{$popular->news_title}}</h2>
                            <p></p>
                            <span class="news-date">{{dateFormatConverter($popular->news_cdt)}}</span>
                            <span class="news-views {{$no++}}">{{$popular->total_count}} Views</span>
                        </div>
                        <a href="{{route('news-details',['id'=>$popular->news_id])}}" class="fclick"></a>
                    </div>
                    
                    @endforeach
                    <!--END BIG POST START-->
                    <!--BIG POST START-->
                    
                    <!--END BIG POST START-->
                </div>
                <div class="col-md-4">
                    <div class="news-com-rhs">
                        <!-- SOCIAL MEDIA START-->
                        <div class="news-soci">
                            <h4>Social media</h4>
                            <ul>
                                @foreach($social as $site)
                                <li><a target="_blank" href="{{$site->social_media_link}}" class="sm-fb-big"><b>{{$site->social_media_count}}</b>{{$site->social_media_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- SOCIAL MEDIA END-->
                        <!-- ADS START-->
                        <div class="news-rhs-cate">
                            <h4>Category wise</h4>
                            <ul>
                                @foreach($category as $cat)
                                <li><a href="{{route('news-all',['id'=>$cat->category_id])}}"><span>{{CountCol('vv_news','category_id',$cat->category_id)}}</span><b>{{$cat->category_name}}</b></a></li>
                                 @endforeach
                            </ul>
                        </div>
                        <!-- ADS END-->
                        <!--TOP POSTS-->
                        <div class="hot-page2-hom-pre news-rhs-trends">
                            <h4>Trending Posts</h4>
                            <ul>
                                @foreach($trending as $trend)
                                <li>
                                    <div class="hot-page2-hom-pre-1">
                                        <img src="{{asset('/storage/file/'.Nam('vv_news','news_id',$trend->news_id,'news_image'))}}"
                                             alt="">
                                    </div>
                                    <div class="hot-page2-hom-pre-2">
                                        <h5>{{Nam('vv_news','news_id',$trend->news_id,'news_title')}}</h5>
                                        <span class="news-date">{{dateFormatConverter(Nam('vv_news','news_id',$trend->news_id,'news_cdt'))}}</span>
                                    </div>
                                    <a href="{{route('news-details',['id'=>$trend->news_id])}}" class="fclick"></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--TOP POSTS-->
                        <!-- ADS START-->
                        @php $ads=Ads(8); @endphp    
                         @foreach($ads as $ad)
                        <div class="news-rhs-ads-ban">
                            <div class="ban-ati-com">
                               <a href="{{$ad->ad_link}}"><span>Ad</span>
                               <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                               </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- ADS END-->
                        <!-- ADS START-->
                        @php $ads=Ads(9); @endphp 
                        @foreach($ads as $ad)
                        <div class="news-rhs-ads-ban">
                            <div class="ban-ati-com">
                               <a href="{{$ad->ad_link}}"><span>Ad</span>
                               <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                               </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- ADS END-->
                        <!-- SUBSCRIBE START-->
                        <div class="news-subsc">
                            <div class="ud-rhs-poin1">
                                <div class="log-bor">&nbsp;</div>
                                <img src="{{asset('')}}frontend/../cdn-icons-png.flaticon.com/512/6349/6349282.png"
                                     alt="">
                                <h5>Subscribe <b>Newsletter</b></h5>
                                <p>It is a long established fact that a reader will be distracted.</p>
                            </div>
                            <div id="news_newsletter_success" class="log" style="display: none;">
                                <p>Your Newsletter Subscription Is Submitted Successfully!!!</p>
                            </div>
                            <div id="news_newsletter_fail" class="log" style="display: none;">
                                <p>Oops!! Something Went Wrong Try Later!!!</p>
                            </div>
                            <form name="news_newsletter_subscribe_form" action="{{route('subscriber_store')}}" method="post" id="news_newsletter_subscribe_form">
                               @csrf
                                   <ul>
                                    <li><input type="text" name="news_newsletter_subscribe_name" id="s_name" placeholder="Enter Email Id*" class="form-control" >
                                    </li>
                                    <li><input type="submit" id="news_newsletter_subscribe_submit"  name="news_newsletter_subscribe_submit" class="form-control"></li>
                                </ul>
                            </from>    
                        </div>
                        <!-- SUBSCRIBE END-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class="news-hom-all-lat">
        <div class="news-hom-all-lat-inn">
            <div class="container">
                <div class="row">
                    <div class="news-com-tit">
                        <h2>Latest Posts</h2>
                    </div>
                    @foreach($news as $newses)
                    <div class="col-md-4">
                        <div class="news-home-box">
                            <div class="im">
                                <img
                                    src="{{asset('/storage/file/'.$newses->news_image)}}"
                                    alt="">
                            </div>
                            <div class="txt">
                                <span class="news-cate">{{name('vv_news_categories',$newses->category_id)}}</span>
                                <h2>{{$newses->news_title}}</h2>
                                <span class="news-date">>{{dateFormatConverter($newses->news_cdt)}}</span>
                                <span class="news-views">{{CountCol('vv_page_views','news_id',$newses->news_id)}} Views</span>
                            </div>
                            <a href="{{route('news-details',['id'=>$newses->news_id])}}" class="fclick"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- START -->

    <!-- END -->

    <!-- START -->
   
@endsection
@section('js')
<script>
        $('.multiple-items1').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false
                }
            }]

        });
    </script>
    <script>
</script>
@endsection


