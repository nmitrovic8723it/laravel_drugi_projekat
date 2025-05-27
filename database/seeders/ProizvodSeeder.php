<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proizvod;

class ProizvodSeeder extends Seeder
{
    public function run()
    {
        Proizvod::create([
            'naziv' => 'Ray-Ban Sunčane naočare',
            'cena' => 15000,
            'opis' => 'Original Ray-Ban sunčane naočare za zaštitu od UV zračenja.',
            'slika' => 'slike/GBUT4XXqUSEsyiYuLqv8dXs9wYFtcT2TlcOiJmTS.jpg',
            'kategorija_id' => 2,
            'istaknut' => true
        ]);
        
        Proizvod::create([
            'naziv' => 'Oakley sportske naočare',
            'cena' => 20000,
            'opis' => 'Naočare za sportiste sa vrhunskom zaštitom i dizajnom.',
            'slika' => 'slike/ollv2MVyxz4n26P2ojWZ2E90bdRlt4AAzA5FwKTa.webp',
            'kategorija_id' => 2,
            'istaknut' => true
        ]);

        Proizvod::create([
            'naziv' => 'Dioptrijske naočare Hugo Boss',
            'cena' => 12000,
            'opis' => 'Naočare za svakodnevno nošenje sa elegantnim okvirom.',
            'slika' => 'slike/06EcEZNNygSfjqfXT81Ro6B7lt3G78U4enPybh8x.webp',
            'kategorija_id' => 1,
            'istaknut' => true
        ]);

        Proizvod::create([
            'naziv' => 'Air Optix Hydra Glyde',
            'cena' => 3000,
            'opis' => 'Air Optix plus HydraGlyde su prva sočiva koja kombinuju dve izuzetno napredne tehnologije.',
            'slika' => 'slike/tlocET6Jhd2fLhPmaZuKACfQsw47w9noBV80ujvJ.jpg',
            'kategorija_id' => 3,
            'istaknut' => false
        ]);

        Proizvod::create([
            'naziv' => 'Kožna futrola',
            'cena' => 2000,
            'opis' => 'Elegantna i praktična, izrađena od visokokvalitetne kože koja štiti vaše naočare od ogrebotina i oštećenja.',
            'slika' => 'slike/pEMlqirYx1druG5uJzgMEalYEqkW1Kn03UM9LypB.jpg',
            'kategorija_id' => 4,
            'istaknut' => false
        ]);
    }
}
