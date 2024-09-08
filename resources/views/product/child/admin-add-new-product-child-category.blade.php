@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Product Category</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Product Category</li>
                    <li class="breadcrumb-item active">Add Product Child Category</li>
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
                    <h5>Add New Product Child Category</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('product_child_category_store')}}"method="post">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category </label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="category_id" id="category_id">
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
                            <select class="js-example-placeholder-multiple col-sm-12" name="sub_category_id"id="sub_category_id" >
                              <option value="">Select Sub Category</option>
                              @foreach($sub_category as $user):
                                <option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="child_category_name">Child Category Name</label>
                          <input class="form-control" id="child_category_name" type="text" name="child_category_name" placeholder="Child Category Name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('child_category_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
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
        <!-- footer start-->
 @section('js')
 <script>
  $(document).ready(function(){
     
     $("#category_id").change(function(){

         var category = $(this).val();
        //  window.alert(category);
         if(category == ""){
             $("#sub_category_id").html("<option value=''>Select sub Category</option>");
         }

         $.ajax({
             url:"/get-plansProduct/"+category,
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
    });
 </script>
 @endsection