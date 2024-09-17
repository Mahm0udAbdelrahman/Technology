<?php

namespace Database\Seeders;

use App\Models\Trending;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trending::factory()->count(10)->create();
    }
}
