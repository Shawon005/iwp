/**
 * Created by Vignesh on 10/06/2021.
 */

// <!--    Listing Filter Script Starts-->


// $("input[type='checkbox'], input[type='radio']").on( "click", productFilter() );
// $("select").on( "change", productFilter() );


$(".city_check, .sub_cat_check, .child_cat_check, .brand_check ,.discount_check, .price_check").on( "click", productFilter );
$("select").on( "change", productFilter );


function productFilter() {
    
    $(".all-product-total").css("opacity",0);

    $type='Externel';
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

    // child category
    var child_cat_check = [];
    $('input[name="child_cat_check"]:checked').each(function(){
        child_cat_check.push($(this).val());

    });

    var child_cat_checklist = "&child_cat_check="+child_cat_check;

    // brand
    var brand_check = [];
    $('input[name="brand_check"]:checked').each(function(){
        brand_check.push($(this).val());

    });

    var brand_checklist = "&brand_check="+brand_check;

    //To get Sub category values from All listing page ends

    //To get Feature values from All listing page starts

    var price_check = [];
    $('input[name="price_check"]:checked').each(function(){
        price_check.push($(this).val());

    });

    var price_checklist = "&price_check="+price_check;

    //To get Feature values from All listing page ends

    var city_check = [];
    $('input[name="type"]').each(function(){
        city_check.push($(this).val());

    });
    var city_checklist = "&city_check="+city_check;


    //To get Rating values from All listing page starts

    var discount_check = [];
    $('input[name="discount_check"]:checked').each(function(){
        discount_check.push($(this).val());
    });
    var discount_checklist = "&discount_check="+discount_check;

    //To get Rating values from All listing page ends


    var main_string = size_checklist+cat_checklist+sub_cat_checklist+child_cat_checklist+brand_checklist+discount_checklist+city_checklist+price_checklist;
    main_string = main_string.substring(1, main_string.length);


    if(webpage_full_link != null){
        var link = webpage_full_link +'filter_product.php';
    }else{
        var link = 'filter_product.php';
    }
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $.ajax({
        
        type: "POST",
        url: '/product_filter',
        data: main_string ,
        cache: false,
        success: function(data){
            //alert(html);
            var html='';
            var product=data.product;
            var user = data.user;
            for(let i =0;i<product.length;i++){
                html +=`<li class="products-item"><div class="all-pro-box"><div class="all-pro-img"><img src="http://`+$(location).attr('host')+`/storage/file/`+product[i]['gallery_image']+`"></div><div class="all-pro-aut"><div class="auth"><img src="http://`+$(location).attr('host')+`storage/file/`+product[i]['service_image']+`" alt=""><a target="_blank" href="/profile/`+product[i]['user_id']+`" class="fclick"></a></div></div><div class="all-pro-txt"><div class="ud-lhs-s1 ud-products"><img src="/storage/file/`+product[i]['user_id']['profile_image']+`" alt=""><span>`+product[i]['user_id']+`</span><a href="/profile/`+product[i]['user_id']+`" target="_blank" class="fclick">&nbsp;</a></div><h4>`+user['name']+`</h4><span class="pri"><b class="pro-off">Rs: `+product[i]['product_price_offer']+`</b></span><span class="strike-price">Rs: `+product[i]['product_price']+`</span><div class="links"><a href="login.html">Get quote</a></div></div><a href="/products/`+product[i]['product_id']+`" class="pro-view-full"></a></div></li><section><div class="pop-ups pop-quo"><div class="modal fade" id="quote79"><div class="modal-dialog"><div class="modal-content"><div class="log-bor">&nbsp;</div><span class="udb-inst">Send enquiry</span><button type="button" class="close" data-dismiss="modal">&times;</button><div class="quote-pop"><h4>Get quote</h4><div id="enq_success" class="log"style="display: none;"><p>Your Enquiry Is Submitted Successfully!!!</p></div><div id="enq_fail" class="log" style="display: none;"><p>Oops!! Something Went Wrong Try Later!!!</p></div><div id="enq_same" class="log" style="display: none;"><p>You cannot make enquiry on your own product!!</p></div><form method="post" name="all_product_enquiry_form"class="all_product_enquiry_form"><input type="hidden" class="form-control" name="product_id"value="79"placeholder=""required><input type="hidden" class="form-control"name="product_user_id"value="494" placeholder=""required><input type="hidden" class="form-control"name="enquiry_sender_id"value=""placeholder=""required><input type="hidden" class="form-control"name="enquiry_source"value="Website"placeholder=""required><div class="form-group"><input type="text"name="enquiry_name"value=""required="required"class="form-control"placeholder="Entername*"></div><div class="form-group"><input type="email"class="form-control"placeholder="Enteremail*"value=""name="enquiry_email"pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"title="Invalidemailaddress"required></div><div class="form-group"><input type="text"class="form-control"value=""name="enquiry_mobile"placeholder="Entermobilenumber*"pattern="[7-9]{1}[0-9]{9}"title="Phonenumberstartingwith7-9andremaining9digitwith0-9"required></div><div class="form-group"><textarea class="form-control"rows="3"name="enquiry_message"placeholder="Enteryourqueryormessage"></textarea></div><input type="hidden"id="source"><button type="submit"id="all_product_enquiry_submit"name="enquiry_submit"class="all_product_enquiry_submitbtnbtn-primary">Submit</button></form></div></div></div></div></div></section>`
                }
                if(html==''){
                    html+=`<span style="    font-size: 21px;color: #bfbfbf;letter-spacing: 1px;text-shadow: 0px 0px 2px #fff;text-transform: uppercase;margin-top: 5%;">!!! Oops No Product with the Selected Category</span>`;
                }
                $("#product_total").html(html);
            
           // $(".all-product-total").html(html);
            $(".all-product-total").css("opacity",1);
            // $("#loaderID").css("opacity",0);
            products_paginate();
        }
    });


}

// <!--    Listing Page Filter Script Ends-->


