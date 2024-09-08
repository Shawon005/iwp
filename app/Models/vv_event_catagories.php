<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vv_event_categories;
class vv_event_catagories extends Model
{
    protected $fillable = [
        'cetagories_name', 
     ];
    use HasFactory;
}
