<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralOrderSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_order_sku', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('buy_num');
            $table->integer('price');
            $table->json('specification')->nullable()->comment('规格');
            $table->string('leave_words')->nullable()->comment('客户留言');
            $table->enum('status', ['undone', 'uncomment', 'add_comment'])
                ->default('undone')
                ->comment('undone未完成 uncomment带评论 add_comment追加评论');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integral_order_sku');
    }
}
