<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        Table::create([

            "table_name" => "prodouct",
            "columns" => ["name", "price"],
            "rows" => [
                [

                    "name" => "car",
                    "price" => 700
                ],
                [
                    "name" => "ball",
                    "price" => 700
                ]
            ]


        ]);






        Table::create([

            "table_name" => "sports_teams",
            "columns" => ["name", "country"],
            "rows" => [
                [

                    "name" => "real_madrid",
                    "country" => "spanish"
                ],
                [
                    "name" => "liverpool",
                    "country" => "england"
                ],
                [
                    "name" => "al-ahly",
                    "country" => "egypt"
                ]

            ]


        ]);







        Table::create([

            "table_name" => "post",
            "columns" => ["news", "sports"],
            "rows" => [
                [

                    "news" => "political_news",
                    "sports" => "local_sports"
                ],
                [
                    "news" => "world_news",
                    "sports" => "world_sports"
                ]
            ]


        ]);



    
    }
}
