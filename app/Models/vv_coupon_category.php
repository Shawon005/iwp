<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_coupon_category extends Model
{
    protected $fillable = [
        'category_name', 'category_image'
     ];
    use HasFactory;
}
