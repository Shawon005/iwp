<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\URL;
use Auth;
use Redirect;
class UserViewController extends Controller
{
    public function Dashboard(Request $request)
    {
        return view('ui.old-ui.dashboard');
    } 
    public function Logout(Request $request)
    {
      session(['user_C'=>'false']);
      session(['user_id' =>'0']);
      //dd(session('user_C'));
      return redirect()->route('index');
    }
    public function Show(Request $request)
    {
      $state=DB::table('vv_states')->get();
      $city=DB::table('vv_cities')->get();
      $country=DB::table('vv_countries')->get();
      $plan=DB::table('vv_plan_type')->get();
      return view('ui.new-ui.iwp-register',
      ['state'=>$state,'city'=>$city,'country'=>$country,'plan'=>$plan]);
    }
    public function Register(Request $request)
    {
      $request->validate([ 
        'first_name'=>'required',
        'email_id'=>'required|unique:vv_users,email_id',
        'password'=>'required',
        'user_type'=>'required',
        'mobile_number'=>'required|unique:vv_users,mobile_number',
        'state'=>'required','city'=>'required',
    ]);
       if(request()->user_plan!=null){
       $point=Nam('vv_plan_type','plan_type_id',request()->user_plan,'plan_type_points');
       }
       else{
        $point=0;
       }
    // dd($request->all());
        $ch=DB::table('vv_users')->orderBy('user_id', 'desc')->first();
        $id=$ch->user_id;
        
        try{
          DB::table('vv_users')->where('user_id',$id)->update([
          // dd(request()->all()),'first_name'=>request()->first_name,
                'first_name'=>request()->first_name,
                'email_id'=>request()->email_id,
                'password'=>request()->password,
                'mobile_number'=> request()->mobile_number,
                'user_type'=>request()->user_type,
                'user_plan' =>(request()->user_plan==null)?1:request()->user_plan,
                'user_city'=>request()->city,
                'user_country'=>105,
                'user_state'=>request()->state,
                'register_mode'=>'Direct',
                'user_status'=>'Active',
                'payment_status'=>((request()->user_type=='General')?'Paid':((request()->user_plan=='1')?'Paid':'unpaid')),
                'user_slug'=>Str::of(request()->first_name)->slug('-'),
                'user_points'=>$point,
                'verification_code'=>'',
                'verification_status'=>1,
                'user_cdt' =>now()
                
            ]);
            code('vv_users','user_code','user_id',$id,'USER');
            
            DB::table('vv_job_profile')->insert([
                'user_id'=>$id,
                'profile_name'=>user($id),
                'job_profile_image'=>Nam('vv_footer','footer_id',1,'user_default_image'),
            ]);
           
            $user_type=request()->user_type;
            
           $plan_type_id=request()->user_plan;
          
            if ($user_type == "Service provider") {
              if($plan_type_id==1){

                    $trader_plan_commision_package = 'p1_amount';

                // Channel Partner
                
                $sub_admin_type = 1; $cid = 105; $sid = request()->state; $ctid = request()->city;
                
                $rs_sql_sub_admin=DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='0' AND `admin_sub_admin_type`='$sub_admin_type'");
                if($rs_sql_sub_admin!=null){
                $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
                
                $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
               
                if ($cp_admin_id !=0) {
                  if ($cp_amount_trader !=0) {
                    
                   
                    $ID=DB::table('vv_wallet_transaction')->insertGetId([
                   
                          'wallet_transaction_code' => '', 
                          'invoice_no' => '',
                          'user_id' => $id,
                          'sub_admin_id' => $cp_admin_id,
                          
                          'payment_type_id' => 0,
                          'payment_type'=>'',
                          'commission_amount' => $cp_amount_trader,
                          'withdraw_amount' => 0,
                          'currency' => 'INR',
                          'remarks'	=>'',
                          'plan_type_id' => request()->user_plan,
                          'plan_type_price' =>Nam('vv_plan_type','plan_type_id',request()->user_plan,'plan_type_price'),
                          'remarks' => '',
                          'payment_status' => 'registration',
                          'request_date'=>now(),
                          'bank_id' => 0,
                          'bank_name'	=>'',
                          'branch_id' => 0,
                          'ref_no' => '',
                          'created_at'=>now()
                          
                          ]);
                          
                          code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                          code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
                  }
                }
               }
                
                //National Core Team 
                $sub_admin_type = 2; $cid = 105; $sid = request()->state; $ctid = request()->city;
                $rs_sql_sub_admin  =DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='0' AND `admin_sub_admin_type`='$sub_admin_type'");
                if($rs_sql_sub_admin!=null){
                $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
                $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
                if ($cp_admin_id !=0) {
                  if ($cp_amount_trader !=0) {
                   
                      $ID=DB::table('vv_wallet_transaction')->insertGetId([
                        'wallet_transaction_code' => '', 
                        'invoice_no' => '',
                        'user_id' => $id,
                        'sub_admin_id' => $cp_admin_id,
                        'payment_type_id' => 0,
                        'payment_type'=>'',
                        'commission_amount' => $cp_amount_trader,
                        'withdraw_amount' => 0,
                        'currency' => 'INR',
                        'remarks'	=>'',
                        'plan_type_id' => request()->user_plan,
                        'plan_type_price' =>Nam('vv_plan_type','plan_type_id',request()->user_plan,'plan_type_price'),
                        'remarks' => '',
                        'payment_status' => 'registration',
                        'request_date'=>now(),
                        'bank_id' => 0,
                        'bank_name'	=>'',
                        'branch_id' => 0,
                        'ref_no' => '',
                        'created_at'=>now()
                            ]);
                            code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                            code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
                    }
                  }
                }
                // iii.	Mentor
                $sub_admin_type = 3; $cid = 105; $sid = request()->state; $ctid = request()->city;
                $rs_sql_sub_admin  =DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='0' AND `admin_sub_admin_type`='$sub_admin_type'");
                if($rs_sql_sub_admin!=null){
                $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
                $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
                if ($cp_admin_id !=0) {
                  if ($cp_amount_trader !=0) {
                    
                    $ID=DB::table('vv_wallet_transaction')->insertGetId([
                      'wallet_transaction_code' => '', 
                      'invoice_no' => '',
                      'user_id' => $id,
                      'sub_admin_id' => $cp_admin_id,
                      'payment_type_id' => 0,
                      'payment_type'=>'',
                      'commission_amount' => $cp_amount_trader,
                      'withdraw_amount' => 0,
                      'currency' => 'INR',
                      'remarks'	=>'',
                      'plan_type_id' => request()->user_plan,
                      'plan_type_price' =>Nam('vv_plan_type','plan_type_id',request()->user_plan,'plan_type_price'),
                      'remarks' => '',
                      'payment_status' => 'registration',
                      'request_date'=>now(),
                      'bank_id' => 0,
                      'bank_name'	=>'',
                      'branch_id' => 0,
                      'ref_no' => '',
                      'created_at'=>now()
                          ]);
                          code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                          code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
                  }
                  }
                }
                // Reporter
                $sub_admin_type = 6; $cid = 105; $sid = request()->state; $ctid = request()->city;
                $rs_sql_sub_admin  =DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='$ctid' AND `admin_sub_admin_type`='$sub_admin_type'");
                if($rs_sql_sub_admin!=null){
                $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
                $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
                if ($cp_admin_id !=0) {
                  if ($cp_amount_trader !=0) {
                    
                    $ID=DB::table('vv_wallet_transaction')->insertGetId([
                      'wallet_transaction_code' => '', 
                      'invoice_no' => '',
                      'user_id' => $id,
                      'sub_admin_id' => $cp_admin_id,
                      'payment_type_id' => 0,
                      'payment_type'=>'',
                      'commission_amount' => $cp_amount_trader,
                      'withdraw_amount' => 0,
                      'currency' => 'INR',
                      'remarks'	=>'',
                      'plan_type_id' => request()->user_plan,
                      'plan_type_price' =>Nam('vv_plan_type','plan_type_id',request()->user_plan,'plan_type_price'),
                      'remarks' => '',
                      'payment_status' => 'registration',
                      'request_date'=>now(),
                      'bank_id' => 0,
                      'bank_name'	=>'',
                      'branch_id' => 0,
                      'ref_no' => '',
                      'created_at'=>now()
                          ]);
                          code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                          code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
                  }
                  }
                }
                // new sub admin
                $sub_admin_type = 4; $cid = 105; $sid = $user_table->user_state; $ctid = $user_table->user_city;
                $rs_sql_sub_admin=DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='$ctid' AND `admin_sub_admin_type`='$sub_admin_type'");
                if($rs_sql_sub_admin!=null){
                $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
                
                $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
                
                if ($cp_admin_id !=null) {
                  if ($cp_amount_trader !=null) {
                    
                  //  dd($cp_admin_id);
                    $ID=DB::table('vv_wallet_transaction')->insertGetId([
                    
                          'wallet_transaction_code' => '', 
                          'invoice_no' => '',
                          'user_id' => $id,
                          'sub_admin_id' => $cp_admin_id,
                          
                          'payment_type_id' => 0,
                          'payment_type'=>'Razor Pay',
                          'commission_amount' => $cp_amount_trader,
                          'withdraw_amount' => 0,
                          'currency'=> 'INR',
                          'remarks'=>'',
                          'plan_type_id' => $user_table->user_plan,
                          'plan_type_price' =>Nam('vv_plan_type','plan_type_id',$user_table->user_plan,'plan_type_price'),
                          'remarks' => '',
                          'payment_status' => 'registration',
                          'request_date'=>now(),
                          'bank_id' => 0,
                          'bank_name'	=>'',
                          'branch_id' => 0,
                          'ref_no' => '',
                          'created_at'=>now()
                          
                          ]);
                          
                          code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                          code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
                  }
                }
              }
                return redirect()->route('ui_login')->with('message_S' , 'Register was successful!');
              }
              else{
                return redirect()->route('payment_R',['id'=>request()->user_plan,'user'=>$id]);
              }
            }
            else{
              return redirect()->route('ui_login')->with('message_S' , 'Register was successful!');
            }
     //            $request->session()->flash('message' , 'Task was successful!');
            //return redirect()->route('user_panel.input')->with('message' , 'Store was successful!');
        }
        catch (\Throwable $th) {
          dd("not");
          //  return redirect()->back()->withInput()->withErrors($e->getMessage());
     //            dd($e->getMessage());
        }
    }
    public function Payment(Request $request,$id,$user)
    {
      return view('ui.new-ui.payment',
      ['id'=>$id,'user_id'=>$user]);
    }
     
    public function Payment_Store(Request $request,$id)
    {
      $input = $request->all();        
      //dd($request->all());
      $api = new Api(Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id'),Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id_secret'));
      $payment = $api->payment->fetch($input['razorpay_payment_id']);

      if(count($input)  && !empty($input['razorpay_payment_id'])) 
      {
          try 
          {
              $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

          } 
          catch (\Exception $e) 
          {
              return  $e->getMessage();
              \Session::put('error',$e->getMessage());
              return redirect()->back();
          }            
      }
      
      DB::table('vv_users')->where('user_id',$id)->update([
        'payment_status'=>'Paid'
      ]);
      $ex=DB::table('vv_experts')->insertGetId([                
        'user_id'=>$id,
        'profile_name'=>user($id),
        'state_id'=>0,
        'user_plan'=>4,
        'expert_availability_status'=>0,
        'seo_title'=>'',
        'seo_description'=>'',
        'seo_keywords'=>'',
        'profile_image'=>Nam('vv_footer','footer_id',1,'user_default_image'),
      ]);
      code('vv_experts','expert_code','expert_id',$ex,'EXPERT-SERVICE');
      DB::table('vv_user_company')->insert([ 
        'user_id'=>$id,
        "company_name" => '',
        "company_address" =>'',
        "company_mobile" =>'',
        "company_email_id" =>'',
        "company_website" => '',
        "company_tax" => '',
        "company_facebook" =>'',
        "company_twitter" =>'',
        "company_linkedin" => '',
        "company_instagram" => '',
        "company_youtube" => '',
        "company_whatsapp" =>'',
        "company_description" =>'',
        "company_seo_description" =>'',
        "company_seo_keywords" =>'',
        "company_profile_photo"  =>Nam('vv_footer','footer_id',1,'user_default_image'),
        "company_banner_photo"  =>'',
        "company_header_photo" =>'',
        'company_listings'=>'',
        'company_products'=>'',
        'company_blogs'=>'',
        'company_events'=>'',
        'company_slug'=>'',
        'company_status'=>'',
        'company_cdt'=>now()
      ]);
      $user_table=DB::table('vv_users')->where('user_id',$id)->first();
      
      $user_type=$user_table->user_type;
            
      $plan_type_id=$user_table->user_plan;
     

             if ($plan_type_id == 1) {
               $trader_plan_commision_package = 'p1_amount';
             } 
             else if ($plan_type_id == 2) {
               $trader_plan_commision_package = 'p2_amount';
             }
             else if ($plan_type_id == 3) {
               $trader_plan_commision_package = 'p3_amount';
             }
             else if ($plan_type_id == 4) {
               $trader_plan_commision_package = 'p4_amount';
               
             
             }
             //
           // Channel Partner
           
           $sub_admin_type = 1; $cid = 105; $sid = $user_table->user_state; $ctid = $user_table->user_city;
           $rs_sql_sub_admin=DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='0' AND `admin_sub_admin_type`='$sub_admin_type'");
           if($rs_sql_sub_admin!=null){
           $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
           
           $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
          
           if ($cp_admin_id !=null) {
             if ($cp_amount_trader !=null) {
               
            //  dd($cp_admin_id);
               $ID=DB::table('vv_wallet_transaction')->insertGetId([
              
                     'wallet_transaction_code' => '', 
                     'invoice_no' => '',
                     'user_id' => $id,
                     'sub_admin_id' => $cp_admin_id,
                     
                     'payment_type_id' => 0,
                     'payment_type'=>'Razor Pay',
                     'commission_amount' => $cp_amount_trader,
                     'withdraw_amount' => 0,
                     'currency'=> 'INR',
                     'remarks'=>'',
                     'plan_type_id' => $user_table->user_plan,
                     'plan_type_price' =>Nam('vv_plan_type','plan_type_id',$user_table->user_plan,'plan_type_price'),
                     'remarks' => '',
                     'payment_status' => 'registration',
                     'request_date'=>now(),
                     'bank_id' => 0,
                     'bank_name'	=>'',
                     'branch_id' => 0,
                     'ref_no' => '',
                     'created_at'=>now()
                     
                     ]);
                     
                     code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                     code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
             }
           }
         }
           
           // Brand Ambassador
           $sub_admin_type = 2; 
           $rs_sql_sub_admin  =DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='0' AND `admin_sub_admin_type`='$sub_admin_type'");
           if($rs_sql_sub_admin!=null){
           $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
           $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
           if ($cp_admin_id !=0) {
             if ($cp_amount_trader !=0) {
              
                 $ID=DB::table('vv_wallet_transaction')->insertGetId([
                   'wallet_transaction_code' => '', 
                   'invoice_no' => '',
                   'user_id' => $id,
                   'sub_admin_id' => $cp_admin_id,
                   'payment_type_id' => 0,
                   'payment_type'=>'Razor Pay',
                   'commission_amount' => $cp_amount_trader,
                   'withdraw_amount' => 0,
                   'currency' => 'INR',
                   'remarks'	=>'',
                   'plan_type_id' => $user_table->user_plan,
                   'plan_type_price' =>Nam('vv_plan_type','plan_type_id',$user_table->user_plan,'plan_type_price'),
                   'remarks' => '',
                   'payment_status' => 'registration',
                   'request_date'=>now(),
                   'bank_id' => 0,
                   'bank_name'	=>'',
                   'branch_id' => 0,
                   'ref_no' => '',
                   'created_at'=>now()
                       ]);
                       code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                       code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
               }
             }
           }
           // Influencer
           $sub_admin_type = 3; 
           $rs_sql_sub_admin  =DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='0' AND `admin_sub_admin_type`='$sub_admin_type'");
          
           if($rs_sql_sub_admin!=null){
           $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
           $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
           if ($cp_admin_id !=0) {
             if ($cp_amount_trader !=0) {
               
               $ID=DB::table('vv_wallet_transaction')->insertGetId([
                 'wallet_transaction_code' => '', 
                 'invoice_no' => '',
                 'user_id' => $id,
                 'sub_admin_id' => $cp_admin_id,
                 'payment_type_id' => 0,
                 'payment_type'=>'Razor Pay',
                 'commission_amount' => $cp_amount_trader,
                 'withdraw_amount' => 0,
                 'currency' => 'INR',
                 'remarks'	=>'',
                 'plan_type_id' => $user_table->user_plan,
                 'plan_type_price' =>Nam('vv_plan_type','plan_type_id',$user_table->user_plan,'plan_type_price'),
                 'remarks' => '',
                 'payment_status' => 'registration',
                 'request_date'=>now(),
                 'bank_id' => 0,
                 'bank_name'	=>'',
                 'branch_id' => 0,
                 'ref_no' => '',
                 'created_at'=>now()
                     ]);
                     code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                     code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
             }
             }
           }
           // Reporter
           $sub_admin_type = 6; 
           $rs_sql_sub_admin  =DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='$ctid' AND `admin_sub_admin_type`='$sub_admin_type'");
           if($rs_sql_sub_admin!=null){
           $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
           $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
           if ($cp_admin_id !=0) {
             if ($cp_amount_trader !=0) {
               
               $ID=DB::table('vv_wallet_transaction')->insertGetId([
                 'wallet_transaction_code' => '', 
                 'invoice_no' => '',
                 'user_id' => $id,
                 'sub_admin_id' => $cp_admin_id,
                 'payment_type_id' => 0,
                 'payment_type'=>'Razor Pay',
                 'commission_amount' => $cp_amount_trader,
                 'withdraw_amount' => 0,
                 'currency' => 'INR',
                 'remarks'	=>'',
                 'plan_type_id' => $user_table->user_plan,
                 'plan_type_price' =>Nam('vv_plan_type','plan_type_id',$user_table->user_plan,'plan_type_price'),
                 'remarks' => '',
                 'payment_status' => 'registration',
                 'request_date'=>now(),
                 'bank_id' => 0,
                 'bank_name'	=>'',
                 'branch_id' => 0,
                 'ref_no' => '',
                 'created_at'=>now()
                     ]);
                     code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                     code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
             }
             }
           }
           // new sub admin
           $sub_admin_type = 4; $cid = 105; $sid = $user_table->user_state; $ctid = $user_table->user_city;
           $rs_sql_sub_admin=DB::select("SELECT *, (SELECT $trader_plan_commision_package FROM vv_sub_admin_type WHERE sub_admin_type_id = '$sub_admin_type') amount_trader FROM vv_admin WHERE `country_id`='$cid' AND `state_id`='$sid' AND `city_id`='$ctid' AND `admin_sub_admin_type`='$sub_admin_type'");
           if($rs_sql_sub_admin!=null){
           $cp_admin_id=$rs_sql_sub_admin[0]->admin_id;
           
           $cp_amount_trader = $rs_sql_sub_admin[0]->amount_trader;
           
           if ($cp_admin_id !=null) {
             if ($cp_amount_trader !=null) {
               
             //  dd($cp_admin_id);
               $ID=DB::table('vv_wallet_transaction')->insertGetId([
               
                     'wallet_transaction_code' => '', 
                     'invoice_no' => '',
                     'user_id' => $id,
                     'sub_admin_id' => $cp_admin_id,
                     
                     'payment_type_id' => 0,
                     'payment_type'=>'Razor Pay',
                     'commission_amount' => $cp_amount_trader,
                     'withdraw_amount' => 0,
                     'currency'=> 'INR',
                     'remarks'=>'',
                     'plan_type_id' => $user_table->user_plan,
                     'plan_type_price' =>Nam('vv_plan_type','plan_type_id',$user_table->user_plan,'plan_type_price'),
                     'remarks' => '',
                     'payment_status' => 'registration',
                     'request_date'=>now(),
                     'bank_id' => 0,
                     'bank_name'	=>'',
                     'branch_id' => 0,
                     'ref_no' => '',
                     'created_at'=>now()
                     
                     ]);
                     
                     code('vv_wallet_transaction','wallet_transaction_code','wallet_transaction_id',$ID,'TRAN');
                     code('vv_wallet_transaction','invoice_no','wallet_transaction_id',$ID,'INV');    
             }
           }
         }
         
           //dd($rs_sql_sub_admin);
       return redirect()->route('ui_login')->with('message_S' , 'Payment was successful!');
      
    }
    public function Forget(Request $request)
    {
      $email=request()->email_id;
      $user=DB::table('vv_users')->where('email_id',$email)->first();
      if($user==null)
      {
        return redirect()->route('ui_login')->with('message' , 'Your Email Is Not Registerd');
      }
      $doman=URL::to('/');
      $url=$doman.'/'.'login';
      $data['url']=$url;
      $data['title']="Fototech India Magazine & Portal -Forget Password";
      $data['email']=$email;
      $data['body']="Please Click here to verify Your email";
      $data['user_email']=$user->email_id;
      $data['password']=$user->password;
      Mail::send('forget_mail', ['data'=>$data], function($message) use ($data) {
         $message->to($data['email'])->subject
            ($data['title']);
        });
      return redirect()->route('ui_login')->with('message_S' , 'Password Sent In Your Email');
    }
}
