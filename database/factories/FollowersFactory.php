<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FollowersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'follower_id' => User::factory(),
            'following_id'=> User::factory(),
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
