<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv', 'cena', 'opis', 'slika', 'kategorija_id', 'istaknut'
    ];

    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class);
    }

    public function narudzbine()
    {
        return $this->belongsToMany(Narudzbina::class);
    }
}
