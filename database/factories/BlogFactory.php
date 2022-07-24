<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(3, 6)),
            'slug' => $this->faker->slug(rand(3, 6)),
            'tip' => $this->faker->sentence(3),
            'summary' => $this->faker->sentence(rand(8, 13)),
            'guide' => $this->faker->sentence(3),
            'user_id' => User::all()->first(),
            'verified' => $this->faker->numberBetween(0, 1),
        ];
    }
}
