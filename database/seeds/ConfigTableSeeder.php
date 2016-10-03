<?php

use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigTableSeeder extends Seeder
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
            'code'=>'tab_info',
            'type'=>'group'
        ],[
            'code'=>'tab_basic',
            'type'=>'group'
        ],[
            'parent_id'=>1,
            'code'=>'web_title',
            'type'=>'text',
            'value'=>'网站'
        ],[
            'parent_id'=>1,
            'code'=>'web_desc',
            'type'=>'text',
            'value'=>'网站'
        ],[
            'parent_id'=>1,
            'code'=>'web_keys',
            'type'=>'text',
            'value'=>'网站'
        ],[
            'parent_id'=>1,
            'code'=>'icp',
            'type'=>'text',
            'value'=>'粤ICP备15067622号-1'
        ],[
            'parent_id'=>1,
            'code'=>'web_close',
            'type'=>'select',
            'store_range'=>'0,1',
            'value'=>'1'
        ],[
            'parent_id'=>1,
            'code'=>'web_qq',
            'type'=>'text',
            'value'=>'1'
        ]];
        foreach ($lists as $list) {
            Config::create($list);
        }
    }
}
