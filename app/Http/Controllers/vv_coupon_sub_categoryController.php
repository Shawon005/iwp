<?php

namespace App\Http\Controllers;
use App\Models\vv_coupon_sub_category;
use App\Models\vv_coupon_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class vv_coupon_sub_categoryController extends Controller
{
    public function Index(Request $request)
    {
      $sub_category=vv_coupon_sub_category::all();
      $category=DB::table('vv_coupon_categories')->get();
      return view('coupon.sub.all-coupon_sub_category',
      ['sub_category'=>$sub_category,'category'=>$category]);

    }
    public function Store(Request $request)
    {

      $request->validate([ 
        'sub_category_name'=>'required|unique:vv_coupon_sub_categories,sub_category_name',
    ]);
     
    //    dd($F_file);
      
        //  dd(request()->all());
          $id=DB::table('vv_coupon_sub_categories')->insertGetId([
                'category_id'=>request()->category_id,
                'sub_category_name'=>request()->sub_category_name,
                'sub_category_code'=>'',
                'sub_category_image'=>'',
                'sub_category_status'=>'Active',
                'sub_category_slug'=>Str::of(request()->sub_category_name)->slug('-'),
                'sub_category_cdt'=>now()
                
            ]);
            code('vv_coupon_sub_categories','sub_category_code','sub_category_id',$id,'SUB_CAT');
          return redirect()->route('sub_category_table')->with('message' , 'Store was successful!');
           
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
        $sub_category = DB::table('vv_coupon_sub_categories')->where('sub_category_id',$id)->first();
        $C_category=vv_coupon_category::get();
        return view('coupon.sub.admin-edit-coupon-sub-category',
        ['sub_category'=>$sub_category,'C_category'=>$C_category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_coupon_sub_categories','sub_category_name',request()->sub_category_name,'sub_category_id',$id);
      if($val!=0){
      $request->validate([ 
          'sub_category_name'=>'required|unique:vv_coupon_sub_categories,sub_category_name',
      ]);
    }
        try{

            //dd(request()->all());
          DB::table('vv_coupon_sub_categories')->where('sub_category_id',$id)->update([
                'category_id'=>request()->category_id,
                'sub_category_name'=>request()->sub_category_name,
                'sub_category_slug'=>Str::of(request()->sub_category_name)->slug('-'),
                'sub_category_cdt'=>now()
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('sub_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_coupon_sub_categories')->where('sub_category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Sub_Category()
    {
        $C_category=vv_coupon_category::get();
        return view('coupon.sub.admin-add-new-coupon-sub-category',
     ['C_category'=>$C_category]
    );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
