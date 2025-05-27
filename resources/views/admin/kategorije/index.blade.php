@extends('admin.layout')

@section('content')
    <h1>Kategorije</h1>
    <a href="{{ route('kategorije.create') }}" class="btn btn-primary mb-3">Dodaj Kategoriju</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Akcije</th>
        </tr>
        @foreach($kategorije as $k)
        <tr>
            <td>{{ $k->id }}</td>
            <td>{{ $k->naziv }}</td>
            <td>
                <a href="{{ route('kategorije.edit', $k) }}" class="btn btn-warning btn-sm">Izmeni</a>
                @if(Auth::user()->role->name === 'admin')
                    <a href="{{ route('kategorije.delete', $k) }}" class="btn btn-danger btn-sm">Obriši</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection
