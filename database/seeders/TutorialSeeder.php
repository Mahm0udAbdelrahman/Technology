<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tutorials')->insert([
            [
                'title' => 'Automating Report Generation',
                'content' => 'This tutorial walks through setting up automated report generation on a scheduled basis, including emailing reports to relevant stakeholders.',
                'image' => null,
                'video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Best Practices for Writing Recommendations',
                'content' => 'Recommendations should be clear, concise, and tailored to the individual or product. Focus on key strengths and provide examples when possible.',
                'image' =>  null,
                'video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Understanding Dashboard Analytics',
                'content' => 'This tutorial explains the key analytics available on the home dashboard, such as performance metrics, traffic data, and user engagement statistics.',
                'image' => 'dashboard-analytics.jpg',
                'video' => 'dashboard-analytics-video.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}