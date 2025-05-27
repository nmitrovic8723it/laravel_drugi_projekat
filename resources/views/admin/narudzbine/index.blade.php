@extends('admin.layout')

@section('content')
    <h1>Narudžbine</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Ime i Prezime</th>
            <th>Adresa</th>
            <th>Broj telefona</th>
            <th>Status</th>
            <th>Naziv proizvoda</th>
            <th>Slika proizvoda</th>
            <th>Akcije</th>
        </tr>
        @foreach($narudzbine as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->ime_prezime }}</td>
                <td>{{ $n->adresa }}</td>
                <td>{{ $n->broj_telefona }}</td>
                <td>{{ $n->status }}</td>
                <td>
                    @foreach($n->proizvodi as $proizvod)
                        <div>{{ $proizvod->naziv }}</div>
                    @endforeach
                </td>
                <td>
                    @foreach($n->proizvodi as $proizvod)
                        @if($proizvod->slika)
                            <img src="{{ asset('storage/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}" width="80" class="mb-2">
                        @endif
                    @endforeach
                </td>
                <td>
                    
                    <a href="{{ route('narudzbine.delete', $n) }}" class="btn btn-danger btn-sm">Obriši</a>
                    
                </td>
            </tr>
        @endforeach
    </table>
@endsection
