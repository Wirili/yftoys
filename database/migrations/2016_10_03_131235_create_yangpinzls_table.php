<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYangpinzlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yangpinzl', function (Blueprint $table) {
            $table->string('bianhao',50)->primary();
            $table->string('tiaoma',50)->nullable();
            $table->string('changjiabh',32)->nullable();
            $table->string('changjiahh',32)->nullable();
            $table->string('pinming',200)->nullable();
            $table->string('epinming',200)->nullable();
            $table->string('baozhuangfs',200)->nullable();
            $table->string('leibieid',4)->nullable();
            $table->string('danwei',50)->nullable();
            $table->double('ypchang')->nullable();
            $table->double('ypkuan')->nullable();
            $table->double('ypgao')->nullable();
            $table->string('tuyang',255)->nullable();
            $table->boolean('op')->nullable();
            $table->integer('meijianshu_n')->nullable();
            $table->integer('meixiangshu_n')->nullable();
            $table->integer('neiheshu_n')->nullable();
            $table->double('xiaoshoujia_n')->nullable();
            $table->double('changjia_n')->nullable();
            $table->double('zuidijia_n')->nullable();
            $table->double('dijia_n')->nullable();
            $table->dateTime('lururq_n')->nullable();
            $table->dateTime('gengxinrq_n')->nullable();
            $table->double('zheshu_n')->nullable();
            $table->double('ggchang_w')->nullable();
            $table->double('ggkuan_w')->nullable();
            $table->double('gggao_w')->nullable();
            $table->double('maozhong_w')->nullable();
            $table->double('jingzhong_w')->nullable();
            $table->integer('neihushu_w')->nullable();
            $table->double('dashu_w')->nullable();
            $table->integer('meijianshu_w')->nullable();
            $table->double('xiaoshoujia_w')->nullable();
            $table->double('changjia_w')->nullable();
            $table->double('zuidijia_w')->nullable();
            $table->double('dijia_w')->nullable();
            $table->dateTime('lururq_w')->nullable();
            $table->dateTime('gengxinrq_w')->nullable();
            $table->double('zheshu_w')->nullable();
            $table->boolean('picistrue')->nullable();
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
        Schema::dropIfExists('yangpinzl');
    }
}
