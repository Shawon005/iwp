<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_places', function (Blueprint $table) {
            $table->integer('place_id');
            $table->string('place_code');
            $table->integer('category_id');
            $table->string('place_banner_image');
            $table->string('place_gallery_image');
            $table->string('place_name');
            $table->string('place_tags');
            $table->string('place_fee');
            $table->string('place_discover');
            $table->string('place_ralated');
            $table->string('place_listings');
            $table->string('place_events');
            $table->string('place_experts');
            $table->string('place_news');
            $table->string('opening time');
            $table->string('closeing_time');
            $table->string('google_map');
            $table->string('place_info_question');
            $table->string('place_info_answer');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->string('place_states');
            $table->string('place_slug');
            $table->string('place_cdt');
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
        Schema::dropIfExists('vv_places');
    }
}
