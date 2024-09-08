<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_events', function (Blueprint $table) {
            $table->integer('user_id'); 	 	 	 	 	 	 			
            $table->string('event_name'); 	 	 	 	 	 		 	
            $table->string('event_description');
            $table->string('event_image');
            $table->string('event_start_date');
            $table->string('event_end_date');
            $table->string('event_time');
            $table->string('event_contact_name');
            $table->string('event_email');
            $table->string('event_mobile');
            $table->string('event_website');
            $table->string('event_address');
            $table->string('category_id');
            $table->string('event_map');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->string('event_status');
            $table->string('event_slug');
            $table->string('event_type');
            $table->string('isenquiry');
            $table->string('event_cdt'); 
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
        Schema::dropIfExists('vv_events');
    }
}
