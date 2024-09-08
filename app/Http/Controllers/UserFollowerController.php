<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserFollowerController extends Controller
{
    public function Index(Request $request)
    {
      $follower=DB::table('vv_users')->where('user_id',session('user_id'))->first();
      if($follower->user_followers==''){
        $follower=null;
      }
      else{
      $follower=arr($follower->user_followers);
      }
      return view('ui.old-ui.iwp-db-followings',
      ['follower'=>$follower]);
    }
}
