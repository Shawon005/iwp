<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListingFilterController extends Controller
{
    public function Index(Request $request)
    {
      $listings=DB::table('vv_all_featured_filters')->get();
      return view('listing.filter.all-feature-filter',compact('listings'));
    }
    public function Store(Request $request)
    {
       for($id=1;$id<=7;$id++)
       {
        DB::table('vv_all_featured_filters')->where('all_featured_filter_id',$id)->update([
          'all_featured_filter_status'=>request()->$id,
        ]);
       }
      return redirect()->back()->with('message' , 'Store was successful!');
    }
    public function F_Index(Request $request)
    {
     $listing=DB::table('vv_all_listing_filters')->where('all_listing_filter_id',1)->first();
      return view('listing.filter.all-filter',
      ['listing'=>$listing]
    );
    }
    public function F_Store(Request $request)
    {
        DB::table('vv_all_listing_filters')->where('all_listing_filter_id',1)->update([
        'service_filter'=>request()->row1,
        'category_filter'=>request()->row2,
        'feature_filter'=>request()->row3,
        'rating_filter'=>request()->row4
        ]);
      return redirect()->back()->with('message' , 'Store was successful!');
    }
    public function C_Index(Request $request)
    {
      $category=DB::table('vv_categories')->orderby('category_filter_pos_id','asc')->get();
      return view('listing.filter.all-category-filter',
      ['category'=>$category]
    );
    }
    public function C_Store(Request $request)
    {
        $category=DB::table('vv_categories')->get();
       //dd($request->all());
       foreach($category as $cat)
       {
        $id=$cat->category_id;
        $name=$cat->category_code;
        DB::table('vv_categories')->where('category_id',$id)->update([
            'category_filter_pos_id'=>(request()->$name==null)?0:request()->$name,
            'category_status'=>request()->$id ,
        ]);
       }
      return redirect()->back()->with('message' , 'Store was successful!');
    }
}
