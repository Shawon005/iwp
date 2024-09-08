@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Coupon Category</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Coupon Category</li>
                    <li class="breadcrumb-item active">Add Coupon Child Category</li>
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
                    <h5>Add New Coupon Child Category</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('child_category_update',['id'=>$child_category->child_category_id])}}" method="Post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="category_id" id="category_id">
                              <option value="AL">Select Category</option>
                                @foreach($C_category as $user):
                                @if($user->category_id==$child_category->category_id)
                                <option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
                                @else
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Sub Category</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="sub_category_id" id="sub_category_id">
                              <option value="AL">Select Sub Category</option>
                              @foreach($sub_category as $user):
                                @if($user->sub_category_id==$child_category->sub_category_id)
                                <option value="{{$user->sub_category_id}}" selected>{{$user->sub_category_name}}</option>
                                @else
                                <option value="{{$user->sub_category_id}}" >{{$user->sub_category_name}}</option>
                                @endif
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="child_category_name">Child Category Name</label>
                          <input class="form-control" id="child_category_name" type="text" name="child_category_name" placeholder="Child Category Name*" value="{{$child_category->child_category_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('child_category_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
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

});
</script>
@endsection