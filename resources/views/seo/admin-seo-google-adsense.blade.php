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
                    <li class="breadcrumb-item active">Goggle AdSense</li>
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
                    <h5>Add Google AdSense Code</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" novalidate="">
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label>Google AdSense Code</label>
                          <textarea id="text-box" name="text-box" cols="10" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <input class="btn btn-light" type="reset" value="Discard">
                      </div>
                    </form>
                    <div class="alert alert-info mt-5">
                      <p><b>Notes:</b> You can get <b>Google AdSense</b> code from <b>Google</b> and paste above the box. Once you update the Google Ads means Ads start showing all Ads positions. If you updated any <b>custom banner Ads</b> in any other position means <b>Google Ads can't showing the particular positions</b>.</p>
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