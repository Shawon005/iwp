<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
  
    public function Wallet(Request $request)
    {
      $id = session('id');
      
      $ads=DB::table('vv_wallet_transaction')->where('sub_admin_id',$id)->get();
      if($ads!=null){
        $bal=0;
        $bal_w=0;
      foreach($ads as $ad){
      
      $bal=$bal+($ad->commission_amount+0);
      if($ad->payment_status=='sent')
      {
        $bal_w=$bal_w+($ad->withdraw_amount+0);
      }
      
      }
      $bal=$bal-$bal_w;
    }
      else{
        $bal=0;
      }
      $admin = DB::table('vv_admin')->where('admin_id',$id)->first();
      $count=DB::table('vv_wallet_transaction')->where('sub_admin_id',$id)->where('payment_status','sent')->count();
      $count2=DB::table('vv_wallet_transaction')->where('sub_admin_id',$id)->where('payment_status','approved')->count();
      return view('wallet.wallet-dashboard',
      ['admin'=>$admin->admin_name,'amount'=>$bal,'count'=>$count,'count2'=>$count2]);

    }
    public function Status(Request $request,$id)
    {
      $ds_status=request()->status;
      if ($ds_status== "approved") {
        $date = 'approved_date';
    } 
    
    else if ($ds_status== "sent") {
        $date = 'sent_date';
    }
    else if ($ds_status== "rejected") {
        $date = 'reject_date';
    }
      DB::table('vv_wallet_transaction')->where('wallet_transaction_id',$id)->update([
       'payment_status'=>request()->status,
       'remarks'=>(request()->remarks==null)?'':request()->remarks,
       $date=>now(),
      ]);
      return redirect()->back();
    }
    public function Index(Request $request)
    {
      if(session('sub_admin')==0){
      $wallet= DB::table('vv_wallet_transaction')->get();
      }
      else{
        $wallet= DB::table('vv_wallet_transaction')->where('sub_admin_id',session('id'))->where('payment_status','!=','registration')->get();
      }
      return view('wallet.withdrawel-request',
      ['wallet'=>$wallet]);

    }
    public function Commission(Request $request)
    {
      $wallet= DB::table('vv_wallet_transaction')->where('sub_admin_id',session('id'))->where('commission_amount','!=',null)->get();
      return view('wallet.commition',
      ['wallet'=>$wallet]);
    }
    public function Tran(Request $request)
    {
      if(session('sub_admin')==0){
      $wallet= DB::table('vv_wallet_transaction')->get();
    }
    else{
      $wallet= DB::table('vv_wallet_transaction')->where('sub_admin_id',session('id'))->get();
    }
      return view('wallet.transition',
      ['wallet'=>$wallet]);

    }
    public function Delete($id)
    {
        $wallet= DB::table('vv_wallet_transaction')->where('wallet_transaction_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Padding(Request $request)
    {
      if(session('sub_admin')==0){
      $wallet= DB::table('vv_wallet_transaction')->where('payment_status','pending')->get();
    }
    else{
      $wallet= DB::table('vv_wallet_transaction')->where('payment_status','pending')->where('sub_admin_id',session('id'))->get();
    }
      return view('wallet.withdrawel-request',
      ['wallet'=>$wallet]);
    }
    public function Approved(Request $request)
    {
      if(session('sub_admin')==0){
        $wallet= DB::table('vv_wallet_transaction')->where('payment_status','approved')->get();
      }
      else{
        $wallet= DB::table('vv_wallet_transaction')->where('payment_status','approved')->where('sub_admin_id',session('id'))->get();
      }
      return view('wallet.withdrawel-request',
      ['wallet'=>$wallet]);
    }
    public function Sent(Request $request)
    {
      if(session('sub_admin')==0){
        $wallet= DB::table('vv_wallet_transaction')->where('payment_status','sent')->get();
      }
      else{
        $wallet= DB::table('vv_wallet_transaction')->where('payment_status','sent')->where('sub_admin_id',session('id'))->get();
      }
      
      return view('wallet.withdrawel-request',
      ['wallet'=>$wallet]);
    }
    public function Rejected(Request $request)
    {
      if(session('sub_admin')==0){
        $wallet= DB::table('vv_wallet_transaction')->where('payment_status','rejected')->get();
      }
      else{
        $wallet= DB::table('vv_wallet_transaction')->where('payment_status','rejected')->where('sub_admin_id',session('id'))->get();
      }
      return view('wallet.withdrawel-request',
      ['wallet'=>$wallet]);

    }
    public function Request(Request $request)
    {
      $banks= DB::table('banks')->LIMIT(10)->get();
      return view('wallet.request',
      ['banks'=>$banks]);
    }
    public function SubRequest(Request $request)
    {
      $id = session('id');
      $wallet= DB::table('vv_wallet_transaction')->where('sub_admin_id',$id)->get();
      return view('wallet.withdrawel-request',
      ['wallet'=>$wallet]);
    }
    public function Store(Request $request)
    {
      $min=request()->minimum_withdrawal_amount;
      $total=request()->wallet_balance;
      $withdraw=request()->withdraw_amount;

      if($min <= $withdraw AND $withdraw <= $total){
      $id1 = session('id');
      $id=DB::table('vv_wallet_transaction')->insertGetId([

        'wallet_transaction_code'	=>'',
        'invoice_no'	=>'',
        'user_id'	=>0,
        'sub_admin_id'=>$id1,	
        'payment_type_id'	=>0,
        'payment_type'=>request()->payment_type,
        'commission_amount'	=>0,
        'withdraw_amount'	=>request()->withdraw_amount,
        'currency'	=>'INR',
        'plan_type_id'	=>0,
        'plan_type_price'	=>0,
        'remarks'	=>'',
        'payment_status'=>'pending',	
        'request_date'=>now(),
        'bank_id'	=>0,
        'bank_name'	=>(request()->bank_name)==null?0:request()->bank_name,
        'branch_id'	=>0,
        'ref_no'	=>(request()->ref_no)==null?0:request()->ref_no,
        'cheque_no'	=>(request()->cheque_no)==null?NULL:request()->cheque_no,
        'cheque_date'	=>(request()->cheque_date)==null?NULL:request()->cheque_date,
        'created_at'=>now()
      ]);
      code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$id,'TRAN');
      code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$id,'ORD');
    
      return redirect()->route('wallet_paddind')->with('message' , 'Request was successful!');
    }
    else{
      return redirect()->back()->with('message' , ' Insufficient Balance');
    }
    }
}
