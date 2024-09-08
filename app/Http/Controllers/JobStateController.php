<?php

namespace App\Http\Controllers;
use App\Models\vv_job_state;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobStateController extends Controller
{
    public function Index(Request $request)
    {
      $state=vv_job_state::all();
      return view('job.state.all-job-state',
      ['state'=>$state]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            
            'state_name'=>'required|unique:vv_job_states,state_name',
            'country_id'=>'required'
        ]);

           DB::table('vv_job_states')->insert([
                'state_name'=>request()->state_name,
                'country_id'=>request()->country_id,
                 'state_cdt'=>now()
            ]);
            
          return redirect()->route('job_state_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $state = state::find($state_id);
        $state = DB::table('vv_job_states')->where('state_id',$id)->first();
        $country=DB::table('vv_job_country')->get();
        return view('job.state.admin-edit-job-state',
        ['state'=>$state,'country'=>$country]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_job_states','state_name',request()->state_name,'state_id',$id);
      if($val!=0){
      $request->validate([ 
          'state_name'=>'required|unique:vv_job_states,state_name',
      ]);
    }
        
        try{

            //dd(request()->all());
          DB::table('vv_job_states')->where('state_id',$id)->update([
                'state_name'=>request()->state_name,
                'country_id'=>request()->country_id,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('job_state_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_job_states')->where('state_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Job()
    {
        $country=DB::table('vv_job_country')->get();
        return view('job.state.admin-add-new-job-state',
        ['country'=>$country]);
     
    }
}
