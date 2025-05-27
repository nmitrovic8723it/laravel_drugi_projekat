@extends('layouts.public')

@section('content')
<div class="container mt-5" style="padding-top: 100px;">
    <h1>Moje narudžbine</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($narudzbine->count())
    
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Proizvod</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                @foreach($narudzbine as $n)
                    <tr>
                        <td>
                            @if($n->status !== 'Preuzeto')
                                <form action="{{ route('public.narudzbine.update-status', $n) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Označi kao stiglo ✅</button>
                                </form>
                            @else
                                <span class="text-success"><i class="fas fa-check"></i> Stiglo</span>
                            @endif
                        </td>
                        <td>
                            @foreach($n->proizvodi as $proizvod)
                                <div>
                                    <strong>{{ $proizvod->naziv }}</strong><br>
                                    @if($proizvod->slika)
                                        <img src="{{ asset('storage/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}" width="80">
                                    @endif
                                </div>
                            @endforeach
                        </td>
                        <td>{{ $n->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <p class="mt-4">Trenutno nemate nijednu narudžbinu.</p>
    @endif

    <a href="{{ route('public.katalog') }}" class="btn btn-secondary mt-3">Nazad na katalog</a>
</div>
@endsection
