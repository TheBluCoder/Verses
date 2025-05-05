<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Likes>
 */
class LikesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id'=> User::factory(),
            'likeable_id'=> fake()->randomElement([Post::factory(), Comment::factory()]),
            'likeable_type'=> fake()->randomElement([Post::class, Comment::class]),
        ];
    }

    public function forPost ()
    {
        return $this->state([
            'likeable_id'=> Post::factory(),
            'likeable_type'=> Post::class,
        ]);
    }

    public function forComment()
    {
        return $this->state([
            'likeable_id'=> Comment::factory(),
            'likeable_type'=> Comment::class,
        ]);
    }

}
