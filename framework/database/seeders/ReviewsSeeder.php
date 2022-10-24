<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('reviews')->count() == 0) {
            $data = [
                [
                    'beer_id' => 1,
                    'user_id' => 1,
                    'rating' => 10,
                    'comment' => 'Heerlijk, als je van grachtenwater houd. Voor ieder ander is het ronduit smerig.',
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'beer_id' => 2,
                    'user_id' => 1,
                    'rating' => 80,
                    'comment' => 'Kijk uit! Dit gerstenat brand zo een gat in je portemonnee, aangezien je deze kan blijven drinken.',
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'beer_id' => 3,
                    'user_id' => 1,
                    'rating' => 90,
                    'comment' => 'Je waant jezelf een échte Hertog, tijdens het nuttigen van deze goudgele rakker! ',
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'beer_id' => 1,
                    'user_id' => 1,
                    'rating' => 15,
                    'comment' => 'Heineken is lekker als je 3 weken lang niks hebt gedronken.',
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'beer_id' => 1,
                    'user_id' => 1,
                    'rating' => 20,
                    'comment' => 'Een tweede date zit er niet in voor mij. ',
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
            ];
            DB::table('reviews')->insert($data);
        } else {
            echo("ERROR:Table(reviews) NOT empty. Use: `php artisan migrate:fresh --seed` NOTE: WILL DELETE ALL DATA");
        }
    }
}
