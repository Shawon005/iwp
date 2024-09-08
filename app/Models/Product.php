<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{protected $fillable = [
    'user_id',
    'category_id',
    'gallery_image',
    'product_name',
    'product_price',
    'product_price_offer',
    'product_description',
    'discount_type',
    'wallet_cashback',
    'affiliation_amount',
    'affiliation_amount_type',
    'product_highlights',
    'discount_val',
    'product_info_question',
    'product_info_answer',
    'brand_id',
    'product_type',
    'product_payment_link',
    'product_tags',
    'child_category_id',
    'sub_category_id',
    'product_type',
];
    use HasFactory;
}
