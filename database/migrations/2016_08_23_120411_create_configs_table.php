<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0)->comment('上级id');
            $table->string('code',50)->unique()->default('')->comment('配置名');
            $table->string('type',50)->default('')->comment('类型：text,option,');
            $table->string('store_range',100)->default('')->comment('配置项');
            $table->text('value')->nullable()->comment('配置值');
            $table->unsignedInteger('sort_order')->default(100)->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
