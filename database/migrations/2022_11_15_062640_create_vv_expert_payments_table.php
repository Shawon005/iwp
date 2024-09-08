<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVvExpertPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vv_expert_payments', function (Blueprint $table) {
            
            $table->integer('payment_id');
            $table->string('payment_name');
            $table->string('payment_slug');
            $table->string('payment_cdt');
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
        Schema::dropIfExists('vv_expert_payments');
    }
}
