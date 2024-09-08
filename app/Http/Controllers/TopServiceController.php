<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TopServiceController extends Controller
{
    public function Index(Request $request)
    {
        $top_service=DB::table('vv_top_service_providers')->get();
        return view('CMS.top_service',
        ['top_service'=>$top_service]);
    }
    public function Edit_Category(Request $request,$id)
    {
        $category=DB::table('vv_categories')->get();
        $top=DB::table('vv_top_service_providers')->where('top_service_provider_id',$id)->first();
        return view('CMS.top_service_cat',
        ['top'=>$top,'category'=>$category]);

    }
    public function Update_Category(Request $request,$id)
    {
        DB::table('vv_top_service_providers')->where('top_service_provider_id',$id)->update([
             'top_service_provider_category_id'=>request()->category_name
        ]);
        return redirect()->route('top_service_table')->with('message' , 'Update was successful!');
    }
    public function Edit_Sub(Request $request,$id,$u)
    {
       
        $sub=DB::table('vv_listings')->where('category_id',$id)->get();
        $top=DB::table('vv_top_service_providers')->where('top_service_provider_category_id',$id)->first();
       // dd($id);
        return view('CMS.top_service_sub',
        ['top'=>$top,'sub'=>$sub,'sub_cat'=>$u]);

    }
    public function Update_Sub(Request $request,$id)
    {
        $sub_cat=request()->sub_category_id;
        $pos=request()->Sub_Cat;
        $pos=(int)$pos-2;
        $sub=Nam('vv_top_service_providers','top_service_provider_category_id',$id,'top_service_provider_listings');
        $sub=explode(',',$sub);
        $sub[$pos]=$sub_cat;
        $sub=implode(',',$sub);
        DB::table('vv_top_service_providers')->where('top_service_provider_category_id',$id)->update([
             'top_service_provider_listings'=>$sub,
        ]);
        return redirect()->route('top_service_table')->with('message' , 'Update was successful!');
    }

}
