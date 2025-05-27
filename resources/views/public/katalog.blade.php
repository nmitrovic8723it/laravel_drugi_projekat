@extends('layouts.public')

@section('content')
<div class="container mt-5" style="padding-top: 100px;">
    <h1 class="text-center mb-4">Naša Ponuda</h1>

    <div class="row">
        @forelse($proizvodi as $proizvod)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($proizvod->slika)
                        <img src="{{ asset('storage/' . $proizvod->slika) }}" class="card-img-top" alt="{{ $proizvod->naziv }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $proizvod->naziv }}</h5>
                        <p class="card-text">{!! $proizvod->opis !!}</p>
                        
                        <p class="card-text"><strong>{{ $proizvod->cena }} RSD</strong></p>

                        <a href="{{ route('public.proizvod', $proizvod->id) }}" class="btn btn-outline-primary mt-auto">Detalji</a>

                        @auth
                        <a href="{{ route('public.naruci-forma', $proizvod->id) }}" class="btn btn-success btn-sm mt-2">Naruči</a>

                        <form id="naruci-form" action="{{ route('public.naruci', $proizvod->id) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-success btn-lg mt-3">Registruj se za poručivanje</a>
                        @endauth

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Trenutno nemamo proizvode za prikaz.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
