<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vv_job extends Model
{
    protected $fillable = [
        'user_id','job_title', 'job_salary','no_of_openings','job_interview_date',
        'job_interview_time','job_role', 'education_qualification','state_id','job_location',
        'job_image','category_id', 'sub_category_id','job_type','year_of_experience',
        'contact_no','email_id','website','contact_person','interview_location','job_company_name',
        'job_description','job_small_description','skill_set'
     ];
    use HasFactory;
}
