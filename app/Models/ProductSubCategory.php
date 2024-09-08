<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    protected $fillable = [
        'category_id','sub_category_name'
      ];
    use HasFactory;
}
