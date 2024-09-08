<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserPromotionController extends Controller
{
    public function Index(Request $request)
    {
        $id=101;
      $listing=DB::table('vv_listings')->where('display_position',$id)->where('user_id',session('user_id'))->get();
      return view('ui.old-ui.iwp-db-promote',
      ['listing'=>$listing]);

    }
    public function Listing()
    {
        $listing=DB::table('vv_listings')->where('user_id',session('user_id'))->get();
        return view('ui.old-ui.iwp-promote-business',
        ['listing'=>$listing]
        );
     
    }
    public function Store(Request $request){

        // $request->validate([
        //     'start_date'=>'required',
        //     'end_date'=>'required',
        //     'listing_id'=>'required'
        // ]);
        $current_date=time();
        $start_date=strtotime(request()->start_date);
        $end_date=strtotime(request()->end_date);
        $val=0;
        $du=$end_date-$start_date;
        $du=($du/3600)/24;
        $cost=request()->cost;

        $point=Nam('vv_users','user_id',session('user_id'),'user_points');

        if(($du*$cost)>$point){
            return redirect()->route('db-promote')->with('message' , 'Insaficant Point');
        }
        $display_position=101;
        $display_position=101;
        $id=request()->listing_id;
        DB::table('vv_listings')->where('listing_id',$id)->update([
             'start_date'=>request()->start_date,
             'end_date'=>request()->end_date,
             'display_position'=>$display_position,
        ]);
        DB::table('vv_users')->where('user_id',session('user_id'))->update([
            'user_points'=>$point-($du*$cost)
        ]);
        return redirect()->route('db-promote')->with('message' , 'Store was successful!');
    }
    public function Delete(Request $request, $id){
        DB::table('vv_listings')->where('listing_id',$id)->update([
           
            'display_position'=>'100',
       ]);
       return redirect()->route('db-promote')->with('message' , 'Delete was successful!');
    }
}
