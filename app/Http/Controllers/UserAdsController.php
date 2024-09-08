<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class UserAdsController extends Controller
{
    public function Ads(Request $request)
    {
      $position=DB::table('vv_all_ads_price')->get();
      return view('ui.old-ui.iwp-post-your-ads',
      ['position'=>$position]);

    }
    public function Index(Request $request)
    {
      $ads=DB::table('vv_all_ads_enquiry')->where('user_id',session('user_id'))->orderBy('all_ads_enquiry_id', 'DESC')->get();
      return view('ui.old-ui.iwp-db-post-ads',
      ['ads'=>$ads]);

    }
    public function Index_C(Request $request)
    {
      $ads=DB::table('vv_all_ads_enquiry')->where('ad_enquiry_status','Active')->orderBy('all_ads_enquiry_id', 'DESC')->get();
      return view('ads.ads-current',
      ['ads'=>$ads]);

    }
    public function Store(Request $request)
    {

      $diff=diff(request()->ad_start_date,request()->ad_end_date);
      $cost= Nam('vv_all_ads_price','all_ads_price_id',request()->all_ads_price_id,'ad_price_cost');
      $T_cost=$diff*$cost;

      DB::table('vv_all_ads_enquiry')->insert([
        'user_id' =>session('user_id'),
        'all_ads_price_id' => request()->all_ads_price_id,
        'ad_start_date' => request()->ad_start_date,
        'ad_end_date' =>request()->ad_end_date,
        'ad_link' => (request()->ad_link==null)?'':request()->ad_link,
        'ad_enquiry_photo'=>$this->uploadImage(request()->ad_enquiry_photo),
        'ad_total_days'=>$diff,
        'ad_cost_per_day'=>$cost,
        'ad_total_cost'=>$T_cost,
        'ad_enquiry_status'=>'inActive',
        'ad_enquiry_cdt'=>now(),
      ]);
      return redirect()->route('db-post-ads')->with('message' , 'Store was successful!');
    }
    public function Edit(Request $request,$id){
        $ads=DB::table('vv_all_ads_enquiry')->where('all_ads_enquiry_id',$id)->first();
        $users=DB::table('vv_users')->get();
        $position=DB::table('vv_all_ads_price')->get();
        return view('ads.edit-ads',
        ['users'=>$users,'position'=>$position,'ads'=>$ads]);
    }
    public function Approve(Request $request,$id){
        DB::table('vv_all_ads_enquiry')->where('all_ads_enquiry_id',$id)->update([
            'ad_enquiry_status'=>'Active',
        ]);
        return redirect()->route('ads_current_table');
    }
    public function Update(Request $request,$id){
        $diff=diff(request()->start_date,request()->end_date);
        $cost= Nam('vv_all_ads_price','all_ads_price_id',request()->position_id,'ad_price_cost');
        $T_cost=$diff*$cost;
        $file=DB::table('vv_all_ads_enquiry')->where('all_ads_enquiry_id',$id)->first();
        if(request()->choose_ad_image==Null){
         $file =$file->ad_enquiry_photo;
        }
        else{
          $file=$this->uploadImage(request()->choose_ad_image);
        }
        DB::table('vv_all_ads_enquiry')->where('all_ads_enquiry_id',$id)->update([
          'user_id' =>request()->user_id,
          'all_ads_price_id' => request()->position_id,
          'ad_start_date' => request()->start_date,
          'ad_end_date' =>request()->end_date,
          'ad_link' =>(request()->link==null)?'':request()->link,
          'ad_enquiry_photo'=>$file,
          'ad_total_days'=>$diff,
          'ad_cost_per_day'=>$cost,
          'ad_total_cost'=>$T_cost,
          'ad_enquiry_cdt'=>now(),
        ]);
        return redirect()->route('ads_current_table')->with('message' , 'Update was successful!');
    }
    public function Delete(Request $request,$id){
        DB::table('vv_all_ads_enquiry')->where('all_ads_enquiry_id',$id)->delete();   
        return redirect()->route('ads_current_table')->with('message' , 'Delete was successful!');
    }
    public  function uploadImage($file)
    {

       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public  function Ad_pricing()
    {
        $ads=DB::table('vv_all_ads_price')->get();
        return view('ads.ads-pricing',
        ['ads'=>$ads]);
    }

      public function Edit_P(Request $request,$id){
        $ads=DB::table('vv_all_ads_price')->where('all_ads_price_id',$id)->first();
        return view('ads.edit-ads-pricing',
        ['ads'=>$ads]);
    }
    public function Update_P(Request $request,$id){
        $file=DB::table('vv_all_ads_price')->where('all_ads_price_id',$id)->first();
        if(request()->ad_price_photo==Null){
         $file =$file->ad_price_photo;
        }
        else{
          $file=$this->uploadImage(request()->ad_price_photo);
        }
        DB::table('vv_all_ads_price')->where('all_ads_price_id',$id)->update([
            "ad_price_name" => request()->ad_price_name,
            "ad_price_size" =>request()->ad_price_size,
            "ad_price_cost" => request()->ad_price_cost,
            "ad_price_status" => request()->ad_price_status,
            "ad_price_photo" =>$file
        ]);
        return redirect()->route('ads_pricing')->with('message' , 'Delete was successful!');
    }
    public function Google_ad(Request $request){
        $google=DB::table('vv_footer')->first();
        return view('ads.google-ad',
        ['google'=>$google]);
    }
    public function Update_G(Request $request){
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_google_ad_sense'=>request()->google_ad
        ]);
        return redirect()->back();
    }

   public function Cost(Request $request,$id)
    {
        $cost= Nam('vv_all_ads_price','all_ads_price_id',$id,'ad_price_cost');
       // dd($cost);
        return response()->json(['cost'=>$cost]);
    } 
}
