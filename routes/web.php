<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['uses'=>'Home\IndexController@index','as'=>'index']);
Route::get('index', 'Home\IndexController@index');
Route::post('login', 'Home\LoginController@login');
Route::get('login', 'Home\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Home\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Home\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Home\RegisterController@register');

Route::get('about', 'Home\ArticleController@about')->name('about');
Route::get('contact', 'Home\ArticleController@contact')->name('contact');
Route::get('category/{id}', 'Home\CategoryController@index')->name('category');


Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('welcome', ['uses'=>'Admin\IndexController@welcome','as'=>'welcome']);
    Route::get('/', ['uses'=>'Admin\IndexController@index','as'=>'/']);
    Route::get('index', ['uses'=>'Admin\IndexController@index','as'=>'index']);
    Route::get('login', ['uses'=>'Admin\LoginController@showLogin','as'=>'login']);
    Route::post('login', ['uses'=>'Admin\LoginController@login','as'=>'postLogin']);
    Route::get('logout', ['uses'=>'Admin\LoginController@logout','as'=>'logout']);

    Route::get('config/edit', ['uses'=>'Admin\ConfigController@edit','as'=>'config.edit']);
    Route::post('config/save', ['uses'=>'Admin\ConfigController@save','as'=>'config.save']);


    Route::get('goods/index', ['uses'=>'Admin\GoodsController@index','as'=>'goods.index']);
    Route::get('goods/edit/{id}', ['uses'=>'Admin\GoodsController@edit','as'=>'goods.edit']);
    Route::get('goods/del/{id}', ['uses'=>'Admin\GoodsController@del','as'=>'goods.del']);
    Route::get('goods/create', ['uses'=>'Admin\GoodsController@create','as'=>'goods.create']);
    Route::post('goods/save', ['uses'=>'Admin\GoodsController@save','as'=>'goods.save']);
    Route::post('goods/ajax', ['uses'=>'Admin\GoodsController@ajax','as'=>'goods.ajax']);

    //宠物管理路由
    Route::get('farm/index', ['uses'=>'Admin\FarmController@index','as'=>'farm.index']);
    Route::get('farm/edit/{id}', ['uses'=>'Admin\FarmController@edit','as'=>'farm.edit']);
    Route::get('farm/create', ['uses'=>'Admin\FarmController@create','as'=>'farm.create']);
    Route::get('farm/del/{id}', ['uses'=>'Admin\FarmController@del','as'=>'farm.del']);
    Route::post('farm/save', ['uses'=>'Admin\FarmController@save','as'=>'farm.save']);
    Route::post('farm/ajax', ['uses'=>'Admin\FarmController@ajax','as'=>'farm.ajax']);

    //文章管理路由
    Route::get('article/index', ['uses'=>'Admin\ArticleController@index','as'=>'article.index']);
    Route::get('article/edit/{id}', ['uses'=>'Admin\ArticleController@edit','as'=>'article.edit']);
    Route::get('article/create', ['uses'=>'Admin\ArticleController@create','as'=>'article.create']);
    Route::get('article/del/{id}', ['uses'=>'Admin\ArticleController@del','as'=>'article.del']);
    Route::post('article/save', ['uses'=>'Admin\ArticleController@save','as'=>'article.save']);
    Route::post('article/ajax', ['uses'=>'Admin\ArticleController@ajax','as'=>'article.ajax']);

    //文章类别路由
    Route::get('article_cat/index', ['uses'=>'Admin\ArticleCatController@index','as'=>'article_cat.index']);
    Route::get('article_cat/edit/{id}', ['uses'=>'Admin\ArticleCatController@edit','as'=>'article_cat.edit']);
    Route::get('article_cat/create', ['uses'=>'Admin\ArticleCatController@create','as'=>'article_cat.create']);
    Route::get('article_cat/del/{id}', ['uses'=>'Admin\ArticleCatController@del','as'=>'article_cat.del']);
    Route::post('article_cat/save', ['uses'=>'Admin\ArticleCatController@save','as'=>'article_cat.save']);
    Route::post('article_cat/ajax', ['uses'=>'Admin\ArticleCatController@ajax','as'=>'article_cat.ajax']);

    //文章管理路由
    Route::get('user/index', ['uses'=>'Admin\UserController@index','as'=>'user.index']);
    Route::get('user/edit/{id}', ['uses'=>'Admin\UserController@edit','as'=>'user.edit']);
    Route::get('user/create', ['uses'=>'Admin\UserController@create','as'=>'user.create']);
    Route::get('user/del/{id}', ['uses'=>'Admin\UserController@del','as'=>'user.del']);
    Route::post('user/save', ['uses'=>'Admin\UserController@save','as'=>'user.save']);
    Route::post('user/ajax', ['uses'=>'Admin\UserController@ajax','as'=>'user.ajax']);

    //权限控制路由
    Route::get('role/index',['uses'=>'Admin\RoleController@index','as'=>'role.index']);
    Route::get('role/edit/{id}',['uses'=>'Admin\RoleController@edit','as'=>'role.edit']);
    Route::get('role/create',['uses'=>'Admin\RoleController@create','as'=>'role.create']);
    Route::post('role/save',['uses'=>'Admin\RoleController@save','as'=>'role.save']);
    Route::post('role/ajax', ['uses'=>'Admin\RoleController@ajax','as'=>'role.ajax']);
    Route::get('role/del/{id}', ['uses'=>'Admin\RoleController@del','as'=>'role.del']);

    //管理员路由
    Route::get('admin/index', ['uses'=>'Admin\AdminController@index','as'=>'admin.index']);
    Route::get('admin/edit/{id}',['uses'=>'Admin\AdminController@edit','as'=>'admin.edit']);
    Route::get('admin/create',['uses'=>'Admin\AdminController@create','as'=>'admin.create']);
    Route::post('admin/save',['uses'=>'Admin\AdminController@save','as'=>'admin.save']);
    Route::post('admin/ajax', ['uses'=>'Admin\AdminController@ajax','as'=>'admin.ajax']);

});
