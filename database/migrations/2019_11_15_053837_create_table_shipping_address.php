<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableShippingAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_address', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->integer('uid');
            $table->enum('status', ['default', 'dubious'])->default('default')->comment('default默认选择的地址');
            $table->string('province')->nullable()->comment('省');
            $table->string('city')->nullable()->comment('市');
            $table->string('region')->nullable()->comment('区');
            $table->string('detail')->nullable()->comment('详细地址');
            $table->string('name')->comment('收货人');
            $table->char('iphone',20)->comment('联系电话');
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
        Schema::dropIfExists('shipping_address');
    }
}
