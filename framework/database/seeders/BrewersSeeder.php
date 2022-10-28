<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        if (DB::table('brewers')->count() == 0) {
            $data = [
                [
                    'name' => 'Heineken Nederland',
                    'user_id' => 2,
                    'is_visible' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Brand Bierbrouwerij',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Hertog Jan Brouwerij',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Jopen Bier',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Anheuser-Busch InBev',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Bierbrouwerij De Koningshoeven',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Brouwerij Liefmans',
                    'user_id' => 3,
                    'is_visible' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],

            ];
            DB::table('brewers')->insert($data);
        } else {
            echo("ERROR:Table(brewers) NOT empty. Use: `php artisan migrate:fresh --seed` NOTE: WILL DELETE ALL DATA");
        }
    }
}
