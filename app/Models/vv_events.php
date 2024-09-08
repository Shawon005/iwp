<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_events extends Model
{
    protected $fillable = [
        
        'user_id', 'event_name','state_id','city_id','event_address','category_id','event_start_date','event_time','event_description',
        'event_map','event_image','event_contact_name','event_mobile','event_email',
        'event_website','isenquiry',
     ]; 
    use HasFactory;
}
