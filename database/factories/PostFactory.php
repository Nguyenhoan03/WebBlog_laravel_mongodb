<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;

    public function definition()
    {
        return [
            'author_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraphs(3, true),
            'tags' => $this->faker->words(5, false),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'views' => $this->faker->numberBetween(0, 1000),
            'likes' => $this->faker->numberBetween(0, 1000),
            'comments_count' => $this->faker->numberBetween(0, 100),
        ];
    }
}
