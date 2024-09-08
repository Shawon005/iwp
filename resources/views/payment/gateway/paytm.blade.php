@extends('layout.master')
@section('content')  
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Paytm</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Paytm</li>
                    <li class="breadcrumb-item active">Paytm Details</li>
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
                    <h5>Paytm Details</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('paytm_update')}}" method="post">
                      @csrf
                        <ul>
                            <li>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="admin_paytm_merchant_id" value="{{$footer->admin_paytm_merchant_id}}" class="form-control" placeholder="Enter your business Paytm id *" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="admin_paytm_merchant_key" value="{{$footer->admin_paytm_merchant_key}}" class="form-control" placeholder="Enter your business Paytm id *" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="admin_paytm_merchant_website" value="{{$footer->admin_paytm_merchant_website}}" class="form-control" placeholder="Enter your business Paytm id *" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select readonly="readonly"  class="form-control">
                                               <option value="">Inden Rupe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="admin_paytm_status" required="required" class="form-control">
                                                <option value="">Select status</option>
                                                <option value="Active"{{($footer->admin_paytm_status=='Active')?"selected":''}}>Active
                                                </option>
                                                <option value="InActive"{{($footer->admin_paytm_status=='InActive')?"selected":''}}>InActive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>  
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