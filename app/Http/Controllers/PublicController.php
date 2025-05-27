<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use App\Models\Narudzbina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{
    public function home()
    {
        $proizvodi = Proizvod::where('istaknut', 1)->take(4)->get();
        return view('public.home', compact('proizvodi'));
    }

    public function katalog()
    {
        $proizvodi = Proizvod::all();
        return view('public.katalog', compact('proizvodi'));
    }


    public function proizvod($id)
    {
        // Prikaz jednog proizvoda
        $proizvod = Proizvod::findOrFail($id);
        return view('public.proizvod', compact('proizvod'));
    }

    public function kontakt()
    {
        // Kontakt stranica
        return view('public.kontakt');
    }

    


    public function mojeNarudzbine()
    {
        $narudzbine = Narudzbina::with('proizvodi')->where('user_id', Auth::id())->get();
        return view('public.moje-narudzbine', compact('narudzbine'));
    }

    public function narudzbina($id)
    {
        $narudzbina = Narudzbina::findOrFail($id);
    
        return view('public.narudzbina', compact('narudzbina'));
    }

    public function formaNarudzbine($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        return view('public.naruci', compact('proizvod'));
    }

    public function naruci(Request $request, $id)
    {
        $request->validate([
            'ime_prezime' => 'required|string|max:255',
            'adresa' => 'required|string|max:255',
            'broj_telefona' => 'required|string|max:20',
        ]);

        $proizvod = Proizvod::findOrFail($id);

        $narudzbina = new Narudzbina();
        $narudzbina->user_id = Auth::id();
        $narudzbina->ime_prezime = $request->ime_prezime;
        $narudzbina->adresa = $request->adresa;
        $narudzbina->broj_telefona = $request->broj_telefona;
        $narudzbina->save();

        $narudzbina->proizvodi()->attach($proizvod->id);

        return redirect()->route('public.moje-narudzbine')->with('success', 'Narudžbina uspešno kreirana!');
    }

    public function updateStatus($id)
    {
        $narudzbina = Narudzbina::findOrFail($id);

        if ($narudzbina->user_id !== Auth::id()) {
            abort(403, 'Nemate pristup ovoj narudžbini.');
        }

        if ($narudzbina->status !== 'Preuzeto') {
            $narudzbina->status = 'Preuzeto';
            $narudzbina->save();
        }

        return redirect()->back()->with('success', 'Status uspešno ažuriran!');
    }



}
