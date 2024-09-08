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

class JobController extends Controller
{
    public function Index(Request $request)
    {
      $job=vv_job::all();
      
      return view('job.all-job',
      ['job'=>$job]);

    }
    public function Job_Applied(Request $request)
    {
      $job=DB::table('vv_job_profile')->get();
      
      return view('job.all-applied',
      ['job'=>$job]);

    }
    public function Seeker(Request $request)
    {
      $job=DB::table('vv_job_profile')->get();
      
      return view('job.all-seeker',
      ['job'=>$job]);

    }
    public function Applicant(Request $request)
    {
      $job=DB::table('vv_job_applied')->get();
      
      return view('job.applicant',
      ['job'=>$job]);

    }
    function popular()
    {
      $job=DB::table('vv_job_popular')->orderBy('job_popular_pos_id','asc')->get();
      
      return view('job.premium-job',
      ['job'=>$job]);
    }
    public function Store(Request $request)
    {

        // $request->validate([
        //     'user_id'=>'required','job_title'=>'required', 'salary'=>'required','no_of_openings'=>'required','interview_date'=>'required',
        //     'interview_time'=>'required','role'=>'required', 'education_qualification'=>'required','state_id'=>'required','location'=>'required',
        //     'job_image'=>'required','category_id'=>'required', 'sub_category_id'=>'required','job_type'=>'required','year_of_experience'=>'required',
        //     'contact_no'=>'required','email_id'=>'required','website'=>'required','contact_person'=>'required','interview_location'=>'required','company_name'=>'required',
        //     'job_description'=>'required','small_description'=>'required','skill'=>'required',
            
            
        // ]);
        $skill=request()->skill_set;
        $skill=implode(',',$skill);
        $files=request()->job_image;
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
//dd(request()->all());
           DB::table('vv_jobs')->insert([

                'user_id'=>request()->user_id,'job_title'=>request()->job_title, 'job_salary'=>request()->salary,'no_of_openings'=>request()->no_of_openings,
                'job_interview_time'=> timeFormatconverter(request()->interview_time),'job_role'=>request()->role, 'educational_qualification'=>request()->education_qualification,
                'state_id'=>request()->state,'job_location'=>request()->location,'job_interview_date'=>request()->interview_date,
                'company_logo'=>$F_file,'category_id'=>request()->category_id, 'sub_category_id'=>request()->sub_category_id,'job_type'=>request()->job_type,
                'years_of_experience'=>request()->year_of_experience,'skill_set'=>$skill,
                'contact_number'=>request()->contact_no,'contact_email_id'=>request()->email_id,'contact_website'=>request()->website,'contact_person'=>request()->contact_person,
                'interview_location'=>request()->interview_location,'job_company_name'=>request()->company_name,
                'job_description'=>request()->job_description,'job_small_description'=>request()->small_description,
                'seo_title'=>request()->job_title,
               'seo_description'=>request()->job_description,
               'seo_keywords'=>'',
               'job_slug'=>Str::of(request()->job_title)->slug('-')
          
            ]);
            $user=DB::table('vv_users')->where('user_id',request()->user_id)->first();
            $data['add']="Job";
            $data['title']="Fototech India Magazine & Portal";
            $date['name']=request()->job_title;
            $data['email']=request()->email_id;
            $data['user_name']=user(request()->user_id);
            $data['mobile']=request()->contact_no;
            $data['user_email']=$user->email_id;
            $data['admin_email']=Nam('vv_admin','admin_id',session('id'),'admin_email');
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
            $message->to($data['user_email'])->subject
            ($data['title']);});
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
            $message->to($data['admin_email'])->subject
            ($data['title']);});
          return redirect()->route('job_table')->with('message' , 'Store was successful!');
           
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
        return view('job.admin-edit-job',
        ['job'=>$job,'state'=>$state,'city'=>$city,'category'=>$category,
        'sub_category'=>$sub_category,'skill'=>$skill,'users'=>$users]);
     
    }
    public function Update(Request $request,$id)
    {
        // $request->validate([
            
        //     'user_id'=>'required','job_title'=>'required', 'salary'=>'required','no_of_openings'=>'required','interview_date'=>'required',
        //     'interview_time'=>'required','role'=>'required', 'education_qualification'=>'required','state_id'=>'required','location'=>'required',
        //     'job_image'=>'required','category_id'=>'required', 'sub_category_id'=>'required','job_type'=>'required','year_of_experience'=>'required',
        //     'contact_no'=>'required','email_id'=>'required','website'=>'required','contact_person'=>'required','interview_location'=>'required','company_name'=>'required',
        //     'job_description'=>'required','small_description'=>'required',
           
        // ]);
        $skill=request()->skill_set;
        $skill=implode(',',$skill);
        $files=request()->job_image;
        //dd($files);
        if($files==NULL)
       {
      
        $b= DB::table('vv_jobs')->where('job_id',$id)->first();
        $F_file=$b->company_logo;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
        try{
//dd($id);
            //dd(request()->all());
          DB::table('vv_jobs')->where('job_id',$id)->update([
            'user_id'=>request()->user_id,'job_title'=>request()->job_title, 'job_salary'=>request()->salary,'no_of_openings'=>request()->no_of_openings,
            'job_interview_time'=>timeFormatconverter(request()->interview_time),'job_role'=>request()->role, 'educational_qualification'=>request()->education_qualification,
            'state_id'=>request()->state,'job_location'=>request()->location,'job_interview_date'=>request()->interview_date,
            'company_logo'=>$F_file,'category_id'=>request()->category_id, 'sub_category_id'=>request()->sub_category_id,'job_type'=>request()->job_type,
            'years_of_experience'=>request()->year_of_experience,'skill_set'=>$skill,
            'contact_number'=>request()->contact_no,'contact_email_id'=>request()->email_id,'contact_website'=>request()->website,'contact_person'=>request()->contact_person,
            'interview_location'=>request()->interview_location,'job_company_name'=>request()->company_name,
            'job_description'=>request()->job_description,'job_small_description'=>request()->small_description,
           'seo_title'=>request()->job_title,
           'seo_description'=>request()->job_description,
           'job_slug'=>Str::of(request()->job_title)->slug('-')
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('job_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_jobs')->where('job_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Delete_Applied($id)
    {
      DB::table('vv_job_applied')->where('job_applied_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Delete_Seeker($id)
    {
      DB::table('vv_job_profile')->where('job_profile_id',$id)->delete();
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
        return view('job.admin-add-new-job',
        ['state'=>$state,'city'=>$city,'category'=>$category,
        'sub_category'=>$sub_category,'skill'=>$skill,'users'=>$users]
        );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function getPlans1($id)
    {
        $sub_category =DB::table('vv_job_sub_categories')->where('category_id',$id)->get();
        //dd($sub_category);
        // dd(response()->json(['states'=>$states]));
        return response()->json(['sub_category'=>$sub_category]);
    }
    public function getPlans2($id)
    {
      $city=DB::table('vv_job_cities')->where('state_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['city'=>$city]);
    }
}
