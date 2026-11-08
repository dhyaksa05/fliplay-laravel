<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'title' => fake()->unique()->words(3, true),
        'type' => fake()->randomElement(['anime', 'drama', 'manga', 'light novel']),
        'genre' => fake()->randomElement(['Action', 'Drama', 'Romance', 'Fantasy', 'Comedy']),
        'description' => fake()->sentence(),
    ];
}
}
