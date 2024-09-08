<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExpertAreaController extends Controller
{
    public function Index(Request $request)
    {
      $area=DB::table('vv_expert_areas')->get();
      return view('expert.area.all-expert-area',
      ['area'=>$area]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            'city_id'=>'required',
            'area_name'=>'required|unique:vv_job_cities,city_name'
            
        ]);

        DB::table('vv_expert_areas')->insert([

                'city_name'=>request()->area_name,
                'state_id'=>request()->city_id,
                'city_cdt'=>now()
               
          
            ]);
            
          return redirect()->route('expert_area_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $area = area::find($area_id);
        $city=DB::table('vv_expert_cities')->get();
        $area = DB::table('vv_expert_areas')->where('city_id',$id)->first();
        return view('expert.area.admin-expert-edit-area',
        ['area'=>$area,'city'=>$city]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_expert_areas','city_name',request()->area_name,'city_id',$id);
      if($val!=0){
      $request->validate([ 
          'area_name'=>'required|unique:vv_job_cities,city_name',
      ]);
    }
        
        try{

            //dd(request()->all());
          DB::table('vv_expert_areas')->where('city_id',$id)->update([
                'city_name'=>request()->area_name,
                'state_id'=>request()->city_id,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('expert_area_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_expert_areas')->where('city_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function expert()
    {
        $city=DB::table('vv_expert_cities')->get();
        return view('expert.area.admin-expert-add-new-area',
        ['city'=>$city]
        );
     
    }
}
