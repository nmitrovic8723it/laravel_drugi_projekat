@extends('admin.layout')

@section('content')
    <h1>Dodaj Kategoriju</h1>

    <form action="{{ route('kategorije.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" name="naziv" class="form-control" value="{{ old('naziv') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj</button>
    </form>
@endsection
