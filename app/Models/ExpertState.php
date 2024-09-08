<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertState extends Model
{
    protected $fillable = [
        'state_id', 'state_name','country_id','state_cdt',
     ];
    use HasFactory;
}
