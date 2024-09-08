/**
 * Created by Vignesh on 10/12/2019.
 */




// $("input[type='checkbox'], input[type='radio']").on( "click", listingFilter() );
// $("select").on( "change", listingFilter() );


$(".state_check, .city_check, .sub_cat_check ,.rating_check, .feature_check, .lfv2-all, .lfv2-pop, .lfv2-op, .lfv2-tru, .lfv2-near, .lfv2-off").on( "click", listingFilter );
$("select").on( "change", listingFilter );


function listingFilter() {

    $(".all-listing-total").css("opacity",0);


    var mainarray = [];

    var size = [];
    $('input[name="scheck"]:checked').each(function(){
        size.push($(this).val());
        $('.spansizecls').css('visibility','visible');
    });
    if(size=='') $('.spansizecls').css('visibility','hidden');
    var size_checklist = "&scheck="+size;

    //To get Category values from All listing page starts

    var cat_check = [];
    $('#cat_check :selected').each(function(){
        // $('input[name="cat_check"]:checked').each(function(){
        cat_check.push($(this).val());
    });

    var cat_checklist = "&cat_check="+cat_check;

    //To get Category values from All listing page ends


   //To get Sub category values from All listing page starts

    var sub_cat_check = [];
    $('input[name="sub_cat_check"]:checked').each(function(){
        sub_cat_check.push($(this).val());

    });

    var sub_cat_checklist = "&sub_cat_check="+sub_cat_check;

    //To get Sub category values from All listing page ends

    //To get Feature values from All listing page starts

    var feature_check = [];
    $('input[name="feature_check"]:checked').each(function(){
        feature_check.push($(this).val());

    });

    var feature_checklist = "&feature_check="+feature_check;

    //To get Feature values from All listing page ends

    var state_check = [];
    $('#state_check :selected').each(function(){
        // $('input[name="cat_check"]:checked').each(function(){
        state_check.push($(this).val());
    });
    var state_checklist = "&state_check="+state_check;

    var city_check = [];
    $('#city_check :selected').each(function(){
        // $('input[name="cat_check"]:checked').each(function(){
        city_check.push($(this).val());
    });
    var city_checklist = "&city_check="+city_check;

    //To get Rating values from All listing page starts

    var rating_check = [];
    $('input[name="rating_check"]:checked').each(function(){
        rating_check.push($(this).val());
    });
    var rating_checklist = "&rating_check="+rating_check;

    //To get Rating values from All listing page ends

    //Top Filter All Option from All listing page starts

    var lfv2_all_check = [];
    $('input[name="lfv2-all"]:checked').each(function(){

        lfv2_all_check.push($(this).val());

    });

    var lfv2_all_checklist = "&lfv2_all_check="+lfv2_all_check;

    //Top Filter All Option from All listing page ends

    //Top Filter Popular Option from All listing page starts

    var lfv2_pop_check = [];
    $('input[name="lfv2-pop"]:checked').each(function(){
        lfv2_pop_check.push($(this).val());

    });

    var lfv2_pop_checklist = "&lfv2_pop_check="+lfv2_pop_check;

    //Top Filter Popular Option from All listing page ends

    //Top Filter Open Option from All listing page starts

    var lfv2_op_check = [];
    $('input[name="lfv2-op"]:checked').each(function(){
        lfv2_op_check.push($(this).val());

    });

    var lfv2_op_checklist = "&lfv2_op_check="+lfv2_op_check;

    //Top Filter Open Option from All listing page ends

    //Top Filter Trusted Option from All listing page starts

    var lfv2_tru_check = [];
    $('input[name="lfv2-tru"]:checked').each(function(){
        lfv2_tru_check.push($(this).val());

    });

    var lfv2_tru_checklist = "&lfv2_tru_check="+lfv2_tru_check;

    //Top Filter Trusted Option from All listing page ends

    //Top Filter NearBy Option from All listing page starts

    var lfv2_near_check = [];
    $('input[name="lfv2-near"]:checked').each(function(){
        lfv2_near_check.push($(this).val());

    });

    var lfv2_near_checklist = "&lfv2_near_check="+lfv2_near_check;

    //Top Filter NearBy Option from All listing page ends

    //Top Filter Offer Option from All listing page starts

    var lfv2_offer_check = [];
    $('input[name="lfv2-off"]:checked').each(function(){
        lfv2_offer_check.push($(this).val());

    });

    var lfv2_offer_checklist = "&lfv2_offer_check="+lfv2_offer_check;

    //Top Filter Offer Option from All listing page ends


    var main_string = size_checklist+cat_checklist+sub_cat_checklist+rating_checklist+state_checklist+city_checklist
                      +feature_checklist+lfv2_all_checklist +lfv2_pop_checklist +lfv2_op_checklist
                      +lfv2_tru_checklist+lfv2_near_checklist +lfv2_offer_checklist;

    main_string = main_string.substring(1, main_string.length);
    $('#loadingmessage').show();  // show the loading message.

    if(webpage_full_link != null){
        var link = webpage_full_link +'filter_listing.php';
    }else{
        var link = 'filter_listing.php';
    }
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $.ajax({
        type: "POST",
        url: '/listing_filter',
        data: main_string ,
        cache: false,
        success: function(data){
            var html='';
            if(data==null){
                $(".loadingmessage").css("opacity", 1);
            }
            else{
            var listing=data.listing;
            for(let i =0;i<listing.length;i++){
                html+=`<li class="all-list-item"><div class="eve-box"><div class="al-img"><span class="open-stat">Open</span><a href="all-listings/`+listing[i]['listing_id']+`"><img src="http://`+$(location).attr('host')+`/storage/file/`+listing[i]['profile_image']+`"></a></div><div class="list-con"><h4><a href="all-listings/`+listing[i]['listing_id']+`">`+listing[i]['listing_name']+`</a> <i class="li-veri"><img src="http://`+$(location).attr('host')+`frontend/images/icon/svg/verified.png" title="Verified"></i></h4><div class="list-rat-all"><span>No Reviews Yet</span></div><span class="addr">`+listing[i]['listing_address']+`</span><span class="pho">`+listing[i]['listing_mobile']+`</span><span class="mail">`+listing[i]['listing_email']+`</span> <div class="links"> <a href="`+listing[i]['listing_website']+`">Get quote</a> <a href="{{route('listing')}}l">view more</a><a href="Tel:`+listing[i]['listing_mobile']+`">Call Now</a><a href="https://wa.me/`+listing[i]['listing_whatsapp']+`" class="what" target="_blank">WhatsApp</a></div> </div><span class="enq-sav" data-toggle="tooltip"title="Click to like this listing"><i class="l-like Animatedheartfunc509 "data-for="0"data-section="1"data-num="`+listing[i]['listing_id']+`"data-item=""data-id='`+listing[i]['listing_id']+`'><img src="http://`+$(location).attr('host')+`frontend/images/icon/svg/like.svg"></i></span></div></li><section><div class="pop-ups pop-quo"><div class="modal fade" id="quote79"><div class="modal-dialog"><div class="modal-content"><div class="log-bor">&nbsp;</div><span class="udb-inst">Send enquiry</span><button type="button" class="close" data-dismiss="modal">&times;</button><div class="quote-pop"><h4>Get quote</h4><div id="enq_success" class="log"style="display: none;"><p>Your Enquiry Is Submitted Successfully!!!</p></div><div id="enq_fail" class="log" style="display: none;"><p>Oops!! Something Went Wrong Try Later!!!</p></div><div id="enq_same" class="log" style="display: none;"><p>You cannot make enquiry on your own product!!</p></div><form method="post" name="all_product_enquiry_form"class="all_product_enquiry_form"><input type="hidden" class="form-control" name="product_id"value="79"placeholder=""required><input type="hidden" class="form-control"name="product_user_id"value="494" placeholder=""required><input type="hidden" class="form-control"name="enquiry_sender_id"value=""placeholder=""required><input type="hidden" class="form-control"name="enquiry_source"value="Website"placeholder=""required><div class="form-group"><input type="text"name="enquiry_name"value=""required="required"class="form-control"placeholder="Entername*"></div><div class="form-group"><input type="email"class="form-control"placeholder="Enteremail*"value=""name="enquiry_email"pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"title="Invalidemailaddress"required></div><div class="form-group"><input type="text"class="form-control"value=""name="enquiry_mobile"placeholder="Entermobilenumber*"pattern="[7-9]{1}[0-9]{9}"title="Phonenumberstartingwith7-9andremaining9digitwith0-9"required></div><div class="form-group"><textarea class="form-control"rows="3"name="enquiry_message"placeholder="Enteryourqueryormessage"></textarea></div><input type="hidden"id="source"><button type="submit"id="all_product_enquiry_submit"name="enquiry_submit"class="all_product_enquiry_submitbtnbtn-primary">Submit</button></form></div></div></div></div></div></section>`;  
            };
            if(html==''){
                html+=`<span style="    font-size: 21px;color: #bfbfbf;letter-spacing: 1px;text-shadow: 0px 0px 2px #fff;text-transform: uppercase;margin-top: 5%;">!!! Oops No Listing with the Selected Category</span>`;
            }
            $(".listing-total").html(html);
            //$("#loadingmessage").css("opacity", 0)
            $(".all-listing-total").css("opacity",1);
            // $("#loadingmessage1").css("opacity",0);
            // products_paginate();
        }
         
        }
    });


}




