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
        $article = Article::where('alias', 'about')->firstOrNew(['title' => '公司简介']);
        return view('home.article.about', [
            'page_title' => $article->title,
            'article' => $article
        ]);
    }

    public function contact()
    {
        $article = Article::where('alias', 'contact')->firstOrNew(['title' => '联系我们']);
        return view('home.article.contact', [
            'page_title' => $article->title,
            'article' => $article
        ]);
    }
}
