<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Http\Request;

class SubAdminController extends Controller
{
    public function Index(Request $request)
    {
        $admin=DB::table('vv_admin')->get();
        return view('sub-admin.all-sub-admin',
        ['admin'=>$admin]);
    }
    public function Store(Request $request)
    {
   
       $file=request()->file('admin_photo');

    
        if($file==NULL)
        {
          $file='profile.png';
        }
        else{
            $files=request()->file('file');
            $file= $this->uploadImage($file);
        }
        //dd($request->all());
        DB::table('vv_admin')->insert([
        'admin_type' =>request()->admin_type,
        'admin_name' =>request()->admin_name, 
        'admin_email' =>request()->admin_email,
        'admin_password'=>request()->admin_password,
        'admin_photo' =>$file,
        'admin_user_options' =>(request()->admin_user_options)==null?0:request()->admin_user_options,
        'admin_listing_options' =>(request()->admin_listing_options)==null?0:request()->admin_listing_options,
        'admin_event_options' =>(request()->admin_event_options)==null?0:request()->admin_event_options,
        'admin_blog_options' =>(request()->admin_blog_options)==null?0:request()->admin_blog_options,
        'admin_product_options' =>(request()->admin_product_options)==null?0:request()->admin_product_options,
        'admin_jobs_options' =>(request()->admin_jobs_options)==null?0:request()->admin_jobs_options,
        'admin_service_expert_options' =>(request()->admin_service_expert_options)==null?0:request()->admin_service_expert_options,
        'admin_news_options' =>(request()->admin_news_options)==null?0:request()->admin_news_options,
        'admin_seo_setting_options' =>(request()->admin_seo_setting_options)==null?0:request()->admin_seo_setting_options,
        'admin_appearance_options' =>(request()->admin_appearance_options)==null?0:request()->admin_appearance_options,
        'admin_category_options' =>(request()->admin_category_options)==null?0:request()->admin_category_options,
        'admin_product_category_options' =>(request()->admin_product_category_options)==null?0:request()->admin_product_category_options,
        'admin_enquiry_options' =>(request()->admin_enquiry_options)==null?0:request()->admin_enquiry_options,
        'admin_review_options' =>(request()->admin_review_options)==null?0:request()->admin_review_options,
        'admin_feedback_options' =>(request()->admin_feedback_options)==null?0:request()->admin_feedback_options, 
        'admin_notification_options' =>(request()->admin_notification_options)==null?0:request()->admin_notification_options,
        'admin_ads_options' =>(request()->admin_ads_options)==null?0:request()->admin_ads_options,
        'admin_home_options' =>(request()->admin_home_options)==null?0:request()->admin_home_options,
        'admin_country_options' =>(request()->admin_country_options)==null?0:request()->admin_country_options, 
        'admin_city_options' =>(request()->admin_city_options)==null?0:request()->admin_city_options, 
        'admin_listing_filter_options' =>(request()->admin_listing_filter_options)==null?0:request()->admin_listing_filter_options, 
        'admin_invoice_options' =>(request()->admin_invoice_options)==null?0:request()->admin_invoice_options,
        'admin_import_options' =>(request()->admin_import_options)==null?0:request()->admin_import_options,
        'admin_sub_admin_options' =>(request()->admin_sub_admin_options)==null?0:request()->admin_sub_admin_options, 
        'admin_text_options' =>(request()->admin_text_options)==null?0:request()->admin_text_options, 
        'admin_listing_price_options' =>(request()->admin_listing_price_options)==null?0:request()->admin_listing_price_options, 
        'admin_payment_options' =>(request()->admin_payment_options)==null?0:request()->admin_payment_options,
        'admin_setting_options' =>(request()->admin_setting_options)==null?0:request()->admin_setting_options, 
        'admin_footer_options' =>(request()->admin_footer_options)==null?0:request()->admin_footer_options,
        'admin_dummy_image_options' =>(request()->admin_dummy_image_options)==null?0:request()->admin_dummy_image_options,
        'admin_mail_template_options' =>(request()->admin_mail_template_options)==null?0:request()->admin_mail_template_options, 
        'admin_wallet_options' =>(request()->admin_wallet_options)==null?0:request()->admin_wallet_options,
        'expiry_date'=>now(),
        'activation_code'=>'',
        'activation_status'=>1,
        'admin_login'=>now(),
        'admin_cdt'=>now(),
        'admin_order_options'=>0,
        'admin_sub_admin_type_options'=>0,
        'admin_sub_admin_type'=>request()->admin_type,
        'activation_date'=>now(),
        'country_id'=>105,
        'state_id'=>(request()->state_id==null)?0:request()->state_id,
        'city_id'=>(request()->city_id==null)?0:request()->city_id,
        'admin_recovery_email'=>''

        ]);
        return redirect()->route('sub_admin_table')->with('message' , 'Store was successful!');
}
    public function Edit(Request $request,$id)
    {
    $sub=DB::table('vv_admin')->where('admin_id',$id)->first();
    $admin=DB::table('vv_sub_admin_type')->get();
    $state=DB::table('vv_states')->get();
    $city=DB::table('vv_cities')->get();
    return view('sub-admin.admin-sub-admin-edit',
        ['admin'=>$admin,'sub'=>$sub,'state'=>$state,'city'=>$city]);
    }
    public function Update(Request $request,$id)
    {
        $file=request()->file('admin_photo');

    
        if($file==NULL)
        {
            $fi=DB::table('vv_admin')->where('admin_id',$id)->first();
            $file=$fi->admin_photo;
        }
        else{
            $files=request()->file('file');
            $file= $this->uploadImage($file);
        }
        DB::table('vv_admin')->where('admin_id',$id)->update([
            'admin_type' =>request()->admin_type,
            'admin_name' =>request()->admin_name, 
            'admin_email' =>request()->admin_email,
            'admin_password'=>request()->admin_password,
            'admin_photo' =>$file,
            'admin_user_options' =>(request()->admin_user_options)==null?0:request()->admin_user_options,
            'admin_listing_options' =>(request()->admin_listing_options)==null?0:request()->admin_listing_options,
            'admin_event_options' =>(request()->admin_event_options)==null?0:request()->admin_event_options,
            'admin_blog_options' =>(request()->admin_blog_options)==null?0:request()->admin_blog_options,
            'admin_product_options' =>(request()->admin_product_options)==null?0:request()->admin_product_options,
            'admin_jobs_options' =>(request()->admin_jobs_options)==null?0:request()->admin_jobs_options,
            'admin_service_expert_options' =>(request()->admin_service_expert_options)==null?0:request()->admin_service_expert_options,
            'admin_news_options' =>(request()->admin_news_options)==null?0:request()->admin_news_options,
            'admin_seo_setting_options' =>(request()->admin_seo_setting_options)==null?0:request()->admin_seo_setting_options,
            'admin_appearance_options' =>(request()->admin_appearance_options)==null?0:request()->admin_appearance_options,
            'admin_category_options' =>(request()->admin_category_options)==null?0:request()->admin_category_options,
            'admin_product_category_options' =>(request()->admin_product_category_options)==null?0:request()->admin_product_category_options,
            'admin_enquiry_options' =>(request()->admin_enquiry_options)==null?0:request()->admin_enquiry_options,
            'admin_review_options' =>(request()->admin_review_options)==null?0:request()->admin_review_options,
            'admin_feedback_options' =>(request()->admin_feedback_options)==null?0:request()->admin_feedback_options, 
            'admin_notification_options' =>(request()->admin_notification_options)==null?0:request()->admin_notification_options,
            'admin_ads_options' =>(request()->admin_ads_options)==null?0:request()->admin_ads_options,
            'admin_home_options' =>(request()->admin_home_options)==null?0:request()->admin_home_options,
            'admin_country_options' =>(request()->admin_country_options)==null?0:request()->admin_country_options, 
            'admin_city_options' =>(request()->admin_city_options)==null?0:request()->admin_city_options, 
            'admin_listing_filter_options' =>(request()->admin_listing_filter_options)==null?0:request()->admin_listing_filter_options, 
            'admin_invoice_options' =>(request()->admin_invoice_options)==null?0:request()->admin_invoice_options,
            'admin_import_options' =>(request()->admin_import_options)==null?0:request()->admin_import_options,
            'admin_sub_admin_options' =>(request()->admin_sub_admin_options)==null?0:request()->admin_sub_admin_options, 
            'admin_text_options' =>(request()->admin_text_options)==null?0:request()->admin_text_options, 
            'admin_listing_price_options' =>(request()->admin_listing_price_options)==null?0:request()->admin_listing_price_options, 
            'admin_payment_options' =>(request()->admin_payment_options)==null?0:request()->admin_payment_options,
            'admin_setting_options' =>(request()->admin_setting_options)==null?0:request()->admin_setting_options, 
            'admin_footer_options' =>(request()->admin_footer_options)==null?0:request()->admin_footer_options,
            'admin_dummy_image_options' =>(request()->admin_dummy_image_options)==null?0:request()->admin_dummy_image_options,
            'admin_mail_template_options' =>(request()->admin_mail_template_options)==null?0:request()->admin_mail_template_options, 
            'admin_wallet_options' =>(request()->admin_wallet_options)==null?0:request()->admin_wallet_options,
            'state_id'=>(request()->state_id==null)?0:request()->state_id,
            'city_id'=>(request()->city_id==null)?0:request()->city_id,
            'admin_sub_admin_type'=>request()->admin_type,
        ]);
        return redirect()->route('sub_admin_table')->with('message' , 'Update was successful!');
    }
    public function Delete(Request $request,$id)
    {
      DB::table('vv_admin')->where('admin_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    } 
    public function Sub(Request $request)
    {
     $admin=DB::table('vv_sub_admin_type')->get();
     $state=DB::table('vv_states')->get();
     $city=DB::table('vv_cities')->get();
     return view('sub-admin.admin-sub-admin-create',
        ['admin'=>$admin,'state'=>$state,'city'=>$city]);
    } 

    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }      

}
