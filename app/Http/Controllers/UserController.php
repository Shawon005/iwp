<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function Index(Request $request)
    {
      $users=DB::table('vv_users')->get();
      return view('user.all-user',
      ['users'=>$users]);
    }
    public function General(Request $request)
    {
      $users=DB::table('vv_users')->where('user_type','General')->get();
      return view('user.all-user',
      ['users'=>$users]);
    }  
    public function Service_provider(Request $request)
    {
      $users=DB::table('vv_users')->where('user_type','Service provider')->get();
      return view('user.all-user',
      ['users'=>$users]);
    } 
    public function Free(Request $request)
    {
      $users=DB::table('vv_users')->where('user_plan',1)->get();
      return view('user.all-user',
      ['users'=>$users]);
    }
    public function Standard(Request $request)
    {
      $users=DB::table('vv_users')->where('user_plan',2)->get();
      return view('user.all-user',
      ['users'=>$users]);
    } 
    public function Premium(Request $request)
    {
      $users=DB::table('vv_users')->where('user_plan',3)->get();
      return view('user.all-user',
      ['users'=>$users]);
    } 
    public function Premium_plus(Request $request)
    {
      $users=DB::table('vv_users')->where('user_plan',4)->get();
      return view('user.all-user',
      ['users'=>$users]);
    } 
    public function Non_paid(Request $request)
    {
      $users=DB::table('vv_users')->where('payment_status','Non_paid')->get();
      return view('user.all-user',
      ['users'=>$users]);
    } 
    public function Paid(Request $request)
    {
      $users=DB::table('vv_users')->where('payment_status','Paid')->get();
      return view('user.all-user',
      ['users'=>$users]);
    } 
    public function Request(Request $request)
    {
      $users=DB::table('vv_users')->where('user_status','Inactive')->get();
      return view('user.user-request',
      ['users'=>$users]);
    } 
    public function COD(Request $request)
    {
      $users=DB::table('vv_users')->where('payment_status','COD')->where('user_status','Active')->get();
      return view('user.user-cod-request',
      ['users'=>$users]);
    } 

    public function Store(Request $request)
    {

        $request->validate([
            'name'=>'required|min:3',
            'email_id'=>'required|unique:vv_users,email_id|max:255',
            'profile_password'=>'required',
            // 'file'=>'required',
            'mobile_number'=>'required',
            'address'=>'required',
            'user_type'=>'required',
           
          
        ]);
   
       $file=request()->file('file');

    
        if($file==NULL)
        {
          $file="profile.png";
        }
        else{
            $files=request()->file('file');
            $file= $this->uploadImage($file);
        }
        if(request()->user_plan!=null){
          $point=Nam('vv_plan_type','plan_type_id',request()->user_plan,'plan_type_points');
          }
          else{
           $point=0;
          }
        try{
        //  dd(request()->all());
          $id=DB::table('vv_users')->insertGetId([
                'first_name'=>request()->name,
                'email_id'=>request()->email_id,
                'password'=>request()->profile_password,
                'mobile_number'=> request()->mobile_number,
                'profile_image'=>$file,
                'user_address'=>request()->address,
                'user_type'=>request()->user_type,
                'user_plan' =>(request()->user_plan==null)?0:request()->user_plan,
                'user_facebook'=>((request()->facebook)==null?'':request()->facebook),
                'user_twitter'=>((request()->twitter)==null?'':request()->twitter),
                'user_youtube'=>((request()->youtube)==null?'':request()->youtube),
                'user_website' =>((request()->website)==null?'':request()->website),
                'user_code'=>'',
                'last_name'=>'',
                'user_city'=>0,
                'user_country'=>105,
                'user_state'=>0,
                'user_zip_code'=>'',
                'user_contact_name'=>'',
                'user_contact_email'=>'',
                'user_contact_mobile'=>'',
                'date_of_birth'=>now(),
                'cover_image'=>'',
                'profile_id_proof'=>'',
                'paypal_email_id'=>'',
                'register_mode'=>'Direct',
                'setting_review'=>0,
                'setting_share'=>0,
                'setting_profile_show' =>0,	
                'setting_guarantee_show' =>0,
                'setting_user_status' =>0,
                'user_status'=>'Active',
                'payment_status'=>'paid',
                'user_followers'=>'',
                'user_slug'=>Str::of(request()->name)->slug('-'),
                'user_points'=>$point,
                'verification_status'=>1,
                'user_clear_notification_cdt'=>now(),
                'verification_code'=>'',
                'verification_link'=>'',
                'user_cdt' =>now(),
               
             ]);
            
             code('vv_users','user_code','user_id',$id,'USER');
             
            return redirect()->route('user_table')->with('message' , 'Store was successful!');
    //            $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
        }
         catch (\Throwable $th) {
           dd("not");
          //  return redirect()->back()->withInput()->withErrors($e->getMessage());
    //            dd($e->getMessage());
        }
}
public function Edit( $id)
{
    $plan=DB::table('vv_plan_type')->get();
    $user = DB::table('vv_users')->where('user_id',$id)->first();
    return view('user.edit',
    ['user'=>$user,'plan'=>$plan]);
 
}
public function update(Request $request, $id)
    {
        $val=unique('vv_users','email_id',request()->email_id,'user_id',$id);
        if($val!=0){
            $request->validate([
                'name'=>'required|min:3',
                'email_id'=>'required|unique:vv_users,email_id|max:255',
                'profile_password'=>'required',
                // 'file'=>'required',
                'mobile_number'=>'required',
                'address'=>'required',
                'user_type'=>'required',
                'user_plan'=>'required',
              
            ]);
      }
       else{
        $request->validate([
            'name'=>'required|min:3',
            'email_id'=>'required',
            'profile_password'=>'required',
            // 'file'=>'required',
            'mobile_number'=>'required',
            'address'=>'required',
            'user_type'=>'required',
            'user_plan'=>'required',
          
        ]);
        }
       $file=request()->file('file');

    
        if($file==NULL)
        {
          $users=DB::table('vv_users')->where('user_id',$id)->first();
          $file=$users->profile_image;
        }
        else{
            $files=request()->file('file');
            $file= $this->uploadImage($file);
        }
    
     
        try{
            DB::table('vv_users')->where('user_id',$id)->update([
                'first_name'=>request()->name,
                'email_id'=>request()->email_id,
                'password'=>request()->profile_password,
                'mobile_number'=> request()->mobile_number,
                'profile_image'=>$file,
                'user_address'=>request()->address,
                'user_type'=>request()->user_type,
                'user_plan' =>request()->user_plan,
                'user_facebook'=>((request()->facebook)==null?'':request()->facebook),
                'user_twitter'=>((request()->twitter)==null?'':request()->twitter),
                'user_youtube'=>((request()->youtube)==null?'':request()->youtube),
                'user_website' =>((request()->website)==null?'':request()->website),
                //dd(request()->all()),
            ]);
            return redirect()->route('user_table')->with('message' , 'Update was successful!');
    //            $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
        }
         catch (\Throwable $th) {
           dd("hello");
          //  return redirect()->back()->withInput()->withErrors($e->getMessage());
    //            dd($e->getMessage());
        }
    }

public function User(Request $request)
{
   $plan=DB::table('vv_plan_type')->get();
    return view("user.admin-add-new-user",['plan'=>$plan]);
}
public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
public function Delete(Request $request,$id)
{
    $plan=DB::table('vv_users')->where('user_id',$id)->delete();
    return redirect()->route('user_table')->with('message' , 'Deleted successfully!');
}   
public function Login(Request $request)
{
  session('user_C');
  session('user_id');
  // session(['user' => 'false']);
    $moblie=request()->mobile_number;
    $password=request()->password;

    $val=DB::table('vv_users')->where('mobile_number',$moblie)->Where('password',$password)->where('payment_status','Paid')->where('verification_status',1)->first();

    if($val!=null)
    {
      session(['user_C' => 'true']);
      session(['user_id'=> $val->user_id]);
      return redirect()->route('user/dasboard');
    }
    else
    {
      session(['user_C' => 'false']);
      return back()->with('message' , 'Incorrect Password');
    }
}
function approve($id)
{
  DB::table('vv_users')->where('user_id',$id)->update([
   'user_status'=>"Active"
  ]);
  return response()->json([1]);
}
}
