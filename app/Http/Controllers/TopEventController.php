<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TopEventController extends Controller
{
    public function Index(Request $request)
    {
        $top_event=DB::table('vv_top_events')->get();
        return view('CMS.top_event',
        ['top_event'=>$top_event]);
    }
    public function Edit(Request $request,$id)
    {
        $top=DB::table('vv_top_events')->get();
        $top_event=DB::table('vv_top_events')->where('event_id',$id)->first();
        $event=DB::table('vv_events')->get();
        return view('CMS.top_event_edit',
        ['top_event'=>$top_event,'event'=>$event,'top'=>$top]);
    }
    public function Update(Request $request,$id)
    {
        //dd($request->all());
        DB::table('vv_top_events')->where('event_id',$id)->update([
         'event_name'=>request()->event_name,
         'event_pos_id'=>request()->event_pos_id
        ]);
        return redirect()->route('top_event_table')->with('message' , 'Update was successful!');
    }

}
