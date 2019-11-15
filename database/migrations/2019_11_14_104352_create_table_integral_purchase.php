<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_purchase', function (Blueprint $table) {
            //抢购表
            $table->engine = 'Innodb';
            $table->integerIncrements('id');
            $table->integer('integral_product_id')->comment('关系id');

            $table->enum('status', ['enabled', 'disabled'])->default('disabled')->comment('状态开启或禁用');
            $table->bigInteger('start_time')->comment('抢购开始时间');
            $table->bigInteger('end_time')->comment('抢购结束时间');

            $table->integer('purchase_num')->nullable()->comment('发布抢购数量');
            $table->integer('remain_num')->nullable()->comment('抢购剩余数量');
            $table->integer('integral')->nullable()->comment('发布抢购积分');
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
        Schema::dropIfExists('integral_purchase');
    }
}
