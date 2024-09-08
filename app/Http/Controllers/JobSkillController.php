<?php

namespace App\Http\Controllers;
use App\Models\vv_job_skill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobSkillController extends Controller
{
    public function Index(Request $request)
    {
      $skill=DB::table('vv_job_skill')->get();
      return view('job.skill.all-job-skill',
      ['skill'=>$skill]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            
            'skill_name'=>'required|unique:vv_job_skill,category_name'
            
        ]);

        $id=DB::table('vv_job_skill')->insertGetId([
                'category_name'=>request()->skill_name,
                'category_image'=>'',
                'category_slug'=>Str::of(request()->skill_name)->slug('-'),
                'category_status'=>'Active',
                'category_code'=>'',
                'category_filter'=>'0',
                'category_filter_pos_id'=>'1',
                'category_cdt'=>now()
            ]);
            code('vv_job_skill','category_code','category_id',$id,'CAT');
          return redirect()->route('job_skill_table')->with('message' , 'Store was successful!');
             

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $skill = skill::find($skill_id);
        $job_skill = DB::table('vv_job_skill')->where('category_id',$id)->first();
        return view('job.skill.admin-edit-job-skill',
        ['job_skill'=>$job_skill]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_job_skill','category_name',request()->skill_name,'category_id',$id);
      if($val!=0){
      $request->validate([ 
          'skill_name'=>'required|unique:vv_job_skill,category_name',
      ]);
    }
        try{

            //dd(request()->all());
          DB::table('vv_job_skill')->where('category_id',$id)->update([
                'category_name'=>request()->skill_name,
                'category_slug'=>Str::of(request()->skill_name)->slug('-')      
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('job_skill_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_job_skill')->where('category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Skill()
    { 
        return view('job.skill.admin-add-new-job-skill',
        );
     
    }
}
