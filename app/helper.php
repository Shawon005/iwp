<?php
function title($name)
{
    $BIZBOOK['Home'] = "India's Biggest Photo Industry Parivar portal";
    
    $BIZBOOK['HOM-BAN-SUB-TIT'] = "find Photographers, Photo Stores, Album Prints and Associations in All India";
    
    $BIZBOOK['experts'] = "Photography Experts India's Exclusive Photo Industry Directory";
    
    $BIZBOOK['job'] = "View all Job openings";
    
    $BIZBOOK['product'] = "All Product Photogtaphy available India's Exclusive Photo Industry Directory";
    
    $BIZBOOK['VIEW_MY_PROFILE_PAGE'] = "View my profile page";
    
    $BIZBOOK['VIEW_BUSINESS_PAGE'] = "View business page";
    
    $BIZBOOK['VIEW_JOB_PROFILE_PAGE'] = "View Job Profile page";
    
    $BIZBOOK['VIEW_SERVICE_EXPERT_PROFILE_PAGE'] = "View Expert Profile page";
    
    return $BIZBOOK[$name];
}

function dateFormatconverter($date)
{
  if($date==null)
  {
    return '';
  }
    $phpdate = strtotime($date);
    return date("d, M Y", $phpdate);
}
function timeFormatconverter($date)
{
    $phpdate = strtotime($date);
    return date("h:m:s", $phpdate);
}
function CountCol($table,$col,$id)
{
   $count= DB::table($table)->WHERE($col,$id)->count($col);
   return $count;
}
function CountC($table,$col)
{
   $count= DB::table($table)->count($col);
   return $count;
}

function unique($table,$col,$val,$id,$id1)
{
    $uni=DB::table($table)->WHERE($col,$val)->count($col);
    $uni2=DB::table($table)->WHERE($id,$id1)->first();

    if($uni2->$col==$val){
      return $uni-1;
    }
    else
      return $uni;
}
function removeSpace($var)
{
    return str_replace(' ', '_', $var);
}
function Code($table,$col,$col_id,$id,$str)
{
  $id1=sprintf("%03d", $id);
  $code=$str. $id1;
  DB::table($table)->where($col_id,$id)->update([
    $col=>$code,
]);
}
function user($id)
{
  $user=DB::table('vv_users')->where('user_id',$id)->first();
  if($user==null)
     return '';
  else  
    return $user->first_name;
}
function name($table,$id)
{
  $name=DB::table($table)->where('category_id',$id)->first();
  if($name==null)
  return '';
else  
 return $name->category_name;
}

function Nam($table,$col,$id,$col1)
{
  $name=DB::table($table)->where($col,$id)->first();
  if($name==null)
  return '';
else  
 return $name->$col1;
}
function sub($table,$col,$id)
{
  $name=DB::table($table)->where($col,$id)->get();
  if($name==null)
  return '';
else  
 return $name;
}
function First($table,$col,$id)
{
  $name=DB::table($table)->where($col,$id)->first();
  if($name==null)
  return '';
else  
 return $name;
}
function listing()
{
  $name=DB::table('vv_listings')->where('category_id',16)->first();
  return $name;
}
function amount($id)
{
  $amount=0;
  $users=DB::table('vv_order_lineitems')->where('order_id',$id)->get();
    foreach($users as $user) 
    {
      $amount=$amount+$user->product_price;
    }
    return $amount;
}
function Plan_amount($id)
{
  if($id!=0){
  $amount=DB::table('vv_plan_type')->where('plan_type_id',$id)->first();

    return $amount->plan_type_price;
  }
  else{
    return '0';
  }
}
function blance($id)
{
  $ads=DB::table('vv_wallet_transaction')->where('sub_admin_id',$id)->get();
      if($ads!=null){
        $bal=0;
        $bal_w=0;
        foreach($ads as $ad){
          $bal=$bal+($ad->commission_amount+0);
          if($ad->payment_status=='sent')
          {
            $bal_w=$bal_w+($ad->withdraw_amount+0);
          }
          
          }
          $bal=$bal-$bal_w;
        }
      else{
        $bal=0;
        
      }
      return $bal;
}
function arr($str)
{
 
  $sub=explode(',',$str);
  return $sub;
  
 

}
function diff($d1,$d2)
{
  $diff=strtotime($d2)-strtotime($d1);
  $diff=$diff/86400;
  return $diff;
}
function footer()
{
  $footer=DB::table('vv_footer')->first();
  return $footer;
}
function table($table)
{
  $tab=DB::table($table)->get();
  return $tab;
}
function Sum()
{
  $sum=0;
  $ta=DB::table('vv_jobs')->get();
   foreach($ta as $table)
   {
    $sum=$sum+$table->no_of_openings;
   }
 return $sum;
}
function job($id)
{
 if($id==1)
  return "Premanent";
if($id==2)
 return "Contract";
if($id==3)
 return "Part Time";  
if($id==4)
 return "Freelance";  
}
function dateSum($d1,$d2)
{
  $d2=(int)$d2;
  $d1=strtotime($d1);
  $d2=$d2*30*24*60*60;
  $da=$d1+$d2;
  return date("d, M Y", $da);
}
function Ads($id)
{
  $user=DB::table('vv_all_ads_enquiry')->where('all_ads_price_id',$id)->where('ad_enquiry_status','Active')->where('ad_start_date','<=',now())->where('ad_end_date','>=',now())->get();
  return $user;
}
function logic2($table,$col1,$id1,$col2,$id2)
{
  $name=DB::table($table)->where($col1,$id1)->where($col2,$id2)->get();
  if($name==null)
  return '';
else  
 return $name;
}
function page_viwe($poi, $id)
{
  $page=array(0,0,0,0,0,0,0,0,0,0,0,0,0);
   $page[$poi]=$id;
   DB::table('vv_page_views')->insert([
     'listing_id'=>$page[0],
     'event_id'=>$page[1],
     'blog_id'=>$page[2],
     'product_id'=>$page[3],
     'job_id'=>$page[4],
     'job_profile_id'=>$page[5],
     'expert_id'=>$page[6],
     'news_id'=>$page[7],
     'place_id'=>$page[8],
     'page_id'=>$page[9],
     'coupon_id'=>$page[10],
     'category_id'=>$page[11],
     'user_business_id'=>$page[12],
     'user_ip'=>$_SERVER['REMOTE_ADDR'],
     'page_view_cdt'=>now()
   ]);
}
function percents($arg)
{
  $sql = DB::select("select ( case category_seo_title when '' then 0 else 1 end +
      case category_seo_description when '' then 0 else 1 end +
      case category_seo_keywords when '' then 0 else 1 end +
      case category_faq_1_ques when '' then 0 else 1 end +
      case category_faq_1_ans when '' then 0 else 1 end +
      case category_faq_2_ques when '' then 0 else 1 end +
      case category_faq_2_ans when '' then 0 else 1 end +
      case category_faq_3_ques when '' then 0 else 1 end +
      case category_faq_3_ans when '' then 0 else 1 end +
      case category_faq_4_ques when '' then 0 else 1 end +
      case category_faq_4_ans when '' then 0 else 1 end +
      case category_faq_5_ques when '' then 0 else 1 end +
      case category_faq_5_ans when '' then 0 else 1 end +
      case category_faq_6_ques when '' then 0 else 1 end +
      case category_faq_6_ans when '' then 0 else 1 end +
      case category_faq_7_ques when '' then 0 else 1 end +
      case category_faq_7_ans when '' then 0 else 1 end +
      case category_faq_8_ques when '' then 0 else 1 end +
      case category_faq_8_ans when '' then 0 else 1 end +
      case category_google_schema when '' then 0 else 1 end ) 
      * 100 / 20 as complete FROM vv_categories WHERE category_id = $arg");
 $value=$sql[0]->complete;

  return (int)$value;
}
function seo_sceor($table,$col,$arg)
{
  $sql=DB::select("select ( case seo_title when '' then 0 else 1 end +
  case seo_description when '' then 0 else 1 end +
  case seo_keywords when '' then 0 else 1 end ) 
  * 100 / 3 as complete FROM  $table WHERE $col = $arg");

  $value=$sql[0]->complete;
  return (int)$value;
}

function chart($table,$amount,$cdt)
{
   $value=DB::select("SELECT SUM($amount) AS total FROM $table WHERE $cdt 
  BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
  return $value[0]->total;
}
function chart_total($table,$amount)
{
   $value=DB::select("SELECT SUM($amount) AS total FROM $table");
  return $value[0]->total;
}
function last_mouth($table,$col) {
    $dates = [];
    $total1 = [];
    $date1 = [];
    $user=DB::select("SELECT $col as count FROM $table WHERE $col 

    BETWEEN NOW() - INTERVAL 50 DAY AND NOW()");

    for ($i = 0; $i < 50; $i++) {
        $dates[$i] = 0;
    }

    //dd($user);
    foreach($user as $ud) {
        $u=$ud->count;
        
        $us=date("d", strtotime($u));
        $us=(int)$us;
        
        $dates[$us]=$dates[$us]+1;
    }
    return $dates;
}
function last_mouth_t()
{
  $dates = [];
  $total1 = [];
  $date1 = [];
  $user=DB::select("SELECT transaction_amount,transaction_cdt  FROM vv_transactions WHERE transaction_cdt BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");

  for ($i = 0; $i < 30; $i++) {
    $dates[$i] = 0;
  }
  //dd($user);
 foreach($user as $ud)
{
 $u=$ud->transaction_cdt;
 
 $us=date("d", strtotime($u));
 $us=(int)$us;
 
 $dates[$us]=(int)$ud->transaction_amount;

  
}
return $dates;
}

function date_last()
{

  $date1 = [];
  $d = new DateTime();
    for ($i = 0; $i < 30; $i++) {

        $date = $d->format('d/m/Y');
        $date = $d->format('j');
        $date1[] = $date;
        $d->modify('-1 day');

    }
    $date_result = implode(",", array_reverse($date1));
    return $date_result;
}

function user_amount()
{
  $ads=DB::table('vv_wallet_affiliate_transaction')->where('ref_user_id',session('user_id'))->get();
      if($ads!=null){
        $bal=0;
        $bal_w=0;
        foreach($ads as $ad){
          $bal=$bal+($ad->commission_amount+0);
          if($ad->payment_status=='sent')
          {
            $bal_w=$bal_w+($ad->withdraw_amount+0);
          }
          
          }
          $bal=$bal-$bal_w; 
    }
      else{
        $bal=0;
      }
    return $bal;  
}
function shipping($id)
{
  $ship=DB::table('vv_shipping')->where('city_id',$id)->first();
  if($ship != null){
  return $ship->shipping_price;
  }
  else{
    return 0;
  }
}


