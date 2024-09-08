<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_coupons', function (Blueprint $table) {

            $table->integer('coupon_id');
            $table->integer('coupon_user_id');
            $table->string('coupon_name');
            $table->string('coupon_code');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('child_category_id');
            $table->integer('brand_id');
            $table->string('coupon_link');
            $table->string('coupon_photo');
            $table->string('coupon_start_date');
            $table->string('coupon_cdt');
            $table->string('coupon_status');
            $table->string('coupon_end_date');
            $table->string('coupon_use_members');
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
        Schema::dropIfExists('vv_coupons');
    }
}
