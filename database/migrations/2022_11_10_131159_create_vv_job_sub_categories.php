<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvJobSubCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_job_sub_categories', function (Blueprint $table) {
            $table->integer('sub_category_id');
            $table->integer('category_id');
            $table->string('sub_category_code');
            $table->string('sub_category_name');
            $table->integer('category_filter_pos_id');
            $table->string('sub_category_status');
            $table->string('sub_category_slug');
            $table->string('sub_category_cdt');
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
        Schema::dropIfExists('vv_job_sub_categories');
    }
}
