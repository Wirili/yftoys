<?php

namespace App\Http\Controllers\Home;

use App\models\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return view('home.article.index');
    }

    public function about()
    {
        $article = Article::where('alias', 'about')->first();
        return view('home.article.about', [
            'article' => $article
        ]);
    }

    public function contact()
    {
        $article = Article::where('alias', 'contact')->first();
        return view('home.article.contact', [
            'article' => $article
        ]);
    }
}
