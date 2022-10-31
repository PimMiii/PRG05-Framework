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
                    'description'=>
                        "Het lijkt een verhaal uit een jongensboek: van microbrouwer tot een multinational in de bier- en drankensector.".
                        " Het is geen boekverhaal, het is hoe het bierbrouwer Heineken NV. daadwerkelijk is vergaan.".
                        " Het Nederlandse bedrijf is actief in ruim tweehonderd landen en Heineken behoort tot een van de grootste brouwerijen van de wereld.".
                        " Niet de grootste, dat is het Belgische Anheuser-Busch Inbev.".
                        " Maar met meer dan 218 miljoen hectoliter bier kun je Heineken geen kleine speler noemen.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Brand Bierbrouwerij',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'description'=>
                        "Brand Bierbrouwerij is de oudste brouwerij van Nederland.".
                        " Deze brouwerij werd in 1340 opgericht in Wijlre, Zuid-Limburg.".
                        " 19 april 1989 werd deze familiebrouwerij overgenomen door Heineken.".
                        " Sinds een aantal jaren profileert Brand zich steeds meer als brouwer van ambachtelijke, bijzondere bieren.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Hertog Jan Brouwerij',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'description'=>
                        "In het Limburgse Arcen zijn een hoop bezienswaardigheden te vinden, zo ook de Hertog Jan Brouwerij.".
                        " De brouwerij bestaat sinds 1915 en heeft sindsdien nog elke dag dezelfde liefde voor bier, dan wel niet meer.".
                        " Misschien dat zij ook daarom jaarlijks in de prijzen blijven vallen.".
                        " Zo is hun pilsener verkozen tot ‘Product van het jaar 2015-1016’ en won de Grand Prestige goud tijdens de World Cup.".
                        " Ook is Hertog Jan al meerdere malen tot Biermerk van het Jaar verkozen.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Jopen Bier',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'description'=>
                        "Jopen Bier is in 1994 opgericht in Haarlem.".
                        " Deze stad heeft al sinds de 14e eeuw een rijke brouwgeschiedenis.".
                        " Toentertijd groeide Haarlem tot één van de belangrijkste brouwsteden van Nederland.".
                        " De brouwerij is ondertussen niet meer uit de stad weg te denken!",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Anheuser-Busch InBev',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'description'=>
                        "Al sinds 1968 is de Anheuser-Busch InBev actief op de markt.".
                        " In 1995 worden in Nederland de bieractiviteiten van Allied Breweries overgenomen.".
                        " Het hoofdkantoor van Inbrew staat tot op de dag van vandaag nog steeds op het brouwerijterrein in Breda.".
                        " De naam van de brouwerij is in 2006 veranderd van Inbrew Nederland naar: InBev Nederland.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Bierbrouwerij De Koningshoeven',
                    'user_id' => 1,
                    'is_visible' => 1,
                    'description'=>
                        "Bij Abdij De Koningshoeven in Berkel-Enschot wordt al sinds 1884 eigen trappistenbier gebrouwen: La Trappe.".
                        " De La Trappe Trappisten zijn zeer verschillend van karakter, maar tonen ook overeenkomsten.".
                        " Met aandacht, passie en traditioneel vakmanschap komen deze unieke bieren tot stand volgens jarenoude, geheime receptuur.".
                        " Dit gebeurt nog altijd binnen de context en de muren van de abdij, onder toezicht van een monnik.".
                        " Dat is misschien ook een verklaring voor de rust die in en rond deze abdij hangt, ondanks de bedrijvigheid die nodig is om bier te produceren en wereldwijd te leveren als onderdeel van Bavaria.",
                    'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                    'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Brouwerij Liefmans',
                    'user_id' => 3,
                    'is_visible' => 1,
                    'description'=>
                        "Rond 1770 komt Jacobus Liefmans naar Oudenaarde, deze brouwerij is dus meer dan 200 jaar oud.".
                        " Het speciale brouwproces gaat volgens een meer dan 300 jaar oud recept.".
                        " Al het oude brouwmateriaal zijn allemaal nog in rood koper dat zie je veel bij oude Engelse brouwerijen.".
                        " In december 2007 verklaarde de rechtbank brouwerij Liefmans failliet.".
                        " In 2008 volgde de verklaring dat Duvel Moortgat de brouwerij heeft overgenomen.".
                        " In juni 2009 brengt brouwerij Liefmans een nieuw soort bier uit: fruitbier.",
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
