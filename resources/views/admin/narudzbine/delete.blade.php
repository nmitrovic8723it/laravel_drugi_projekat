@extends('admin.layout')

@section('content')
    <h1>Da li ste sigurni da želite da obrišete ovu narudžbinu?</h1>

    <p><strong>ID:</strong> {{ $narudzbina->id }}</p>
    <p><strong>Status:</strong> {{ $narudzbina->status }}</p>
    <p><strong>Napomena:</strong> {{ $narudzbina->napomena }}</p>

    <form method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Da, obriši</button>
        <a href="{{ url('/admin/narudzbine') }}" class="btn btn-secondary">Odustani</a>
    </form>
@endsection
