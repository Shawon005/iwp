<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListingFilterdController extends Controller
{
    public function Filter(Request $request)
    {
        $type=$request->city_check;
        $cat_check=($request->cat_check==null)?0:$request->cat_check;
        
        
        $sub_cat_check=($request->sub_cat_check==null)?0:$request->sub_cat_check;
    

        $child_cat_check=($request->child_cat_check==null)?0:$request->child_cat_check;
       
        $price_check=($request->price_check==null)?0:$request->price_check;

        $brand_check=($request->brand_check==null)?0:$request->brand_check;
  
        $state_check=($request->state_check==null)?0:$request->state_check;
        $city_check=($request->city_check==null)?0:$request->city_check;
  
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
if (!empty($state_check)) {
    if (strstr($state_check, ',')) {
        $data2 = explode(',', $state_check);
        $state_array = array();
        foreach ($data2 as $c) {
            $state_array[] = "FIND_IN_SET($c,t1.state_id)";

        }
        $WHERE[] = '(' . implode(' OR ', $state_array) . ')';
    } else {
        $WHERE[] = '(FIND_IN_SET(' . $state_check . ',t1.state_id))';

    }
}
if (!empty($city_check)) {
    if (strstr($city_check, ',')) {
        $data2 = explode(',', $city_check);
        $city_array = array();
        foreach ($data2 as $c) {
            $city_array[] = "FIND_IN_SET($c,t1.city_id)";

        }
        $WHERE[] = '(' . implode(' OR ', $city_array) . ')';
    } else {
        $WHERE[] = '(FIND_IN_SET(' . $city_check . ',t1.city_id))';

    }
}

//Sub Category Check Ends
// Child Cat
if (!empty($category_id)) {
    if (strstr($category_id, ',')) {
        $data4 = explode(',', $category_id);
        $ctarray = array();
        foreach ($data4 as $ct) {
            $ctarray[] = "t1.category_id = $ct";
        }
        $WHERE[] = '(' . implode(' OR ', $ctarray) . ')';
    } else {
        $WHERE[] = '(t1.category_id = ' . $category_id . ')';
    }
}



$w = implode(' AND ', $WHERE);
if (!empty($w)) {
    $w = 'WHERE ' . $w;
    $q = 'AND ';
} else {
    $q = 'WHERE ';
}


$listing = DB::select("SELECT DISTINCT  t1 . * FROM  vv_listings  AS t1 $inner $w ");
        return response()->json(['listing'=>$listing]);
    }
}
