function like(foto_id) {
    fetch(`/like/${foto_id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            let icon = document.getElementById(`like-icon-${foto_id}`);

            if (!icon) {
                console.error(`Icon like dengan ID like-icon-${photoId} tidak ditemukan.`);
                return;
            }

            if (data.massage === 'Liked') {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
                icon.style.color = "red";
            } else {
                icon.classList.remove('fa-solid');
                icon.classList.add('fa-regular');
                icon.style.color = "black";
            }

        })
        .catch(error => console.error('Error:', error));
}
