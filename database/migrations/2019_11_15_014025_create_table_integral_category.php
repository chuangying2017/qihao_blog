<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_category', function (Blueprint $table) {

            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('pid')->comment('父类id');
            $table->string('path')->comment('路径');
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
        Schema::dropIfExists('integral_category');
    }
}
