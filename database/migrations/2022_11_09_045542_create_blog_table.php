<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_blogs', function (Blueprint $table) {
            $table->integer('blog_id');
            $table->string('user_id');
            $table->string('blog_name');
            $table->string('blog_description');
            $table->string('blog_image');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->string('isenquiry');
            $table->string('blod_status');
            $table->string('blod_slug');
            $table->string('blod_cdt');
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
        Schema::dropIfExists('blog');
    }
}
