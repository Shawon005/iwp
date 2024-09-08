<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ListingCountryController extends Controller
{
    public function Index(Request $request)
    {
      $listing_country=DB::table('vv_countries')->get();
      return view('listing.country.all-listing-country',
      ['listing_country'=>$listing_country]);

    }
    public function Store(Request $request)
    {

      $request->validate([ 
        'country_name'=>'required|unique:vv_countries,country_name',
    ]);
      
        //dd(request()->all());

       DB::table('vv_countries')->insert([

                'country_name'=>request()->country_name,
                'country_phonecode'=>0,
                'country_sortname'=>'',
                'country_cdt'=>now()
                
               
          
            ]);
            
          return redirect()->route('listing_country_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
    {
        //dd($id);
     //   $country = country::find($country_id);
        $country = DB::table('vv_countries')->where('country_id',$id)->first();
        return view('listing.country.admin-listing-edit-country',
        ['country'=>$country]);
     
    }
    public function Update(Request $request,$id)
    {
      $val=unique('vv_countries','country_name',request()->country_name,'country_id',$id);
        if($val!=0){
        $request->validate([ 
            'country_name'=>'required|unique:vv_countries,country_name',
        ]);
      }
      
        try{

            //dd(request()->all());
          DB::table('vv_countries')->where('country_id',$id)->update([
                'country_name'=>request()->country_name,
                
       
        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('listing_country_table')->with('message' , 'Update was successful!');
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
      DB::table('vv_countries')->where('country_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function listing()
    {
  
        return view('listing.country.admin-listing-add-country',
        );
     
    }
}
