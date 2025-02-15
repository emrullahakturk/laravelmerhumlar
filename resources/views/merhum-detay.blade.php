<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merhum Detay</title>
    <link rel="stylesheet" href="{{asset('css/detay.css')}}">

    <style> @import url('https://fonts.googleapis.com/css2?family=Delius&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Delius', sans-serif;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
        
        /* Header */
        header {
            padding: 20px;
            background-color: #fff;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        h1 {
            font-size: 1.8rem;
            font-weight: 400;
            letter-spacing: 1.5px;
            color: #8B4513;
            flex-grow: 1;
            text-align: center;
            font-family: 'Delius', sans-serif;
        }
        
        /* Menü Butonu */
        .menu-button {
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: #8B4513;
            padding: 10px;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        /* Menü Paneli */
        .menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 250px;
            height: 100%;
            background: white;
            box-shadow: -4px 0 8px rgba(0,0,0,0.2);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            transition: right 0.3s ease-in-out;
            z-index: 1000;
        }
        
        .menu.open {
            right: 0;
        }
        
        /* Kapatma Butonu */
        .close-menu {
            background: none;
            border: none;
            font-size: 2rem;
            color: #8B4513;
            cursor: pointer;
            position: absolute;
            top: 10px;
            left: 10px;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        /* Menü Öğeleri */
        .menu a {
            display: block;
            text-decoration: none;
            color: #8B4513;
            padding: 15px 20px;
            border-radius: 5px;
            font-size: 1.2rem;
            width: 100%;
            text-align: left;
            margin-top: 20px;
        }
        
        .menu a:hover {
            background: #8B4513;
            color: white;
        }
        
        /* 🔹 Merhum Detay Sayfası Konteyneri */
        .merhum-detay-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 30px;
            padding: 30px;
            width: 100%;
            max-width: 1200px;
        }
        
        /* 🔹 Kart Tasarımı */
        .detay-card {
            background: #fff;
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 450px;
            min-width: 320px;
        }
        
        /* 🔹 Görsellerin Orantılı Yerleşimi */
        .detay-card img {
            width: 100%;
            height: 260px;
            object-fit: contain;
            border-radius: 12px;
            background-color: #f3f3f3;
        }
        
        
        
        /* 🔹 Merhum Bilgileri Kartı */
        .merhum-bilgiler-card {
            background: #f8f8f8; /* Aynı renk korundu */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 700px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        /* 🔹 Merhum Bilgileri İçeriği */
        .merhum-bilgiler {
            text-align: center;
            width: 100%;
            max-width: 650px;
        }
        
        
        
        
        /* 🔹 Ses Dosyaları Bölümü */
        .ses-dosyalar {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
            width: 100%;
            max-width: 800px;
            margin: 30px auto; /* Tam ortalamak için */
        }
        
        /* 🔹 Ses Kutuları */
        .ses-kutu {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            padding: 15px;
            border-radius: 10px;
            width: 100%;
            max-width: 350px;
            text-align: center;
        }
        
        
        
        /* 🔹 Responsive Ayarlar */
        
        /* ✅ Büyük Ekranlar: Kartları Yan Yana Yap */
        @media (min-width: 1024px) {
            .merhum-detay-container {
                flex-direction: row; /* YAN YANA OLACAK */
                justify-content: center;
                align-items: flex-start;
            }
        
            .detay-card {
                width: 45%; /* Kartlar yan yana olacak şekilde %45 genişlikte */
            }
        
            .merhum-bilgiler-card {
                width: 100%;
                max-width: 720px;
            }
        
            .ses-dosyalar {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                max-width: 900px;
            }
        }
        
        /* ✅ Orta Ekranlar: Kartları Alt Alta Yap */
        @media (max-width: 1023px) {
            .merhum-detay-container {
                flex-direction: column;
                align-items: center;
            }
        
            .detay-card {
                width: 90%;
                max-width: 500px;
            }
        
            .merhum-bilgiler-card {
                width: 90%;
                max-width: 390px;
            }
        
            .ses-dosyalar {
                flex-direction: column;
                align-items: center;
                max-width: 600px;
            }
        }
        
        /* ✅ Küçük Ekranlar: Kartlar Alt Alta ve Ortalı */
        @media (max-width: 767px) {
            .merhum-detay-container {
                flex-direction: column;
                align-items: center;
            }
        
            .detay-card {
                width: 95%;
                max-width: 400px;
            }
        
            .merhum-bilgiler-card {
                width: 95%;
                max-width: 350px;
            }
        
            .ses-dosyalar {
                flex-direction: column;
                align-items: center;
                width: 95%;
            }
        }
        
        
        /* Footer */
        footer {
            width: 100%;
            background-color: #8B4513;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1rem;
            position: relative;
            bottom: 0;
            left: 0;
        }
        
        @media (min-width: 768px) {
            footer {
                font-size: 1.2rem;
            }
        }
        
        @media (min-width: 1024px) {
            footer {
                font-size: 1.3rem;
            }
        }
        </style>

</head>
<body>

   <!-- Header -->
   <header>
    <h1>Merhum</h1>
    <button class="menu-button" onclick="toggleMenu()">☰</button>
</header>

<!-- Menü Paneli -->
<div class="menu-overlay" id="menuOverlay" onclick="toggleMenu()"></div>
<div class="menu" id="menu">
    <button class="close-menu" onclick="toggleMenu()">✖</button>
    <a href="{{ route('home') }}">Ana Sayfa</a>
    <a href="{{ route('merhumlar') }}" style="margin-top: 0px;">Merhumlarımız</a>
</div>

<!-- Merhum Detay İçeriği -->
<main>
    <section class="merhum-detay-container">
        <!-- Merhumun Görsel Kartı -->
        <div class="detay-card">
            <img src="{{ asset('storage/' . ($merhum->merhum_gorsel_yolu ?? 'default.png')) }}" alt="Merhum Fotoğrafı">
        </div>

        <!-- Mezar Taşı Görsel Kartı (Varsa Gösterilecek) -->
        @if ($merhum->mezarlik_gorsel_yolu)
            <div class="detay-card">
                <img src="{{ asset('storage/' . $merhum->mezarlik_gorsel_yolu) }}" alt="Mezar Taşı Fotoğrafı">
            </div>
        @endif
    </section>

    <!-- 🔹 Merhum Bilgileri (Kart İçinde) -->
    <section class="merhum-bilgiler-card">
        <div class="merhum-bilgiler">
            <h2>Merhum {{ $merhum->ad_soyad }}</h2>
            <p><strong>Doğum Tarihi:</strong> 
                {{ implode('-', array_reverse(explode('-', $merhum->dogum_tarihi))) }}
            </p>
            
            <p><strong>Ölüm Tarihi:</strong> 
                {{ implode('-', array_reverse(explode('-', $merhum->olum_tarihi))) }}
            </p>
            
          <!--  <p><strong>Hakkında:</strong> Merhum hakkında kısa bir bilgi veya açıklama eklenebilir.</p> -->
        </div>
    </section>

    <!-- Ses Dosyaları -->
    <section class="ses-dosyalar">

        <div class="ses-kutu">
            <span style="margin-bottom: 10px">Yasin Suresi</span>
            <audio controls>
                <source src="{{ asset('storage/sesler/yasin_suresi.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyalarını desteklemiyor.
            </audio>
        </div>
        <div class="ses-kutu">
            <span style="margin-bottom: 10px">Fatiha Suresi</span>
            <audio controls>
                <source src="{{ asset('storage/sesler/fatiha_suresi.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyalarını desteklemiyor.
            </audio>
        </div>
        <div class="ses-kutu">
            <span style="margin-bottom: 10px">Amenarrasulü Suresi</span>
            <audio controls>
                <source src="{{ asset('storage/sesler/amenerrasulü.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyalarını desteklemiyor.
            </audio>
        </div>
        <div class="ses-kutu">
            <span style="margin-bottom: 10px">Mülk Suresi</span>
            <audio controls>
                <source src="{{ asset('storage/sesler/mulk_suresi.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyalarını desteklemiyor.
            </audio>
        </div>
        <div class="ses-kutu">
            <span style="margin-bottom: 10px">Rahman Suresi</span>
            <audio controls>
                <source src="{{ asset('storage/sesler/rahman_suresi.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyalarını desteklemiyor.
            </audio>
        </div>
        <div class="ses-kutu">
            <span style="margin-bottom: 10px" >İhlâs Suresi</span>
            <audio controls>
                <source src="{{ asset('storage/sesler/ihlas_suresi.mp3') }}" type="audio/mpeg">
                Tarayıcınız ses dosyalarını desteklemiyor.
            </audio>
        </div>
        
    </section>
</main>

<!-- Footer -->
<footer>
    © 2025 Bu web sitesi Cezmi Ergün tarafından Kızılören merhumları için yaptırılmıştır.
</footer>

<!-- Menü Aç/Kapat -->
<script src="{{ asset('js/menu.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const audioElements = document.querySelectorAll("audio");

        audioElements.forEach(audio => {
            audio.addEventListener("play", function () {
                audioElements.forEach(otherAudio => {
                    if (otherAudio !== audio) {
                        otherAudio.pause();
                       // otherAudio.currentTime = 0; // Başlangıca al (isteğe bağlı)
                    }
                });
            });
        });
    });
</script>



</body>
</html>
