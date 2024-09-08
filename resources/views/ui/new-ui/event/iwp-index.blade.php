@extends('main.master')
@section('content')
    <!-- END -->
    <!-- END -->
    <!-- START -->
    <section class=" eve-deta-pg eve-deta-pg1">
        <div class="container">
            <div class="eve-deta-pg-main">
               
                    <div class="rhs">
                        <div class="list-rhs-form pglist-bg pglist-p-com">
                            <div class="quote-pop">
                                <h3>Register Now</h3>
                                <div id="event_detail_enq_success" class="log new-tnk-msg" style="display: none;"><p>Your Enquiry Is Submitted Successfully!!!</p>
                                </div>
                                <div id="event_detail_enq_same" class="log" style="display: none;"><p>You cannot make enquiry on your own event!!</p>
                                </div>
                                <div id="event_detail_enq_fail" class="log" style="display: none;"><p>Oops!! Something Went Wrong Try Later!!!</p>
                                </div>
                                <form method="post" name="event_detail_enquiry_form" id="event_detail_enquiry_form">
                                    @csrf
                                         @if(session('user_C')!=true)
                                           <fieldset  disabled="disabled">
                                        @endif    
                                        <input type="hidden" class="form-control" name="event_id"
                                               value="{{$event->event_id}}"
                                               placeholder=""
                                               required>
                                        <input type="hidden" class="form-control"
                                               name="listing_user_id"
                                               value="{{$event->user_id}}" placeholder=""
                                               required>
                                        <input type="hidden" class="form-control"
                                               name="enquiry_sender_id"
                                               value="{{session('user_id')}}"
                                               placeholder=""
                                               required>
                                        <input type="hidden" class="form-control"
                                               name="enquiry_source"
                                               value="Website"
                                               placeholder=""
                                               required>

                                        <div class="form-group ic-user">
                                            <input type="text" name="enquiry_name"
                                                   value="{{user(session('user_id'))}}"
                                                   required="required" class="form-control"
                                                   placeholder="Enter name*">
                                        </div>
                                        <div class="form-group ic-eml">
                                            <input type="email" class="form-control"
                                                   placeholder="Enter email*" required="required"
                                                   value="{{Nam('vv_users','user_id',session('user_id'),'email_id')}}"
                                                   name="enquiry_email"
                                                   pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                                   title="Invalid email address">
                                        </div>
                                        <div class="form-group ic-pho">
                                            <input type="text" class="form-control"
                                                   value="{{Nam('vv_users','user_id',session('user_id'),'mobile_number')}}"
                                                   name="enquiry_mobile"
                                                   placeholder="Enter mobile number *"
                                                   pattern="[7-9]{1}[0-9]{9}"
                                                   title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="enquiry_message"
                                                      placeholder="Enter your query or message"></textarea>
                                        </div>
                                        <input type="hidden" id="source">
                                                                        </fieldset>
                                              @if(session('user_C')!=true)
                                              <a href="{{route('login')}}">
                                            <button type="button" name="" class="btn btn-primary">Login & Enjoy Our Services                                        </button>
                                        </a>
                                        @else
                                        <button type="submit" name="enquiry_submit" class="btn btn-primary">Submit</button>
                                        @endif
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                                 <div class="lhs">
                    <div class="img">
                        <img src="{{asset('/storage/file/'.$event->event_image)}}" alt="">
                        <span class="dat"><b>Oct</b> 29</span>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!-- START -->
    <section class=" eve-deta-body">
        <div class="container">
            <div class="eve-deta-body-main">
                <div class="lhs">
                   <div class="head">
                       <div class="eve-bred-crum">
                            <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('events')}}">All Events</a></li>
                            <li><a href="#">{{$event->event_name}}</a></li>
                            </ul>
                        </div>
                        <h1>{{$event->event_name}}</h1>
                    </div>{{$event->event_description}}<div class="list-sh">
                            <span class="share-new" data-toggle="modal" data-target="#sharepop"><i class="material-icons">share</i> Share now</span>

                            
                            <span class="share-new" style="/*position: absolute;right: 52px;top: 10px;*/cursor: pointer; background: transparent;" >
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://iwpdirectory.in/event/goa-photo-festival?src=facebook&amp;quote=Goa%20Photo%20Festival"><img src="{{asset('')}}frontend/images/icon/fb.svg" style="width: 40px; height: 40px"></a>       
                            </span>
                            <span class="share-new" style="/*position: absolute;right: 95px;top: 8px;*/background: transparent; cursor: pointer;" >
                                <a target="_blank"
                                   href="whatsapp://send?text=http%3A%2F%2Fiwpdirectory.in%2Fevent%2Fgoa-photo-festival%3Fsrc%3Dwhatsapp"><img src="{{asset('')}}frontend/images/icon/whatsapp.svg" style="width: 40px; height: 40px"></a>
                                        
                            </span>
                        </div>
                </div>
                <div class="rhs">
                    <div class="sec-1">
                        <h4>Event information:</h4>
                        <ul>
                            <li><b>Name</b>:{{$event->event_name}}</li>
                            <li><b>Date</b>:{{dateFormatConverter($event->event_start_date)}}</li>
                            <li><b>Time</b>:{{$event->event_time}}</li>
                            <li><b>Address</b>:{{$event->event_address}}</li>
                            <li><b>Contact person</b>:{{$event->event_contact_name}}</li>
                            <li><b>Phone</b>: {{$event->event_mobile}}</li>
                            <li><b>Email</b>: {{$event->event_email}}</li>
                            <li><b>Website({{$event->event_website}})</b>: </li>
                        </ul>
                    </div>
                    <div class="sec-2">
                        <h4>Location</h4>
                                        </div>
                    <div class="sec-3">
                        <div class="pro-bad-sml">
                            <img
                                src="{{asset('/storage/file/'.Nam('vv_users','user_id',$event->user_id,'profile_image'))}}" alt="">
                            <h4>{{user($event->user_id)}}</h4>
                            <b>Joined on {{dateFormatConverter(Nam('vv_users','user_id',$event->user_id,'user_cdt'))}}</b>
                            <a target="_blank"
                               href="{{route('profile',['id'=>$event->user_id])}}"
                               class="fclick">&nbsp;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pro-rel-events">
                <h4>Related Events</h4>
                <div class="event-body">
                    <div class="us-ppg-com">
                        <ul>
                            @php $events=sub('vv_events','category_id',$event->category_id); @endphp
                            @foreach($events->slice(0,3) as $event)
                                <li>
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
                                            class="addr">Kbr Convention, Lb nagar</span>
                                            <span class="pho">{{$event->event_mobile}}</span>
                                        </div>
                                        <div>
                                            <div class="auth">
                                                <img
                                                    src="{{asset('/storage/file/'.Nam('vv_users','user_id',$event->user_id,'profile_image'))}}" alt="">
                                                <b>Hosted by</b><br>
                                                <h4>{{user($event->user_id)}}</h4>
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
       // <!-- Event Enquiry Form Event Detail Page Ajax Call And Validation starts-->
        $(document).ready(function () {
            $("#event_detail_enquiry_form").validate({
                rules: {
                    enquiry_name: {required: true},
                    enquiry_email: {required: true, email: true},
                    enquiry_mobile: {required: true}

                },
                messages: {

                    enquiry_name: {required: "Name is Required"},
                    enquiry_email: {required: "Email ID is Required"},
                    enquiry_mobile: {required: "Mobile Number is Required"}
                },

                submitHandler: function (form) { // for demo
                    //form.submit();
                    $.ajax({
                        type: "POST",
                        data: $("#event_detail_enquiry_form").serialize(),
                        url: "/Queation",
                        cache: true,
                        success: function (html) {
                            // alert(html);
                            if (html == 1) {
                                $("#event_detail_enq_success").show();
                                $("#event_detail_enquiry_form")[0].reset();
                            } else {
                                if (html == 3) {
                                    $("#event_detail_enq_same").show();
                                    $("#event_detail_enquiry_form")[0].reset();
                                }else {
                                    $("#event_detail_enq_fail").show();
                                    $("#event_detail_enquiry_form")[0].reset();
                                }
                            }

                        }

                    })
                }
            });
        });
        // <!-- Event Enquiry Form Event Detail Page Ajax Call And Validation ends-->
    </script>
@endsection