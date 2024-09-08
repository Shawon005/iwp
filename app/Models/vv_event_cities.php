<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_event_cities extends Model
{
    protected $fillable = [
        'city_id', 'city_name','state_id','city_cdt', 
     ];
    use HasFactory;
}
