<?php

namespace App\Http\Controllers;
use App\Models\vv_coupon;
use App\Models\vv_coupon_brand;
use App\Models\vv_coupon_category;
use App\Models\vv_coupon_sub_category;
use App\Models\vv_coupon_child_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function Index(Request $request)
    {
      $coupon=vv_coupon::all();
      $users= DB::table('vv_users')->get();
      return view('coupon.all-coupon',
      ['coupon'=>$coupon,'users'=>$users]);

    }
    public function All_users(Request $request,$id)
    {
      $coupon=DB::table('vv_coupons')->where('coupon_id',$id)->first();
      
      return view('coupon.coupon-user',
      ['coupon'=>$coupon]);

    }

    public function Store(Request $request)
    {

        $request->validate([
            'coupon_user_id'=>'required','coupon_name'=>'required|unique:vv_coupons,coupon_name','coupon_code'=>'required','category_id'=>'required',
            'sub_category_id'=>'required','child_category_id'=>'required','brand_id'=>'required','coupon_link'=>'required',
             'coupon_photo'=>'required','coupon_start_date'=>'required','coupon_end_date'=>'required', 
        ]);
        $sub_category_id=request()->sub_category_id;
        $child_category_id=request()->child_category_id;
        $sub_category_id=implode(',',$sub_category_id);
        $child_category_id=implode(',',$child_category_id);
    //    dd($F_file);
        $files=request()->coupon_photo;
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
        // dd(request()->all());
            DB::table('vv_coupons')->insert([
                'coupon_user_id'=>request()->coupon_user_id,
                'coupon_name'=>request()->coupon_name,
                'coupon_code'=>request()->coupon_code,
                'category_id'=>request()->category_id,
                'sub_category_id'=>$sub_category_id,
                'child_category_id'=>$child_category_id,
                'brand_id'=>request()->brand_id,
                'coupon_link'=>request()->coupon_link,
                 'coupon_photo'=>$F_file,
                 'coupon_start_date'=>request()->coupon_start_date,
                 'coupon_end_date'=>request()->coupon_end_date,
                 'coupon_use_members'=>'',
                 'coupon_status'=>'Active',
                 'coupon_cdt'=>now()
                 
                
            ]);
            //dd("save");
          return redirect()->route('coupon_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {

        $coupon = DB::table('vv_coupons')->where('coupon_id',$id)->first();
        $sub=explode(',',$coupon->sub_category_id);
        $child=explode(',',$coupon->child_category_id);
        $brand=vv_coupon_brand::get();
        $category=vv_coupon_category::get();
        $sub_category =vv_coupon_sub_category::get();
        $child_category=vv_coupon_child_category::get();

        $users= DB::table('vv_users')->get();
        return view('coupon.admin-edit-coupons',
        ['coupon'=>$coupon,'brand'=>$brand,'category'=>$category,
        'sub_category'=>$sub_category,'child_category'=>$child_category,'users'=>$users,'sub'=>$sub,'child'=>$child]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_coupons','coupon_name',request()->coupon_name,'coupon_id',$id);
      if($val!=0){
      $request->validate([ 
          'coupon_name'=>'required|unique:vv_coupons,coupon_name',
      ]);
    }
        // $request->validate([
        //     'coupon_user_id'=>'required','coupon_name'=>'required','coupon_code'=>'required','category_id'=>'required',
        //     'sub_category_id'=>'required','child_category_id'=>'required','brand_id'=>'required','coupon_link'=>'required',
        //      'coupon_photo'=>'required','coupon_start_date'=>'required','coupon_end_date'=>'required', 
        // ]);
        $sub_category_id=request()->sub_category_id;
        $child_category_id=request()->child_category_id;
        $sub_category_id=implode(',',$sub_category_id);
        $child_category_id=implode(',',$child_category_id);
    //    dd($F_file);
        $files=request()->coupon_photo;
    //dd($files);
            if($files==NULL)
        {
            $file=DB::table('vv_coupons')->where('coupon_id',$id)->first();
            $F_file=$file->coupon_photo;
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
          DB::table('vv_coupons')->where('coupon_id',$id)->update([  
            'coupon_user_id'=>request()->coupon_user_id,'coupon_name'=>request()->coupon_name,
            'coupon_code'=>request()->coupon_code,'category_id'=>request()->category_id,
            'sub_category_id'=>$sub_category_id,'child_category_id'=>$child_category_id,
            'brand_id'=>request()->brand_id,'coupon_link'=>request()->coupon_link,
             'coupon_photo'=>$F_file,'coupon_start_date'=>request()->coupon_start_date,
             'coupon_end_date'=>request()->coupon_end_date,'coupon_cdt'=>now()
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('coupon_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_coupons')->where('coupon_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Coupon()
    {
        $brand=vv_coupon_brand::get();
        $category=vv_coupon_category::get();
        $sub_category =vv_coupon_sub_category::get();
        $child_category=vv_coupon_child_category::get();
        $users= DB::table('vv_users')->get();
        return view('coupon.admin-add-new-coupons',
        ['brand'=>$brand,'category'=>$category,'sub_category'=>$sub_category,'child_category'=>$child_category,'users'=>$users]
    );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function getPlans($id)
    {
        $sub_category =DB::table('vv_coupon_sub_categories')->where('category_id',$id)->get();
        //dd($sub_category);
        // dd(response()->json(['states'=>$states]));
        return response()->json(['sub_category'=>$sub_category]);
    }
    public function getPlans1($id)
    {
      $child_category=DB::table('vv_coupon_child_categories')->where('sub_category_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['child_category'=>$child_category]);
    }
}
