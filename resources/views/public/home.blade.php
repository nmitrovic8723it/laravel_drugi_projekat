@extends('layouts.public')

@section('title', 'Početna')

@section('content')
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Dobrodošli!</div>
            <div class="masthead-heading text-uppercase">Vaša omiljena optika</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('public.katalog') }}">Pogledaj ponudu</a>
        </div>
    </header>

    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Izdvajamo iz ponude</h2>
                <h3 class="section-subheading text-muted">Najpopularniji proizvodi</h3>
            </div>
            <div class="row">
                @foreach($proizvodi as $proizvod)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" href="{{ route('public.proizvod', $proizvod->id) }}">
                                <img class="img-fluid" src="{{ asset('storage/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $proizvod->naziv }}</div>
                                <div class="portfolio-caption-subheading text-muted">{{ Str::limit($proizvod->opis, 60) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
