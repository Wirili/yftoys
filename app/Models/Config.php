<?php

namespace App\models;

use Cache;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    protected $table="config";
    public $timestamps=false;

    public function children(){
        return $this->hasMany(Config::class,'parent_id','id');
    }

    public function getStoreOptionsAttribute()
    {
        if($this->attributes['store_range'])
            return explode(',', $this->attributes['store_range']);
        else
            return false;
    }

    public function save(array $options = [])
    {
        parent::save($options);
        $config=[];
        foreach (self::where('parent_id','<>',0)->get() as $k=>$v)
        {
            $config[$v->code]=$v->value;
        }
        Cache::store('file')->put('web_config',$config,60);
    }

    public static function getConfig()
    {
        if(!Cache::store('file')->has('web_config')){
            $config=[];
            foreach (self::where('parent_id','<>',0)->get() as $k=>$v)
            {
                $config[$v->code]=$v->value;
            }
            Cache::store('file')->put('web_config',$config,60);
            return $config;
        }else{
            return Cache::store('file')->get('web_config');
        }
    }
}
