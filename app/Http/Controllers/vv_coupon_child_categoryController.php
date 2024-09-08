<?php

namespace App\Http\Controllers;
use App\Models\vv_coupon_sub_category;
use App\Models\vv_coupon_child_category;
use App\Models\vv_coupon_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class vv_coupon_child_categoryController extends Controller
{
    public function Index(Request $request)
    {
      $sub_category = DB::table('vv_coupon_sub_categories')->get();
      $category= DB::table('vv_coupon_categories')->get();
      $child_category=DB::table('vv_coupon_child_categories')->get();
      return view('coupon.child.all-coupon_child_category',
      ['child_category'=>$child_category,'sub_category'=>$sub_category,'category'=>$category]);

    }
    public function Store(Request $request)
    {

      $request->validate([ 
        'child_category_name'=>'required|unique:vv_coupon_child_categories,child_category_name',
    ]);
     
    //    dd($F_file);
      
        // dd(request()->all());
          $id=DB::table('vv_coupon_child_categories')->insertGetId([
                'category_id'=>request()->category_id,
                'sub_category_id'=>request()->sub_category_id,
                'child_category_name'=>request()->child_category_name,
                'child_category_code'=>'',
                'child_category_image'=>'',
                'child_category_status'=>'Active',
                'child_category_slug'=>Str::of(request()->child_category_name)->slug('-'),
                'child_category_cdt'=>now()
                
                
            ]);
            code('vv_coupon_child_categories','child_category_code','child_category_id',$id,'CHILD_CAT');
          return redirect()->route('child_category_table')->with('message' , 'Store was successful!');
           
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
        $child_category = DB::table('vv_coupon_child_categories')->where('child_category_id',$id)->first();
        $C_category=vv_coupon_category::get();
        $sub_category =vv_coupon_sub_category::get();
        return view('coupon.child.admin-edit-coupon-child-category',
        ['child_category'=>$child_category,'C_category'=>$C_category,'sub_category'=>$sub_category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_coupon_child_categories','child_category_name',request()->child_category_name,'child_category_id',$id);
      if($val!=0){
      $request->validate([ 
          'child_category_name'=>'required|unique:vv_coupon_child_categories,child_category_name',
      ]);
    }
        
        try{

           // dd(request()->all());
          DB::table('vv_coupon_child_categories')->where('child_category_id',$id)->update([
                'category_id'=>request()->category_id,
                'sub_category_id'=>request()->sub_category_id,
                'child_category_name'=>request()->child_category_name,
                'child_category_slug'=>Str::of(request()->child_category_name)->slug('-'),
                'child_category_cdt'=>now()
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('child_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_coupon_child_categories')->where('child_category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function child_Category()
    {
        $C_category=vv_coupon_category::get();
        $sub_category =vv_coupon_sub_category::get();
        return view('coupon.child.admin-add-new-coupon-child-category',
     ['C_category'=>$C_category,'sub_category'=>$sub_category]
    );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
