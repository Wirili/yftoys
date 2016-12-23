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
            $table->unsignedInteger('cat_id')->default(0);
            $table->string('title',255)->default('')->comment('标题');
            $table->string('alias',50)->default('')->comment('调用别名');
            $table->string('keywords',255)->default('')->comment('关键字');
            $table->string('description',255)->default('')->comment('简单描述');
            $table->text('contents')->comment('文章内容');
            $table->boolean('lang')->default(0)->comment('中英文 0 中文 1 英文 ');
            $table->dateTime('add_time')->nullable()->comment('添加时间');
//            $table->timestamps();
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
