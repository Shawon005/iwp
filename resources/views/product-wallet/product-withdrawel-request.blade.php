@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Affilition</h2>
          <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Product Affilition Wallet</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Product Affilition Wallet</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                  
              </div>
            </div>
          </div>
        
      
          <div class="container-fluid table-responsive">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{route('product_withdrew')}}">All</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"   href="{{route('product_wallet_paddind')}}">Pending</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('product_wallet_approve')}}">Approved</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="{{route('product_wallet_rejected')}}">Rejected</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"data-bs-toggle="" href="{{route('product_wallet_sent')}}">Sent</a>
  </li>
</ul>
                      <table class="table table-bordered" id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Tran No</th>
                            <th>ORD No</th>
                            <th>User</th>
                            <th>Request Date</th>
                            <th>Approval Date</th>
                            <th>Payment Date</th>
                            <th>Payment Via</th>
                            <th>Withdraw Amount</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>
                       
                       
                        
                        @foreach($product_wallet as $user)
                        <tr>
                            
                           <td>{{$user->wallet_transaction_id}}</td> 
                           <td>{{$user->wallet_transaction_code}}</td>
                           <td>{{$user->invoice_no}}</td>
                           <td>
                                <img  src="{{asset('/storage/file/'.Nam('vv_users','user_id',$user->user_id,'profile_image'))}}"width="50" height="60"class="rounded-circle" alt="">
                              
                                <br>{{user($user->user_id)}}<br><small>{{dateFormatConverter(Nam('vv_users','user_id',$user->user_id,'user_cdt'))}}<small>
                              
                           </td>
                            <td>{{dateFormatConverter($user->request_date)}}</td>
                            <td>{{dateFormatConverter($user->approved_date)}}</td>
                           <td>{{dateFormatConverter($user->sent_date)}}</td>
                           <td>{{$user->payment_type}}<br>
                                {{($user->bank_name=='0')?'':$user->bank_name}}<br>
                                {{($user->ref_no=='0')?'':$user->ref_no}}<br>
                                {{($user->cheque_no=='0')?'':$user->cheque_no}}<br>
                            </td>
                            <td>{{$user->withdraw_amount}}</td>
                            <td>{{$user->payment_status}}</td>
                            <td>
                          @method('delete')
                          <a class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->wallet_transaction_id}}" >Payment Status </a> |
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('product_wallet_delete',['id'=>$user->wallet_transaction_id])}}">Delete </a> 
                          </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{$user->wallet_transaction_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form  action="{{route('product_wallet_status',['id'=>$user->wallet_transaction_id])}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="col-form-label"> 
                                            <label>Status</label>
                                            <select class="js-example-placeholder-multiple col-sm-12" name="status">
                                            <option {{($user->payment_status=='pending')?'selected':''}} value="pending">Pending</option>
                                            <option {{($user->payment_status=='approved')?'selected':''}} value="approved">Approved</option>
                                            <option {{($user->payment_status=='sent')?'selected':''}} value="sent">Sent</option>
                                            <option {{($user->payment_status=='rejected')?'selected':''}} value="rejected">Rejected</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                      <label>Remarks</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="remarks">{{$user->remarks}}</textarea>
                                    </div>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                  </form>
                              </div>
                              <div class="modal-footer">
                              
                              </div>
                            </div>
                          </div>
                        </div>

                        @endforeach
                 
                       </tbody>
                      </table>
          </div>
    
</div>
<!-- Button trigger modal -->
<!-- Button trigger modal -->



 </div>
                   
@endsection
@section('js')
<!-- <script>
$(document).ready(function(){
    $("#myTab a").click(function(e){
        e.preventDefault();
        $(this).tab("show");
    });
});
</script> -->
@endsection