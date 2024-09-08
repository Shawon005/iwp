<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SEOTargetController extends Controller
{
    public function Target(Request $request)
    {
        $listing=DB::table('vv_listings')->get();
        return view('seo.admin-seo-target-promotion-add-new-page',
        ['listing'=>$listing]);
    }
    public function Store(Request $request)
    {
        $request->validate([ 
            'page_listings'=>'required',
          ]);
        DB::table('vv_pages')->insert([
        'page_type' =>1,
        'page_name' =>request()->page_name,
        'page_name_2'  =>'',	
        'page_download_link' =>'', 	
        'page_image'  =>'',	
        'page_description' =>'', 	
        'page_css' =>'', 	
        'page_js'  =>'',	
        'page_listings' =>implode(',',request()->page_listings), 	
        'page_events' =>'', 	
        'page_blogs' =>'', 	
        'page_products' =>'', 	
        'page_template'  =>'',	
        'page_show_listings' =>0,	
        'page_show_events' =>0,
        'page_show_blogs'  =>0,	
        'page_show_products'  =>0,	
        'page_show_enquiry'  =>0,	
        'page_seo_title'  =>(request()->page_seo_title==null)?'':request()->page_seo_title,	
        'page_seo_keyword' =>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,	
        'page_seo_description' =>(request()->page_seo_description==null)?'':request()->page_seo_description,	
        'page_seo_schema' =>(request()->page_seo_schema==null)?'':request()->page_seo_schema,
        'page_slug'  =>Str::of(request()->page_name)->slug('-'),	
        'page_visibilty' =>'', 	
        'page_status'  =>'',	
        'page_last_edit' =>now(), 	
        'page_cdt' =>now()
        ]);
        return redirect()->route('seo_target')->with('message' , 'Store was successful!');
    }
    public function Edit(Request $request,$id)
    {
        $page=DB::table('vv_pages')->where('page_id',$id)->first();
        $listing=DB::table('vv_listings')->get();
        return view('seo.admin-seo-target-promotion-edit-page',
        ['page'=>$page,'listing'=>$listing]);
    }
    public function Update(Request $request, $id)
    {
        $request->validate([ 
            'page_listings'=>'required',
          ]);
        DB::table('vv_pages')->where('page_id',$id)->update([
            'page_name' =>request()->page_name,
            'page_listings' =>implode(',',request()->page_listings), 
            'page_seo_title'  =>(request()->page_seo_title==null)?'':request()->page_seo_title,	
            'page_seo_keyword' =>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,	
            'page_seo_description' =>(request()->page_seo_description==null)?'':request()->page_seo_description,	
            'page_seo_schema' =>(request()->page_seo_schema==null)?'':request()->page_seo_schema,
            'page_slug'  =>Str::of(request()->page_name)->slug('-'),	
            'page_last_edit' =>now(), 	
        ]);
        return redirect()->route('seo_target')->with('message' , 'Update was successful!');
    }
    public function Delete(Request $request,$id)
    {
        DB::table('vv_pages')->where('page_id',$id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
    }
}
