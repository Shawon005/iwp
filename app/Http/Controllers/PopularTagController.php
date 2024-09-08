<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PopularTagController extends Controller
{
    public function Index(Request $request)
    {
        $popular=DB::table('vv_popular_tags')->get();
        return view('CMS.popular_tag',
        ['popular'=>$popular]);
    }
    public function Store(Request $request)
    {
        DB::table('vv_popular_tags')->insert([
         'popular_tags_name'=>request()->popular_tags_name,
         'popular_tags_link'=>request()->popular_tags_link,
         'popular_tags_status'=>'Active',
         'popular_tags_cdt'=>now()
        ]);
        return redirect()->route('popular_tag_table')->with('message' , 'Store was successful!');
    }
    public function Edit(Request $request,$id)
    {
        $popular=DB::table('vv_popular_tags')->where('popular_tags_id',$id)->first();
        return view('CMS.popular_tag_edit',
        ['populer'=>$popular]);
    }
    public function Update(Request $request,$id)
    {
        DB::table('vv_popular_tags')->where('popular_tags_id',$id)->update([
            'popular_tags_name'=>request()->popular_tags_name,
            'popular_tags_link'=>request()->popular_tags_link,
           ]);
           return redirect()->route('popular_tag_table')->with('message' , 'Update was successful!');
    }
    public function Delete(Request $request,$id)
    {
        DB::table('vv_popular_tags')->where('popular_tags_id',$id)->delete();
        return redirect()->route('popular_tag_table')->with('message' , 'Deleted was successful!');
    }
    public function Show(Request $request)
    {
        return view('CMS.popular_tag_create');
    }


}
