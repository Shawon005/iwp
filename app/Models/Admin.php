<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public function emailcheck($email)
    {
        
        //
      return  DB::table('admins')->where('email',$email);

    }
    
}
