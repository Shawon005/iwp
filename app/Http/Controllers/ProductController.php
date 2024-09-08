<?php

namespace App\Http\Controllers;
use App\Models\ProductBrand;
use App\Models\ProductChildCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\URL;
use App\Services\PayUService\Exception;
class ProductController extends Controller
{
    public function Index(Request $request)
    {
      $product= DB::table('vv_products')->get();
      $users= DB::table('vv_users')->get();
      return view('product.all-product',
      ['product'=>$product,'users'=>$users]);

    }
    public function Store(Request $request)
    {
//dd(request()->all());
        $request->validate([ 
          'product_name'=>'required|unique:vv_products,product_name',
        ]);
        //dd(request()->all());
        $product_info_question=request()->product_info_question;
        $product_info_question=implode(',',$product_info_question);

        $product_info_answer=request()->product_info_answer;
        $product_info_answer=implode(',',$product_info_answer);

        $highlight=request()->highlight;
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
        } else{
          $child_category_id=0;
        }

        if(request()->frequents_id!=null){
            $frequents_id=request()->frequents_id;
            $frequents_id=implode(',',$frequents_id);
        } else{
          $frequents_id=NULL;
        }


        $files=request()->product_images;
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
      
       if(!isset(request()->product_type))
          $type="External";
       else
       $type=request()->product_type;
        //dd($F_file);
        try{
            //dd(request()->all());
            // $try=DB::table('vv_products')->get();
            // dd($try);
      $id=  DB::table('vv_products')->insertGetId([
           //  dd(request()->all()),
                'user_id'=>request()->user_id,
                'category_id'=>request()->category_id,
                'gallery_image'=>$F_file,
                'product_name'=>request()->product_name,
                'product_price'=>request()->price,
                'product_price_offer'=>(request()->offer==null)?request()->price:request()->offer,
                'product_description'=>request()->product_details,
                'discount_type'=>(request()->discount_type==null)?NULL:request()->discount_type,
                'discount_val'=>(request()->discount_val==null)?0:request()->discount_val,
                'wallet_cashback'=>(request()->wallet_cashback==null)?0:request()->wallet_cashback,
                'affiliation_amount'=>(request()->affiliation_amount==null)?0:request()->affiliation_amount,
                'affiliation_amount_type'=>(request()->affiliation_amount_type==null)?'':request()->affiliation_amount_type,
                'product_highlights'=>$highlight,
                'product_info_question'=>$product_info_question,
                'product_info_answer'=>$product_info_answer,
                'brand_id'=>request()->brand_id,
                'frequents_id' => $frequents_id,
                'product_type'=>$type,
                'product_payment_link'=>((request()->product_payment_link)==null?'':request()->product_payment_link),
                'product_tags'=>request()->product_tags,
                'child_category_id'=>$child_category_id,
                'sub_category_id'=>$sub_category_id,
                'seo_title'=>request()->product_name,
                'seo_description'=>request()->product_details,
                'seo_keywords'=>' ',
                'product_status'=>'Active',
                'payment_status'=>'Pending',
                'product_slug'=>Str::of(request()->product_name)->slug('-'),
                'product_is_delete'=>0,
                'product_delete_cdt'=>now(),
                'product_code'=>' ',
                'service_id'=>' ',
                'service_image'=>' ',
                'product_cdt'=>now()

            ]);
            code('vv_products','product_code','product_id',$id,'PRODUCT');
            
            $user=DB::table('vv_users')->where('user_id',request()->user_id)->first();
            $data['add']="Product";
            $data['title']="Fototech India Magazine & Portal";
            $date['produc_name']=request()->product_name;
            $data['price']=request()->price;
            $data['user_name']=user(request()->user_id);
            $data['user_email']=$user->email_id;
            $data['admin_email']=Nam('vv_admin','admin_id',session('id'),'admin_email');
          //  dd($data);
            Mail::send('item-add-mail-product', ['data'=>$data], function($message) use ($data) {
            $message->to($data['user_email'])->subject
            ($data['title']);});
            Mail::send('item-add-mail-product', ['data'=>$data], function($message) use ($data) {
            $message->to($data['admin_email'])->subject
            ($data['title']);});
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('product_table')->with('message' , 'Store was successful!');
          //  return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd($request);
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Edit( $id)
    {
        //dd($id);
        $products= DB::table('vv_products')->get();
        $product= $products->first();
        $product_info_question=explode(',', $product->product_info_question);
        $product_info_answer=explode(',', $product->product_info_answer);
        $highlight=explode(',', $product->product_highlights);
        $child=explode(',', $product->child_category_id);
        $sub=explode(',', $product->sub_category_id);
        $frequents_id=explode(',', $product->frequents_id);
        $users= DB::table('vv_users')->get();

        $brand=DB::table('vv_brands')->get();
        $category=DB::table('vv_product_categories')->get();
        $sub_category =DB::table('vv_product_sub_categories')->get();
        $child_category=DB::table('vv_product_child_categories')->get();

        return view('product.admin-edit-product',
        ['products' => $products, 'product'=>$product,'product_info_question'=>$product_info_question,
        'product_info_answer'=>$product_info_answer,'brand'=>$brand,'category'=>$category,'sub_category'=>$sub_category,
        'child_category'=>$child_category,'highlight'=>$highlight,'users'=>$users,'child'=>$child,'sub'=>$sub, 'frequents_id' => $frequents_id
    ]); 
}
    // }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_products','product_name',request()->product_name,'product_id',$id);
      if($val!=0){
      $request->validate([ 
          'product_name'=>'required|unique:vv_products,product_name',
      ]);
    }
        //dd(request()->all());
        $product_info_question=request()->product_info_question;
        $product_info_question=implode(',',$product_info_question);

        $product_info_answer=request()->product_info_answer;
        $product_info_answer=implode(',',$product_info_answer);

        $highlight=request()->highlight;
        $highlight=implode(',',$highlight);

        if(request()->sub_category_id!=null){
          $sub_category_id=request()->sub_category_id;
          $sub_category_id=implode(',',$sub_category_id);
        }
        else{
          $sub_category_id='0';
        }
        if(request()->child_category_id!=null){
        $child_category_id=request()->child_category_id;
        $child_category_id=implode(',',$child_category_id);
        }
        else{
          $child_category_id='0';
        }

        if(request()->frequents_id!=null){
          $frequents_id=request()->frequents_id;
          $frequents_id=implode(',',$frequents_id);
        }
        else{
          $frequents_id=NULL;
        }

        $files=request()->product_images;
        //dd($files);
        if($files==NULL)
       {
        $pro= DB::table('vv_products')->where('product_id',$id)->first();
         $F_file=$pro->gallery_image;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
       if(!isset(request()->product_type))
         $type="External";
       else
         $type=request()->product_type;
       // dd($id);
        try{
            //dd(request()->all());
            DB::table('vv_products')->where('product_id',$id)->update([
                'user_id'=>request()->user_id,
                'category_id'=>request()->category_id,
                'gallery_image'=>$F_file,
                'product_name'=>request()->product_name,
                'product_price'=>request()->price,
                'product_price_offer'=>(request()->offer==null)?request()->price:request()->offer,
                'product_description'=>request()->product_details,
                'discount_type'=>(request()->discount_type==null)?NULL:request()->discount_type,
                'discount_val'=>(request()->discount_val==null)?0:request()->discount_val,
                'wallet_cashback'=>(request()->wallet_cashback==null)?0:request()->wallet_cashback,
                'affiliation_amount'=>(request()->affiliation_amount==null)?0:request()->affiliation_amount,
                'affiliation_amount_type'=>(request()->affiliation_amount_type==null)?'':request()->affiliation_amount_type,
                'product_highlights'=>$highlight,
                'product_info_question'=>$product_info_question,
                'product_info_answer'=>$product_info_answer,
                'brand_id'=>request()->brand_id,
                'frequents_id' => $frequents_id,
                'product_type'=>$type,
                'product_payment_link'=>((request()->product_payment_link)==null?'':request()->product_payment_link),
                'product_tags'=>request()->product_tags,
                'child_category_id'=>$child_category_id,
                'sub_category_id'=>$sub_category_id,
                'seo_title'=>request()->product_name,
                'seo_description'=>request()->product_details,
                'product_slug'=>Str::of(request()->product_name)->slug('-'),
                'product_cdt'=>now()
        ]);
          


            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('product_table')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Exception $e) {
            // dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            dd($e->getMessage());
        }    

    }
    public function Delete($id)
    {
        DB::table('vv_products')->where('product_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function product()
    {
        $products = DB::table('vv_products')->get();
        $brand=DB::table('vv_brands')->get();
        $category=DB::table('vv_product_categories')->get();
        $sub_category =DB::table('vv_product_sub_categories')->get();
        $child_category=DB::table('vv_product_child_categories')->get();
        $user=DB::table('vv_users')->get();
        return view('product.admin-add-new-product',['products' => $products, 'brand'=>$brand,'category'=>$category,
        'sub_category'=>$sub_category,'child_category'=>$child_category,'user'=>$user]
    );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }

   
}
