<?php

namespace App\Http\Controllers;
use App\Models\vv_coupon_brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class vv_coupon_brandController extends Controller
{
    public function Index(Request $request)
    {
      $brand=vv_coupon_brand::all();
      return view('coupon.brand.all-brand',
      ['brand'=>$brand]);

    }
    public function Store(Request $request)
    {

        $request->validate([ 
            'brand_name'=>'required|unique:vv_coupon_brands,brand_name',
        ]);
     
    //    dd($F_file);
      
        // dd(request()->all());
       $id= DB::table('vv_coupon_brands')->insertGetId([
                'brand_name'=>request()->brand_name,
                'brand_code'=>'',
                'brand_image'=>'',
                'brand_status'=>'Active',
                'brand_slug'=>Str::of(request()->brand_name)->slug('-'),
                'brand_cdt'=>now()
                
            ]);
            code('vv_coupon_brands','brand_code','brand_id',$id,'BRAND');
          return redirect()->route('brand_table')->with('message' , 'Store was successful!');
           
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
        $brand = DB::table('vv_coupon_brands')->where('brand_id',$id)->first();
        return view('coupon.brand.admin-edit-coupon-brand',
        ['brand'=>$brand]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_coupon_brands','brand_name',request()->brand_name,'brand_id',$id);
        if($val!=0){
        $request->validate([ 
            'brand_name'=>'required|unique:vv_coupon_brands,brand_name',
        ]);
      }
        try{

            //dd(request()->all());
          DB::table('vv_coupon_brands')->where('brand_id',$id)->update([  
                'brand_name'=>request()->brand_name,
                'brand_slug'=>Str::of(request()->brand_name)->slug('-'),
                'brand_cdt'=>now()
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('brand_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_coupon_brands')->where('brand_id',$id)->delete();
      return redirect()->route('brand_table')->with('message' , 'Delete was successful!');
    }

    public function Brand()
    {

        return view('coupon.brand.admin-add-new-coupon-brand',
    
    );
     
    }

}
