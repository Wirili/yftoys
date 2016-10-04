<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Yangpinzl extends Model
{
    //
    protected $table='yangpinzl';
    protected $primaryKey='bianhao';
    protected $keyType='string';
    public $timestamps=false;
    protected $appends = ['ypguige','guige','tiji','caiji'];

    public function category()
    {
        return $this->hasOne(Leibie::class,'id','leibieid');
    }

    public static function getTuyang($tuyang)
    {
        if(\Storage::disk('picture')->exists('picture/'.$tuyang))
            return '/picture/'.$tuyang;
        else
            return '/build/default/images/no_picture.gif';
    }

    public function getlururqWAttribute()
    {
        if($this->attributes)
            return date_create($this->attributes['lururq_w'])->format ('Y-m-d');
        else
            return '';
    }

    public function getYpguigeAttribute()
    {
        return round($this->attributes['ypchang'],1).'×'.round($this->attributes['ypkuan'],1).'×'.round($this->attributes['ypgao'],1);
    }

    public function getGuigeAttribute()
    {
        return round($this->attributes['ggchang_w'],1).'×'.round($this->attributes['ggkuan_w'],1).'×'.round($this->attributes['gggao_w'],1);
    }

    public function getTijiAttribute()
    {
        return round($this->attributes['ggchang_w']*$this->attributes['ggkuan_w']*$this->attributes['gggao_w']/100000,3);
    }

    public function getCaijiAttribute()
    {
        return round($this->attributes['ggchang_w']*$this->attributes['ggkuan_w']*$this->attributes['gggao_w']*3.532/100000,3);
    }
}
