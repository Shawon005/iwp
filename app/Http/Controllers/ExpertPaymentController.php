<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExpertPaymentController extends Controller
{
    public function Index(Request $request)
    {
      $expert_payment=DB::table('vv_expert_payments')->get();
      return view('expert.payment.all-expert-payment',
      ['expert_payment'=>$expert_payment]);

    }
    public function Store(Request $request)
    {

        // $request->validate([
            
        //     'payment_name'=>'required',
        //     'payment_image'=>'required'
            
        // ]);
      
        //dd(request()->all());

       DB::table('vv_expert_payments')->insert([

                'payment_name'=>request()->payment_name,
                'payment_status'=>'Active',
                'payment_cdt'=>now()
                
               
          
            ]);
            
          return redirect()->route('expert_payment_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $payment = payment::find($payment_id);
        $payment = DB::table('vv_expert_payments')->where('payment_id',$id)->first();
        return view('expert.payment.admin-expert-edit-payment',
        ['payment'=>$payment]);
     
    }
    public function Update(Request $request,$id)
    {
        $request->validate([
            
            'payment_name'=>'required',
            
            
        ]);

        try{

            //dd(request()->all());
          DB::table('vv_expert_payments')->where('payment_id',$id)->update([
                'payment_name'=>request()->payment_name,
                
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('expert_payment_table')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Throwable $th) {
            //dd("data not");
            return redirect()->back()->withInput()->withErrors(getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Delete($id)
    {
      DB::table('vv_expert_payments')->where('payment_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Expert()
    {
  
        return view('expert.payment.admin-expert-add-new-payment',
        );
     
    }
}
