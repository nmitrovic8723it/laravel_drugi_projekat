<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use App\Models\Kategorija;
use Illuminate\Http\Request;

class ProizvodController extends Controller
{
    public function index()
    {
        $proizvodi = Proizvod::all();
        return view('admin.proizvodi.index', compact('proizvodi'));
    }

    public function create()
    {
        $kategorije = Kategorija::all();
        return view('admin.proizvodi.create', compact('kategorije'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required',
            'cena' => 'required|numeric',
            'kategorija_id' => 'required',
            'slika' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('slika')) {
            $slika = $request->file('slika')->store('slike', 'public');
            $data['slika'] = $slika;
        }

        Proizvod::create($data);

        return redirect()->route('proizvodi.index')->with('success', 'Proizvod je dodat.');
    }

    public function edit($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        
        $kategorije = Kategorija::all();

        return view('admin.proizvodi.edit', compact('proizvod', 'kategorije'));
    }


    public function update(Request $request, $id)
    {
        $proizvod = Proizvod::findOrFail($id);

        $request->validate([
            'naziv' => 'required',
            'cena' => 'required|numeric',
            'kategorija_id' => 'required',
            'slika' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('slika')) {
            $slika = $request->file('slika')->store('slike', 'public');
            $data['slika'] = $slika;
        }

        $proizvod->update($data);

        return redirect('/admin/proizvodi')->with('success', 'Proizvod je izmenjen.');
    }

    public function delete($id)
    {
        $proizvod = \App\Models\Proizvod::findOrFail($id);
        return view('admin.proizvodi.delete', compact('proizvod'));
    }


    public function destroy($id)
    {
        $proizvod = \App\Models\Proizvod::findOrFail($id);
        $proizvod->delete();

        return redirect('/admin/proizvodi')->with('success', 'Proizvod je obrisan.');
    }

}
