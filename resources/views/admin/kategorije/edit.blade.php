@extends('admin.layout')

@section('content')
    <h1>Izmeni Kategoriju</h1>

    <form method="POST">
        @csrf

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" name="naziv" class="form-control" value="{{ old('naziv', $kategorija->naziv) }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Sačuvaj</button>
    </form>
@endsection
