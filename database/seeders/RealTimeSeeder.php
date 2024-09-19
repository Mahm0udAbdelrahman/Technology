<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealTimeSeeder extends Seeder
{
    public function run()
    {
        $charts = [
            [
                'type' => 'line-charts',
                'title' => 'Product Trends by Month',
                'text' => 'text',
                'series' => json_encode([
                    [
                        'name' => 'STOCK ABC',
                        'data' => 'series.monthDataSeries1.prices'
                    ]
                ], JSON_UNESCAPED_SLASHES), // Ensure slashes are not escaped
                'categories' => json_encode(["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"], JSON_UNESCAPED_SLASHES),
                'real_time' => 1,
            ],
            [
                'type' => 'area-charts',
                'title' => 'smooth',
                'text' => 'series1',
                'series' => json_encode([
                    ['name' => 'series1', 'data' => [31, 40, 28, 51, 42, 109, 100]],
                    ['name' => 'series2', 'data' => [11, 32, 45, 32, 34, 52, 41]]
                ], JSON_UNESCAPED_SLASHES),
                'categories' => json_encode([
                    "2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"
                ], JSON_UNESCAPED_SLASHES),
                'real_time' => 0,
            ],
            [
                'type' => 'column-charts',
                'title' => 'rounded',
                'text' => 'text',
                'series' => json_encode([
                    ['name' => 'Net Profit', 'data' => [44, 55, 57, 56, 61, 58, 63, 60, 66]],
                    ['name' => 'Revenue', 'data' => [76, 85, 101, 98, 87, 105, 91, 114, 94]],
                    ['name' => 'Free Cash Flow', 'data' => [35, 41, 36, 26, 45, 48, 52, 53, 41]]
                ], JSON_UNESCAPED_SLASHES),
                'categories' => json_encode(["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"], JSON_UNESCAPED_SLASHES),
                'real_time' => 1,
            ]
        ];

        DB::table('real_times')->insert($charts);
    }
}
