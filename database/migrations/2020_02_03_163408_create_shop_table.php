<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('u_id');
            $table->String('name');
            $table->Integer('balance')->nullable()->default(0);
            $table->String('description')->nullable()->default("");
            $table->String('img')->default('shop.png');
            $table->String('address');
            $table->Boolean('offical')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
    }
}
