<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UiHomePageController extends Controller
{
   
    public function Top_section(Request $request)
    {
        $top_section=DB::table('vv_homepage_top_section')->get();
        $top_category=DB::table('vv_top_categories')->get();
        $trend_category=DB::table('vv_trend_categories')->get();
        $top_business=DB::table('vv_featured_listings')->get();
        $top_event=DB::table('vv_top_events')->get();
        $service=DB::table('vv_expert_categories')->orderBy('category_filter_pos_id','asc')->get();
        $top_service=DB::table('vv_top_service_providers')->get();
        $ads=DB::table('vv_all_ads_enquiry')->where('all_ads_price_id',1)->where('ad_enquiry_status','Active')->where('ad_start_date','<=',now())->where('ad_end_date','>=',now())->get();
        $sliders=DB::table('vv_slider')->get();
        $cities = DB::table('vv_cities')->get();
        $states = DB::table('vv_states')->get();

        return view('ui.new-ui.iwp-index',
        ['states' => $states, 'cities' => $cities, 'top_section'=>$top_section,'top_category'=>$top_category,'trend_category'=>$trend_category,'top_business'=>$top_business,
        'top_event'=>$top_event,'service'=>$service,'top_service'=>$top_service,'ads'=>$ads,'sliders'=>$sliders
        ]);

    }
    public function All_category(Request $request)
    {
        $service=DB::table('vv_categories')->orderBy('category_filter_pos_id','asc')->get();
        $sub=DB::table('vv_sub_categories')->get();
        return view('ui.new-ui.iwp-all-category',
        ['service'=>$service, 'sub'=>$sub ]);

    }
    public function Events(Request $request)
    {
        DB::table('vv_events')->where('event_start_date','<',now()->modify('-1 day'))->delete();
        $events=DB::table('vv_events')->get();
        $state=DB::table('vv_event_states')->get();
        $city=DB::table('vv_event_cities')->get();
        return view('ui.new-ui.iwp-events',
        ['events'=>$events, 'state'=>$state,'city'=>$city]);
    }
    public function Event_details(Request $request,$id)
    {
        $events=DB::table('vv_events')->where('event_id',$id)->first();
        $state=DB::table('vv_event_states')->get();
        $city=DB::table('vv_event_cities')->get();
        page_viwe(1,$events->event_id);
        return view('ui.new-ui.event.iwp-index',
        ['event'=>$events, 'state'=>$state,'city'=>$city]);
    }
   
    public function Products(Request $request)
    {
        $products=DB::table('vv_products')->where('product_type','External')->get();
        $category=DB::table('vv_product_categories')->get();
        $sub=DB::table('vv_product_sub_categories')->get();
        $child=DB::table('vv_product_child_categories')->get();
        $brand=DB::table('vv_brands')->get();
        return view('ui.new-ui.iwp-all-products',
        ['products'=>$products, 'category'=>$category,'sub'=>$sub,'child'=>$child,'brand'=>$brand]);
    }
    public function Product_Categories(Request $request)
    {
        $categories=DB::table('vv_product_categories')->get();
        $sub_categories=DB::table('vv_product_sub_categories')->get();
        $child_categories=DB::table('vv_product_child_categories')->get();
        $brands=DB::table('vv_brands')->get();
        return view('ui.new-ui.iwp-product-categories',
        ['categories'=>$categories,'sub_categories'=>$sub_categories,'child_categories'=>$child_categories,'brands'=>$brands]);
    }
    public function Product_Cat(Request $request,$id)
    {
        $products=DB::table('vv_products')->where('category_id',$id)->get();
        $category=DB::table('vv_product_categories')->get();
        $sub=DB::table('vv_product_sub_categories')->get();
        $child=DB::table('vv_product_child_categories')->get();
        $brand=DB::table('vv_brands')->get();
        return view('ui.new-ui.iwp-all-products',
        ['products'=>$products, 'category'=>$category,'sub'=>$sub,'child'=>$child,'brand'=>$brand]);
    }
    public function Product_details(Request $request,$id){
        $products = DB::table('vv_products')->get();
        $product = $products->where('product_id',$id)->first();

        $order_items = DB::table('vv_order_lineitems')->get();
        $order_items = $order_items->pluck('product_id')->toArray();
        $order_items = array_count_values($order_items);
        arsort($order_items);
        $popular_items = array_keys($order_items);
        $populars = collect($products);
        $populars = $populars->whereIn('product_id', $popular_items);

        $frequent_items = explode(',', $product->frequents_id);
        $frequent_items = collect($frequent_items)->toArray();
        $frequents = $products->whereIn('product_id', $frequent_items)->all();

        page_viwe(3,$product->product_id);
        return view('ui.new-ui.product.iwp-all-product',
        ['product'=>$product, 'populars' => $populars, 'frequents' => $frequents]);
    }
    public function Product_details_U(Request $request,$id,$ref){

        $products = DB::table('vv_products')->get();
        $product = $products->where('product_id',$id)->first();
        page_viwe(3,$product->product_id);
        $details=$ref;

        $order_items = DB::table('vv_order_lineitems')->get();
        $order_items = $order_items->pluck('product_id')->toArray();
        $order_items = array_count_values($order_items);
        arsort($order_items);
        $popular_items = array_keys($order_items);
        $populars = collect($products);
        $populars = $populars->whereIn('product_id', $popular_items);

        $frequent_items = explode(',', $product->frequents_id);
        $frequent_items = collect($frequent_items)->toArray();
        $frequents = $products->whereIn('product_id', $frequent_items)->all();
        
        return view('ui.new-ui.product.iwp-all-product',
        ['product'=>$product,'ref'=>$ref, 'populars' => $populars, 'frequents' => $frequents]);
    }
    public function Community(Request $request)
    {
       $community=DB::table('vv_users')->get();
       return view('ui.new-ui.iwp-community',
        ['community'=>$community]);
    }
    public function Plan(Request $request)
    {
        $plans=DB::table('vv_plan_type')->get();
        return view('ui.new-ui.iwp-pricing-details',
        ['plans'=>$plans]);
    }
    public function Stores(Request $request)
    {
        $products=DB::table('vv_products')->where('product_type','Internal')->get();
        $category=DB::table('vv_product_categories')->get();
        $sub=DB::table('vv_product_sub_categories')->get();
        $child=DB::table('vv_product_child_categories')->get();
        return view('ui.new-ui.iwp-mystore',
        ['products'=>$products, 'category'=>$category,'sub'=>$sub,'child'=>$child]);
    }
    public function Jobs(Request $request)
    {   
        $P_job=DB::table('vv_job_popular')->orderBy('job_popular_pos_id','asc')->get();
        $job=DB::table('vv_jobs')->get();
        $category=DB::table('vv_job_categories')->get();
        $sub=DB::table('vv_job_sub_categories')->get();
        $state=DB::table('vv_job_states')->get();
        $city=DB::table('vv_job_cities')->get();
        return view('ui.new-ui.jobs.iwp-index',
        ['P_jobs'=>$P_job,'jobs'=>$job, 'category'=>$category,'sub'=>$sub,'states'=>$state,'citys'=>$city]);
    }
    public function All_Jobs(Request $request,$id)
    {
        
        $job=DB::table('vv_jobs')->where('category_id',$id)->get();
        $category=DB::table('vv_job_categories')->get();
        $sub=DB::table('vv_job_sub_categories')->get();
        $state=DB::table('vv_job_states')->get();
        $city=DB::table('vv_job_cities')->get();
        return view('ui.new-ui.all-jobs.iwp-job',
        ['jobs'=>$job,'id'=>$id, 'category'=>$category,'sub'=>$sub,'states'=>$state,'citys'=>$city]);
    }
    public function Job_Details(Request $request,$id)
    {
        $job=DB::table('vv_jobs')->where('job_id',$id)->first();
        page_viwe(4,$job->job_id);
        return view('ui.new-ui.iwp-job-details',
        ['job'=>$job]);
    }
    public function Applied_JOB(Request $request)
    {
        $ch=DB::table('vv_job_applied')->where('job_id',request()->job_id)->where('job_user_id',request()->job_user_id)->get();
        if(request()->job_id==session('user_id'))
        {
            return response()->json([3]); 
        }
        else if(Nam('vv_job_profile','user_id',session('user_id'),'job_profile_id')==null){
            return response()->json([4]); 
        }
        else if(count($ch)>0)
        {
            return response()->json([5]); 
        }
       else{
        try{
        DB::table('vv_job_applied')->insert([
         'job_id'=>request()->job_id,
         'job_user_id'=>session('user_id'),
         'job_profile_id'=>Nam('vv_job_profile','user_id',session('user_id'),'job_profile_id'),
         'job_applied_status'=>"Active",
         'job_applied_cdt'=>now(),
        ]);
        return response()->json([1]);
        }
        catch (\Throwable $th){
            return response()->json(2);
        }
        }
    }
    public function Experts(Request $request)
    {
        $expert=DB::table('vv_experts')->get();
        $category=DB::table('vv_expert_categories')->orderBy('category_filter_pos_id','asc')->get();
        $sub=DB::table('vv_expert_sub_categories')->get();
        $state=DB::table('vv_expert_states')->get();
        $city=DB::table('vv_expert_cities')->get();
        $area=DB::table('vv_expert_areas')->get();
        return view('ui.new-ui.service-experts.iwp-index',
        ['experts'=>$expert, 'category'=>$category,'sub'=>$sub,'states'=>$state,'citys'=>$city,'areas'=>$area]);
    }
    public function Expert_details(Request $request,$id)
    {
        $expert=DB::table('vv_experts')->where('category_id',$id)->get();
        $category=DB::table('vv_expert_categories')->orderBy('category_filter_pos_id','asc')->get();
        $sub=DB::table('vv_expert_sub_categories')->get();
        $state=DB::table('vv_expert_states')->get();
        $city=DB::table('vv_expert_cities')->get();
        $area=DB::table('vv_expert_areas')->get();
        return view('ui.new-ui.iwp-expert',
        ['experts'=>$expert, 'category'=>$category,'sub'=>$sub,'states'=>$state,'citys'=>$city,'areas'=>$area,'id'=>$id]);
    }
    public function Expert_City(Request $request,$id)
    {
        $expert=DB::table('vv_experts')->where('city_id',$id)->get();
        $category=DB::table('vv_expert_categories')->orderBy('category_filter_pos_id','asc')->get();
        $sub=DB::table('vv_expert_sub_categories')->get();
        $state=DB::table('vv_expert_states')->get();
        $city=DB::table('vv_expert_cities')->get();
        $area=DB::table('vv_expert_areas')->get();
        return view('ui.new-ui.iwp-expert',
        ['experts'=>$expert, 'category'=>$category,'sub'=>$sub,'states'=>$state,'citys'=>$city,'areas'=>$area,'id'=>$id]);
    }
    public function News(Request $request)
    {
        $news=DB::table('vv_news')->orderBy('news_cdt','desc')->get();
        $trending=DB::table('vv_news_trending')->orderBy('trending_news_id','desc')->get();
        $category=DB::table('vv_news_categories')->orderBy('category_filter_pos_id','asc')->get();
        $social=DB::table('vv_news_social_media')->get();
        $slider=DB::table('vv_news_slider')->orderBy('news_slider_pos_id','asc')->get();
        $popular=DB::select("SELECT vv_news.news_id,vv_news.category_id,vv_news.news_title,vv_news.news_description,vv_news.news_image,vv_news.news_cdt, COUNT(*) AS total_count FROM vv_news INNER JOIN `vv_page_views`  ON vv_news.news_id = vv_page_views.news_id 
        WHERE vv_news.news_status= 'Active' GROUP BY vv_news.news_id,vv_news.category_id,vv_news.news_title,vv_news.news_description,vv_news.news_image,vv_news.news_cdt ORDER BY COUNT(*) DESC LIMIT 10");  

        return view('ui.new-ui.news.iwp-index',
        ['news'=>$news, 'category'=>$category,'social'=>$social,'trending'=>$trending,'sliders'=>$slider,'populars'=>$popular]);
    }
    public function News_details(Request $request,$id)
    {
        $news=DB::table('vv_news')->where('news_id',$id)->first();
        $category=DB::table('vv_news_categories')->orderBy('category_filter_pos_id','asc')->get();
        $social=DB::table('vv_news_social_media')->get();
        $newses=DB::table('vv_news')->get();
        $trending=DB::table('vv_news_trending')->orderBy('trending_news_pos_id','asc')->get();
        page_viwe(7,$news->news_id);
        return view('ui.new-ui.news-details.iwp-index',
        ['news'=>$news,'category'=>$category,'newses'=>$newses,'trending'=>$trending,'social'=>$social]);
    }
    public function News_all(Request $request,$id)
    {
        $news=DB::table('vv_news')->where('category_id',$id)->get();
        $category=DB::table('vv_news_categories')->orderBy('category_filter_pos_id','asc')->get();
        $social=DB::table('vv_news_social_media')->get();
        $newses=DB::table('vv_news')->get();
        $trending=DB::table('vv_news_trending')->orderBy('trending_news_pos_id','asc')->get();
        return view('ui.new-ui.iwp-all-news',
        ['news'=>$news,'id'=>$id,'category'=>$category,'newses'=>$newses,'trending'=>$trending,'social'=>$social]);
    }
    public function Subscriber(Request $request){

        DB::table('vv_news_subscribers')->insert([
         'subscriber_email_id'=>request()->news_newsletter_subscribe_name,
         'news_subscribers_cdt'=>now()
        ]);
        return response()->json(['1']); 
        //return redirect()->route('all-news')->with('message' , 'Update was successful!');
    }

    public function Listing_Details(Request $request,$id){
        $listing=DB::table('vv_listings')->where('category_id',$id)->get();
        $category=DB::table('vv_categories')->orderBy('category_filter_pos_id','asc')->get();
        $sub=DB::table('vv_sub_categories')->where('category_id',$id)->get();
        $state=DB::table('vv_states')->get();
        $cities=DB::table('vv_cities')->get();
        $featured=DB::table('vv_all_featured_filters')->where('all_featured_filter_status',1)->get();
        page_viwe(11,$id);
        return view('ui.new-ui.all-listing.iwp-listing',
        ['listings'=>$listing, 'id'=>$id,'category'=>$category,'sub'=>$sub,'states'=>$state,'cities'=>$cities,'features'=>$featured]);
    }
    public function Listing(Request $request,$id){
        $listing=DB::table('vv_listings')->where('listing_id',$id)->first();
        $products=DB::table('vv_products')->where('user_id', $listing->user_id)->get();
        page_viwe(0,$listing->listing_id);
        return view('ui.new-ui.listing.iwp-listing',
      ['listing'=>$listing, 'products'=>$products, 'id'=>$id]);
    }
    public function Listing_Sub_Details(Request $request,$id,$sub){
        $listing=DB::table('vv_listings')->where('category_id',$id)->where('sub_category_id',$sub)->get();
        $category=DB::table('vv_categories')->orderBy('category_filter_pos_id','asc')->get();
        $sub=DB::table('vv_sub_categories')->where('category_id',$id)->get();
        $state=DB::table('vv_states')->get();
        $cities=DB::table('vv_cities')->get();
        $featured=DB::table('vv_all_featured_filters')->where('all_featured_filter_status',1)->get();
        return view('ui.new-ui.all-listing.iwp-listing',
        ['listings'=>$listing,'id'=>$id,'category'=>$category,'sub'=>$sub,'states'=>$state,'cities'=>$cities,'features'=>$featured]);
    }
    public function Login(Request $request){
        return view('ui.new-ui.iwp-login');
    }
    public function Profile(Request $request,$id){
        $users=DB::table('vv_users')->where('user_id',$id)->first();
        $listing=DB::table('vv_listings')->where('user_id',$id)->get();
        $event=DB::table('vv_events')->where('user_id',$id)->get();
        return view('ui.new-ui.iwp-profile',
        ['id'=>$id,'user'=>$users,'listings'=>$listing,'events'=>$event]);
    }
    public function Places(Request $request){
        $places=DB::table('vv_places')->get();
         return view('ui.new-ui.places.iwp-index',
        ['places'=>$places]);
    }
    public function Coupon(Request $request){
        DB::table('vv_coupons')->where('coupon_end_date','<',now()->modify('-1 day'))->delete();
        $coupon=DB::table('vv_coupons')->get();
        $category=DB::table('vv_coupon_categories')->get();
        $sub=DB::table('vv_coupon_sub_categories')->get();
        $child=DB::table('vv_coupon_child_categories')->get();
        $brand=DB::table('vv_coupon_brands')->get();
         return view('ui.new-ui.iwp-coupons',
        ['coupons'=>$coupon, 'category'=>$category,'sub'=>$sub,'child'=>$child,'brand'=>$brand]);
    }
    public function Enquery(Request $request){
  //   dd($request->all());
  if(request()->listing_user_id==session('user_id'))
  {
      return response()->json(['3']);
  }
  try{
	 DB::table('vv_enquiries')->insert([
        'listing_id'=>(request()->listing_id==null)?0:request()->listing_id, 	
        'event_id' 	=>(request()->event_id==null)?0:request()->event_id,
        'blog_id' 	=>(request()->blog_id==null)?0:request()->blog_id,
        'product_id' =>0,
        'listing_user_id'=>(request()->listing_user_id==null)?0:request()->listing_user_id, 	
        'enquiry_sender_id' =>session('user_id'),	
        'enquiry_source' 	=>request()->enquiry_source,
        'enquiry_name' 	=>request()->enquiry_name,
        'enquiry_email' 	=>request()->enquiry_email,
        'enquiry_mobile' 	=>request()->enquiry_mobile,
        'appointment_date' 	=>now(),
        'appointment_time' 	=>now(),
        'enquiry_message' 	=>request()->enquiry_message,
        'enquiry_category'=>(request()->enquiry_category==null)?0:request()->enquiry_category, 	
        'service_name' 	=>'',
        'service_price' 	=>'',
        'payment_id' 	=>0,
        'total_amount' 	=>'',
        'admin_amount' 	=>'',
        'user_amount' 	=>'',
        'payment_status' 	=>'',
        'enquiry_save' 	=>0,
        'enquiry_cdt' 	=>now(),
        'payment_cdt'=>now(),
]);
if($request->footer){
    return redirect()->back();
}
return  response()->json(['1']);
    }
    catch (\Throwable $th){
        return response()->json(['2']);
    }
}
public function claim(Request $request){
      //dd(request()->enquiry_image);
    if(request()->listing_user_id==session('user_id'))
    {
        return response()->json(['3']);
    }
    $file=request()->enquiry_image;
    try{
       DB::table('vv_claim_listings')->insert([
          'listing_id'=>(request()->listing_id==null)?0:request()->listing_id, 	
          'enquiry_sender_id'=>session('user_id'),	
          'enquiry_name'=>request()->enquiry_name,
          'enquiry_email'=>request()->enquiry_email,
          'enquiry_mobile'=>request()->enquiry_mobile,
          'enquiry_message'=>request()->enquiry_message,
          'enquiry_image'=>$this->uploadImage($file),
        //   $this->uploadImage(request()->enquiry_image)
          'claim_status'=>'1',
          'claim_cdt'=>now(),
  ]);
  
  return  response()->json(['1']);
      }
      catch (\Throwable $th){
          return response()->json(['2']);
      }
  }

    public function Search(Request $request)
    {
        $listing=DB::table('vv_listings')->get();
        $events=DB::table('vv_events')->get();
        $products=DB::table('vv_products')->get();
        $expert=DB::table('vv_experts')->get();
        $job=DB::table('vv_jobs')->get();
        return view('ui.new-ui.iwp-search',
        ['listing'=>$listing,'events'=>$events,'products'=>$products,'experts'=>$expert,'jobs'=>$job]);
    }
    public function Places_Details(Request $request,$id){
        $places=DB::table('vv_places')->where('place_id',$id)->first();
        page_viwe(8,$places->place_id);
         return view('ui.new-ui.iwp-picture-city',
        ['place'=>$places]);
    }
    public function Follow(Request $request,$id){
       $user= DB::table('vv_users')->where('user_id',session('user_id'))->first();
       $follow=arr($user->user_followers);
       $ch=0;
       foreach($follow as $k=>$flo)
       {
        if($id==$flo)
        {
         $ch=1;
         unset($follow[$k]);
        }    
      }
      if($ch==0)
      {
        $follow[]=$id;
        $follow=implode(',',$follow);
        DB::table('vv_users')->where('user_id',session('user_id'))->update([
        'user_followers'=>$follow
        ]);
        return response()->json(['check'=>'unfollow']);
      }
      else{
        $follow=implode(',',$follow);
        DB::table('vv_users')->where('user_id',session('user_id'))->update([
        'user_followers'=>$follow
        ]);
        return response()->json(['check'=>'follow']);
      }
    }
    public function Product_Enquery(Request $request){
        //  dd($request->all());
       
        if(request()->listing_user_id==session('user_id'))
        {
            return response()->json(['s']);
        }

        try{
           DB::table('vv_enquiries')->insert([
              'listing_id'=>0, 	
              'event_id' =>0,
              'blog_id'=>0,
              'product_id'=>request()->product_id,
              'listing_user_id'=>request()->listing_user_id, 	
              'enquiry_sender_id' =>request()->enquiry_sender_id,
              'enquiry_source' 	=>request()->enquiry_source,
              'enquiry_name' 	=>request()->enquiry_name,
              'enquiry_email' 	=>request()->enquiry_email,
              'enquiry_mobile' 	=>request()->enquiry_mobile,
              'appointment_date' 	=>now(),
              'appointment_time' 	=>now(),
              'enquiry_message' 	=>request()->enquiry_message,
              'enquiry_category'=>0, 	
              'service_name' 	=>'',
              'service_price' 	=>'',
              'payment_id' 	=>0,
              'total_amount' 	=>'',
              'admin_amount' 	=>'',
              'user_amount' 	=>'',
              'payment_status' 	=>'',
              'enquiry_save' 	=>0,
              'enquiry_cdt' 	=>now(),
              'payment_cdt'=>now(),
      ]);
      return response()->json(['a']);
    }
    catch (\Throwable $th){
        return response()->json(['b']);
    }

    }
    public function Expert_Profile(Request $request,$id){
       $expert= DB::table('vv_experts')->where('expert_id',$id)->first();
       $T_expert= DB::table('vv_experts')->get();
       $category=DB::table('vv_expert_categories')->orderBy('category_filter_pos_id','asc')->get();
       $states = DB::table('vv_expert_states')->get();
       $cities = DB::table('vv_expert_cities')->get();
       page_viwe(6,$expert->expert_id);
        return view('ui.new-ui.expert-profile',
        ['states' => $states, 'cities' => $cities, 'expert'=>$expert,'category'=>$category,'T_expert'=>$T_expert]);
    }
    public function Expert_enquery(Request $request){
        $ch=DB::table('vv_expert_enquiries')->where('expert_user_id',session('user_id'))->get();
        if(count($ch)>0)
        {
            return response()->json(['2']); 
        }
        try{
        DB::table('vv_expert_enquiries')->insert([
         'expert_id'=>request()->expert_id,
         'expert_user_id'=>request()->expert_user_id,
         'enquiry_sender_id'=>request()->enquiry_sender_id,
         'enquiry_source'=>request()->enquiry_source,
         'enquiry_name'=>request()->enquiry_name,
         'enquiry_email'=>request()->enquiry_email,
         'enquiry_mobile'=>request()->enquiry_mobile,
         'appointment_date'=>request()->enquiry_date,
         'appointment_time'=>request()->enquiry_time,
         'enquiry_message'=>request()->enquiry_message,
         'enquiry_category'=>request()->enquiry_category,
         'enquiry_location'=>request()->enquiry_location,
         'enquiry_status'=>300,
         'payment_status'=>'Pending',
         'enquiry_cdt'=>now()
        ]);
        return response()->json(['1']);
    }
    catch(\Throwable $th)
    {
        return response()->json(['3']);
    }
    }
       // $expert= DB::table('vv_experts')->where('expert_id',$id)->first();
    public function Expert_reviwe(Request $request){
        
        try{
        DB::table('vv_expert_reviews')->insert([
          'expert_id'=>request()->expert_id,
          'expert_user_id'=>request()->expert_user_id,
          'review_user_id'=>request()->review_user_id,
          'enquiry_id'=>0,
          'expert_rating'=>request()->expert_rating,
          'expert_message'=>request()->expert_message,
          'review_status'=>'',
          'review_save'=>0,
          'review_cdt'=>now()
        ]);
        return response()->json('1');
    }
    catch(\Throwable $th){
        return response()->json('2');
    }

    }
    function Listing_Reviwe(Request $request)
    {
        DB::table('vv_reviews')->insert([
	     'listing_id'=>request()->listing_id,
         'listing_user_id'=>request()->listing_user_id,	
         'review_user_id'=>session('user_id'), 	
         'price_rating'=>request()->price_rating,
         'customer_service_rating' =>0,	
         'staff_rating'=>0, 	
         'overall_rating'=>0, 	
         'review_name'=>request()->review_name,	
         'review_mobile'=>request()->review_mobile,
         'review_email'=>request()->review_email, 	
         'review_city'=>request()->review_city,	
         'review_message'=>request()->review_message, 	
         'review_status'=>'Active', 	
         'review_save'=>0, 	
         'review_cdt'=>now()
        ]);
        return redirect()->back()->with('message' , 'Thanks for your Review !! Your Review Is Successful!!');
    }
    function like_listing(Request $request)
    {
        $ch=DB::table('vv_listing_likes')->where('listing_id',request()->listing)->where('user_id',request()->user)->get();
        if(count($ch))
        {
            DB::table('vv_listing_likes')->where('user_id',request()->user)->delete();
            $v=CountCol('vv_listing_likes','listing_id',request()->listing,'listing_id');
            return response()->json(['value'=>$v,'ch'=>2]);
        }
        DB::table('vv_listing_likes')->insert([
           'listing_id'=>request()->listing,
           'listing_user_id'=>request()->status,
           'user_id'=>request()->user,
           'listing_likes_cdt'=>now()
        ]);
        $v=CountCol('vv_listing_likes','listing_id',request()->listing,'listing_id');
        return response()->json(['value'=>$v,'ch'=>1]);
    }
    function Place_request(Request $request)
    {
        DB::table('vv_place_request')->insert([
	      'place_request_sender_id'=>session('user_id'), 	
          'place_name'=>request()-> place_name,	
          'place_image'=>(request()->place_image==null)?'':request()->place_image,
          'place_address'=>request()->place_address, 	
          'place_description'=>request()->place_description, 	
          'enquiry_name'=>request()->enquiry_name, 	
          'enquiry_email'=>request()->enquiry_email, 	
          'enquiry_mobile'=>request()->enquiry_mobile, 	
          'place_request_status'=>request()-> place_request_status,	
          'place_request_cdt'=>now()	
        ]);
        return response()->json($request()->all());
    }
    function Company(Request $request,$id)
    {
        
        $company=DB::table('vv_user_company')->where('user_id',$id)->first();
        page_viwe(12,$company->user_company_id );
        return view('ui.old-ui.company-profile',
        ['company'=>$company]);
    }
    public  function uploadImage($file)
    {
        
       $filename= Str::random().'.'.$file->getClientOriginalExtension();
           $file->move('storage/file/',$filename);
           
          return $filename;
    }
    
    public function UserPlacesIndex() {

        $places = DB::table('vv_places')->where('user_id', session('user_id'))->get();
        $category=DB::table('vv_place_categories')->get();
    
        return view('ui.new-ui.places.index', [
            'places'=>$places,
            'category'=>$category
        ]);
    }
    
    public function UserPlacesCreate() {
        $places=DB::table('vv_places')->get();
        $category=DB::table('vv_place_categories')->get();
        $listing=DB::table('vv_listings')->get();
        $expert=DB::table('vv_experts')->get();
        $news=DB::table('vv_news')->get();
        $event=DB::table('vv_events')->get();

        return view('ui.new-ui.places.create', [
            'category'=>$category,
            'listing'=>$listing,
            'expert'=>$expert,
            'news'=>$news,
            'event'=>$event,
            'places'=>$places,
            'user_id' => session('user_id')
        ]);
    }
    

    public function UserPlacesEdit($id) {
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

        return view('ui.new-ui.places.edit', [
            'place'=>$place,
            'discover'=>$discover,
            'related'=>$related,
            'listingP'=>$listingP,
            'eventP'=>$eventP,
            'expertP'=>$expertP,
            'newsP'=>$newsP,
            'category'=>$category,
            'qu'=>$qu,
            'ans'=>$ans,
            'listing'=>$listing,
            'expert'=>$expert,
            'news'=>$news,
            'event'=>$event,
            'places'=>$places,
            'user_id' => session('user_id')
    ]);
     
    }
    

    public function UserPlacesDelete($id) {
        DB::table('vv_places')->where('place_id', $id)->delete();
      
        return redirect()->back()->with('message' , 'Delete was successful!');
    }
}
