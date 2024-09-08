<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderImageController extends Controller
{
    public function Index(Request $request)
    {
      $slider=DB::table('vv_slider')->get();
      return view('slider-image.all-slider-image',
      ['slider'=>$slider]);

    }
    public function Store(Request $request)
    {

       DB::table('vv_slider')->insert([
            'slider_photo'=>$this->uploadImage(request()->slider_photo),
            'slider_link'=>request()->slider_link,
            'slider_cdt'=>now()
            ]);
          return redirect()->route('slider_table')->with('message' , 'Store was successful!');

    }
    public function Edit( $id)
    {
        $slider = DB::table('vv_slider')->where('slider_id',$id)->first();
        return view('slider-image.edit-slider-image',
        ['slider'=>$slider]);
     
    }
    public function Update(Request $request,$id)
    {
        $file = DB::table('vv_slider')->where('slider_id',$id)->first();
        if(request()->slider_photo==Null){
            $file =$file->slider_photo;
           }
           else{
             $file=$this->uploadImage(request()->slider_photo);
           }
           
          DB::table('vv_slider')->where('slider_id',$id)->update([
            'slider_photo'=>$file,
            'slider_link'=>request()->slider_link,
                
        ]);
       
            return redirect()->route('slider_table')->with('message' , 'Update was successful!');
    }

    public function Delete($id)
    {
      DB::table('vv_slider')->where('slider_id',$id)->delete();
      return redirect()->back();
    }

    public function Slider()
    {
        return view('slider-image.create-slider-image',
        );
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
           $file->move('storage/file/',$filename);
          return $filename;
    }
}
