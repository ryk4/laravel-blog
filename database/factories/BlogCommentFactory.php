<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogComment>
 */
class BlogCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'parent_comment' => null,
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'comment' => $this->faker->sentence,
            'votes' => 0
        ];
    }
}
