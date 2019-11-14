<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnswerAward extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_award', function (Blueprint $table) {
            $table->engine = 'Innodb';
            $table->bigIncrements('id');
            $table->integer('bureau_id')->index('bureau_id')->comment('局部id');
            $table->integer('award')->comment('奖励积分');
            $table->integer('uid')->index('uid')->comment('奖励的用户');
            $table->enum('status', ['success', 'failure'])->default('success')->comment('挑战状态');
            $table->enum('type', ['single', 'pk'])->comment('单人挑战和pk赛事');
            $table->tinyInteger('ranking')->comment('奖励名次');
            $table->tinyInteger('accuracy_num')->comment('答题正确率数量');
            $table->tinyInteger('error_rate_num')->comment('答题错误率数量');
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
        Schema::dropIfExists('answer_award');
    }
}
