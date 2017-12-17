<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');//标题
            $table->string('author');//作者
            $table->string('excerpt')->nullable();//简介
            $table->string('keywords')->nullable();//关键词seo
            $table->string('description')->nullable();//描述seo
            $table->text('content');//内容
            $table->integer('status')->default(1);//状态
            $table->integer('comment_status')->default(1);//评论状态
            $table->integer('comment_count')->default(0);//评论数
            $table->integer('category')->default(0);//分类
            $table->timestamps();
            $table->softDeletes();//软删除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
