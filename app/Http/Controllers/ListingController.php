<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    public function Index(Request $request)
    {
        $id=0;
      $listing=DB::table('vv_listings')->where('listing_is_delete',$id)->get();
      return view('listing.all-listing',
      ['listing'=>$listing]);

    }
    public function Store(Request $request)
    {
        $request->validate([
            'user_id'=>'required','listing_name'=>'required',
            'listing_moblie' =>'required', 
            'listing_email' =>'required',
            'listing_whatsapp' =>'required',
            'listing_address' =>'required',
            'country_id' =>'required',
            'state_id' =>'required',
            'city_id' =>'required',
            'category_id' =>'required' ,
            'sub_category_id' =>'required', 
            'listing_description' =>'required', 
            'service_location' =>'required',   
            
             ]);
        $files=request()->file('service_image');
        foreach($files as $file)
        {
            $file1[]=$this->uploadImage($file);
        }
        $file1=implode(',',$file1);
        $files=request()->file('service_1_image');
        foreach($files as $file)
        {
            $file2[]=$this->uploadImage($file);
        }
        $file2=implode(',',$file2);
        $files=request()->file('gallery_image');
        foreach($files as $file)
        {
            $file3[]=$this->uploadImage($file);
        }
        $file3=implode(',',$file3);
    // dd(request()->all());
       $state=request()->state_id;
       $state=implode(',',$state);
       $city=request()->city_id;
       $city=implode(',',$city);
       $sub=request()->sub_category_id;
       $sub=implode(',',$sub);

       $id=DB::table('vv_listings')->insertGetId([
        //Sdd($request->all()),
        'user_id'=>request()->user_id,
        'listing_name' =>request()->listing_name,
        'listing_mobile' =>request()->listing_moblie, 
        'listing_email' =>request()->listing_email,
        'listing_whatsapp' =>request()->listing_whatsapp,
        'listing_website' =>(request()->listing_website==null)?'':request()->listing_website,
        'listing_address' =>request()->listing_address,
        'listing_lat' =>(request()->listing_lat==null)?'':request()->listing_lat,
        'listing_lng' =>(request()->listing_lng==null)?'':request()->listing_lng ,
        'country_id' =>request()->country_id,
        'state_id' =>implode(',',request()->state_id) ,
        'city_id' =>implode(',',request()->city_id),
        'category_id' =>request()->category_id ,
        'sub_category_id' =>implode(',',request()->sub_category_id), 
        'listing_description' =>request()->listing_description, 
        'service_locations' =>request()->service_location,

        'service_id' =>implode(',',request()->service_id),
        'service_1_name' =>implode(',',request()->service_1_name),
        'service_1_price' =>implode(',',request()->service_1_price), 
        'service_1_detail' =>implode(',',request()->service_1_details),
        'service_1_view_more' =>implode(',',request()->service_1_viwe_more), 
        'listing_info_question' =>implode(',',request()->listing_info_question), 
        'listing_info_answer' =>implode(',',request()->listing_info_answer), 

        'listing_video' =>(request()->listing_video==null)?'':request()->listing_video,
        'google_map' =>(request()->google_map==null)?'':request()->google_map==null,
        '360_view' =>(request()->M360_view==null)?'':request()->M360_view==null,

        'profile_image'=>$this->uploadImage(request()->profile_image),
        'cover_image' =>$this->uploadImage(request()->cover_image),
        'service_image' =>$file1,
        'service_1_image' =>$file2, 
        'gallery_image' => $file3,
 
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
        'payment_status'=>'pending',
         'start_date'=>now(),
         'end_date'=>now(),
         'payment'=>0,
         'listing_slug'=>'',
        //listing_is_delete
         'listing_delete_cdt'=>now(),
         'listing_cdt' =>now()
               
          
            ]);
            code('vv_listings','listing_code','listing_id',$id,'LISTING');
           
            $user=DB::table('vv_users')->where('user_id',request()->user_id)->first();
            $data['add']="Listing";
            $data['title']="Fototech India Magazine & Portal";
            $date['name']=request()->listing_name;
            $data['email']=request()->listing_email;
            $data['user_name']=user(request()->user_id);
            $data['mobile']=request()->listing_moblie;
            $data['user_email']=$user->email_id;
            $data['admin_email']=Nam('vv_admin','admin_id',session('id'),'admin_email');
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
            $message->to($data['user_email'])->subject
            ($data['title']);});
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
                $message->to($data['admin_email'])->subject
                ($data['title']);});
          return redirect()->route('listing_table')->with('message' , 'Store was successful!');
           
        // catch (\Throwable $th) {
        //     dd("data not");
        //     //return redirect()->back()->withInput()->withErrors($e->getMessage());
        //     //dd($e->getMessage());
        // }    

    }
    public function Edit( $id)
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
        $sub_category=DB::table('vv_sub_categories')->get();
        $state=DB::table('vv_states')->get();
        $city=DB::table('vv_cities')->get();
        $country=DB::table('vv_countries')->get();

        return view('listing.admin-edit-listings',
        ['category'=>$category,'sub_category'=>$sub_category,'state'=>$state,'city'=>$city,'country'=>$country,'listing'=>$listing,
        'service_id'=>$service_id,'service_1_name'=>$service_1_name,'service_1_price'=>$service_1_price,'service_1_detail'=>$service_1_detail,
        'service_1_view_more'=>$service_1_view_more,'listing_info_ans'=>$listing_info_ans,'sub'=>$sub,'cities'=>$cities,
        'listing_info_question'=>$listing_info_question,'state1'=>$state1,'users'=>$users]
        );
     
    }
    public function Update(Request $request,$id)
    {
        $request->validate([
            'user_id'=>'required','listing_name'=>'required',
            'listing_moblie' =>'required', 
            'listing_email' =>'required',
            'listing_whatsapp' =>'required',
            'listing_address' =>'required',
            'country_id' =>'required',
            'state_id' =>'required',
            'city_id' =>'required',
            'category_id' =>'required' ,
            'sub_category_id' =>'required', 
            'listing_description' =>'required', 
            'service_location' =>'required',   
           
             ]);
        $listing=DB::table('vv_listings')->where('listing_id',$id)->first();
        //dd(request()->all());
        
            $files=request()->file('service_image');
            if($files!=NULL){
            foreach($files as $file)
            {
                $file1[]=$this->uploadImage($file);
            }
            $file1=implode(',',$file1);
        }
        else{
            $file1=$listing->service_image;
        }
        $files=request()->file('service_1_image');
        if($files!=NULL){
            $files=request()->file('service_1_image');
            foreach($files as $file)
            {
                $file2[]=$this->uploadImage($file);
            }
            $file2=implode(',',$file2);
        }
        else{
            $file2=$listing->service_1_image;
        }
        $files=request()->file('gallery_image');
        if($files!=NULL){
            $files=request()->file('gallery_image');
            foreach($files as $file)
            {
                $file3[]=$this->uploadImage($file);
            }
            $file3=implode(',',$file3);
        }
        else{
            $file3=$listing->gallery_image;
        } 
        $pro=request()->file('profile_image');
        if($pro==NULL){
            $pro=$listing->profile_image;
        }
        else{
            $pro=$this->uploadImage($pro);
           // dd($pro);
           
        }
        $cover=request()->file('cover_image');
       
        if($cover==NULL)
        {
            $cover_image=$listing->cover_image;
        }
        else{
            $cover_image=$this->uploadImage($cover);
           
        }
        
        try{
          DB::table('vv_listings')->where('listing_id',$id)->update([
   //dd($request->all()),
            'user_id'=>request()->user_id,
            'listing_name' =>request()->listing_name,
            'listing_mobile' =>request()->listing_moblie, 
            'listing_email' =>request()->listing_email,
            'listing_whatsapp' =>request()->listing_whatsapp,
            'listing_website' =>(request()->listing_website==null)?'':request()->listing_website,
            'listing_address' =>request()->listing_address,
            'listing_lat' =>(request()->listing_lat==null)?'':request()->listing_lat,
            'listing_lng' =>(request()->listing_lng==null)?'':request()->listing_lng,
            'country_id' =>request()->country_id,
            'state_id' =>implode(',',request()->state_id),
            'city_id' =>implode(',',request()->city_id),
            'category_id' =>request()->category_id ,
            'sub_category_id' =>implode(',',request()->sub_category_id), 
            'listing_description' =>request()->listing_description, 
            'service_locations' =>request()->service_location,
    
            'service_id' =>implode(',',request()->service_id),
            'service_1_name' =>implode(',',request()->service_1_name),
            'service_1_price' =>implode(',',request()->service_1_price), 
            'service_1_detail' =>implode(',',request()->service_1_detail),
            'service_1_view_more' =>implode(',',request()->service_1_viwe_more), 
            'listing_info_question' =>implode(',',request()->listing_info_question), 
            'listing_info_answer' =>implode(',',request()->listing_info_answer), 
       
            'listing_video' =>(request()->listing_video==null)?'':request()->listing_video,
            'google_map' =>(request()->google_map==null)?'':request()->google_map==null,
            '360_view' =>(request()->M360_view==null)?'':request()->M360_view==null,
           // dd($request->all()),
            'profile_image'=>$pro,
            'cover_image' =>$cover_image,
           
            'service_image'=>$file1,
            'service_1_image'=>$file2, 
            'gallery_image'=>$file3,

        ]);
       
            //dd("data save");
          // $request->session()->flash('message' , 'Task was successful!');
            return redirect()->route('listing_table')->with('message' , 'Update was successful!');
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
        DB::table('vv_listings')->where('listing_id',$id)->update([
            'listing_is_delete'=>1,
            'listing_delete_cdt'=>now()
        ]);
      
        return redirect()->route('listing_table')->with('message' , 'Delete was successful!');
    }

    public function Listing()
    {
        $category=DB::table('vv_categories')->get();
        $sub_category=DB::table('vv_sub_categories')->get();
        $state=DB::table('vv_states')->get();
        $city=DB::table('vv_cities')->get();
        $country=DB::table('vv_countries')->get();
        $users=DB::table('vv_users')->get();
        return view('listing.admin-add-new-listings',
        ['category'=>$category,'sub_category'=>$sub_category,'state'=>$state,'city'=>$city,'country'=>$country,'users'=>$users]
        );
     
    }
    public  function uploadImage($file)
    {
        
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
       
           $file->move('storage/file/',$filename);
          // dd($filename);
          return $filename;
        
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
    
  

}
