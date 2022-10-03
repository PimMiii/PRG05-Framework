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
        if(DB::table('reviews')->count()==0){
        $data = [
            [
                'beer_id' => 1,
                'user_id' => 1,
                'rating' => 10,
                'comment' => 'Heerlijk, als je van grachtenwater houd. Voor ieder ander is het ronduit smerig.',
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
