<?php

namespace App\Http\Controllers;
use App\Models\vv_job_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $category=vv_job_category::all();
      return view('job.category.all-job-category',
      ['category'=>$category]);

    }
    public function Show(Request $request,$id)
    {
      $sub_category=DB::table('vv_job_sub_categories')->where('category_id',$id)->get();
      return view('job.sub_category.all-job-sub-category',
      ['sub_category'=>$sub_category]);

    }
    public function Store(Request $request)
    {

        $request->validate([ 
            'category_name'=>'required|unique:vv_job_categories,category_name',
        ]);

        $id=DB::table('vv_job_categories')->insertGetId([
                'category_name'=>request()->category_name,
                'category_image'=>'',
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
                'category_status'=>'Active',
                'category_code'=>'',
                'category_filter'=>'0',
                'category_filter_pos_id'=>'1',
                'category_cdt'=>now()
            ]);
            code('vv_job_categories','category_code','category_id',$id,'CAT');
            
          return redirect()->route('job_category_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $category = category::find($category_id);
        $category = DB::table('vv_job_categories')->where('category_id',$id)->first();
        return view('job.category.admin-edit-job-category',
        ['category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_job_categories','category_name',request()->category_name,'category_id',$id);
        if($val!=0){
        $request->validate([ 
            'category_name'=>'required|unique:vv_job_categories,category_name',
        ]);
      }
        
        try{

            //dd(request()->all());
          DB::table('vv_job_categories')->where('category_id',$id)->update([
                'category_name'=>request()->category_name,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('job_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_job_categories')->where('category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Job()
    {
  
        return view('job.category.admin-add-new-job-category',
        );
     
    }
}
