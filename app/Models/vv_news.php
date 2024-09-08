<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_news extends Model
{
    protected $fillable = [
        'category_id','news_description','news_title','news_image' 
     ];
    use HasFactory;
}
