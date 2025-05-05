<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Likes;
use App\Models\Post;
use App\Traits\HasLikesAndIsLikedScope;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class likeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $post = Post::withoutGlobalScope(HasLikesAndIsLikedScope::class)->get();
        $comment = Comment::withoutGlobalScope(HasLikesAndIsLikedScope::class)->get();
        Likes::factory(100)->forPost()->recycle($post)->create();
        Likes::factory(100)->forComment()->recycle($comment)->create();
    }
}
