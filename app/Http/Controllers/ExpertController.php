<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function Index(Request $request)
    {
      $expert=DB::table('vv_experts')->get();
      $users=DB::table('vv_users')->get();
      return view('expert.all-expert',
      ['expert'=>$expert,'users'=>$users]);

    }
    public function Store(Request $request)
    {

      $request->validate([
            
        'user_id'=>'required', 'category_id'=>'required',
        'state_id'=>'required', 'city_id'=>'required', 'available_start_time'=>'required', 'available_close_time'=>'required',
        'base_fare'=>'required', 'service_can_do'=>'required','year_of_experience'=>'required',
        'payment_id'=>'required', 'date_of_birth'=>'required',
        'profile_image'=>'required','cover_image'=>'required','id_proof'=>'required'

        
          ]);
 

       $id=DB::table('vv_experts')->insertGetId([

                'user_id'=>request()->user_id,
                'category_id'=>request()->category_id,
                'state_id'=>request()->state_id,
                'city_id'=>request()->city_id,
                'available_time_start'=>request()->available_start_time,
                'available_time_end'=>request()->available_close_time,
                'expert_date'=>request()->expert_date,
                'base_fare'=>request()->base_fare,
                'sub_category_id'=>implode(',',request()->service_can_do),
                'years_of_experience'=>request()->years_of_experience,
                'area_id'=>(request()->area_id==null)?0:implode(',',request()->area_id),
                'payment_id'=>implode(',',request()->payment_id),
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
                'profile_image'=>$this->uploadImage(request()->profile_image),
                'cover_image'=>$this->uploadImage(request()->cover_image),
                'id_proof'=>$this->uploadImage(request()->id_proof),
                'seo_title'=>'',
                'seo_description'=>'',
                'seo_keywords'=>'',
                'expert_slug'=>'',
                'expert_availability_status'=>0,
                'expert_cdt'=>now()
                
               
          
            ]);
            code('vv_experts','expert_code','expert_id',$id,'EXPERT-SERVICE');
          return redirect()->route('expert_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        $expert=DB::table('vv_experts')->where('expert_id',$id)->first();
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

        return view('expert.admin-expert-edit',
        ['category'=>$category,'sub_category'=>$sub_category,'state'=>$state,'city'=>$city,'area'=>$area,'expert'=>$expert,
        'payment'=>$payment,'sub'=>$sub,'a'=>$a,'pay'=>$pay,'users'=>$users]
        );
     
    }
    public function Update(Request $request,$id)
    {
     // dd(request()->all());
      $request->validate([
            
        'user_id'=>'required', 'category_id'=>'required',
        'state_id'=>'required', 'city_id'=>'required', 'available_start_time'=>'required', 'available_close_time'=>'required',
        'base_fare'=>'required', 'service_can_do'=>'required',  'year_of_experience'=>'required',
        'payment_id'=>'required', 'date_of_birth'=>'required'
          ]);
     $file=DB::table('vv_experts')->where('expert_id',$id)->first();
      if(request()->profile_image==null)
      {
        $file1=$file->profile_image;
      }
      else{
        $file1=$this->uploadImage(request()->profile_image);
      }
      if(request()->cover_image==null)
      {
        $file2=$file->cover_image;
      }
      else{
        $file2=$this->uploadImage(request()->cover_image);
      }
      if(request()->id_proof==null)
      {
        $file3=$file->id_proof;
      }
      else{
        $file3=$this->uploadImage(request()->id_proof);
      }
       
        try{

          
          DB::table('vv_experts')->where('expert_id',$id)->update([
                
            'user_id'=>request()->user_id,
            'category_id'=>request()->category_id,
            'state_id'=>request()->state_id,
            'city_id'=>request()->city_id,
            'available_time_start'=>request()->available_start_time,
            'available_time_end'=>request()->available_close_time,
            'expert_date'=>request()->expert_date,
            'base_fare'=>request()->base_fare,
            'sub_category_id'=>implode(',',request()->service_can_do),
            'area_id'=>(request()->area_id==null)?0:implode(',',request()->area_id),
            'years_of_experience'=>request()->year_of_experience,
            'payment_id'=>implode(',',request()->payment_id),
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
            'id_proof'=>$file3,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('expert_table')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Throwable $th) {
            //dd("data not");
            return redirect()->back()->withInput()->withErrors(getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Delete($id)
    {
      DB::table('vv_experts')->where('expert_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');;
    }

    public function Expert()
    {
      $users=DB::table('vv_users')->get();
        $category=DB::table('vv_expert_categories')->get();
        $sub_category=DB::table('vv_expert_sub_categories')->get();
        $state=DB::table('vv_expert_states')->get();
        $city=DB::table('vv_expert_cities')->get();
        $area=DB::table('vv_expert_areas')->get();
        $payment=DB::table('vv_expert_payments')->get();
        return view('expert.admin-expert-new-create',
        ['category'=>$category,'sub_category'=>$sub_category,'state'=>$state,'city'=>$city,
        'area'=>$area,'payment'=>$payment,'users'=>$users]
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
    public function getPlans($id)
    {
        $sub_category =DB::table('vv_expert_sub_categories')->where('category_id',$id)->get();
        //dd($sub_category);
        // dd(response()->json(['states'=>$states]));
        return response()->json(['sub_category'=>$sub_category]);
    }
    public function getPlans1($id)
    {
      $child_category=DB::table('vv_expert_cities')->where('state_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['child_category'=>$child_category]);
    }
    public function getPlans2($id)
    {
      $area=DB::table('vv_expert_areas')->where('state_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['area'=>$area]);
    }
    public function General_Delete($id)
    {
        DB::table('vv_expert_enquiries')->where('enquiry_id',$id)->delete();
        return redirect()->back();
    }
    public function General_Listing(Request $request)
    {
      $expert=DB::table('vv_expert_enquiries')->where('is_general_id',1)->where('payment_status','pending')->get();
      return view('expert.all-general',
      ['expert'=>$expert]);
    }
    public function Lead_Listing(Request $request)
    {
      $expert=DB::table('vv_expert_enquiries')->where('is_general_id',0)->get();
      return view('expert.all-leads',
      ['expert'=>$expert]);

    }
    public function today_Listing(Request $request)
    {
      $expert=DB::table('vv_expert_enquiries')->where('enquiry_cdt',now())->get();
      return view('expert.all-leads',
      ['expert'=>$expert]);

    }
    public function finish_Listing(Request $request)
    {
      $expert=DB::table('vv_expert_enquiries')->where('enquiry_status',500)->get();
      return view('expert.all-leads',
      ['expert'=>$expert]);

    }
    public function pending_Listing(Request $request)
    {
      $expert=DB::table('vv_expert_enquiries')->where('enquiry_status','>=',300)->where('enquiry_status','<=',400)->get();
      return view('expert.all-leads',
      ['expert'=>$expert]);

    }
    public function cencle_Listing(Request $request)
    {
      $expert=DB::table('vv_expert_enquiries')->where('enquiry_status',100)->get();
      return view('expert.all-leads',
      ['expert'=>$expert]);

    }
}
