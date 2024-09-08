<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListingEnquiryContoller extends Controller
{
    public function Index(Request $request)
    {
      $listing=DB::table('vv_enquiries')->where('enquiry_save',0)->get();
      return view('listing.enquiry.all-enquiry',
      ['listing'=>$listing]);
    }
    public function Save(Request $request)
    {
      $listing=DB::table('vv_enquiries')->where('enquiry_save',1)->get();
      return view('listing.enquiry.save-enquiry',
      ['listing'=>$listing]);
    }
    public function Delete($id)
    {
        DB::table('vv_enquiries')->where('enquiry_id',$id)->delete();
        return redirect()->back();
    }
    public function Change(Request $request,$id)
    {
      DB::table('vv_enquiries')->where('enquiry_id',$id)->update([
        'enquiry_save'=>1
      ]);
    }
    public function Review(Request $request)
    {
      $listing=DB::table('vv_reviews')->where('review_save',0)->get();
      return view('listing.review.all-review',
      ['listing'=>$listing]);
    }
    public function Delete_R($id)
    {
        DB::table('vv_reviews')->where('review_id',$id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Save_R(Request $request)
    {
      $listing=DB::table('vv_reviews')->where('review_save',1)->get();
      return view('listing.review.save-review',
      ['listing'=>$listing]);
    }
    public function Change_R(Request $request,$id)
    {
      DB::table('vv_reviews')->where('review_id',$id)->update([
        'review_save'=>1
      ]);
    }

}
