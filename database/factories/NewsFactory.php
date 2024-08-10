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
            'content' => fake()->sentence(200),
            'content_2' => fake()->sentence(127),
            'content_3' => fake()->sentence(161),
            'content_4' => fake()->sentence(130),
            'content_5' => fake()->sentence(50),
            'location' => 'POLMED',
            'slug' => fake()->slug,
            'image' => 'helloTech.webp',
            'category_id' => Category::factory(),  // Membuat category baru untuk setiap news
            'author_id' => User::factory(), // Membuat user baru untuk setiap news
            'top' => fake()->randomElement(['yes', 'no'])
        ];
    }
}
