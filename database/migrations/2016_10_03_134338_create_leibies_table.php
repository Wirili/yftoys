<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeibiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leibie', function (Blueprint $table) {
            $table->string('id',4)->primary();
            $table->string('leibie',200)->nullable()->comment('类别名称');
            $table->string('ywleibie',200)->nullable()->comment('英文类别');
            $table->string('picpath',500)->nullable()->comment('图片路径');
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
        Schema::dropIfExists('leibie');
    }
}
