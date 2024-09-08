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
          <div class="card p-1 container-fluid">
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
                      <table class="table table-bordered " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            
                            <th>NO</th>                          
                            <th>User</th>
                            <th>Plan</th>
                            <th>Payment Amount</th>
                            <th>Payment Mode</th>
                            <th>Payment Date</th>
                            <th>Invoice</th>
                            <th>Create Invoice</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                       <tbody>                       
                        @foreach($wallet as $user)
                        <tr>
                            
                           <td>{{$user->wallet_transaction_id}}</td> 
                           <td><span class="bg-success p-1">{{user($user->user_id)}}</span></td>
                            <td>{{$user->order_lineitem_id}}</td>
                            <td>{{$user->withdraw_amount}}</td> 
                            <td>{{$user->payment_type}}</td>                      
                           <td>{{dateFormatConverter($user->sent_date)}}</td>                          
                            <td>{{$user->invoice_no}}</td>
                            <td>{{$user->payment_status}}</td>
                            <td>
                          @method('delete')
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('wallet_delete',['id'=>$user->wallet_transaction_id])}}">Delete </a> 
                          </td>
                        </tr>
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