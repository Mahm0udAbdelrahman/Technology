<?php

namespace Database\Seeders;

use App\Models\UserGuide;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserGuide::factory()->count(10)->create()->each(function ($userGuide) {
            // Seed some child UserGuide entries
            UserGuide::factory()->count(2)->create([
                'sup_menu_id' => $userGuide->id,
            ]);
        });
    }
}
