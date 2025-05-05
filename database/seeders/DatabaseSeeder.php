<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Likes;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(30)->create();
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(FollowersSeeder::class);



    }
}
