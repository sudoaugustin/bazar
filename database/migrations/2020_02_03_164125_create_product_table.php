<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('s_id');
            $table->Integer('sales')->default(0);
            $table->String('name');
            $table->text('desc');
            $table->String('category');
            $table->string('spec');
            $table->string('brand_name');
            $table->timestamp("created_at")->default(date('Y-m-d H:i:s'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
