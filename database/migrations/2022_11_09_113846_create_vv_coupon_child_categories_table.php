<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvCouponChildCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_coupon_child_categories', function (Blueprint $table) {
            $table->integer('child_category_id');
            $table->integer('sub_category_id');
            $table->integer('category_id');
            $table->string('child_category_code');
            $table->string('child_category_name');
            $table->string('child_category_image');
            $table->string('child_category_status');
            $table->string('child_category_slug');
            $table->string('child_category_cdt');
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
        Schema::dropIfExists('vv_coupon_child_categories');
    }
}
