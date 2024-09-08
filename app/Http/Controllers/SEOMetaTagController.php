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
        return view('seo.seo-all-product-edit',
        ['page'=>$page]);
    }
    public function ALL_PRODUCT_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_products')->where('product_id',$id)->update([
            'seo_title'=>(request()->page_seo_title==null)?'':request()->page_seo_title,
            'seo_description'=>(request()->page_seo_description==null)?'':request()->page_seo_description,
            'seo_keywords'=>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,
        ]);
        return redirect()->route('seo_product')->with('message' , 'Update was successful!');
    }
    public function ALL_JOB(Request $request,$id)
    {
        $page=DB::table('vv_jobs')->where('job_id',$id)->first();
        return view('seo.seo-all-job-edit',
        ['page'=>$page]);
    }
    public function ALL_JOB_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_jobs')->where('job_id',$id)->update([
            'seo_title'=>(request()->page_seo_title==null)?'':request()->page_seo_title,
            'seo_description'=>(request()->page_seo_description==null)?'':request()->page_seo_description,
            'seo_keywords'=>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,
        ]);
        return redirect()->route('seo_job')->with('message' , 'Update was successful!');
    }
    public function ALL_EXPERT(Request $request,$id)
    {
        $page=DB::table('vv_experts')->where('expert_id',$id)->first();
        return view('seo.seo-all-expert-edit',
        ['page'=>$page]);
    }
    public function ALL_EXPERT_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_experts')->where('expert_id',$id)->update([
            'seo_title'=>(request()->page_seo_title==null)?'':request()->page_seo_title,
            'seo_description'=>(request()->page_seo_description==null)?'':request()->page_seo_description,
            'seo_keywords'=>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,
        ]);
        return redirect()->route('seo_expert')->with('message' , 'Update was successful!');
    }
    public function ALL_search(Request $request,$id)
    {
        $page=DB::table('vv_search_list')->where('search_list_id',$id)->first();
        return view('seo.admin-search-lists-add',
        ['page'=>$page]);
    }
    public function ALL_search_UPDATE(Request $request,$id)
    {
   // dd($request->all());
        $page=DB::table('vv_search_list')->where('search_list_id',$id)->update([
            'search_title'=>(request()->search_title==null)?'':request()->search_title,
            'search_tag_line'=>(request()->search_tag_line==null)?'':request()->search_tag_line,
            'search_list_link'=>(request()->search_list_link==null)?'':request()->search_list_link,
        ]);
        return redirect()->route('search_list')->with('message' , 'Update was successful!');
    }
    public function ALL_search_Store(Request $request)
    {
      // dd($request->all());
        $page=DB::table('vv_search_list')->insert([
            'search_title'=>(request()->search_title==null)?'':request()->search_title,
            'search_tag_line'=>(request()->search_tag_line==null)?'':request()->search_tag_line,
            'search_list_link'=>(request()->search_list_link==null)?'':request()->search_list_link,
            'search_list_position'=>0,
            'search_list_status'=>'Active',
            'search_list_cdt'=>now()
        ]);
        return redirect()->route('search_list')->with('message' , 'Store was successful!');
    }
    public function Position(Request $request)
    {
        $category=DB::table('vv_search_list')->orderBy('search_list_position','asc')->get();
        return view('seo.seo-category-position',
        ['category'=>$category]);
    }
   
    public function search_list(Request $request)
    {   
        $listing_category=DB::table('vv_search_list')->orderBy('search_list_position','asc')->get();
        return view('seo.search-list',
        ['listing_category'=>$listing_category]);
    }
    public function Position_Store(Request $request,$sort)
    {
        $no=0;
        preg_match_all('!\d+!', $sort, $arr);

        
        foreach($arr[0] as $id){
        
        DB::table('vv_search_list')->where('search_list_id',$id)->update([
          'search_list_position'=>$no++,
        ]);
      }
      
      return response()->json(['position']);
    }
    
}
