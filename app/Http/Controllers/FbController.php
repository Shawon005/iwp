<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FbController extends Controller
{
    public function Facebook()
    {
       $fb=$request->all();
        return response()->json([$fb]);
    }
}
