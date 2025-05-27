<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\NarudzbinaController;
use App\Http\Controllers\PublicController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PublicController::class, 'home'])->name('public.home');
Route::get('/katalog', [PublicController::class, 'katalog'])->name('public.katalog');
Route::get('/proizvod/{id}', [PublicController::class, 'proizvod'])->name('public.proizvod');
Route::get('/kontakt', [PublicController::class, 'kontakt'])->name('public.kontakt');

Route::middleware('auth')->group(function () {
    Route::post('/naruci/{id}', [PublicController::class, 'naruci'])->name('public.naruci');
    Route::get('/moje-narudzbine', [PublicController::class, 'mojeNarudzbine'])->name('public.moje-narudzbine');
});


require __DIR__.'/auth.php';

Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    

    // Proizvodi
    Route::get('/proizvodi', [ProizvodController::class, 'index'])->name('proizvodi.index');
    Route::get('/proizvodi/create', [ProizvodController::class, 'create'])->name('proizvodi.create');
    Route::post('/proizvodi/create', [ProizvodController::class, 'store'])->name('proizvodi.store');
    Route::get('/proizvodi/{id}/edit', [ProizvodController::class, 'edit'])->name('proizvodi.edit');
    Route::post('/proizvodi/{id}/edit', [ProizvodController::class, 'update'])->name('proizvodi.update');
    Route::get('/proizvodi/{id}', [ProizvodController::class, 'show'])->name('proizvodi.show');
    Route::get('/proizvodi/{id}/delete', [ProizvodController::class, 'delete'])->name('proizvodi.delete');
    Route::post('/proizvodi/{id}/delete', [ProizvodController::class, 'destroy'])->name('proizvodi.destroy');
    Route::get('/admin/proizvodi', [ProizvodController::class, 'index'])->name('admin.proizvodi');

    // Kategorije
    Route::get('/kategorije', [KategorijaController::class, 'index'])->name('kategorije.index');
    Route::get('/kategorije/create', [KategorijaController::class, 'create'])->name('kategorije.create');
    Route::post('/kategorije/create', [KategorijaController::class, 'store'])->name('kategorije.store');
    Route::get('/kategorije/{id}/edit', [KategorijaController::class, 'edit'])->name('kategorije.edit');
    Route::post('/kategorije/{id}/edit', [KategorijaController::class, 'update'])->name('kategorije.update');
    Route::get('/kategorije/{id}', [KategorijaController::class, 'show'])->name('kategorije.show');
    Route::get('/kategorije/{id}/delete', [KategorijaController::class, 'delete'])->name('kategorije.delete');
    Route::post('/kategorije/{id}/delete', [KategorijaController::class, 'destroy'])->name('kategorije.destroy');

    // Narudžbine
    Route::get('/narudzbine', [NarudzbinaController::class, 'index'])->name('narudzbine.index');
    Route::get('/narudzbine/{id}/delete', [NarudzbinaController::class, 'delete'])->name('narudzbine.delete');
    Route::post('/narudzbine/{id}/delete', [NarudzbinaController::class, 'destroy'])->name('narudzbine.destroy');
    Route::get('/narudzbine/{id}', [PublicController::class, 'prikaziNarudzbinu'])->name('public.narudzbina');
    Route::get('/narudzbine', [NarudzbinaController::class, 'index'])->name('narudzbine.index');
    Route::get('/narudzbine/{id}', [NarudzbinaController::class, 'show'])->name('narudzbine.show');

});

Route::patch('/moje-narudzbine/{id}/update-status', [PublicController::class, 'updateStatus'])
    ->name('public.narudzbine.update-status')
    ->middleware('auth');


Route::get('/naruci/{id}', [PublicController::class, 'formaNarudzbine'])->name('public.naruci-forma');
Route::post('/naruci/{id}', [PublicController::class, 'naruci'])->name('public.naruci');


// Dashboard redirect
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user && $user->role && in_array($user->role->name, ['admin', 'editor'])) {
        return redirect('/admin/proizvodi');
    }
    return redirect()->route('public.home');
})->name('dashboard');