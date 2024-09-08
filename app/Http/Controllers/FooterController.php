<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function Footer(Request $request)
    {
      $products=DB::table('vv_product_categories')->get();
      $footer=DB::table('vv_footer')->first();
      return view('CMS.footer',
      ['footer'=>$footer,'products'=>$products]);

    } 
    public function Store(Request $request)
    {
   // dd($request->all());
     DB::table('vv_footer')->where('footer_id',1)->update([
        'footer_mobile' =>(request()->footer_mobile==null)?'':request()->footer_mobile,
        'top_category_1' =>(request()->top_category_1==null)?0:request()->top_category_1,
        'top_category_2' =>(request()->top_category_2==null)?0:request()->top_category_2, 
        'top_category_3' =>(request()->top_category_3==null)?0:request()->top_category_3, 
        'top_category_4' =>(request()->top_category_4==null)?0:request()->top_category_4, 
        'top_category_5' =>(request()->top_category_5==null)?0:request()->top_category_5, 
        'top_category_6' =>(request()->top_category_6==null)?0:request()->top_category_6,
        'top_category_7' =>(request()->top_category_7==null)?0:request()->top_category_7, 
        'top_category_8' =>(request()->top_category_8==null)?0:request()->top_category_8,
        'trend_category_1' =>(request()->trend_category_1==null)?0:request()->trend_category_1, 
        'trend_category_2' =>(request()->trend_category_2==null)?0:request()->trend_category_2, 
        'trend_category_3' =>(request()->trend_category_3==null)?0:request()->trend_category_3, 
        'trend_category_4' =>(request()->trend_category_4==null)?0:request()->trend_category_4, 
        'trend_category_5' =>(request()->trend_category_5==null)?0:request()->trend_category_5,
        'trend_category_6' =>(request()->trend_category_6==null)?0:request()->trend_category_6,
        'trend_category_7' =>(request()->trend_category_7==null)?0:request()->trend_category_7, 
        'trend_category_8' =>(request()->trend_category_8==null)?0:request()->trend_category_8, 
        'footer_address' =>(request()->footer_address==null)?'':request()->footer_address, 
        'mobile_app_andriod' =>(request()->mobile_app_andriod==null)?'':request()->mobile_app_andriod, 
        'mobile_app_ios' =>(request()->mobile_app_ios==null)?'':request()->mobile_app_ios, 
        'footer_fb' =>(request()->footer_fb==null)?'':request()->footer_fb, 
        'footer_twitter' =>(request()->footer_twitter==null)?'':request()->footer_twitter, 
        'footer_linked_in' =>(request()->footer_linked_in==null)?'':request()->footer_linked_in,
        'footer_youtube' =>(request()->footer_youtube==null)?'':request()->footer_youtube, 
        'footer_whatsapp' =>(request()->footer_whatsapp==null)?'':request()->footer_whatsapp, 
        'footer_page_name_1' =>(request()->footer_page_name_1==null)?'':request()->footer_page_name_1, 
        'footer_page_url_1' =>(request()->footer_page_url_1==null)?'':request()->footer_page_url_1,
        'footer_page_name_2' =>(request()->footer_page_name_2==null)?'':request()->footer_page_name_2, 
        'footer_page_url_2' =>(request()->footer_page_url_2==null)?'':request()->footer_page_url_2,
        'footer_page_name_3' =>(request()->footer_page_name_3==null)?'':request()->footer_page_name_3, 
        'footer_page_url_3' =>(request()->footer_page_url_3==null)?'':request()->footer_page_url_3,
        'footer_page_name_4' =>(request()->footer_page_name_4==null)?'':request()->footer_page_name_4,
        'footer_page_url_4' =>(request()->footer_mobile==null)?'':request()->footer_mobile, 
        'footer_country_name_1' =>(request()->footer_country_name_1==null)?'':request()->footer_country_name_1, 
        'footer_country_url_1' =>(request()->footer_country_url_1==null)?'':request()->footer_country_url_1, 
        'footer_country_name_2' =>(request()->footer_country_name_2==null)?'':request()->footer_country_name_2,
        'footer_country_url_2' =>(request()->footer_country_url_2==null)?'':request()->footer_country_url_2, 
        'footer_country_name_3' =>(request()->footer_country_name_3==null)?'':request()->footer_country_name_3,
        'footer_country_url_3' =>(request()->footer_country_url_3==null)?'':request()->footer_country_url_3,
        'footer_country_name_4' =>(request()->footer_country_name_4==null)?'':request()->footer_country_name_4,
        'footer_country_url_4' =>(request()->footer_country_url_4==null)?'':request()->footer_country_url_4,
        'footer_country_name_5' =>(request()->footer_mobile==null)?'':request()->footer_mobile, 
        'footer_country_url_5' =>(request()->footer_country_url_5==null)?'':request()->footer_country_url_5, 
        'footer_country_name_6' =>(request()->footer_country_name_6==null)?'':request()->footer_country_name_6,
        'footer_country_url_6' =>(request()->footer_country_url_6==null)?'':request()->footer_country_url_6, 
        'footer_country_name_7' =>(request()->footer_country_name_7==null)?'':request()->footer_country_name_7,
        'footer_country_url_7' =>(request()->footer_country_url_7==null)?'':request()->footer_country_url_7,
        'copyright_year' =>(request()->copyright_year==null)?'':request()->copyright_year, 
        'copyright_website' =>(request()->copyright_website==null)?'':request()->copyright_website, 
        'copyright_website_link' =>(request()->copyright_website_link==null)?'':request()->copyright_website_link, 
       ]);
       return redirect()->route('footer')->with('message' , 'Update was successful!');
    }
}
