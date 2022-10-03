<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beers = [
            [
                'brewer_id' => 1,
                'name' => 'Heineken Pilsener',
                'percentage' => 500,
                'description' => 'Heineken Pilsener is beroemd over de hele wereld.'.
                    'Bekend vanwege zijn kenmerkende smaak, die vooral te danken is aan de Heineken A-gist.'
            ],
            [
                'brewer_id' => 2,
                'name' => 'Brand Pilsener',
                'percentage' => 500,
                'description' =>
                    'Brand Pilsener wordt gebrouwen met meer hop dan veel andere pilseners. '.
                    'Dat geeft deze Pilsener zijn eigen, krachtige smaak. '.
                    'Het volledig volmout gebrouwen Pils van Brand kenmerkt zich door de perfecte balans tussen hopbitterheid en hoparoma. '.
                    'Dit komt omdat Brand twee keer hop toevoegt tijdens het brouwproces. '.
                    'Bierkenners weten dit bier te waarderen. '.
                    'Tijdens de Dutch Beer Challenge 2020 werd Brand Pilsener met goud bekroond in de categorie Pilsener.'
            ],
            [
                'brewer_id' => 3,
                'name' => 'Hertog Jan Pilsener',
                'percentage' => 510,
                'description' => 'Het visitekaartje van Hertog Jan is zonder meer de pilsener. '.
                    'De ingrediënten voor dit bier zijn met de grootste zorg geselecteerd. '.
                    'Alleen de rijkste mout, de mooiste hop en kristalhelder natuurzuiver water uit de Eiffel zijn goed genoeg. '.
                    'Deze ingrediënten en de kunde van de brouwers zorgen voor goudgele kleur en de mooie volle schuimkraag. '.
                    'De zachte smaak en de aangenaam bittere afdronk zijn karakteristiek voor Hertog Jan Pilsener.'
            ],
            [
                'brewer_id' => 4,
                'name' => 'Jopen Nederwit',
                'percentage' => 550,
                'description' => 'Jopen Nederwit is een mix van Witbier en New England IPA. '.
                    'Een fris en fruitig bier met een alcoholpercentage van 5,5%.'
            ],
            [
                'brewer_id' => 5,
                'name' => 'Hoegaarden Wit',
                'percentage' => 490,
                'description' => 'Hoegaarden Wit, of Hoegaarden Blanche is een witbier, zoals witbier bedoeld is. '.
                    'Dit bier werd groot gemaakt door biericoon Pierre Célis. '.
                    'Zonder zijn inspanningen hadden we mogelijk de hele stijl witbier niet meer gekend. '.
                    'Dat zou zonde zijn, want deze Hoegaarden Wit is een regelrechte klassieker. '.
                    'Dit is een perfect terrasbier, een dorstlesser en verfrissend bier voor alle dagen van de week.'
            ],
            [
                'brewer_id' => 6,
                'name' => 'La Trappe Witte Trappist',
                'percentage' => 550,
                'description' => 'La Trappe Witte Trappist is het enige witbier dat het logo Authentic Trappist Product mag voeren. '.
                    'Het is een fris, lichtzure dorstlesser, waar je makkelijk een tweede flesje of glas van bestelt. '.
                    'Het bier heeft een lichtbittere, droge afdronk.'
            ]

        ];
        DB::table('beers')->insert($beers);
    }

}
