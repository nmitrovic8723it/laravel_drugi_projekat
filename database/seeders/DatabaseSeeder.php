<?php

use Database\Seeders\RoleSeeder;   // Dodaj ovo!
use Database\Seeders\KategorijaSeeder;
use Database\Seeders\ProizvodSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\NarudzbinaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call([
            RoleSeeder::class, 
            KategorijaSeeder::class,
            ProizvodSeeder::class,
            UserSeeder::class,
            NarudzbinaSeeder::class,
        ]);
    }
}
