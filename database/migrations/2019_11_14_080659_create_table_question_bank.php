<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableQuestionBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_bank', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->string('subject',500)->comment('标题语句');
            $table->enum('status', ['enabled', 'disabled'])->default('enabled')->comment('题目状态 启用 或 禁用');
            $table->string('describe',1000)->nullable()->comment('描述 描绘');

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
        Schema::dropIfExists('question_bank');
    }
}
