<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    //
    public function index($lang='cn')
    {
        $lang = $this->getLang($lang);
        return view("home.$lang.index");
    }
}
