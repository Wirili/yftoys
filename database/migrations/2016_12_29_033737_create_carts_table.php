<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0)->comment('用户ID');
            $table->string('bianhao',50)->default('')->comment('样品编号');
            $table->string('pinming',200)->default('')->comment('品名');
            $table->string('epinming',200)->default('')->comment('英文品名');
            $table->integer('meijianshu')->default(0)->comment('每件数量');
            $table->string('danwei',50)->default('')->comment('单位');
            $table->integer('num')->default(0)->comment('数量');
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
        Schema::dropIfExists('cart');
    }
}
