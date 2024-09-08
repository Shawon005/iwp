
    <!-- END -->
@extends('main.master')
@section('content')
<section class=" blog-head eve-head"> 
        <div class="container">
            <div class="blog-head-inn">
                <h1>Photo Industry Events</h1>
                <p>Here post your events like seminars, webinars, fetivals, Exhibitions and more</p>
            </div>
            <div class="ban-search">
                <form>
                    <ul>
                        <li class="sr-sea" style="margin-bottom: 10px; margin-left: 65px;">
                            <input type="text" id="event-search" class="autocomplete"
                                   placeholder="Search event in your city...">
                        </li>
                        <li style="floal: left; position: relative">          
                            <select class="state_check chosen-select form-control" name="state_check" id="state_check">
                                <option value="">Select State</option>
                                    @foreach($state as $states)
                                    <option value="{{$states->state_id}}">{{$states->state_name}}</option>   
                                    @endforeach         
                            </select> 
                        </li>
                        <li style="floal: left; position: relative">
                            <select class="city_check1  form-control" name="city_check1" id="city_check1">
                                <option value="">Select City</option>
                                @foreach($city as $citys)
                                    <option value="{{$citys->city_id}}">{{$citys->city_name}}</option>   
                                    @endforeach 
                            </select>   
                        </li>
                    </ul>
                </form>
            </div>
            
            <div class="blog-sli">
                
                <ul class="multiple-items1">
                @foreach($events->slice(0, 2) as $event)
                    <li>
                        <div class="blog-sli-box">
                            <div class="lhs">
                                <img src="{{asset('/storage/file/'.$event->event_image)}}" alt="">
                                <span class="eve-date-sli">{{date("d",strtotime($event->event_start_date))}} <b>{{date("M",strtotime($event->event_start_date))}}</b></span>
                            </div>

                            <div class="rhs">
                                <span class="hig">Top events</span>
                                <h4>{{$event->event_name}}</h4>
                                <div class="sli-desc">
                                <p>{!! $event->event_description !!}</p>
                                </div>
                                <div class="auth">
                                    <img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$event->user_id,'profile_image'))}}" alt="">
                                    <b>Hosted by</b><br>
                                    <h6>{{user($event->user_id)}}</h6>
                                </div>
                            </div>
                            <a href="{{route('event/details',['id'=>$event->event_id])}}"
                               class="fclick"></a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class=" event-body">
        <div class="container">
            <div class="us-ppg-com all-event-total">
                <ul id="intseres" class="events-wrapper">
                @foreach($events->slice(2) as $event)
                    <li class="events-item">
                        <div class="eve-box">
                            <div>
                                <a href="{{route('event/details',['id'=>$event->event_id])}}">
                                    <img src="{{asset('/storage/file/'.$event->event_image)}}" alt="">
                                    <span>{{dateFormatConverter($event->event_start_date)}}</span>
                                </a>
                            </div>
                            <div>
                                <h4>
                                    <a href="{{route('event/details',['id'=>$event->event_id])}}">{{$event->event_name}}</a>
                                </h4>
                                    <span
                                        class="addr">{{$event->event_address}}</span>
                                <span class="pho">{{$event->event_contact_name}}</span>
                            </div>
                            <div>
                                <div class="auth">
                                <img src="{{asset('/storage/file/'.Nam('vv_users','user_id',$event->user_id,'profile_image'))}}" alt="">
                                    <b>Hosted by</b><br>
                                    <h6>{{user($event->user_id)}}</h6>
                                    <a target="_blank"
                                       href="{{route('profile',['id'=>$event->user_id])}}"
                                       class="fclick"></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--END-->

    <section>
        <div class="pop-ups pop-quo">
            <!-- The Modal -->
            <div class="modal fade" id="quote">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- Modal Header -->
                        <div class="quote-pop">
                            <h4>Get quote</h4>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter email*"
                                           pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                           title="Invalid email address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter mobile number *"
                                           pattern="[7-9]{1}[0-9]{9}"
                                           title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3"
                                              placeholder="Enter your query or message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="log-bor">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="event-pagination-container"></div>
    <!-- START -->


@endsection
@section('js')
<script>
        var items = $(".events-wrapper .events-item");
        var numItems = items.length;
        var perPage = 9;

        items.slice(perPage).hide();

        $('#event-pagination-container').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "&laquo;",
            nextText: "&raquo;",
            onPageClick: function (pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
                $("html, body").animate({ scrollTop: 0 }, "fast");
                return false;
            }
        });
        $('.multiple-items1').slick({
            infinite: true,
            slidesToShow: 1,
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
<script type="text/javascript">
        function getCities(val) {
            $.ajax({
                type: "POST",
                url: "event_city_process.php",
                data: 'state_id=' + val,
                success: function (data) {
                    console.log(data);
                    $("#city_check").html(data);
                    $('#city_check').trigger("chosen:updated");
                }
            });
        }
</script>
@endsection