<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merhumlarımız</title>
    <link rel="stylesheet" href="{{ asset('css/merhumlar.css') }}">
</head>
<body>
    <header>
        <h1>Merhumlarımız</h1>
        <button class="menu-button" onclick="toggleMenu()">☰</button>
    </header>

    <div class="menu-overlay" id="menuOverlay" onclick="toggleMenu()"></div>

    <div class="menu" id="menu">
        <button class="close-menu" onclick="toggleMenu()">✖</button>
        <a href="{{ route('home') }}">Ana Sayfa</a>
    </div>

    <main>
        <section class="merhum-container">
            @if ($merhumlar->isEmpty())
                <p>Henüz merhum eklenmemiş.</p>
            @else
                @foreach ($merhumlar as $merhum)
                    <a href="{{ route('merhum-detay', $merhum->id) }}" class="merhum-card">
                        <img src="{{ asset('storage/' . ($merhum->merhum_gorsel_yolu ?? 'default.png')) }}" alt="Merhum Fotoğrafı">
                        <h3>{{ $merhum->ad_soyad }}</h3>
                        <p><strong>Vefat Tarihi:</strong> 
                            {{ implode('-', array_reverse(explode('-', $merhum->olum_tarihi))) }}
                        </p>
                    </a>
                @endforeach
            @endif
        </section>

        <!-- ✅ Laravel Pagination Linkleri -->
<div class="pagination-container">
    <ul class="pagination">
       <li>  {{ $merhumlar->links() }} </li>
    </ul>
</div>

    </main>

    <footer>
        © 2025 Bu web sitesi Cezmi Ergün tarafından Kızılören merhumları için yaptırılmıştır.
    </footer>

    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
