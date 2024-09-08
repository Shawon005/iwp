<?php

namespace App\Http\Controllers;
use App\Models\ProductChildController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductChildCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $child_category=DB::table('vv_product_child_categories')->get();
      $sub_category=DB::table('vv_product_sub_categories')->get();
      $category=DB::table('vv_product_categories')->get();
      return view('product.child.all-product-child-category',
      ['child_category'=>$child_category,'sub_category'=>$sub_category,'category'=>$category]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            'child_category_name'=>'required|unique:vv_product_child_categories,child_category_name',
            
        ]);
     
    //    dd($F_file);
      
        // dd(request()->all());
             $id=DB::table('vv_product_child_categories')->insertGetId([
                'category_id'=>request()->category_id,
                'sub_category_id'=>(request()->sub_category_id==null)?0:request()->sub_category_id,
                'child_category_name'=>request()->child_category_name,
                'child_category_cdt'=>now(),
                'child_category_slug'=>Str::of(request()->child_category_name)->slug('-'),
                'child_category_status'=>'Active',
                'child_category_image'=>'',
                'child_category_code'=>''     
            ]);
            code('vv_product_child_categories','child_category_code','child_category_id',$id,'CHILD_CAT');
          return redirect()->route('product_child_category_table')->with('message' , 'Store was successful!');
           
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
        $child_category = DB::table('vv_product_child_categories')->where('child_category_id',$id)->first();
        $category=DB::table('vv_product_categories')->get();
        $sub_category =DB::table('vv_product_sub_categories')->get();
        return view('product.child.admin-edit-product-child-category',
        ['child_category'=>$child_category,'category'=>$category,'sub_category'=>$sub_category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_product_child_categories','child_category_name',request()->child_category_name,'child_category_id',$id);
      if($val!=0){
      $request->validate([ 
          'child_category_name'=>'required|unique:vv_product_child_categories,child_category_name',
        
      ]);
    }
        try{

           // dd(request()->all());
          DB::table('vv_product_child_categories')->where('child_category_id',$id)->update([
            'category_id'=>request()->category_id,
            'sub_category_id'=>(request()->sub_category_id==null)?0:request()->sub_category_id,
            'child_category_name'=>request()->child_category_name,
            'child_category_cdt'=>now(),
            'child_category_slug'=>Str::of(request()->child_category_name)->slug('-'),
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('product_child_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_product_child_categories')->where('child_category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function product()
    {
        $category=DB::table('vv_product_categories')->get();
        $sub_category =DB::table('vv_product_sub_categories')->get();
        return view('product.child.admin-add-new-product-child-category',
     ['category'=>$category,'sub_category'=>$sub_category]
    );
     
    }
    public function getChildCatByCatId($id)
    {
      $child_category= DB::table('vv_product_child_categories')->where('sub_category_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
       // dd($child_category);
      // 
        return response()->json(['child_category'=>$child_category]);
    }
}
