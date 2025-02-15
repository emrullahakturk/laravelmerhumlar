@extends('layouts.app')

@section('title', 'Yeni Merhum Ekle')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Yeni Merhum Ekle</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.merhumlar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Ad Soyad</label>
                <input type="text" name="ad_soyad" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Doğum Tarihi</label>
                <input type="date" name="dogum_tarihi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Ölüm Tarihi</label>
                <input type="date" name="olum_tarihi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Merhum Görseli</label>
                <input type="file" name="merhum_gorsel_yolu" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Merhum Kabir Görseli</label>
                <input type="file" name="mezarlik_gorsel_yolu" class="form-control" >
            </div>
            <button type="submit" class="btn btn-success">Ekle</button>
        </form>
    </div>
</div>

@endsection
