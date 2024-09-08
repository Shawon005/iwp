<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'user_id','blog_name','blog_description','blog_image','isenquiry'
     ];
    use HasFactory;
}
