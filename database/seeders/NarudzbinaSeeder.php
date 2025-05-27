<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Narudzbina;


class NarudzbinaSeeder extends Seeder
{
    public function run()
    {
        $narudzbina = Narudzbina::create([
            'user_id' => 1,
            'status' => 'Na čekanju',
            'ime_prezime' => 'Marko Markovic',         
            'adresa' => 'Bulevar Kralja Aleksandra 73', 
            'broj_telefona' => '0601812512',           
        ]);

        $narudzbina->proizvodi()->attach([1]);

        $narudzbina = Narudzbina::create([
            'user_id' => 2,
            'status' => 'Na čekanju',
            'ime_prezime' => 'Milica Milicic',      
            'adresa' => 'Nemanjina 9', 
            'broj_telefona' => '06032565344',       
        ]);

        $narudzbina->proizvodi()->attach([1]);

        $narudzbina = Narudzbina::create([
            'user_id' => 3,
            'status' => 'Na čekanju',
            'ime_prezime' => 'Luka Đorđević',      
            'adresa' => 'Kralja Milana 3', 
            'broj_telefona' => '0601234567',       
        ]);

        $narudzbina->proizvodi()->attach([3]);

        $narudzbina = Narudzbina::create([
            'user_id' => 2,
            'status' => 'Na čekanju',
            'ime_prezime' => 'Marko Jovanović',         
            'adresa' => 'Vuka Karadzica 7', 
            'broj_telefona' => '06654254633',        
        ]);

        $narudzbina->proizvodi()->attach([4]);

        $narudzbina = Narudzbina::create([
            'user_id' => 2,
            'status' => 'Na čekanju',
            'ime_prezime' => 'Ana Petrović',         
            'adresa' => 'Kneza Mihaila 7', 
            'broj_telefona' => '06654254633',           
        ]);

        $narudzbina->proizvodi()->attach([2]);
    }
}
