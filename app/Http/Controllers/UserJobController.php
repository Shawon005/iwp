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

class UserJobController extends Controller
{
    public function Index(Request $request)
    {
      $job=DB::table('vv_jobs')->where('user_id',session('user_id'))->get();
      return view('ui.old-ui.iwp-db-all-jobs',
      ['job'=>$job]);
    }
    public function Delete($id)
    {
      DB::table('vv_jobs')->where('job_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Job()
    {
        $users=DB::table('vv_users')->get();
        $state=vv_job_state::all();
        $city=vv_job_city::all();
        $category=vv_job_category::all();
        $sub_category=vv_job_sub_category::all();
        $skill=DB::table('vv_job_skill')->get();
        return view('ui.old-ui.iwp-add-new-job',
        ['state'=>$state,'city'=>$city,'category'=>$category,
        'sub_category'=>$sub_category,'skill'=>$skill,'users'=>$users]
        );
     
    }
    public function Store(Request $request)
    {
       // dd(request()->all());
        $request->validate([
             'job_title'=>'required', 'salary'=>'required','no_of_openings'=>'required','interview_date'=>'required',
            'interview_time'=>'required','role'=>'required', 'education_qualification'=>'required','state'=>'required','location'=>'required',
            'company_logo'=>'required','job_category'=>'required', 'job_sub_category'=>'required','job_type'=>'required','year_of_experience'=>'required',
            'contact_no'=>'required','email_id'=>'required','contact_person'=>'required','interview_location'=>'required','company_name'=>'required',
            'job_description'=>'required','small_description'=>'required','skill_set'=>'required',
            
            
        ]);

        $skill=request()->skill_set;
        $skill=implode(',',$skill);
        $files=request()->company_logo;
        //dd($files);
        if($files==NULL)
       {
      
         $F_file=Null;
       }
       else{
               
               $F_file= $this->uploadImage($files);
       }

           DB::table('vv_jobs')->insert([

 

                'user_id'=>session('user_id'),'job_title'=>request()->job_title, 'job_salary'=>request()->salary,'no_of_openings'=>request()->no_of_openings,
                'job_interview_time'=> timeFormatconverter(request()->interview_time),'job_role'=>request()->role, 'educational_qualification'=>request()->education_qualification,
                'state_id'=>request()->state,'job_location'=>request()->location,'job_interview_date'=>request()->interview_date,
                'company_logo'=>$F_file,'category_id'=>request()->job_category, 'sub_category_id'=>request()->job_sub_category,'job_type'=>request()->job_type,
                'years_of_experience'=>request()->year_of_experience,'skill_set'=>$skill,
                'contact_number'=>request()->contact_no,'contact_email_id'=>request()->email_id,'contact_website'=>request()->website,'contact_person'=>request()->contact_person,
                'interview_location'=>request()->interview_location,'job_company_name'=>request()->company_name,
                'job_description'=>request()->job_description,'job_small_description'=>request()->small_description,
               'seo_title'=>request()->job_title,
               'seo_description'=>request()->job_description,
               'seo_keywords'=>'',
               'job_slug'=>Str::of(request()->job_title)->slug('-')
          
            ]);
            
          return redirect()->route('db-all-job')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $job = job::find($job_id);
        $job = DB::table('vv_jobs')->where('job_id',$id)->first();
        $state=vv_job_state::all();
        $city=vv_job_city::all();
        $category=vv_job_category::all();
        $sub_category=vv_job_sub_category::all();
        $skill=DB::table('vv_job_skill')->get();
        $users=DB::table('vv_users')->get();
        return view('ui.old-ui.iwp-edit-job',
        ['job'=>$job,'state'=>$state,'city'=>$city,'category'=>$category,
        'sub_category'=>$sub_category,'skill'=>$skill,'users'=>$users]);
     
    }
    public function Update(Request $request,$id)
    {
           $request->validate([
             'job_title'=>'required', 'salary'=>'required','no_of_openings'=>'required','interview_date'=>'required',
            'interview_time'=>'required','role'=>'required', 'education_qualification'=>'required','state'=>'required','location'=>'required',
            'job_category'=>'required', 'job_sub_category'=>'required','job_type'=>'required','year_of_experience'=>'required',
            'contact_no'=>'required','email_id'=>'required','contact_person'=>'required','interview_location'=>'required','company_name'=>'required',
            'job_description'=>'required','small_description'=>'required','skill_set'=>'required',
            
            
        ]);
        $skill=request()->skill_set;
        $skill=implode(',',$skill);
        $files=request()->company_logo;
        //dd($files);
        if($files==NULL)
        {
          $b= DB::table('vv_jobs')->where('job_id',$id)->first();
          $F_file=$b->company_logo;
        }
        else{
                
                $F_file= $this->uploadImage($files);
        }
        try{  
     
          DB::table('vv_jobs')->where('job_id',$id)->update([
            'job_title'=>request()->job_title, 'job_salary'=>request()->salary,'no_of_openings'=>request()->no_of_openings,
            'job_interview_time'=> timeFormatconverter(request()->interview_time),'job_role'=>request()->role, 'educational_qualification'=>request()->education_qualification,
            'state_id'=>request()->state,'job_location'=>request()->location,'job_interview_date'=>request()->interview_date,
          // dd(request()->all()),
            'company_logo'=>$F_file,
            
            'category_id'=>request()->job_category, 'sub_category_id'=>request()->job_sub_category,'job_type'=>request()->job_type,
            'years_of_experience'=>request()->year_of_experience,'skill_set'=>$skill,
            'contact_number'=>request()->contact_no,'contact_email_id'=>request()->email_id,'contact_website'=>request()->website,'contact_person'=>request()->contact_person,
            'interview_location'=>request()->interview_location,'job_company_name'=>request()->company_name,
            'job_description'=>request()->job_description,'job_small_description'=>request()->small_description,
           'seo_title'=>request()->job_title,
           'seo_description'=>request()->job_description,
           'seo_keywords'=>'',
           //dd(request()->all()),
           'job_slug'=>Str::of(request()->job_title)->slug('-'),
           
        ]);
        
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('db-all-job')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Throwable $th) {
            //dd("data not");
            return redirect()->back()->withInput()->withErrors(getMessage());
            //dd($e->getMessage());
        }    

    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
