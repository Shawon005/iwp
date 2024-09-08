$(".city_check, .sub_cat_check, .child_cat_check, .brand_check ,.discount_check, .price_check").on( "click", couponFilter );
$("select").on( "change", couponFilter );


function couponFilter() {

    $(".all-coupon-total").css("opacity",0);


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
    $('input[name="city_check"]:checked').each(function(){
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
        var link = webpage_full_link +'filter_coupon.php';
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
        url: '/coupon_filter',
        data: main_string ,
        cache: false,
        success: function(date){
           // alert(date);
            var html='';
            var coupon=date.coupon;
            for(let i =0;i<coupon.length;i++){
                html+=`<li><div class="coup-box" style="height: 250px;"><div class="coup-box-1"><div class="s1" style="margin-bottom: 0;"><div class=""><img src="http://`+$(location).attr('host')+`/storage/file/`+coupon[i]['coupon_photo']+`" style="width: 212px; height: 85px;"></div><div class=""><h4 style="text-align: center; padding-top: 10px; font-size: 16px">`+coupon[i]['coupon_name']+`</h4></div></div><div class="s2"><div class="lhs"><span>Expires</span><h6> `+coupon[i]['coupon_end_date']+` </h6><a href="/terms" target="_blank">Terms & Conditions Apply</a></div><div class="rhs"><span data-id="`+coupon[i]['coupon_id']+`" class="get-coup-btn get-coup-act">Get coupon</span></div> </div> </div><div class="coup-box-2"><h4>Congratulations!</h4> <p>Here the code for <b>`+coupon[i]['coupon_name']+`</b></p><i>`+coupon[i]['coupon_code']+`</i><a target="_blank"href="`+coupon[i]['coupon_link']+`/">Website</a> <span class="coup-back">Back</span> </div></div></li>`;  
            };
            if(html==''){
                html+=`<span style="    font-size: 21px;color: #bfbfbf;letter-spacing: 1px;text-shadow: 0px 0px 2px #fff;text-transform: uppercase;margin-top: 5%;">!!! Oops No Coupon with the Selected Category</span>`;
            }
            $(".coupon-total").html(html);
            $(".all-coupon-total").css("opacity",1);
            // $("#loaderID").css("opacity",0);
           
        }
    });


}

