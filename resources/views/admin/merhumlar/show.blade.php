@extends('layouts.app')

@section('title', $merhum->ad_soyad . ' Detayları')

@section('content')

<div class="card">
    <div class="card-header text-center">
        <h2>{{ $merhum->ad_soyad }}</h2>
    </div>
    <div class="card-body text-center">
        <img src="{{ asset('storage/' . $merhum->gorsel_yolu) }}" class="rounded img-fluid" width="250">
        <h4 class="mt-3">{{ $merhum->dogum_tarihi }} - {{ $merhum->olum_tarihi }}</h4>
    </div>
</div>

<div class="mt-4">
    <h3>Sureler</h3>
    <div class="list-group">
        <div class="list-group-item">
            <strong>Yasin Suresi</strong>
            <audio controls>
                <source src="{{ asset('sureler/yasin.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyasını desteklemiyor.
            </audio>
        </div>
        <div class="list-group-item">
            <strong>Fatiha Suresi</strong>
            <audio controls>
                <source src="{{ asset('sureler/fatiha.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyasını desteklemiyor.
            </audio>
        </div>
        <div class="list-group-item">
            <strong>İhlas Suresi</strong>
            <audio controls>
                <source src="{{ asset('sureler/ihlas.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyasını desteklemiyor.
            </audio>
        </div>
    </div>
</div>

@endsection
