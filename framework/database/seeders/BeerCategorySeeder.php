<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beer_category')->delete();
        $data = [
            [
                'beer_id' => 1,
                'category_id'=> 1
            ],
            [
                'beer_id' => 2,
                'category_id'=> 1
            ],
            [
                'beer_id' => 3,
                'category_id'=> 1
            ],
            [
                'beer_id' => 4,
                'category_id'=> 2
            ],
            [
                'beer_id' => 5,
                'category_id'=> 2
            ],
            [
                'beer_id' => 6,
                'category_id'=> 2
            ]

        ];

        DB::table('beer_category')->insert($data);
    }

}
