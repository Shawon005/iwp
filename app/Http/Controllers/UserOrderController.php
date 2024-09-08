<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserOrderController extends Controller
{
    public function Index(Request $request)
    {
      $order=DB::table('vv_orders')->where('user_id',session('user_id'))->orderBy('order_id','desc')->get();
      return view('ui.old-ui.iwp-my-orders',
      ['order'=>$order]);

    }
    public function Delete($id)
    {
      DB::table('vv_orders')->where('order_id',$id)->update([
        'order_cancel'=>1,
      ]);
      $user=DB::table('vv_users')->where('user_id',session('user_id'))->first();
     
      $order=DB::table('vv_orders')->where('order_id',$id)->first();
      
      $data['title']="Fototech India Magazine & Portal";
      $data['order_no']=$order->order_number;
      $data['user_name']=user(session('user_id'));
      $data['user_email']=$user->email_id;
      $data['admin_email']=Nam('vv_admin','admin_id',session('id'),'admin_email');
      
      Mail::send('order-cancel', ['data'=>$data], function($message) use ($data) {
        $message->to($data['user_email'])->subject
        ($data['title']);});
        Mail::send('order-cancel', ['data'=>$data], function($message) use ($data) {
        $message->to($data['admin_email'])->subject
        ($data['title']);});
    return redirect()->back()->with('message' , 'Order Cancel was successful!');
    }
    public function view(Request $request,$id)
    {
      $order=DB::table('vv_orders')->where('order_id',$id)->first();
      return view('ui.old-ui.order-viwe',
      ['order'=>$order]);

    }
}
