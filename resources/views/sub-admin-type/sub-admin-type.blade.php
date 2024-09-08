@extends('layout.master')
@section('content')
<div class="login-main add-list add-ncate page-body">
                            <div class="log-bor">&nbsp;</div>
                            <div class="card p-4 col-8 m-auto">
                            
                            <div class="log log-1">
                                <div class="">
                                    <h4 class="text-center mb-4">Edit Sub Admin Type</h4>
                                                                        
                                    <form method="post" action="{{route('sub_admin_type_update',['id'=>$admin->sub_admin_type_id])}}" enctype="multipart/form-data" class="row needs-validation">
                                               @csrf 
                                    <div class="row mb-3">
                                                    <div class="col-md-6 text-left text-md-right">
                                                        <label>Sub Admin Type</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="sub_admin_type" value="{{$admin->sub_admin_type}}" class="form-control" placeholder="Sub Admin Type *" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6 text-left text-md-right">
                                                        <label>User Commission Amount </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="amount_user" value="{{$admin->amount_user}}" class="form-control" placeholder="Commission Amount for User *" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6 text-left text-md-right">
                                                                <label>Trader C. Amount ({{Nam('vv_plan_type','plan_type_id',1,'plan_type_name')}})</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="p1_amount" value="{{$admin->p1_amount}}" class="form-control" placeholder="Commission Amount for Trader *" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                       
                                                        <div class="row mb-3">
                                                            <div class="col-md-6 text-left text-md-right">
                                                                <label>Trader C. Amount ({{Nam('vv_plan_type','plan_type_id',2,'plan_type_name')}})</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="p2_amount" value="{{$admin->p2_amount}}" class="form-control" placeholder="Commission Amount for Trader *" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                       
                                                        <div class="row mb-3">
                                                            <div class="col-md-6 text-left text-md-right">
                                                                <label>Trader C. Amount ({{Nam('vv_plan_type','plan_type_id',3,'plan_type_name')}})</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="p3_amount" value="{{$admin->p3_amount}}" class="form-control" placeholder="Commission Amount for Trader *" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                      
                                                        <div class="row mb-3">
                                                            <div class="col-md-6 text-left text-md-right">
                                                                <label>Trader C. Amount ({{Nam('vv_plan_type','plan_type_id',4,'plan_type_name')}})</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="p4_amount" value="{{$admin->p4_amount}}" class="form-control" placeholder="Commission Amount for Trader *" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                        
                                                <div class="row mb-3">
                                                    <div class="col-md-6 text-left text-md-right">
                                                        <label> Minimum Withdrawal Amount</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="minimum_withdrawal_amount" value="{{$admin->minimum_withdrawal_amount}}" class="form-control" placeholder="Minimum Withdrawal Amount *" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                        <button type="submit"  class="btn btn-primary">Submit</button>
                                    </form>

                                </div>
                                </div>
                            </div>
                        </div>
@endsection