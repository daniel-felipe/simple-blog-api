<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        $title = fake()->sentence();

        return [
            'title' => $title,
            'slug' => str()->slug($title),
            'thumbnail' => fake()->name() . '.png',
            'user_id' => User::factory()->create(),
            'tag_id' => Tag::factory()->create(),
        ];
    }
}
