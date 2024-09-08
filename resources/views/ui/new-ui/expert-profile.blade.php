@extends('main.master')
@section('content')

<section>
    <div class="job-prof-pg">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <!--START-->
                    <div class="jpro-bd-chat">
                        <h4>Book this (<b>{{$expert->profile_name}}</b>) Freelancer<span data-toggle="modal" data-target="#expfrm">Book now</span></h4>
                    </div>
                    <div class="profile">
                        @php $T_R=sub('vv_expert_reviews','expert_id',$expert->expert_id); $T=count($T_R); $review=0; @endphp
                        @foreach($T_R as $R)
                        <input type="hidden" value="{{$review=$review+$R->expert_rating}}">
                        
                        @endforeach
                      
                    <div class="job-days">
                            @if($review!=0) 
                            <input type="hidden" value="{{$review=(float)$review/$T;}}">
                            <span class="rat" title="User reting 5 out of">{{$review}}</span>
                            @else
                           <span class="ver"><i class="material-icons" title="Verified expert">verified_user</i></span>
                           @endif
                         </div>
                        <div class="jpro-ban-bg-img">
                            <img
                                src="{{asset('/storage/file/'.$expert->cover_image)}}"
                                alt="">
                        </div>
                        <div class="jpro-ban-tit">
                            <div class="s1">
                                <img
                                    src="{{asset('/storage/file/'.$expert->profile_image)}}" alt="">
                            </div>
                            <div class="s2">
                                <h1>{{$expert->profile_name}}</h1>
                                <span class="loc">{{Nam('vv_expert_cities','country_id',$expert->city_id,'country_name')}}</span>
                                <p>{{name('vv_expert_categories',$expert->category_id)}} - FOTOTECH</p>
                            </div>
                            <div class="s3">
                                <span class="cta fol comm-msg-act-btn" data-toggle="modal" data-target="#expfrm">Book now</span>
                                <span class="cta" data-toggle="modal" data-target="#expwrirevi">Write Review</span>
                            </div>
                        </div>
                    </div>
                    <!--END-->
                    <!--START-->
                    <div class="jb-pro-bio">
                        <h4>Expert details</h4>
                        <ul>
                            <li>
                                Service Done<span>00</span>
                            </li>
                            <li>
                            Experience <span>{{$expert->years_of_experience}}</span>
                            </li>
                             <li>
                             Base fare <span>{{$expert->base_fare}}</span>
                            </li>
                            <li>
                            Verified  <span>{{$expert->expert_status}}</span>
                            </li>
                            <li>
                            Location  <span>{{$expert->years_of_experience}} Years</span>
                            </li>
                            <li>
                            Join date   <span>{{dateFormatConverter($expert->expert_cdt)}}</span>
                            </li>
                            <li>
                            Service time   <span>{{$expert->available_time_start}}</span>
                            </li>
                         </ul>
                    </div>
                    <!--END-->
                    <!--START-->
                    <div class="jpro-bd-com">
                            <h4>Service Areas</h4>
                            @php $sub_category=arr($expert->area_id); $sub=table('vv_expert_areas'); @endphp
                            @foreach($sub_category as $user):
                            @foreach($sub as $s)
                            @if($s->city_id==$user)
                            <span>{{$s->city_name}}</span>
                            @endif
                            @endforeach
                            @endforeach
                            
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Services can do</h4>
                            @php $sub_category=arr($expert->sub_category_id); $sub=table('vv_expert_sub_categories'); @endphp
                            @foreach($sub_category as $user):
                            @foreach($sub as $s)
                            @if($s->sub_category_id==$user)
                            <span>{{$s->sub_category_name}}</span>
                            @endif
                            @endforeach
                            @endforeach
                            
                        </div>
                    <div class="jpro-bd">
                        <div class="jpro-bd-com">
                            <h4>Experience</h4>
                            <ul>
                                <li class="{{($expert->experience_1==null)?'d-none':''}}">{{$expert->experience_1}}</li>
                                <li class="{{($expert->experience_2==null)?'d-none':''}}">{{$expert->experience_2}}</li>
                                <li class="{{($expert->experience_3==null)?'d-none':''}}">{{$expert->experience_3}}</li>
                                <li class="{{($expert->experience_4==null)?'d-none':''}}">{{$expert->experience_4}}</li>
                            </ul>
                        </div>
                        
                        <div class="jpro-bd-com">
                            <h4>Education</h4>
                            <ul>
                                <li class="{{($expert->education_1==null)?'d-none':''}}">{{$expert->education_1}}</li>
                                <li class="{{($expert->education_2==null)?'d-none':''}}">{{$expert->education_2}}</li>
                                <li class="{{($expert->education_3==null)?'d-none':''}}">{{$expert->education_3}}</li>
                                <li class="{{($expert->education_4==null)?'d-none':''}}">{{$expert->education_4}}</li>
                             </ul>
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Additional information</h4>
                                <span class="{{($expert->additional_info_1==null)?'d-none':''}}">{{$expert->additional_info_1}}</span>
                                <span class="{{($expert->additional_info_2==null)?'d-none':''}}">{{$expert->additional_info_2}}</span>
                                <span class="{{($expert->additional_info_3==null)?'d-none':''}}">{{$expert->additional_info_3}}</span>
                                <span class="{{($expert->additional_info_4==null)?'d-none':''}}">{{$expert->additional_info_4}}</span>
                        </div>
                    </div>
                    <!--END-->
                </div>
                <div class="rhs">
                    <div class="ud-rhs-promo">
                        <h3>Are you a Freelance Photographer?</h3>
                        <p>Register now and generate your income multiple and move your business on next level.</p>
                        <a href="{{route('ui_login')}}">Register for free</a>
                    </div>
                                        <div class="job-rel-pro">
                        <div class="hot-page2-hom-pre">
                            <h4>Related profiles</h4>
                            <ul>
                                                            </ul>
                        </div>
                    </div>
                    <div class="job-rel-pro">
                        <div class="hot-page2-hom-pre">
                            <h4>Trending Services</h4>
                            <ul>
                                @foreach($T_expert->slice(0,3) as $experts)
                                        <li>
                                        <div class="hot-page2-hom-pre-1">
                                            <img src="{{asset('/storage/file/'.$experts->profile_image)}}" alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>{{$experts->profile_name}}</h5>
                                            <span><b>00 Experts</b>, 00 Services Done</span>
                                        </div>
                                        <a href="{{route('expert_profile',['id'=>$experts->expert_id])}}" class="fclick"></a>
                                    </li>
                                    @endforeach
                             </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pop-ups pop-quo">
           <!-- The Modal -->
        <div class="modal fade" id="expfrm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">Contact</span>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- Modal Header -->
                    <div class="quote-pop">
                        <div id="expert_pop_enq_success" class="log" style="display: none;"><p>Your Enquiry Is Submitted Successfully!!!</p>
                        </div>
                        <div id="expert_pop_enq_same" class="log" style="display: none;"><p>You cannot make enquiry on your own Service!!</p>
                        </div>
                        <div id="expert_pop_enq_fail" class="log" style="display: none;"><p>Oops!! Something Went Wrong Try Later!!!</p>
                        </div>
                        <div class="ser-exp-wel">Hey <b>{{user(session('user_id'))}}</b></div>
                        <form method="post" name="expert_all_enquiry_form"
                                id="expert_all_enquiry_form">
                                @csrf
                            <input type="hidden" class="form-control"
                                    name="expert_id"
                                    value="{{$expert->expert_id}}"
                                    placeholder=""
                                    required>
                            <input type="hidden" class="form-control"
                                    name="expert_user_id"
                                    value="{{$expert->user_id}}" placeholder=""
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
                            <div class="form-group">
                                <input type="text" name="enquiry_name"
                                        value=""
                                        required="required" class="form-control"
                                        placeholder="Enter name*">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"
                                        placeholder="Enter email*" required="required"
                                        value=""
                                        name="enquiry_email"
                                        pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                        title="Invalid email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                        value=""
                                        name="enquiry_mobile"
                                        placeholder="Enter mobile number *"
                                        pattern="[7-9]{1}[0-9]{9}"
                                        title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                        required>
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <select class="chosen-select" required="required" name="enquiry_category">-->
                            <!--        <option value="">Select Category</option>-->
                            <!--        @foreach($category as $cat)-->
                            <!--        <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>-->
                            <!--        @endforeach  -->
                            <!--        </select>-->
                            <!--</div>-->
                            <div class="form-group col-md-6 serex-date">
                                <input type="date" class="form-control" name="enquiry_date"
                                        placeholder="Preferred Date" >
                            </div>
                            <div class="form-group col-md-6 serex-time">
                                <select class="chosen-select" name="enquiry_time">
                                    <option value="">Preferred Time</option>
                                        <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 PM">12:00 PM</option>
                                            <option value="1:00 PM">1:00 PM</option>
                                            <option value="2:00 PM">2:00 PM</option>
                                            <option value="3:00 PM">3:00 PM</option>
                                            <option value="4:00 PM">4:00 PM</option>
                                            <option value="5:00 PM">5:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="7:00 PM">7:00 PM</option>
                                            <option value="8:00 PM">8:00 PM</option>
                                            <option value="9:00 PM">9:00 PM</option>
                                            <option value="10:00 PM">10:00 PM</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="enquiry_location" id="enquiry_location" placeholder="Enter your Location"></textarea>
                            </div>
    						<div class="form-group">
    							<select  name="state_id" id="state_id" class="chosen-select form-control">
    								<option value="">Select State</option>
    								@foreach($states as $user):
    								<option value="{{$user->state_id}}" >{{$user->state_name}}</option>
    								@endforeach
    							</select>
    						</div>
    						<div class="form-group">
    							<select  name="city_id" id="city_id" class="chosen-select form-control">
    								<option value="">Select City</option>
    								@foreach($cities as $user):
    								<option value="{{$user->country_id}}" >{{$user->country_name}}</option>
    								@endforeach
    							</select>
    						</div>
                            <div class="form-group">
                                <textarea class="form-control" name="enquiry_message" id="enquiry_message" placeholder="Enter your query or message"></textarea>
                            </div>
                            <input type="hidden" name="" id="source">
                            <button    type="submit" id="expert_all_enquiry_submit"
                                                                    name="expert_all_enquiry_submit"
                                                                    class="btn btn-primary"> Submit                                                                 </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                              
        <!--- END --->

        <!-- WRITE REVIEW -->
        <div class="modal fade show" id="expwrirevi" >

<div class="modal-dialog">
    <div class="modal-content">
        <div class="exper-rev-box">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div class="tit">
                <h4>Write a Review</h4>
            </div>
            <div class="prof">
                <img src="{{asset('/storage/file/'.$expert->profile_image)}}" alt="">
                <h3>{{$expert->profile_name}}</h3>
                <p>Rate the Service and Care here</p>
            </div>
                    <form class="col" name="expert_review_form" id="expert_review_form" method="post">
                        @csrf
                    <input type="hidden" class="form-control" name="expert_id" value="{{$expert->expert_id}}">
                    <input type="hidden" class="form-control" name="expert_user_id" value="{{$expert->user_id}}">
                    <input name="review_user_id" value="{{session('user_id')}}" type="hidden">
                    <div id="expert_review_success" style="text-align:center;display: none; color: green;">Thanks for your Review !! Your Review Is Successful!!                                </div>
                    <div id="expert_review_fail" style="text-align:center;display: none; color: red;">Oops!! Something Went Wrong Try Later!!!</div>
                    <div class="rating-new">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="expert_rating" class="expert_rating" value="5">
                            <label class="full" for="star5" title="Awesome"></label>
                            <input type="radio" id="star4" name="expert_rating" class="expert_rating" value="4">
                            <label class="full" for="star4" title="Excellent"></label>
                            <input type="radio" id="star3" class="expert_rating" name="expert_rating" value="3">
                            <label class="full" for="star3" title="Good"></label>
                            <input type="radio" id="star2" name="expert_rating" class="expert_rating" value="2">
                            <label class="full" for="star2" title="Average"></label>
                            <input type="radio" id="star1" name="expert_rating" class="expert_rating" value="1" checked="checked">
                            <label class="full" for="star1" title="Poor"></label>
                        </fieldset>
                        <div id="star-value">3 Star</div>
                    </div>
                    <div class="rating-new-msg">
                        <textarea name="expert_message" placeholder="Write your comments.."></textarea>
                    </div>
                    <div class="rating-new-cta">
                        <span data-dismiss="modal">Not now</span>
                        <button type="submit" name="expert_review_submit" id="expert_review_submit">Submit Review</button>
                    </div>
                </form>
                                </div>
    </div>
</div>

</div> 
   
    </div>
</section>
@endsection

