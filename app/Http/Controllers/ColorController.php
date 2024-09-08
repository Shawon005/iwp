<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function Index(Request $request)
    {
      $color=DB::table('vv_custom_css')->first();
      return view('CMS.color',
      ['color'=>$color]);

    }
    public function Update(Request $request)
    {
        DB::table('vv_custom_css')->where('custom_css_id',1)->update([  
        'home_search_btn_default'=> request()->home_search_btn_default,
        'home_search_btn_hover' => request()->home_search_btn_hover,
        'home_banner_btn_default' => request()->home_banner_btn_default,
        'home_banner_btn_hover' => request()->home_banner_btn_hover,
        'home_view_all_btn_default' => request()->home_view_all_btn_default,
        'home_view_all_btn_hover' => request()->home_view_all_btn_hover,
        'common_help_support_btn_default' => request()->common_help_support_btn_default,
        'common_help_support_btn_hover' =>request()->common_help_support_btn_hover,
        'home_submit_req_btn_default' => request()->home_submit_req_btn_default,
        'home_submit_req_btn_hover' => request()->home_submit_req_btn_hover,
        'common_blue_btn' => request()->common_blue_btn,
        'common_light_blue_btn' => request()->common_light_blue_btn,
        'common_red_btn' => request()->common_red_btn,
        'common_dark_red_btn' =>request()->common_dark_red_btn,
        'common_yellow_bottom_band' => request()->common_yellow_bottom_band,
        'common_yellow_1_bottom_band' => request()->common_yellow_1_bottom_band,
        'common_yellow_2_btn' =>request()->common_yellow_2_btn,
        'common_gray_color' => request()->common_gray_color,
        'common_green_color' => request()->common_green_color,
        'common_light_green_color' =>request()->common_light_green_color,
        'job_blue_color' => request()->job_blue_color,
        'job_orange_color' => request()->job_orange_color
        ]);
        return redirect()->route('color_setting')->with('message' , 'Store was successful!');
    }

}
