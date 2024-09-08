<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('vv_products', function (Blueprint $table) {
           
            $table->integer('product_id');
            $table->string('product_code');
            $table->string('product_type');
            $table->string('user_id');
            $table->string('category_id');
            $table->string('child_category_id');
            $table->string('sub_category_id');
            $table->string('brand_id');
            $table->string('service_id');
            $table->string('service_image');
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_info_question');
            $table->string('product_info_answer');
            $table->string('product_price');
            $table->string('product_price_offer');
            $table->string('gallery_image');
            $table->string('product_payment_link');$table->string('discount_type');
            $table->string('discount_val');
            $table->string('wallet_cashback');
            $table->string('product_highlights');
            $table->string('product_tags');$table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->string('product_status');$table->string('product_slug');
            $table->string('product_is_delete');
            $table->string('product_delete_cdt');
            $table->string('product_cdt');
            $table->string('affiliation_amount_type');
            $table->string('affiliation_amount');
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
        Schema::dropIfExists('vv_products');
    }
}
