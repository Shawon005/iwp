<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;
use Cart;
class AddToCartController extends Controller
{

    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('ui.new-ui.iwp-add-to-cart', compact('cartItems'));
    }


    public function addToCart(Request $request,$id)
    {
       $product=DB::table('vv_products')->where('product_id',$id)->first();

       \Cart::add([
            'id'=> $product->product_id,
            'name' => $product->product_name,
            'weight' => 550,
            'qty' => 1,
            'options' => ['size' => 'large'],
            'price' => $product->product_price,
            // 'O_price'=>$product->product_price_offer,
            // 'wallet' => $product->wallet_cashback,
            // 'discount'=>($product->product_price_offer-$product->wallet_cashback),
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        $cartItems = \Cart::getcontent();
        return view('ui.new-ui.iwp-add-to-cart', compact('cartItems'));
    }
    public function addToCarts(Request $request,$id,$ref)
    {
       $product=DB::table('vv_products')->where('product_id',$id)->first();

       \Cart::add([
            'id'=> $product->product_id,
            'name' => $product->product_name,
            'weight' => 550,
            'qty' => 1,
            'options' => ['size' => 'large'],
            'price' => $product->product_price,
            // 'O_price'=>$product->product_price_offer,
            // 'wallet' => $product->wallet_cashback,
            // 'discount'=>($product->product_price_offer-$product->wallet_cashback),
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        $cartItems = \Cart::getcontent();
        return view('ui.new-ui.iwp-add-to-cart', [
            'cartItems'=>$cartItems,'ref'=>$ref ]);
    }

    public function removeCart(Request $request,$id)
    {
        //dd(Cart::Content());
        //\Cart::clear();
        //dd($id);
        //Cart::destroy();
        \Cart::remove($id);
        // \Cart::remove($id);
       

        return redirect()->back();
    }

    public function Payment(Request $request)
    {
        $input = $request->all();        
        
        $api = new Api(Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id'), Nam('vv_footer','footer_id',1,'admin_razor_pay_key_id_secret'));
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
        $cartItems=request()->cart;
    // dd($cartItems);
  
   
    $id=DB::table('vv_orders')->insertGetId([
        'order_number'=>'',
        'order_status'=>'paid',
        'dispatch_status'=>'Pending',
        'order_approve_status'=>'Pending',
        'shipping_info'=>'Pending',
        'user_id'=>request()->razor_pay_dash_user_id,
        'order_amount'=>request()->total,
        'created_date'=>now()
    ]);
  code('vv_orders','order_number','order_id',$id,'O-000');
  if(request()->razor_same_shipping=='true'){
      DB::table('vv_order_address')->insert([
        'order_id'=>$id, 	
        'address_type'=>'shipping',	
        'addressline'=>request()->user_address,
        'city'=>request()->user_city,
        'state'=>request()->user_address ,	
        'country'=>request()->user_country, 	
        'pincode'=>(request()->user_zip_code==null)?0:request()->user_zip_code, 	
        'contact_person'=>request()->user_contact_name, 	
        'contact_phoneno'=>request()->user_contact_mobile, 	
        'contact_email'=>request()->user_contact_email, 	
        'shipping_user_name'=>request()->user_name, 	
        'shipping_user_country'=>request()->user_country, 	
        'shipping_user_state'=>request()-> 	user_address,
        'shipping_user_city'=>request()->user_city, 	
        'shipping_user_address'=>request()-> user_address,	
        'shipping_user_zip_code'=>(request()->user_zip_code==null)?0:request()->user_zip_code,	
        'shipping_user_contact_name'=>request()->user_contact_name, 	
        'shipping_user_contact_mobile'=>request()->user_contact_mobile, 	
        'shipping_user_contact_email'=>request()->user_contact_email, 	
        'created_date'=>now(),
      ]);
    }
    else{
        DB::table('vv_order_address')->insert([
        'order_id'=>$id, 	
        'address_type'=>'shipping',	
        'addressline'=>request()->user_address,
        'city'=>request()->user_city,
        'state'=>request()->user_address ,	
        'country'=>request()->user_country, 	
        'pincode'=>request()->user_zip_code, 	
        'contact_person'=>request()->user_contact_name, 	
        'contact_phoneno'=>request()->user_contact_mobile, 	
        'contact_email'=>request()->user_contact_email, 	
        'shipping_user_name'=>request()->shipping_user_name, 	
        'shipping_user_country'=>request()->shipping_user_country, 	
        'shipping_user_state'=>request()-> 	shipping_user_state,
        'shipping_user_city'=>request()->shipping_user_city, 	
        'shipping_user_address'=>request()-> shipping_user_address,	
        'shipping_user_zip_code'=>request()->shipping_user_zip_code, 	
        'shipping_user_contact_name'=>request()->shipping_user_contact_name, 	
        'shipping_user_contact_mobile'=>request()->shipping_user_contact_mobile, 	
        'shipping_user_contact_email'=>request()->shipping_user_contact_email, 	
        'created_date'=>now(),
    ]);
    }
   
    $ckk=request()->ref;
   
    $user=DB::table('vv_users')->where('user_id',session('user_id'))->first();
    foreach($cartItems as $item){
    $product=DB::table('vv_products')->where('product_id',$item)->first();
    $ref=0;
    $affilate_ref_amount=0;
    if($ckk!='null'){
        $ref=$ckk;
        if ($product->affiliation_amount_type == "fixed") {
            $affilate_ref_amount = $product->affiliation_amount;
        } else {
            $affilate_ref_amount = ($product->affiliation_amount * $product->product_price_offer) / 100;
        }
        
        
    }
   $item_id= DB::table('vv_order_lineitems')->insertGetId([
        'order_id'=>$id,
        'product_id'=>$item,
        'product_price'=>$product->product_price,
        'product_price_offer'=>$product->product_price_offer,
        'discount_type'=>$product->discount_type,
        'discount_val'=>$product->discount_val,
        'wallet_cashback'=>$product->wallet_cashback,
        'quantity'=>1,
        'affilate_ref_id'=>0,
        'affilate_ref_amount'=>$affilate_ref_amount,
        'created_date'=>now()
    ]);
    
    if($ckk!='null'){
        $A_ID=DB::table('vv_wallet_affiliate_transaction')->insertGetId([
            'wallet_transaction_code' => '', 
            'invoice_no' => '',
            'order_code'=>'O-000'.$id,
            'order_lineitem_id' =>$item,
            'user_id' => session('user_id'),
            'ref_user_id' =>$ref,
            'payment_type_id' => 0,
            'commission_amount' => $affilate_ref_amount,
            'withdraw_amount' => 0,
            'currency' => 'INR',
            'remarks' => '',
            'payment_status' =>'product-affiliation',
            'bank_id' => 0,
            'branch_id' => 0,
            'ref_no' => '',
            'payment_type'=>'Razor Pay',
            'request_date'=>now(),
            'approved_date'=>now(),
            'sent_date'=>now(),
            'reject_date'=>now(),
            'bank_id'=>0,
            'bank_name'=>0,
            'branch_id'=>0,
            'ref_no'=>0,
            'cheque_no'=>0,
            'cheque_date'=>now(),
            'created_at'=>now(),
           ]);
         
           code('vv_wallet_affiliate_transaction','wallet_transaction_code','wallet_transaction_id',$A_ID,'TRAN');
           code('vv_wallet_affiliate_transaction','invoice_no','wallet_transaction_id',$A_ID,'ORD');
        }
        $dis_t=$product->discount_type;
        if($dis_t=='coins')
        {
         $P_val=$product->discount_val;
        }
        else{
            $P_val=($product->product_price*$product->discount_val)/100;
        }
    DB::table('vv_users')->where('user_id',session('user_id'))->update([
      'user_points'=>(($user->user_points+$product->wallet_cashback)-$P_val),
    ]);
    }

    
    $T_ID=DB::table('vv_transactions')->insertGetId([
     'transaction_code'=>'',
     'transaction_amount'=>request()->total,
     'transaction_mode'=>'Razor Pay',
     'transaction_invoice'=>'',
     'user_code'=>'USER'.session('user_id'),
     'plan_type_id'=>$user->user_plan,
     'user_id'=>session('user_id'),
     'transaction_currency'=>'INR',
     'transaction_cdt'=>now()
    ]);
    code('vv_transactions','transaction_code','transaction_id',$id,'TRAN');
    \Cart::clear();
    return redirect()->route('order-viwe',['id'=>$id])->with('message' , 'Payment successful, your order will be despatched in the next 48 hours.');
    }
}
