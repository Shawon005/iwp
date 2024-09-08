<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\vv_event_categories;
class vv_event_catagoriesController extends Controller
{
    public function event_cetagories_table(Request $request)
    {
        $category = vv_event_categories::get();
        //dd($states);
        return view('event.category.all-event-category',
        ['category'=>$category,]);
    }
    public function store_cetagories_event(Request $request)
    {

        $request->validate([
            
            'category_name'=>'required|unique:vv_event_categories,category_name',
           
        ]);
        
            DB::table('vv_event_categories')->insert([
             //dd(request()->all()),
             'category_name'=>request()->category_name,
             'category_image'=>'',
             'category_slug'=>Str::of(request()->category_name)->slug('-'),
             'category_status'=>'Active',
             'category_code'=>'',
             'category_filter'=>'0',
             'category_filter_pos_id'=>'1',
             'category_cdt'=>now()
            ]);
          // $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
            return redirect()->route('event_cetagories_table');
 
        }
        
           
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
    //        dd($e->getMessage());
         
    
    
    public function event_cetagories_edit( $id)
    {
        //dd($id);
        $category = DB::table('vv_event_categories')->WHERE('category_id',$id)->first();
        
        return view('event.category.admin-edit-event-category',
        ['category'=>$category]);
     
    }
    public function event_cetagories_update(Request $request, $id)
    {
        $val=unique('vv_event_categories','category_name',request()->category_name,'category_id',$id);
        if($val!=0){
        $request->validate([ 
            'category_name'=>'required|unique:vv_event_categories,category_name',
        ]);
      
    }
            
        try{
            
         DB::table('vv_event_categories')->where('category_id',$id)->update([
              //dd(request()->all()),             
            'category_name'=>request()->category_name,
            'category_cdt'=>now(),
            'category_status'=>'Active',
            'category_slug'=>Str::of(request()->category_name)->slug('-'),
           
            ]);
            
            return redirect()->route('event_cetagories_table')->with('message' , 'Update was successful!');
    //            $request->session()->flash('message' , 'Task was successful!');
           //return redirect(route('user_panel.input')) ->with('message' , 'Update was successful!');

    }
    catch (QueryException $e){
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
    //            dd($e->getMessage());
    dd("data not update");
        }

    }
    public function cetagories_delete( $category_id)
    {
        DB::table('vv_event_categories')->where('category_id', $category_id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
     
    }
    public function event_cetagory()
    {
        return view('event.category.admin-add-new-event-category');
     
    }

}
