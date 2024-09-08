<?php

namespace App\Http\Controllers;
use App\Models\vv_event_states;
use App\Models\vv_event_cities;
use App\Models\vv_event_categories;
use App\Models\vv_events;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserEventController extends Controller
{
    public function Index(Request $request)
    {
      $event=DB::table('vv_events')->where('user_id',session('user_id'))->get();
      return view('ui.old-ui.iwp-db-events',
      ['event'=>$event,]);

    }
    public function Store(Request $request)
    {

    // dd(request()->all());
        // $request->validate([
            
          
        //     'user_id'=>'required', 'event_name'=>'required','state_id'=>'required','city_id'=>'required',
        //     'event_address'=>'required','event_description'=>'required',
        //     'event_map'=>'required','event_image'=>'required','event_contact_name'=>'required',
        //     'event_mobile'=>'required','event_email'=>'required',
        //     'event_website'=>'required','isenquiry'=>'required',
           
        // ]);
        //dd(request()->all());
        //$F_file=Null;
        $files=request()->gallery_image;
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
                'user_id'=>session('user_id'),
                'event_name'=>request()->event_name,
                'state_id'=>request()->state_id,
                'city_id'=>request()->city_id,
                'event_address'=>request()->Address,
                'category_id'=>request()->category_id,
                'event_start_date'=>request()->ad_start_date,
                'event_time'=>request()->event_time,
                'event_description'=>request()->event_description,
                'event_map'=>request()->product_description,
                'event_image'=>$F_file,
                'event_contact_name'=>request()->contect_person,
                'event_mobile'=>request()->event_mobile,
                'event_email'=>request()->email_id,
                'event_website'=>request()->website,
                'isenquiry'=>(request()->isenquiry)==null?0:request()->isenquiry,
                'seo_title'	=>request()->event_name,
                'seo_description'	=>request()->event_description,
                'seo_keywords'	=>'',
                'event_status'	=>'Active',
                'event_slug'=>Str::of(request()->event_name)->slug('-'),
                'event_type'=>''	,
                'event_cdt'=>now()
            ]);
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('db-events')->with('message' , 'Store was successful!');
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
        return view('ui.old-ui.iwp-edit-event',
        ['event'=>$event,'state'=>$state,'city'=>$city,'category'=>$category,'users'=>$users]);
     
    }
    public function Update(Request $request,$id)
    {
     //dd(request()->all());

        //dd(request()->all());
      
        
        $files=request()->gallery_image;
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
           // dd(request()->all());
           DB::table('vv_events')->where('event_id',$id)->update([
            'event_name'=>request()->event_name,
            'state_id'=>request()->state_id,
            'city_id'=>request()->city_id,
            'event_address'=>request()->Address,
            'category_id'=>request()->category_id,
            'event_start_date'=>request()->ad_start_date,
            'event_time'=>request()->event_time,
            'event_description'=>request()->event_description,
            'event_map'=>request()->product_description,
            'event_image'=>$F_file,
            'event_contact_name'=>request()->contect_person,
            'event_mobile'=>request()->event_mobile,
            'event_email'=>request()->email_id,
            'event_website'=>request()->website,
            'isenquiry'=>(request()->isenquiry)==null?0:request()->isenquiry,
            'seo_title'	=>request()->event_name,
            'seo_description'	=>request()->event_description,
            'seo_keywords'	=>'',
            'event_status'	=>'Active',
            'event_slug'=>Str::of(request()->event_name)->slug('-'),
            'event_type'=>''	,
            'event_cdt'=>now()
           ]);
          

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('db-events')->with('message' , 'Update was successful!');
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
      return redirect()->route('db-events')->with('message' , 'Delete was successful!');
    }

    public function event()
    {
        $states = vv_event_states::get();
        $city = vv_event_cities::get();
        $category = vv_event_categories::get();
        return view('ui.old-ui.iwp-create-event',['states'=>$states,'city'=>$city,'category'=>$category]);
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
