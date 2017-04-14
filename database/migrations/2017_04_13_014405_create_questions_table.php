<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('问题标题');
            $table->integer('user_id')->unsigned()->index();
            $table->text('question_desc')->nullable()->comment('问题描述，可选');
            $table->integer('followers')->default(1)->index()->comment('关注数');
            $table->integer('views')->default(0)->index()->comment('浏览数');
            $table->integer('answers')->default(0)->index()->comment('回答数');
            $table->integer('comments')->default(0)->index()->comment('问题评论数');
            $table->boolean('anonymous')->default(false)->comment('是否匿名提问');
            // 问题状态
            // 正常状态:normal 已锁定:locked 已隐藏:hidden
            $table->enum('status', ['normal', 'locked', 'hidden'])->default('normal')->comment('问题状态[正常、锁定、隐藏]');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
