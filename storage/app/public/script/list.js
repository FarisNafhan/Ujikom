document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.album-button').forEach(button => {
        button.addEventListener("click", function () {
            let selectedAlbum = this.getAttribute("data-album");

            document.querySelectorAll(".gambar-container").forEach(container => {
                let foto = container.querySelector(".gambar");
                if (selectedAlbum === "all" || foto.getAttribute("data-album") === selectedAlbum) {
                    container.style.display = "block";
                } else {
                    container.style.display = "none";
                }
            });
        });
    });
});

