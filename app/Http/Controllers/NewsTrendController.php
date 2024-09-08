<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsTrendController extends Controller
{
    public function Index(Request $request)
    {
      $news=DB::table('vv_news_trending')->orderBy('trending_news_pos_id','asc')->get();
      return view('news.trend.news-trend',
      ['news'=>$news]);

    } 
    public function Edit(Request $request,$id)
    {
      $trend=DB::table('vv_news_trending')->where('trending_news_id',$id)->first();
      $news=DB::table('vv_news')->get();
      return view('news.trend.news-trend-edit',
      ['news'=>$news,'trend'=>$trend]);
    } 
    public function Update(Request $request,$id)
    {
     DB::table('vv_news_trending')->where('trending_news_id',$id)->update([
        'news_id'=>request()->news_id,
     ]);
     return redirect()->route('news_trend')->with('message' , 'Update was successful!');
      
    }
    
    public function Position(Request $request)
    {
        $category=DB::table('vv_news_trending')->orderBy('trending_news_pos_id','asc')->get();
        return view('news.trend.category-position',
        ['category'=>$category]);
    }
    public function Position_Store(Request $request,$sort)
    {
        $no=0;
        preg_match_all('!\d+!', $sort, $arr);

        
        foreach($arr[0] as $id){
        
        DB::table('vv_news_trending')->where('trending_news_id',$id)->update([
          'trending_news_pos_id'=>$no++,
        ]);
      }
      
      return response()->json(['position']);
    }
}
