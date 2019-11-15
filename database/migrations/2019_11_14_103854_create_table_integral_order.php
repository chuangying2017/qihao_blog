<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_order', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->string('order_no')->comment('订单编号');
            $table->enum('status',
                ['paid', 'unpaid', 'discard', 'cancel', 'delivery', 'done'])
                ->default('unpaid')
                ->comment('订单状态 paid已支付 unpaid待支付 discard废弃 cancel取消订单 delivery待收货 done已完成 ');
            $table->enum('pay_mode', ['integral', 'money'])->default('integral');

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
        Schema::dropIfExists('integral_order');
    }
}
