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

class UserCouponController extends Controller
{
    public function Index(Request $request)
    {
      $coupon=DB::table('vv_coupons')->where('coupon_user_id',session('user_id'))->get();
      return view('ui.old-ui.iwp-db-coupons',
      ['coupons'=>$coupon]);

    }
    
    public function addCoupon() {
        
        $categories = DB::table('vv_coupon_categories')->get();

        return view('ui.old-ui.add-coupons', [
            'categories' => $categories
        ]);
    }

    public function Store(Request $request)
    {
       // dd(request()->all());
        // $request->validate([
        //     'coupon_user_id'=>'required','coupon_name'=>'required|unique:vv_coupons,coupon_name','coupon_code'=>'required','category_id'=>'required',
        //     'sub_category_id'=>'required','child_category_id'=>'required','brand_id'=>'required','coupon_link'=>'required',
        //      'coupon_photo'=>'required','coupon_start_date'=>'required','coupon_end_date'=>'required', 
        // ]);
        $sub_category_id=request()->sub_category_id;
        $child_category_id=request()->child_category_id;
        $sub_category_id=implode(',',$sub_category_id);
        $child_category_id=implode(',',$child_category_id);
        $files=request()->coupon_photo;
    //dd($files);
            if($files==NULL)
        {
        
            $F_file=Null;
        }
        else{        
           $F_file= $this->uploadImage($files);
  
            }
        // dd(request()->all());
            DB::table('vv_coupons')->insert([
                'coupon_user_id'=>session('user_id'),
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
          return redirect()->route('db-coupons')->with('message' , 'Store was successful!');
           
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
        
        $categories = DB::table('vv_coupon_categories')->get();

        $users= DB::table('vv_users')->get();
        return view('ui.old-ui.edit-coupons',
        ['coupon'=>$coupon,'brand'=>$brand, 'categories' => $categories,'category'=>$category,
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
    $sub_category_id=request()->sub_category_id;
    $child_category_id=request()->child_category_id;
    $sub_category_id=implode(',',$sub_category_id);
    $child_category_id=implode(',',$child_category_id);
        // $request->validate([
        //     'coupon_user_id'=>'required','coupon_name'=>'required','coupon_code'=>'required','category_id'=>'required',
        //     'sub_category_id'=>'required','child_category_id'=>'required','brand_id'=>'required','coupon_link'=>'required',
        //      'coupon_photo'=>'required','coupon_start_date'=>'required','coupon_end_date'=>'required', 
        // ]);
        $files=request()->coupon_photo_e;
        //dd($files);
                if($files==NULL)
            {
                $cou=DB::table('vv_coupons')->where('coupon_id',$id)->first();
            
                $F_file=$cou->coupon_photo;
            }
            else{        
               $F_file= $this->uploadImage($files);
      
                }
            // dd(request()->all());
                DB::table('vv_coupons')->where('coupon_id',$id)->update([
                    'coupon_name'=>request()->coupon_name,
                    'coupon_code'=>request()->coupon_code,
                    'coupon_link'=>request()->coupon_link,
                    'category_id'=>request()->category_id,
                    'sub_category_id'=>$sub_category_id,
                    'child_category_id'=>$child_category_id,
                    'brand_id'=>request()->brand_id,
                    'coupon_photo'=>$F_file,
                    'category_id' => request()->category_id,
                    'coupon_start_date'=>request()->coupon_start_date,
                    'coupon_end_date'=>request()->coupon_end_date,
                    
                ]);
                //dd("save");
              return redirect()->route('db-coupons')->with('message' , 'update was successful!');
            //return redirect()->back();
            
          

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
        return view('ui.old-ui.add-coupons',
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
    public function Viwe($id)
    {
        page_viwe(10,$id);
        $cp=DB::table('vv_coupons')->where('coupon_id',$id)->first();
        $cu=arr($cp->coupon_use_members);
        $k=0;
        foreach($cu as $ch)
        {
            if($ch==session('user_id'))
            {
                $k=1;
            }
        }
        if($k==0){
            $cu[]=session('user_id');
        }
       
        $cp=implode(',',$cu);
        DB::table('vv_coupons')->where('coupon_id',$id)->update([
         'coupon_use_members'=>$cp,
        ]);
        return response()->json([$cp]);
    }
}
