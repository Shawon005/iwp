<?php

namespace App\Http\Controllers;
use App\Models\vv_job_sub_category;
use App\Models\vv_job_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class JobSubCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $sub_category=vv_job_sub_category::all();
      return view('job.sub_category.all-job-sub-category',
      ['sub_category'=>$sub_category]);

    }
    public function Store(Request $request)
    {

      $request->validate([ 
        'sub_category_name'=>'required|unique:vv_job_sub_categories,sub_category_name',
     ]);

        DB::table('vv_job_sub_categories')->insertGetId([
                'sub_category_name'=>request()->sub_category_name,
                'category_id'=>request()->category_id,
                'sub_category_slug'=>Str::of(request()->sub_category_name)->slug('-'),
                'sub_category_status'=>'Active',
                'sub_category_image'=>'',
                'sub_category_code'=>'',
                'sub_category_cdt'=>now()
          
            ]);
            //dd(request()->all());
          return redirect()->route('job_sub_category_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $sub_category = sub_category::find($sub_category_id);
        $category=vv_job_category::all();
        $sub_category = DB::table('vv_job_sub_categories')->where('sub_category_id',$id)->first();
        return view('job.sub_category.admin-edit-job-sub-category',
        ['sub_category'=>$sub_category,'category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_job_sub_categories','sub_category_name',request()->sub_category_name,'sub_category_id',$id);
      if($val!=0){
      $request->validate([ 
          'sub_category_name'=>'required|unique:vv_job_sub_categories,sub_category_name',
      ]);
    }
        
        try{

            //dd(request()->all());
          DB::table('vv_job_sub_categories')->where('sub_category_id',$id)->update([
            'sub_category_name'=>request()->sub_category_name,
            'category_id'=>request()->category_id,
            'sub_category_slug'=>Str::of(request()->sub_category_name)->slug('-'),
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('job_sub_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_job_sub_categories')->where('sub_category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Job()
    {
      $category=vv_job_category::all();
        return view('job.sub_category.admin-add-new-job-sub-category',
        ['category'=>$category]
        );
     
    }
}
