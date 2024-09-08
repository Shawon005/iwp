<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvListingCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_listing_cities', function (Blueprint $table) {
            $table->integer('city_id');
            $table->string('city_name');
            $table->string('city_lat');
            $table->string('city_lng');
            $table->integer('state_id');
            $table->string('city_cdt');
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
        Schema::dropIfExists('vv_listing_cities');
    }
}
