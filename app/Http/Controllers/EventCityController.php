<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\vv_event_states;
use App\Models\vv_event_cities;
use App\Models\vv_event_country;

class EventCityController extends Controller
{
    public function Index(Request $request)
    {
        $city = vv_event_cities::get();
        //dd($states);
        return view('event.city.all-event-city',
        ['city'=>$city,]);
    }

    public function Store(Request $request)
    {

        $request->validate([
            
            //'state_id'=>'required',
            'city_name'=>'required|unique:vv_event_cities,city_name',
        ]);
        //dd(request()->all());
        try{
        DB::table('vv_event_cities')->insert([
            // dd(request()->all()),
                'city_name'=>request()->city_name,
                'state_id'=>request()->state_id,
                'city_cdt'=>now()
               
                
            ]);
          // $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
            return redirect()->route('event_city_table')->with('message' , 'Store was successful!');
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
    //        dd($e->getMessage());
        }    

    }


    public function Edit( $id)
    {
        //dd($id);
        $state = vv_event_states::all();
        $city=DB::table('vv_event_cities')->where('city_id',$id)->first();
        
        return view('event.city.admin-edit-event-city',
        ['state'=>$state,'city'=>$city]);
     
    }
    public function Update(Request $request, $id)
    {

       
      

        $city=unique('vv_event_cities','city_name',request()->city_name,'city_id',$id);
        if($city==0){
           
        }
        else{
            $request->validate([     
                'state_id'=>'required',
                'city_name'=>'required|unique:vv_event_cities,city_name',
            ]);
        }
        try{
            
         DB::table('vv_event_cities')->where('city_id',$id)->update([
            //  dd(request()->all()),        
          
            'state_id'=>request()->state_id,
            'city_name'=>request()->city_name,
            'city_cdt'=>now()
            ]);
            return redirect()->route('event_city_table')->with('message' , 'Update was successful!');;

    //            $request->session()->flash('message' , 'Task was successful!');
           //return redirect(route('user_panel.input')) ->with('message' , 'Update was successful!');

    }
    catch (QueryException $e){
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
    //            dd($e->getMessage());
    dd("data not update");
        }

    }


    public function Delete( $city_id)
    {
        DB::table('vv_event_cities')->where('city_id', $city_id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
     
    }
    public function event_city(Request $request)
    {
        $states = vv_event_states::all();
        return view('event.city.admin-add-new-event-city',
        ['states'=>$states,]);
    }
}
