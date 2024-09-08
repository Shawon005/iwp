<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListingPromotionController extends Controller
{
    public function Index(Request $request)
    {
        $id=101;
      $listing=DB::table('vv_listings')->where('display_position',$id)->get();
      return view('listing.promotion.all-promotion-listing',
      ['listing'=>$listing]);

    }
    public function Listing()
    {
        $listing=DB::table('vv_listings')->get();
        return view('listing.promotion.admin-promote-now',
        ['listing'=>$listing]
        );
     
    }

    public function Update(Request $request){

        $request->validate([
            'start_date'=>'required',
            'end_date'=>'required',
            'listing_id'=>'required'
        ]);
     
        $display_position=101;
        $id=request()->listing_id;
        DB::table('vv_listings')->where('listing_id',$id)->update([
             'start_date'=>request()->start_date,
             'end_date'=>request()->end_date,
             'display_position'=>$display_position,
        ]);
        return redirect()->route('listing_promotion_table')->with('message' , 'Update was successful!');
    }
    public function Delete(Request $request, $id){
        DB::table('vv_listings')->where('listing_id',$id)->update([
           
            'display_position'=>'100',
       ]);
       return redirect()->route('listing_promotion_table')->with('message' , 'Delete was successful!');
    
}
public function P_Index(Request $request)
{
    $id=101;
  $listing=DB::table('vv_all_points_enquiry')->get();
  return view('listing.promotion.all-point',
  ['listing'=>$listing]);

}
public function P_Listing()
{ 
    $listing=DB::table('vv_footer')->first();
    return view('listing.promotion.admin-point-setting',
    ['listing'=>$listing]);
}

public function P_Update(Request $request){

    DB::table('vv_footer')->where('footer_id',1)->update([
        'cost_per_point'=>request()->cost
    ]);
    return redirect()->route('listing_point_table')->with('message' , 'Store was successful!');
}
public function P_Delete(Request $request, $id){
    DB::table('vv_all_points_enquiry')->where('all_points_enquiry_id',$id)->delete();
   return redirect()->route('listing_point_table')->with('message' , 'Delete was successful!');

}
}
