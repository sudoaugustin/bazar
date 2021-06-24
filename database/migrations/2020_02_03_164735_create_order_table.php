<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('u_id');
            $table->date('created_at')->nullable()->default(date('Y-m-d H:i:s'));
            $table->string('location');
            $table->string('payment_method');
            $table->string('payment_contact')->nullable();
            $table->string('status')->default("PENDING");
            $table->boolean('paid')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
