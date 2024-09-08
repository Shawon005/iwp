<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class HomePageController extends Controller
{
    public function Index(Request $request)
    {
        $top=DB::table('vv_homepage_top_section')->get();
        return view('CMS.top_section',
        ['top'=>$top]);
    }
    public function Edit(Request $request,$id)
    {
        $top=DB::table('vv_homepage_top_section')->where('top_section_id',$id)->first();
        return view('CMS.top_section_edit',
        ['top'=>$top]);
    }
    public function Update(Request $request,$id)
    {
        if(request()->top_section_image==Null)
        {
            $file=DB::table('vv_homepage_top_section')->where('top_section_id',$id)->first();
            $file=  $file->top_section_image;
        }
        else{$file=$this->uploadImage(request()->top_section_image);}
         
        DB::table('vv_homepage_top_section')->where('top_section_id',$id)->update([
            'top_section_title'=>request()->top_section_title,
            'top_section_link'=>request()->top_section_link,
            'top_section_image'=> $file,
            'top_section_description'=>request()->top_section_description,
            'top_section_link_text'=>request()->top_section_link_text
           
           ]);
           return redirect()->route('top_section_table')->with('message' , 'Update was successful!');
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    //TOP  CATEGORY

    public function Top_Index(Request $request)
    {
        $top=DB::table('vv_top_categories')->get();
        return view('CMS.top_category',
        ['top'=>$top]);
    }
    public function Top_Edit(Request $request,$id)
    {   $category=DB::table('vv_categories')->orderBy('category_filter_pos_id','asc')->get();
        $top=DB::table('vv_top_categories')->where('category_id',$id)->first();
        return view('CMS.top_category_edit',
        ['top'=>$top,'category'=>$category]);
    }
    public function Top_Update(Request $request,$id)
    {
        if(request()->category_image==NUll)
        {
            $file=DB::table('vv_top_categories')->where('category_id',$id)->first();
            $file=  $file->category_image;
        }
        else{$file=$this->uploadImage(request()->category_image);}
        DB::table('vv_top_categories')->where('category_id',$id)->update([
            'category_name'=>request()->category_name,
            'category_image'=> $file,
           ]);
           return redirect()->route('top_category_table')->with('message' , 'Update was successful!');
    }
    //Trend Category

    public function Trend_Index(Request $request)
    {
        $trend=DB::table('vv_trend_categories')->get();
        return view('CMS.trend_category',
        ['trend'=>$trend]);
    }
    public function Trend_Edit(Request $request,$id)
    {   $category=DB::table('vv_categories')->get();
        $trend=DB::table('vv_trend_categories')->where('category_id',$id)->first();
        return view('CMS.trend_category_edit',
        ['trend'=>$trend,'category'=>$category]);
    }
    public function Trend_Update(Request $request,$id)
    {
        if(request()->category_image==NUll)
        {
            $file=DB::table('vv_trend_categories')->where('category_id',$id)->first();
            $file=  $file->category_image;
        }
        else{$file=$this->uploadImage(request()->category_image);}
        DB::table('vv_trend_categories')->where('category_id',$id)->update([
            'category_name'=>request()->category_name,
            'category_image'=> $file,
           ]);
           return redirect()->route('trend_category_table')->with('message' , 'Update was successful!');
    }
    public function Business_Index(Request $request)
    {
        $popular=DB::table('vv_featured_listings')->get();
        return view('CMS.popular_business',
        ['popular'=>$popular]);
    }
    public function Business_Edit(Request $request,$id)
    {   $listing=DB::table('vv_listings')->get();
        $popular=DB::table('vv_featured_listings')->where('featured_listing_id',$id)->first();
        return view('CMS.popular_business_edit',
        ['listing'=>$listing,'popular'=>$popular]);
    }
    public function Business_Update(Request $request,$id)
    {
      
        DB::table('vv_featured_listings')->where('featured_listing_id',$id)->update([
            'listing_id'=>request()->listing_id,
           ]);
           return redirect()->route('popular_business_table')->with('message' , 'Update was successful!');
    }
}
