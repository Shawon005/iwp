@extends('main.master')
@section('content')
    <!-- END -->
    <!-- START -->
    <section>
        <div class="all-listing all-listing-pg">
            <!--FILTER ON MOBILE VIEW-->
            <div class="fil-mob fil-mob-act">
                <h4>Listing filters <i class="material-icons">filter_list</i></h4>
            </div>
            <div class="all-list-bre">
                <div class="container sec-all-list-bre">
                    <div class="row">
                        <h1>{{name('vv_categories',$id)}}</h1>
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li>
                                <a href="{{route('all-listing')}}">All Category</a>
                            </li>
                            <li>
                                 <a href="3">{{name('vv_categories',$id)}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <div class="all-filt">
                            <span class="fil-mob-clo"><i class="material-icons">close</i></span>
                            <!--START-->
                            <div class="filt-alist-near">
                                <div class="tit"> <h4>Top Service Providers</h4></div>
                                <div class="near-ser-list top-ser-secti-prov">
                                    <ul>
                                        @foreach($listings as $listing)
                                        <li>
                                            <div class="near-bx">
                                                <div class="ne-1"><img src="{{asset('/storage/file/'.$listing->profile_image)}}">
                                                    </div>
                                                <div class="ne-2">
                                                    <h5>{{$listing->listing_name}}</h5>@php $citys=arr($listing->city_id) @endphp
                                                    <p>City:@foreach($citys as $city){{Nam('vv_cities','city_id',$city,'city_name'),}}@endforeach</p>
                                                </div>
                                                <div class="ne-3">
                                                    <span>5.0</span>
                                                </div>
                                                <a href="{{route('all-listinged',['id'=>$listing->listing_id])}}"></a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!--END-->
                            <!--START-->
                            <div class="filt-com lhs-search">
                                <form>
                                    <ul>
                                        <li>
                                            <input type="text" id="search"
                                                   placeholder="Search the service">
                                        </li>
                                        <li>
                                            <input type="submit" value="">
                                        </li>
                                    </ul>
                                </form>
                            </div>

                            <!--END-->
                            <!--START-->
                            <div class="filt-com lhs-cate">
                                <h4>Categories</h4>
                                <div class="dropdown">
                                    <select 
                                            class="cat_check chosen-select"
                                            name="cat_check" id="cat_check">
                                        <option value="">Select Category</option>
                                         @foreach($category as $cat)
                                         <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--END-->

                            <!--START-->
                            <div class="sub_cat_section filt-com lhs-sub">
                                <h4>Sub category</h4>
                                <ul id="sub_cat">
                                    @foreach($sub as $sub_cat)
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" class="sub_cat_check" name="sub_cat_check"
                                                   value="{{$sub_cat->sub_category_id}}"  id="Etc Sublimations{{$sub_cat->sub_category_id}}"/>
                                            <label for="Etc Sublimations{{$sub_cat->sub_category_id}}">{{$sub_cat->sub_category_name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                               </ul>
                            </div>
                            <!--END-->

                            <!--START-->
                            <div class="filt-com lhs-featu">
                                <h4>Features</h4>
                                <ul>
                                    @foreach($features as $feature)
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="feature_check"
                                                   value="trusted"
                                                   class="feature_check"
                                                   id="trusted{{$feature->all_featured_filter_id}}"/>
                                            <label
                                                for="trusted{{$feature->all_featured_filter_id}}">{{$feature->all_featured_filter_name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                               </ul>
                            </div>
                            <!--END-->
                            
                            <!--START-->
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
                                    <select id="city_check" name="city_check" class="city_check chosen-select">
                                        <option value="">Select City</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                                            <!--START-->
                            <div class="filt-com lhs-rati">
                                <h4>Ratings</h4>
                                <ul>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="5" name="rating_check"
                                                   class="rating_check"
                                                   id="rb1"/>
                                            <label for="rb1">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="4" name="rating_check"
                                                   class="rating_check"
                                                   id="rb2"/>
                                            <label for="rb2">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_border</i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="3" name="rating_check"
                                                   class="rating_check"
                                                   id="rb3"/>
                                            <label for="rb3">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="2" name="rating_check"
                                                   class="rating_check"
                                                   id="rb4"/>
                                            <label for="rb4">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rbbox">
                                            <input type="radio" value="1" name="rating_check"
                                                   class="rating_check"
                                                   id="rb5"/>
                                            <label for="rb5">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--END-->
                                                            <!--START-->
                            <div class="filt-com lhs-ads">
                                <ul>
                                @php $ads=Ads(4); @endphp    
                                  @foreach($ads as $ad)
                                    <li>
                                        <div class="ads-box">                                               
                                            <a href="{{$ad->ad_link}}"><span>Ad</span>
                                            <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--END-->

                            <div class="all-list-filt-form">
                                <div class="tit">
                                    <h3>What service do you need?  <span>Fototech will help you</span></h3>
                                </div>
                                <div class="hom-col-req">
                                    <div id="home_slide_enq_success" class="log"
                                         style="display: none;">
                                        <p>Your Enquiry Is Submitted Successfully!!!</p>
                                    </div>
                                    <div id="home_slide_enq_fail" class="log" style="display: none;">
                                        <p>Oops!! Something Went Wrong Try Later!!!</p>
                                    </div>
                                    <div id="home_slide_enq_same" class="log" style="display: none;">
                                        <p>You cannot make enquiry on your own listing!!</p>
                                    </div>
                                    <form name="home_slide_enquiry_form" id="home_slide_enquiry_form" action="{{route('enquery')}}" method="POST"
                                          enctype="multipart/form-data">
                                       @csrf
                                     
                                           <input type="hidden" class="form-control"
                                               name="listing_id"
                                               value="0"
                                               placeholder=""
                                               required>
                                        <input type="hidden" class="form-control"
                                               name="enquiry_category"
                                               value="{{$id}}"
                                               placeholder=""
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
                                            <input type="text" name="enquiry_name" value="" required="required"
                                                   class="form-control"
                                                   placeholder="Enter name*">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                                   placeholder="Enter email*"
                                                   required="required" value=""
                                                   name="enquiry_email"
                                                   pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                                   title="Invalid email address">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="" name="enquiry_mobile"
                                                   placeholder="Enter mobile number *"
                                                   pattern="[7-9]{1}[0-9]{9}"
                                                   title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                                   required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="enquiry_message"
                                                      placeholder="Enter your query or message"></textarea>
                                        </div>
                                        <input type="hidden" id="source">
                                        <button type="submit" id="home_slide_enquiry_submit"
                                                name="home_slide_enquiry_submit"
                                                class="btn btn-primary">Submit Requirements                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="f2">
                            <div class="vfilter">
                                <i class="material-icons ic1 " title="Grid view">apps</i>
                                <i class="material-icons ic2 act" title="List view">format_list_bulleted</i>
                                <i class="material-icons ic3" title="Map view">location_on</i>
                            </div>
                        </div>
                        <!-- LISTING INN FILTER -->
                        <div class="list-filt-v2">
                            <ul>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="lfv2-all" class="lfv2-all" value="1" id="lfv2-all"
                                               checked="checked"/>
                                        <label for="lfv2-all">All</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="lfv2-pop" class="lfv2-pop" id="lfv2-pop"/>
                                        <label for="lfv2-pop">Popular</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="lfv2-op" class="lfv2-op" id="lfv2-op"/>
                                        <label for="lfv2-op">Open</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="lfv2-tru" class="lfv2-tru" id="lfv2-tru"/>
                                        <label for="lfv2-tru">Verified</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="lfv2-near" class="lfv2-near" id="lfv2-near"/>
                                        <label for="lfv2-near">Nearby</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="lfv2-off" class="lfv2-off" id="lfv2-off"/>
                                        <label for="lfv2-off">Offers</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- END LISTING INN FILTER -->
                                @php $ads=Ads(2); @endphp    
                                  @foreach($ads as $ad)
                                    <div class="ban-ati-com ads-all-list">
                                            <a href="{{$ad->ad_link}}">
                                            <span>Ad</span>
                                            <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                                            </a>
                                    </div>
                                    @endforeach
                        <!--ADS-->
                        <!-- Loader Image -->
                        <!-- <div id="loadingmessage" style="display:none">
                            <div id="loadingmessage1">&nbsp;</div>
                        </div> -->
                        <!-- Loader Image -->
                        <div class="all-list-sh all-listing-total">

                            <ul class="all-list-wrapper listing-total">
                                @foreach($listings as $listing)
                                        <li class="all-list-item">
                                            <div class="eve-box">
                                                <!---LISTING IMAGE--->
                                                <div class="al-img">
                                                          <span class="open-stat">Open</span>
                                                           <a href="{{route('all-listinged',['id'=>$listing->listing_id])}}">

                                                        <img
                                                            src="{{asset('/storage/file/'.$listing->profile_image)}}">
                                                    </a>

                                                </div>
                                                <!---END LISTING IMAGE--->

                                                <!---LISTING NAME--->
                                                <div class="list-con">
                                                    <h4>
                                                        <a href="{{route('all-listinged',['id'=>$listing->listing_id])}}">{{$listing->listing_name}}</a> <i class="li-veri"><img src="{{asset('')}}frontend/images/icon/svg/verified.png" title="Verified"></i>
                                                     </h4>
                                                    <div class="list-rat-all">
                                                        @php $total=0; $rats=sub('vv_reviews','listing_id',$listing->listing_id); @endphp
                                                        @foreach($rats as $rat)
                                                        @php $total=$total+$rat->price_rating; @endphp
                                                        @endforeach 
                                                        @if($total==0)
                                                        <span>No Reviews Yet</span>
                                                        @else
                                                        <b>{{sprintf("%02d",$total/count($rats))}}</b>
                                                        <label class="rat">
                                                            <?php for($i=(int)$total/count($rats); $i>0; $i--){?>
                                                            <i class="material-icons">star</i>
                                                            <?php } ?>
                                                        </label>
                                                        <span>{{count($rats)}} Reviews</span>
                                                        @endif 
                                                    </div>
                                                    <span class="addr">{{$listing->listing_address}}</span>
                                                    <span class="pho">{{$listing->listing_mobile}}</span>
                                                    <span class="mail">{{$listing->listing_email}}</span>

                                                    <div class="links">
                                                        <a href="{{$listing->listing_website}}">Website</a>
                                                        <a href="{{route('listing')}}l">view more</a>
                                                        <a href="Tel:{{$listing->listing_mobile}} ">Call Now</a>
                                                        <a href="https://wa.me/{{$listing->listing_whatsapp}}" class="what"
                                                           target="_blank">WhatsApp</a>
                                                    </div>

                                                </div>
                                                <!---END LISTING NAME--->

                                                <!---SAVE--->
                                            <span class="enq-sav" data-toggle="tooltip"
                                              title="Click to like this listing">
                                            <i class="l-like Animatedheartfunc{{$listing->listing_id}} "
                                               data-for="0"
                                               data-section="1"
                                               data-num="{{$listing->listing_id}}"
                                               data-item="{{session('user_id')}}"
                                               data-id='{{$listing->listing_id}}'><img
                                                    src="{{asset('')}}frontend/images/icon/svg/like.svg"></i></span>
                                                <!---END SAVE--->
                                            </div>
                                        </li>
                                       

                                        <!--  Get Quote Pop up box starts  -->
                                        <section>
                                            <div class="pop-ups pop-quo">
                                                <!-- The Modal -->
                                                <div class="modal fade" id="quote509">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="log-bor">&nbsp;</div>
                                                            <span
                                                                class="udb-inst">Send enquiry</span>
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            <!-- Modal Header -->
                                                            <div class="quote-pop">
                                                                <h4>Enquire Now</h4>
                                                                <div id="enq_success" class="log"
                                                                     style="display: none;">
                                                                    <p>Your Enquiry Is Submitted Successfully!!!</p>
                                                                </div>
                                                                <div id="enq_fail" class="log" style="display: none;">
                                                                    <p>Oops!! Something Went Wrong Try Later!!!</p>
                                                                </div>
                                                                <div id="enq_same" class="log" style="display: none;">
                                                                    <p>You cannot make enquiry on your own listing!!</p>
                                                                </div>
                                                                <form method="post" name="all_enquiry_form"
                                                                      id="all_enquiry_form">
                                                                    <input type="hidden" class="form-control"
                                                                           name="listing_id"
                                                                           value="509"
                                                                           placeholder=""
                                                                           required>
                                                                    <input type="hidden" class="form-control"
                                                                           name="listing_user_id"
                                                                           value="489"
                                                                           placeholder=""
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
                                                                        <input type="text" readonly name="enquiry_name"
                                                                               value=""
                                                                               required="required" class="form-control"
                                                                               placeholder="Enter name*">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control"
                                                                               placeholder="Enter email*"
                                                                               readonly="readonly"
                                                                               value=""
                                                                               name="enquiry_email"
                                                                               pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                                                               title="Invalid email address"
                                                                               required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                               readonly="readonly"
                                                                               value=""
                                                                               name="enquiry_mobile"
                                                                               placeholder="Enter mobile number *"
                                                                               pattern="[7-9]{1}[0-9]{9}"
                                                                               title="Phone number starting with 7-9 and remaining 9 digit with 0-9"
                                                                               required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <textarea class="form-control" rows="3"
                                                                                      name="enquiry_message"
                                                                                      placeholder="Enter your query or message"></textarea>
                                                                    </div>
                                                                    <input type="hidden" id="source">
                                                                    <button type="submit" id="all_enquiry_submit"
                                                                            name="enquiry_submit"
                                                                            class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </section>
                                        @endforeach
                                        <!--  Get Quote Pop up box ends  -->


                                                                        
                            </ul>

                            <!--ADS-->
                                @php $ads=Ads(3); @endphp    
                                  @foreach($ads as $ad)
                                    <div class="ban-ati-com ads-all-list">
                                            <a href="{{$ad->ad_link}}">
                                            <span>Ad</span>
                                            <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                                            </a>
                                    </div>
                                    @endforeach
                            <!--ADS-->
                            <div id="all-list-pagination-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="list-map">
                <span id="map-error-box" class="map-error-box"
                    style="display:none;">!!! Oops No Listing with the Selected Category</span>
                <div class="list-map-resu map-view" id="map-view"></div>
                <div class="list-map-filt">
                    <div class="map-fi-com map-fi-view">
                        <div class="vfilter">
                            <i class="material-icons ic-map-2" title="List view">format_list_bulleted</i>
                            <i class="material-icons ic-map-3 act" title="Map view">layers</i>
                        </div>
                    </div>
                        <div class="map-fi-com map-fi-cate">
                            <select onChange="SubcategoryFilter1(this.value);" name="cat_check" id="cat_check1"
                                    class="cat_check chosen-select ">
                                    <option value="">Select Category</option>
                                    <option value="photobooks">Photobooks</option>
                                    <option value="photostore">Photostore</option>
                                    <option selected value="sublimation">Sublimation </option>
                                    <option value="computers">Computers</option>
                                    <option value="academics">Academics</option>
                                    <option value="softwares">Softwares</option>
                                    <option value="assocaitions">Assocaitions</option>
                                    <option value="printers">printers</option>
                                    <option value="rentals">Rentals</option>
                                    <option value="graphic-designers">Graphic Designers </option>
                                    <option value="photographer">Photographer</option>
                            </select>
                        </div>
                        <div class="sub_cat_section1 map-fi-com map-fi-subcate">
                            <select name="sub_cat_check" id="sub_cat_check1" class="sub_cat_check">
                                <option value="">Select Sub Category</option>
                                    <option  value="87">Etc Sublimations</option>
                                    <option  value="86"> T shirt print</option>
                                    <option  value="85">Mug Print</option>
                            </select>
                        </div>
                     <div class="map-fi-com map-fi-fea">
                        <select id="feature_check1" name="feature_check">
                            <option value="">Select Feature</option>
                            <option value="trusted">Trusted services provider</option>
                            <option value="premium">Premium services</option>
                            <option value="verified">Verified services</option>
                            <option value="trending">Trending services</option>
                            <option value="offers">Offers and discounts</option>
                            <option value="latest">Latest updated</option>
                            <option value="likes">Most likes</option>
                        </select>
                    </div>
                </div>


            
        </div>
    </section>

    <!-- END -->

    <!-- START -->
    <section>
        <div class="list-foot">
            <div class="container sec-all-foot-cat-info">
                <div class="row">
                    <div class="list-foot-abo">
                        <div class="list-rat-all">
                            <h4>Overall rating</h4>
                            <b>0 Ratings</b>

                        </div>
                        <h2>{{name('vv_categories',$id)}} </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->

    @endsection
    @section('js')
<script src="{{asset('')}}frontend/js/listing_filter.js"></script>
<script>
 $(document).ready(function(){
     
     var filterCities = @json($cities->toArray());

     $("#cat_check").change(function(){

         var categoryId = $(this).val();
        //  window.alert(category);
         if(categoryId == ""){
             $("#sub_cat").html("");
         }

         $.ajax({
             url:"/get-listing/"+categoryId,
             type:"GET",
             success:function(data){
                
                 var sub_category = data.sub_category;
                 var html='';
                 for(let i =0;i<sub_category.length;i++){
                    html+=`<li> <div class="chbox"><input type="checkbox" class="sub_cat_check" name="sub_cat_check" value="`+sub_category[i]['sub_category_id']+`" id="Studio Photography Lights`+sub_category[i]['sub_category_id']+`"/><label for="Studio Photography Lights`+sub_category[i]['sub_category_id']+`">`+sub_category[i]['sub_category_name']+`</label></div></li>`;
                    
                 }
                 $("#sub_cat").html(html);
             }
         });
        //  window.alert(sub_category);
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
                    var html = "<option value=''>Select city</option>";

                    for(let i =0;i<child_category.length;i++){
                        html += `<option value="`+child_category[i]['country_id']+`">`+child_category[i]['country_name']+`</option>`;
                    }

                    $("#city").html(html);
                    $("#city").trigger("chosen:updated");
                }
            });

        });
        $("#city").change(function(){
            var city = $(this).val();
            window.location.replace("/city/"+city);
        });
    
    
});
</script>
   
   
@endsection