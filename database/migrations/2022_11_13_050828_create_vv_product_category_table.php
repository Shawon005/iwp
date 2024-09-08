<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_product_categories', function (Blueprint $table) {
            $table->integer('category_id');
            $table->string('category_code');
            $table->string('category_name');
            $table->string('category_image');
            $table->string('category_seo_title');
            $table->string('category_seo_description');
            $table->string('category_seo_keywords');
            $table->integer('category_filter');
            $table->integer('category_filter_pos_id');
            $table->string('category_status');
            $table->string('category_slug');
            $table->string('category_cdt');
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
        Schema::dropIfExists('vv_product_category');
    }
}
