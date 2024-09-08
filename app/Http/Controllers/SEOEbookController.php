<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SEOEbookController extends Controller
{
    public function Target(Request $request)
    {
        $listing=DB::table('vv_listings')->get();
        $products=DB::table('vv_products')->get();
        $events=DB::table('vv_events')->get();
        $blogs=DB::table('vv_blogs')->get();
        return view('seo.admin-seo-ebook-add-new-page',
        ['listing'=>$listing,'products'=>$products,'events'=>$events,'blogs'=>$blogs]);
    }
    public function Store(Request $request)
    {
        $request->validate([ 
            'page_name'=>'required',	
        ]);
        DB::table('vv_pages')->insert([
        'page_type' =>3,
        'page_name' =>request()->page_name,
        'page_name_2'  =>'',	
        'page_download_link' =>'', 	
        'page_image'  =>'',	
        'page_description' =>(request()->page_description==null)?'':request()->page_description, 	
        'page_css' =>(request()->page_css==null)?'':request()->page_css, 	
        'page_js'  =>(request()->page_js==null)?'':request()->page_js,	
        'page_listings' =>((request()->page_listings==null)?'':implode(',',request()->page_listings)), 	
        'page_events' =>((request()->page_events==null)?'':implode(',',request()->page_events)), 	
        'page_blogs' =>((request()->page_blogs==null)?'':implode(',',request()->page_blogs)),  	
        'page_products' =>((request()->page_products==null)?'':implode(',',request()->page_products)), 	
        'page_template'  =>request()->page_template,	
        'page_show_listings' =>request()->page_show_listings,	
        'page_show_events' =>request()->page_show_events,
        'page_show_blogs'  =>request()->page_show_blogs,	
        'page_show_products'  =>request()->page_show_products,	
        'page_show_enquiry'  =>request()->page_show_enquiry,	
        'page_seo_title'  =>(request()->page_seo_title==null)?'':request()->page_seo_title,	
        'page_seo_keyword' =>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,	
        'page_seo_description' =>(request()->page_seo_description==null)?'':request()->page_seo_description,	
        'page_seo_schema' =>(request()->page_seo_schema==null)?'':request()->page_seo_schema,
        'page_slug'  =>Str::of(request()->page_name)->slug('-'),	
        'page_visibilty' =>(request()->page_visibilty==null)?'':request()->page_visibilty,  	
        'page_status'  =>(request()->page_status==null)?'':request()->page_status, 	
        'page_last_edit' =>now(), 	
        'page_cdt' =>now()
        ]);
        return redirect()->route('seo_ebook')->with('message' , 'Store was successful!');
    }
    public function Edit(Request $request,$id)
    {
        $page=DB::table('vv_pages')->where('page_id',$id)->first();
        $listing=DB::table('vv_listings')->get();
        $products=DB::table('vv_products')->get();
        $events=DB::table('vv_events')->get();
        $blogs=DB::table('vv_blogs')->get();
        return view('seo.ebook-edit',
        ['page'=>$page,'listing'=>$listing,'products'=>$products,'events'=>$events,'blogs'=>$blogs]);
    }
    public function Update(Request $request, $id)
    {
        $request->validate([ 
            'page_name'=>'required',	
        ]);
       // dd($request->all());
        DB::table('vv_pages')->where('page_id',$id)->update([
            'page_name' =>request()->page_name,
            'page_description' =>(request()->page_description==null)?'':request()->page_description, 	
            'page_css' =>(request()->page_css==null)?'':request()->page_css, 	
            'page_js'  =>(request()->page_js==null)?'':request()->page_js,	
            'page_listings' =>((request()->page_listings==null)?'':implode(',',request()->page_listings)), 	
            'page_events' =>((request()->page_events==null)?'':implode(',',request()->page_events)), 	
            'page_blogs' =>((request()->page_blogs==null)?'':implode(',',request()->page_blogs)),  	
            'page_products' =>((request()->page_products==null)?'':implode(',',request()->page_products)), 	
            'page_template'  =>request()->page_template,	
            'page_show_listings' =>request()->page_show_listings,	
            'page_show_events' =>request()->page_show_events,
            'page_show_blogs'  =>request()->page_show_blogs,	
            'page_show_products'  =>request()->page_show_products,	
            'page_show_enquiry'  =>request()->page_show_enquiry,	
            'page_seo_title'  =>(request()->page_seo_title==null)?'':request()->page_seo_title,	
            'page_seo_keyword' =>(request()->page_seo_keyword==null)?'':request()->page_seo_keyword,	
            'page_seo_description' =>(request()->page_seo_description==null)?'':request()->page_seo_description,	
            'page_seo_schema' =>(request()->page_seo_schema==null)?'':request()->page_seo_schema,
            'page_slug'  =>Str::of(request()->page_name)->slug('-'),	
            'page_visibilty' =>(request()->page_visibilty==null)?'':request()->page_visibilty,  	
            'page_status'  =>(request()->page_status==null)?'':request()->page_status, 
            'page_last_edit' =>now(), 	
        ]);
        return redirect()->route('seo_ebook')->with('message' , 'Update was successful!');
    }
    public function XML(Request $request)
    {
        
       $filename=request()->file('xml_file');
       $filename->move('storage/file/',$filename);
       return redirect()->back()->with('message' , 'Store was successful!');
    }
}
