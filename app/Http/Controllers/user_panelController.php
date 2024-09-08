<?php

namespace App\Http\Controllers;
use App\Models\user_panel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class user_panelController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|min:3',
            'email_id'=>'required|unique:user_panels,email_id|max:255',
            'profile_password'=>'required',
            // 'file'=>'required',
            'mobile_number'=>'required',
            'address'=>'required',
            'user_type'=>'required',
            'user_plan'=>'required',
          
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
    
     
        try{
           user_panel::create([
           
                'name'=>request()->name,
                'email_id'=>request()->email_id,
                'profile_password'=>request()->profile_password,
                'mobile_number'=> request()->mobile_number,
                'file'=>$file,
                'address'=>request()->address,
                'user_type'=>request()->user_type,
                'user_plan' =>request()->user_plan,
                'facebook'=>request()->facebook,
                'twitter'=>request()->twitter,
                'youtube'=>request()->youtube,
                'website' =>request()->website,
                //dd(request()->all()),
            ]);
    //            $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
        }
         catch (\Throwable $th) {
           dd("hello");
          //  return redirect()->back()->withInput()->withErrors($e->getMessage());
    //            dd($e->getMessage());
        }
}
public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required|min:3',
            'email_id'=>'required|unique:user_panels,email_id|max:255,'.$id,
            'profile_password'=>'required',
            // 'file'=>'required',
            'mobile_number'=>'required',
            'address'=>'required',
            'user_type'=>'required',
            'user_plan'=>'required',
          
        ]);
   
       $file=request()->file('file');

    
        if($file==NULL)
        {
          $users=user_panel::find($id);
          $file=$users->file;
        }
        else{
            $files=request()->file('file');
            $file= $this->uploadImage($file);
        }
    
     
        try{
            DB::table('user_panels')->where('id',$id)->update([
                'name'=>request()->name,
                'email_id'=>request()->email_id,
                'profile_password'=>request()->profile_password,
                'mobile_number'=> request()->mobile_number,
                'file'=>$file,
                'address'=>request()->address,
                'user_type'=>request()->user_type,
                'user_plan' =>request()->user_plan,
                'facebook'=>request()->facebook,
                'twitter'=>request()->twitter,
                'youtube'=>request()->youtube,
                'website' =>request()->website,
                //dd(request()->all()),
            ]);
    //            $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
        }
         catch (\Throwable $th) {
           dd("hello");
          //  return redirect()->back()->withInput()->withErrors($e->getMessage());
    //            dd($e->getMessage());
        }
    }
        public function edit( $id)
        {
            $users = user_panel::find($id);
            return view('user.edit',
            ['users'=>$users]);
         
        }
public function admin_add_new_user(Request $request)
{
   
    return view("user.admin-add-new-user");
}
public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function input()
    {
        $users = user_panel::get();
        return view('zeta.curd.table',[
            'users'=>$users
        ]);
}
}
