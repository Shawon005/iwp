@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Wallet</h2>
          <div class="card p-1 container-fluid" style="background-color:white">
            <div class="page-title">
              <h3 class="text-center" >Wallet & Credits</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h4>All Commission Amount</h4>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
              </div>
            </div>
          </div>
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered table-light " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>INV No</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Commission Amount</th>
                          </tr>
                        </thead>
                       <tbody>
                        @foreach($wallet as $user)
                        <tr>
                           <td>{{$user->wallet_transaction_id}}</td> 
                           <td>{{$user->invoice_no}}</td>
                           <td>
                           <img class="rounded-circle" src="{{asset('/storage/file/'.Nam('vv_users','user_id',$user->user_id,'profile_image'))}}"width="50" height="60" alt=""><br>
                            <span class="bg-success p-1">{{user($user->user_id)}}</span><br>
                            {{Nam('vv_users','user_id',$user->user_id,'mobile_number')}}<br>
                            {{Nam('vv_users','user_id',$user->user_id,'user_cdt')}}
                          </td>
                           <td>{{dateFormatConverter($user->request_date)}}</td>
                            <td>Rs: {{$user->commission_amount}}</td>
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