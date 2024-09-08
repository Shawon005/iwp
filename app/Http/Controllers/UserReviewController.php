<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    public function Index(Request $request)
    {
        $user=DB::table('vv_reviews')->where('listing_user_id',session('user_id'))->orderBy('review_id','desc')->get();
        return view('ui.old-ui.iwp-db-review',
        ['review'=>$user]);
    }
    public function Index_A(Request $request)
    {
        $user=DB::table('vv_reviews')->where('review_user_id',session('user_id'))->orderBy('review_id','desc')->get();
        return view('ui.old-ui.iwp-db-review',
        ['review'=>$user]);
    }
    public function Delete(Request $request,$id)
    {
        DB::table('vv_reviews')->where('review_id',$id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
    }
}
