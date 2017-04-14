<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('question_id')->unsigned()->index();
            $table->text('content')->comment('回答内容');
            $table->integer('comments')->default(0)->index()->comment('评论数');
            // 评论设置
            // normal:正常  follow:只有关注的人才能评论  hidden:关闭评论
            $table->enum('status', ['normal', 'follow', 'hidden'])->default('normal')->comment('评论设置');
            $table->integer('agree_count')->default(0)->index()->comment('赞同数');
            $table->integer('against_count')->default(0)->index()->comment('反对数');
            $table->integer('unhelpful_count')->index()->comment('没有帮助数');

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
        Schema::dropIfExists('answers');
    }
}
