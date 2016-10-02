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
            $table->string('name',50)->unique()->comment('用户名');
            $table->string('fullname',100)->default('')->comment('姓名');
            $table->string('email',100)->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->dateTime('last_time')->nullable()->comment('登录时间');
            $table->string('last_ip',50)->default('')->comment('登陆IP');
            $table->unsignedInteger('login_count')->default(0)->comment('登陆次数');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
