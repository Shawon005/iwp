<?php

namespace App\Http\Controllers;
use App\Models\ProductBrand;
use App\Models\ProductChildCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function Index(Request $request)
    {
      $product= DB::table('vv_products')->where('user_id',session('user_id'))->get();
      $users= DB::table('vv_users')->get();
      return view('ui.old-ui.iwp-db-all-products',
      ['product'=>$product,'users'=>$users]);

    }
    public function Store(Request $request)
    {
    //dd(request()->all());

        $request->validate([ 
          'product_name'=>'required|unique:vv_products,product_name',
          'product_info_question'=>'required',
          'product_info_answer'=>'required',
          'product_highlights'=>'required',
          'category_id'=>'required',          
          'product_price'=>'required',
          'product_description'=>'required'
        ]);
        //dd(request()->all());
        $product_info_question=request()->product_info_question;
        $product_info_question=implode(',',$product_info_question);

        $product_info_answer=request()->product_info_answer;
        $product_info_answer=implode(',',$product_info_answer);

        $highlight=request()->product_highlights;
        $highlight=implode(',',$highlight);

        
        if(request()->sub_category_id!=null){
        $sub_category_id=request()->sub_category_id;
        $sub_category_id=implode(',',$sub_category_id);
        }
        else{
          $sub_category_id=0;
        }
       
        if(request()->child_category_id!=null){
          $child_category_id=request()->child_category_id;
          $child_category_id=implode(',',$child_category_id);
          }
          else{
            $child_category_id=0;
          }

        $files=request()->gallery_image;
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
      
        //dd($F_file);
        try{
            //dd(request()->all());
            // $try=DB::table('vv_products')->get();
            // dd($try);
      $id=  DB::table('vv_products')->insertGetId([
             //dd(request()->all()),
                'user_id'=>session('user_id'),
                'category_id'=>request()->category_id,
                'gallery_image'=>$F_file,
                'product_name'=>request()->product_name,
                'product_price'=>request()->product_price,
                'product_price_offer'=>request()->product_price_offer,
                'product_description'=>request()->product_description,
                'discount_type'=>'coins',
                'wallet_cashback'=>0,
                'affiliation_amount'=>0,
                'affiliation_amount_type'=>'',
                'product_highlights'=>$highlight,
                'discount_val'=>0,
                'product_info_question'=>$product_info_question,
                'product_info_answer'=>$product_info_answer,
                'brand_id'=>(request()->brand_id==null)?0:request()->brand_id,
                'product_type'=>"External",
                'product_payment_link'=>((request()->product_payment_link)==null?'':request()->product_payment_link),
                'product_tags'=>request()->product_tags,
                'child_category_id'=>$child_category_id,
                'sub_category_id'=>$sub_category_id,
                'seo_title'=>'',
                'seo_description'=>'',
                'seo_keywords'=>'',
                'product_status'=>'Active',
                'payment_status'=>'Padding',
                'product_slug'=>Str::of(request()->product_name)->slug('-'),
                'product_is_delete'=>0,
                'product_delete_cdt'=>now(),
                'product_code'=>' ',
                'service_id'=>' ',
                'service_image'=>' ',
                'product_cdt'=>now()

            ]);
            code('vv_products','product_code','product_id',$id,'PRODUCT');
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('db-all-product')->with('message' , 'Store was successful!');
          //  return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Edit( $id)
    {
        //dd($id);
        $product= DB::table('vv_products')->where('product_id',$id)->first();
        $product_info_question=explode(',', $product->product_info_question);
        $product_info_answer=explode(',', $product->product_info_answer);
        $highlight=explode(',', $product->product_highlights);
        $child=explode(',', $product->child_category_id);
        $sub=explode(',', $product->sub_category_id);
        $users= DB::table('vv_users')->get();

        $brand=DB::table('vv_brands')->get();
        $category=DB::table('vv_product_categories')->get();
        $sub_category =DB::table('vv_product_sub_categories')->get();
        $child_category=DB::table('vv_product_child_categories')->get();

        return view('ui.old-ui.edit-product',
        ['product'=>$product,'product_info_question'=>$product_info_question,
        'product_info_answer'=>$product_info_answer,'brand'=>$brand,'category'=>$category,'sub_category'=>$sub_category,
        'child_category'=>$child_category,'highlight'=>$highlight,'users'=>$users,'child'=>$child,'sub'=>$sub
    ]); 
}
    // }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_products','product_name',request()->product_name,'product_id',$id);
      if($val!=0){
      $request->validate([ 
          'product_name'=>'required|unique:vv_products,product_name',
          'product_info_question'=>'required',
          'product_info_answer'=>'required',
          'product_highlights'=>'required',
          'category_id'=>'required',          
          'product_price'=>'required',
          'product_description'=>'required'
      ]);
    }
    else{
         $request->validate([ 
          'product_name'=>'required',
          'product_info_question'=>'required',
          'product_info_answer'=>'required',
          'product_highlights'=>'required',
          'category_id'=>'required',          
          'product_price'=>'required',
          'product_description'=>'required'
        ]);
    }
        //dd(request()->all());
        $product_info_question=request()->product_info_question;
        $product_info_question=implode(',',$product_info_question);

        $product_info_answer=request()->product_info_answer;
        $product_info_answer=implode(',',$product_info_answer);

        $highlight=request()->product_highlights;
        $highlight=implode(',',$highlight);

        
        if(request()->sub_category_id!=null){
        $sub_category_id=request()->sub_category_id;
        $sub_category_id=implode(',',$sub_category_id);
        }
        else{
          $sub_category_id=0;
        }
        if(request()->child_category_id!=null){
          $child_category_id=request()->child_category_id;
          $child_category_id=implode(',',$child_category_id);
          }
          else{
            $child_category_id=0;
          }


        $files=request()->gallery_image;
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
       // dd($id);
        try{
            //dd(request()->all());
            DB::table('vv_products')->where('product_id',$id)->update([
              'category_id'=>request()->category_id,
              'gallery_image'=>$F_file,
              'product_name'=>request()->product_name,
              'product_price'=>request()->product_price,
              'product_price_offer'=>request()->product_price_offer,
              'product_description'=>request()->product_description,
              'product_highlights'=>$highlight,
              'product_info_question'=>$product_info_question,
              'product_info_answer'=>$product_info_answer,
              'product_payment_link'=>((request()->product_payment_link)==null?'':request()->product_payment_link),
              'product_tags'=>request()->product_tags,
              'sub_category_id'=>$sub_category_id,
              'child_category_id'=>$child_category_id,
              'brand_id'=>(request()->brand_id==null)?0:request()->brand_id,
        ]);
          


            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('db-all-product')->with('message' , 'Update was successful!');
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
        DB::table('vv_products')->where('product_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function product()
    {
        $brand=DB::table('vv_brands')->get();
        $category=DB::table('vv_product_categories')->get();
        $sub_category =DB::table('vv_product_sub_categories')->get();
        $child_category=DB::table('vv_product_child_categories')->get();
        $user=DB::table('vv_users')->get();
        return view('ui.old-ui.add-new-product',['brand'=>$brand,'category'=>$category,
        'sub_category'=>$sub_category,'child_category'=>$child_category,'user'=>$user]
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
        $sub_category =DB::table('vv_product_sub_categories')->where('category_id',$id)->get();
        //dd($sub_category);
        // dd(response()->json(['states'=>$states]));
        return response()->json(['sub_category'=>$sub_category]);
    }
    public function getPlans1($id)
    {
      $child_category=DB::table('vv_product_child_categories')->where('sub_category_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['child_category'=>$child_category]);
    }
    public function getSubCatByCatId($id)
    {
        $sub_category =DB::table('vv_product_sub_categories')->where('category_id',$id)->get();
        //dd($sub_category);
        // dd(response()->json(['states'=>$states]));
        return response()->json(['sub_category'=>$sub_category]);
    }
}
