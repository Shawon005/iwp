<?php

namespace App\Http\Controllers;
use Razorpay\Api\Api;
use Session;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    public function razorpay()
    {        
        return view('ui.razor.index');
    }

    public function payment(Request $request)
    {        
        $input = $request->all();        
        //dd($request->all());
        $api = new Api('rzp_test_o3f1AlZpRQnDdA', 'oukv4n8JVYLl8FTIDijsb5m7');
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } 
            catch (\Exception $e) 
            {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }            
        }
        
        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }
    public function pay(Request $request,$id)
    {
      $sql=DB::table('vv_plan_type')->where('plan_type_id',$id)->first();
      $value=$sql->plan_type_price;
      session(['price']);
      session(['price' => $value]);
      
      return response()->json([$value]);
    }
}
