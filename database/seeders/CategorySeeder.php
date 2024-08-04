<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
            'description' => 'Programming Category',
        ]);

        Category::create([
            'name' => 'UI-UX',
            'slug' => 'ui-ux',
            'description' => 'UI-UX Category',
        ]);

        Category::create([
            'name' => 'Desain Grafis',
            'slug' => 'desain-grafis',
            'description' => 'Desain Grafis Category',
        ]);

        Category::create([
            'name' => 'Mobile Development',
            'slug' => 'mobile-development',
            'description' => 'Mobile Development Category',
        ]);
    }
}
