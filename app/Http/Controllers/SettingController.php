<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SettingController extends Controller
{
    public function Setting(Request $request)
    {
        $id=session('id');
      $setting=DB::table('vv_footer')->first();
      $admin=DB::table('vv_admin')->where('admin_id',$id)->first();
      $sub=DB::table('vv_sub_admin_type')->where('sub_admin_type_id',$admin->admin_id)->first();
      return view('setting.admin-site-setting',
      ['setting'=>$setting,'admin'=>$admin,'sub'=>$sub]);

    } 
    public function Store(Request $request)
    {
       // dd($request->all());
         DB::table('vv_footer')->where('footer_id',1)->update([
            'website_address'=>request()->website_name,
            'admin_primary_email'=>request()->admin_email,
            'currency_symbol'=>request()->currency_symbol,
            'admin_seo_title'=>request()->seo_title,  
            'admin_seo_description'=> request()->seo_description,  
            'admin_seo_keywords'=>request()->seo_keywords,  
            'admin_google_login'=> request()->admin_google_login, 
            'admin_facebook_login'=>request()->admin_facebook_login, 
            'admin_google_client_id'=>request()->client_id, 
            'admin_facebook_app_id'=>request()->app_id,
            'admin_geo_map_api'=>request()->google_geo_map,
            'admin_geo_default_latitude'=>request()->googlmap_view_default_latitudee_geo_map,
            'admin_geo_default_longitude'=>request()->map_view_default_longitude,
            'admin_geo_default_zoom'=>request()->map_view_default_zoom_size,  
            'admin_language'=>request()->admin_language, 
            'admin_countries'=>request()->admin_countries, 
            'admin_job_show'=>(request()->admin_job_show)==Null?0:1,
            'admin_expert_show'=>(request()->admin_expert_show)==Null?0:1, 
            'admin_blog_show'=>(request()->admin_blog_show)==Null?0:1,
            'admin_event_show'=>(request()->admin_event_show)==Null?0:1, 
            'admin_product_show'=>(request()->admin_product_show)==Null?0:1,
            'admin_news_show'=>(request()->admin_news_show)==Null?0:1, 
            'admin_place_show'=>(request()->admin_place_show)==Null?0:1, 
            'admin_coupon_show'=>(request()->admin_coupon_show)==Null?0:1, 
            'minimum_withdrawal_amount'=>request()->minimum_withdrawal_amount,
            'home_page_fav_icon'=>$this->uploadImage(request()->fav_icon,'f'),
            'home_page_banner'=>$this->uploadImage(request()->home_page_banne,'b'), 
            //dd($this->uploadImage(request()->home_page_banne,'b')),
        ]); 
        DB::table('vv_admin')->where('admin_id',1)->update([
            'admin_name'=>request()->name,
            'admin_email'=> request()->user_name, 
            'admin_password'=> request()->new_password, 
            'admin_recovery_email'=> request()->recovery_email,
            'admin_photo'=>$this->uploadImage(request()->profile_picture,'d') 
        ]);
        return redirect()->route('setting')->with('message' , 'Update was successful!');
    }
   
    public function URL(Request $request)
    {
      $setting=DB::table('vv_footer')->first();
      return view('setting.page-url',
      ['setting'=>$setting]);

    } 
    public function PAGE_URL(Request $request)
    {
        //dd($request->all());
         DB::table('vv_footer')->where('footer_id',1)->update([
          'all_listing_page_url' => request()->all_listing_page_url,
          'all_products_page_url' =>request()->all_products_page_url,
          'all_jobs_page_url' => request()->all_jobs_page_url,
          'all_experts_page_url' =>request()->all_experts_page_url,
          'all_news_page_url' => request()->all_news_page_url,
          'profile_page_url' =>request()->profile_page_url,
          'listing_page_url' => request()->listing_page_url,
          'job_page_url' =>request()->job_page_url,
          'service_expert_page_url' =>request()->service_expert_page_url,
          'news_page_url' => request()->news_page_url,
          'place_page_url' => request()->place_page_url,
          'job_profile_page_url' => request()->job_profile_page_url,
          'job_profile_creation_page_url' =>request()->job_profile_creation_page_url,
          'event_page_url' => request()->event_page_url,
          'blog_page_url' => request()->blog_page_url,
          'product_page_url' => request()->product_page_url,
          'company_page_url' => request()->company_page_url,
          'target_listing_page_url' =>request()->target_listing_page_url,
          'ebook_page_url' => request()->ebook_page_url,
          'promotion_page_url' => request()->promotion_page_url
         ]);
         return redirect()->route('setting_all_page')->with('message' , 'Update was successful!');
        }

        public function Dummy_image(Request $request)
        {
           // dd($request->all());
             DB::table('vv_footer')->where('footer_id',1)->update([

              'user_default_image'=>$this->uploadImage(request()->user_default_image,'z')
             ]);
             return redirect()->back()->with('message' , 'Update was successful!');
        }
        public  function uploadImage($file,$a)
        {
            $add=DB::table('vv_footer')->where('footer_id',1)->first();
            $d= DB::table('vv_admin')->where('admin_id',1)->first();
            if($file==null)
            {
            if($a=='f')
                return $add->home_page_fav_icon;
            elseif($a=='b')  
               return $add->home_page_banner;
            elseif($a=='z')  
            return $add->user_default_image;   
            else
              return $d->admin_photo;
            }
            else{
                $filename= Str::random().'.'.$file->getClientOriginalExtension();
               $file->move('storage/file/',$filename);
              return $filename;
            }
        }
}
