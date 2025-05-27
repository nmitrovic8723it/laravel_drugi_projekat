@extends('admin.layout')

@section('content')
    <h1>Izmeni Proizvod</h1>

    <form method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" name="naziv" class="form-control" value="{{ old('naziv', $proizvod->naziv) }}" required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena</label>
            <input type="number" name="cena" step="0.01" class="form-control" value="{{ old('cena', $proizvod->cena) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategorija_id" class="form-label">Kategorija</label>
            <select name="kategorija_id" class="form-control" required>
                @foreach($kategorije as $k)
                    <option value="{{ $k->id }}" @if($k->id == $proizvod->kategorija_id) selected @endif>
                        {{ $k->naziv }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="istaknut" class="form-label">Istaknut</label>
            <select name="istaknut" class="form-control">
                <option value="0" @if(!$proizvod->istaknut) selected @endif>Ne</option>
                <option value="1" @if($proizvod->istaknut) selected @endif>Da</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <textarea name="opis" class="form-control summernote">{{ old('opis', $proizvod->opis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="slika" class="form-label">Slika</label>
            <input type="file" name="slika" class="form-control">
            @if($proizvod->slika)
                <img src="{{ asset('storage/' . $proizvod->slika) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj</button>
    </form>
@endsection
