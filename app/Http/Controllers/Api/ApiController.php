<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    public function getusers(Request $request)
    {
        $users=DB::table('vv_users')->orderBy('user_id','DESC')
                   ->where('first_name','!=',"")->where('email_id','!=',"")
                   ->select('user_id','first_name','last_name','email_id','mobile_number','user_city')
                   ->paginate($request->limit ?? 20);
       return response()->json($users);
    }    
    
}