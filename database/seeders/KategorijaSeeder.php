<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategorija;

class KategorijaSeeder extends Seeder
{
    public function run()
    {
        Kategorija::create(['naziv' => 'Sunčane naočare']);
        Kategorija::create(['naziv' => 'Dioptrijske naočare']);
        Kategorija::create(['naziv' => 'Kontaktna sočiva']);
        Kategorija::create(['naziv' => 'Dodaci']);
        Kategorija::create(['naziv' => 'Ostalo']);
    }
}
