<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $data =[
            [
                'name' => 'Pilsener'
            ],
            [
                'name' => 'Witbier'
            ]
        ];
        DB::table('categories')->insert($data);
    }
}
