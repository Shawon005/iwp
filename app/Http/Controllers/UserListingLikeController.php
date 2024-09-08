<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserListingLikeController extends Controller
{
    public function Index(Request $request)
    {
        $user=DB::table('vv_listing_likes')->where('user_id',session('user_id'))->get();
        return view('ui.old-ui.iwp-db-like-listings',
        ['like'=>$user]);
    }

    public function Delete(Request $request,$id)
    {
        DB::table('vv_listing_likes')->where('listing_likes_id',$id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
    }
}
