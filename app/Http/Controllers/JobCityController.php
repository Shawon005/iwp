<?php

namespace App\Http\Controllers;
use App\Models\vv_job_city;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobCityController extends Controller
{
    public function Index(Request $request)
    {
      $city=vv_job_city::all();
      return view('job.city.all-job-city',
      ['city'=>$city]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            
            'city_name'=>'required|unique:vv_job_cities,city_name',
            'state_id'=>'required'
        ]);

          DB::table('vv_job_cities')->insert([

                'city_name'=>request()->city_name,
                'state_id'=>request()->state_id,
                'city_cdt'=>now()
          
            ]);
            
          return redirect()->route('job_city_table')->with('message' , 'Store was successful!');
           
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
        $city = DB::table('vv_job_cities')->where('city_id',$id)->first();
        $state=DB::table('vv_job_states')->get();
        return view('job.city.admin-edit-job-city',
        ['city'=>$city,'state'=>$state]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_job_cities','city_name',request()->city_name,'city_id',$id);
      if($val!=0){
      $request->validate([ 
          'city_name'=>'required|unique:vv_job_cities,city_name',
      ]);
    }
        try{

            //dd(request()->all());
          DB::table('vv_job_cities')->where('city_id',$id)->update([
                'city_name'=>request()->city_name,
                'state_id'=>request()->state_id,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('job_city_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_job_cities')->where('city_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Job()
    {
        $state=DB::table('vv_job_states')->get();
        return view('job.city.admin-add-new-job-city',
        ['state'=>$state]);
     
    }
}
