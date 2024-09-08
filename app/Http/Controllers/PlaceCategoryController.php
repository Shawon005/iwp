<?php

namespace App\Http\Controllers;
use App\Models\vv_place_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PlaceCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $category=vv_place_category::all();
      return view('place.category.all-place-category',
      ['category'=>$category]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            
            'category_name'=>'required|unique:vv_place_categories,category_name'
            
        ]);

            DB::table('vv_place_categories')->insert([

                'category_name'=>request()->category_name,
                'category_image'=>'',
                'category_seo_keywords'=>'',
                'category_filter_pos_id'=>1,
                'category_status'=>'Active',
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
                'category_cdt'=>now(),
                'category_seo_title'=>request()->category_name,
                'category_seo_description'=>request()->category_name,
               
          
            ]);
            
          return redirect()->route('place_category_table')->with('message' , 'Store was successful!');
           
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
        $category = DB::table('vv_place_categories')->where('category_id',$id)->first();
        return view('place.category.admin-place-edit-category',
        ['category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_place_categories','category_name',request()->category_name,'category_id',$id);
        if($val!=0){
        $request->validate([ 
            'category_name'=>'required|unique:vv_place_categories,category_name',
        ]);
      }
        
        try{

            //dd(request()->all());
          DB::table('vv_place_categories')->where('category_id',$id)->update([
                'category_name'=>request()->category_name,              
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
                'category_cdt'=>now(),
                'category_seo_title'=>request()->category_name,
                'category_seo_description'=>request()->category_name,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('place_category_table')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Throwable $th) {
            //dd("data not");
            return redirect()->back()->withInput()->withErrors(getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Delete($id)
    {
      DB::table('vv_place_categories')->where('category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Place()
    {
  
        return view('place.category.admin-place-all-category',
        );
     
    }
    public function Position(Request $request)
    {
        $category=DB::table('vv_place_categories')->orderBy('category_filter_pos_id','asc')->get();
        return view('place.category.category-position',
        ['category'=>$category]);
    }
    public function Position_Store(Request $request,$sort)
    {
        $no=0;
        preg_match_all('!\d+!', $sort, $arr);

        
        foreach($arr[0] as $id){
        
        DB::table('vv_place_categories')->where('category_id',$id)->update([
          'category_filter_pos_id'=>$no++,
        ]);
      }
      
      return response()->json(['position']);
    }
}
