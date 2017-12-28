<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         // $this->call(CategoriesTableSeeder::class);
         // $this->call(UserTableSeeder::class);
         // $this->call(PostsTableSeeder::class);
         $this->call(TagTableSeeder::class);

    }
}
