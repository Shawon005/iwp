<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GateWayController extends Controller
{
    public function Index(Request $request)
    {
      $footer=DB::table('vv_footer')->first();
      return view('payment.gateway.payment-gateway',
      ['footer'=>$footer]);

    }
    public function Free(Request $request)
    {
        $footer=DB::table('vv_footer')->first();
        return view('payment.gateway.free',
        ['footer'=>$footer]);
    }
    public function Paypal(Request $request)
    {
        $footer=DB::table('vv_footer')->first();
        return view('payment.gateway.paypal',
        ['footer'=>$footer]);
    }
    public function Stripe(Request $request)
    {
        $footer=DB::table('vv_footer')->first();
        return view('payment.gateway.stripe',
        ['footer'=>$footer]);
    }
    public function Razorpay(Request $request)
    {
        $footer=DB::table('vv_footer')->first();
        return view('payment.gateway.razon',
        ['footer'=>$footer]);
    }
    public function Paytm(Request $request)
    {
        $footer=DB::table('vv_footer')->first();
        return view('payment.gateway.paytm',
        ['footer'=>$footer]);
    }
    public function Free_Update(Request $request)
    {

      DB::table('vv_footer')->where('footer_id',1)->update([
        "admin_cod_status"=>request()->admin_cod_status
      ]);
      return redirect()->route('payment_gateway')->with('message' , 'Update was successful!');

    }
    public function Paypal_Update(Request $request)
    {
        DB::table('vv_footer')->where('footer_id',1)->update([
            "admin_paypal_id" => request()->admin_paypal_id,
            "admin_paypal_currency_code" => request()->admin_paypal_currency_code,
            "admin_paypal_status" =>request()->admin_paypal_status
          ]);
          return redirect()->route('payment_gateway')->with('message' , 'Update was successful!');
    }
    public function Stripe_Update(Request $request)
    {
        DB::table('vv_footer')->where('footer_id',1)->update([
            "admin_stripe_id" => request()->admin_stripe_id,
            "admin_stripe_secret_id" => request()->admin_stripe_secret_id,
            "admin_stripe_currency_code" => request()->admin_stripe_currency_code,
            "admin_stripe_status" => request()->admin_stripe_status
          ]);
          return redirect()->route('payment_gateway')->with('message' , 'Update was successful!');
    }
    public function Razorpay_Update(Request $request)
    {
        DB::table('vv_footer')->where('footer_id',1)->update([
            "admin_razor_pay_key_id" => request()->admin_razor_pay_key_id,
            "admin_razor_pay_key_id_secret" =>request()->admin_razor_pay_key_id_secret,
            "admin_razor_pay_currency_code" =>request()->admin_razor_pay_currency_code,
            "admin_razor_pay_status" =>request()->admin_razor_pay_status
          ]);
          return redirect()->route('payment_gateway')->with('message' , 'Update was successful!');
    }
    public function Paytm_Update(Request $request)
    {
        DB::table('vv_footer')->where('footer_id',1)->update([
            "admin_paytm_merchant_id" => request()->admin_paytm_merchant_id,
            "admin_paytm_merchant_key" => request()->admin_paytm_merchant_key,
            "admin_paytm_merchant_website" => request()->admin_paytm_merchant_website,
            "admin_paytm_status" => request()->admin_paytm_status
          ]);
          return redirect()->route('payment_gateway')->with('message' , 'Update was successful!');
    }

}
