<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductWalletController extends Controller
{
    public function Wallet(Request $request)
    {
      $id = session('id');
      
      $admin = DB::table('vv_admin')->where('admin_id',$id)->first();
      return view('product-wallet.product-wallet-dashboard',
      ['admin'=>$admin->admin_name]);

    }
    public function Index(Request $request)
    {
      $product_wallet= DB::table('vv_wallet_affiliate_transaction')->get();
      return view('product-wallet.product-withdrawel-request',
      ['product_wallet'=>$product_wallet]);

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

      DB::table('vv_wallet_affiliate_transaction')->where('wallet_transaction_id',$id)->update([
       'payment_status'=>request()->status,
       'remarks'=>(request()->remarks==null)?'':request()->remarks,
       $date=>now(),
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
      $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('payment_status','product-affiliation')->get();
      return view('product-wallet.product-withdrawel-request',
      ['product_wallet'=>$product_wallet]);
    }
    public function Approved(Request $request)
    {
        $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('payment_status','approved')->get();
      return view('product-wallet.product-withdrawel-request',
      ['product_wallet'=>$product_wallet]);
    }
    public function Sent(Request $request)
    {
        $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('payment_status','sent')->get();
      
      return view('product-wallet.product-withdrawel-request',
      ['product_wallet'=>$product_wallet]);
    }
    public function Rejected(Request $request)
    {
        $product_wallet= DB::table('vv_wallet_affiliate_transaction')->where('payment_status','rejected')->get();
      return view('product-wallet.product-withdrawel-request',
      ['product_wallet'=>$product_wallet]);

    }
}
