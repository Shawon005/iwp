<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_job', function (Blueprint $table) {
            $table->integer('job_id');
            $table->string('job_code');$table->string('user_id');
            $table->string('job_title');
            $table->string('job_salary');$table->string('no_of_openings');
            $table->string('job_interview_date');$table->string('job_interview_time');
            $table->string('job_role');
            $table->string('education_qualification');$table->string('state_id');
            $table->string('job_location');
            $table->string('job_image');$table->string('category_id');
            $table->string('sub_category_id');
            $table->string('job_type');$table->string('year_of_experience');
            $table->string('contact_no');
            $table->string('email_id');$table->string('website');
            $table->string('contact_person');
            $table->string('interview_location');
            $table->string('job_company_name');
            $table->string('job_description');
            $table->string('job_small_description');
            $table->string('skill_set'); 
            $table->string('job_status');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->string('job_slug');
            $table->string('job_udt');
            $table->string('job_cdt');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vv_job');
    }
}
