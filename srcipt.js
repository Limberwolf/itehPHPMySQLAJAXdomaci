$(function () {
    obrisi();
});


function obrisi() {

    $(document).on('click', '#obrisi_dugme', function () {

        let id = $(this).attr('value');

        $.ajax({
            url: 'obrisi.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#content').html(data);
            }
        })

    })
}