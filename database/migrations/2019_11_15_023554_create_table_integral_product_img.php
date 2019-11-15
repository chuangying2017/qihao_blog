<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralProductImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_product_img', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->integer('product_id');
            $table->string('path')->comment('图片路径');
            $table->string('img_id',500)->nullable()->comment('oss图片路径id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integral_product_img');
    }
}
