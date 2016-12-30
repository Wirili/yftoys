<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Yangpinzl;

class GoodsController extends Controller
{
    //
    public function index($lang='cn')
    {
        $lang = $this->getLang($lang);
        $goods=Yangpinzl::orderByRaw('lururq_w desc,bianhao desc')->paginate(12);
        return view("home.$lang.goods",[
            'goods'=>$goods
        ]);
    }
}
