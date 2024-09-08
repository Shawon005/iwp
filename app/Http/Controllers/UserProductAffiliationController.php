<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserProductAffiliationController extends Controller
{
    public function Wallet(Request $request)
    {
      $ads=DB::table('vv_wallet_affiliate_transaction')->where('ref_user_id',session('user_id'))->get();
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
      $product_wallet= DB::table('vv_wallet_affiliate_transaction')->get();
      $admin = DB::table('vv_users')->where('user_id',session('user_id'))->first();
      $Pending=DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','pending')->count('user_id');
      $Received=DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','approved')->count('user_id');
      $Rejected=DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','rejected')->count('user_id');
      return view('ui.old-ui.iwp-affiliate-dashboard',
      ['admin'=>$admin->first_name,'wallet'=>$product_wallet,
    'Pending'=>$Pending,'Received'=>$Received,'Rejected'=>$Rejected,'amount'=>$bal]);

    }
    public function Index(Request $request)
    {
      $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','!=','product-affiliation')->where('withdraw_amount','!=',0)->get();
      return view('ui.old-ui.iwp-affiliate-withdrawal-history',
      ['product_wallet'=>$product_wallet]);

    }
    public function C_Index(Request $request)
    {
      $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('ref_user_id',session('user_id'))->where('commission_amount','!=',0)->get();
      return view('ui.old-ui.iwp-affiliate-commission-history',
      ['product_wallet'=>$product_wallet]);

    }
    public function Status(Request $request,$id)
    {
     
      DB::table('vv_wallet_affiliate_transaction')->where('wallet_transaction_id',$id)->update([
       'payment_status'=>request()->status,
       'remarks'=>(request()->remarks==null)?'':request()->remarks,
      ]);
      return redirect()->back();
    }
    public function Tran(Request $request)
    {
      $wallet= DB::table('vv_wallet_affiliate_transaction')->where('payment_status','sent')->get();
      return view('product-wallet.transition',
      ['wallet'=>$wallet]);

    }
    public function Delete($id)
    {
        $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('wallet_transaction_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Padding(Request $request)
    {
      $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','pending')->get();
      return view('ui.old-ui.iwp-affiliate-withdrawal-history',
      ['product_wallet'=>$product_wallet]);
    }
    public function Approved(Request $request)
    {
        $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','approved')->get();
      return view('ui.old-ui.iwp-affiliate-withdrawal-history',
      ['product_wallet'=>$product_wallet]);
    }
    public function Sent(Request $request)
    {
        $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','sent')->get();
      
      return view('ui.old-ui.iwp-affiliate-withdrawal-history',
      ['product_wallet'=>$product_wallet]);
    }
    public function Rejected(Request $request)
    {
        $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('user_id',session('user_id'))->where('payment_status','rejected')->get();
      return view('ui.old-ui.iwp-affiliate-withdrawal-history',
      ['product_wallet'=>$product_wallet]);

    }
    public function Request(Request $request)
    {
      $banks= DB::table('banks')->LIMIT(10)->get();
      return view('ui.old-ui.iwp-affiliate-withdrawal-request',
      ['banks'=>$banks]);
    }
    public function Store(Request $request)
    {
      $min=request()->minimum_withdrawal_amount;
      $total=request()->wallet_balance;
      $withdraw=request()->withdrawal_amount;

      if($min <= $withdraw AND $withdraw <= $total){
      //dd($request->all());
      $id1 = session('user_id');
      $id=DB::table('vv_wallet_affiliate_transaction')->insertGetId([

        'wallet_transaction_code'	=>'',
        'invoice_no'	=>'',
        'user_id'	=>session('user_id'),
        'payment_type_id'=>0,
        'payment_type'=>request()->payment_type,
        'commission_amount'	=>0,
        'withdraw_amount'	=>request()->withdrawal_amount,
        'currency'	=>'INR',
        'order_lineitem_id'=>0,
        'ref_user_id'=>session('user_id'),
        'remarks'	=>'',
        'payment_status'=>'pending',	
        'request_date'=>now(),
        'bank_id'	=>0,
        'bank_name'	=>(request()->bank_name)==null?'':request()->bank_name,
        'branch_id'	=>0,
        'ref_no'	=>(request()->ref_no)==null?0:request()->ref_no,
        'cheque_no'	=>(request()->cheque_no)==null?'':request()->cheque_no,
        'cheque_date'	=>(request()->cheque_date)==null?now():request()->cheque_date,
        'created_at'=>now(),
        'approved_date'=>now(),
        'sent_date'=>now(),
        'reject_date'=>now(),
      ]);
      code('vv_wallet_affiliate_transaction','wallet_transaction_code','wallet_transaction_id',$id,'TRAN');
      code('vv_wallet_affiliate_transaction','invoice_no','wallet_transaction_id',$id,'INV');

      return redirect()->route('user_product_wallet_pending')->with('message' , 'Request was successful!');
    }
    else{
      return redirect()->back()->with('message' , ' Insufficient Balance');
    }
    }
}
