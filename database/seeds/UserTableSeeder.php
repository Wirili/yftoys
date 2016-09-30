<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $lists = [[
            'name' => '001',
            'email' => '001@qq.com',
            'password' => \Hash::make('111111')
        ]];
        foreach ($lists as $list) {
            User::create($list);
        }
    }
}
