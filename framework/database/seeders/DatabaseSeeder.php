<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => env('INITIAL_USER_NAME'),
             'email' => env('INITIAL_USER_EMAIL'),
             'password' => bcrypt(env('INITIAL_USER_PASSWORD'))
         ]);

        $this->call([
            BrewersSeeder::class,
            BeerSeeder::class,
            CategorySeeder::class,
            BeerCategorySeeder::class,
            ReviewsSeeder::class
        ]);
    }
}
