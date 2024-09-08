<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvCouponBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_coupon_brands', function (Blueprint $table) {
            $table->integer('brand_id');
            $table->string('brand_code');
            $table->string('brand_name');
            $table->string('brand_image');
            $table->string('brand_status');
            $table->string('brand_slug');
            $table->string('brand_cdt');
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
        Schema::dropIfExists('vv_coupon_brands');
    }
}
