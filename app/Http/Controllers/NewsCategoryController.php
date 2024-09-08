<?php

namespace App\Http\Controllers;
use App\Models\vv_news_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $category=vv_news_category::all();
      return view('news.category.all-news-category',
      ['category'=>$category]);

    }
    public function Store(Request $request)
    {

      $request->validate([
            
         'category_name'=>'required|unique:vv_news_categories,category_name',
       
    ]);

       $id=DB::table('vv_news_categories')->insertGetId([
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
            
            code('vv_news_categories','category_code','category_id',$id,'CAT');
          return redirect()->route('news_category_table')->with('message' , 'Store was successful!');
           
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
        $category = DB::table('vv_news_categories')->where('category_id',$id)->first();
        return view('news.category.admin-news-edit-category',
        ['category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_news_categories','category_name',request()->category_name,'category_id',$id);
      if($val!=0){
      $request->validate([ 
          'category_name'=>'required',
      ]);
    }
        
        try{

            //dd(request()->all());
          DB::table('vv_news_categories')->where('category_id',$id)->update([
            'category_name'=>request()->category_name,
            'category_slug'=>Str::of(request()->category_name)->slug('-'),
            'category_cdt'=>now(),
            'category_seo_title'=>request()->category_name,
            'category_seo_description'=>request()->category_name,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('news_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_news_categories')->where('category_id',$id)->delete();
      return redirect()->route('news_category_table')->with('message' , 'Delete was successful!');
    }

    public function News()
    {
        return view('news.category.admin-news-add-new-category');
     
    }
    public function Position(Request $request)
    {
        $category=DB::table('vv_news_categories')->orderBy('category_filter_pos_id','asc')->get();
        return view('news.category.category-position',
        ['category'=>$category]);
    }
    public function Position_Store(Request $request,$sort)
    {
        $no=0;
        preg_match_all('!\d+!', $sort, $arr);

        
        foreach($arr[0] as $id){
        
        DB::table('vv_news_categories')->where('category_id',$id)->update([
          'category_filter_pos_id'=>$no++,
        ]);
      }
      
      return response()->json(['position']);
    }
   
}
