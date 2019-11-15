<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_banner', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->integerIncrements('id');
            $table->string('title');
            $table->string('url')->nullable()->comment('点击图片url');
            $table->string('image_path')->nullable()->comment('图片路径');
            $table->bigInteger('createtime');
            $table->bigInteger('updatetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integral_banner');
    }
}
