<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index(Request $request)
    {
      $order=DB::table('vv_orders')->orderBy('order_id','desc')->where('order_cancel',0)->get();
      return view('order.order',
      ['order'=>$order,'c'=>0]);

    }
    public function Delete($id)
    {
        DB::table('vv_orders')->where('order_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Delivery(Request $request,$id)
    {
      $ds_status=request()->order_approved_on;
      if ($ds_status== "confirmed") {
        $date = 'confirmed_date';
    } 
    
    else if ($ds_status== "packed") {
        $date = 'packed_date';
    }
    else if ($ds_status== "shipped") {
        $date = 'shipped_date';
    }
    else if ($ds_status== "out_for_delivery") {
        $date = 'out_for_delivery_date';
    } 
    else if ($ds_status== "delivered") {
        $date = 'delivered_date';
    }
        DB::table('vv_orders')->where('order_id',$id)->update([  
            'dispatch_status'=>request()->order_approved_on,
            'shipping_info'=>(request()->shipping_details==null)?'':request()->shipping_details,
             $date=>now()
    ]);

    return redirect()->back();
    }
    public function Approvel(Request $request,$id)
    {
      
        DB::table('vv_orders')->where('order_id',$id)->update([  
           'order_approve_status'=>request()->approve,
           'order_approved_on'=>now()
    ]);
    return redirect()->back();
    }
    public function Padding(Request $request)
    {
      $order=DB::table('vv_orders')->where('order_approve_status','pending')->where('order_cancel',0)->orderBy('order_id','desc')->get();
      return view('order.order',
      ['order'=>$order,'c'=>1]);

    }
    public function Approved(Request $request)
    {
      $order=DB::table('vv_orders')->Where('order_approve_status','confirmed')->where('order_cancel',0)->orderBy('order_id','desc')->get();
      return view('order.order',
      ['order'=>$order,'c'=>2]);

    }
    public function Delivered(Request $request)
    {
      $order=DB::table('vv_orders')->where('order_approve_status','delivered')->where('order_cancel',0)->orderBy('order_id','desc')->get();
      
      return view('order.order',
      ['order'=>$order,'c'=>3]);

    }
    public function Rejected(Request $request)
    {
      $order=DB::table('vv_orders')->where('order_approve_status','rejected')->where('order_cancel',0)->orderBy('order_id','desc')->get();
      return view('order.order',
      ['order'=>$order,'c'=>4]);

    }  
    public function Cancel(Request $request)
    {
      $order=DB::table('vv_orders')->where('order_cancel',1)->orderBy('order_id','desc')->get();
      return view('order.order',
      ['order'=>$order,'c'=>5]);

    }   
    public function view(Request $request,$id)
    {
      $order=DB::table('vv_orders')->where('order_id',$id)->first();
      return view('ui.new-ui.order-viwe',
      ['order'=>$order]);

    }

}

