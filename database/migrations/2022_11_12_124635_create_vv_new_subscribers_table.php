<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvNewSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_new_subscribers', function (Blueprint $table) {
       
            $table->integer('news_subscribers_id');
            $table->string('subscriber_email_id');
            $table->string('news_subscribers_cdt');
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
        Schema::dropIfExists('vv_new_subscribers');
    }
}
