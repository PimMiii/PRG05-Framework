<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() == 0) {
            $data = [
                [
                    'name' => env('ADMIN_USER_NAME'),
                    'email' => env('ADMIN_USER_EMAIL'),
                    'password' => bcrypt(env('ADMIN_USER_PASSWORD')),
                    'is_admin' => 1,
                    'is_verified' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => env('HEINEKEN_USER_NAME'),
                    'email' => env('HEINEKEN_USER_EMAIL'),
                    'password' => bcrypt(env('HEINEKEN_USER_PASSWORD')),
                    'is_admin' => 0,
                    'is_verified' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => env('LIEFMANS_USER_NAME'),
                    'email' => env('LIEFMANS_USER_EMAIL'),
                    'password' => bcrypt(env('LIEFMANS_USER_PASSWORD')),
                    'is_admin' => 0,
                    'is_verified' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => env('VERIFIED_USER_NAME'),
                    'email' => env('VERIFIED_USER_EMAIL'),
                    'password' => bcrypt(env('VERIFIED_USER_PASSWORD')),
                    'is_admin' => 0,
                    'is_verified' => 1,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => env('NONVERIFIED_USER_NAME'),
                    'email' => env('NONVERIFIED_USER_EMAIL'),
                    'password' => bcrypt(env('NONVERIFIED_USER_PASSWORD')),
                    'is_admin' => 0,
                    'is_verified' => 0,
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
            ];
            DB::table('users')->insert($data);
        } else {
            echo("ERROR:Table(users) NOT empty. Use: `php artisan migrate:fresh --seed` NOTE: WILL DELETE ALL DATA");
        }
    }
}
