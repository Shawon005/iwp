@extends('layout.master')
@section('content')
<div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="container-fluid" style="background-color:white">
            <div class="page-title">
              <h3 class="text-center" >Product Order</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                  
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
              <a class="nav-link {{($c==0)?'active':''}}" aria-current="page" href="{{route('order_table')}}">All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{($c==1)?'active':''}}"   href="{{route('order_paddind')}}">Pending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{($c==2)?'active':''}}" href="{{route('order_approve')}}">Approved</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{($c==4)?'active':''}}"  href="{{route('order_rejected')}}">Rejected</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{($c==3)?'active':''}}"data-bs-toggle="" href="{{route('order_delivered')}}">Delivered</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{($c==5)?'active':''}}"data-bs-toggle="" href="{{route('order_cancel')}}">Cancel</a>
            </li>
          </ul>
                      <table class="table table-bordered table-light " id="basic-10" style="width: 100%; text-align: left; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Order No</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                            <th>View</th>
                          </tr>
                        </thead>
                       <tbody>
                       
                       
                        
                        @foreach($order as $user)
                        <tr>
                            
                           <td>{{$user->order_id}}</td> 
                           <td>{{$user->order_number}}</td>
                           <td>{{dateFormatConverter($user->order_placed_on)}}</td>
                           <td>Rs.{{amount($user->order_id)}}</td>
                            <td>{{$user->order_status}}</td>
                            <td>{{$user->dispatch_status}}</td>
                            <td>
                          @method('delete')
                          <a class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->order_id}}" >Approval Status </a> |
                          <a class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalD{{$user->order_id}}"onclick="return{{$id1=$user->order_id}}">Delivery Status </a> |
                          <a onclick="return confirm('Are you want to delete')"  class="btn-sm btn-danger" href="{{route('order_delete',['id'=>$user->order_id])}}">Delete </a> 
                          </td>
                          <td><a href="{{route('admin_order_viwe',['id'=>$user->order_id])}}" class="btn-sm btn-info" target="_blank">Preview</a>
                          
                        </tr>
                        <!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->order_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approval Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  action="{{route('order_approvel',['id'=>$user->order_id])}}" method="post">
      @csrf
                    <div class="mb-3">
                     
                                <div class="col-form-label"> 
                                    <label>Approval</label>
                                    <select class="js-example-placeholder-multiple col-sm-12" name="approve">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                        
                                    </select>
                                </div>
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

<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalD{{$user->order_id}}" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Dalivery Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  action="{{route('order_delivery',['id'=>$id1])}}" method="POST">
      @csrf
      <div class="mb-3">
      @php $val=Nam('vv_orders','order_id',$id1,'order_approve_status'); @endphp
                          <div class="col-form-label"> 
                            <label>Dalivery Status</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="order_approved_on">
                                    <option {{($val=='pending')?'selected':''}} value="pending">Pending</option>
                                    <option {{($val=='confirmed')?'selected':''}} value="confirmed">Confirmed</option>
                                    <option {{($val=='packed')?'selected':''}} value="packed">Packed</option>
                                    <option {{($val=='shipped')?'selected':''}} value="shipped">Shipped</option>
                                    <option {{($val=='out_for_delivery')?'selected':''}} value="out_for_delivery">Out for Delivery</option>
                                    <option {{($val=='delivered')?'selected':''}} value="delivered">Delivered</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                        <label>Shipping Details</label>
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="shipping_details">{{Nam('vv_orders','order_id',$id1,'shipping_info')}}</textarea>
                        </div>
                        <button type="" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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