<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->count() == 0){
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => env('INITIAL_USER_NAME'),
             'email' => env('INITIAL_USER_EMAIL'),
             'password' => bcrypt(env('INITIAL_USER_PASSWORD')),
             'is_admin' => 1,

         ]);

        $this->call([
            BrewersSeeder::class,
            BeerSeeder::class,
            CategorySeeder::class,
            BeerCategorySeeder::class,
            ReviewsSeeder::class
        ]);
    } else {
        echo("ERROR:Database NOT empty. Use: `php artisan migrate:fresh --seed` NOTE: WILL DELETE ALL DATA");
        }
    }
}
