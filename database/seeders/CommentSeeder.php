<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $posts = Post::all();
        if ($posts->isEmpty()) {
            $posts = Post::factory()->count(10)->create();
        }

        $comments = Comment::factory(20)->recycle($posts)->create();

        Comment::factory(20)->forComments()->recycle($comments)->create();
    }
}
