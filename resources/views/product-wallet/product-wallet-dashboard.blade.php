@extends('layout.master')
@section('content')


<div class="page-body ">
        <div class="card mt-3">
        <div class="card-body mt-3">
        <div>
        <div class="card alert-primary p-4 mt-3" style="height:195px; background: linear-gradient(to right,#A5FECB,#429dde,#7b4ffc);" >
            <div class="row">
                <div class="col-3">
                   <img src="{{asset('/storage/file/Admin.png')}}"width="180" height="180" alt="">
                </div>
                <div class="col">
                    <div class="mt-5">
                        <h2>Hi Welcome <b>{{$admin}}</b></h2>
                        <!-- <p>Stay up to date reports in your listing, products, events and blog reports here</p> -->
                        

                    </div>
                  </div>
            </div>
            </div>
        <div class="card alert-primary p-4 " style="height:90px; background: #A5FECB;" >
                <h2><i class='fas fa-wallet'></i>Product Affiliation & Wallet</h2>
        </div>
            
            
         <div class="row">
            <div class="col-sm-3">
           <a href="{{route('product_withdrew')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center text-dark mt-2" id="day">
                  <span >Total Payment Received</span>
                  <h5 id="total_day">{{CountC('vv_wallet_affiliate_transaction','payment_status')}}</h5>
                </div>
              </div></a>
            </div>
            <div class="col-sm-3">
            <a  href="{{route('product_wallet_paddind')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center text-dark mt-2">
                  <span>Pending Withdrawal Request</span>
                  <h5>{{CountCol('vv_wallet_affiliate_transaction','payment_status','product-affiliation')}}</h5>
                </div>
              </div></a>
            </div>
            <div class="col-sm-3">
            <a  href="{{route('product_wallet_approve')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center text-dark mt-2">
                  <span>Approved Withdrawal Request</span>
                  <h5 id="point">{{CountCol('vv_wallet_affiliate_transaction','payment_status','approved')}}</h5>
                </div>
              </div></a>
            </div>
            <div class="col-sm-3"><a  href="{{route('product_wallet_rejected')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center text-dark mt-2">
                  <span>Rejected Withdrawal Request</span>
                  <h5 id="point">{{CountCol('vv_wallet_affiliate_transaction','payment_status','rejected')}}</h5>
                </div>
              </div></a>
            </div>
          </div>
         </div>

        </div>
        </div>
        </div>
@endsection