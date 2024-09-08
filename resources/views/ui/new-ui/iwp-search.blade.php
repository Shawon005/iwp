
@extends('main.master')
@section('content')
    <!-- START -->
    <section class="">
        <!-- <div class="abou-pg commun-pg-main"> -->
            <!-- <div class="about-ban comunity-ban"> -->
                <!-- <h1>Search Results</h1> -->
                <!-- <p>Build your business community and expand your business to next step.</p>
                <input type="text" id="tail-se" placeholder="Search user profiles.."> -->
                <section class=" ser-head">
                    <div class="container">
                        <div class="blog-head-inn">
                            <h1>Search Results</h1>
                        </div>
                        <div class="ban-search">
                            <form>
                                <ul>
                                    <li class="sr-sea">
                                        <input type="text" id="select-search" value="" class="autocomplete ui-autocomplete-input" placeholder="Search anything..." autocomplete="off">
                                    </li>
                                    <li class="sr-btn">
                                        <input type="submit" id="filter_submit" name="filter_submit" value="Search" class="filter_submit">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </section>                
            </div>  
        </div>
        <!-- start--->
    <section class=" event-body ser-resu">
        <div class="container">
            <div class="">
                <ul id="intseres">
                    @foreach($listing as $list)
                    <li>
                        <div class="smbox">
                            <div class="ser0"><img src="{{asset('/storage/file/'.$list->profile_image)}}">
                            </div>
                            <div class="ser1">
                               <a href="{{route('all-listings',['id'=>$list->listing_id])}}">{{$list->listing_name}}</a>
                            </div>
                            
                            <span class="ser2">Listing</span>
                            <div class="ser3">
                               {{name('vv_categories',$list->category_id)}}
                            </div>
                            <span class="ser4">
                                <a href="{{route('all-listings',['id'=>$list->listing_id])}}">http://iwpdirectory.in/listing/{{name('vv_categories',$list->category_id)}}</a>
                            </span>
                        </div>
                    </li>
                    @endforeach
                    @foreach($events as $event)
                    <li>
                        <div class="smbox">
                            <div class="ser0">
                                <img src="{{asset('/storage/file/'.$event->event_image)}}" alt="">
                            </div>
                            <div class="ser1">
                                <a href="{{route('event/details',['id'=>$event->event_id])}}">{{$event->event_name}}</a>
                            </div>
                            <span class="ser2 ser-ev">Event</span>
                            <div class="ser3">
                            {{$event->event_name}} in {{$event->event_address}}
                            </div>
                            <span class="ser4">
                                <a href="{{route('event/details',['id'=>$event->event_id])}}">http://iwpdirectory.in/event/{{$event->event_name}}</a>
                            </span>
                        </div>
                    </li>
                    @endforeach
                    @foreach($products as $product)
                    <li>
                        <div class="smbox">
                            <div class="ser0">
                                <img src="{{asset('/storage/file/'.$product->gallery_image)}}" alt="">
                            </div>
                            <div class="ser1"><a href="{{route('product/details',['id'=>$product->product_id])}}">{{$product->product_name}}</a>
                            </div>
                            <span class="ser2 ser-bl">Product</span>
                            <div class="ser3">
                            {{$product->product_description}}
                            </div>
                            <span class="ser4">
                                <a href="{{route('product/details',['id'=>$product->product_id])}}">http://iwpdirectory.in/product/{{$product->product_name}}</a>
                            </span>
                        </div>
                    </li>
                 @endforeach
                 @foreach($jobs as $job)
                    <li>
                        <div class="smbox">
                            <div class="ser0">
                                <img src="{{asset('/storage/file/'.$job->company_logo)}}" alt="">
                            </div>
                            <div class="ser1"><a href="{{route('job_details',['id'=>$job->job_id])}}">{{$job->job_title}}</a>
                            </div>
                            <span class="ser2 ser-bl">Job</span>
                            <div class="ser3">
                            Need {{$job->no_of_openings}} {{$job->job_title}} in studio at {{Nam('vv_job_states','state_id',$job->state_id,'state_name')}}
                        </div>
                            <span class="ser4">
                                <a href="{{route('job_details',['id'=>$job->job_id])}}">http://iwpdirectory.in/job/{{$job->job_title}}</a>
                            </span>
                        </div>
                    </li>
                @endforeach
                @foreach($experts as $expert)
                    <li>
                        <div class="smbox">
                            <div class="ser0">
                                <img src="{{asset('/storage/file/'.$expert->profile_image)}}" alt="">
                            </div>
                            <div class="ser1"><a href="{{route('profile',['id'=>$expert->user_id])}}">{{$expert->profile_name}}</a>
                            </div>
                            <span class="ser2 ser-bl">Service Experts</span>
                            <span class="ser4">
                                <a href="{{route('profile',['id'=>$expert->user_id])}}">http://iwpdirectory.in/service-expert/{{$expert->profile_name}</a>
                            </span>
                        </div>
                    </li>
                  @endforeach
                </ul>
            </div>

        </div>
 </section>
 <!-- end -->
    <!-- END -->

    <!-- START -->
@endsection 
@section('js')
    <script src="js/jquery.simplePagination.min.js"></script>
    <script>
        var items = $(".community-wrapper .community-item");
        var numItems = items.length;
        var perPage = 18;

        items.slice(perPage).hide();

        $('#community-pagination-container').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "&laquo;",
            nextText: "&raquo;",
            onPageClick: function (pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
                $("html, body").animate({scrollTop: 0}, "fast");
                return false;
            }
        });
    </script>
    <script>
        $("#tail-se").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#tail-re li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#chat-box-div1").on('click', function () {
                $("#msg-op-conve1").addClass("msg-sho-act");
                setTimeout(function () {
                    var d = $(".chat-box-messages");
                    d.scrollTop(d[0].scrollHeight);
                }, 1);
            });
            $("#comm-msg-pop-clo1").on('click', function () {
                $("#msg-op-conve1").removeClass("msg-sho-act");
            });

        });
    </script>
    <script>
        //
        <!--Message New Chat Form Ajax Call And Validation starts-->

        $("#chat_send1").click(function () {
            $("#new_chat_form1").validate({
                rules: {
                    chat_to_user: {required: true},
                    chat_message: {required: true}

                },
                messages: {

                    chat_to_user: {required: "Choose User"},
                    chat_message: {required: "Type Something.."}
                },

                submitHandler: function (form) { // for demo
                    //form.submit();
                    $.ajax({
                        type: "POST",
                        data: $("#new_chat_form1").serialize(),
                        url: "chat_submit.php",
                        cache: true,
                        success: function (data) {
                            var success = $.parseJSON(data);
                            if (data != null) {
                                updateChat1(success.sender23, success.receiver);
                                $('input[type="text"],textarea').val('');
                            } else {
                                $('input[type="text"],textarea').val('');
                            }

                        }

                    })
                }
            });
        });
        <!--Message New Chat Form Ajax Call And Validation ends-->

        // Update Chat Box function starts

        function updateChat1(sender, receiver) {
            var sender_checklist = "&sender_id=" + sender;
            var receiver_checklist = "&receiver_id=" + receiver;
            var main_string = sender_checklist + receiver_checklist;
            main_string = main_string.substring(1, main_string.length);

            $.ajax({
                type: "POST",
                url: 'filter_chat.php',
                data: main_string,
                cache: false,
                success: function (html) {
                    //alert(html);
                    $(".chat-box-messages").html(html);
                    $(".chat-box-messages").css("opacity", 1);
                    setTimeout(function () {
                        var d = $(".chat-box-messages");
                        d.scrollTop(d[0].scrollHeight);
                    }, 1);
                    // $("#loaderID").css("opacity",0);
                }
            });
        }

        // Update Chat Box function Ends


    </script>
    <script>
        $(document).ready(function () {
            $("#chat-box-div2").on('click', function () {
                $("#msg-op-conve2").addClass("msg-sho-act");
                setTimeout(function () {
                    var d = $(".chat-box-messages");
                    d.scrollTop(d[0].scrollHeight);
                }, 1);
            });
            $("#comm-msg-pop-clo2").on('click', function () {
                $("#msg-op-conve2").removeClass("msg-sho-act");
            });

        });

    </script>
    <script>

        //
        <!--Message New Chat Form Ajax Call And Validation starts-->

        $("#chat_send2").click(function () {
            $("#new_chat_form2").validate({
                rules: {
                    chat_to_user: {required: true},
                    chat_message: {required: true}

                },
                messages: {

                    chat_to_user: {required: "Choose User"},
                    chat_message: {required: "Type Something.."}
                },

                submitHandler: function (form) { // for demo
                    //form.submit();
                    $.ajax({
                        type: "POST",
                        data: $("#new_chat_form2").serialize(),
                        url: "chat_submit.php",
                        cache: true,
                        success: function (data) {
                            var success = $.parseJSON(data);
                            if (data != null) {
                                updateChat2(success.sender23, success.receiver);
                                $('input[type="text"],textarea').val('');
                            } else {
                                $('input[type="text"],textarea').val('');
                            }

                        }

                    })
                }
            });
        });
        <!--Message New Chat Form Ajax Call And Validation ends-->

        // Update Chat Box function starts

        function updateChat2(sender, receiver) {
            var sender_checklist = "&sender_id=" + sender;
            var receiver_checklist = "&receiver_id=" + receiver;
            var main_string = sender_checklist + receiver_checklist;
            main_string = main_string.substring(1, main_string.length);

            $.ajax({
                type: "POST",
                url: 'filter_chat.php',
                data: main_string,
                cache: false,
                success: function (html) {
                    //alert(html);
                    $(".chat-box-messages").html(html);
                    $(".chat-box-messages").css("opacity", 1);
                    setTimeout(function () {
                        var d = $(".chat-box-messages");
                        d.scrollTop(d[0].scrollHeight);
                    }, 1);
                    // $("#loaderID").css("opacity",0);
                }
            });
        }

        // Update Chat Box function Ends


    </script>
@endsection