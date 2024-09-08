<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_coupon extends Model
{
    protected $fillable = [
        'coupon_user_id','coupon_name','coupon_code','category_id',
        'sub_category_id','child_category_id','brand_id','coupon_link',
         'coupon_photo','coupon_start_date','coupon_end_date',
     ];
    use HasFactory;
}
