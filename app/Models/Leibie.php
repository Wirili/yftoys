<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Leibie extends Model
{
    //
    protected $table='leibie';
    protected $keyType='string';
    public $timestamps=false;

    public static function getLeibie($leibie='')
    {
        $list=array();
        if($leibie=='') {
            $rs = self::where(\DB::raw("right(id,2)"),'00')->get();
            foreach ($rs as $item){
                $item['children']=static::getLeibie($item['id']);
                $list[]=$item;
            }
        }
        else {
            $rs = self::where(\DB::raw("left(id,2)"),substr($leibie, 0,2))->where(\DB::raw("right(id,2)"),'<>','00')->get();
            foreach ($rs as $item){
                $list[]=$item;
            }
        }
        return $list;
    }
}
