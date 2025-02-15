@extends('layouts.app')

@section('title', 'Merhum Listesi')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Merhum Listesi</h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ad Soyad</th>
                    <th>Doğum Tarihi</th>
                    <th>Ölüm Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($merhumlar as $merhum)
                    <tr>
                        <td>{{ $merhum->ad_soyad }}</td>
                        <td>{{ $merhum->dogum_tarihi }}</td>
                        <td>{{ $merhum->olum_tarihi }}</td>
                        <td>                            
                            <a href="{{ route('admin.merhumlar.edit', $merhum->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                            <form action="{{ route('admin.merhumlar.destroy', $merhum->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
