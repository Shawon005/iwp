<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserSeoController extends Controller
{
    public function Index(Request $request)
    {
        $listing=DB::table('vv_listings')->where('user_id',session('user_id'))->get();
        $event=DB::table('vv_events')->where('user_id',session('user_id'))->get();
        $product=DB::table('vv_products')->where('user_id',session('user_id'))->get();
        return view('ui.old-ui.iwp-db-seo',
        ['listings'=>$listing,'events'=>$event,'products'=>$product]);
    }
    public function Edit(Request $request,$type,$id)
    {
        if($type=='listing'){
          $listing=DB::table('vv_listings')->where('listing_id',$id)->first();
          return view('ui.old-ui.iwp-seo-edit',
          ['type'=>'listing','name'=>$listing->listing_name,'id'=>$id]);
        }
        if($type=='event'){
            $listing=DB::table('vv_events')->where('event_id',$id)->first();
            return view('ui.old-ui.iwp-seo-edit',
            ['type'=>'event','name'=>$listing->event_name,'id'=>$id]);
          }
        if($type=='product'){
            $listing=DB::table('vv_products')->where('product_id',$id)->first();
            return view('ui.old-ui.iwp-seo-edit',
            ['type'=>'product','name'=>$listing->product_name,'id'=>$id]);
        }  
    }
    public function Update(Request $request,$type,$id)
    {
        if($type=='listing'){
          $table='vv_listings';
          $row='listing_id';
        }
        if($type=='event')
        {
            $table='vv_events';
            $row='event_id';
        }
        if($type=='product')
        {
            $table='vv_products';
            $row='product_id';
        }
            $listing=DB::table($table)->where($row,$id)->update([
             'seo_title'=>request()->seo_title,
             'seo_description'=>request()->seo_description,
             'seo_keywords'=>request()->seo_keywords
            ]);
            return redirect()->route('db-seo')->with('message' , 'Update was successful!');;
    
}
}
