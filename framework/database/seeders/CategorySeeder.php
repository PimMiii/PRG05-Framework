<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        if (DB::table('categories')->count() == 0) {
            $data = [
                [
                    'name' => 'Pilsener',
                    'is_visible' => 1,
                    'description' =>
                        "Pils of Pilsener is nog steeds veruit de meest gedronken bierstijl.".
                        " Het is een ondergistend, soepel en subtiel biertype met een laag alcoholpercentage en een behoorlijke hoeveelheid koolzuur.".
                        " De kleur is licht- tot goudgeel.".
                        " Het bier heeft een stevige witte schuimkraag, die lang blijft staan.".
                        " Het karakter is fris, crisp en dorstlessend.".
                        " Nederlandse Pilseners zijn vooral moutig zoet en bitter van smaak.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Witbier',
                    'is_visible' => 1,
                    'description' =>
                        "Witbier is een verfrissend fruitig, lichtzuur bier vaak gebrouwen met koriander en curacaoschillen (sinaasappelschillen).".
                        " Witbier is een eeuwenoude bierstijl, maar onlosmakelijk verbonden met Pierre Célis, die de bierstijl halverwege de vorige eeuw redde van de ondergang en met Hoegaarden Witbier weer op de kaart zette.".
                        " Nu is Witbier weer een veel gedronken en gewaardeerde bierstijl, zeker in de zomer.".
                        " Verwar Witbier niet met de Duitse bierstijl Weizen.".
                        " Witbier is gebrouwen met ongemoute tarwe en er worden kruiden toegevoegd, die de frisse smaak geven, Weizen is gebrouwen volgens het Duitse Reinheitsgebot met gemoute tarwe en kent geen toevoegingen.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Fruitbier',
                    'is_visible' => 1,
                    'description' =>
                        "Bier gebrouwen met één of meerdere soorten fruit, die een kenmerkende fruitige smaak hebben.".
                        " Het basisbier is geen lambiek.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Alcoholvrij',
                    'is_visible' => 0,
                    'description' =>
                        "Bieren zonder alcohol zijn de laatste jaren in opkomst.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],

            ];
            DB::table('categories')->insert($data);
        } else {
            echo("ERROR:Table(categories) NOT empty. Use: `php artisan migrate:fresh --seed` NOTE: WILL DELETE ALL DATA");
        }
    }
}
