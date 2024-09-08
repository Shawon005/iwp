<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BusinessController extends Controller
{
    public function Edit( )
    {
        //dd($id);
       
        $company=DB::table('vv_user_company')->where('user_id',session('user_id'))->first();
        $product=DB::table('vv_products')->where('user_id',session('user_id'))->get();
        $event=DB::table('vv_events')->where('user_id',session('user_id'))->get();
        $blog=DB::table('vv_blogs')->where('user_id',session('user_id'))->get();
        return view('ui.old-ui.company-profile-edit',
        ['company'=>$company,'products'=>$product,'events'=>$event,'blogs'=>$blog]);
     
    }
    public function Update(Request $request, $id)
    {
//dd($request->all());
$pic=DB::table('vv_user_company')->where('user_company_id',$id)->first();

$file=request()->comp_head_logo;
if($file==null)
{
    $file1=$pic->company_profile_photo;
}
else{
    $file1=$this->uploadImage($file);
}
$file=request()->comp_bann_logo;
if($file==null)
{
    $file2=$pic->company_banner_photo;
}
else{
    $file2=$this->uploadImage($file);
}
$file=request()->comp_top_logo;
if($file==null)
{
    $file3=$pic->company_header_photo;
}
else{
    $file3=$this->uploadImage($file);
}

DB::table('vv_user_company')->where('user_company_id',$id)->update([  
"company_name" => request()->company_name,
"company_address" =>request()->company_address,
"company_mobile" =>request()->company_mobile,
"company_email_id" =>request()->company_email_id,
"company_website" => request()->company_website,
"company_tax" => request()->company_tax,
'company_products'=>(request()->company_products==null)?'':implode(',',request()->company_products),
'company_blogs'=>(request()->company_blogs==null)?'':implode(',',request()->company_blogs),
'company_events'=>(request()->company_events==null)?'':implode(',',request()->company_events),
"company_facebook" => (request()->company_facebook==null)?'':request()->company_facebook,
"company_twitter" => (request()->company_twitter==null)?'':request()->company_twitter,
"company_linkedin" => (request()->company_linkedin==null)?'':request()->company_linkedin,
"company_instagram" => (request()->company_instagram==null)?'':request()->company_instagram,
"company_youtube" => (request()->company_youtube==null)?'':request()->company_youtube,
"company_whatsapp" =>request()->company_whatsapp,
"company_description" => request()->company_description,
"company_seo_description" =>request()->company_seo_description,
"company_seo_keywords" =>request()->company_seo_keywords,

"company_profile_photo"  =>$file1,
"company_banner_photo"  =>$file2,
"company_header_photo" =>$file3,
]);
return redirect()->route('user/dasboard')->with('message' , 'Update was successful!');
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
