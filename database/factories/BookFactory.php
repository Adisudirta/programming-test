<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'author_id' => fake()->numberBetween(1, 1000),
            'category_id' => fake()->numberBetween(1, 3000),
            'avg_ratings' => fake()->numberBetween(1, 100),
            'voters' => fake()->numberBetween(1, 5000),
        ];
    }
}
