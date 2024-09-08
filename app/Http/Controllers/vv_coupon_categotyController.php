<?php

namespace App\Http\Controllers;
use App\Models\vv_coupon_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class vv_coupon_categotyController extends Controller
{
   
    public function Index(Request $request)
    {
      $category=vv_coupon_category::all();
      return view('coupon.category.all-coupon_category',
      ['category'=>$category]);

    }
    public function Show(Request $request,$id)
    {
      $sub_category=DB::table('vv_coupon_sub_categories')->where('category_id',$id)->get();
      $category=DB::table('vv_coupon_categories')->get();
      return view('coupon.sub.all-coupon_sub_category',
      ['sub_category'=>$sub_category,'category'=>$category]);

    }
    public function Store(Request $request)
    {

      $request->validate([ 
        'category_name'=>'required|unique:vv_coupon_categories,category_name',
    ]);
     
  
        $files=request()->category_image;
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
      
  
         $id=DB::table('vv_coupon_categories')->insertGetId([
                'category_name'=>request()->category_name,
                'category_image'=>$F_file,
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
                'category_status'=>'Active',
                'category_code'=>'',
                'category_filter'=>'0',
                'category_filter_pos_id'=>'1',
                'category_cdt'=>now()
            ]);
            code('vv_coupon_categories','category_code','category_id',$id,'CAT');
          return redirect()->route('category_table')->with('message' , 'Store was successful!');
           
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
        $category = DB::table('vv_coupon_categories')->where('category_id',$id)->first();
        return view('coupon.category.admin-edit-coupon-category',
        ['category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_coupon_categories','category_name',request()->category_name,'category_id',$id);
      if($val!=0){
      $request->validate([ 
          'category_name'=>'required|unique:vv_coupon_categories,category_name',
      ]);
    }
        $F_file=Null;
        $files=request()->category_image;

        if($files==NULL)
       {
        $forFile=DB::table('vv_coupon_categories')->where('category_id',$id)->first();
         $F_file=$forFile->category_image;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
             
              $F_file=implode(',',$file_all);  
       }
        
        try{

            //dd(request()->all());
          DB::table('vv_coupon_categories')->where('category_id',$id)->update([
            'category_name'=>request()->category_name,
            'category_image'=>$F_file,
            'category_slug'=>Str::of(request()->category_name)->slug('-'),
            'category_cdt'=>now()
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_coupon_categories')->where('category_id',$id)->delete();
      return redirect()->route('category_table')->with('message' , 'Delete was successful!');
    }

    public function Coupon()
    {
        return view('coupon.category.admin-add-new-coupon-category');
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
