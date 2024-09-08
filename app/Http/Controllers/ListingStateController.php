<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ListingStateController extends Controller
{
    public function Index(Request $request)
    {
      $listing_state=DB::table('vv_states')->get();
      return view('listing.state.all-listing-state',
      ['listing_state'=>$listing_state]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            'country_id'=>'required',
            'state_name'=>'required|unique:vv_states,state_name'
            
        ]);

        DB::table('vv_states')->insert([

                'state_name'=>request()->state_name,
                'country_id'=>request()->country_id
               
          
            ]);
            
          return redirect()->route('listing_state_table')->with('message' , 'Store was successful!');
           
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
        $country=DB::table('vv_countries')->get();
        $state = DB::table('vv_states')->where('state_id',$id)->first();
        return view('listing.state.admin-listing-edit-state',
        ['state'=>$state,'country'=>$country]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_states','state_name',request()->state_name,'state_id',$id);
      if($val!=0){
      $request->validate([ 
          'state_name'=>'required|unique:vv_states,state_name',
      ]);
    }
        
        try{

            //dd(request()->all());
          DB::table('vv_states')->where('state_id',$id)->update([
                'state_name'=>request()->state_name,
                'country_id'=>request()->country_id,
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('listing_state_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_states')->where('state_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function listing()
    {
        $country=DB::table('vv_countries')->get();
        return view('listing.state.admin-listing-add-state',
        ['country'=>$country]
        );
     
    }
}
