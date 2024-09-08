@extends('main.master')
@section('content')
    <!-- END -->
    <style>
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
                       <li><a href="{{route('all-news')}}" class="">Home</a></li>
                       @foreach($category as $cat)
                        <li><a href="{{route('news-all',['id'=>$cat->category_id])}}" class="">{{$cat->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class="news-hom-big news-details">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="all-list-bre news-bre">
                        <ul>
                            <li><a href="{{route('all-news')}}">News Home</a></li>
                            <li>
                                <a href="#">{{name('vv_news_categories',$news->category_id)}}</a>
                            </li>
                            <li><a href="#!">{{$news->news_title}}</a></li>
                        </ul>
                    </div>
                    <!--BIG POST START-->
                    <div class="news-home-box">
                        <div class="txt">
                            <!-- SHARE -->
                            <span class="share-new-top" data-toggle="modal" data-target="#sharepop"><i
                                    class="material-icons">share</i></span>
                            
                            <span class="fb-new-top" style="position: absolute;right: 52px;top: 10px;cursor: pointer;" >
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://iwpdirectory.in/news-detail/new-photography-genres-to-try-your-hands-on?src=facebook&amp;quote=New%20Photography%20Genres%20to%20Try%20your%20Hands%20on"><img src="{{asset('')}}frontend/images/icon/fb.svg" width="45px"></a>       
                            </span>
                            <span class="fb-new-top" style="position: absolute;right: 95px;top: 8px;cursor: pointer;" >
                                <a target="_blank"
                                   href="whatsapp://send?text=http%3A%2F%2Fiwpdirectory.in%2Fnews-detail%2Fnew-photography-genres-to-try-your-hands-on%3Fsrc%3Dwhatsapp"><img src="{{asset('')}}frontend/images/icon/whatsapp.svg"></a>
                                        
                            </span>
                            <!-- SHARE -->
                            <div class="news-tit-head">
                                <span class="news-cate">{{name('vv_news_categories',$news->category_id)}}</span>
                                <h1>{{$news->news_title}}</h1>
                                <span class="news-date">{{dateFormatConverter($news->news_cdt)}}</span>
                                <span
                                    class="news-views">{{CountCol('vv_page_views','news_id',$news->news_id,'news_id')}} Views</span>
                                <div class="im">
                                    <img src="{{asset('/storage/file/'.$news->news_image)}}"
                                         alt="">
                                </div>
                            </div>
                            <p>@php echo ($news->news_description) @endphp</p>
                            <!-- SHARE -->
                            <span class="share-new" data-toggle="modal" data-target="#sharepop"><i class="material-icons">share</i> Share now</span>
                            <!-- SHARE -->
                        </div>
                    </div>
                    <!--END BIG POST START-->
                    <div class="news-com-tit">
                        <h2>Related Posts</h2>
                    </div>
                    <!--BIG POST START-->
                    @php $newss=sub('vv_news','category_id',$news->category_id); @endphp
                    @foreach($newss->slice(0,4) as $newsr)
                    @if($news->news_id != $newsr->news_id)
                    <div class="news-home-box news-home-box1">
                        <div class="im">
                            <img
                                src="{{asset('/storage/file/'.$newsr->news_image)}}"
                                alt="">
                        </div>
                        <div class="txt">
                            <span class="news-cate">{{$newsr->news_title}}</span>
                            <h2>{{mb_strimwidth($newsr->news_description, 0, 80, "...");}}</h2>
                            <span class="news-date">{{dateFormatConverter($newsr->news_cdt)}}</span>
                            <span class="news-views">{{CountCol('vv_page_views','news_id',$newsr->news_id,'news_id')}}</span>
                        </div>
                        <a href="{{route('news-details',['id'=>$newsr->news_id])}}" class="fclick"></a>
                    </div>
                    @endif
                    @endforeach
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
                                <li><a href="{{route('news-all',['id'=>$cat->category_id])}}" class=""><span>2</span><b>{{$cat->category_name}}</b></a></li>
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
                                <h5>Subscribe                                <b>Newsletter</b></h5>
                                <p>It is a long established fact that a reader will be distracted.</p>
                            </div>
                            <div id="news_newsletter_success" class="log" style="display: none;">
                                <p>Your Newsletter Subscription Is Submitted Successfully!!!</p>
                            </div>
                            <div id="news_newsletter_fail" class="log" style="display: none;">
                                <p>Oops!! Something Went Wrong Try Later!!!</p>
                            </div>
                            <form name="news_newsletter_subscribe_form" id="news_newsletter_subscribe_form">
                                @csrf
                                <ul>
                                    <li><input type="text" name="news_newsletter_subscribe_name"
                                               placeholder="Enter Email Id*"
                                               class="form-control" required>
                                    </li>
                                    <li><input type="submit" id="news_newsletter_subscribe_submit"
                                               name="news_newsletter_subscribe_submit" class="form-control"></li>
                                </ul>
                            </form>
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
                    @foreach($newses as $news)
                    <div class="col-md-4">
                        <div class="news-home-box">
                            <div class="im">
                                <img
                                    src="{{asset('/storage/file/'.$news->news_image)}}"
                                    alt="">
                            </div>
                            <div class="txt">
                                <span class="news-cate">{{name('vv_news_categories',$news->category_id)}}</span>
                                <h2>{{$news->news_title}}</h2>
                                <span class="news-date">>{{dateFormatConverter($news->news_cdt)}}</span>
                                <span class="news-views">{{CountCol('vv_page_views','news_id',$news->news_id)}} Views</span>
                            </div>
                            <a href="{{route('news-details',['id'=>$news->news_id])}}" class="fclick"></a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- SHARE POPUP -->
    <div class="modal fade sharepop" id="sharepop">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Share now</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" value="" id="shareurl">
                    <div class="shareurltip">
                        <button onclick="shareurl()" onmouseout="shareurlout()">
                            <span class="shareurltxt" id="myTooltip">Copy to clipboard</span>
                            Copy text                    </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- START -->


    <!-- END -->

    <!-- START -->
  
    <!-- END -->
@endsection
@section('js')
    <script>
        var _cururl = window.location.href;
        $("#shareurl").val(_cururl);
        function shareurl() {
            var copyText = document.getElementById("shareurl");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);

            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copied";
        }

        function shareurlout() {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copy to clipboard";
        }
    </script>
@endsection