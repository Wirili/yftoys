<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Yangpinzl;

class CategoryController extends Controller
{
    //
    public function index($id)
    {
        $goods=Yangpinzl::where('leibieid',$id)->orderBy('lururq_w','desc')->paginate(12);
        return view('home.category.index',[
            'goods'=>$goods
        ]);
    }
}
