<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPanelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_panel', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email_id');
            $table->string('profile_password');
            $table->string('file');
            $table->string('mobile_number');
            $table->string('address');
            $table->string('user_type');
            $table->string('user_plan');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('website');
      
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
        Schema::dropIfExists('user_panel');
    }
}
