<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExpertCityController extends Controller
{
    public function Index(Request $request)
    {
      $city=DB::table('vv_expert_cities')->get();
      return view('expert.city.all-expert-city',
      ['city'=>$city]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            'state_id'=>'required',
            'city_name'=>'required|unique:vv_expert_cities,country_name'
            
        ]);

        DB::table('vv_expert_cities')->insert([

                'country_name'=>request()->city_name,
                'state_id'=>request()->state_id,
                'country_cdt'=>now()
               
          
            ]);
            
          return redirect()->route('expert_city_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $city = city::find($city_id);
        $state=DB::table('vv_expert_states')->get();
        $city = DB::table('vv_expert_cities')->where('country_id',$id)->first();
        return view('expert.city.admin-expert-edit-city',
        ['city'=>$city,'state'=>$state]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_expert_cities','country_name',request()->city_name,'country_id',$id);
        if($val!=0){
        $request->validate([ 
            'city_name'=>'required|unique:vv_expert_cities,country_name',
        ]);
      }
        
        try{

            //dd(request()->all());
          DB::table('vv_expert_cities')->where('country_id',$id)->update([
                'country_name'=>request()->city_name,
                'state_id'=>request()->state_id,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('expert_city_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_expert_cities')->where('country_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function expert()
    {
        $state=DB::table('vv_expert_states')->get();
        return view('expert.city.admin-expert-add-new-city',
        ['state'=>$state]
        );
     
    }
}
