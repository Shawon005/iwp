<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class UserListingController extends Controller
{
    public function Index(Request $request)
    {
        $id=0;
      $listing=DB::table('vv_listings')->where('listing_is_delete',$id)->where('user_id',session('user_id'))->get();
      return view('ui.old-ui.db-all-listing',
      ['listings'=>$listing]);

    }
    public function Store(Request $request)
    {
        //dd($request->all());

   
        // $files=request()->file('service_image');
        // foreach($files as $file)
        // {
        //     $file1[]=$this->uploadImage($file);
        // }
        // $file1=implode(',',$file1);
        // $files=request()->file('service_1_image');
        // foreach($files as $file)
        // {
        //     $file2[]=$this->uploadImage($file);
        // }
        // $file2=implode(',',$file2);
        // $files=request()->file('gallery_image');
        // foreach($files as $file)
        // {
        //     $file3[]=$this->uploadImage($file);
        // }
        // $file3=implode(',',$file3);
     //dd($request->all());
    //    $state=request()->state_id;
    //    $state=implode(',',$state);
       $step=request()->step;
       if($step==1){
        $request->validate([
            'listing_name'=>'required',
            'listing_mobile' =>'required', 
            'listing_email' =>'required',
            'listing_whatsapp' =>'required',
            'listing_address' =>'required',
            'country_id' =>'required',
            'city_id' =>'required',
            'category_id' =>'required' ,
            'sub_category_id' =>'required', 
            'listing_description' =>'required', 
             ]);
       $city=request()->city_id;
       $city=implode(',',$city);
       $sub=request()->sub_category_id;
       $sub=implode(',',$sub);
       $id=DB::table('vv_listings')->insertGetId([
        'user_id'=>request()->user_id,
        'listing_name' =>request()->listing_name,
        'listing_mobile' =>request()->listing_mobile, 
        'listing_email' =>request()->listing_email,
        'listing_whatsapp' =>request()->listing_whatsapp,
        'listing_website' =>(request()->listing_website==null)?'':request()->listing_website,
        'listing_address' =>request()->listing_address,
        'listing_lat' =>(request()->listing_lat==null)?'':request()->listing_lat,
        'listing_lng' =>(request()->listing_lng==null)?'':request()->listing_lng ,
        'country_id' =>request()->country_id,
        'state_id' =>(request()->state_id==null)?0:request()->state_id,
        'city_id' =>implode(',',request()->city_id),
        'category_id' =>request()->category_id ,
        'sub_category_id' =>implode(',',request()->sub_category_id), 
        'profile_image'=>$this->uploadImage(request()->profile_image),
        'cover_image' =>$this->uploadImage(request()->cover_image),

        'listing_description' =>request()->listing_description, 
        'service_locations' =>request()->service_locations,

        'service_id' =>'',
        'service_1_name' =>'',
        'service_1_price' =>'', 
        'service_1_detail' =>'',
        'service_1_view_more' =>'', 
        'listing_info_question' =>'', 
        'listing_info_answer' =>'', 

        'listing_video' =>'',
        'google_map' =>'',
        '360_view' =>'',

        'service_image' =>'',
        'service_1_image' =>'', 
        'gallery_image' => '',
 
        'listing_type_id'=>0,
        'opening_days'=>'',
        'opening_time'=>'',
        'closing_time'=>'',
        'fb_link'=>'',
        'twitter_link'=>'',
        'gplus_link'=>'',
        'service_2_name'=>'',
        'service_2_price'=>1,
        'service_2_image'=>'',
        'service_3_name'=>'',
        'service_3_price'=>1,
        'service_3_image'=>'',
        'service_4_name'=>'',
        'service_4_price'=>1,
        'service_4_image'=>'',
        'service_5_name'=>'',
        'service_5_price'=>1,
        'service_5_image'=>'',
        'service_6_name'=>'',
        'service_6_price'=>1,
        'service_6_image'=>'',
        'listing_code'=>'',
  
        'seo_title'=>'',
        'seo_description'=>'',
        'seo_keywords'=>'',
        'listing_status'=>'Active',
        'payment_status'=>'',
         'start_date'=>now(),
         'end_date'=>now(),
         'payment'=>0,
         'listing_slug'=>'',
        //listing_is_delete
         'listing_delete_cdt'=>now(),
         'listing_cdt' =>now()
               
          
            ]);
            code('vv_listings','listing_code','listing_id',$id,'LISTING');
            
          return redirect()->route('user_add_listing_step_2')->with('message' , 'Store was successful!');
        }
        else if($step==2)
        {
            $id=$listing=DB::table('vv_listings')->orderBy('listing_id', 'desc')->first();
            $id=$id->listing_id;
            
            $files=request()->file('service_image');
            foreach($files as $file)
            {
                $file1[]=$this->uploadImage($file);
            }
            $file1=implode(',',$file1);
            DB::table('vv_listings')->where('listing_id',$id)->update([
                'service_id' =>implode(',',request()->service_id),
                'service_image'=>$file1,
            ]);
            return redirect()->route('user_add_listing_step_3')->with('message' , 'Store was successful!');
        }
        else if($step==3)
        {
            //dd($request->all());
            $files=request()->file('service_1_image');
            foreach($files as $file)
            {
                $file2[]=$this->uploadImage($file);
            }
            $file2=implode(',',$file2);
            $id=$listing=DB::table('vv_listings')->orderBy('listing_id', 'desc')->first();
            $id=$id->listing_id;
            DB::table('vv_listings')->where('listing_id',$id)->update([
                'service_1_name' =>implode(',',request()->service_1_name),
                'service_1_price' =>implode(',',request()->service_1_price), 
                'service_1_detail' =>implode(',',request()->service_1_detail),
                'service_1_view_more' =>implode(',',request()->service_1_view_more), 
                'service_1_image'=>$file2,
            ]);
            return redirect()->route('user_add_listing_step_4')->with('message' , 'Store was successful!');
        }
        else if($step==4)
        {
            $files=request()->file('gallery_image');
            foreach($files as $file)
            {
                $file3[]=$this->uploadImage($file);
            }
            $file3=implode(',',$file3);
            $id=$listing=DB::table('vv_listings')->orderBy('listing_id', 'desc')->first();
            $id=$id->listing_id;
            DB::table('vv_listings')->where('listing_id',$id)->update([
                'listing_video' =>(request()->listing_video==null)?'':implode(',',request()->listing_video),
                'google_map' =>(request()->google_map==null)?'':request()->google_map==null,
                '360_view' =>(request()->M360_view==null)?'':request()->M360_view==null, 
                'gallery_image'=>$file3,
            ]);
            return redirect()->route('user_add_listing_step_5')->with('message' , 'Store was successful!');
        }
        else if($step==5)
        {
           
            $id=$listing=DB::table('vv_listings')->orderBy('listing_id', 'desc')->first();
            $id=$id->listing_id;
            DB::table('vv_listings')->where('listing_id',$id)->update([
                'listing_info_question' =>implode(',',request()->listing_info_question), 
                'listing_info_answer' =>implode(',',request()->listing_info_answer), 
            ]);
            return redirect()->route('user_add_listing_step_6')->with('message' , 'Store was successful!');
        }
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id,$step)
    {
        $listing=DB::table('vv_listings')->where('listing_id',$id)->first();
        $service_id =explode(',',$listing->service_id);
        $service_1_name =explode(',',$listing->service_1_name);
        $service_1_price =explode(',',$listing->service_1_price); 
        $service_1_detail =explode(',',$listing->service_1_detail);
        $service_1_view_more =explode(',',$listing->service_1_view_more); 
        $listing_info_question =explode(',',$listing->listing_info_question); 
        $listing_info_ans =explode(',',$listing->listing_info_answer);
        $sub=explode(',',$listing->sub_category_id);
        $cities=explode(',',$listing->city_id);
        $state1=explode(',',$listing->state_id);
        $users=DB::table('vv_users')->get();
        $category=DB::table('vv_categories')->get();
        $sub_categories = DB::table('vv_sub_categories')->get();
        $subs=collect(explode(',',$listing->sub_category_id));
        $state=DB::table('vv_states')->get();
        $city=DB::table('vv_cities')->get();
        $country=DB::table('vv_countries')->get();
        if($step==1){
        return view('ui.old-ui.edit-listing-step-1',
        ['category'=>$category,'sub_categories'=>$sub_categories,'state'=>$state,'city'=>$city,'country'=>$country,'listing'=>$listing,
        'service_id'=>$service_id,'service_1_name'=>$service_1_name,'service_1_price'=>$service_1_price,'service_1_detail'=>$service_1_detail,
        'service_1_view_more'=>$service_1_view_more,'listing_info_ans'=>$listing_info_ans,'sub'=>$sub, 'subs' => $subs,'cities'=>$cities,
        'listing_info_question'=>$listing_info_question,'state1'=>$state1,'users'=>$users]
            );
        }
        else if($step==2)
        {
            return view('ui.old-ui.edit-listing-step-2',
            ['category'=>$category,'sub_categories'=>$sub_categories,'state'=>$state,'city'=>$city,'country'=>$country,'listing'=>$listing,
            'service_id'=>$service_id,'service_1_name'=>$service_1_name,'service_1_price'=>$service_1_price,'service_1_detail'=>$service_1_detail,
            'service_1_view_more'=>$service_1_view_more,'listing_info_ans'=>$listing_info_ans,'sub'=>$sub,'cities'=>$cities,
            'listing_info_question'=>$listing_info_question,'state1'=>$state1,'users'=>$users]
              );
        }
        else if($step==3)
        {
            return view('ui.old-ui.edit-listing-step-3',
            ['category'=>$category,'sub_categories'=>$sub_categories,'state'=>$state,'city'=>$city,'country'=>$country,'listing'=>$listing,
            'service_id'=>$service_id,'service_1_name'=>$service_1_name,'service_1_price'=>$service_1_price,'service_1_detail'=>$service_1_detail,
            'service_1_view_more'=>$service_1_view_more,'listing_info_ans'=>$listing_info_ans,'sub'=>$sub,'cities'=>$cities,
            'listing_info_question'=>$listing_info_question,'state1'=>$state1,'users'=>$users]
              );
        }
        else if($step==4)
        {
            return view('ui.old-ui.edit-listing-step-4',
            ['category'=>$category,'sub_categories'=>$sub_categories,'state'=>$state,'city'=>$city,'country'=>$country,'listing'=>$listing,
            'service_id'=>$service_id,'service_1_name'=>$service_1_name,'service_1_price'=>$service_1_price,'service_1_detail'=>$service_1_detail,
            'service_1_view_more'=>$service_1_view_more,'listing_info_ans'=>$listing_info_ans,'sub'=>$sub,'cities'=>$cities,
            'listing_info_question'=>$listing_info_question,'state1'=>$state1,'users'=>$users]
              );
        }
        else if($step==5)
        {
            return view('ui.old-ui.edit-listing-step-5',
            ['category'=>$category,'sub_categories'=>$sub_categories,'state'=>$state,'city'=>$city,'country'=>$country,'listing'=>$listing,
            'service_id'=>$service_id,'service_1_name'=>$service_1_name,'service_1_price'=>$service_1_price,'service_1_detail'=>$service_1_detail,
            'service_1_view_more'=>$service_1_view_more,'listing_info_ans'=>$listing_info_ans,'sub'=>$sub,'cities'=>$cities,
            'listing_info_question'=>$listing_info_question,'state1'=>$state1,'users'=>$users]
              );
        }
        else if($step==6)
        {
            return view('ui.old-ui.edit-listing-step-6',
            ['category'=>$category,'sub_categories'=>$sub_categories,'state'=>$state,'city'=>$city,'country'=>$country,'listing'=>$listing,
            'service_id'=>$service_id,'service_1_name'=>$service_1_name,'service_1_price'=>$service_1_price,'service_1_detail'=>$service_1_detail,
            'service_1_view_more'=>$service_1_view_more,'listing_info_ans'=>$listing_info_ans,'sub'=>$sub,'cities'=>$cities,
            'listing_info_question'=>$listing_info_question,'state1'=>$state1,'users'=>$users]
              );
        }
     
    }
    public function Update(Request $request,$id)
    {
        // $request->validate([
        //     'listing_name'=>'required',
        //     'listing_mobile' =>'required', 
        //     'listing_email' =>'required',
        //     'listing_whatsapp' =>'required',
        //     'listing_address' =>'required',
        //     'country_id' =>'required',
        //     'city_id' =>'required',
        //     'category_id' =>'required' ,
        //     'sub_category_id' =>'required',  
           
        //      ]);
        $listing=DB::table('vv_listings')->where('listing_id',$id)->first();
        $step=request()->step;
        if($step==1){
        $city=request()->city_id;
        $city=implode(',',$city);
        $sub=request()->sub_category_id;
        $sub=implode(',',$sub);
        DB::table('vv_listings')->where('listing_id',$id)->update([
         'listing_name' =>request()->listing_name,
         'listing_mobile' =>request()->listing_mobile, 
         'listing_email' =>request()->listing_email,
         'listing_whatsapp' =>request()->listing_whatsapp,
         'listing_website' =>(request()->listing_website==null)?'':request()->listing_website,
         'listing_address' =>request()->listing_address,
         'listing_lat' =>(request()->listing_lat==null)?'':request()->listing_lat,
         'listing_lng' =>(request()->listing_lng==null)?'':request()->listing_lng ,
         'country_id' =>request()->country_id,
         'state_id' =>(request()->state_id==null)?0:request()->state_id,
         'city_id' =>implode(',',request()->city_id),
         'category_id' =>request()->category_id ,
         'sub_category_id' =>implode(',',request()->sub_category_id), 
         'profile_image'=>$this->uploadImage(request()->profile_image),
         'cover_image' =>$this->uploadImage(request()->cover_image),
         'listing_description' =>request()->listing_description, 
         'service_locations' =>request()->service_locations,
           
             ]);
           return redirect()->route('edit_listing_step_1',['id'=>$id,'step'=>2])->with('message' , 'Store was successful!');
         }
         else if($step==2)
         {
           // dd($request->all()); 
             $files=request()->file('service_image');

             if($files!=NULL){
             foreach($files as $file)
             {
                 $file1[]=$this->uploadImage($file);
             }
             $file1=implode(',',$file1);
         }
         else{$file1=$listing->service_image;}
             DB::table('vv_listings')->where('listing_id',$id)->update([
                 'service_id' =>implode(',',request()->service_id),
                 'service_image'=>$file1,
             ]);
             return redirect()->route('edit_listing_step_1',['id'=>$id,'step'=>3])->with('message' , 'Store was successful!');
         }
         else if($step==3)
         {
             //dd($request->all());
             $files=request()->file('service_1_image');
             if($files!=NULL){
                 $files=request()->file('service_1_image');
                 foreach($files as $file)
                 {
                     $file2[]=$this->uploadImage($file);
                 }
                 $file2=implode(',',$file2);
             }
             else{$file2=$listing->service_1_image;}
         
             DB::table('vv_listings')->where('listing_id',$id)->update([
                 'service_1_name' =>implode(',',request()->service_1_name),
                 'service_1_price' =>implode(',',request()->service_1_price), 
                 'service_1_detail' =>implode(',',request()->service_1_detail),
                 'service_1_view_more' =>implode(',',request()->service_1_view_more), 
                 'service_1_image'=>$file2,
             ]);
             return redirect()->route('edit_listing_step_1',['id'=>$id,'step'=>4])->with('message' , 'Store was successful!');
         }
         else if($step==4)
         {
            $files=request()->file('gallery_image');
            if($files!=NULL){
                $files=request()->file('gallery_image');
                foreach($files as $file)
                {
                    $file3[]=$this->uploadImage($file);
                }
                $file3=implode(',',$file3);
            }
            else{$file3=$listing->gallery_image;} 
          
             DB::table('vv_listings')->where('listing_id',$id)->update([
                //dd($request->all()),
                 'listing_video' =>(request()->listing_video==null)?'':implode(',',request()->listing_video),
                 'google_map' =>(request()->google_map==null)?'':request()->google_map==null,
                 '360_view' =>(request()->M360_view==null)?'':request()->M360_view==null, 
                 'gallery_image'=>$file3,
             ]);
             return redirect()->route('edit_listing_step_1',['id'=>$id,'step'=>5])->with('message' , 'Store was successful!');
         }
         else if($step==5)
         {
            
            
             DB::table('vv_listings')->where('listing_id',$id)->update([
                 'listing_info_question' =>implode(',',request()->listing_info_question), 
                 'listing_info_answer' =>implode(',',request()->listing_info_answer), 
             ]);
             return redirect()->route('edit_listing_step_1',['id'=>$id,'step'=>6])->with('message' , 'Store was successful!');
         }
            //return redirect()->back();
    }
    public function Delete($id)
    {
        DB::table('vv_listings')->where('listing_id',$id)->update([
            'listing_is_delete'=>1,
            'listing_delete_cdt'=>now()
        ]);
      
        return redirect()->back()->with('message' , 'Delete was successful!');
    }

    public function Listing()
    {
        $category=DB::table('vv_categories')->get();
        $sub_category=DB::table('vv_sub_categories')->get();
        $state=DB::table('vv_states')->get();
        $city=DB::table('vv_cities')->get();
        $country=DB::table('vv_countries')->get();
        $users=DB::table('vv_users')->get();
        return view('ui.old-ui.iwp-add-listing-step-1',
        ['category'=>$category,'sub_category'=>$sub_category,'state'=>$state,'city'=>$city,'country'=>$country,'users'=>$users]
        );
     
    }
    public  function uploadImage($file)
    {
   
        if($file==NULL){
            return $filename="null";
        }
        else{
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          return $filename;
        }
    }
    public function getPlans($id)
    {
        $sub_category =DB::table('vv_sub_categories')->where('category_id',$id)->get();
        //dd($sub_category);
        // dd(response()->json(['states'=>$states]));
        return response()->json(['sub_category'=>$sub_category]);
    }
    public function getPlans1($id)
    {
      $state=DB::table('vv_states')->where('country_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['state'=>$state]);
    }
    public function getPlans2($id)
    {
      $city=DB::table('vv_cities')->where('state_id',$id)->get();
        // dd(response()->json(['states'=>$states]));
        return response()->json(['city'=>$city]);
    }
    public function Trash()
    {
        $id=1;
        $listing=DB::table('vv_listings')->where('listing_is_delete',$id)->get();
        return view('listing.all-listing-restore',
        ['listing'=>$listing]);
    }
    public function Restore($id)
    {
        DB::table('vv_listings')->where('listing_id',$id)->update([
            'listing_is_delete'=>0,
        ]);
        return redirect()->route('listing_table')->with('message' , 'Delete was successful!');
    }
    public function PDelete($id)
    {
        DB::table('vv_listings')->where('listing_id',$id)->delete();
        return redirect()->back()->with('message' , 'Delete was successful!');
    }
    public function Claim_Listing(Request $request)
    {
      $listing=DB::table('vv_claim_listings')->get();
      return view('listing.claim-listing',
      ['listing'=>$listing]);

    }
    public function Claim_Delete($id)
    {
        DB::table('vv_claim_listings')->where('claim_listing_id',$id)->delete();
        return redirect()->back();
    }
    public function Duplicate(Request $request)
    { 
        $id=request()->listing_id;
        $listing=DB::table('vv_listings')->where('listing_id',$id)->first();
    // dd($listing[0]['360_view']); 
         DB::table('vv_listings')->insert([
        'listing_name' =>request()->listing_name,
        'user_id'=>session('user_id'),
        'listing_mobile' =>$listing->listing_mobile,
        'listing_email' =>$listing->listing_email,
        'listing_whatsapp' =>$listing->listing_whatsapp,
        'listing_website' =>$listing->listing_website,
        'listing_address' =>$listing->listing_address,
        'listing_lat' =>$listing->listing_lat ,
        'listing_lng' =>$listing->listing_lng ,
        'country_id' =>$listing->country_id,
        'state_id' =>$listing->state_id ,
        'city_id' =>$listing->city_id,
        'category_id' =>$listing->category_id ,
        'sub_category_id' =>$listing->sub_category_id, 
        'listing_description' =>$listing->listing_description, 
        'service_locations' =>$listing->service_locations,
        'service_id' =>$listing->service_id,
        'service_1_name' =>$listing->service_1_name,
        'service_1_price' =>$listing->service_1_price, 
        'service_1_detail' =>$listing->service_1_detail,
        'service_1_view_more' =>$listing->service_1_view_more, 
        'listing_info_question' =>$listing->listing_info_question, 
        'listing_info_answer' =>$listing->listing_info_answer, 
        'listing_video' =>$listing->listing_video,
        'google_map' =>$listing->google_map,
        '360_view' =>'0',
        'profile_image'=>$listing->profile_image,
        'cover_image' =>$listing->cover_image,
        'service_image' =>$listing->service_image,
        'service_1_image' =>$listing->service_1_image, 
        'gallery_image' => $listing->gallery_image,
        'listing_type_id'=>$listing->listing_type_id,
        'opening_days'=>$listing->opening_days,
        'opening_time'=>$listing->opening_time,
        'closing_time'=>$listing->closing_time,
        'fb_link'=>$listing->fb_link,
        'twitter_link'=>$listing->twitter_link,
        'gplus_link'=>$listing->gplus_link,
        'service_2_name'=>'',
        'service_2_price'=>1,
        'service_2_image'=>'',
        'service_3_name'=>'',
        'service_3_price'=>1,
        'service_3_image'=>'',
        'service_4_name'=>'',
        'service_4_price'=>1,
        'service_4_image'=>'',
        'service_5_name'=>'',
        'service_5_price'=>1,
        'service_5_image'=>'',
        'service_6_name'=>'',
        'service_6_price'=>1,
        'service_6_image'=>'',
        'listing_code'=>'',
  
        'seo_title'=>'',
        'seo_description'=>'',
        'seo_keywords'=>'',
        // 'listing_lat'
        // 'listing_lng'
        'listing_status'=>'',
        'payment_status'=>'',
        // 'display_position'
         'start_date'=>now(),
         'end_date'=>now(),
         'payment'=>1,
         'listing_slug'=>'',
        // listing_is_delete
        //  'listing_delete_cdt'=>now(),
         'listing_cdt' =>now()
               
          
            ]);
            return redirect()->route('user_all_listing')->with('message' , 'Store was successful!');

        }
  
}
