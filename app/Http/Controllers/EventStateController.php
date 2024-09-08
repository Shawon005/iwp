<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventStateController extends Controller
{
    public function Index(Request $request)
    {
        $states = DB::table('vv_event_states')->get();
        //dd($states);
        return view('event.state.all-event-state',
        ['states'=>$states,]);
    }
  
    public function Store(Request $request)
    {
    
        $request->validate([
            
            'country_id'=>'required',
            'state_name'=>'required|unique:vv_event_states,state_name',
        ]);
    
        try{
        DB::table('vv_event_states')->insert([
             //dd(request()->all()),

                'country_id'=>request()->country_id,
                'state_name'=>request()->state_name,
                'state_cdt'=>now()
                
            ]);
          // $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
            return redirect()->route('event_state_table')->with('message' , 'Store was successful!');
 
        }
         catch (\Throwable $th) {
            //dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
    //        dd($e->getMessage());
        }    

    }
   
    public function Edit( $id)
    {
        //dd($id);
        $country = DB::table('vv_event_countries')->get();
        $state=DB::table('vv_event_states')->where('state_id',$id)->get();
        
        return view('event.state.admin-edit-event-state',
        ['country'=>$country,'state'=>$state]);
     
    }
    public function Update(Request $request, $id)
    {
     
        $val=unique('vv_event_states','state_name',request()->state_name,'state_id',$id);
        if($val!=0){
         $request->validate([
             
             'country_id'=>'required',
             'state_name'=>'required|unique:vv_event_states,state_name',
         ]);
     }
      

            
        try{
            
         DB::table('vv_event_states')->where('state_id',$id)->update([
            //   dd(request()->all()),             
            'country_id'=>request()->country_id,
            'state_name'=>request()->state_name,
            'state_cdt'=>now()
               

            ]);
            return redirect()->route('event_state_table')->with('message' , 'Update was successful!');
    //            $request->session()->flash('message' , 'Task was successful!');
           //return redirect(route('user_panel.input')) ->with('message' , 'Update was successful!');

    }
    catch (QueryException $e){
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
    //            dd($e->getMessage());
    dd("data not update");
        }

    }
   
   
    public function Delete( $state_id)
    {
        DB::table('vv_event_states')->where('state_id', $state_id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
     
    }
    public function event_state(Request $request)
    {
        $country = DB::table('vv_event_countries')->get();
        return view('event.state.admin-add-new-event-state',
        ['country'=>$country,]);
    }

}
