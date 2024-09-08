<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExpertCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $expert_category=DB::table('vv_expert_categories')->get();
      return view('expert.category.all-expert-category',
      ['expert_category'=>$expert_category]);

    }
    public function Show(Request $request,$id)
    {
      $sub_category=DB::table('vv_expert_sub_categories')->where('category_id',$id)->get();
      $category=DB::table('vv_expert_categories')->get();
      return view('expert.sub.all-expert-sub-category',
      ['sub_category'=>$sub_category,'category'=>$category]);

    }
    public function Store(Request $request)
    {

      $request->validate([ 
        'category_name'=>'required|unique:vv_expert_categories,category_name',
    ]);
        $files=request()->category_image;
        //dd($files);
        if($files==NULL)
       {
      
         $F_file="Null";
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
        //dd(request()->all());

      $id= DB::table('vv_expert_categories')->insertGetId([

                'category_name'=>request()->category_name,
                'category_image'=>$F_file,
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
                'category_status'=>'Active',
                'category_code'=>'',
                'category_filter'=>'0',
                'category_filter_pos_id'=>'1',
                'category_cdt'=>now()
            ]);
            code('vv_expert_categories','category_code','category_id',$id,'CAT');
            
          return redirect()->route('expert_category_table')->with('message' , 'Store was successful!');
           
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
        $category = DB::table('vv_expert_categories')->where('category_id',$id)->first();
        return view('expert.category.admin-expert-edit-category',
        ['category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_expert_categories','category_name',request()->category_name,'category_id',$id);
      if($val!=0){
      $request->validate([ 
          'category_name'=>'required|unique:vv_expert_categories,category_name',
      ]);
    }
      
        $files=request()->category_image;
        //dd($files);
        if($files==NULL)
       {
        $pro=DB::table('vv_expert_categories')->where('category_id',$id)->first();
         $F_file=$pro->category_image;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
        try{

            //dd(request()->all());
          DB::table('vv_expert_categories')->where('category_id',$id)->update([
                'category_name'=>request()->category_name,
                'category_image'=>$F_file,
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('expert_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_expert_categories')->where('category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Expert()
    {
  
        return view('expert.category.admin-expert-add-new-category',
        );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function Position(Request $request)
    {
        $category=DB::table('vv_expert_categories')->orderBy('category_filter_pos_id','asc')->get();
        return view('expert.category.category-position',
        ['category'=>$category]);
    }
    public function Position_Store(Request $request,$sort)
    {
        $no=0;
        preg_match_all('!\d+!', $sort, $arr);

        
        foreach($arr[0] as $id){
        
        DB::table('vv_expert_categories')->where('category_id',$id)->update([
          'category_filter_pos_id'=>$no++,
        ]);
      }
      
      return response()->json(['position']);
    }
}
