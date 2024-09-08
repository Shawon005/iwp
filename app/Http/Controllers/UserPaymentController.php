<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    public function Index(Request $request)
    {
        $payment=DB::table('vv_transactions')->where('user_id',session('user_id'))->get();
        
        return view('ui.old-ui.iwp-db-invoice-all',
        ['payment'=>$payment]);
    }
    public function Delete(Request $request,$id)
    {
        $payment=DB::table('vv_transactions')->where('transaction_id',$id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Edit(Request $request)
    {
       $user=DB::table('vv_users')->get();
       $plan=DB::table('vv_plan_type')->get();
       return view('payment.invoice.send-invoice',
       ['users'=>$user,'plan'=>$plan]);
    }
    public function Store(Request $request)
    {
    $id=DB::table('vv_transactions')->insertGetId([
	'transaction_code'=>'',
     'transaction_amount'=>request()->amount,
    'transaction_mode'=>'',
    'transaction_invoice'=>$this->uploadImage(request()->file),
    'user_code'=> '',
    'plan_type_id'=>request()->plan_id,
    'user_id'=>request()->user_id,
    'transaction_currency'=>'',
    'transaction_cdt'=>now()
    ]);
    code('vv_transactions','user_code','transaction_id',request()->user_id,'USER');
    code('vv_transactions','transaction_id','transaction_code',$id,'TRAN');
    return redirect()->route('all_invoice')->with('message' , 'Update was successful!');
    }

      public function All_Invoice(Request $request)
      {
       $invoice=DB::table('vv_transactions')->get();
       return view('payment.invoice.all-invoice',
       ['invoice'=>$invoice]);

      }
      public function I_Delete(Request $request,$id)
      {
          $payment=DB::table('vv_transactions')->where('transaction_id',$id)->delete();
          return redirect()->back()->with('message' , 'Delete was successful!');
      }
      public  function uploadImage($file)
      {
         $filename= Str::random().'.'.$file->getClientOriginalExtension();
         
             $file->move('storage/file/',$filename);
            return $filename;
      }
      public function PDF(Request $request)
      {
        
        $pdf = PDF::loadView('payment.invoice.create_invoice');
        
        //return $pdf->stream();
         return $pdf->download('invoice.pdf');
      }
}
