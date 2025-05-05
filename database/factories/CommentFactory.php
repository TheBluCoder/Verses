<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            "content" => $this->faker->realTextBetween(20,50),
            "commentable_id" => $this->faker->randomElement(Post::all()->pluck('id')->toArray()),
            "commentable_type" => Post::class,
            "user_id" => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
        ];
    }



    public function forComments(): Factory|CommentFactory
    {
        return $this->state(function (array $attributes) {
            return [
                "commentable_id" => Comment::factory(),
                "commentable_type" => Comment::class,
            ];
        });
    }
}
