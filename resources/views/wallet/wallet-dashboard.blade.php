@extends('layout.master')
@section('content')


<div class="page-body ">
        <div class="card mt-3">
        <div class="card-body mt-3">
        <div>
        <div class="card alert-primary p-4" style="height:195px; background: linear-gradient(to right,#A5FECB,#429dde,#7b4ffc);" >
            <div class="row">
                <div class="col-3">
                   <img src="{{asset('/storage/file/Admin.png')}}"width="180" height="180" alt="">
                </div>
                <div class="col">
                    <div class="">
                        <h2>Hi Welcome <b>{{$admin}}</b></h2>
                        <!-- <p>Stay up to date reports in your listing, products, events and blog reports here</p> -->
                        
                        <p><b>Current Wallet balance</b></p>
                        <p style="font-size: 30px;font-weight: bold;">₹ {{$amount}}</p>
                    </div>
                  </div>
            </div>
            </div>
        <div class="card alert-primary p-4 " style="height:90px; background: #A5FECB;" >
                <h2><i class="fa-solid fa-wallet"></i>Wallet & Credits</h2>
        </div>
            
            
         <div class="row">
            <div class="col-sm-3">
            <a href="{{route('wallet_sent')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center  text-dark mt-2" id="day" >
                  <span >Total Payment Received</span>
                   @if(session('sub_admin')==0)
                  <h5 id="total_day">{{CountCol('vv_wallet_transaction','payment_status','sent')}}</h5>
                  @else
                  <h5 id="total_day">{{$count}}</h5>
                  @endif
                </div>
              </div></a>
            </div>
            <div class="col-sm-3">
            <a href="{{route('wallet_paddind')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center  text-dark mt-2">
                  <span>Pending Withdrawal Request</span>
                  @if(session('sub_admin')==0)
                  <h5>{{CountCol('vv_wallet_transaction','payment_status','pending')}}</h5>
                  @else
                  <h5>{{count(logic2('vv_wallet_transaction','payment_status','pending','sub_admin_id',session('id')))}}</h5>
                  @endif
                </div>
              </div></a>
            </div>
            <div class="col-sm-3">
            <a href="{{route('wallet_approve')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center text-dark mt-2">
                  <span>Approved Withdrawal Request</span>
                  
                  @if(session('sub_admin')==0)
                  <h5 id="point">{{CountCol('vv_wallet_transaction','payment_status','approved')}}</h5>
                  @else
                  <h5>{{$count2}}</h5>
                  @endif
                </div>
              </div></a>
            </div>
            <div class="col-sm-3">
            <a  href="{{route('wallet_rejected')}}">
              <div class="card shadow p-3 mb-5 bg-body rounded" style="height:100px">
                <div class="text-center text-dark mt-2">
                  <span>Rejected Withdrawal Request</span>
                  @if(session('sub_admin')==0)
                  <h5 id="point">{{CountCol('vv_wallet_transaction','payment_status','rejected')}}</h5>
                  @else
                  <h5>{{count(logic2('vv_wallet_transaction','payment_status','rejected','sub_admin_id',session('id')))}}</h5>
                  @endif
                </div>
              </div></a>
            </div>
          </div>
         </div>

        </div>
        </div>
</div>
@endsection