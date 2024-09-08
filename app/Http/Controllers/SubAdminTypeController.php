<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubAdminTypeController extends Controller
{
    public function Index(Request $request)
    {
        $type=DB::table('vv_sub_admin_type')->get();
        return view('sub-admin-type.all-sub-admin-type',
        ['type'=>$type]);
    }
 
    public function Edit(Request $request,$id)
    {
    $admin=DB::table('vv_sub_admin_type')->where('sub_admin_type_id',$id)->first();
    return view('sub-admin-type.sub-admin-type',
        ['admin'=>$admin]);
    }
    public function Update(Request $request,$id)
    {
        //dd($request->all());

        DB::table('vv_sub_admin_type')->where('sub_admin_type_id',$id)->update([
            'sub_admin_type' =>request()->sub_admin_type,
            'amount_user' => request()->amount_user,
            'p1_amount' => request()->p1_amount,
            'p2_amount' => request()->p2_amount,
            'p3_amount' => request()->p3_amount,
            'p4_amount' => request()->p4_amount,
            'minimum_withdrawal_amount' =>request()->minimum_withdrawal_amount
        ]);
        return redirect()->route('sub_admin_type_table')->with('message' , 'Update was successful!');
    }

}
