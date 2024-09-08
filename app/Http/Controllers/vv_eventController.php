<?php

namespace App\Http\Controllers;
use App\Models\vv_event_states;
use App\Models\vv_event_cities;
use App\Models\vv_event_categories;
use App\Models\vv_events;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
class vv_eventController extends Controller
{
    public function Index(Request $request)
    {
      $event=vv_events::all();
      return view('event.all-event',
      ['event'=>$event,]);

    }
    public function Store(Request $request)
    {
//dd(request()->all());
        $request->validate([
            
          
            'user_id'=>'required', 'event_name'=>'required','state_id'=>'required','city_id'=>'required',
            'event_address'=>'required','event_description'=>'required',
            'event_map'=>'required','event_image'=>'required','event_contact_name'=>'required',
            'event_mobile'=>'required','event_email'=>'required',
            'event_website'=>'required',
           
        ]);
        //dd(request()->all());
        $city=request()->city_id;
        $city=implode(',',$city);
        //$F_file=Null;
        $files=request()->event_image;
        //dd($files);
        if($files==NULL)
       {
      
         $F_file=Null;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
    //    dd($F_file);
        try{
            //dd(request()->all());
            DB::table('vv_events')->insert([
             //dd(request()->all()),

          
                'user_id'=>request()->user_id,
                'event_name'=>request()->event_name,
                'state_id'=>request()->state_id,
                'city_id'=>$city,
                'event_address'=>request()->event_address,
                'category_id'=>request()->category_id,
                'event_start_date'=>request()->event_start_date,
                'event_time'=>request()->event_time,
                'event_description'=>request()->event_description,
                'event_map'=>request()->event_map,
                'event_image'=>$F_file,
                'event_contact_name'=>request()->event_contact_name,
                'event_mobile'=>request()->event_mobile,
                'event_email'=>request()->event_email,
                'event_website'=>request()->event_website,
                'isenquiry'=>(request()->isenquiry)==null?0:request()->isenquiry,
                'seo_title'	=>request()->event_name,
                'seo_description'	=>request()->event_description,
                'seo_keywords'	=>'',
                'event_status'	=>'Active',
                'event_slug'=>Str::of(request()->event_name)->slug('-'),
                'event_type'=>''	,
                'event_cdt'=>now()
            ]);
            
            $user=DB::table('vv_users')->where('user_id',request()->user_id)->first();
            $data['add']="Event";
            $data['title']="Fototech India Magazine & Portal";

           $data['name']=request()->event_name;
            $data['email']=request()->event_email;
            
            $data['user_name']=user(request()->user_id);
            $data['mobile']=request()->event_mobile;
            $data['user_email']=$user->email_id;
            $data['admin_email']=Nam('vv_admin','admin_id',session('id'),'admin_email');
            //dd($data);
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
            $message->to($data['user_email'])->subject
            ($data['title']);});
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
            $message->to($data['admin_email'])->subject
            ($data['title']);});
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('event_table')->with('message' , 'Store was successful!');
          //  return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Edit( $id)
    {
        //dd($id);
        $users=DB::table('vv_users')->get();
        $event = DB::table('vv_events')->where('event_id',$id)->first();
        $state = vv_event_states::all();
        $city = vv_event_cities::all();
        $category = vv_event_categories::all();
        return view('event.admin-edit-event',
        ['event'=>$event,'state'=>$state,'city'=>$city,'category'=>$category,'users'=>$users]);
     
    }
    public function Update(Request $request,$id)
    {
     //dd(request()->all());

        //dd(request()->all());
        $city=request()->city_id;
        $city=implode(',',$city);
        $F_file=Null;
        $files=request()->event_image;
      //dd($files);
        if($files==NULL)
       {
        $forFile=DB::table('vv_events')->where('event_id',$id)->first();
         $F_file=$forFile->event_name;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
       // dd($id);
        try{
            //dd(request()->all());
           DB::table('vv_events')->where('event_id',$id)->update([
            'user_id'=>request()->user_id,
            'event_name'=>request()->event_name,
            'state_id'=>request()->state_id,
            'city_id'=>$city,
            'event_address'=>request()->event_address,
            'category_id'=>request()->category_id,
            'event_start_date'=>request()->event_start_date,
            'event_time'=>request()->event_time,
            'event_description'=>request()->event_description,
            'event_map'=>request()->event_map,
            'event_image'=>$F_file,
            'event_contact_name'=>request()->event_contact_name,
            'event_mobile'=>request()->event_mobile,
            'event_email'=>request()->event_email,
            'event_website'=>request()->event_website,
            'isenquiry'=>(request()->isenquiry)==null?0:request()->isenquiry,
            'seo_title'	=>request()->event_name,
            'seo_description'	=>request()->event_description,
            'event_slug'=>Str::of(request()->event_name)->slug('-'),
           ]);
          

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('event_table')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Delete($id)
    {
      DB::table('vv_events')->where('event_id',$id)->delete();
      return redirect()->route('event_table')->with('message' , 'Delete was successful!');
    }

    public function event()
    {
        $user=DB::table('vv_users')->get();
        $states = vv_event_states::get();
        $city = vv_event_cities::get();
        $category = vv_event_categories::get();
        return view('event.admin-add-new-event',['states'=>$states,'city'=>$city,'category'=>$category,'user'=>$user]);
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function getPlans($id)
    {
      $city=DB::table('vv_event_cities')->where('state_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['city'=>$city]);
    }
}
