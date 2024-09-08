<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
class MailController extends Controller
{
  
public function Email($email)
{
  $random=rand(10000,99999);
  $doman=URL::to('/');
  $url=$doman.'/'.'verifyEmail/'.$random;
  $data['url']=$url;
  $data['title']="Email Verification";
  $data['email']=$email;
  $data['body']="Please Click here to verify Your email";
  $data['code']=$random;
   
  Mail::send('mail', ['data'=>$data], function($message) use ($data) {
     $message->to($data['email'])->subject
        ($data['title']);
    });
   
   $id= DB::table('vv_users')->insertGetId([
      'first_name'=>'',
      'email_id'=>'',
      'password'=>'',
      'mobile_number'=>'',
      'profile_image'=>Nam('vv_footer','footer_id',1,'user_default_image'),
      'user_address'=>'',
      'user_type'=>'',
      'user_plan' =>0,
      'user_facebook'=>((request()->facebook)==null?'':request()->facebook),
      'user_twitter'=>((request()->twitter)==null?'':request()->twitter),
      'user_youtube'=>((request()->youtube)==null?'':request()->youtube),
      'user_website' =>((request()->website)==null?'':request()->website),
      'user_code'=>'',
      'last_name'=>'',
      'user_city'=>'',
      'user_country'=>'',
      'user_state'=>'',
      'user_zip_code'=>'',
      'user_contact_name'=>'',
      'user_contact_email'=>'',
      'user_contact_mobile'=>'',
      'password'=>'',
      'date_of_birth'=>'',
      'cover_image'=>'',
      'profile_id_proof'=>'',
      'paypal_email_id'=>'',
      'register_mode'=>'',
      'setting_review'=>0,
      'setting_share'=>0,
      'setting_profile_show' =>0,	
      'setting_guarantee_show' =>0,
      'setting_user_status' =>0,
      'user_status'=>'Active',
      'payment_status'=>'',
      'user_followers'=>'',
      'user_slug'=>'',
      'user_points'=>0,
      'verification_code'=>$random,
      'verification_link'=>$data['url'],
      'verification_status'=>0,
      'user_clear_notification_cdt'=>now(),
      'user_cdt' =>now()
     
    ]);
    return response()->json(['success']);
}
Public function Verify($id){
  // dd($id);
   $user=DB::table('vv_users')->where('verification_code',$id)->first();
   if($user!=null)
   {
      DB::table('vv_users')->where('verification_code',$id)->update([
         'verification_status'=>1,
       ]);
       return response()->json(['success']);
   }
}
}
