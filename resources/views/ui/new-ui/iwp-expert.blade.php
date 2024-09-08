@extends('main.master')
@section('content')
<!-- END -->
<style>
    .hom2-cus-sli ul {
        position: relative;
        overflow: hidden;
        padding: 20px 20px 0
    }

    .slick-arrow {
        width: 50px;
        height: 50px;
        border-radius: 50px;
        background: #fff;
        border: 1px solid #ededed;
        color: #ffffff03;
        position: absolute;
        z-index: 9;
        top: 38%
    }

    .slick-arrow:before {
        content: 'chevron_left';
        font-size: 27px;
        top: 4px;
        left: 9px
    }

    .slick-prev {
        left: 14px
    }

    .slick-next {
        right: 14px
    }

    .slick-next:before {
        content: 'chevron_right';
        font-size: 27px
    }
</style>

<!-- START -->
<section>
    <div class="all-listing all-jobs all-serexp">
        <!--FILTER ON MOBILE VIEW-->
        <div class="fil-mob fil-mob-act">
            <h4>Listing filters <i class="material-icons">filter_list</i></h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 fil-mob-view">
                    <!--- START --->
                    <div class="filt-com">
                        <div class="job-alert">
                            <h5>Are looking for Freelancer?</h5>
                            <p>We will help you to arrage best Freelancer/Service Expert.</p>
                            <a href="#" data-toggle="modal"
                            data-target="#expfrm31">Send your queries</a>
                        </div>
                    </div>
                    <!--- END --->
                    <!--- START --->
                    <div class="filt-com lhs-cate">
                        <h4>Categories</h4>
                        <div class="form-group">
                            <select name="cat_check" id="cat_check" class="cat_check chosen-select">
                                <option value="">Select Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                    @endforeach                                      
                                </select>
                        </div>
                    </div>
                    <!--- END --->
                    <!--- START --->
                    <div class="filt-com lhs-loc">
                        <h4>Location</h4>
                        <div class="form-group">
                            <select  class="state_check chosen-select" name="state_check" id="state">
                                <option value="">Select State</option>
                                @foreach($states as $cat)
                                         <option value="{{$cat->state_id}}">{{$cat->state_name}}</option>
                                         @endforeach
                                                                </select>
                        </div>
                        <div class="form-group">
                            <select class="city_check chosen-select" name="city_check" id="city">
                                <option value="">Select City</option>
                                @foreach($citys as $cat)
                                         <option value="{{$cat->country_id}}">{{$cat->country_name}}</option>
                                         @endforeach
                            </select>
                        </div>
                    </div>
                    <!--- END --->

                    <!--- START --->
                    <div class="filt-com lhs-rati lhs-avail">
                        <h4>Availability</h4>
                        <ul>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="3" name="expert_avail" class="availability_check"
                                           id="avail1"
                                        checked/>
                                    <label for="avail1">All</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="0" name="expert_avail" class="availability_check"
                                           id="avail2"
                                        checked/>
                                    <label
                                        for="avail2">Available</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="1" name="expert_avail" class="availability_check"
                                           id="avail3"
                                        />
                                    <label for="avail3">Busy</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="2" name="expert_avail" class="availability_check"
                                           id="avail4"/>
                                    <label
                                        for="avail4">Closed today</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--- END --->

                    <!--- START --->
                    <div class="filt-com lhs-rati lhs-ver">
                        <h4>Verified</h4>
                        <ul>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="1" name="expert_veri" class="expert_veri" id="exver1"
                                        checked/>
                                    <label for="exver1">All</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="2" name="expert_veri" class="expert_veri" id="exver2"
                                        />
                                    <label
                                        for="exver2">Verified experts</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--- END --->

                    <!--- START --->
                    <div class="filt-com lhs-rati">
                        <h4>Rating</h4>
                        <ul>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="0" name="expert_rat" class="rating_check" id="exrat6"
                                        checked/>
                                    <label for="exrat6">All</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="5" name="expert_rat" class="rating_check" id="exrat1"
                                        />
                                    <label for="exrat1">5 Star</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="4" name="expert_rat" class="rating_check" id="exrat2"
                                        />
                                    <label for="exrat2">4 Star</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="3" name="expert_rat" class="rating_check" id="exrat3"
                                        />
                                    <label for="exrat3">3 Star</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="2" name="expert_rat" class="rating_check" id="exrat4"
                                        />
                                    <label for="exrat4">2 Star</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="1" name="expert_rat" class="rating_check" id="exrat5"
                                        />
                                    <label for="exrat5">1 Star</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--- END --->
                    <!--- START --->
                    <div class="filt-com lhs-rati lhs-ver">
                        <h4>Services Done</h4>
                        <ul>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="0" name="expert_ser_cou" class="expert_ser_cou"
                                           id="exsercou1" checked/>
                                    <label for="exsercou1">All</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="2" name="expert_ser_cou" class="expert_ser_cou"
                                           id="exsercou2" />
                                    <label
                                        for="exsercou2">High - Low</label>
                                </div>
                            </li>
                            <li>
                                <div class="rbbox">
                                    <input type="radio" value="1" name="expert_ser_cou" class="expert_ser_cou"
                                           id="exsercou3" />
                                    <label
                                        for="exsercou3">Low - High</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--- END --->
                </div>
                                <div class="col-md-9">
                                            <div
                            class="job-ser-cnt">Showing {{sprintf("%02d",CountCol('vv_experts','category_id',$id))}} Service Experts</div>
                        <div class="job-list">
                        <ul>
                        @foreach($experts as $expert)
                                     <li>
                                        <div class="job-box">
                                            <div class="job-box-img">
                                                <img
                                                    src="{{asset('/storage/file/'.$expert->profile_image)}}"
                                                    alt="">
                                            </div>
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
                                            <div class="job-box-con">
                                                <h4>{{$expert->profile_name}}</h4>
                                                <span>0 Services Done</span>
                                                <span>{{$expert->years_of_experience}} yearsExp.</span>
                                            </div>
                                            <div class="job-box-apl">
                                        <span class="job-box-cta" data-toggle="modal"
                                              data-target="#expfrm31">Contact me</span>
                                                <a href="{{route('expert_profile',['id'=>$expert->expert_id])}}"
                                                   class="serexp-cta-more">More details</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!--  Quick View box starts  -->
                                    <!-- START -->
                                    <section>
                                        <div class="pop-ups pop-quo">
                                            <!-- The Modal -->
                                            <div class="modal fade" id="expfrm31">
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
                                                                <div class="form-group">
                                                                    <select class="chosen-select" required="required" name="enquiry_category">
                                                                        <option value="">Select Category</option>
                                                                        @foreach($category as $cat)
                                                                        <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                                                        @endforeach  
                                                                      </select>
                                                                </div>
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
                                       
                                    </section>
                                    @endforeach
                                    <!-- END -->
                                    <!--  Quick View box ends  -->
                           </ul>
                        </div>
                                        </div>
            </div>
        </div>
    </div>
</section>

<!--  Quick View box starts  -->
<!-- START -->
<section>
    <div class="pop-ups pop-quo">
        <!-- The Modal -->
        <div class="modal fade" id="allexpfrm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">Contact</span>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- Modal Header -->
                    <div class="quote-pop">
                        <div id="expert_pop_enq_common_success" class="log" style="display: none;"><p>Your Enquiry Is Submitted Successfully!!!</p>
                        </div>
                        <div id="expert_pop_enq_common_same" class="log" style="display: none;"><p>You cannot make enquiry on your own Service!!</p>
                        </div>
                        <div id="expert_pop_enq_common_fail" class="log" style="display: none;"><p>Oops!! Something Went Wrong Try Later!!!</p>
                        </div>
                        <div class="ser-exp-wel">You can post your enquiry here. We will find best service providers for you!!!</div>
                        <form method="post" name="expert_all_enquiry_common_form"
                              id="expert_all_enquiry_common_form">
                            <input type="hidden" class="form-control"
                                   name="general_id"
                                   value="1" placeholder=""
                                   required>
                            <input type="hidden" class="form-control"
                                   name="enquiry_sender_id"
                                   value=""
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
                            <div class="form-group">
                                <select class="chosen-select" required="required" name="enquiry_category">
                                    <option value="">Select Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                    @endforeach  
                                 </select>
                            </div>
                            <div class="form-group col-md-6 serex-date">
                                <input type="text" class="form-control" name="enquiry_date"
                                       placeholder="Preferred Date" id="newdate">
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
                                <textarea class="form-control" name="enquiry_message" id="enquiry_message" placeholder="Enter your query or message"></textarea>
                            </div>
                            <input type="hidden" name="" id="source">
                            <button  disabled="disabled"  type="submit" id="expert_all_enquiry_common_submit"
                                                                  name="expert_all_enquiry_common_submit"
                                                                  class="btn btn-primary"> Log In To Submit                             </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END -->
<!--  Quick View box ends  -->

<!-- END -->
<!-- START -->


<!-- END -->

<!-- START -->
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $("#cat_check").change(function(){
            var category = $(this).val();
                window.location.replace("/expert/details"+category);
        });
        $("#state").change(function(){
            
            var sub_category = $(this).val();
            
            if(sub_category == ""){
                $("#city").html("<option value=''>Select city</option>");
            }
            
            $.ajax({
                url:"/get-plans1/"+sub_category,
                type:"GET",
                success:function(data){
            
                    var child_category = data.child_category;
                   // window.alert(child_category.lenght);
                    var html = "<option value=''>Select city</option>";
                    for(let i =0;i<child_category.length;i++){
                        html += `
                        <option value="`+child_category[i]['country_id']+`">`+child_category[i]['country_name']+`</option>
                        `;
                    }
                    $("#city").html(html);
                    $("#city").trigger("chosen:updated");
                }
            });

        });
        $("#city").change(function(){
            var city = $(this).val();
            window.location.replace("/expert/city/"+city);
        });

});
</script>
@endsection