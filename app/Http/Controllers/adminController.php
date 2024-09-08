<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Support\Facades\URL;
use DB;
use Hash;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class adminController extends Controller
{
   
    public function login(Request $request)
    {
        
        $email=request()->email;
        $password=request()->password;
        // $user = new Admin;
        // $check=$user->emailcheck($email);
        // dd($user->email);
        //return view("sample-page");
        $userinfo = DB::table('vv_admin')->where('admin_email',$email)->where('admin_password',$password)->first();
        $value = session('key');
        session('id','default');
        session('sub_admin','default');
        // Specifying a default value...
        $value = session('key', 'default');
        session(['key' => 'false']);
        // Store a piece of data in the session... @if(  session('key')=='true')
        
        if($userinfo!=null){
           
            session(['key' => 'true']);
            session(['id'=>$userinfo->admin_id]);
            
            DB::table('vv_admin')->where('admin_email',$email)->update(
                ['admin_login'=>now()]
            );
            session(['sub_admin'=> $userinfo->admin_sub_admin_type]);
            return redirect()->route('admin/dashboard');
        }
        else{
            session(['key' => 'false']);
                return back()->with('fail' , 'Incorrect Password');
         
        }
        // $decrypt= Crypt::decrypt($data->password);
    }
    public function admin(Request $request)
    {
        session(['key' => 'false']);
        return view("login");
        
    }
    public function logout(Request $request)
    {
        session(['key' => 'false']);
        return view("login");
     
    }
    public function Forget(Request $request)
    {
      $email=request()->email_id;
      $user=DB::table('vv_admin')->where('admin_email',$email)->first();
      if($user==null)
      {
        return redirect()->route('admin')->with('message' , 'Your Email Is Not Registerd');
      }
      DB::table('vv_admin')->where('admin_email',$email)->update([
        'admin_password'=>rand(111111,999999),
      ]);
      $user=DB::table('vv_admin')->where('admin_email',$email)->first();
      $doman=URL::to('/');
      $url=$doman.'/'.'admin';
      $data['url']=$url;
      $data['title']="Fototech India Magazine & Portal -Forget Password";
      $data['email']=$email;
      $data['body']="Please Click here to verify Your email";
      $data['user_email']=$user->admin_email;
      $data['password']=$user->admin_password;
      Mail::send('forget_mail', ['data'=>$data], function($message) use ($data) {
         $message->to($data['email'])->subject
            ($data['title']);
        });
      return redirect()->route('admin')->with('fail' , 'Password Sent In Your Email');
    }
  
}
