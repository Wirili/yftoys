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
            $table->string('leibie',200)->nullable();
            $table->string('ywleibie',200)->nullable();
            $table->string('picpath',500)->nullable();
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
