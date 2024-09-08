@extends('layout.master')
@section('content')
<div class="page-body">

<div clss="card">
  
    <div class="mt-5">
        <div class="card  col-8 m-auto">
        <div class="head p-1"style="background: #233d47 ;text-align: center;color: #fff;"><h2>Withdrawal Request</h2></div>
            <div class="p-3">
            <div class="login-main add-list add-ncate">
                    
                    <div class="log log-1">
                        <div class="login">

                          @php $minimun_amount=Nam('vv_sub_admin_type','sub_admin_type_id',Nam('vv_admin','admin_id',session('id'),'admin_type'),'minimum_withdrawal_amount'); @endphp

                            <div class="" style="background: rgba(244, 67, 54, 0.1); padding: 10px 10px 1px 10px; border-radius: 5px; margin-bottom: 20px;">
                                <p style="color: #F44336"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg> Available balance to withdrawal: ₹ <b>{{blance(session('id'))}}</b>   , minimum withdrawal request is ₹ <b>{{$minimun_amount}}</b></p>
                            </div>
                            @if(session('message'))
                        <div class="alert alert-danger">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif                    
                             <form  id="withdrawal_request_form" method="post" action="{{route('request_store')}}" enctype="multipart/form-data" class="cre-dup-form cre-dup-form-show">
                                      @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="hidden" name="wallet_balance" class="form-control" value="{{blance(session('id'))}}" required="">
                                                  <input type="hidden" name="minimum_withdrawal_amount" class="form-control" value="{{$minimun_amount}}" required="">
                                                  <input type="hidden" name="user_id" class="form-control" value="28" required="">
                                                  <input type="text" name="withdraw_amount" class="form-control" placeholder="Withdrawal Amount" value="{{$minimun_amount}}" required="">
                                                  <div class="">Minimum Withdrawal Amount ₹<b>{{$minimun_amount}}</b></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="payment_type" id="payment_type" onchange="payment()">
                                                        <option value="">Select Withdraw Method*</option>
                                                        <option value="Google Pay">Google Pay</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Bank">Bank</option>
                                                        <!-- <option value="4">Generals Users</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3" id="withdraw-method-bank-name" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="bank_name" id="bank">
                                                    <option value="">Select Bank*</option>
                                                    @foreach($banks as $bank)
                                                    <option value="{{$bank->BANK}}">{{$bank->BANK}}</option>  
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-ref-no" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="ref_no" class="form-control" placeholder="Ref No" id="ref-no">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-ref-no-mobile" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="ref_no" class="form-control" placeholder="Mobile_Number" id="ref-no">
                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-cheque-no" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="cheque_no" class="form-control" placeholder="Cheque No">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="withdraw-method-cheque-date" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="date" name="cheque_date" class="form-control" placeholder="Cheque Date">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                <button type="submit"  class="btn btn-primary">Submit</button>
                            </form>
                            <div class="col-md-12 text-center">
                                    <a  href="{{route('sub_request')}}">View All Withdrawal History </a>
                                    <!-- admin-sub-admin-type-all.php -->
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script>
function payment() {
  var x = document.getElementById("payment_type").value;

  if(x=='Google Pay')
  {
    document.getElementById("withdraw-method-ref-no-mobile").style.display="block";
    document.getElementById("withdraw-method-cheque-no").style.display="none"
    document.getElementById("withdraw-method-cheque-date").style.display="none"
    document.getElementById("withdraw-method-bank-name").style.display="none"
    document.getElementById("withdraw-method-ref-no").style.display="none"
  }
  else if(x=='Cheque')
  {
    document.getElementById("withdraw-method-ref-no-mobile").style.display="none";
    document.getElementById("withdraw-method-cheque-no").style.display="block"
    document.getElementById("withdraw-method-cheque-date").style.display="block"
    document.getElementById("withdraw-method-bank-name").style.display="block"
    document.getElementById("withdraw-method-ref-no").style.display="block"
  }
  else if(x=='Bank')
  {
    document.getElementById("withdraw-method-ref-no-mobile").style.display="none";
    document.getElementById("withdraw-method-cheque-no").style.display="none"
    document.getElementById("withdraw-method-cheque-date").style.display="none"
    document.getElementById("withdraw-method-bank-name").style.display="block"
    document.getElementById("withdraw-method-ref-no").style.display="block"
  }
}
</script>
@endsection