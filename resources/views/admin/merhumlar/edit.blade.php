@extends('layouts.app')

@section('title', 'Merhum Düzenle')

@section('content')


<div class="card">
    <div class="card-header">
        <h3>Merhum Düzenle</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.merhumlar.update', $merhum->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Ad Soyad</label>
                <input type="text" name="ad_soyad" class="form-control" value="{{ $merhum->ad_soyad }}" required>
            </div>
            <div class="mb-3">
                <label>Doğum Tarihi</label>
                <input type="date" name="dogum_tarihi" class="form-control" value="{{ $merhum->dogum_tarihi }}">
            </div>
            <div class="mb-3">
                <label>Ölüm Tarihi</label>
                <input type="date" name="olum_tarihi" class="form-control" value="{{ $merhum->olum_tarihi }}" required>
            </div>
            <div class="mb-3">
                <label>Merhum Görseli Yükle</label>
                <input type="file" name="merhum_gorsel_yolu" class="form-control">
            </div>

            <div class="mb-3">
                <label>Merhum Kabir Görseli Yükle</label>
                <input type="file" name="mezarlik_gorsel_yolu" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
</div>

@endsection
