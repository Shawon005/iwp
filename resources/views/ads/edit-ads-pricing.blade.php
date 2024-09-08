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
                    <form class="row needs-validation"action="{{route('ads_pricing_update',['id'=>$ads->all_ads_price_id])}}" method="Post" enctype="multipart/form-data" novalidate="">
                        @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                        <div class="input-group">
                              <input class="form-control digits" type="text"id="end_date" value="{{$ads->ad_price_name}}"name="ad_price_name"data-language="en">
                            </div>
                        </div>
                        <div class="mb-3">
                        <div class="input-group">
                              <input class="form-control digits" type="text"id="end_date" value="{{$ads->ad_price_size}}"name="ad_price_size"data-language="en">
                            </div>
                        </div>
                        <div class="mb-3">
                          <!-- <div class="col-xl-5 col-sm-9"> -->
                            <div class="input-group">
                              <input class=" form-control digits" type="text" id="start_date"name="ad_price_cost"value="{{$ads->ad_price_cost}}"data-language="en">
                            </div>
                          <!-- </div> -->
                        </div>
                        <div class="mb-3">
                          <label for="choose_ad_image">Choose Ad Previwe Image</label>
                          <input class="form-control" id="choose_ad_image" type="file" name="ad_price_photo" placeholder="" >
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name="ad_price_status">
                                  <option value="Active" {{($ads->ad_price_status=='Active')?'selected':''}}>Active</option>
                                  <option value="inActive" {{($ads->ad_price_status=='inActive')?'selected':''}}>inActive</option>
                            </select>
                          </div>
                        </div>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Update</button>
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
