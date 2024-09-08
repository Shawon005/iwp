<?php

namespace App\Http\Controllers;
 use App\Models\vv_place_category;
 use App\Models\vv_place;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlaceController extends Controller
{
    public function Index(Request $request)
    {
      $place=vv_place::all();
      $category=DB::table('vv_place_categories')->get();
      return view('place.all-place',
      ['place'=>$place,'category'=>$category]);

    }
    public function Store(Request $request)
    {
//dd(request()->all());
        $request->validate([ 
          'place_name'=>'required|unique:vv_places,place_name',
          'place_info_question'=>'required',
          'place_info_answer'=>'required',
          
        ]);
     
        //dd(request()->all());
        $place_info_question=request()->place_info_question;
        $place_info_question=implode(',',$place_info_question);

        $place_info_answer=request()->place_info_answer;
        $place_info_answer=implode(',',$place_info_answer);

        $place_discover=(request()->place_discover==null)?'':implode(',',request()->place_discover);
        
        $place_releted=(request()->place_releted==null)?'':implode(',',request()->place_releted);

        $place_listing=(request()->place_listing==null)?'':implode(',',request()->place_listing);
        

        $place_events=(request()->place_events==null)?'':implode(',',request()->place_events);
       

        $place_experts=(request()->place_experts==null)?'':implode(',',request()->place_experts);

        $place_news=(request()->place_news==null)?'':implode(',',request()->place_news);
        //$F_file=Null;
        $files=request()->place_gallery_image;
        //dd($files);
        if($files==NULL)
       {
      
         $F_file="Null";
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
        //dd($place_listing);
        try{
            //dd(request()->all());
           $id= DB::table('vv_places')->insertGetId([
            // dd(request()->all()),
                'user_id' => request()->user_id ? request()->user_id : NULL,
                'category_id'=>request()->category_id,
                'place_gallery_image'=>$F_file,
                'place_gallery_video' => request()->place_gallery_video,
                'place_name'=>request()->place_name,
                'place_tags'=>request()->place_tags,
                'place_fee'=>request()->place_fee,
                'place_discover'=>$place_discover,
                'place_related'=>$place_releted,
                'place_listings'=>$place_listing,
                'place_events'=>$place_events,
                'place_experts'=>$place_experts,
                'places_news'=>$place_news,
                'opening_time'=>request()->opening_time,
                'closing_time'=>request()->closeing_time,
                'google_map'=>request()->google_map,
                'place_info_question'=>$place_info_question,
                'place_info_answer'=>$place_info_answer,
                'seo_title'=>request()->seo_title,
                'seo_description'=>request()->seo_descriptions,
                'seo_keywords'=>request()->seo_keywords,
                'place_date'=>request()->place_date,
                'place_status'=>request()->place_status,
                'place_slug'=>Str::of(request()->place_name)->slug('-'),
                'place_cdt'=>now(),
                'place_banner_image'=>'',

            ]);
            code('vv_places','place_code','place_id',$id,'PLACE');
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
              if (request()->user_id) {
                return redirect()->route('users.places.index')->with('message' , 'Store was successful!');
              } else {
                return redirect()->route('place_table')->with('message' , 'Store was successful!');
              }
          //  return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Edit( $id)
    {
        //dd($id);
        $place= DB::table('vv_places')->where('place_id',$id)->first();
        $discover=explode(',', $place->place_discover);
        $related=explode(',', $place->place_related);
        $listingP=explode(',', $place->place_listings);
        $eventP=explode(',', $place->place_events);
        $expertP=explode(',', $place->place_experts);
        $newsP=explode(',', $place->places_news);
        $qu=explode(',', $place->place_info_question);
        $ans=explode(',', $place->place_info_answer);
        $places=DB::table('vv_places')->get();
        $category=DB::table('vv_place_categories')->get();
        $listing=DB::table('vv_listings')->get();
        $expert=DB::table('vv_experts')->get();
        $news=DB::table('vv_news')->get();
        $event=DB::table('vv_events')->get();

        return view('place.admin-edit-place',
        ['place'=>$place,'discover'=>$discover,'related'=>$related,'listingP'=>$listingP,
        'eventP'=>$eventP,'expertP'=>$expertP,'newsP'=>$newsP,'category'=>$category,
        'qu'=>$qu,'ans'=>$ans,'listing'=>$listing,'expert'=>$expert,'news'=>$news,'event'=>$event,'places'=>$places
    ]);
     
    }
    public function Update(Request $request,$id)
    {
     //dd(request()->all());
     $val=unique('vv_places','place_name',request()->place_name,'place_id',$id);
     if($val!=0){
     $request->validate([ 
         'place_name'=>'required|unique:vv_places,place_name',
          'place_info_question'=>'required',
          'place_info_answer'=>'required',
        ]);
   }
   else{
    $request->validate([ 
      'place_name'=>'required',
       'place_info_question'=>'required',
       'place_info_answer'=>'required',
     ]);
   }
        //dd(request()->all());

        //$F_file=Null;
        $place_info_question=request()->place_info_question;
        $place_info_question=implode(',',$place_info_question);

        $place_info_answer=request()->place_info_answer;
        $place_info_answer=implode(',',$place_info_answer);

        $place_discover=(request()->place_discover==null)?'':implode(',',request()->place_discover);
        
        $place_releted=(request()->place_releted==null)?'':implode(',',request()->place_releted);

        $place_listing=(request()->place_listing==null)?'':implode(',',request()->place_listing);
        

        $place_events=(request()->place_events==null)?'':implode(',',request()->place_events);
       

        $place_experts=(request()->place_experts==null)?'':implode(',',request()->place_experts);

        $place_news=(request()->place_news==null)?'':implode(',',request()->place_news);
        //$F_file=Null;
        $files=request()->place_gallery_image;
        //dd($files);
        
        $place_gallery_video = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>", request()->place_gallery_video);

        if($files==NULL)
       {
        $pic=DB::table('vv_places')->where('place_id',$id)->first();
         $F_file=$pic->place_gallery_image;
       }
       else{
           
           foreach($files as $file){
               
               $file_all[]= $this->uploadImage($file);
               
              }
              //dd($file_all);
              $F_file=implode(',',$file_all);  
       }
       // dd($id);
        try{
            //dd(request()->all());
            DB::table('vv_places')->where('place_id',$id)->update([
              'category_id'=>request()->category_id,
              'place_gallery_image'=>$F_file,
              'place_gallery_video'=>$place_gallery_video,
              'place_name'=>request()->place_name,
              'place_tags'=>request()->place_tags,
              'place_fee'=>request()->place_fee,
              'place_discover'=>$place_discover,
              'place_related'=>$place_releted,
              'place_listings'=>$place_listing,
              'place_events'=>$place_events,
              'place_experts'=>$place_experts,
              'places_news'=>$place_news,
              'opening_time'=>request()->opening_time,
              'closing_time'=>request()->closeing_time,
              'google_map'=>request()->google_map,
              'place_info_question'=>$place_info_question,
              'place_info_answer'=>$place_info_answer,
              'seo_title'=>request()->seo_title,
              'seo_description'=>request()->seo_descriptions,
              'seo_keywords'=>request()->seo_keywords,
                'place_date'=>request()->place_date,
              'place_status'=>request()->place_status,
              'place_cdt'=>now(),
     
       
        ]);
          


            
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('place_table')->with('message' , 'Update was successful!');
            //return redirect()->back();
 
        }
         catch (\Throwable $th) {
            dd("data not");
            //return redirect()->back()->withInput()->withErrors($e->getMessage());
            //dd($e->getMessage());
        }    

    }
    public function Delete($id)
    {
        DB::table('vv_places')->where('place_id',$id)->delete();
      return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Place()
    {
      $places=DB::table('vv_places')->get();
      $category=DB::table('vv_place_categories')->get();
        $listing=DB::table('vv_listings')->get();
        $expert=DB::table('vv_experts')->get();
        $news=DB::table('vv_news')->get();
        $event=DB::table('vv_events')->get();
        return view('place.admin-add-new-place',
        ['category'=>$category,'listing'=>$listing,'expert'=>$expert,'news'=>$news,'event'=>$event,
      'places'=>$places]);
     
    }
    public  function uploadImage($file)
    {
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
    }
    public function Request(Request $request)
    {
      $place=DB::table('vv_place_request')->get();
      return view('place.place-request',
      ['place'=>$place]);

    }
    public function Delete_Request($id)
    {
        DB::table('vv_place_request')->where('place_request_id',$id)->delete();
      return redirect()->back();
    }
}
