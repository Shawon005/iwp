<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function Delete($id)
    {
        DB::table('vv_news_subscribers')->where('news_subscribers_id',$id)->delete();
       return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function subscriber()
    {
        $news= DB::table('vv_news_subscribers')->get();
        return view('news.subscriber.all-subscriber',
    ['news'=>$news]);
     
    }
    public function Social()
    {
        $news= DB::table('vv_news_social_media')->get();
        return view('news.social_media.all-social-media',
       ['news'=>$news]);
     
    }
    public function Edit($id)
    {
        $news= DB::table('vv_news_social_media')->where('social_media_id',$id)->first();
        return view('news.social_media.social-media-edit',
       ['news'=>$news]);
     
    }
    public function Update($id)
    {
        DB::table('vv_news_social_media')->where('social_media_id',$id)->update([
            'social_media_status'=>request()->category_id,
            'social_media_link'=>request()->link,
            'social_media_count'=>request()->count,
        ]);
        return redirect()->route('social')->with('message' , 'Update was successful!');
    }

}
