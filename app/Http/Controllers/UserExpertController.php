<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserExpertController extends Controller
{
   
    public function Store(Request $request)
    {
      //dd($request->all());
    //   $request->validate([
            
    //     'user_id'=>'required', 'category_id'=>'required',
    //     'state_id'=>'required', 'city_id'=>'required', 'available_start_time'=>'required', 'available_close_time'=>'required',
    //     'base_fare'=>'required', 'sub_category_id'=>'required', 'area_id'=>'required', 'year_of_experience'=>'required',
    //     'payment_id'=>'required', 'date_of_birth'=>'required',
    //     'profile_image'=>'required','cover_image'=>'required','id_proof'=>'required'

        
    //       ]);
    $file=DB::table('vv_experts')->where('user_id',session('user_id'))->first();
    if(request()->profile_image==null)
    {
      $file1=$file->profile_image;
    }
    else{
      $file1=$this->uploadImage(request()->profile_image);
    }
    if(request()->profile_cover_image==null)
    {
      $file2=$file->cover_image;
    }
    else{
      $file2=$this->uploadImage(request()->profile_cover_image);
    }
    if(request()->id_proof==null)
    {
      $file3=$file->id_proof;
    }
    else{
      $file3=$this->uploadImage(request()->id_proof);
    }

       DB::table('vv_experts')->where('user_id',session('user_id'))->update([
                'area_id'=>request()->service_area,
                'profile_name'=>request()->name,
                'category_id'=>request()->work_profession,
                'state_id'=>request()->state,
                'city_id'=>request()->city,
                'available_time_start'=>request()->available_start_time,
                'available_time_end'=>request()->service_close_time,
                'base_fare'=>request()->base_fare,
                'sub_category_id'=>implode(',',request()->sub_category_id),
                'years_of_experience'=>request()->year_of_experience,
                'payment_id'=>implode(',',request()->payment_accept),
                'experience_1'=>(request()->experience_1==null)?'':request()->experience_1,
                'experience_2'=>(request()->experience_2==null)?'':request()->experience_2,
                'experience_3'=>(request()->experience_3==null)?'':request()->experience_3,
                'experience_4'=>(request()->experience_4==null)?'':request()->experience_4,
                'education_1'=>(request()->education_1==null)?'':request()->education_1,
                'education_2'=>(request()->education_2==null)?'':request()->education_2,
                'education_3'=>(request()->education_3==null)?'':request()->education_3,
                'education_4'=>(request()->education_4==null)?'':request()->education_4,
                'additional_info_1'=>(request()->additional_info_1==null)?'':request()->additional_info_1,
                'additional_info_2'=>(request()->additional_info_2==null)?'':request()->additional_info_2,
                'additional_info_3'=>(request()->additional_info_3==null)?'':request()->additional_info_3,
                'additional_info_4'=>(request()->additional_info_4==null)?'':request()->additional_info_4,
                'date_of_birth'=>request()->date_of_birth,
                'profile_image'=>$file1,
                'cover_image'=>$file2,
                'id_proof'=>$file3
          
            ]);
          return redirect()->route('user/dasboard')->with('message' , 'Update was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
   

    public function Delete($id)
    {
      DB::table('vv_experts')->where('expert_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');;
    }

    public function Expert()
    {
      $expert=DB::table('vv_experts')->where('user_id',session('user_id'))->first();
      $sub=explode(',',$expert->sub_category_id);
      $a=explode(',',$expert->area_id);
      $pay=explode(',',$expert->payment_id);
      $users=DB::table('vv_users')->get();
      $category=DB::table('vv_expert_categories')->get();
      $sub_category=DB::table('vv_expert_sub_categories')->get();
      $state=DB::table('vv_expert_states')->get();
      $city=DB::table('vv_expert_cities')->get();
      $area=DB::table('vv_expert_areas')->get();
      $payment=DB::table('vv_expert_payments')->get();
        return view('ui.old-ui.iwp-service-expert-profile',
        ['category'=>$category,'sub_category'=>$sub_category,'state'=>$state,'city'=>$city,'area'=>$area,'expert'=>$expert,
        'payment'=>$payment,'sub'=>$sub,'a'=>$a,'pay'=>$pay,'users'=>$users]
        );
     
    }
    public  function uploadImage($file)
    {
      if($file==null)
       {
        return null;
       }
       else{
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
       }
    }


    public function Service(Request $request)
    {
      $expert=DB::table('vv_expert_enquiries')->where('enquiry_sender_id',session('user_id'))->get();
      return view('ui.old-ui.iwp-db-service-bookings',
      ['expert'=>$expert]);

    }
    public function Manage(Request $request)
    {
      DB::table('vv_expert_enquiries')->where('enquiry_id',request()->enquiry_id)->update([
        'appointment_date'=>request()->appointment_date,
        'appointment_time'=>request()->appointment_time,
        'enquiry_status'=>request()->enquiry_status
      ]);
      return response()->json(1);
    }
    public function Avaliability(Request $request)
    {
      //return response()->json($request->all());
      DB::table('vv_experts')->where('expert_id',request()->expert_id)->update([
        'available_time_start'=>request()->available_time_start,
        'available_time_end'=>request()->available_time_end,
        'expert_availability_status'=>request()->expert_availability_status
      ]);
      return response()->json(1);
    }
    public function Booking(Request $request,$id)
    {
      $enquery=DB::table('vv_expert_enquiries')->where('enquiry_id',$id)->first();
      $expert=DB::table('vv_experts')->where('expert_id',$enquery->expert_id)->first();
      return view('ui.old-ui.iwp-service-booking-page',
      ['expert'=>$expert,'enquery'=>$enquery]);
    }
    
}
