<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(UserGuideSeeder::class);
        // $this->call(TrendingSeeder::class);
        // $this->call(RealTimeSeeder::class);
        // $this->call(TableSeeder::class);
        $this->call(TutorialSeeder::class);

    }
}
