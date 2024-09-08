<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvEventCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_event_categories', function (Blueprint $table) {
            $table->integer('category_id'); 	 	 	 	 	 		 	
            $table->string('category_code');
            $table->string('category_name');
            $table->string('category_image');
            $table->string('category_filter');
            $table->string('category_filter_pos_id');
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
        Schema::dropIfExists('vv_event_categories');
    }
}
