<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingSubscribeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_subscribe', function (Blueprint $table) {
            $table->Integer('s_id');
            $table->Integer('u_id');
            $table->date('created_at')->nullable()->default(date('Y-m-d H:i:s'));
            $table->Integer('rating')->default(0);
            $table->Integer('subscribed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_subscribe');
    }
}
