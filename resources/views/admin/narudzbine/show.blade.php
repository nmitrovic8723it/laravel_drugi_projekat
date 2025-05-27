@extends('admin.layout')

@section('content')
    <h1>Detalji Narudžbine</h1>

    <p><strong>Korisnik:</strong> {{ $narudzbina->user->name }}</p>
    <p><strong>Status:</strong> {{ $narudzbina->status }}</p>
    <p><strong>Napomena:</strong> {{ $narudzbina->napomena }}</p>

    <h3>Proizvodi</h3>
    <ul>
        @foreach($narudzbina->proizvodi as $p)
            <li>{{ $p->naziv }} - {{ $p->cena }} RSD</li>
        @endforeach
    </ul>

    <a href="{{ route('narudzbine.index') }}" class="btn btn-secondary mt-3">Nazad</a>
@endsection
