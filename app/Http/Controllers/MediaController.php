<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function Media(Request $request)
    {
      $event=DB::table('vv_events')->get();
      $product=DB::table('vv_products')->get();
      $expert=DB::table('vv_experts')->get();
      $blog=DB::table('vv_blogs')->get();
      $listing=DB::table('vv_listings')->get();
      $job=DB::table('vv_jobs')->get();
      $discount=DB::table('vv_products')->where('discount_type','!=',0)->get();
      return view('Appearance.media-library',
      ['listing'=>$listing,'event'=>$event,'product'=>$product,'blog'=>$blog,'expert'=>$expert,'job'=>$job,'discount'=>$discount]);
    }
}
