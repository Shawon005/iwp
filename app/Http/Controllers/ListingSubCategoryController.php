<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ListingSubCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $sub_category=DB::table('vv_sub_categories')->get();
      return view('listing.sub.all-listing-sub-category',
      ['sub_category'=>$sub_category]);

    }
    public function Store(Request $request)
    {

      $request->validate([ 
        'sub_category_name'=>'required|unique:vv_sub_categories,sub_category_name',
    ]);
     
    //    dd($F_file);
      
        //  dd(request()->all());
        $id=DB::table('vv_sub_categories')->insertGetId([
                'category_id'=>request()->category_id,
                'sub_category_name'=>request()->sub_category_name,
                'sub_category_slug'=>Str::of(request()->sub_category_name)->slug('-'),
                'sub_category_status'=>'Active',
                'sub_category_image'=>'',
                'sub_category_code'=>'',
                'sub_category_cdt'=>now()
            ]);
            code('vv_sub_categories','Sub_category_code','sub_category_id',$id,'SUB_CAT');
          return redirect()->route('listing_sub_category_table')->with('message' , 'Store was successful!');
           
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
        $sub_category = DB::table('vv_sub_categories')->where('sub_category_id',$id)->first();
        $category=DB::table('vv_categories')->get();
        return view('listing.sub.admin-listing-edit-sub-category',
        ['sub_category'=>$sub_category,'category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_sub_categories','sub_category_name',request()->sub_category_name,'sub_category_id',$id);
      if($val!=0){
      $request->validate([ 
          'sub_category_name'=>'required|unique:vv_sub_categories,sub_category_name',
      ]);
    }
        
        try{

            //dd(request()->all());
          DB::table('vv_sub_categories')->where('sub_category_id',$id)->update([
                'category_id'=>request()->category_id,
                'sub_category_name'=>request()->sub_category_name,
                'sub_category_slug'=>Str::of(request()->sub_category_name)->slug('-')
        ]);
       

            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('listing_sub_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_sub_categories')->where('sub_category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function listing()
    {
        $category=DB::table('vv_categories')->get();
        return view('listing.sub.admin-listing-add-new-sub-category',
     ['category'=>$category]
    );
     
    }

}
