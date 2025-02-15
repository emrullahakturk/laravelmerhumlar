document.addEventListener("DOMContentLoaded", function () {
    let nextPageUrl = document.querySelector("#merhum-container").getAttribute("data-next-page");
    let loading = false;

    window.addEventListener("scroll", function () {
        if (loading || !nextPageUrl) return;

        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 300) {
            loading = true;
            document.getElementById("load-more-container").style.display = "block";

            fetch(nextPageUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.merhumlar) {
                        document.getElementById("merhum-container").insertAdjacentHTML("beforeend", data.merhumlar);
                        nextPageUrl = data.next_page_url;
                    } else {
                        nextPageUrl = null;
                    }
                    document.getElementById("load-more-container").style.display = "none";
                    loading = false;
                })
                .catch(error => {
                    console.error("Hata:", error);
                    document.getElementById("load-more-container").style.display = "none";
                    loading = false;
                });
        }
    });
});
