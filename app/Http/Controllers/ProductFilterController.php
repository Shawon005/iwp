<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    public function Filter(Request $request)
    {
        $type=$request->city_check;
        $cat_check=($request->cat_check==null)?0:$request->cat_check;
        
        
        $sub_cat_check=($request->sub_cat_check==null)?0:$request->sub_cat_check;
    

        $child_cat_check=($request->child_cat_check==null)?0:$request->child_cat_check;
       
        $price_check=($request->price_check==null)?0:$request->price_check;

        $brand_check=($request->brand_check==null)?0:$request->brand_check;
  
        $discount_check=($request->discount_check==null)?0:$request->discount_check;
  
$WHERE = array();
$inner = $w = '';

// Category Check starts
if (!empty($cat_check)) {
    if (strstr($cat_check, ',')) {
        $data2 = explode(',', $cat_check);
        $cat_array = array();
        foreach ($data2 as $c) {
            $cat_array[] = "FIND_IN_SET($c,t1.category_id)";

        }
        $WHERE[] = '(' . implode(' OR ', $cat_array) . ')';
    } else {
        $WHERE[] = '(FIND_IN_SET(' . $cat_check . ',t1.category_id))';

    }
}

// Category Check Ends


//Sub Category Check starts
if (!empty($sub_cat_check)) {
    if (strstr($sub_cat_check, ',')) {
        $data2 = explode(',', $sub_cat_check);
        $sub_cat_array = array();
        foreach ($data2 as $c) {
            $sub_cat_array[] = "FIND_IN_SET($c,t1.sub_category_id)";

        }
        $WHERE[] = '(' . implode(' OR ', $sub_cat_array) . ')';
    } else {
        $WHERE[] = '(FIND_IN_SET(' . $sub_cat_check . ',t1.sub_category_id))';

    }
}

//Sub Category Check Ends
// Child Cat
if (!empty($child_cat_check)) {
    if (strstr($child_cat_check, ',')) {
        $data2 = explode(',', $child_cat_check);
        $child_cat_array = array();
        foreach ($data2 as $c) {
            $child_cat_array[] = "FIND_IN_SET($c,t1.child_category_id)";

        }
        $WHERE[] = '(' . implode(' OR ', $child_cat_array) . ')';
    } else {
        $WHERE[] = '(FIND_IN_SET(' . $child_cat_check . ',t1.child_category_id))';

    }
}
// Brand
if (!empty($brand_check)) {
    if (strstr($brand_check, ',')) {
        $data2 = explode(',', $brand_check);
        $brand_array = array();
        foreach ($data2 as $c) {
            $brand_array[] = "FIND_IN_SET($c,t1.brand_id)";

        }
        $WHERE[] = '(' . implode(' OR ', $brand_array) . ')';
    } else {
        $WHERE[] = '(FIND_IN_SET(' . $brand_check . ',t1.brand_id))';

    }
}

//Price Check starts
if (!empty($price_check)) {

    if (strstr($price_check, ',')) {
        $data8 = explode(',', $price_check);
        $cityarray = array();
        foreach ($data8 as $ci) {
            if($ci == 100){
                $start_price = 0;
                $end_price = 100;
            }elseif($ci == 250){
                $start_price = 101;
                $end_price = 250;
            }elseif($ci == 500){
                $start_price = 251;
                $end_price = 500;
            }elseif($ci == 1000){
                $start_price = 501;
                $end_price = 1000;
            }else{
                $start_price = 1001;
                $end_price = 100000;
            }
            $cityarray[] = "t1.product_price BETWEEN $start_price AND $end_price";

        }
        $WHERE[] = '(' . implode(' OR ', $cityarray) . ')';
    } else {

        if($price_check == 100){
            $start_price = 0;
            $end_price = 100;
        }elseif($price_check == 250){
            $start_price = 101;
            $end_price = 250;
        }elseif($price_check == 500){
            $start_price = 251;
            $end_price = 500;
        }elseif($price_check == 1000){
            $start_price = 501;
            $end_price = 1000;
        }else{
            $start_price = 1001;
            $end_price = 100000;
        }
        $WHERE[] = '(t1.product_price BETWEEN ' . $start_price . ' AND ' . $end_price . ')';

    }

}

//Price Check Ends

//Discount Check starts
if (!empty($discount_check)) {

    if (strstr($discount_check, ',')) {
        $data63 = explode(',', $discount_check);
        $discountarray = array();
        foreach ($data63 as $dis) {
            if($dis == 10){
                $start_discount = 0;
                $end_discount = 10;
            }elseif($dis == 25){
                $start_discount = 11;
                $end_discount = 25;
            }elseif($dis == 50){
                $start_discount = 26;
                $end_discount = 50;
            }elseif($dis == 70){
                $start_discount = 51;
                $end_discount = 70;
            }else{
                $start_discount = 100;
                $end_discount = 100000;
            }
            $discountarray[] = "t1.product_price_offer BETWEEN $start_discount AND  $end_discount";

        }
        $WHERE[] = '(' . implode(' OR ', $discountarray) . ')';
    } else {

        if($discount_check == 10){
            $start_discount = 0;
            $end_discount = 10;
        }elseif($discount_check == 25){
            $start_discount = 11;
            $end_discount = 25;
        }elseif($discount_check == 50){
            $start_discount = 26;
            $end_discount = 50;
        }elseif($discount_check == 70){
            $start_discount = 51;
            $end_discount = 70;
        }else{
            $start_discount = 100;
            $end_discount = 100000;
        }
       // $WHERE[] = '(t1.category_id = ' . $cat_check . ')';
        $WHERE[] = '(t1.product_price_offer BETWEEN ' . $start_discount . ' AND  ' . $end_discount . ')';

    }

}

//Price Check Ends


if (!empty($price_range)) {
    $data3 = explode('-', $price_range);
    $WHERE[] = "(t1.product_rate between $data3[0] and $data3[1])";
}

if (!empty($scheck)) {
    if (strstr($scheck, ',')) {
        $data3 = explode(',', $scheck);
        $sarray = array();
        foreach ($data3 as $c) {
            $sarray[] = "t2.size_id = $c";
        }
        $WHERE[] = '(' . implode(' OR ', $sarray) . ')';
    } else {
        $WHERE[] = '(t2.size_id = ' . $scheck . ')';
    }

    $inner = 'INNER JOIN `product_size_quantity` AS t2 ON t1.product_id = t2.product_id';

}

if (!empty($category_id)) {
    if (strstr($category_id, ',')) {
        $data4 = explode(',', $category_id);
        $ctarray = array();
        foreach ($data4 as $ct) {
            $ctarray[] = "t1.product_category_id = $ct";
        }
        $WHERE[] = '(' . implode(' OR ', $ctarray) . ')';
    } else {
        $WHERE[] = '(t1.product_category_id = ' . $category_id . ')';
    }
}

$w = implode(' AND ', $WHERE);
if (!empty($w)) {
    $w = 'WHERE ' . $w;
    $q = 'AND ';
} else {
    $q = 'WHERE ';
}


$product = DB::select("SELECT DISTINCT  t1 . * FROM  vv_products  AS t1 $inner $w $q product_status= 'Active' AND product_type= '$type' ORDER BY product_id DESC ");
$user = DB::table('vv_users')->where('user_id', $product->user_id)->get();
        return response()->json(['product'=>$product, 'user' => $user]);
    }
}
