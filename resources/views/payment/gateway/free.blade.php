@extends('layout.master')
@section('content')  
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Cash On Delivary</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Cash On Delivary</li>
                    <li class="breadcrumb-item active">Cash On Delivary Details</li>
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
                    <h5>Cash On Delivary Details</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('free_update')}}" method="post">
                      @csrf
                        <ul>
                            <li>
                            <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text"readonly="readonly" value="Free" class="form-control" placeholder="Enter your business Razon Pay id *" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="admin_cod_status" required="required" class="form-control">
                                                <option value="">Select status</option>
                                                <option value="Active"{{($footer->admin_cod_status=='Active')?"selected":''}}>Active
                                                </option>
                                                <option value="InActive"{{($footer->admin_cod_status=='InActive')?"selected":''}}>InActive
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