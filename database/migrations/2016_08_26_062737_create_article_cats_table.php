<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_cats', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('title',255)->default('')->comment('分类名称');
            $table->string('title_en',255)->default('')->comment('英文名称');
            $table->string('alias',50)->default('')->comment('调用别名');
            $table->unsignedInteger('sort_order')->default(100)->comment('排序');
            $table->dateTime('add_time')->nullable()->comment('添加时间');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_cats');
    }
}
