<?php

namespace Database\Seeders;

use App\Models\Followers;
use App\Models\User;
use Database\Factories\FollowersFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        Followers::factory(500)->recycle($users)->create();
    }
}
