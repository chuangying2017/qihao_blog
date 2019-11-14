<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTagControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choice_question', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->string('title',120)->comment('选项题目');
            $table->enum('status', ['yes', 'no'])->default('no')->comment('选项状态');
            $table->integer('question_bank_id')->comment('关联外键');
            $table->bigInteger('createtime')->comment('创建时间');
            $table->bigInteger('updatetime')->nullable()->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choice_question');
    }
}
