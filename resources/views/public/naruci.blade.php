@extends('layouts.public')

@section('title', 'Naruči ' . $proizvod->naziv)

@section('content')
<div class="container mt-5" style="padding-top: 100px;">
    <h1 class="text-center mb-4">Naruči: {{ $proizvod->naziv }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $proizvod->slika) }}" class="img-fluid mb-3" alt="{{ $proizvod->naziv }}">
            <p>{{ $proizvod->opis }}</p>
            <p><strong>Cena: {{ $proizvod->cena }} RSD</strong></p>

            <form action="{{ route('public.naruci', $proizvod->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="ime_prezime" class="form-label">Ime i prezime</label>
                    <input type="text" name="ime_prezime" id="ime_prezime" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="broj_telefona" class="form-label">Broj telefona</label>
                    <input type="text" name="broj_telefona" id="broj_telefona" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="adresa" class="form-label">Adresa</label>
                    <input type="text" name="adresa" id="adresa" class="form-control" required>
                </div>

                <div class="row">
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success w-40">Potvrdi narudžbinu</button>
                        <a href="{{ route('public.katalog') }}" class="btn btn-secondary w-40">Nazad na katalog</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
