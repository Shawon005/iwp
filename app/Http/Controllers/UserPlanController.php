<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;
class UserPlanController extends Controller
{
    public function Index(Request $request)
    {
      $users=session('user_id');
      $user=DB::table('vv_users')->where('user_id',$users)->first();
      $plan=DB::table('vv_plan_type')->where('plan_type_id',$user->user_plan)->first();
      return view('ui.old-ui.iwp-db-payment',
      ['plan'=>$plan,'user'=>$user]);

    }
    public function Plan(Request $request)
    {
      $plan=DB::table('vv_plan_type')->get();
      return view('ui.old-ui.iwp-db-plan-change',
      ['plan'=>$plan]);

    }
    public function Store(Request $request,$id=null,$plan=null)
    {
     if($plan==null){
      DB::table('vv_users')->where('user_id',session('user_id'))->update([
        'user_plan'=>1,
        'user_type'=>'General'
       ]);
       
       return redirect()->back()->with('message' , 'Update was successful!');
     }
      $api = new Api(Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id'),Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id_secret'));
      $payment = $api->payment->fetch($id);

      if($payment!=null) 
      {
          try 
          {
              $response = $api->payment->fetch($id)->capture(array('amount'=>$payment['amount'])); 

          } 
          catch (\Exception $e) 
          {
              return  $e->getMessage();
              \Session::put('error',$e->getMessage());
              return redirect()->back();
          }            
      }
      DB::table('vv_users')->where('user_id',session('user_id'))->update([
       'user_plan'=>$plan,
       'user_type'=>'Service provider'
      ]);
      if($plan==4){
      $ex=DB::table('vv_experts')->insertGetId([                
        'user_id'=>session('user_id'),
        'profile_name'=>user(session('user_id')),
        'state_id'=>0,
        'user_plan'=>4,
        'expert_availability_status'=>0,
        'seo_title'=>'',
        'seo_description'=>'',
        'seo_keywords'=>'',
        'profile_image'=>Nam('vv_footer','footer_id',1,'user_default_image'),
      ]);
      code('vv_experts','expert_code','expert_id',$ex,'EXPERT-SERVICE');
      DB::table('vv_user_company')->insert([ 
        'user_id'=>session('user_id'),
        "company_name" => '',
        "company_address" =>'',
        "company_mobile" =>'',
        "company_email_id" =>'',
        "company_website" => '',
        "company_tax" => '',
        "company_facebook" =>'',
        "company_twitter" =>'',
        "company_linkedin" => '',
        "company_instagram" => '',
        "company_youtube" => '',
        "company_whatsapp" =>'',
        "company_description" =>'',
        "company_seo_description" =>'',
        "company_seo_keywords" =>'',
        "company_profile_photo"  =>Nam('vv_footer','footer_id',1,'user_default_image'),
        "company_banner_photo"  =>'',
        "company_header_photo" =>'',
        'company_listings'=>'',
        'company_products'=>'',
        'company_blogs'=>'',
        'company_events'=>'',
        'company_slug'=>'',
        'company_status'=>'',
        'company_cdt'=>now()
      ]);
    }
      return redirect()->back()->with('message' , 'Update was successful!');
    }
    public function Buy(Request $request,$id,$point)
    {
      $api = new Api(Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id'),Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id_secret'));
      $payment = $api->payment->fetch($id);

      if($payment!=null) 
      {
          try 
          {
              $response = $api->payment->fetch($id)->capture(array('amount'=>$payment['amount'])); 

          } 
          catch (\Exception $e) 
          {
              return  $e->getMessage();
              \Session::put('error',$e->getMessage());
              return redirect()->back();
          }            
      }
       // dd($id);
       
        
      //dd($request->all());
      $old=Nam('vv_users','user_id',session('user_id'),'user_points');
      DB::table('vv_users','user_id',session('user_id'),'user_points')->update([
        'user_points'=>$old+$point,
      ]);

      DB::table('vv_all_points_enquiry')->insert([
       'user_id'=>session('user_id'),
       'new_points'=>$point,
       'total_cost'=>$point*Nam('vv_footer','footer_id',1,'cost_per_point'),
       'all_points_status'=>'paid',
       'all_points_cdt'=>now()
      ]);
      return redirect()->route('user/dasboard')->with('message' , 'Request was successful!');
    }
    public function Point_D(Request $request,$id)
    {
      DB::table('vv_all_points_enquiry')->where('all_points_enquiry_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }



}
