@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Payment</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Payment</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>Payment Details</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
              </div>
            </div>
          </div>
      
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="" style="width: 100%;  font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>payment type</th>
                            <th>Datails</th>
                            <th>Currency</th>
                            <th>Action</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                       <tbody>
                          
								<tr>
                                    <td>1</td>
                                    <td>Cash on delivery</td>
                                    <td><span class="db-list-rat">Free</span></td>
                                    <td><span class="db-list-rat"> - </span></td>
                                    <td> <a class="btn-sm btn-info" href="{{route('free_edit')}}">Edit </a></td>
                                    <td><span class="db-list-appro">{{$footer->admin_cod_status}}</span></td>
								</tr>
                                <tr>
                                    <td>2</td>
                                    <td>PayPal</td>
                                    <td><span class="db-list-rat">{{$footer->admin_paypal_id}}</span></td>
                                    <td><span class="db-list-rat">{{$footer->admin_paypal_currency_code}}</span></td>
                                    <td> <a class="btn-sm btn-info" href="{{route('paypal_edit')}}">Edit </a></td>
                                    <td><span class="db-list-appro">{{$footer->admin_paypal_status}}</span></td>
								</tr>
                                <tr>
                                    <td>3</td>
                                    <td>Stripe</td>
                                    <td><span class="db-list-rat">{{$footer->admin_stripe_id}}</span></td>
                                    <td><span class="db-list-rat">{{$footer->admin_stripe_currency_code}}</span></td>
                                    <td> <a class="btn-sm btn-info" href="{{route('stripe_edit')}}">Edit </a></td>
                                    <td><span class="db-list-appro">{{$footer->admin_stripe_status}}</span></td>
								</tr>
                                <tr>
                                    <td>4</td>
                                    <td>Razorpay</td>
                                    <td><span class="db-list-rat">{{$footer->admin_razor_pay_key_id}}</span></td>
                                    <td><span class="db-list-rat">{{$footer->admin_razor_pay_currency_code}}</span></td>
                                    <td> <a class="btn-sm btn-info" href="{{route('razorpay_edit')}}">Edit </a></td>
                                    <td><span class="db-list-appro">{{$footer->admin_razor_pay_status}}</span></td>
								</tr>
                                <tr>
                                    <td>5</td>
                                    <td>Paytm</td>
                                    <td><span class="db-list-rat">{{$footer->admin_paytm_merchant_id}}</span></td>
                                    <td><span class="db-list-rat">INR</span></td>
                                    <td> <a class="btn-sm btn-info" href="{{route('paytm_edit')}}">Edit </a></td>
                                    <td><span class="db-list-appro">{{$footer->admin_paytm_status}}</span></td>
								</tr>
                                <tr>
                                    <td>5</td>
                                    <td>Ozow</td>
                                    <td><span class="db-list-rat">{{$footer->admin_stripe_id}}</span></td>
                                    <td>-</td>
                                    <td> <a class="btn-sm btn-info" href="{{route('stripe_edit')}}">Edit </a></td>
                                    <td><span class="db-list-appro">{{$footer->admin_stripe_status}}</span></td>
								</tr>
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
          
          </div>
                   
@endsection