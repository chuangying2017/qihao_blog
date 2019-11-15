<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntegralComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_comment', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->integer('uid');
            $table->integer('product_id');

            $table->string('content',1000)->comment('评论内容');
            $table->tinyInteger('level')->comment('评论星级');
            $table->bigInteger('createtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integral_comment');
    }
}
