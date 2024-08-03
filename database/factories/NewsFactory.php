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
            'image' => '/assets/images/helloTech.webp',
            'category' => Category::factory(),  // Membuat category baru untuk setiap news
            'author' => User::factory(), // Membuat user baru untuk setiap news
            'published_at' => fake()->dateTime,
        ];
    }
}
