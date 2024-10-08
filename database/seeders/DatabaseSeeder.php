<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {
        $this->call([CategorySeeder::class]);


        News::factory(20)->recycle([
            Category::all(),
            User::factory(3)->create()
        ])->create();
    }
}
