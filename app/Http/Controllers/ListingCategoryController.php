<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ListingCategoryController extends Controller
{
    public function Index(Request $request)
    {
      $listing_category=DB::table('vv_categories')->get();
      return view('listing.category.all-listing-category',
      ['listing_category'=>$listing_category]);

    }
    public function Show(Request $request,$id)
    {
      $sub_category=DB::table('vv_sub_categories')->where('category_id',$id)->get();
      return view('listing.sub.all-listing-sub-category',
      ['sub_category'=>$sub_category]);

    }
    public function Store(Request $request)
    {

        // $request->validate([
            
        //     'category_name'=>'required',
        //     'category_image'=>'required'
            
        // ]);
      
        //dd(request()->all());

       $id=DB::table('vv_categories')->insertGetId([

                'category_name'=>request()->category_name,
                'category_image'=>$this->uploadImage(request()->category_image),
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
                'category_status'=>'Active',
                'category_code'=>'',
                'category_filter'=>'0',
                'category_filter_pos_id'=>'1',
                'category_description'=>'',
                'category_seo_title'=>request()->category_name,
                'category_seo_description'=>'',
                'category_seo_keywords'=>'',
                'category_faq_1_ques'=>'',
                'category_faq_1_ans'=>'',
                'category_faq_2_ques'=>'',
                'category_faq_2_ans'=>'',
                'category_faq_3_ques'	=>'',
                'category_faq_3_ans'	=>'',
                'category_faq_4_ques'	=>'',
                'category_faq_4_ans'	=>'',
                'category_faq_5_ques'	=>'',
                'category_faq_5_ans'	=>'',
                'category_faq_6_ques'	=>'',
                'category_faq_6_ans'	=>'',
                'category_faq_7_ques'	=>'',
                'category_faq_7_ans'	=>'',
                'category_faq_8_ques'	=>'',
                'category_faq_8_ans'	=>'',
                'category_google_schema'	=>'',
                'category_status'	=>'Active',
                'category_views'	=>0,
                'category_edit_cdt'	=>now(),
                'category_cdt'=>now()
               
          
            ]);
            code('vv_categories','category_code','category_id',$id,'CAT');
          return redirect()->route('listing_category_table')->with('message' , 'Store was successful!');
           
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
        $category = DB::table('vv_categories')->where('category_id',$id)->first();
        return view('listing.category.admin-listing-edit-category',
        ['category'=>$category]);
     
    }
    public function Update(Request $request,$id)
    {
        $request->validate([
            
            'category_name'=>'required',
           
        ]);
        $files=request()->category_image;
        //dd($files);
        if($files==NULL)
       {
        $pro=DB::table('vv_categories')->where('category_id',$id)->first();
         $F_file=$pro->category_image;
       }
       else{
           
          
               
           $F_file= $this->uploadImage($files);
               
             
           
       }
        try{

            //dd(request()->all());
          DB::table('vv_categories')->where('category_id',$id)->update([
                'category_name'=>request()->category_name,
                'category_image'=>$F_file,
                'category_slug'=>Str::of(request()->category_name)->slug('-'),
                'category_edit_cdt'=>now()
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('listing_category_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_categories')->where('category_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function listing()
    {
  
        return view('listing.category.admin-listing-add-new-category',
        );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function Position(Request $request)
    {
        $category=DB::table('vv_categories')->orderBy('category_filter_pos_id','asc')->get();
        return view('listing.category.category-position',
        ['category'=>$category]);
    }
    public function Position_Store(Request $request,$sort)
    {
        $no=0;
        preg_match_all('!\d+!', $sort, $arr);
        $poi=count($arr);
        
        foreach($arr[0] as $id){
        
        DB::table('vv_categories')->where('category_id',$id)->update([
          'category_filter_pos_id'=>$no++,
        ]);
      }
      
      return response()->json(['position']);
    }
}
