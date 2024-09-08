
 @extends('layout.master')
@section('content')
       <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Service Experts</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Accept Payment Modes</li>
                    <li class="breadcrumb-item active">Add Payment Type</li>
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
                    <h5>Add New Expert Payment</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('expert_payment_store')}}"method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="payment_type">Payment Type</label>
                          <input class="form-control" id="payment_type" type="text" name="payment_name" placeholder="Payment type*" required="">
                          <div class="valid-feedback">Looks good!</div>
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
        <!-- footer start-->
@endsection
 