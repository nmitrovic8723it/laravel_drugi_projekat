@extends('layouts.public')

@section('content')
<div class="container mt-5" style="padding-top: 100px;">
    <div class="row">
        <div class="col-md-6">
            @if($proizvod->slika)
                <img src="{{ asset('storage/' . $proizvod->slika) }}" class="img-fluid" alt="{{ $proizvod->naziv }}">
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $proizvod->naziv }}</h1>
            <p class="lead">{!! $proizvod->opis !!}</p>
            <p><strong>Cena: </strong>{{ $proizvod->cena }} RSD</p>
            
            
            
            <div class="d-grid gap-2 mt-3">
    @auth
        <a href="{{ route('public.naruci-forma', $proizvod->id) }}" class="btn btn-success btn-lg" style="width: 30%;">Naruči</a>
        <form id="naruci-form" action="{{ route('public.naruci', $proizvod->id) }}" method="POST" style="display: none; width: 30%;">
            @csrf
        </form>
    @else
        <a href="{{ route('register') }}" class="btn btn-success btn-lg" style="width: 30%;">Registruj se za poručivanje</a>
    @endauth

    <a href="{{ route('public.katalog') }}" class="btn btn-secondary btn-lg" style="width: 30%;">Nazad</a>
</div>



        </div>
    </div>
</div>
@endsection
