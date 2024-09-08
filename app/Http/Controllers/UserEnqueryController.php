<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserEnqueryController extends Controller
{
    public function Index(Request $request)
    {
      $listing=DB::table('vv_enquiries')->where('listing_user_id',session('user_id'))->get();
      return view('ui.old-ui.iwp-db-enquiry',
      ['listing'=>$listing]);
    }
    public function Delete($id)
    {
      DB::table('vv_enquiries')->where('enquiry_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');;
    }
    public function S_Index(Request $request)
    {
      $listing=DB::table('vv_expert_enquiries')->where('expert_user_id',session('user_id'))->where('is_general_id',0)->get();
      return view('ui.old-ui.iwp-db-service-expert',
      ['expert'=>$listing]);
    }
    public function S_Delete($id)
    {
      DB::table('vv_expert_enquiries')->where('enquiry_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');;
    }
}
