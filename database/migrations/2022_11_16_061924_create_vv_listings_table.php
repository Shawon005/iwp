<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_listings', function (Blueprint $table) {

            $table->string('listing_id');
            $table->string('listing_code');
            $table->string('user_id');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('service_id');
            $table->string('service_image');
            $table->string('listing_type_id');
            $table->string('listing_name');
            $table->string('listing_description');
            $table->string('listing_address');
            $table->string('service_locations');
            $table->string('listing_mobile');
            $table->string('listing_whatsapp');
            $table->string('listing_email');
            $table->string('listing_website');
            $table->string('country_id');
            $table->string('state_id');
            $table->string('city_id');
            $table->string('profile_image');
            $table->string('cover_image');
            $table->string('gallery_image');
            $table->string('opening_days');
            $table->string('closing_time');
            $table->string('fb_link');
            $table->string('twitter_link');
            $table->string('gplus_link');
            $table->string('google_map');
            $table->string('listing_video');
            $table->string('listing_open');
            $table->string('service_1_name');
            $table->string('service_1_price');
            $table->string('service_1_detail');
            $table->string('service_1_image');
            $table->string('service_1_view_more');
            $table->string('listing_info_question');
            $table->string('listing_info_answer');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->string('listing_lat');
            $table->string('listing_Ing');
            $table->string('listing_status');
            $table->string('payment_status');
            $table->string('display_position');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('payment');
            $table->string('listing_slug');
            $table->string('listing_is_delete');
            $table->string('listing_cdt');           
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
        Schema::dropIfExists('vv_listings');
    }
}
