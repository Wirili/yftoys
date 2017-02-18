<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
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
            'name'=>'admin',
            'email'=>'admin@qq.com',
            'password'=>'b605e86d02eef8bfd0646f6a704c17c9',
            'salt'=>'1234',
        ]];
        foreach ($lists as $list) {
            Admin::create($list);
        }
    }
}
