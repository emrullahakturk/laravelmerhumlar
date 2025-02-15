function toggleMenu() {
    const menu = document.getElementById("menu");
    const overlay = document.getElementById("menuOverlay");
    if (menu.classList.contains("open")) {
        menu.classList.remove("open");
        overlay.classList.remove("open");
    } else {
        menu.classList.add("open");
        overlay.classList.add("open");
    }
}
