<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence,
            'slug' => fake()->slug(3),
            'image' => fake()->imageUrl,
            'body' => fake()->paragraph(10), //10 sentences
            'published_at' => fake()->dateTimeBetween('-1 Week', '+1 Week'),
            'featured' => fake()->boolean(10) //10 percent
        ];
    }
}