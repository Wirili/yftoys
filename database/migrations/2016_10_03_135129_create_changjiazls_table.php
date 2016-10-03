<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangjiazlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changjiazl', function (Blueprint $table) {
            $table->string('bianhao',50)->primary();
            $table->string('mingcheng',200)->nullable();
            $table->string('lianxiren',200)->nullable();
            $table->string('dizhi',200)->nullable();
            $table->string('quhao',200)->nullable();
            $table->string('dianhua',200)->nullable();
            $table->string('chuanzhen',200)->nullable();
            $table->string('shouji',200)->nullable();
            $table->text('beizhu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('changjiazl');
    }
}
