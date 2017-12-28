<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$tags = [
    		['name'=> "Thể thao", 'slug' => 'the-thao'],
    		['name'=> "Bóng đá", 'slug' => 'bong-da'],
    		['name'=> "Thời sự", 'slug' => 'thoi-su'],
    		['name'=> "Chính trị", 'slug' => 'chinh-tri'],
    		['name'=> "Quần áo", 'slug' => 'quan-ao'],
    		['name'=> "FootBall", 'slug' => 'foot-ball'],
    		['name'=> "Food", 'slug' => 'food']
    	];
        DB::table('tags')->insert($tags);
    }
}
