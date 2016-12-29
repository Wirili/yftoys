<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id')->commemt('');
            $table->integer('user_id')->commemt('用户ID');
            $table->tinyInteger('status')->default(1)->commemt('状态');
            $table->string('name')->default('')->commemt('收货人');
            $table->string('phone',50)->default('')->commemt('电话');
            $table->string('fax',50)->default('')->commemt('传真');
            $table->string('email',100)->default('')->commemt('电子邮件');
            $table->string('address',100)->default('')->commemt('收货地址');
            $table->string('remark')->default('')->commemt('备注');
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
        Schema::dropIfExists('order');
    }
}
