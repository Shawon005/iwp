

@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Listing</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Listing Promotions</li>
                    <li class="breadcrumb-item active">Create New Promotes</li>
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
                    <h5>Promote Your</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation"action="{{route('listing_promotion_update')}}" method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="p-1">
                          <div class="">
                            <div class="col-form-label"> 
                              <label></label>
                              <select class="js-example-placeholder-multiple col-sm-12"name="listing_id" id="listing_id" >
                                <option value="">Choose listing</option>
                                @foreach($listing as $user):
                              <option value="{{$user->listing_id}}" >{{$user->listing_name}}</option>
                               @endforeach
                              </select>
                            </div>                            
                          </div>
                        </div>
                        <hr>
                        <div class="p-1">
                          <label class="col-form-label"></label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                          <div class="input-group">
                            <input class=" form-control digits" name="start_date"type="date" id="start_date" data-language="en" placeholder="mm/dd/yy">
                          </div>
                          <!-- </div> -->
                        </div>
                        <hr>
                        <div class="p-1">
                          <label class="col-form-label"></label>
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class=" form-control digits"name="end_date" id="end_date" onfocusout="func()" type="date" data-language="en" placeholder="mm/dd/yy">
                            </div>
                          <!-- </div> -->
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <div class="card alert-light" style="height:95px">
                              <div class="text-center mt-4" id="day">
                                <span >Total Days</span>
                                <h5 id="total_day">0</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="card alert-light" style="height:95px">
                              <div class="text-center mt-4">
                                <span>Cost Per Day</span>
                                <h5 >{{Nam('vv_footer','footer_id','1','cost_per_point')}}</h5>
                                 <input type="number" id="cost_per_point" class="d-none" value="{{Nam('vv_footer','footer_id','1','cost_per_point')}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="card alert-success" style="height:95px">
                              <div class="text-center mt-4">
                                <span>Total Points</span>
                                <h5 id="point">0</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="btn-showcase text-end">
                          <button class="btn btn-primary" type="submit">Submit</button>
                          <input class="btn btn-light" type="reset" value="Discard">
                        </div>  
                      </div>                      
                    <!-- </div> -->
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
          var per_point=document.getElementById("cost_per_point").value;

          start_date=Math.abs((new Date(start_date).getTime()/1000).toFixed(0));
          end_date=Math.abs((new Date(end_date).getTime()/1000).toFixed(0));
         
          var total_day=end_date-start_date;
         // alert(total_day/(60*60*24));
         parseInt(per_point);
          document.getElementById("total_day").innerHTML=total_day/(60*60*24);
          document.getElementById("point").innerHTML=(total_day/(60*60*24)*per_point);

  }
</script>
@endsection