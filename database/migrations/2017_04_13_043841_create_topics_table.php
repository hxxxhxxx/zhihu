<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->unsigned()->index();
            $table->string('name')->index();
            $table->string('desc')->nullable()->comment('话题描述');
            $table->string('avatar')->nullable()->comment('话题图片');
            $table->integer('followers')->default(0)->index()->comment('关注数');
            $table->integer('questions')->default(0)->index()->comment('问题数');
            $table->integer('top-answers')->default(0)->index()->comment('精华数');
            $table->boolean('locked')->default(false)->index()->comment('是否被锁定');

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
        Schema::dropIfExists('topics');
    }
}
