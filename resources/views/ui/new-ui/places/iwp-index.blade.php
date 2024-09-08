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
    <section>
        <div class="plac-hom-ban">
            <div class="container">
                <div class="row">
                    <div class="plac-hom-ban-inn">
                        <h1>Explore your Pre Wed Locations</h1>
                        <p>Plan your Location with <b>FOTOTECH</b>. Find your location and get the nearest Services & Activities.</p>
                        <div class="plac-hom-search">
                            <div class="job-sear">
                                <form name="place_filter_form" id="place_filter_form" class="place_filter_form">
                                    <ul>
                                        <li class="sr-sea">
                                            <select class="chosen-select" id="place-select-search" name="place-select-search">
                                                <option value="0">Find your location now</option>
                                                  @foreach($places as $place)
                                                   <option value="{{$place->place_id }}">{{$place->place_name}}</option>
                                                   @endforeach
                                                </select>
                                        </li>
                                        <li class="sr-btn">
                                            <button id="place_filter_submit"><i class="material-icons">search</i></button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END-->

    <!--START-->
    <section>
        <div class="plac-hom-bd">
            <div class="container">
                <div class="row">
                    <div class="plac-hom-tit plac-hom-tit-ic-pla">
                        <h2>Location places</h2>
                        <p>Start planning your next trip with a little help from  <b>FOTOTECH</b></p>
                    </div>
                    <div class="plac-hom-all-pla">
                        <ul>
                            @foreach($places as $place)
                            <li>
                                <div class="plac-hom-box">
                                    <div class="plac-hom-box-im">
                                        @php $pics=arr($place->place_gallery_image); @endphp
                                        
                                        <img src="{{asset('/storage/file/'.$pics[0])}}" alt="">
                                         
                                        <h4>{{$place->place_name}}</h4>
                                    </div>
                                    <div class="plac-hom-box-txt">
                                        <span>{{$place->place_events}}</span>
                                        <span>More details</span>
                                    </div>
                                    <a href="{{route('places_details',['id'=>$place->place_id])}}" class="fclick"></a>
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
        <div class="container">
            <div class="row">
                <div class="plac-hom-tit plac-hom-tit-ic-sugg">
                        <h2>Start adding a new place</h2>
                        <p>You can send the suggestion or request to the <b>FOTOTECH Admin</b></p>
                        <span data-toggle="modal" data-target="#addplacepop">Submit a place</span>
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
                        <form method="post" name="place_add_request_form"action="{{route('place_store')}}" id="place_add_request_form" class="place_add_request_form">
                            @csrf
                            <input type="hidden" class="form-control"
                                   name="enquiry_sender_id"
                                   value=""
                                   placeholder=""
                                   required>
                            <div class="form-group">
                                <input type="text" name="place_name" class="form-control" placeholder="Place name*" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="place_address" class="form-control" placeholder="Address of the place*" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="place_description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="fil-img-uplo">
                                    <span class="dumfil">Place image *</span>
                                    <input type="file" name="place_image" accept="image/*,.jpg,.jpeg,.png" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="enquiry_name" class="form-control" placeholder="Enter your name*" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter your email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="" name="enquiry_mobile" placeholder="Enter your mobile number*" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                            </div>
                            <input type="hidden" id="source">
                                @if(session('user_C')=='true')
                              <button  type="submit" id="place_add_request_submit"  name="place_add_request_submit" class="place_add_request_submit btn btn-primary"> Log In To Submit </button>
                               @else
                               <a  id="place_add_request_submit1" href="{{route('ui_login')}}" name="place_add_request_submit" class="place_add_request_submit btn btn-primary"> Log In To Submit </a>
                               @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- START -->

    <!-- END -->

   @endsection