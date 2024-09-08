<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function Index(Request $request)
    {
      $plan=DB::table('vv_plan_type')->get();
      return view('payment.pricing-plan',
      ['plan'=>$plan]);

    }
    
    public function Edit( $id)
    {
        $plan = DB::table('vv_plan_type')->where('plan_type_id',$id)->first();
        return view('payment.edit-plan',
        ['plan'=>$plan]);
     
    }
    public function Update(Request $request,$id)
    {
 //DD($request->all());
          DB::table('vv_plan_type')->where('plan_type_id',$id)->update([
            
            "plan_type_name" => request()->plan_type_name,
            "plan_type_price" => request()->plan_type_price,
            "plan_type_duration" => request()->plan_type_duration,
            "plan_type_listing_count" => request()->plan_type_listing_count,
            "plan_type_product_count" =>request()->plan_type_product_count,
            "plan_type_event_count" =>request()->plan_type_event_count,
            "plan_type_blog_count" => request()->plan_type_blog_count,
            "plan_type_job_count" => request()->plan_type_job_count,
            "plan_type_points" => request()->plan_type_points,
            "plan_type_direct_lead" => request()->plan_type_direct_lead,
            "plan_type_email_notification" => request()->plan_type_email_notification,
            "plan_type_verified" => request()->plan_type_verified,
            "plan_type_trusted" => request()->plan_type_trusted,
            "plan_type_offers" => request()->plan_type_offers,
            "plan_type_photos_count" => request()->plan_type_photos_count,
            "plan_type_videos_count" => request()->plan_type_videos_count,
            "plan_type_ratings" => request()->plan_type_ratings,
            "plan_type_social" => request()->plan_type_social,
            "plan_type_status" => request()->plan_type_status
        ]);
       
            return redirect()->route('plan_table')->with('message' , 'Update was successful!');
    }

}
