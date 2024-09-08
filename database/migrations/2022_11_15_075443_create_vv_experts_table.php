<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('vv_experts', function (Blueprint $table) {
            $table->integer('expert_id');
            $table->string('expert_code');
            $table->string('user_id');
            $table->string('user_plan');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('state_id');
            $table->string('city_id');
            $table->string('area_id');
            $table->string('profile_name');
            $table->string('base_fare');
            $table->string('years_of_experience');
            $table->string('available_time_start');
            $table->string('available_time_end');
            $table->string('profile_image');
            $table->string('cover_image');
            $table->string('date_of_birth');
            $table->string('id_proof');
            $table->string('payment_id');
            $table->string('experience_1');
            $table->string('experience_2');
            $table->string('experience_3');
            $table->string('experience_4');
            $table->string('education_1');
            $table->string('education_2');
            $table->string('education_3');
            $table->string('education_4');
            $table->string('additional_info_1');
            $table->string('additional_info_2');
            $table->string('additional_info_3');
            $table->string('additional_info_4');
            $table->string('expert_availability_status');
            $table->string('expert_status');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->string('expert_slug');
            $table->string('expert_udt');
            $table->string('expert_cdt');
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
        Schema::dropIfExists('vv_experts');
    }
}
