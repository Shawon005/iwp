@extends('main.master')
@section('content')
    <!-- END -->
    <!-- START -->
    <section>
        <div class="plac-det-ban">
            <div class="container">
                <div class="row">
                    
                    <div class="all-list-bre plac-det-bred">
                        <ul>
                            <li><a href="{{route('places')}}}">All Pre Wed Locations </a></li>
                            <li>
                                <a href="">{{$place->place_name}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="plac-det-ban-inn">
                        <div class="plac-det-ban-im">
                        @php $picss=arr($place->place_gallery_image); @endphp
                            <img
                                src="{{asset('/storage/file/'.$picss[0])}}"
                                alt="">
                            <span class="share-new-top" data-toggle="modal" data-target="#sharepop"><i
                                    class="material-icons">share</i></span>

                            
                            <span class="share-new-top" style="position: absolute;right: 52px;top: 10px;cursor: pointer;" >
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://iwpdirectory.in/place/picture-city?src=facebook&amp;quote={{$place->place_slug}}"><img src="{{asset('')}}frontend/images/icon/fb.svg" style="width: 40px; height: 40px"></a>       
                            </span>
                            <span class="share-new-top" style="position: absolute;right: 95px;top: 8px;cursor: pointer;" >
                                <a target="_blank"
                                   href="whatsapp://send?text=http%3A%2F%2Fiwpdirectory.in%2Fplace%2Fpicture-city%3Fsrc%3Dwhatsapp"><img src="{{asset('')}}frontend/images/icon/whatsapp.svg" style="width: 40px; height: 40px"></a>
                                        
                            </span>

                            <div class="plac-det-tit">
                                <h1>{{$place->place_name}}</h1>
                                <h4>prewed</h4>
                            </div>
                        </div>
                        <div class="plac-det-ban-sub">
                            <ul>
                                <li><span>Status: {{($place->place_status==1)?"Active":'Inactive'}}</span></li>
                                <li><span>Open time: {{$place->opening_time}}</span></li>
                                <li><span>Close time: {{$place->closing_time}}</span></li>
                                <li><span>Tourism fee: {{$place->place_fee}}</span></li>
                                <li><a href="{{route('user/dasboard')}}" target="_blank">Direction</a></li>
                                <li><a href="#near" class="cta-near">Near by Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-pad-top">
            <div class="container">
                <div class="row">
                    <div class="plac-det-tit-inn">
                        <h2>Photo gallery</h2>
                    </div>
                    <section id="gallery">
                        <div id="image-gallery">
                            @php $pics=arr($place->place_gallery_image); @endphp
                             @foreach($pics as $pic)
                                <div class="plac-gal-imag">
                                    <div class="img-wrapper">
                                        <a href="{{asset('/storage/file/'.$pic)}}"><img
                                                src="{{asset('/storage/file/'.$pic)}}"
                                                class="img-responsive"></a>
                                        <div class="img-overlay"><i class="material-icons">fullscreen</i></div>
                                    </div>
                                </div>
                                @endforeach
                        </div><!-- End container -->
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-pad-top">
            <div class="container">
                <div class="row">
                    <div class="plac-det-tit-inn">
                        <h2>Video gallery</h2>
                    </div>
                    <section id="gallery">
                        <div id="image-gallery">
                            <?php echo html_entity_decode($place->place_gallery_video); ?>
                        </div><!-- End container -->
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-deta-sec-com plac-pad-top">
            <div class="container">
                <div class="row">
                    <div class="plac-det-tit-inn">
                        <h2>Discover Picture City</h2>
                    </div>
                    <div class="plac-hom-all-pla">
                        <ul class="multiple-items1">
                            @if($place->place_discover!=null)
                             @php $pics=arr($place->place_discover); @endphp
                             @foreach($pics as $pic)
                             @php $place2=first('vv_places','place_id',$pic)@endphp
                             @if($place2!=null)
                             @php $picsD=arr($place2->place_gallery_image); @endphp
                             @if($picsD!=null)
                            <li>
                                    <div class="plac-hom-box">
                                        <div class="plac-hom-box-im">
                                            <img
                                                src="{{asset('/storage/file/'.$picsD[0])}}"
                                                alt="">
                                            <h4>{{$place2->place_name}}</h4>
                                        </div>
                                        <div class="plac-hom-box-txt">
                                            <span>{{$place2->place_tags}}</span>
                                            <span>More details</span>
                                        </div>
                                        <a href="{{route('places_details',['id'=>$pic])}}"
                                           class="fclick"></a>
                                    </div>
                            </li>
                            @endif
                            @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->
        <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-deta-sec-com plac-pad-top-30">
            <div class="container">
                <div class="row">
                    <div class="plac-det-tit-inn">
                        <h2>What people ask</h2>
                    </div>
                    <div class="plac-det-faq">
                        <div class="how-to-coll">
                            <ul>
                                @php $qus=arr($place->place_info_question); $ans=arr($place->place_info_answer); $no=0;@endphp
                                  @foreach($qus as $qu)
                                <li>
                                    <h4 class="colact">{{$qu}}</h4>
                                    <div style="display: block;">
                                        <p>{{$ans[$no++]}}</p>
                                    </div>
                                </li>
                                        @endforeach
                                                                    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->
        <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-deta-sec-com plac-pad-top">
            <div class="container">
                <div class="row">
                    <div class="plac-det-tit-inn">
                        <h2>Related places</h2>
                    </div>
                    <div class="plac-hom-all-pla">
                        <ul class="multiple-items1">
                        @if($place->place_discover!=null)
                        @php $pics=arr($place->place_related); @endphp
                             @foreach($pics as $pic)
                             @php $place2=first('vv_places','place_id',$pic)@endphp
                             @php $picsD=arr($place2->place_gallery_image); @endphp
                             @if($picsD!=null)
                            <li>
                                    <div class="plac-hom-box">
                                        <div class="plac-hom-box-im">
                                            <img
                                                src="{{asset('/storage/file/'.$picsD[0])}}"
                                                alt="">
                                            <h4>{{$place2->place_name}}</h4>
                                        </div>
                                        <div class="plac-hom-box-txt">
                                            <span>{{$place2->place_tags}}</span>
                                            <span>More details</span>
                                        </div>
                                        <a href="{{route('places_details',['id'=>$pic])}}"
                                           class="fclick"></a>
                                    </div>
                            </li>
                            @endif
                            @endforeach
                            @endif
                         </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->
    
    <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-deta-sec-com" id="near">
            <div class="container">
                <div class="row">
                    <div class="plac-hom-tit plac-hom-tit-ic-ser">
                        <h2>Top Near by Services</h2>
                        <p>Start planning your next trip with a little help from <b>Fototech India</b></p>
                    </div>
                    <div class="plac-hom-all-pla">
                        <ul class="multiple-items1">
                        @if($place->place_listings!=null)
                        @php $events=arr($place->place_listings) @endphp
                            @foreach($events as $event)
                            @php $event=first('vv_listings','listing_id',$event); @endphp
                            @if($event!=null)
                           <li>
                                    <div class="plac-hom-box">
                                        <div class="plac-hom-box-im">
                                            <img
                                                src="{{asset('/storage/file/'.$event->profile_image)}}"
                                                alt="">
                                            <h4></h4>
                                            <span
                                                class="plac-det-cate">{{dateFormatConverter($event->listing_cdt)}}</span>
                                        </div>
                                        <div class="plac-hom-box-txt">
                                            <div class="revi-box-1">
                                                                                                                                                                                            </div>
                                            <span>More details</span>
                                        </div>
                                        <a href="{{route('all-listinged',['id'=>$event->listing_id])}}"
                                           class="fclick"></a>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->
        <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-deta-sec-com">
            <div class="container">
                <div class="row">
                    <div class="plac-hom-tit plac-hom-tit-ic-eve">
                        <h2>Events in <b>Picture City</b></h2>
                        <p>Start planning your next trip with a little help from <b>Fototech India</b></p>
                    </div>
                    <div class="plac-hom-all-pla plac-det-eve">
                        <ul class="multiple-items1">
                        @if($place->place_events!=null)
                            @php $events=arr($place->place_events) @endphp
                            @foreach($events as $event)
                            @php $event=first('vv_events','event_id',$event); @endphp
                            @if($event!=null)
                                <li>
                                    <div class="plac-hom-box">
                                        <div class="plac-hom-box-im">
                                            <img src="{{asset('/storage/file/'.$event->event_image)}}" alt="">
                                            <h4></h4>
                                            <span class="plac-det-cate">{{dateFormatConverter($event->event_start_date)}}</span>
                                        </div>
                                        <a href="{{route('event/details',['id'=>$event->event_id])}}" class="fclick"></a>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                @endif
                         </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

        <!--START-->
    <section>
        <div class="plac-hom-bd plac-deta-sec plac-deta-sec-com">
            <div class="container">
                <div class="row">
                    <div class="plac-hom-tit plac-hom-tit-ic-exp">
                        <h2>Services Experts in <b>Picture City</b></h2>
                        <p>Start planning your next trip with a little help from <b>Fototech</b></p>
                    </div>
                    <div class="plac-hom-all-pla">
                        <ul class="multiple-items1">
                        @if($place->place_experts!=null)
                        @php $events=arr($place->place_experts) @endphp
                            @foreach($events as $event)
                            @php $event=first('vv_experts','expert_id',$event); @endphp
                            @if($event!=null)
                             <li>
                                <div class="plac-hom-box">
                                    <div class="plac-hom-box-im">
                                        <img src="{{asset('/storage/file/'.$event->profile_image)}}"
                                             alt="">
                                        <h4></h4>
                                        <span class="plac-det-cate">{{dateFormatConverter($event->expert_cdt)}}</span>
                                    </div>
                                    <div class="plac-hom-box-txt">
                                        <div class="revi-box-1">
                                                                                                                                                                            </div>
                                        <span>More details</span>
                                    </div>
                                    <a href="{{route('expert/details',['id'=>$event->expert_id])}}" class="fclick"></a>
                                </div>
                            </li>
                             @endif
                            @endforeach
                            @endif
                         </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->
    <section>
        <div class="container">
            <div class="row">
                <div class="plac-hom-tit plac-hom-tit-ic-sugg">
                    <h2>Start adding a new place</h2>
                    <p>You can send the suggestion or request to the <b>Fototech Admin</b></p>
                    <span data-toggle="modal"
                    data-target="#addplacepop">Submit a place</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SHARE POPUP -->
    <div class="pop-ups pop-quo">
        <!-- The Modal -->
        <div class="modal fade" id="addplacepop">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">New place adding request</span>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- Modal Header -->
                    <div class="quote-pop">
                        <h4>Place details</h4>
                        <div id="place_pop_enq_success" class="log" style="display: none;">
                            <p>Your Place Add Request Is Submitted Successfully!!!</p>
                        </div>
                        <div id="place_pop_enq_fail" class="log" style="display: none;">
                            <p>Oops!! Something Went Wrong Try Later!!!</p>
                        </div>
                        <form method="post" name="place_add_request_form" id="place_add_request_form"
                              class="place_add_request_form">
                            <input type="hidden" class="form-control"
                                   name="enquiry_sender_id"
                                   value=""
                                   placeholder=""
                                   required>
                            <div class="form-group">
                                <input type="text" name="place_name" class="form-control"
                                       placeholder="Place name*" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="place_address" class="form-control"
                                       placeholder="Address of the place*" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="place_description"
                                          placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="fil-img-uplo">
                                    <span class="dumfil">Place image *</span>
                                    <input type="file" name="place_image" accept="image/*,.jpg,.jpeg,.png"
                                           class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enquiry_name" class="form-control"
                                       placeholder="Enter your name*" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"
                                       placeholder="Enter your email*"
                                       required="required" value="" name="enquiry_email"
                                       pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                       title="Invalid email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="" name="enquiry_mobile"
                                       placeholder="Enter your mobile number*"
                                       pattern="[7-9]{1}[0-9]{9}"
                                       title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                            </div>
                            <input type="hidden" id="source">
                            <button  disabled="disabled"  type="submit" id="place_add_request_submit" name="place_add_request_submit"
                                         class="place_add_request_submit btn btn-primary">Log In To Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                Copy text
                            </button>
                        </div>
                    </div>

                </div>
            </div>
    </div>

    <!-- START -->
@endsection
   
@section('js')
    <script>
        $('.multiple-items1').slick({
            infinite: true,
            slidesToShow: 3,
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

        // Gallery image hover
        $(".img-wrapper").hover(
            function () {
                $(this).find(".img-overlay").animate({opacity: 1}, 600);
            }, function () {
                $(this).find(".img-overlay").animate({opacity: 0}, 600);
            }
        );

        // Lightbox
        var $overlay = $('<div id="overlay"></div>');
        var $image = $("<img>");
        var $prevButton = $('<div id="prevButton"><i class="material-icons">chevron_left</i></div>');
        var $nextButton = $('<div id="nextButton"><i class="material-icons">chevron_right</i></div>');
        var $exitButton = $('<div id="exitButton"><i class="material-icons">close</i></div>');

        // Add overlay
        $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
        $("#gallery").append($overlay);

        // Hide overlay on default
        $overlay.hide();

        // When an image is clicked
        $(".img-overlay").click(function (event) {
            event.preventDefault();
            var imageLocation = $(this).prev().attr("href");
            $image.attr("src", imageLocation);
            $overlay.fadeIn("slow");
        });

        // When the overlay is clicked
        $overlay.click(function () {
            $(this).fadeOut("slow");
        });

        // When next button is clicked
        $nextButton.click(function (event) {
            $("#overlay img").hide();
            var $currentImgSrc = $("#overlay img").attr("src");
            var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
            var $nextImg = $($currentImg.closest(".plac-gal-imag").next().find("img"));
            var $images = $("#image-gallery img");
            if ($nextImg.length > 0) {
                $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
            } else {
                $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
            }
            event.stopPropagation();
        });

        // When previous button is clicked
        $prevButton.click(function (event) {
            $("#overlay img").hide();
            var $currentImgSrc = $("#overlay img").attr("src");
            var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
            var $nextImg = $($currentImg.closest(".plac-gal-imag").prev().find("img"));
            $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
            event.stopPropagation();
        });

        $exitButton.click(function () {
            $("#overlay").fadeOut("slow");
        });

        $(document).on('click', 'a[href^="#"]', function (event) {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 500);
        });
    </script>
@endsection