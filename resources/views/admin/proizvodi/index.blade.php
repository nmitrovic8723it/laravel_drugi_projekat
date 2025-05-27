@extends('admin.layout')

@section('content')
    <h1>Proizvodi</h1>
    <a href="{{ route('proizvodi.create') }}" class="btn btn-primary mb-3">Dodaj Proizvod</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Kategorija</th>
            <th>Istaknut</th>
            <th>Slika</th>
            <th>Akcije</th>
        </tr>
        @foreach($proizvodi as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->naziv }}</td>
            <td>{{ $p->cena }}</td>
            <td>{{ $p->kategorija->naziv }}</td>
            <td>{{ $p->istaknut ? 'Da' : 'Ne' }}</td>
            <td>
                @if($p->slika)
                    <img src="{{ asset('storage/' . $p->slika) }}" width="100">
                @else
                    <span>Nema slike</span>
                @endif
            </td>
            <td>
                <a href="{{ route('proizvodi.edit', $p) }}" class="btn btn-warning btn-sm">Izmeni</a>
                @if(Auth::user()->role->name === 'admin')
                    <a href="{{ route('proizvodi.delete', $p) }}" class="btn btn-danger btn-sm">Obriši</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection
