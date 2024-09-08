@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Coupon & Deals</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Coupon & Deals</li>
                    <li class="breadcrumb-item active">Add Coupon</li>
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
                    <h5>Add New Coupon</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('coupon_store')}}" method="Post"enctype="multipart/form-data">
                     @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="coupon_user_id">
                            @foreach($users as $user):
                                <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="coupon_name">Coupon Name</label>
                          <input class="form-control" id="coupon_name" type="text" name="coupon_name" placeholder="Coupon Name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('coupon_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="offer_code">Offer Code</label>
                          <input class="form-control" id="offer_code" type="text" name="coupon_code" placeholder="Offer Code" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category:</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="category_id"required=""id="category_id">
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
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="sub_category_id[]"required=""id="sub_category_id">
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
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"name="child_category_id[]"required=""id="child_category_id">
                              <option value="">Select Child Category</option>
                              @foreach($child_category as $user):
                                <option value="{{$user->child_category_id}}" >{{$user->child_category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Brand</label>
                          <select class="js-example-basic-single col-sm-12"name="brand_id"required="">
                            <optgroup label="">
                              <option value="">Select Brand</option>
                              @foreach($brand as $user):
                                <option value="{{$user->brand_id}}" >{{$user->brand_name}}</option>
                                 @endforeach
                            </optgroup>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="website_link">Website Link</label>
                          <input class="form-control" id="website_link" type="text" name="coupon_link" placeholder="Website Link(if online offer)" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="brand_logo">Brand logo or Offer image(Recommended size 65 X 65)</label>
                          <input class="form-control" id="brand_logo" type="file" name="coupon_photo[]" placeholder="Coupon photo*" required=""multiple="multiple">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Start Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class=" form-control digits" type="date" data-language="en"name="coupon_start_date">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">End Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class=" form-control digits" type="date" data-language="en"name="coupon_end_date">
                            </div>
                          <!-- </div> -->
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </form>
                    <div class="btn-showcase text-end">
                 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
@endsection
@section('js')
<script>


$(document).ready(function(){
   
   $("#category_id").change(function(){

       var category = $(this).val();
      // window.alert(category);
       if(category == ""){
           $("#sub_category_id").html("<option value=''>Select sub Category</option>");
       }

       $.ajax({
           url:"/get-planscoupon/"+category,
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

       var sub_category = $(this).val();
       //window.alert(sub_category);
       if(sub_category == ""){
           $("#child_category_id").html("<option value=''>Select city</option>");
       }

       $.ajax({
           url:"/get-plans1coupon/"+sub_category,
           type:"GET",
           success:function(data){

               var child_category = data.child_category;
              // window.alert(child_category.lenght);
               var html = "<option value=''>Select city</option>";
               for(let i =0;i<child_category.length;i++){
                   html += `
                   <option value="`+child_category[i]['child_category_id']+`">`+child_category[i]['child_category_name']+`</option>
                   `;
               }
               $("#child_category_id").html(html);
           }
       });

   });

});
</script>
@endsection