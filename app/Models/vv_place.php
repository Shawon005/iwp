<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_place extends Model
{
    protected $fillable = [
      
        'category_id',
        'place_gallery_image', 'place_gallery_video','place_name','place_tags','place_fee',
        'place_discover','place_ralated','place_listings','place_events','place_experts','place_news','opening_time',
        'closeing_time','google_map','place_info_question','place_info_answer','seo_title','seo_description','seo_keywords', 'place_date',
        'place_status',
     ];
    use HasFactory;
}
