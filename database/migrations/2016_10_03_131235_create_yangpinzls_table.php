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
            $table->float('ypchang')->nullable();
            $table->float('ypkuan')->nullable();
            $table->float('ypgao')->nullable();
            $table->string('tuyang',255)->nullable();
            $table->boolean('op')->nullable();
            $table->integer('meijianshu_n')->nullable();
            $table->integer('meixiangshu_n')->nullable();
            $table->integer('neiheshu_n')->nullable();
            $table->float('xiaoshoujia_n')->nullable();
            $table->float('changjia_n')->nullable();
            $table->float('zuidijia_n')->nullable();
            $table->float('dijia_n')->nullable();
            $table->dateTime('lururq_n')->nullable();
            $table->dateTime('gengxinrq_n')->nullable();
            $table->float('zheshu_n')->nullable();
            $table->float('ggchang_w')->nullable();
            $table->float('ggkuan_w')->nullable();
            $table->float('gggao_w')->nullable();
            $table->float('maozhong_w')->nullable();
            $table->float('jingzhong_w')->nullable();
            $table->integer('neiheshu_w')->nullable();
            $table->float('dashu_w')->nullable();
            $table->integer('meijianshu_w')->nullable();
            $table->float('xiaoshoujia_w')->nullable();
            $table->float('changjia_w')->nullable();
            $table->float('zuidijia_w')->nullable();
            $table->float('dijia_w')->nullable();
            $table->dateTime('lururq_w')->nullable();
            $table->dateTime('gengxinrq_w')->nullable();
            $table->float('zheshu_w')->nullable();
            $table->boolean('picistrue')->nullable();
            $table->boolean('is_best')->default(0);
            $table->boolean('is_hot')->default(0);
            //$table->timestamps();
        });

        Schema::create('yangpin_dts', function (Blueprint $table) {
            $table->string('bianhao',50)->primary();
            $table->string('tiaoma',50)->nullable();
            $table->string('changjiabh',32)->nullable();
            $table->string('changjiahh',32)->nullable();
            $table->string('pinming',200)->nullable();
            $table->string('epinming',200)->nullable();
            $table->string('baozhuangfs',200)->nullable();
            $table->string('leibieid',4)->nullable();
            $table->string('danwei',50)->nullable();
            $table->float('ypchang')->nullable();
            $table->float('ypkuan')->nullable();
            $table->float('ypgao')->nullable();
            $table->string('tuyang',255)->nullable();
            $table->boolean('op')->nullable();
            $table->integer('meijianshu_n')->nullable();
            $table->integer('meixiangshu_n')->nullable();
            $table->integer('neiheshu_n')->nullable();
            $table->float('xiaoshoujia_n')->nullable();
            $table->float('changjia_n')->nullable();
            $table->float('zuidijia_n')->nullable();
            $table->float('dijia_n')->nullable();
            $table->dateTime('lururq_n')->nullable();
            $table->dateTime('gengxinrq_n')->nullable();
            $table->float('zheshu_n')->nullable();
            $table->float('ggchang_w')->nullable();
            $table->float('ggkuan_w')->nullable();
            $table->float('gggao_w')->nullable();
            $table->float('maozhong_w')->nullable();
            $table->float('jingzhong_w')->nullable();
            $table->integer('neiheshu_w')->nullable();
            $table->float('dashu_w')->nullable();
            $table->integer('meijianshu_w')->nullable();
            $table->float('xiaoshoujia_w')->nullable();
            $table->float('changjia_w')->nullable();
            $table->float('zuidijia_w')->nullable();
            $table->float('dijia_w')->nullable();
            $table->dateTime('lururq_w')->nullable();
            $table->dateTime('gengxinrq_w')->nullable();
            $table->float('zheshu_w')->nullable();
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
        Schema::dropIfExists('yangpin_dts');
    }
}
