<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppearanceController extends Controller
{
    public function Logo(Request $request)
    {
      $setting=DB::table('vv_footer')->first();
      return view('Appearance.website-logo',
      ['setting'=>$setting]);

    }
    public function Store(Request $request)
    {
       // dd($request->all());
         DB::table('vv_footer')->where('footer_id',1)->update([
          'header_logo_width'=>request()->header_logo_width,
          'header_logo_height'=>request()->header_logo_height,
          'header_logo'=>$this->uploadImage(request()->header_logo)
         ]);
         return redirect()->route('website_logo')->with('message' , 'Update was successful!');
    }
    public  function uploadImage($file)
    {
        $add=DB::table('vv_footer')->where('footer_id',1)->first();
        if($file==null)
        {
          return $add->header_logo;
        }
        else{
            $filename= Str::random().'.'.$file->getClientOriginalExtension();
           $file->move('storage/file/',$filename);
          return $filename;
        }
    }
    public function Feature(Request $request)
    {
      $setting=DB::table('vv_footer')->first();
      return view('Appearance.Features',
      ['setting'=>$setting]);

    }
    
    public function Mobile(Request $request)
    {
        $add=DB::table('vv_footer')->where('footer_id',1)->first();
         DB::table('vv_footer')->where('footer_id',1)->update([
         'admin_mobile_app_feature'=>($add->admin_mobile_app_feature==1)?0:1,
         ]);
    }
    public function Touch(Request $request)
    {
        $add=DB::table('vv_footer')->where('footer_id',1)->first();
         DB::table('vv_footer')->where('footer_id',1)->update([
         'admin_get_in_touch_feature'=>($add->admin_get_in_touch_feature==1)?0:1,
         ]);
    }
    public function Download(Request $request)
    {
        $add=DB::table('vv_footer')->where('footer_id',1)->first();
         DB::table('vv_footer')->where('footer_id',1)->update([
         'admin_footer_mobile_app_feature'=>($add->admin_footer_mobile_app_feature==1)?0:1,
         ]);
    }
    public function Country(Request $request)
    {
        $add=DB::table('vv_footer')->where('footer_id',1)->first();
         DB::table('vv_footer')->where('footer_id',1)->update([
         'admin_country_list_feature'=>($add->admin_country_list_feature==1)?0:1,
         ]);
    }


}
