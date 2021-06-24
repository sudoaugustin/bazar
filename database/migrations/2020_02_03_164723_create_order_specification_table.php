<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderSpecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_specification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('p_id');
            $table->integer('s_id');
            $table->integer('o_id');
            $table->integer('qty');
            $table->string('color');
            $table->string('size');
            $table->integer('amount');
            $table->date('created_at')->default(date('Y-m-d H:i:s'));
            $table->string('status')->default("PENDING")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_specification');
    }
}
