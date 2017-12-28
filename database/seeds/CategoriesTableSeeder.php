<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorires =[
        	['name' => 'Thể thao','slug' => 'the-thao'],
        	['name' => 'Xã hội','slug' => 'xa-hoi'],
        	['name' => 'Bóng Đá','slug' => 'bong-da'],
        	['name' => 'Chính Trị','slug' => 'chinh-tri'],
        	['name' => 'Pháp Luật','slug' => 'phap-luat'],
        	['name' => 'Giải Trí','slug' => 'giai-tri']
        ];
        DB::table('categories')->insert($categorires);
    }
}
