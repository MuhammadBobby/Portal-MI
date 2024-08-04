<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'content' => fake()->paragraph,
            'slug' => fake()->slug,
            'image' => 'helloTech.webp',
            'category_id' => Category::factory(),  // Membuat category baru untuk setiap news
            'author_id' => User::factory(), // Membuat user baru untuk setiap news
            'top' => fake()->randomElement(['yes', 'no'])
        ];
    }
}
