<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use Illuminate\Http\Request;

class KategorijaController extends Controller
{
    public function index()
    {
        $kategorije = Kategorija::all();
        return view('admin.kategorije.index', compact('kategorije'));
    }

    public function create()
    {
        return view('admin.kategorije.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required',
        ]);

        Kategorija::create($request->all());

        return redirect()->route('kategorije.index')->with('success', 'Kategorija je dodata.');
    }

    public function edit($id)
    {
        $kategorija = Kategorija::findOrFail($id);
        return view('admin.kategorije.edit', compact('kategorija'));
    }

    public function update(Request $request, $id)
    {
        $kategorija = Kategorija::findOrFail($id);

        $request->validate([
            'naziv' => 'required',
        ]);

        $kategorija->naziv = $request->naziv;
        $kategorija->save();

        return redirect('/admin/kategorije')->with('success', 'Kategorija je izmenjena.');
    }

    public function delete($id)
    {
        $kategorija = \App\Models\Kategorija::findOrFail($id);

        return view('admin.kategorije.delete', [
            'kategorija' => $kategorija,
        ]);
    }


    public function destroy($id)
    {
        $kategorija = \App\Models\Kategorija::findOrFail($id);
        $kategorija->delete();

        return redirect('/admin/kategorije')->with('success', 'Kategorija je obrisana.');
    }

}
