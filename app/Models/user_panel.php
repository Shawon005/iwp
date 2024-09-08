<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_panel extends Model
{
    protected $fillable = [
        'name',
        'email_id',
        'profile_password',
        'mobile_number',
        'file',
        'address',
        'user_type',
        'user_plan' ,
        'facebook',
        'twitter',
        'youtube',
        'website' 
    ];
    use HasFactory;
}
