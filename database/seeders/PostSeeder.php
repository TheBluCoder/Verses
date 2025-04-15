<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::factory()->create([
            "title"=> "Demagogue (for my late mother on her birthday)",
            "content"=> "It's a hard day
                Mama would have been 81 today
                I hoped against hope for a different result in this election

                I thought about how she would be glad
                A woman at last the leader of our land...",
            "published"=> true
        ]);

        Post::factory(50)->create();
    }
}
