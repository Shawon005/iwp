@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>ADS</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ads</li>
                    <li class="breadcrumb-item active">Create Ads</li>
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
                    <h5>Create new Ads</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation"action="{{route('ads_store')}}" method="Post" enctype="multipart/form-data" novalidate="">
                        @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="user_id">
                                 @foreach($users as $user):
                                  <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Ads Position</label>
                            <select class="js-example-placeholder-multiple col-sm-12" id="cost1" onclick="val()" name="position_id">
                                 <option value=" ">Choose Position*</option>
                                 @foreach($position as $user):
                                 <option value="{{$user->all_ads_price_id}}" >{{$user->ad_price_name}}({{$user->ad_price_cost}}Rs/Per Day)</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">Start Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class=" form-control digits" type="date" id="start_date"name="start_date"onfocusout="func()"data-language="en">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label">End Date</label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class="form-control digits" type="date"id="end_date" onfocusout="func()"name="end_date"data-language="en">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label for="choose_ad_image">Choose Ad Image</label>
                          <input class="form-control" id="choose_ad_image" type="file" name="choose_ad_image" placeholder="" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                       
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="link"placeholder="Advertisement External Link"></textarea>
                        </div>
                        <div class="row">
                          <div class="col-sm-3">
                            <div class="card alert-light border" style="height:95px">
                              <div class="text-center mt-4" id="tatal_day">
                                <span>Total Days</span>
                                <h4 id="total_day">0</h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="card alert-light border" style="height:130px">
                              <div class="text-center mt-4"id="cost_par_day">
                                <span>Cost Per Day</span>
                                <h4 id="cost">Rs:</h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="card alert-light border" style="height:95px">
                              <div class="text-center mt-4"id="tax">
                                <span>Tax</span>
                                <h4>Rs:4</h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="card alert-success border" style="height:95px">
                              <div class="text-center mt-4"id="total_cost">
                                <span>Total Cost</span>
                                <h4>Rs:0</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Publish this Ad</button>
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
        <!-- footer start-->
@endsection 
@section('js')
<script>

//   window.alert("total_day")
  function func(){
//   window.alert("total_day")
          var start_date=document.getElementById("start_date").value;
          var end_date=document.getElementById("end_date").value;

          start_date=Math.abs((new Date(start_date).getTime()/1000).toFixed(0));
          end_date=Math.abs((new Date(end_date).getTime()/1000).toFixed(0));
          var total_day=end_date-start_date;
         // alert(total_day/(60*60*24));
          document.getElementById("total_day").innerHTML=total_day/(60*60*24);
          
          par_cost=document.getElementById("cost1").value;
     
          var value=0;
          $.ajax({
            url:"/par_cost/"+par_cost,
            type:"GET",
            success:function(data){

                var cost = data.cost;
            
            }
            });
         
         // document.getElementById("cost").innerHTML=cost;
  }
  
</script>
@endsection