<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kızılören Sıla-i Rahim</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <h1>Kızılören Sıla-i Rahim</h1>
        <button class="menu-button" onclick="toggleMenu()">☰</button>
    </header>

    <!-- Menü arka planı (dışına tıklanınca kapanmasını sağlar) -->
    <div class="menu-overlay" id="menuOverlay" onclick="toggleMenu()"></div>

    <!-- Menü Paneli -->
    <div class="menu" id="menu">
        <button class="close-menu" onclick="toggleMenu()">✖</button>
        <a href="/merhumlarimiz">Merhumlarımız</a>
    </div>

    <main>
        <section class="section white">
            <div class="card">
                <img src="{{asset("storage/image1.jpeg" )}}" alt="Görsel 1">
                <button onclick="window.location.href='merhumlarimiz'">Merhumlarımız</button>
            </div>
        </section>
        <section class="section white">
            <div class="card">
                <img src="{{asset("storage/image1.jpeg" )}}" alt="Görsel 2">
            </div>
        </section>
        <section class="section white">
            <div class="card">
                <video controls preload="metadata">
                    <source src="{{asset("storage/video.mp4" )}}" type="video/mp4">
                    Tarayıcınız video etiketini desteklemiyor.
                </video>
            </div>
        </section>
    </main>

    <footer>
        © 2025 Bu web sitesi Cezmi Ergün tarafından Kızılören merhumları için yaptırılmıştır.
    </footer>
    

    <script src="js/menu.js"></script>

</body>
</html>
