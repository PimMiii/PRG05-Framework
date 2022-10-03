<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrewersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brewers')->delete();
        $data = [
            [
              'name' => 'Heineken Nederland'
            ],
            [
                'name' => 'Brand Bierbrouwerij'
            ],
            [
                'name' => 'Hertog Jan Brouwerij'
            ],
            [
                'name' => 'Jopen Bier'
            ],
            [
                'name' => 'Anheuser-Busch InBev'
            ],
            [
                'name' => 'Bierbrouwerij De Koningshoeven'
            ],

        ];
        DB::table('brewers')->insert($data);
    }
}
