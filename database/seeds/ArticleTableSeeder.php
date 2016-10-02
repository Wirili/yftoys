<?php

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lists=[[
            'title'=>'公司简介',
            'alias'=>'about',
            'contents'=>'公司简介',
        ],[
            'title'=>'联系我们',
            'alias'=>'contact',
            'contents'=>'<p>公司</p><p>电话：0000-0000000</p><p>传真：0000-0000000</p><p>邮箱：0000@qq.com</p><p>地址：XXXXXX</p>',
        ]];
        foreach ($lists as $list) {
            Article::create($list);
        }
    }
}
