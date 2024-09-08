<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $shipping=DB::table('vv_shipping')->get();
        return view('product.shipping.index',compact('shipping'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=DB::table('vv_cities')->get();
        $state=DB::table('vv_states')->get();
        return view('product.shipping.create',compact('city','state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'shipping_price'=>'required',
            'city_id'=>'required',
            'state_id'=>'required',
          ]);
        DB::table('vv_shipping')->insert([
            'shipping_price'=>$request->shipping_price,
            'city_id'=>$request->city_id,
            'state_id'=>$request->state_id,
        ]);
        return redirect()->route('shipping.index')->with('message' , 'store was successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping=DB::table('vv_shipping')->where('shipping_id',$id)->first();
        $city=DB::table('vv_cities')->get();
        $state=DB::table('vv_states')->get();
        return view('product.shipping.edit',compact('city','state','shipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([ 
            'shipping_price'=>'required',
            
          ]);
        DB::table('vv_shipping')->where('shipping_id',$id)->update([
            'shipping_price'=>$request->shipping_price,
            'city_id'=>$request->city_id,
            'state_id'=>$request->state_id,
        ]);
        return redirect()->route('shipping.index')->with('message' , 'update was successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DB::table('vv_shipping')->where('shipping_id',$id)->delete();
        return redirect()->route('shipping.index')->with('message' , 'Delete was successful!');
        //
    }
}
