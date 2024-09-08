<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function Index(Request $request)
    {
     
      $notifi=DB::table('vv_notifications')->get();
      return view('other.all-notification',
      ['notifi'=>$notifi]);

    }
    public function Notification(Request $request)
    {
        $plan=DB::table('vv_plan_type')->get();
        return view('other.create-notification',
        ['plan'=>$plan]);
    }
    public function Store(Request $request)
    {
      
        //dd(request()->all());
       DB::table('vv_notifications')->insert([

                'notification_user'=>request()->notification_user,
                'notification_title'=>request()->notification_title,
                'notification_message'=>request()->notification_message,
                'notification_link'=>request()->notification_link,
                'notification_cdt'=>now()
            ]);
            
          return redirect()->route('notification_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $country = country::find($country_id);
     $notifi=DB::table('vv_notifications')->where('notification_id',$id)->first();
     $plan=DB::table('vv_plan_type')->get();
     return view('other.edit-notification',
     ['notifi'=>$notifi,'plan'=>$plan]);


     
    }
    public function Update(Request $request,$id)
    {
        try{

            //dd(request()->all());
          DB::table('vv_notifications')->where('notification_id',$id)->update([
            'notification_user'=>request()->notification_user,
            'notification_title'=>request()->notification_title,
            'notification_message'=>request()->notification_message,
            'notification_link'=>request()->notification_link
                
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('notification_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_notifications')->where('notification_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

}
