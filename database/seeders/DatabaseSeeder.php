<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // cara malakukan factory manual
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // cara melakukan factory satu
        // User::factory(10)->create();



        // cara memanggil nama seeder (UserSeeder dll)
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);

        // cara melakukan factory lebih dari satu
        Post::factory(10)->recycle([
            // Category::factory(3)->create(),
            Category::all(),
            User::all(),
            Post::all()

        ])->create();

    }
}