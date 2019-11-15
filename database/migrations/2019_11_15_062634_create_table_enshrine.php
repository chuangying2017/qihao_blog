<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEnshrine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enshrine', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->integerIncrements('id');
            $table->integer('uid');
            $table->integer('product_id')->comment('收藏品id');
            $table->string('model_type')->comment('收藏模型');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enshrine');
    }
}
