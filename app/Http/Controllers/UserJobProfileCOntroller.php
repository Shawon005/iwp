<?php

namespace App\Http\Controllers;

use App\Models\vv_job;
use App\Models\vv_job_state;
use App\Models\vv_job_city;
use App\Models\vv_job_category;
use App\Models\vv_job_skill;
use App\Models\vv_job_sub_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserJobProfileCOntroller extends Controller
{
    public function Profile()
    {
        $job=DB::table('vv_job_profile')->where('user_id',session('user_id'))->first();
        $state=vv_job_state::all();
        $city=vv_job_city::all();
        $category=vv_job_category::all();
        $sub_category=vv_job_sub_category::all();
        $skill=DB::table('vv_job_skill')->get();
        return view('ui.old-ui.iwp-job-seeker-profile',
        ['state'=>$state,'city'=>$city,'category'=>$category,
        'sub_category'=>$sub_category,'skill'=>$skill,'job'=>$job]
        );
     
    }
    public function Store(Request $request)
    {
        //dd(request()->all());
        // $request->validate([
        //     'user_id'=>'required','job_title'=>'required', 'salary'=>'required','no_of_openings'=>'required','interview_date'=>'required',
        //     'interview_time'=>'required','role'=>'required', 'education_qualification'=>'required','state_id'=>'required','location'=>'required',
        //     'job_image'=>'required','category_id'=>'required', 'sub_category_id'=>'required','job_type'=>'required','year_of_experience'=>'required',
        //     'contact_no'=>'required','email_id'=>'required','website'=>'required','contact_person'=>'required','interview_location'=>'required','company_name'=>'required',
        //     'job_description'=>'required','small_description'=>'required','skill'=>'required',
            
            
        // ]);
        $pic=DB::table('vv_job_profile')->where('user_id',session('user_id'))->first();
        $file=request()->resume;

        if($file==null)
        {
          $file1=$pic->job_profile_resume;
        }
        else{
         $file1= $this->uploadImage(request()->resume);
        }
        $file=request()->job_profile_image;

        if($file==null)
        {
          $file2=$pic->job_profile_image;
        }
        else{
         $file2= $this->uploadImage(request()->job_profile_image);
        }
        $file=request()->profile_cover_image;

        if($file==null)
        {
          $file3=$pic->cover_image;
        }
        else{
         $file3= $this->uploadImage(request()->profile_cover_image);
        }

        $skill=request()->skill_set;
        $skill=implode(',',$skill);

           DB::table('vv_job_profile')->where('user_id',session('user_id'))->update([
                'user_id'=>session('user_id'),
                "profile_name" => request()->employee_name,
                "category_id" => request()->category_id,
                "current_company" => request()->current_company,
                "years_of_experience" => request()->year_of_experience,
                "notice_period" => request()->notice_period,
                "available_time_start" => request()->available_time_to_talk,
                "educational_qualification" => request()->educational_qualification,
                "skill_set" =>$skill,
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
               
                
                "job_profile_resume" => $file1,
                "job_profile_image" =>  $file2,
                "cover_image"=>$file3
          
            ]);
            
          return redirect()->route('db-all-job')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function Job_Applied(Request $request)
    {
      $job=DB::table('vv_job_applied')->where('job_user_id',session('user_id'))->get();
      return view('ui.old-ui.iwp-db-user-applied-jobs',
      ['job'=>$job]);

    }
    public function Job_Profile(Request $request,$id)
    {
      $job= DB::table('vv_job_profile')->where('user_id',$id)->first();
      return view('ui.old-ui.iwp-job-profile',
      ['job'=>$job]);
    }
    public function Applied_Profile(Request $request,$id)
    {
      $job= DB::table('vv_job_applied')->where('job_id',$id)->get();
      return view('ui.old-ui.iwp-applied-profile',
      ['jobs'=>$job,'id'=>$id]);
    }
    public function Delete(Request $request,$id)
    {
      DB::table('vv_job_applied')->where('job_id',$id)->delete();
      return redirect()->back();
    }
    
}
