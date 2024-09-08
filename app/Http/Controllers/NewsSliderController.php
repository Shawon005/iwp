<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsSliderController extends Controller
{
    public function Index(Request $request)
    {
      $news=DB::table('vv_news_slider')->orderBy('news_slider_pos_id','asc')->get();
      return view('news.slider.news-slider',
      ['news'=>$news]);

    } 
    public function Edit(Request $request,$id)
    {
      $trend=DB::table('vv_news_slider')->where('news_slider_id',$id)->first();
      $news=DB::table('vv_news')->get();
      return view('news.slider.news-slider-edit',
      ['news'=>$news,'trend'=>$trend]);
    } 
    public function Update(Request $request,$id)
    {
     DB::table('vv_news_slider')->where('news_slider_id',$id)->update([
        'news_id'=>request()->news_id,
     ]);
     return redirect()->route('news_slider')->with('message' , 'Update was successful!');
      
    }
    public function Position(Request $request)
    {
        $category=DB::table('vv_news_slider')->orderBy('news_slider_pos_id','asc')->get();
        return view('news.slider.category-position',
        ['category'=>$category]);
    }
    public function Position_Store(Request $request,$sort)
    {
        $no=0;
        preg_match_all('!\d+!', $sort, $arr);

        
        foreach($arr[0] as $id){
        
        DB::table('vv_news_slider')->where('news_slider_id',$id)->update([
          'news_slider_pos_id'=>$no++,
        ]);
      }
      
      return response()->json(['position']);
    }
}
