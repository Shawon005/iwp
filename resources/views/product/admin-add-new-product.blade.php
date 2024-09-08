
@extends('layout.master')
@section('content')  
    <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Products</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active">Add Product</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Add New Product</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('product_store')}}"method="post"enctype="multipart/form-data">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <!-- <label>Type:</label> -->
                          <div class="m-checkbox-inline">
                            <label for="edo-ani">
                              <input class="radio_animated" id="internal" type="radio" name="product_type" onclick="hide()" value="Internal">Internal
                            </label>
                            <label for="edo-ani1">
                              <input class="radio_animated" id="external" type="radio" name="product_type" onclick="show()"style="margin-left: 24rem;"value="External">External
                            </label>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User Name</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="user_id">
                            @foreach($user as $Nuser):
                                <option value="{{$Nuser->user_id}}" >{{$Nuser->first_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="product_name">Product Name</label>
                          <input class="form-control" id="product_name" type="text" name="product_name" placeholder="Product Name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('product_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                              @foreach($category as $user):
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Sub Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="sub_category_id[]" id="sub_category_id">
                              <option value="">Select Sub Category</option>
                              @foreach($sub_category as $user):
                                <option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Child Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="child_category_id[]"id="child_category_id">
                              <option value="">Select Child Category</option>
                              @foreach($child_category as $user):
                                <option value="{{$user->child_category_id}}" >{{$user->child_category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Brand</label>
                          <select class="js-example-basic-single col-sm-12"name="brand_id"id="">
                            <optgroup label="">
                              <option value="">Select Brand</option>
                              @foreach($brand as $user):
                                <option value="{{$user->brand_id}}" >{{$user->brand_name}}</option>
                                 @endforeach
                            </optgroup>
                          </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Frequently Purchased Products</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="frequents_id[]" id="frequents_id">
                              <option value="">Select Products</option>
                              @foreach($products as $product):
                                <option value="{{$product->product_id}}" >{{$product->product_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="price">Price</label>
                          <input class="form-control" id="price" type="number" name="price" placeholder="Price" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="offer">Offer</label>
                          <input class="form-control" id="offer" type="number" name="offer" placeholder="Offer (i.e) 50" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3"id="Ex_payment">
                          <label>Product Payment External Link</label>
                          <textarea class="form-control"  rows="3"name="product_payment_link"></textarea>
                        </div>
                        <div class="mb-3">
                          <label>Product Details</label>
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="product_details"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="product_images">Product Images(max 5 images)</label>
                          <input class="form-control" id="product_images" type="file" name="product_images[]" multiple="multiple" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div id="wallet_coins">
                        <div class="mb-3" >
                          <h4>Wallet Coins Usage</h4>
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                       
                        <div class="mb-3" >
                          <label for="discount_type">Discount Type</label>
                          <select class="js-example-basic-single col-sm-12" name="discount_type" id="discount_type">
                            <optgroup label="">
                              <option value="percentage">Percentage</option>
                              <option value="coins">Fix Amount</option>
                            </optgroup>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3" >
                          <label for="amount">Amount</label>
                          <input class="form-control" id="discount_val" type="number" name="discount_val" placeholder="Enter Amount" >
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3" >
                          <label for="wallet_cashback">Wallet Cashback</label>
                          <input class="form-control" id="wallet_cash" type="number" name="wallet_cashback" placeholder="Wallet Cashback" >
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        </div> 
                        <div class="mb-3">
                          <h4 class="text-center">Highlights</h4>
                          <div class=" text-end">
                              <div class="btn btn-primary prod-add-oad1"><span>+</span></div>
                              <div class="btn btn-info prod-add-ore1"><span>-</span></div>
                          </div>
                        </div>
                        <div class="highlight">
                            <ul>
                              <li>
                                <div class=mb-3>
                                <input class="form-control " id="" type="text" name="highlight[]" placeholder="(i.e) 1 year onsite warranty" >
                                </div>
                              </li>
                            </ul>
                        </div>  
                        <div class="mb-3">
                          <h4 class="text-center">Specifications</h4>
                          <div class="valid-feedback">Looks good!</div>
                          <div class=" text-end">
                              <div class="btn btn-primary prod-add-oad"><span>+</span></div>
                              <div class="btn btn-info prod-add-ore"><span>-</span></div>
                          </div>
                        </div>
                        <div class="add-prod-oth">
                          <ul>
                            <li>
                            <div class="row mb-3">
                              <div class="col">
                                    <input class="form-control" id="serial_number" type="text" name="product_info_question[]" placeholder="Quation1" required="">
                                    <div class="valid-feedback">Looks good!</div>
                              </div>
                              <div class="col">
                                    <input class="form-control" id="serial_number" type="text" name="product_info_answer[]" placeholder="Answer1" required="">
                                    <div class="valid-feedback">Looks good!</div>
                              </div>
                            </div>
                              </li>
                              </ul>
                        </div>
                        <!-- start -->
                        
                        <!-- end -->
                        <div class="mb-3">
                          <label></label>
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="product_tags"></textarea>
                        </div>
                        @if (session('user_id')) {
                            <div class="mb-3" id="affiliation_div">
                              <h4 class="text-center">Product Affiliation</h4>
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="mb-3" id="affiliation_type">
                              <div class="col-form-label"> 
                                <label>Affiliation type</label>
                                <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="affiliation_amount_type">
                                  <option value="AL">Choose Affiliation type</option>
                                  <option value="percentage">Precentage</option>
                                  <option value="fixed">fixed amount</option>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3" id="affiliation_amount">
                              <label for="amount">Amount</label>
                              <input class="form-control" type="text" name="affiliation_amount" placeholder="Enter Amount" required="">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                      @endif
                      <div class="btn-showcase text-end">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </div>
                    </form>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        
@endsection
@section('js')
<script>
$(document).ready(function () {

 
        $('input[name="product_type"]').change(function(){
            if($(this).val() == 'Internal'){
                $('#external_disp').hide();
                $('#product_payment_link').val('');
                $('#wallet_coins').show();
                $('select[name="user_code"]').removeAttr('required');
                // $('#discount_type').attr('required', true);
                // $('#discount_val').attr('required', true);
                // $('#wallet_cash').attr('required', true);
                $('#discount_type').show();
                $('#discount_val').show();
                $('#wallet_cash').show();
                $('#wallet_cash_div').show();
                $('#affiliation_type').show();
                $('#affiliation_amount').show();
                $('#affiliation_div').show();
            } else {
                $('#external_disp').show();
                $('#wallet_coins').hide();
                $('select[name="user_code"]').attr('required', true);
                $('#discount_type').hide();
                $('#discount_val').hide();
                $('#wallet_cash').hide();
                $('#wallet_cash_div').hide();
                $('#affiliation_type').hide();
                $('#affiliation_amount').hide();
                $('#affiliation_div').hide();
            }
        });
    })
  $(document).ready(function(){
     
     $("#category_id").change(function(){

         var category = $(this).val();
        //  window.alert(category);
         if(category == ""){
             $("#sub_category_id").html("<option value=''>Select sub Category</option>");
         }
      
         $.ajax({
             url:"/getSubCatByCatId/"+category,
             type:"GET",
             success:function(data){
                 var sub_category = data.sub_category;
                 var html = "<option value=''>Select Sub Category</option>";
                 for(let i =0;i<sub_category.length;i++){
                     html += `
                     <option value="`+sub_category[i]['sub_category_id']+`">`+sub_category[i]['sub_category_name']+`</option>
                     `;
                 }
                 $("#sub_category_id").html(html);
             }
         });
        //  window.alert(sub_category);
     });
      $("#sub_category_id").change(function(){

         var SubCatId = $(this).val();
         //window.alert(sub_category);
         if(SubCatId == ""){
             $("#child_category_id").html("<option value=''>Select city</option>");
         }

         $.ajax({
             url:"/getChildCatByCatId/"+SubCatId,
             type:"GET",
             success:function(data){
              
                 var child_category = data.child_category;
                // window.alert(child_category.lenght);
                 var html = "<option value=''>Select city</option>";
                 for(let i =0;i<child_category.length;i++){
                     html += `
                     <option value="`+child_category[i]['child_category_id']+`">`+child_category[i]['child_category_name']+`</option>`;
                 }
                 $("#child_category_id").html(html);
             }
         });

     });

 });
 var count=1;
 //PRODUCT SPECIFICATION LIST ADD - APPEND
 $(".prod-add-oad").on('click', function() {
  $(".add-prod-oth ul li:last-child").after('<li><div class="row mb-3"><div class="col"><input class="form-control" id="serial_number" type="text" name="product_info_question[]" placeholder="Quation" required=""><div class="valid-feedback">Looks good!</div></div><div class="col"><input class="form-control" id="serial_number" type="text" name="product_info_answer[]" placeholder="Answer " required=""><div class="valid-feedback">Looks good!</div></div></div></li>');
count=count+1;
});
    //PRODUCT SPECIFICATION LIST REMOVE - APPEND
    $(".prod-add-ore").on('click', function() {
        var _prodspec = $(".add-prod-oth ").length;
        if(count >= 2){
            $(".add-prod-oth ul li:last-child").remove();
            count=count-1;
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });
    var count1=1;
 //PRODUCT SPECIFICATION LIST ADD - APPEND
 $(".prod-add-oad1").on('click', function() {
  $(".highlight ul li:last-child").after(' <li><div class=mb-3><input class="form-control " id="" type="text" name="highlight[]" placeholder="(i.e) 1 year onsite warranty" required=""></div></li>');
count1=count1+1;
});
    //PRODUCT SPECIFICATION LIST REMOVE - APPEND
    $(".prod-add-ore1").on('click', function() {
        var _prodspec = $(".highlight ").length;
        if(count1 >= 2){
            $(".highlight ul li:last-child").remove();
            count1=count1-1;
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });

  function hide(){
    document.getElementById("Ex_payment").style.display="none";
  }
  function show(){
    document.getElementById("Ex_payment").style.display="inline";

  }
</script>
@endsection