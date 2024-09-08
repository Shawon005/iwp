<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SocialMidiaController extends Controller
{
    public function Show(Request $request)
    {
        $admin=DB::table('vv_footer')->first();
        return view('CMS.social-media',
        ['admin'=>$admin]);
    }
    public function Facebook(Request $request,$id)
    {  $id1=1;
         
        $val=DB::table('vv_footer')->where('footer_id',1)->first();
        if($val->admin_share_facebook){
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_share_facebook'=>0,
        ]);    
    }
    else{
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_share_facebook'=>1, ]); 
    }
    }
    public function Twitter(Request $request,$id)
    {  
        $val=DB::table('vv_footer')->where('footer_id',1)->first();
        if($val->admin_share_twitter){
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_share_twitter'=>0,
        ]);  
    }  
    else{
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_share_twitter'=>1,
        ]);  
    }
    }
    public function WhatsApp(Request $request,$id)
    {  
        $val=DB::table('vv_footer')->where('footer_id',1)->first();
        if($val->admin_share_whatsApp){
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_share_whatsApp'=>0,
        ]);    }
        else{
            DB::table('vv_footer')->where('footer_id',1)->update([
                'admin_share_whatsApp'=>$id,]);
        }
    }
    public function LinkedIn(Request $request,$id)
    {  
        $val=DB::table('vv_footer')->where('footer_id',1)->first();
        if($val->admin_share_linkedIn){
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_share_linkedIn'=>0,
        ]);    }
        else{
            DB::table('vv_footer')->where('footer_id',1)->update([
                'admin_share_linkedIn'=>1,]);
        }
    }
    public function Pinterest(Request $request,$id)
    {       
        $val=DB::table('vv_footer')->where('footer_id',1)->first();
        if($val->admin_share_linkedIn){
        DB::table('vv_footer')->where('footer_id',1)->update([
            'admin_share_pinterest'=>$id,
        ]);    }
        else{
            DB::table('vv_footer')->where('footer_id',1)->update([
                'admin_share_pinterest'=>1,]);
        }
    }
}
