<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListingCityController extends Controller
{
    public function Index(Request $request)
    {
      $listing_city=DB::table('vv_cities')->get();
      return view('listing.city.all-listing-city',
      ['listing_city'=>$listing_city]);

    }
    public function Store(Request $request)
    {

        $request->validate([
            'state_id'=>'required',
            'city_name'=>'required|unique:vv_cities,city_name'
            
        ]);

        DB::table('vv_cities')->insert([

                'city_name'=>request()->city_name,
                'state_id'=>request()->state_id,
                'city_lat'=>0,
                'city_lng'=>0,
                'city_cdt'=>now()
               
          
            ]);
            
          return redirect()->route('listing_city_table')->with('message' , 'Store was successful!');
           
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
        $state=DB::table('vv_states')->get();
        $city = DB::table('vv_cities')->where('city_id',$id)->first();
        return view('listing.city.admin-listing-edit-city',
        ['city'=>$city,'state'=>$state]);
     
    }
    public function Update(Request $request,$id)
    {
        $val=unique('vv_cities','city_name',request()->city_name,'city_id',$id);
        if($val!=0){
        $request->validate([ 
            'city_name'=>'required|unique:vv_cities,city_name',
        ]);
      }
        
        try{

            //dd(request()->all());
          DB::table('vv_cities')->where('city_id',$id)->update([
                'city_name'=>request()->city_name,
                'state_id'=>request()->state_id,
                'city_cdt'=>now()
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('listing_city_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_cities')->where('city_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function listing()
    {
        $state=DB::table('vv_states')->get();
        return view('listing.city.admin-listing-add-city',
        ['state'=>$state]
        );
     
    }
}
