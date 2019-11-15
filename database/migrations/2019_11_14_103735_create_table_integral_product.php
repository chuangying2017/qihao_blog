<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_product', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->integer('integral_category_id');

            $table->string('title')->comment('商品名称');
            $table->integer('integral')->comment('商品价格');
            $table->integer('inventory_num')->comment('库存数量');
            $table->integer('remain_num')->comment('剩余数量');
            $table->string('describe')->nullable()->comment('商品简介');
            $table->json('specification')->nullable()->comment('商品规格');


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
        Schema::dropIfExists('integral_product');
    }
}
