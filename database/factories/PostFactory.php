<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

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
    public function definition(): array
    {
        $randomPoem = Http::get("https://poetrydb.org/random")->json()[0];

        return [
            //
            "title" => $randomPoem["title"],
            "user_id" => fake()->randomElement(User::all()->pluck('id')->toArray()),
            "content" =>  implode("\n", $randomPoem["lines"]),
            "published"=> $this->faker->randomElement([true,false]),
            "created_at"=> $this->faker->dateTimeBetween('-1 years', 'now'),
            "updated_at"=> $this->faker->dateTimeBetween('-1 years', 'now')
        ];
    }
}
