@extends('layouts.public')

@section('content')
<div class="container mt-5" style="padding-top: 100px;">
    <h1>Kontakt</h1>
    <p class="lead">Ovde možete pronaći naše kontakt podatke i kako da dođete do nas.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Kontakt podaci</h4>
            <p><strong>Adresa:</strong> Bulevar Kralja Aleksandra 20, Beograd</p>
            <p><strong>Telefon:</strong> +381 11 1234567</p>
            <p><strong>Email:</strong> opticalstore@eyewear.rs</p>
        </div>

        <div class="col-md-6">
            <h4>Nađite nas na mapi</h4>
            <div class="ratio ratio-4x3">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.681779088508!2d20.479365315535736!3d44.81308357909813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a654bf62b0c29%3A0xbadbadbadbadbadb!2sBulevar%20Kralja%20Aleksandra%2073%2C%20Beograd!5e0!3m2!1sen!2srs!4v1620000000000!5m2!1sen!2srs"
                    width="600"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>

    <a href="{{ route('public.home') }}" class="btn btn-primary mt-4">Nazad na početnu</a>
</div>
@endsection
