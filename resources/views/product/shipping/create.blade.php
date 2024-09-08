@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Product Shipping</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Product Shipping</li>
                    <li class="breadcrumb-item active">Add Product Shipping</li>
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
                    <h5>Add New Product Shipping</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('shipping.store')}}"method="post"enctype="multipart/form-data">
                      @csrf
                    <div class="col-sm-12">
                       
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>State</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="state_id" id="state">
                              <option value="">Choose State</option>
                              @foreach($state as $user):
                                <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>City</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="city_id"id="city">
                              <option value="">Choose City</option>
                              @foreach($city as $user):
                                <option value="{{$user->city_id}}" >{{$user->city_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="shipping_price">Shipping Price</label>
                          <input class="form-control" id="shipping_price" type="number" name="shipping_price" placeholder="Shipping Price" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('shipping_price')
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
@section('js')
<script>
   $(document).ready(function(){
      $("#state").change(function(){
      var state = $(this).val();
      //window.alert(sub_category);
      if(state == ""){
          $("#city").html("<option value=''>Select city</option>");
      }

      $.ajax({
          url:"/get-listing2/"+state,
          type:"GET",
          success:function(data){

              var city = data.city;
            // window.alert(child_category.lenght);
              var html = "<option value=''>Select city</option>";
              for(let i =0;i<city.length;i++){
                  html += `
                  <option value="`+city[i]['city_id']+`">`+city[i]['city_name']+`</option>
                  `;
              }
              $("#city").html(html);
          }
      });
  });
});
</script>
@endsection
        <!-- footer start-->
 