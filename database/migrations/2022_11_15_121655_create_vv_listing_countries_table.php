<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvListingCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_listing_countries', function (Blueprint $table) {
            $table->integer('country_id');
            $table->string('country_name');
            $table->string('country_sortname');
            $table->string('country_phonecode');
            $table->string('country_cdt');

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
        Schema::dropIfExists('vv_listing_countries');
    }
}
