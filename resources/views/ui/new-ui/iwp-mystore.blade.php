
    <!-- END -->
    @extends('main.master')
@section('content')
    <!-- START -->
    <section>
        <div class="all-list-bre all-pro-bre">
            <div class="container sec-all-list-bre">
                <div class="row">
                                        <h1>All Photography products</h1>
                                        <ul>
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('all-products')}}">All Category</a></li>
                                        </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
    
    <!-- START -->
    <section>
        <div class="all-listing all-products">
            <!--FILTER ON MOBILE VIEW-->
            <div class="fil-mob fil-mob-act">
                <h4>Product filters <i class="material-icons">filter_list</i></h4>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <div class="all-filt">
                            <span class="fil-mob-clo"><i class="material-icons">close</i></span>

                            <!--START-->
                            <div class="filt-com lhs-cate">
                                <h4>Categories</h4>
                                <div class="dropdown">
                                    <select onChange="ProductSubcategoryFilter(this.value);" class="cat_check chosen-select" name="cat_check" id="cat_check">
                                        <option value="">Select Category</option>
                                          @foreach($category as $cat)
                                          <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                          @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--END-->
                            <input type="hidden" id="type" name="type" value="Internal">
                            <!--START-->
                            <div class="filt-com sub_cat_section pro-fil-sub">
                                <h4>Sub category</h4>
                                <ul>
                                    @foreach($sub as $sub_cat)
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" class="sub_cat_check" name="sub_cat_check"
                                                   value="{{$sub_cat->sub_category_id}}"
                                                   id="Studio Photography Lights{{$sub_cat->sub_category_id}}"/>
                                            <label
                                                for="Studio Photography Lights{{$sub_cat->sub_category_id}}">{{$sub_cat->sub_category_name}}</label>
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
                            <div class="filt-com pro-fil-pri">
                                <h4>Price</h4>
                                <ul>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="price_check"
                                                   value="10000"
                                                   class="price_check"
                                                   id="price_check5"/>
                                            <label
                                                for="price_check5">Above Rs: 100000</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="price_check"
                                                   value="1000"
                                                   class="price_check"
                                                   id="price_check4"/>
                                            <label
                                                for="price_check4">Rs: 5001 - Rs: 10000</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="price_check"
                                                   value="500"
                                                   class="price_check"
                                                   id="price_check3"/>
                                            <label
                                                for="price_check3">Rs: 2500 - Rs: 5000</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="price_check"
                                                   value="250"
                                                   class="price_check"
                                                   id="price_check2"/>
                                            <label
                                                for="price_check2">Rs: 1000 - Rs: 2500</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="price_check"
                                                   value="100"
                                                   class="price_check"
                                                   id="price_check1"/>
                                            <label
                                                for="price_check1">Below Rs: 1000</label>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                            <!--END-->

                            <div class="filt-com pro-fil-dis">
                                <h4>Discounts</h4>
                                <ul>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="discount_check"
                                                   value="100"
                                                   class="discount_check"
                                                   id="discount_check5"/>
                                            <label
                                                for="discount_check5">Above 70%</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="discount_check"
                                                   value="70"
                                                   class="discount_check"
                                                   id="discount_check4"/>
                                            <label
                                                for="discount_check4">51% - 70%</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="discount_check"
                                                   value="50"
                                                   class="discount_check"
                                                   id="discount_check3"/>
                                            <label
                                                for="discount_check3">26% - 50%</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="discount_check"
                                                   value="25"
                                                   class="discount_check"
                                                   id="discount_check2"/>
                                            <label
                                                for="discount_check2">11% - 25%</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="discount_check"
                                                   value="10"
                                                   class="discount_check"
                                                   id="discount_check1"/>
                                            <label
                                                for="discount_check1">Below 10%</label>
                                        </div>
                                    </li>


                                </ul>
                            </div>


                            <!--START-->
                            <div class="filt-com lhs-ads">
                                <ul>
                                @php $ads=Ads(2); @endphp
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
                                        @php $ads=Ads(3); @endphp
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
                        <div class="all-list-sh all-product-total">
                            <ul class="products-wrapper" id="product_total">
                                @foreach($products as $product)
                                <li class="products-item">
                                    <div class="all-pro-box">
                                        <div class="all-pro-img">
                                            <img src="{{asset('/storage/file/'.$product->gallery_image)}}">
                                        </div>
                                        <div class="all-pro-aut">
                                            <div class="auth">
                                                                                                        <img
                                                        src="{{asset('/storage/file/'.$product->service_image)}}" alt="">
                                                    <a target="_blank"
                                                       href="profile/abhimanyu.html"
                                                       class="fclick"></a>
                                                                                                    </div>
                                        </div>
                                        <div class="all-pro-txt">
                                            <h4>{{$product->product_name}}</h4>
                                            
                                                                                                <span class="pri"><b class="pro-off">Rs: {{$product->product_price_offer}}</b></span>
                                            <span class="strike-price">Rs: {{$product->product_price}}</span>
                                                @if(session('user_C')=='true')                          
                                                <div class="clearfix" style="width: 100%;">
                                                    <p class="all-pro-txt-hints">Wallet Cash used for this: {{$product->discount_val}}{{($product->discount_type=='percentage')? '%':' coins'}}</p>
                                                    <p class="all-pro-txt-walletcash">Rs.{{$product->wallet_cashback}} Cashback from Fototech</p>
                                                </div>
                                                @endif 
                                                @if(session('user_C')!='true') 
                                                <div class="links">
                                                    <a href="login.html">Get quote</a>
                                                </div>
                                                @endif
                                        </div>
                                        <a href="{{route('product/details',['id'=>$product->product_id])}}" class="pro-view-full"></a>
                                    </div>
                                </li>

                                <!--  Get Quote Pop up box starts  -->
                                <section>
                                    <div class="pop-ups pop-quo">
                                        <!-- The Modal -->
                                        <div class="modal fade" id="quote79">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="log-bor">&nbsp;</div>
                                                    <span class="udb-inst">Send enquiry</span>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <!-- Modal Header -->
                                                    <div class="quote-pop">
                                                        <h4>Get quote</h4>
                                                        <div id="enq_success" class="log"
                                                             style="display: none;">
                                                            <p>Your Enquiry Is Submitted Successfully!!!</p>
                                                        </div>
                                                        <div id="enq_fail" class="log" style="display: none;">
                                                            <p>Oops!! Something Went Wrong Try Later!!!</p>
                                                        </div>
                                                        <div id="enq_same" class="log" style="display: none;">
                                                            <p>You cannot make enquiry on your own product!!</p>
                                                        </div>
                                                        <form method="post" name="all_product_enquiry_form"
                                                              class="all_product_enquiry_form">
                                                            <input type="hidden" class="form-control"
                                                                   name="product_id"
                                                                   value="79"
                                                                   placeholder=""
                                                                   required>
                                                            <input type="hidden" class="form-control"
                                                                   name="product_user_id"
                                                                   value="494"
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
                                                                <input type="text"  name="enquiry_name"
                                                                       value=""
                                                                       required="required" class="form-control"
                                                                       placeholder="Enter name*">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" class="form-control"
                                                                       placeholder="Enter email*"
                                                                       value=""
                                                                       name="enquiry_email"
                                                                       pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                                                       title="Invalid email address" required>
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
                                                                    <textarea class="form-control" rows="3"
                                                                              name="enquiry_message"
                                                                              placeholder="Enter your query or message"></textarea>
                                                            </div>
                                                            <input type="hidden" id="source">
                                                            <button type="submit" id="all_product_enquiry_submit"
                                                                    name="enquiry_submit"
                                                                    class="all_product_enquiry_submit btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!--  Get Quote Pop up box ends  -->
                                @endforeach
                                <!--  Get Quote Pop up box ends  -->     
                            </ul>
                            <div id="product-pagination-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
    <!-- START -->
@section('js')
<script src="{{asset('')}}frontend/js/product_filter.js"></script>
    <script>

        var items = $(".products-wrapper .products-item");
        var numItems = items.length;
        var perPage = 20;

        items.slice(perPage).hide();

        $('#product-pagination-container').pagination({
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
    </script>
    <script>
            $('.qvvPROD079').on('click', function () {
            $('.list-qviewPROD079').addClass('qview-show');
        });
        $('.list-qviewPROD079').on('mouseleave', function () {
            $('.list-qviewPROD079').removeClass('qview-show');
        });
            $('.qvvPROD078').on('click', function () {
            $('.list-qviewPROD078').addClass('qview-show');
        });
        $('.list-qviewPROD078').on('mouseleave', function () {
            $('.list-qviewPROD078').removeClass('qview-show');
        });
            $('.qvvPROD077').on('click', function () {
            $('.list-qviewPROD077').addClass('qview-show');
        });
        $('.list-qviewPROD077').on('mouseleave', function () {
            $('.list-qviewPROD077').removeClass('qview-show');
        });
            $('.qvvPROD075').on('click', function () {
            $('.list-qviewPROD075').addClass('qview-show');
        });
        $('.list-qviewPROD075').on('mouseleave', function () {
            $('.list-qviewPROD075').removeClass('qview-show');
        });
            $('.qvvPROD074').on('click', function () {
            $('.list-qviewPROD074').addClass('qview-show');
        });
        $('.list-qviewPROD074').on('mouseleave', function () {
            $('.list-qviewPROD074').removeClass('qview-show');
        });
            $('.qvvPROD073').on('click', function () {
            $('.list-qviewPROD073').addClass('qview-show');
        });
        $('.list-qviewPROD073').on('mouseleave', function () {
            $('.list-qviewPROD073').removeClass('qview-show');
        });
            $('.qvvPROD072').on('click', function () {
            $('.list-qviewPROD072').addClass('qview-show');
        });
        $('.list-qviewPROD072').on('mouseleave', function () {
            $('.list-qviewPROD072').removeClass('qview-show');
        });
        </script>
    <script>
        function ProductSubcategoryFilter(val) {
            // alert(val);
            // $(".sub_cat_section").remove();
            Productbreadcrumbs(val);                        //Function call to change breadcrumb
            $(".sub_cat_section").css("opacity", 0);
            $.ajax({
                url:"/getSubCatByCatId/"+val,
                 type:"GET",
                success: function (data) {
                    if (data == null) {
                        $(".sub_cat_section").remove();
                    } else {
                        var sub_category = data.sub_category;
                    var html='';
                    for(let i =0;i<sub_category.length;i++){
                        html+=`<li> <div class="chbox"><input type="checkbox" class="sub_cat_check" name="sub_cat_check" value="`+sub_category[i]['sub_category_id']+`" id="Studio Photography Lights`+sub_category[i]['sub_category_id']+`"/><label for="Studio Photography Lights`+sub_category[i]['sub_category_id']+`">`+sub_category[i]['sub_category_name']+`</label></div></li>`;
                         }
                        $(".sub_cat_section").html(html);
                        $(".sub_cat_section").css("opacity", 1);
                    }

                }
            });
        }

        function ProductChildcategoryFilter(val) {
            // alert(val);
            Productbreadcrumbs(val);
            $(".child_cat_section").css("opacity", 0);
            $.ajax({
                type: "POST",
                url: "http://iwpdirectory.in/product_child_category_filter.php",
                data: 'sub_category_id=' + val,
                success: function (data) {
                    if (data == null) {
                        $(".child_cat_section").remove();
                    } else {
                        $(".child_cat_section").html(data);
                        $(".child_cat_section").css("opacity", 1);
                    }

                }
            });
        }
    </script>
    <script>
        function Productbreadcrumbs(val) {
            $(".sec-all-list-bre").css("opacity", 0);
            $.ajax({
                type: "POST",
                url: "http://iwpdirectory.in/product_category_filter_breadcrumb.php",
                data: 'category_id=' + val,
                success: function (data) {
                    if (data == null) {
                        $(".sec-all-list-bre").css("opacity", 1);
                    } else {
                        $(".sec-all-list-bre").html(data);
                        $(".sec-all-list-bre").css("opacity", 1);
                    }

                }
            });
        }
    </script>
@endsection    