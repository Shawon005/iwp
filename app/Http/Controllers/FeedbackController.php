<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function Index(Request $request)
    {
      $feedback=DB::table('vv_messages')->orderBy('message_id','desc')->get();
      return view('other.feedback',
      ['feedback'=>$feedback]);

    }  
    public function Delete($id)
    {
      DB::table('vv_messages')->where('message_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

}
