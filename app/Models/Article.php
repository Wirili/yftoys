<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public $timestamps=false;
    public $fillable=['title'];

    public function category()
    {
        return $this->hasOne(ArticleCat::class,'cat_id','cat_id');
    }
}
