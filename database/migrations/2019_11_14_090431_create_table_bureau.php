<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBureau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureau', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title');
            $table->integer('cont_down')->default(10)->comment('倒计时秒');
            $table->integer('integral')->comment('奖励积分');
            $table->enum('type', ['random', 'immobilization'])->default('random')->comment('默认随机选择 或 固定');
            $table->bigInteger('createtime');
            $table->bigInteger('updatetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bureau');
    }
}
