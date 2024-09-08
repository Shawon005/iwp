<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_job_city extends Model
{
    protected $fillable = [
        'state_id','city_name' 
     ];
    use HasFactory;
}
