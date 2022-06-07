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
            'title'       => $this->faker->title(),
            'tip'         => $this->faker->sentence(3),
            'summary'     => $this->faker->sentence(random_int(10, 20)),
            'description' => $this->faker->sentence(3),
            'author'      => User::all()->first(),
            'verified'    => $this->faker->numberBetween(0, 1),
        ];
    }
}
