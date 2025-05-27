<?php

namespace App\Http\Controllers;

use App\Models\Narudzbina;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Proizvod;
use Illuminate\Support\Facades\Auth;

class NarudzbinaController extends Controller
{
    public function index()
    {
        $narudzbine = Narudzbina::with('user')->get();
        return view('admin.narudzbine.index', compact('narudzbine'));
    }

    public function show(Narudzbina $narudzbina)
    {
        $narudzbina->load('proizvodi', 'user');
        return view('admin.narudzbine.show', compact('narudzbina'));
    }


    
    public function delete($id)
    {
        
        $narudzbina = \App\Models\Narudzbina::findOrFail($id);
        return view('admin.narudzbine.delete', compact('narudzbina'));
    }

    

    public function destroy($id)
    {
        $narudzbina = \App\Models\Narudzbina::findOrFail($id);
        $narudzbina->delete();

        return redirect('/admin/narudzbine')->with('success', 'Narudžbina je obrisana.');
    }

   

}