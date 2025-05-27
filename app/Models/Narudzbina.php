<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narudzbina extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ime_prezime',
        'adresa',
        'broj_telefona',
        'status',
        'napomena',
    ];
    

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function proizvodi()
    {
        return $this->belongsToMany(Proizvod::class)->withTimestamps();
    }
}
