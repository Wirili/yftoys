<?php

use Illuminate\Database\Seeder;
use App\Models\Yangpinzl;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lists=[];
        for($i=1;$i<=1000;$i++){
            $lists[]=[
                'bianhao'=>$i,
                'pinming'=>'商品'.$i
            ];
        }
        foreach ($lists as $list) {
            Yangpinzl::create($list);
        }
    }
}
