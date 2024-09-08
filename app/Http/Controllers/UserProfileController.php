<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public function Index(Request $request)
    {
        $user=DB::table('vv_users')->where('user_id',session('user_id'))->first();
        return view('ui.old-ui.iwp-db-my-profile',
        ['user'=>$user]);
    }
    public function Edit(Request $request)
    {
        $user=DB::table('vv_users')->where('user_id',session('user_id'))->first();
        return view('ui.old-ui.iwp-db-my-profile-edit',
        ['user'=>$user]);
    }
    public function Update(Request $request)
    {
        $add= DB::table('vv_users')->where('user_id',session('user_id'))->first();
        //dd($request->all());
        $file=request()->profile_image;
        If($file==null)
        {
            $file1=$add->profile_image;
        }
        else{
            $file1=$this->uploadImage($file);
        }
        $file=request()->profile_cove_image;
        If($file==null)
        {
            $file2=$add->cover_image;
        }
        else{
            $file2=$this->uploadImage($file);
        }
        $file=request()->photo_id_proof;
        If($file==null)
        {
            $file3=$add->profile_id_proof;
        }
        else{
            $file3=$this->uploadImage($file);
        }
         
        DB::table('vv_users')->where('user_id',session('user_id'))->update([
            "password" => request()->password,
            "mobile_number" =>  request()->mobile_number,
            "user_city" =>  request()->user_city,
            "user_facebook" => (request()->user_facebook==null)?'':request()->user_facebook,
            "user_twitter" =>  (request()->user_twitter==null)?'':request()->user_twitter,
            "user_youtube" => (request()->user_youtube==null)?'':request()->user_youtube,
            "user_website" => (request()->user_website==null)?'':request()->user_website,
            'profile_image'=>$file1,
            'cover_image'=>$file2,
            'profile_id_proof'=>$file3
        ]);
        return redirect()->route('db-profile')->with('message' , 'Update was successful!');
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function Setting(Request $request)
    {
        
        DB::table('vv_users')->where('user_id',session('user_id'))->update([
        "setting_user_status" =>request()->setting_user_status,
        "setting_review" => request()->setting_review,
        "setting_share" =>request()->setting_share,
        "setting_profile_show" =>request()->setting_profile_show,
        "setting_job_show" => (request()->setting_job_show=='on')?1:0,
        "setting_expert_show" =>( request()->setting_expert_show=='on')?1:0,
        "setting_product_show" => (request()->setting_product_show=='on')?1:0,
        "setting_blog_show" => (request()->setting_blog_show=='on')?1:0,
        "setting_event_show" =>(request()->setting_event_show=='on')?1:0,
        "setting_coupon_show" =>(request()->setting_coupon_show=='on')?1:0,
        ]);
        return redirect()->back()->with('message' , 'Update was successful!');
    }

}
