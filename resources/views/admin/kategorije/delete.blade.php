@extends('admin.layout')

@section('content')
    <h1>Da li ste sigurni da želite da obrišete ovu kategoriju?</h1>

    <p><strong>Naziv:</strong> {{ $kategorija->naziv }}</p>

    <form method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Da, obriši</button>
        <a href="{{ url('/admin/kategorije') }}" class="btn btn-secondary">Odustani</a>
    </form>
@endsection
