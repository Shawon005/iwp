<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListingDuplicateController extends Controller
{
    public function Listing()
    {
        $listing=DB::table('vv_listings')->get();
        $users=DB::table('vv_users')->get();
        return view('listing.duplicate.admin-create-duplicate-listing',
        ['listing'=>$listing,'users'=>$users]
        );
     
    }
    public function Store(Request $request)
    { 
        $id=request()->listing_id;
        $listing=DB::table('vv_listings')->where('listing_id',$id)->first();
    // dd($listing[0]['360_view']); 
         DB::table('vv_listings')->insert([
        'listing_name' =>request()->listing_name,
        'user_id'=>request()->user_id,
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
        'listing_status'=>'Active',
        'payment_status'=>'pending',
        // 'display_position'
         'start_date'=>now(),
         'end_date'=>now(),
         'payment'=>1,
         'listing_slug'=>'',
        // listing_is_delete
        //  'listing_delete_cdt'=>now(),
         'listing_cdt' =>now()
               
          
            ]);

            $user=DB::table('vv_users')->where('user_id',request()->user_id)->first();
            $data['add']="Listing";
            $data['title']="Fototech India Magazine & Portal";
            $date['name']=request()->listing_name;
            $data['email']=$listing->listing_email;
            $data['user_name']=user(request()->user_id);
            $data['mobile']=$listing->listing_mobile;
            $data['user_email']=$user->email_id;
            $data['admin_email']=Nam('vv_admin','admin_id',session('id'),'admin_email');
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
            $message->to($data['user_email'])->subject
            ($data['title']);});
            Mail::send('item-add-mail', ['data'=>$data], function($message) use ($data) {
                $message->to($data['admin_email'])->subject
                ($data['title']);});
            return redirect()->route('listing_table')->with('message' , 'Store was successful!');

        }
}
