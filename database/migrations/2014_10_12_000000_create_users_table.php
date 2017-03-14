<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('avatar')->nullable()->index()->comment('用户头像');
            $table->string('cover')->nullable()->comment('封面图片');
            $table->enum('gender', ['male', 'female'])->default('male')->index()->comment('性别');
            $table->string('signature')->nullable()->index()->comment('一句话介绍');
            $table->json('city')->nullable()->comment('居住地');
            $table->tinyInteger('industry_id')->nullable()->comment('所在行业');
            $table->json('company')->nullable()->comment('职业经历');
            $table->json('educations')->nullable()->comment('教育经历');
            $table->string('introduction')->nullable()->comment('个人简介');
            $table->integer('followers')->default(0)->index()->comment('被关注数');
            $table->integer('following')->default(0)->index()->comment('关注数');
            $table->integer('answers')->default(0)->index()->comment('关注数');
            $table->integer('shares')->default(0)->index()->comment('分享数');
            $table->integer('asks')->default(0)->index()->comment('提问数');
            $table->integer('collections')->default(0)->index()->comment('收藏数');
            $table->integer('homepage_views')->default(0)->comment('主页被浏览数');
            $table->integer('posts')->default(0)->index()->comment('文章数');
            $table->json('achievement')->nullable()->comment('获得的成就[感谢/赞同/收藏]');
            $table->integer('topics')->default(0)->comment('关注的话题数');
            $table->integer('columns')->default(0)->comment('关注的专栏数');
            $table->integer('questions')->default(0)->comment('关注的问题数');
            $table->integer('f_collections')->default(0)->comment('关注的收藏夹数');


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
