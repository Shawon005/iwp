<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SEOMetaTagController extends Controller
{
    public function ALL_PAGE(Request $request,$id)
    {
        $page=DB::table('vv_seo')->where('seo_page_id',$id)->first();
        return view('seo.all-page-seo',
        ['page'=>$page]);
    }
    public function ALL_PAGE_UPDATE(Request $request,$id)
    {
        $page=DB::table('vv_seo')->where('seo_page_id',$id)->update([
          'seo_page_title'=>request()->seo_page_title,
          'seo_page_description'=>request()->seo_page_description,
          'seo_page_keywords'=>request()->seo_page_keywords
        ]);
        return redirect()->route('all_page')->with('message' , 'Update was successful!');
    }
    public function ALL_LISTING(Request $request,$id)
    {
        $page=DB::table('vv_listings')->where('listing_id',$id)->first();
        return view('seo.seo-all-listing-edit',
        ['page'=>$page]);
    }
    public function ALL_LISTING_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_listings')->where('listing_id',$id)->update([
          'seo_title'=>(request()->page_seo_title==null)?'':request()->page_seo_title,
          'seo_description'=>(request()->page_seo_description==null)?'':request()->page_seo_description,
          'seo_keywords'=>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,
        ]);
        return redirect()->route('seo_listing')->with('message' , 'Update was successful!');
    }
    public function ALL_BLOG(Request $request,$id)
    {
        $page=DB::table('vv_blogs')->where('blog_id',$id)->first();
        return view('seo.all-blog-edit',
        ['page'=>$page]);
    }
    public function ALL_BLOG_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_blogs')->where('blog_id',$id)->update([
            'seo_title'=>(request()->page_seo_title==null)?'':request()->page_seo_title,
            'seo_description'=>(request()->page_seo_description==null)?'':request()->page_seo_description,
            'seo_keywords'=>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,
        ]);
        return redirect()->route('seo_blog')->with('message' , 'Update was successful!');
    }
    public function ALL_EVENT(Request $request,$id)
    {
        $page=DB::table('vv_events')->where('event_id',$id)->first();
        return view('seo.seo-all-event-edit',
        ['page'=>$page]);
    }
    public function ALL_EVENT_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_events')->where('event_id',$id)->update([
            'seo_title'=>(request()->page_seo_title==null)?'':request()->page_seo_title,
            'seo_description'=>(request()->page_seo_description==null)?'':request()->page_seo_description,
            'seo_keywords'=>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,
        ]);
        return redirect()->route('seo_event')->with('message' , 'Update was successful!');
    }
    public function ALL_PRODUCT(Request $request,$id)
    {
        $page=DB::table('vv_products')->where('product_id',$id)->first();
        return view('seo.seo-all-event-edit',
        ['page'=>$page]);
    }
    public function ALL_PROduct_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_products')->where('product_id',$id)->update([
            'seo_title'=>(request()->page_seo_title==null)?'':request()->page_seo_title,
            'seo_description'=>(request()->page_seo_description==null)?'':request()->page_seo_description,
            'seo_keywords'=>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,
        ]);
        return redirect()->route('seo_product')->with('message' , 'Update was successful!');
    }
    
}
