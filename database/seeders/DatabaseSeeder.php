<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Subscription;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();
        Post::factory()->count(100)->create();
        Comment::factory()->count(10)->create();
        Subscription::factory()->count(10)->create();
        User::create([
            'name' => 'Admin nmh',
            'email' => 'nmh@gmail.com',
            'password' => bcrypt('hp1'), 
            'google_id' => 'NULL',
        ]);

     
    }
}
