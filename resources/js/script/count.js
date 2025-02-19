$(document).ready(function () {
    $(document).on('submit', 'form[id^="komen-form-"]', function (e) {
        e.preventDefault();

        var form = $(this);
        var foto_id = form.find('input[name="foto_id"]').val();
        var komentar = form.find('input[name="isi"]').val();

        $.ajax({
            url: '/komentar-add',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                foto_id: foto_id,
                isi: komentar
            },
            success: function (response) {
                $('#komen-count-' + foto_id).text('Komen: ' + response.komen_count);
                form.find('input[name="isi"]').val('');
            },
            error: function (xhr) {
                alert('Error: ' + xhr.responseText)
            }
        })
    });
});
