@extends('main.master')
@section('content')
    <!-- START -->
    <section class=" coup-sec">
        <!--<div class="coup-sec1">
            <img src="images/coupon-bg.png">
        </div>-->
        @if(session('user_C')!='true')
        <div class="plac-hom-ban coup-hom-ban">
            <div class="container">
                <div class="row">
                    <div class="plac-hom-ban-inn">
                        <h1>Coupon and Offers</h1>
                        <p>You can get best official brand coupons and Offers here.</p>
                        <div class="coup-sec-log">
                            <h4>Sign in to view your Coupon and Offers</h4>
                            <p>Get the latest and up-to-date coupons & cash back offers on some of India's top online Photography sites. Login to check your personalised coupons now.</p>
                            <a href="{{route('ui_login')}}">Sign in now</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="plac-hom-ban coup-hom-ban">
        <div class="container">
            <div class="row">
                <div class="plac-hom-ban-inn coup-sec2">
                    <h1>Coupon and Offers</h1>
                    <p>You can get best official brand coupons and deals here.</p>
                    <div class="plac-hom-search">
                     <span><input type="text" id="tail-se" placeholder="Search coupons"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
        <div class="container">
        <div class="row">
            <div class="col-md-3 fil-mob-view">
                <div class="all-filt mt-5">
                        <span class="fil-mob-clo"><i class="material-icons">close</i></span>

                        <!--START-->
                        <div class="filt-com lhs-cate">
                            <h4>Categories</h4>
                            <div class="dropdown">
                                <select  class="cat_check chosen-select" name="cat_check" id="cat_check">
                                    <option value="">Select Category</option>
                                    @foreach($category as $cat)
                                          <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                          @endforeach
                                     </select>
                            </div>
                        </div>
                        <!--END-->

                        <!--START-->
                        <div class="filt-com sub_cat_section pro-fil-sub">
                            <h4>Sub category</h4>
                            <ul id="sub_cat">
                            @foreach($sub as $sub_cat)
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" class="sub_cat_check" name="sub_cat_check"
                                                   value="{{$sub_cat->sub_category_id}}"
                                                   id="Large Format Printers{{$sub_cat->sub_category_id}}"/>
                                            <label
                                                for="Large Format Printers{{$sub_cat->sub_category_id}}">{{$sub_cat->sub_category_name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                                                </ul>
                        </div>
                        <!--END-->

                        <!--START-->
                        <div class="filt-com child_cat_section pro-fil-sub">
                            <h4>Child Category</h4>
                            <ul>
                            @foreach($child as $child_cat)
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" class="child_cat_check" name="child_cat_check"
                                                   value="{{$child_cat->child_category_id}}"
                                                   id="Art lense{{$child_cat->child_category_id}}"/>
                                            <label
                                                for="Art lense{{$child_cat->child_category_id}}">{{$child_cat->child_category_name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                
                                                                </ul>
                        </div>
                        <!--END-->
                        <!--START-->
                        <div class="filt-com brand_cat_section pro-fil-sub">
                            <h4>Brand</h4>
                            <ul>
                            @foreach($brand as $brands)
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" class="brand_check" name="brand_check"
                                                   value="{{$brands->brand_id}}"
                                                   id="Art brand{{$brands->brand_id}}"/>
                                            <label
                                                for="Art brand{{$brands->brand_id}}">{{$brands->brand_name}}</label>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                                                </ul>
                        </div>
                        <!--END-->

  

                    
                        <div class="filt-com lhs-ads">
                            <ul>
                            @php $ads=Ads(8); @endphp    
                                  @foreach($ads as $ad)
                                <li>
                                    <div class="ads-box">
                                        <a href="{{$ad->ad_link}}">
                                            <span>Ad</span>
                                            <img src="{{asset('/storage/file/'.$ad->ad_enquiry_photo)}}" alt="">
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--END-->
                    </div>
            </div>
            <div class="col-md-9">
                
            
                <div class="coup-sec3 all-coupon-total">
                    <ul id="tail-re" class="coupon-total">
                       @foreach($coupons as $coupon)
                            <li>
                                <div class="coup-box" style="height: 250px;">
                                    <div class="coup-box-1">
                                        <div class="s1" style="margin-bottom: 0;">
                                            <!-- <div class="lhs"> -->
                                            <div class="">
                                                <img src="{{asset('/storage/file/'.$coupon->coupon_photo)}}" style="width: 212px; height: 85px;">
                                            </div>
                                            <!-- <div class="rhs"> -->
                                            <div class="">
                                                <h4 style="text-align: center; padding-top: 10px; font-size: 16px">{{$coupon->coupon_name}}</h4>
                                            </div>
                                        </div>
                                        <div class="s2">
                                            <div class="lhs">
                                                <span>Expires</span>
                                                <h6>{{dateFormatConverter($coupon->coupon_end_date)}}</h6>
                                                <a href="{{route('terms')}}" target="_blank">Terms & Conditions Apply</a>
                                            </div>
                                            <div class="rhs">
                                            <span  data-id="{{$coupon->coupon_id}}"
                                                  class="get-coup-btn get-coup-act">Get coupon</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coup-box-2">
                                        <h4>Congratulations!</h4>
                                        <p>Here the code for <b>{{$coupon->coupon_name}}</b></p>
                                        <i>{{$coupon->coupon_code}}</i>
                                                                                    <a target="_blank"
                                               href="{{$coupon->coupon_link}}/">Website</a>
                                                                                    <span class="coup-back">Back</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @endif
            <!-- </div>
        </div>
    </div> -->
    </section>
    <!--END-->
@endsection
@section('js')
<script src="{{asset('')}}frontend/js/coupon_filter.js"></script>
   <script>
 $(document).ready(function(){
     
     $("#cat_check").change(function(){

         var categoryId = $(this).val();
        //  window.alert(category);
         if(categoryId == ""){
             $("#sub_cat").html("");
         }

         $.ajax({
             url:"/get-planscoupon/"+categoryId,
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
    });
   
    </script>
<script>
    $(document).ready(function () {
        $(".get-coup-act").click(function () {
            $(this).parent().parent().parent().parent().addClass("act");
          
            var coupon_id = $(this).attr("data-id");
            
            $.ajax({
                type: 'GET',
                url: '/coupon_view_process/'+coupon_id,
                cache: false,
                success: function (response) {
                    return true;

                } 
            });
            

        });
        $(".coup-back").click(function () {
            $(this).parent().parent().removeClass("act");
        });
        $("#tail-se").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#tail-re li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@endsection
    <!-- START -->
  