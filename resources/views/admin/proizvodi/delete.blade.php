@extends('admin.layout')

@section('content')
    <h1>Da li ste sigurni da želite da obrišete ovaj proizvod?</h1>

    <p><strong>Naziv:</strong> {{ $proizvod->naziv }}</p>
    <p><strong>Cena:</strong> {{ $proizvod->cena }} RSD</p>

    <form method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Da, obriši</button>
        <a href="{{ url('/admin/proizvodi') }}" class="btn btn-secondary">Odustani</a>
    </form>
@endsection
