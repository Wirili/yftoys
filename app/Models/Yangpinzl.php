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
}
